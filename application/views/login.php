<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSO | Login</title>
    <!-- Materialize stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css">
    <!-- Material Icons -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets/img/icon/favicon-96x96.png">

  </head>

  <body class="">
    <div class="wrapper">
      <div class="container valign-wrapper">
        <div class="login valign">
          <div class="logo-pic center-align">
            <img src="<?php echo base_url();?>assets/img/cso_logo.png" alt="" width="200px" class="center-align"/>
          </div>
          <!-- Logo -->
          <h1 class="center-align logo rubik">CSO</h1>
          <h4 class="center-align finance logo rubik">finance</h4>
          <!-- Login Form -->

          <div class="loginForm z-depth-2 grey lighten-4">
            <p class="center-align red-text error">Invalid login credenials.</p>
            <form action="<?php echo site_url('verifyLogin') ?>" method="post">
              <div class="input-field">
                <input type="email" id="email" name="email" class="validate  rubik" required>
                <label for="email">Email</label>
              </div>

              <div class="input-field">
                <input type="password" id="password" name="password" class="validate" required>
                <label for="email">Password</label>
              </div>

              <div class="input-field submitButton row">
                <button type="submit" class="col s12 btn waves-effect waves-light btn-large green">Login</button>
              </div>

            </form>
          </div>

          <div class="socialLine center-align">
            <p>
              Need assistance? Email us at <a href="mailto:cso@dlsu.edu.ph" target="_blank">cso@dlsu.edu.ph</a>
              <br>
              Follow us!
            </p>
            <a href="https://www.facebook.com/CSO.DLSU/" class="btn-flat waves-effect waves-light" target="_blank">
              <i class="fa fa-facebook-official fa-lg" aria-hidden="true"></i>
            </a>
            <a href="https://twitter.com/dlsucso" class="btn-flat waves-effect waves-light" target="_blank">
              <i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i>
            </a>
          </div>


        </div>
      </div>
    </div>


  </body>

  <!-- Jquery & Materialize Scripts -->
  <script src="<?php echo base_url();?>assets/js/jquery-3.1.0.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
  <script type="text/javascript">
  var error = false;
  var logout = false;
  <?php
    $flash = $this->session->flashdata('error_login');
    if(isset($flash)):
  ?>
    error = true;
  <?php endif ?>

  <?php
    if(isset($logout)):
  ?>
   logout = true;
   <?php endif ?>

  if(error){
    //Materialize.toast('Invalid Login Credentials', 4000);
    $('.error').css('visibility', 'visible');
  }

  if(logout){
    Materialize.toast('Logout Successfully', 4000);
  }

  </script>
</html>
