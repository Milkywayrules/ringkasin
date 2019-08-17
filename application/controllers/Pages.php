<?php

  /**
   *
   */
  class Pages extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
    }

    public function qrcode($qrcode = ''){
      if ( $qrcode == '' ) {
        redirect(base_url());
      }
      $imageContents = file_get_contents( FCPATH . "assets/img/qr/{$qrcode}" );
      header('Content-Type: image/png');
      echo $imageContents;
    }

    public function about (){
      echo "belom ada hehe";
    }

    public function contact_us (){
      $data = array(
        'title' => 'Get connected !',
        'active' => 'contactus',
        'subTitle' => 'Contact us ASAP!',
      );
  		$this->load->view('pages/v_contactus', $data);
    }

    public function comingsoon (){
      $header = array(
        'title' => 'Coming very soon!',
        'active' => 'comingsoon',
      );
      $data = array(
        'subTitle' => 'Coming very soon!',
      );
  		$this->load->view('pages/v_comingsoon', $data);
    }

  }


 ?>
