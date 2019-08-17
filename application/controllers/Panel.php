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

class Panel extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->_validasiLogin();
			$this->_validasiPrivilege();
			$this->load->model('M_url');
			$this->load->model('M_users');

	}

	private function _validasiLogin(){
		if ( $this->session->userdata('login') == 0 ) {
			redirect(base_url(), 'refresh');
		}
	}
	private function _validasiPrivilege(){
		// admin privilege 0 - 4
		// user privilege 5++
		if ( $this->session->userdata('privilege') < 5 ) {
			redirect(base_url(), 'refresh');
		}
	}

// menu navbar kiri

	public function dashboard()
	{
		$header = array(
      'title' => 'Dashboard',
      'active' => 'dashboard',
    );
    $data = array(
      'subTitle' => 'Dashboard User',
			'totUrl' => count( $this->M_url->get_all_by_username($this->session->userdata('username')) ),
			'totUrlCustom' => count( $this->M_url->get_all_custom_by_username($this->session->userdata('username')) ),
    );
		$this->load->view('v_header', $header);
		$this->load->view('v_dashboard', $data);
		$this->load->view('v_footer');
	}

	public function create(){
    $header = array(
      'title' => 'Create',
      'active' => 'create',
    );
    $data = array(
      'subTitle' => 'Create',
    );
		// syarat form
		$this->form_validation->set_rules('url', 'URL', 'trim|required|valid_url');
		$this->form_validation->set_rules('custom', 'custom URL', 'trim|alpha_dash|is_unique[url.custom_url]');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('v_header', $header);
			$this->load->view('v_create', $data);
			$this->load->view('v_footer');
		}else {
			$this->session->set_flashdata('createUrl', $this->input->post('url'));
			if ($this->input->post('custom') == '') {
							$this->session->set_flashdata('createCustom', '_pndkn_cstm_xx_');
			}else{	$this->session->set_flashdata('createCustom', $this->input->post('custom')); }
			redirect('short/create');
		}
  }

// menu sebelah kanan atas

	public function inbox(){
		$header = array(
			'title' => 'Inbox',
			'active' => 'inbox',
		);
		$data = array(
			'subTitle' => 'User inbox',
		);
		$this->load->view('v_header', $header);
		$this->load->view('v_inbox', $data);
		$this->load->view('v_footer');
	}

	public function profile(){
		// syarat form
		$this->form_validation->set_rules('email', 'E-Mail', 'trim');
		$this->form_validation->set_rules('nama', 'Full Name', 'trim');
		$this->form_validation->set_rules('phone', 'Phonenumber', 'trim');

    $header = array(
      'title' => 'Profile',
      'active' => 'profile',
    );
    $data = array(
      'subTitle' => 'Profile',
    );
		if ($this->form_validation->run() == FALSE) {
	    $this->load->view('v_header', $header);
			$this->load->view('v_profile', $data);
	    $this->load->view('v_footer');
		}else {

			$update = $this->M_users->set_info( $this->input->post( 'email' ), $this->input->post( 'nama' ),
			 													$this->input->post( 'phone' ), $this->session->userdata( 'username' ) );
      if ($update) {

				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', "Profile changes saved !");
				$this->session->set_flashdata('text', 'Enjoy your time with pendekin');
				$this->session->set_userdata('name', $this->input->post( 'nama' ));
				$this->session->set_userdata('email', $this->input->post( 'email' ));
				$this->session->set_userdata('phone', $this->input->post( 'phone' ));
				redirect(base_url('u/profile'));
      }else {
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', "Profile changes error !");
				$this->session->set_flashdata('text', 'Please check again or contact us');
				redirect(base_url('u/profile'));
      }
		}
  }

	public function settings(){
    $header = array(
      'title' => 'Settings',
      'active' => 'settings',
    );
    $data = array(
      'subTitle' => 'Settings',
    );
		$this->load->view('v_header', $header);
		$this->load->view('v_settings', $data);
		$this->load->view('v_footer');
  }


}
