<div class="row">
    <div class="col-lg-12">
        <div class="block">
            <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Add new admin</a>
                </li>
            </ul>

            <div class="block-content tab-content pb-30">
              <div class="tab-pane active" id="info-umum" role="tabpanel">
                  <div class="row justify-content-center">
                      <div class="col-7 col-sm-6 my-5">

                          <form method="post">
                              <div class="form-group row">
                                  <label class="col-lg-4 col-form-label" >Username <sup>*</sup> </label>
                                  <div class="col-lg-8">
                                      <input type="text" id="username" class="form-control <?php if(form_error('username') !== ''){ echo 'is-invalid'; } ?>" name="username" placeholder="Username" required>
                                      <div class="form-text text-danger"><?php echo form_error('username') ?></div>
                                  </div>
                              </div>
                               <div class="form-group row">
                                  <label class="col-lg-4 col-form-label" >E-mail <sup>*</sup> </label>
                                  <div class="col-lg-8">
                                      <input type="email" id="email" class="form-control <?php if(form_error('email') !== ''){ echo 'is-invalid'; } ?>" name="email" placeholder="E-mail" required>
                                      <div class="form-text text-danger"><?php echo form_error('email') ?></div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Full Name <sup>*</sup> </label>
                                <div class="col-lg-8">
                                  <input type="text" id="nama" class="form-control <?php if(form_error('nama') !== ''){ echo 'is-invalid'; } ?>" name="nama" placeholder="Full Name" required>
                                  <div class="form-text text-danger"><?php echo form_error('nama') ?></div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Gender <sup>*</sup> </label>
                                <div class="col-lg-8">
                                  <input type="radio" name="gender" value="M" id="Male" required>  <label for="Male">Male</label>
                                  <input type="radio" name="gender" value="F" id="Female" required> <label for="Female">Female</label>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Phone Number <sup>*</sup> </label>
                                <div class="col-lg-8">
                                  <input type="text" id="phone" class="form-control <?php if(form_error('phone') !== ''){ echo 'is-invalid'; } ?>" name="phone" placeholder="Phone Number" required>
                                  <div class="form-text text-danger"><?php echo form_error('phone') ?></div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Privilege <sup>*</sup> </label>
                                <div class="col-lg-8">
                                  <input type="text" id="privilege" class="form-control <?php if(form_error('privilege') !== ''){ echo 'is-invalid'; } ?>" value="2" name="privilege" placeholder="Privilege" disabled>
                                  <div class="form-text text-danger"><?php echo form_error('privilege') ?></div>
                                </div>
                              </div>
                              <div class="row justify-content-center">
                                <div class="col-lg-12">
                                  <button type="submit" class="btn btn-success text-black btn-lg btn-block" >Add</button>
                                </div>
                              </div>
                          </form>

                      </div>
                  </div>
              </div>

            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
    }

    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    })
</script>
