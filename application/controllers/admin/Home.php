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

class Home extends CI_Controller {

  function __construct(){
      parent::__construct();
      $this->_validasiLogin();
      $this->_validasiPrivilege();
      $this->load->model('M_users');
      $this->load->model('M_url');
  }

	private function _validasiLogin(){
		if ( $this->session->userdata('login') == 0 ) {
			redirect(base_url(), 'refresh');
		}
	}
	private function _validasiPrivilege(){
		// admin privilege 0 - 4
		// user privilege 5++
		if ( $this->session->userdata('privilege') >= 5 ) {
			redirect(base_url(), 'refresh');
		}
	}

	public function index(){
    $header = array(
      'title' => 'Dashboard Admin',
      'active' => 'dashboard',
    );
    $data = array(
      'totAccounts' => count( $this->M_users->get_all() ),
      'totUrl' => count( $this->M_url->get_all() ),
    );
    $this->load->view('admin/v_header', $header);
		$this->load->view('admin/v_home', $data);
    $this->load->view('admin/v_footer');
	}

  public function profile(){
		// syarat form
		$this->form_validation->set_rules('email', 'E-Mail', 'trim');
		$this->form_validation->set_rules('nama', 'Full Name', 'trim');
		$this->form_validation->set_rules('phone', 'Phonenumber', 'trim');

    $header = array(
      'title' => 'Profile Admin',
      'active' => 'profile',
    );
    $data = array(
      'subTitle' => 'Admin Profile',
    );
		if ($this->form_validation->run() == FALSE) {
	    $this->load->view('admin/v_header', $header);
			$this->load->view('admin/v_profile', $data);
	    $this->load->view('admin/v_footer');
		}else {

			$update = $this->M_users->set_info( $this->input->post( 'email' ), $this->input->post( 'nama' ),
			 													$this->input->post( 'phone' ), $this->session->userdata( 'username' ) );
      if ($update) {
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_userdata('name', $this->input->post( 'nama' ));
				$this->session->set_userdata('email', $this->input->post( 'email' ));
				$this->session->set_userdata('phone', $this->input->post( 'phone' ));
				redirect(base_url('admin/profile'));
      }else {
				$this->session->set_flashdata('failed_message', 1);
				redirect(base_url('admin/profile'));
      }
		}
  }

  public function inbox(){
    $header = array(
      'title' => 'Inbox Admin',
      'active' => 'inbox',
    );
    $data = array(
      'subTitle' => 'Admin Inbox',
    );
    $this->load->view('admin/v_header', $header);
    $this->load->view('admin/v_inbox', $data);
    $this->load->view('admin/v_footer');
  }
  
  public function settings(){
    $header = array(
      'title' => 'Settings Admin',
      'active' => 'settings',
    );
    $data = array(
      'subTitle' => 'Admin Settings',
    );
    $this->load->view('admin/v_header', $header);
		$this->load->view('admin/v_settings', $data);
    $this->load->view('admin/v_footer');
  }


}
