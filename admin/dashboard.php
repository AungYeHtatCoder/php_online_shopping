<?php
include('layouts/head.php');
?>

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern content-detached-left-sidebar   fixed-navbar" data-open="click"
 data-menu="vertical-menu-modern" data-col="content-detached-left-sidebar">

 <!-- BEGIN: Header-->
 <?php include('layouts/header.php'); ?>
 <!-- END: Header-->


 <!-- BEGIN: Main Menu-->

 <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="main-menu-content">
   <?php include('layouts/sidebar.php'); ?>
  </div>
 </div>

 <!-- END: Main Menu-->
 <div class="app-content content">
  <?php if (isset($_GET['success'])) { ?>
  <div class="alert alert-success alert-dismissible mb-2" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
   </button>
   <strong>Success!</strong> You have successfully Login.
  </div>
  <?php } ?>
 </div>
 <!-- BEGIN: Content-->

 <!-- END: Content-->
 <div></div>
 <div class="sidenav-overlay"></div>
 <div class="drag-target"></div>

 <!-- BEGIN: Footer-->
 <?php include('layouts/footer.php'); ?>