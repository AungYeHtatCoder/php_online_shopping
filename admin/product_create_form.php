<?php 
include('../vendor/autoload.php');
use App\OnlineShopping\Database\MySQL;
use App\OnlineShopping\Database\CategoryTable;
$db = new CategoryTable(new MySQL());
$categories = $db->CategoryIndex();
?>
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
  <div class="content-overlay"></div>
  <div class="content-wrapper">
   <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
     <h3 class="content-header-title mb-0 d-inline-block">Product Create Dashboard</h3>
     <div class="row breadcrumbs-top d-inline-block">
      <div class="breadcrumb-wrapper col-12">
       <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="product_index.php">Go to Product List</a>
        </li>
        <li class="breadcrumb-item"><a href="#">Pages</a>
        </li>
        <li class="breadcrumb-item active">Product Create
        </li>
       </ol>
      </div>
     </div>
    </div>
    <!-- <div class="content-header-right col-md-6 col-12">
     <div class="btn-group float-md-right">
      <button class="btn btn-info dropdown-toggle mb-1" type="button" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false">Action</button>
      <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i>
        Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a
        class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
       <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
      </div>
     </div>
    </div> -->
   </div>
   <div class="content-body">
    <!-- account setting page start -->
    <section id="page-account-settings">
     <div class="row">
      <!-- left menu section -->

      <!-- right content section -->
      <div class="col-md-9">
       <div class="card">
        <div class="card-content">
         <div class="card-body">
          <div class="tab-content">
           <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
            aria-labelledby="account-pill-general" aria-expanded="true">
            <form novalidate method="post" action="../_actions/product_create.php" enctype="multipart/form-data">
             <div class="row">
              <div class="col-12">
               <div class="form-group">
                <div class="controls">
                 <label for="account-username">Product Name</label>
                 <input type="text" class="form-control" id="account-username" placeholder="Product Category Name"
                  name="product_name" required data-validation-required-message="This Product Name field is required">
                </div>
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <label for="accountSelect">Category Name</label>
                <select name="category_id" class="form-control" id="accountSelect">
                 <option value="">Choose Category Name</option>
                 <?php 
                  foreach($categories as $key => $category):
                  ?>
                 <!-- option and selected old data -->
                 <option value="<?= $category->id?>">
                  <?= $category->category_name ?>
                 </option>
                 <?php endforeach;?>
                </select>
               </div>
              </div>

              <div class="col-12">
               <div class="form-group">
                <div class="controls">
                 <label for="account-username">Product Price</label>
                 <input type="text" class="form-control" id="account-username" placeholder="Product New Price "
                  name="price" required data-validation-required-message="This Product Price field is required">
                </div>
               </div>
              </div>

              <div class="col-12">
               <div class="form-group">
                <div class="controls">
                 <label for="account-username">Product Old Price</label>
                 <input type="text" class="form-control" id="account-username" placeholder="Product Category Name"
                  name="old_price" required data-validation-required-message="This Product Old Price field is required">
                </div>
               </div>
              </div>

              <div class="col-12">
               <div class="form-group">
                <div class="controls">
                 <label for="account-username">Product Description</label>
                 <input type="text" class="form-control" id="account-username" placeholder="Product Category Name"
                  name="description" required
                  data-validation-required-message="This Product Description field is required">
                </div>
               </div>
              </div>
              <div class="col-12">
               <div class="form-group">
                <div class="controls">
                 <label for="account-username">Product Image</label>
                 <input type="file" class="form-control" id="account-username" name="file_name" required
                  data-validation-required-message="This Product file Name field is required">
                </div>
               </div>
              </div>
              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
               <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                changes</button>
               <button type="reset" class="btn btn-light">Cancel</button>
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
    </section>
    <!-- account setting page end -->
   </div>
  </div>
 </div>
 <!-- BEGIN: Content-->

 <!-- END: Content-->
 <div></div>
 <div class="sidenav-overlay"></div>
 <div class="drag-target"></div>

 <!-- BEGIN: Footer-->
 <?php include('layouts/footer.php'); ?>