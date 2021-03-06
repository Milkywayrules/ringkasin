<!--  -->

  <?php
  	$success    = $this->session->flashdata('success');
  	$ori_url    = $this->session->flashdata('ori_url');
  	$short_url  = $this->session->flashdata('short_url');
  	$custom_url = $this->session->flashdata('custom_url');
  	// $found = $this->session->flashdata('found');

    // ngilangin http sama https dari base_url()
    $base_url = base_url();
    $http  = strpos($base_url, 'http://');
    $https = strpos($base_url, 'https://');
    if ( $http !== FALSE ) {
      $base_url = explode('http://', $base_url);
    }elseif ($https !== TRUE) {
      $base_url = explode('https://', $base_url);
    }
   ?>

    <center>

      <div class="mt-5">
        <h1 id="pendekin">pendekin ?</h1>
  			<h5 id="pendekinaja">disini aja !</h5>
  			<hr style="width:30%;">
      </div>

      <!-- form untuk generate link -->
      <div class="row">
        <div class="col-xl-6 col-lg-7 col-sm-9 col-11 mx-auto my-5">
        <form class="" action="<?php echo base_url('') ?>" method="post">
          <div class="input-group mt-3 mb-3">
              <!-- input box -->
              <input class="form-control form-control-md" type="text" name="url" placeholder="Paste here and magic begins!"  autofocus id="url" value=<?php echo set_value('url') ?>>
              <div class="input-group-append">
                <!-- tombol untuk generate link -->
                <button class="btn btn-outline-dark btn-md " type="submit" name="submit"> <span>Generate !</span> </button>
                <button class="btn btn-outline-danger btn-sm rounded-right" type="reset" name="reset" ><small>Reset?</small></button>
              </div>
          </div>
          <div class="my-1"><small><?php echo form_error('url') ?></small></div>
          <div class="input-group col-10">
            <h5 class="mr-2">Custom url : </h5>
            <input class="form-control form-control-sm col-2 col-lg-3" type="text" placeholder="<?php echo $base_url[1] ?>" disabled>
            <input class="form-control form-control-sm col-4 col-lg-6" type="text" name="custom" placeholder="" id="custom" value=<?php echo set_value('custom') ?>>
          </div>
          <div class="mb-3"><small><?php echo form_error('custom') ?></small></div>
          <?php if ( ! $this->session->userdata('success') ) {
            echo '<small><b>This is a URL shortener</b>, copy and paste your long URL above, <br>wait, and see the magic begins !</small>';
          } ?>
        </form>
        </div>
      </div>
      <!-- jika inputan kosong -->
      <p>	<?php $error = $this->session->flashdata('error');
                if (isset($error)){
                echo $error;
                }
          ?>
      </p>
      <?php
      // 0 == false
        if ( isset($success) ) {
          $resTitle = 'Your link is ready !';
          $resOldLink = 'Your old link : ';
          // $a = strpos($custom_url, 'pndkn_cstm_xx_');
          if ( strpos($custom_url, 'pndkn_cstm_xx_') == 1 ) {
            $resShort = base_url($short_url);
          }else {
            $resShort = base_url($custom_url);
          }
      ?>
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-sm-7 col-9 mx-auto">
              <div class="card border-secondary shadow">
                <div class="card-header">
                  <div class="mb-2">
                    <span><b><?php echo $resTitle ?></b></span>
                  </div>
                  <div class="input-group-append">
                    <input id="myInput" class="form-control" type="text" disabled name="shortUrl" value="<?php echo $resShort ?>">
                  </div>
                  <div class="mt-2">
                    <span>
                      <?php $longUrl = $this->session->flashdata('ori_url');
                      echo $resOldLink . $longUrl; ?>
                    </span>
                  </div>
                </div>
                <div class="card-body">
                  <a href="<?php echo base_url("tralala/{$this->session->qrcode_img}") ?>"><img class="card-img-top col-sm-12 my-2" src="<?php echo base_url("tralala/{$this->session->qrcode_img}") ?>" alt="Card image cap"></a>
                  <a download class="btn btn-success btn-sm btn-block mt-3" href="<?php echo base_url("tralala/{$this->session->qrcode_img}") ?>" style="color:#fff"> Save QR-Code ! </a>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
        $this->session->keep_flashdata('success');
        $this->session->keep_flashdata('ori_url');
        $this->session->keep_flashdata('short_url');
        $this->session->keep_flashdata('custom_url');
        $this->session->keep_flashdata( 'qrcode');
       ?>


    </center>

</div>

<!--  -->
