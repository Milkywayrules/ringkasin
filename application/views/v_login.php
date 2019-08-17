
<!--  -->
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="my-4 col-lg-1 col-sm-3 col-3 mx-auto">
          <a href="<?php echo base_url() ?>"><img src="https://cdn.svgporn.com/logos/astronomer.svg" alt="" width="100%" align='center'></a>
        </div>
        <div class="card o-hidden border-0 shadow-lg my-3">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back !</h1>
                  </div>

                  <?php echo form_open('', 'class="user"'); ?>
                    <div class="form-group">
                      <input name="emailUsername" type="text" class="form-control form-control-user" id="InputEmailUsername" aria-describedby="emailUsernameHelp" placeholder="E-Mail / Username" required autofocus>
                      <sup><?php echo form_error('emailUsername') ?></sup>
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user" id="InputPassword" placeholder="Password" required>
                      <sup><?php echo form_error('password') ?></sup>
                    </div>
                    <div class="form-group">
                      <!-- <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div> -->
                      <br>
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                    <!-- <hr>
                    <div class="g-signin2 d-flex justify-content-center" data-onsuccess="onSignIn" data-theme="dark"></div> -->
                    <!-- <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>

                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('resetpassword') ?>">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('register') ?>">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        var id = profile.getId(); // Don't send this directly to your server!
        var name = profile.getName();
        var imageUrl = profile.getImageUrl();
        var email = profile.getEmail();

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;

        window.location.href = "?id=" + id + "&name=" + name + "&imageUrl=" + imageUrl + "&email=" + email + "&id_token=" + id_token + "&login=1";
      }
    </script>

    <?php

    if ( $this->input->get('login') ) {
      $login    = $this->input->get('login');
      $id       = $this->input->get('id');
      $name     = $this->input->get('name');
      $imageUrl = $this->input->get('imageUrl');
      $email    = $this->input->get('email');
      $idToken  = $this->input->get('id_token');

      die($idToken);
      redirect(base_url('u/dashboard'));
    }

     ?>

<!--  -->
