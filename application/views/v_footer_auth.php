<!--  -->

  </div> <!-- end of container (v_header) -->

  <?php if ($this->session->userdata('success_message')): ?>
    <script>
    swal({
      title: "<?php echo $this->session->userdata('title'); ?>",
      text: "<?php echo $this->session->userdata('text'); ?>",
      timer: 3000,
      button: false,
      icon: 'success'
    });
    </script>
  <?php endif; ?>
  <?php if ($this->session->userdata('failed_message')): ?>
    <script>
      swal({
         title: "<?php echo $this->session->title; ?>",
         text: "<?php echo $this->session->text; ?>",
         timer: 3000,
         button: false,
         icon: 'error'
      });
    </script>
  <?php endif; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/template/sbadmin/vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/template/sbadmin/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/template/sbadmin/js/sb-admin-2.min.js')?>"></script>

  <!-- Page JS Plugins -->
  <!-- <script src="<?= base_url('assets/js/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/plugins/jquery-validation/additional-methods.min.js'); ?>"></script> -->

  <!-- Page JS Code -->
  <!-- <script src="<?= base_url('assets/js/pages/be_pages_dashboard.js'); ?>"></script>
  <script src="<?= base_url('assets/js/pages/be_forms_wizard.js'); ?>"></script>
  <script src="<?= base_url('assets/js/pages/auth_login.js'); ?>"></script>
  <script src="<?= base_url('assets/js/pages/auth_daftar.js'); ?>"></script>
  <script src="<?= base_url('assets/js/pages/auth_reset.js'); ?>"></script>
  <script src="<?= base_url('assets/js/pages/auth_ubah_pw.js'); ?>"></script> -->

</body>

</html>
