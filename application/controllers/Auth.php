<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// .
// .
// .
// .
//                            user
// .
// .
// .
// .

class Auth extends CI_Controller {

	function __construct() {
			parent::__construct();
			$this->load->model('M_users');
	}

	private function _validasiLogin(){
		if ( $this->session->userdata('login') == 1 ) {
			redirect(base_url());
		}
	}
	private function _validasiPrivilege(){
		// admin privilege 0 - 4
		// user privilege 5++
		if ( ($this->session->userdata('privilege') < 5) and ($this->session->userdata('privilege') != 0) ) {
			redirect(base_url());
		}
	}

	public function login()
	{
		$this->_validasiLogin();
		$this->_validasiPrivilege();

		// syarat form
		$this->form_validation->set_rules('emailUsername', 'E-Mail / Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		$header = array(
			'title' => 'Login'
		);
		if ($this->form_validation->run() == FALSE){
			// jika syarat form belum terpenuhi (tombol login belum ditekan)
			$this->load->view('v_header_auth', $header);
      $this->load->view('v_login');
			$this->load->view('v_footer_auth');
    }else{
			// jika syarat pada form sudah terpenuhi (tombol login sudah ditekan)
			// cek email / username pada db
			$query = $this->M_users->get_user( $this->input->post('emailUsername') );
			if ( $query->num_rows() == 1 ) {
				// jika email dan privilege >= 5 terdaftar pada db
				$row = $query->row();
				// lalu cek apakah password sesuai dengan db
				if ( $this->bcrypt->check_password($this->input->post('password'), $row->password) ) {
					// jika password inputan cocok dengan data di db
					$this->session->set_flashdata('success_message', 1);
					$this->session->set_flashdata('title', "Welcome {$row->name} !");
					$this->session->set_flashdata('text', 'Enjoy your time with pendekin');

					$this->session->set_userdata('login', 1);
					$this->session->set_userdata('name', $row->name);
					$this->session->set_userdata('username', $row->username);
					$this->session->set_userdata('email', $row->email);
					$this->session->set_userdata('phone', $row->phone);
					$this->session->set_userdata('gender', $row->gender);
					$this->session->set_userdata('privilege', $row->privilege);
					$this->session->set_userdata('is_active', $row->is_active);
					redirect(base_url('u/create'));
				}else {
					// jika password inputan tidak cocok pada db
					$this->session->set_flashdata('failed_message', 1);
					$this->session->set_flashdata('title', 'Login failed !');
					$this->session->set_flashdata('text', 'Invalid username / E-mail / password');
					redirect(base_url('login'));
				}
			}else {
				// jika email tidak terdaftar pada db
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', 'Login failed !');
				$this->session->set_flashdata('text', 'Invalid username / E-mail / password');
				redirect(base_url('login'));
			}
    }
	} //end fungsi login

  public function register()
	{
		$this->_validasiLogin();
		$this->_validasiPrivilege();

		// syarat form
		$this->form_validation->set_rules('daftar-fullname', 'Full Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('daftar-username', 'Username', 'trim|required|min_length[5]|alpha_dash|is_unique[user.username]',
																				array('is_unique' => 'Username already registered.'));
		$this->form_validation->set_rules('daftar-email', 'E-Mail', 'trim|required|valid_email|is_unique[user.email]',
																				array('is_unique' => 'E-Mail already registered.'));
		$this->form_validation->set_rules('daftar-phone', 'Phonenumber', 'trim|required|numeric|is_unique[user.phone]',
																				array('is_unique' => 'Phonenumber already registered.'));
		$this->form_validation->set_rules('daftar-gender', 'Gender', 'required');
		$this->form_validation->set_rules('daftar-password', 'Password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('daftar-verPassword', 'Repeat Password', 'trim|required|matches[daftar-password]');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			// jika syarat form belum terpenuhi (tombol register belum ditekan)
			$header = array(
				'title' => 'Register'
			);
			$this->load->view('v_header_auth', $header);
			$this->load->view('v_register');
			$this->load->view('v_footer_auth');
		}else {
			// jika syarat pada form sudah terpenuhi (tombol register sudah ditekan)

			$code = md5(rand().time());

			$data = array(
				'fullname' => $this->input->post('daftar-fullname'),
				'username' => $this->input->post('daftar-username'),
				'email' => $this->input->post('daftar-email'),
				'phone' => $this->input->post('daftar-phone'),
				'gender' => $this->input->post('daftar-gender'),
				'password' => $this->bcrypt->hash_password($this->input->post('daftar-password',TRUE)),
				'privilege' => 5,
				'activation_code' => $code,
			);

			$register = $this->M_users->create( $data['fullname'], $data['username'], $data['email'], $data['phone'],
			 $data['gender'], $data['password'], $data['privilege'], $data['activation_code'] );

			if ($register) {
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', 'Registration complete !');
				$this->session->set_flashdata('text', 'Please activate your account via email');
				redirect(base_url('login'));
			}else {
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', 'Registration failed !');
				$this->session->set_flashdata('text', 'Please check again your information');
				redirect(base_url('register'));
			}

		}
	}

	public function reset($resetCode = '')
	{
		$this->_validasiLogin();
		$this->_validasiPrivilege();

		if ( $resetCode != '' ) {
      // kalo masuk ke resetpassword/(:any)
			if ( $this->M_users->get_reset_code($resetCode)->num_rows() == 1 ) {
        // cek reset_code nya ada di db atau engga
				$row = $this->M_users->get_reset_code($resetCode)->row();
				echo $row->activation_code;
			}
			// print_r($res);
			die();
		}

		// syarat form
		$this->form_validation->set_rules('reset-email', 'E-Mail', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		$header = array(
			'title' => 'Reset Password'
		);
		if ( $this->form_validation->run() == FALSE ) {
			$this->load->view('v_header_auth', $header);
			$this->load->view('v_reset_password');
			$this->load->view('v_footer_auth');
		}else {
			$this->session->set_flashdata('reset-email', $this->input->post('reset-email'));
			redirect(base_url( 'mail/reset_password' ));
		}
	}

  public function logout(){

    $this->session->sess_destroy();
		redirect(base_url());

  }

}
