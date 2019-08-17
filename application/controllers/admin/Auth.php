<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// .
// .
// .
// .
//                            Admin
// .
// .
// .
// .

class Auth extends CI_Controller {

  function __construct() {
			parent::__construct();
      $this->_validasiLogin();
      $this->_validasiPrivilege();
			$this->load->model('M_users');
	}

	private function _validasiLogin(){
		if ( $this->session->userdata('login') == 1 ) {
			redirect(base_url('admin'));
		}
	}
	private function _validasiPrivilege(){
		// admin privilege 0 - 4
		// user privilege 5++
		if ( $this->session->userdata('privilege') >= 5 ) {
			redirect(base_url());
		}
	}

  public function login()
	{

		// syarat form
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE){
			// jika syarat form belum terpenuhi (tombol login belum ditekan)
      $this->load->view('admin/v_login');
    }else{
			// jika syarat pada form sudah terpenuhi (tombol login sudah ditekan)
      // cek username pada db
      $query = $this->M_users->get_admin_by_username( $this->input->post('username') );
      if ($query->num_rows() == 1) {
        // jika username dan privilege <=4 ditemukan pada db
        $row = $query->row();
        // lalu cek apakah password sesuai dengan db
  			if ( $this->bcrypt->check_password($this->input->post('password'), $row->password) ) {
  				// jika password inputan cocok dengan data di db
          $this->session->set_flashdata('success_message', 1);
					$this->session->set_flashdata('title', 'Admin login privilege !');
					$this->session->set_flashdata('text', 'Enjoy your time with pendekin');

  				$this->session->set_userdata('login', 1);
  				$this->session->set_userdata('name', $row->name);
  				$this->session->set_userdata('username', $row->username);
  				$this->session->set_userdata('email', $row->email);
  				$this->session->set_userdata('phone', $row->phone);
  				$this->session->set_userdata('gender', $row->gender);
  				$this->session->set_userdata('privilege', $row->privilege);
  				$this->session->set_userdata('is_active', $row->is_active);
  				redirect(base_url('admin'), 'refresh');
  			}else {
  				// jika password inputan tidak cocok pada db
          $this->session->set_flashdata('failed_message', 1);
  				$this->session->set_flashdata('title', 'Admin login failed !');
  				$this->session->set_flashdata('text', 'Invalid admin login information');
  				redirect(base_url('admin/login'), 'refresh');
  			}
      }else {
        // jika password inputan tidak cocok pada db
        $this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', 'Admin login failed !');
				$this->session->set_flashdata('text', 'Invalid admin login information');
        redirect(base_url('admin/login'), 'refresh');
      }
    }
	} //end fungsi login


}
