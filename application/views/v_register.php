
<!--  -->

    <div class="my-4 col-lg-1 col-sm-3 col-3 mx-auto">
      <a href="<?php echo base_url() ?>"><img src="https://cdn.svgporn.com/logos/astronomer.svg" alt="" width="80%" align='center'></a>
    </div>
    <div class="card o-hidden border-0 shadow-lg my-3">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account !</h1>
              </div>

              <form class="user js-validation-signup" method="post" action="<?php echo base_url('register') ?>">
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input name="daftar-username" type="text" class="form-control form-control-user <?= form_error('daftar-username') ? 'is-invalid' : '' ?>" id="daftar-username" placeholder="Username" value=<?php echo set_value('daftar-username') ?>>
                    <sup><?php echo form_error('daftar-username') ?></sup>
                  </div>
                  <div class="col-sm-6">
                    <input name="daftar-email" type="text" class="form-control form-control-user <?= form_error('daftar-email') ? 'is-invalid' : '' ?>" id="daftar-Email" placeholder="Email Address" value=<?php echo set_value('daftar-email') ?>>
                    <sup><?php echo form_error('daftar-email') ?></sup>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input name="daftar-fullname" type="text" class="form-control form-control-user <?= form_error('daftar-fullname') ? 'is-invalid' : '' ?>" id="daftar-FullName" placeholder="Full Name" value=<?php echo set_value('daftar-fullname') ?>>
                    <sup><?php echo form_error('daftar-fullname') ?></sup>
                  </div>
                  <div class="col-sm-6">
                    <input type="tel" name="daftar-phone" class="form-control form-control-user <?= form_error('daftar-phone') ? 'is-invalid' : '' ?>" id="daftar-Phone" placeholder="Phone Number" value=<?php echo set_value('daftar-phone') ?>>
                    <sup><?php echo form_error('daftar-phone') ?></sup>
                  </div>
                </div>
                <div class="form-group  <?= form_error('daftar-gender') ? 'is-invalid' : '' ?>">
                  <center>
                  <!-- <div class="col-sm-3 mb-3 mb-sm-0"> -->
                    <input type="radio" name="daftar-gender" value="M" id="daftar-Male">
                  <!-- </div> -->
                  <!-- <div class="col-sm-3 mb-3 mb-sm-0"> -->
                    <label for="daftar-Male">Male</label>
                  <!-- </div> -->

                  <!-- <div class="col-sm-3 mb-3 mb-sm-0"> -->
                    <input type="radio" name="daftar-gender" value="F" id="daftar-Female">
                  <!-- </div> -->
                  <!-- <div class="col-sm-3 mb-3 mb-sm-0"> -->
                    <label for="daftar-Female">Female</label>
                  <!-- </div> -->
                  </center>
                  <sub><center>
                    <?php echo form_error('daftar-gender') ?>
                  </sub></center>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="daftar-password" type="password" class="form-control form-control-user <?= form_error('daftar-password') ? 'is-invalid' : '' ?>" id="daftar-Password" placeholder="Password" >
                    <sup><?php echo form_error('daftar-password') ?></sup>
                  </div>
                  <div class="col-sm-6">
                    <input name="daftar-verPassword" type="password" class="form-control form-control-user <?= form_error('daftar-verPassword') ? 'is-invalid' : '' ?>" id="daftar-VerPassword" placeholder="Repeat Password" >
                    <sup><?php echo form_error('daftar-verPassword') ?></sup>
                  </div>
                </div>
                <input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block">
                <!-- <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?php echo base_url('resetpassword') ?>">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?php echo base_url('login') ?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!--  -->
