<?php
include('includes/head.php');
?>
<link rel="stylesheet" type="text/css" href="admin/app-assets/vendors/css/forms/icheck/icheck.css">

<link rel="stylesheet" type="text/css" href="admin/app-assets/vendors/css/forms/icheck/custom.css">
<link rel="stylesheet" type="text/css" href="admin/app-assets/css/pages/login-register.css">


<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern content-detached-left-sidebar   fixed-navbar" data-open="click"
 data-menu="vertical-menu-modern" data-col="content-detached-left-sidebar">

 <!-- BEGIN: Header-->
 <?php include('includes/header.php'); ?>
 <!-- END: Header-->


 <!-- BEGIN: Main Menu-->

 <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="main-menu-content">
   <?php //include('includes/sidebar.php'); ?>
  </div>
 </div>

 <!-- END: Main Menu-->
 <!-- BEGIN: Content-->
 <div class="app-content content">
  <div class="content-overlay"></div>
  <div class="content-wrapper">
   <div class="content-header row">
   </div>
   <div class="content-body">
    <section class="row flexbox-container">
     <div class="col-12 d-flex align-items-center justify-content-center">
      <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
       <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
        <div class="card-header border-0">
         <div class="card-title text-center">
          <img src="admin/app-assets/images/logo/logo-dark.png" alt="branding logo">
         </div>
         <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Easily Using</span></h6>
        </div>
        <div class="card-content">
         <div class="text-center">
          <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span
            class="la la-facebook"></span></a>
          <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter"><span class="la la-twitter"></span></a>
          <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin"><span
            class="la la-linkedin font-medium-4"></span></a>
          <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-github"><span
            class="la la-github font-medium-4"></span></a>
         </div>
         <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>OR Using Account
           Details</span></p>
         <div class="card-body">
          <!-- register success alert message -->
          <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success alert-dismissible mb-2" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
           </button>
           <strong>Success!</strong> You have successfully registered.
          </div>
          <?php } ?>
          <form class="form-horizontal" action="_actions/login.php" novalidate method="post">
           <fieldset class="form-group position-relative has-icon-left">
            <input type="email" class="form-control" name="email" id="user-name" placeholder="Your Email" required>
            <div class="form-control-position">
             <i class="la la-user"></i>
            </div>
           </fieldset>
           <fieldset class="form-group position-relative has-icon-left">
            <input type="password" class="form-control" name="password" id="user-password" placeholder="Enter Password"
             required>
            <div class="form-control-position">
             <i class="la la-key"></i>
            </div>
           </fieldset>
           <div class="form-group row">
            <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
             <fieldset>
              <input type="checkbox" id="remember-me" class="chk-remember">
              <label for="remember-me"> Remember Me</label>
             </fieldset>
            </div>
            <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html"
              class="card-link">Forgot Password?</a></div>
           </div>
           <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
          </form>
         </div>
         <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>New to Modern
           ?</span></p>
         <div class="card-body">
          <a href="reg_form.php" class="btn btn-outline-danger btn-block"><i class="la la-user"></i>
           Register</a>
         </div>
        </div>
       </div>
      </div>
     </div>
    </section>

   </div>
  </div>
 </div>
 <!-- END: Content-->
 <div></div>
 <div class="sidenav-overlay"></div>
 <div class="drag-target"></div>

 <!-- BEGIN: Footer-->
 <?php include('includes/footer.php'); ?>

 <script src="admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
 <script src="admin/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
 <script src="admin/app-assets/js/scripts/forms/form-login-register.js"></script>