<?php

  /**
   *
   *-accounts
   *-url
   *-inbox
   *-generatereport
   *
   *
   *
   *
   */
  class Panel extends CI_Controller
  {

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

    public function url(){
      $header = array(
        'title' => 'Create Short URL',
        'active' => 'url',
      );
      $data = array(
        'subTitle' => 'Create Short URL',
      );
      // syarat form
  		$this->form_validation->set_rules('url', 'URL', 'trim|required|valid_url');
  		$this->form_validation->set_rules('custom', 'custom URL', 'trim|alpha_dash|is_unique[url.custom_url]');
  		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

  		if ($this->form_validation->run() == FALSE) {
        $this->load->view('admin/v_header', $header);
    		$this->load->view('admin/v_create', $data);
        $this->load->view('admin/v_footer');
  		}else {
  			$this->session->set_flashdata('createUrl', $this->input->post('url'));
  			if ($this->input->post('custom') == '') {
  							$this->session->set_flashdata('createCustom', '_rngks_cstm_xx_');
  			}else{	$this->session->set_flashdata('createCustom', $this->input->post('custom')); }
  			redirect('short/create');
      }
    }

    public function add(){
      $header = array(
        'title' => 'Add New Admin',
        'active' => 'add',
      );
      $data = array(
        'subTitle' => 'Add new admin',
      );
      $this->load->view('admin/v_header', $header);
  		$this->load->view('admin/v_add', $data);
      $this->load->view('admin/v_footer');
    }

  }


 ?>
