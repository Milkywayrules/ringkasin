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

class Home extends CI_Controller {

	function __construct(){
			parent::__construct();
	}

	public function index()
	{
		// echo $this->bcrypt->hash_password('hmif');die();
		// syarat form
		$this->form_validation->set_rules('url', 'URL', 'trim|required|valid_url');
		$this->form_validation->set_rules('custom', 'custom URL', 'trim|alpha_dash|is_unique[url.custom_url]');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('v_home');
		}else {
			// $this->load->view('v_home');
			$this->session->set_flashdata('createUrl', $this->input->post('url'));
			if ($this->input->post('custom') == '') {
							$this->session->set_flashdata('createCustom', '_rnkgsn_cstm_xx_');
			}else{	$this->session->set_flashdata('createCustom', $this->input->post('custom')); }
			redirect('short/create');
		}
	}

}
