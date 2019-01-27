<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/css/fontastic.css">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <!-- jQuery Circle-->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/css/grasp_mobile_progress_circle-1.0.0.min.css">
  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="<?= base_url()?>assets/backend/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      </head>
      <body>
        <div class="page login-page">
          <div class="container">
            <div class="form-outer text-center d-flex align-items-center">
              <div class="form-inner">
                <div class="logo text-uppercase"><span>Admin</span><strong class="text-primary">Login</strong></div>
                <p><?php
                if(isset($this->site_name)) echo $this->site_name;  ?></p>


          <?php if($error = $this->session->flashdata('login_failed')):?>
                <div class="alert alert-danger">
                  <?= $error; ?>
                </div>
            <?php endif;?>


            <?php echo form_open('Login/user_login',['class'=>'text-left form-validate']); ?>

            <div class="form-group-material">
              <?php 
              $loginUsername = array(
                'name'          => 'loginUsername',
                'id'            => 'login-username',
                'class'         => 'input-material',
                'required'      => 'required',
                'data-msg'      => 'Please enter your Username'
              );
              echo form_input($loginUsername); ?>
              <label for="login-username" class="label-material">Username</label>
            </div>

            <div class="form-group-material">
              <?php 
              $loginPassword = array(
                'name'          => 'loginPassword',
                'id'            => 'login-password',
                'class'         => 'input-material',
                'required'      => 'required',
                'data-msg'      => 'Please enter your Password'
              );
              echo form_password($loginPassword); ?>
              <label for="login-password" class="label-material">Password</label>
            </div>

            <div class="form-group text-center">
              <?php 
              $loginbtn = array(
                'name'          => 'loginbtn',
                'id'            => 'login',
                'class'         => 'btn btn-primary',
                'value'         =>  'Login'  
              );
              echo form_submit($loginbtn);


              ?>
            </div>
          <?php echo  form_close();?>










              <!-- <a href="#" class="forgot-pass">Forgot Password?</a><small>Do not have an account? </small><a href="register.html" class="signup">Signup</a> -->
            </div>
            <div class="copyrights text-center">
              <p>Developed by <a href="#" class="external">LinkUp</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </div>
      <!-- JavaScript files-->
      <script src="<?= base_url();?>assets/backend/vendor/jquery/jquery.min.js"></script>
      <script src="<?= base_url();?>assets/backend/vendor/popper.js/umd/popper.min.js"> </script>
      <script src="<?= base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?= base_url();?>assets/backend/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
      <script src="<?= base_url();?>assets/backend/vendor/jquery.cookie/jquery.cookie.js"> </script>
      <script src="<?= base_url();?>assets/backend/vendor/chart.js/Chart.min.js"></script>
      <script src="<?= base_url();?>assets/backend/vendor/jquery-validation/jquery.validate.min.js"></script>
      <script src="<?= base_url();?>assets/backend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
      <!-- Main File-->
      <script src="<?= base_url();?>assets/backend/js/front.js"></script>
    </body>
    </html>