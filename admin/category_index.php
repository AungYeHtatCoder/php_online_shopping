<?php
include('../vendor/autoload.php');
use App\OnlineShopping\Database\MySQL;
use App\OnlineShopping\Database\CategoryTable;
use Carbon\Carbon;
$db = new CategoryTable(new MySQL());
$categories = $db->CategoryIndex();
?>
<?php
include('layouts/head.php');
?>
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/autoFill.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/colReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/fixedColumns.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/select.dataTables.min.css">

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
     <h3 class="content-header-title mb-0 d-inline-block">Product Category AutoFill Datatable</h3>
     <div class="row breadcrumbs-top d-inline-block">
      <div class="breadcrumb-wrapper col-12">
       <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="#">DataTables</a>
        </li>
        <li class="breadcrumb-item active">Category Datatable
        </li>
       </ol>
      </div>
     </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
     <div class="btn-group float-md-right">
      <button class="btn btn-info dropdown-toggle mb-1" type="button" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false">Action</button>
      <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i>
        Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a
        class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
       <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
      </div>
     </div>
    </div>
   </div>
   <div class="content-body">
    <!-- Auto Fill table -->
    <section id="autofill">
     <div class="row">
      <div class="col-12">
       <div class="card">
        <div class="card-header">
         <h4 class="card-title"><span><a href="category_create_form.php" class="btn btn-primary"> + Category
            Create</a></span></h4>
         <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
         <div class="heading-elements">
          <ul class="list-inline mb-0">
           <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
           <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
           <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
           <li><a data-action="close"><i class="ft-x"></i></a></li>
          </ul>
         </div>
        </div>
        <div class="card-content collapse show">
         <div class="card-body card-dashboard">
          <p class="card-text">AutoFill gives an Excel like option to a DataTable to click and drag over multiple cells,
           filling in information over the selected cells and incrementing numbers as needed.</p>
          <div class="table-responsive">
           <table class="table table-striped table-bordered auto-fill">
            <thead>
             <tr>
              <th>ID</th>
              <th>Category Name</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
             </tr>
            </thead>
            <tbody>
             <tr>
              <?php
             foreach ($categories as $key => $value) :
             ?>
              <td><?= $value->id ?></td>
              <td><?= $value->category_name ?></td>
              <!-- date format with carbon -->
              <td>
               <?php 
               $carbon_date = new Carbon($value->created_at);
               echo $carbon_date->format('F j, Y');
               ?>
              </td>
              <td>
               <?php 
               $carbon_date = new Carbon($value->updated_at);
               echo $carbon_date->format('F j, Y');
               ?>
              <td>
               <a href="category_edit_form.php?id=<?= $value->id ?>" class="btn btn-primary">Edit</a>
               <a href="category_delete.php?id=<?= $value->id ?>" class="btn btn-danger">Delete</a>
              </td>
             </tr>
             <?php endforeach; ?>

            </tbody>
            <tfoot>
             <tr>
              <th>ID</th>
              <th>Category Name</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
             </tr>
            </tfoot>
           </table>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </section>
    <!--/ Auto Fill table -->
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

 <script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
 <script src="app-assets/vendors/js/tables/datatable/dataTables.autoFill.min.js"></script>
 <script src="app-assets/vendors/js/tables/datatable/dataTables.colReorder.min.js"></script>
 <script src="app-assets/vendors/js/tables/datatable/dataTables.fixedColumns.min.js"></script>
 <script src="app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
 <script src="app-assets/js/scripts/tables/datatables-extensions/datatable-autofill.js"></script>