<?php

  /**
   *
   */
  class Manage extends CI_Controller
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

    public function accounts(){
      $header = array(
        'title' => 'Account Management',
        'active' => 'manageAccounts',
        'dataTables' => '1',
      );
      $data = array(
        'subTitle' => 'Account Management',
        'totAccount' => $this->M_users->get_all(),
      );

      $this->load->view('admin/v_header', $header);
      $this->load->view('admin/v_accounts', $data);
      $this->load->view('admin/v_footer');
    }

    public function url(){
      $header = array(
        'title' => 'Link (URL) Management',
        'active' => 'manageUrl',
        'dataTables' => '1',
      );
      $data = array(
        'subTitle' => 'Link (URL) Management',
        'totUrl' => $this->M_url->get_all(),
      );

      $this->load->view('admin/v_header', $header);
      $this->load->view('admin/v_url', $data);
      $this->load->view('admin/v_footer');
    }

    // public function generatereport(){
    //   $header = array(
    //     'title' => 'Report Admin',
    //     'active' => 'manageGeneratereport',
    //   );
    //   $data = array(
    //     'subTitle' => 'Admin Report',
    //   );
    //   $this->load->view('admin/v_header', $header);
    //   $this->load->view('admin/v_report', $data);
    //   $this->load->view('admin/v_footer');
    // }


  }


 ?>
