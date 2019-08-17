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
  		if ( $this->session->userdata('privilege') < 5 ) {
  			redirect(base_url(), 'refresh');
  		}
  	}

  	public function url(){
      $header = array(
        'title' => 'URL Management',
        'active' => 'url',
        'dataTables' => '1',
      );
      $data = array(
        'subTitle' => 'URL Management',
  			'totUrl' =>  $this->M_url->get_all_by_username( $this->session->userdata( 'username' ) ),
      );

      $this->form_validation->set_rules('edit-url', 'URL Edit', 'trim');

      if ( $this->form_validation->run() == FALSE) {
        $this->load->view('v_header', $header);
        $this->load->view('v_url', $data);
        $this->load->view('v_footer');
      }else {
        redirect(base_url("u/manage/url/{$this->input->post('edit-url')}"));
      }

    }

    public function delete_url(){
      if ( $this->input->post( 'delete_url' ) ) {
      // jika input delete_url isset
        if ($this->M_url->delete_url( '0', $this->input->post( 'delete_url' ) )) {
        // jika delete data berhasil
          $this->session->set_flashdata('success_message', 1);
          $this->session->set_flashdata('title', "Deleted !");
          $this->session->set_flashdata('text', 'Your link successfully deleted');
          redirect(base_url('u/manage/url'));
        }else {
        // jika delete data gagal
          $this->session->set_flashdata('failed_message', 1);
          $this->session->set_flashdata('title', "Error !");
          $this->session->set_flashdata('text', 'Your link not deleted');
          redirect(base_url('u/manage/url'));
        }
      }else {
      // jika input delete_url TIDAK isset
        die('wow');
      }
    }


    // BUAT EDIT LINK ( BELOM SELESE)
    // public function view_url($code = null){
    //   $header = array(
    //     'title' => 'Edit URL info',
    //     'active' => 'edit-url',
    //   );
    //   $data = array(
    //     'subTitle' => 'Edit URL info',
    //   );
    //
    //   // $id = $this->input->post('edit-url');
    //   $res = $this->M_url->get_by_short_url($code);
    //   if ( $res->num_rows() == 1 ) {
    //     $row = $res->row();
    //     // print_r( $row->short_url );
    //     $this->load->view('v_header', $header);
    //     $this->load->view('v_url_edit', $row);
    //     $this->load->view('v_footer');
    //   }else {
    //     show_404();
    //   }
    //
    //
    // }


  }


 ?>
