<?php 
include('../vendor/autoload.php');
use App\OnlineShopping\Database\MySQL;
use App\OnlineShopping\Database\ProductTable;
use Helpers\HTTP;
$db = new ProductTable(new MySQL);
$products = $db->ProductIndex();
$count_page = count($products);

$start = $count_page; 
$limit = 12;

$per_page = ceil($start / $limit);

if(isset($_GET['page'])) {
 $page = $_GET['page'];
 $start = ($page - 1) * $limit;
} else {
 $page = 1;
}

$offset = ($page - 1) * $limit;

$product_data = $db->ProductPagination($offset, $limit);
// 
if(isset($_POST['search'])) {
 $search = $_POST['search'];
 $product_search = $db->ProductSearch($search);
}else {
 $product_search = $db->ProductIndex();
}
// echo "<pre>";
// print_r($product_search);
// echo "</pre>";
// die();
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
     <h3 class="content-header-title mb-0 d-inline-block">Shops</h3>
     <div class="row breadcrumbs-top d-inline-block">
      <div class="breadcrumb-wrapper col-12">
       <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Shop
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
   <div class="content-detached content-right">
    <div class="content-body">
     <div class="product-shop">
      <div class="card">
       <div class="card-body">
        <span class="shop-title">Back To Products List <a href="product_index.php" class="btn btn-primary">
          < < </a></span>
        <span class="float-right">
         <span class="result-text mr-1"> Showing 12 of 203 results</span>
         <span class="display-buttons">
          <a href="#" class="active"><i class="ft-grid font-medium-2"></i></a>
          <a href="#"><i class="ft-list font-medium-2"></i></a>
         </span>
        </span>
       </div>
      </div>
      <div class="row match-height">
       <?php foreach($product_search as $product) : ?>
       <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <div class="card pull-up">
         <div class="card-content">
          <div class="card-body">
           <a href="ecommerce-product-detail.html">
            <div class="product-img d-flex align-items-center">
             <div class="badge badge-success round">-50%</div>
             <img class="img-fluid mb-1" src="<?= $product->file_name; ?>" alt="Card image cap">
            </div>
            <h4 class="product-title"><?= $product->product_name; ?></h4>
            <div class="price-reviews">
             <span class="price-box">
              <span class="price">$ <?= $product->price; ?></span>
              <span class="old-price">$ <?= $product->old_price; ?></span>
             </span>
             <span class="ratings float-right"></span>
            </div>
           </a>
           <div class="product-action d-flex justify-content-around">
            <a href="#like" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
              class="ft-heart"></i></a><span class="saperator">|</span>
            <a href="product_detail.php?id=<?= $product->id; ?>" data-toggle="tooltip" data-placement="top"
             title="Quick View"><i class="ft-eye"></i></a><span class="saperator">|</span>
            <a href="#compare" data-toggle="tooltip" data-placement="top" title="Compare"><i
              class="ft-sliders"></i></a><span class="saperator">|</span>
            <a href="#cart" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
              class="ft-shopping-cart"></i></a>
           </div>
          </div>
         </div>
        </div>
       </div>

       <?php endforeach; ?>

       <div class="col-12">
        <div class="card">
         <div class="card-content">
          <ul class="pagination justify-content-center pagination-separate pagination-flat">
           <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
             <span aria-hidden="true">&laquo;</span>
             <span class="sr-only">Previous</span>
            </a>
           </li>
           <?php 
          for($i=1; $i<=$per_page; $i++) :
          ?>
           <li class="page-item"><a class="page-link" href="product_index.php?page=<?= $i ?>"><?= $i ?></a>
           </li>
           <?php endfor; ?>

           <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
             <span aria-hidden="true">&raquo;</span>
             <span class="sr-only">Next</span>
            </a>
           </li>
          </ul>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class="sidebar-detached sidebar-left">
    <div class="sidebar">
     <div class="sidebar-content d-none d-lg-block sidebar-shop">
      <div class="card">
       <div class="card-body">
        <form action="product_search_result.php" method="post">
         <div class="search">
          <input id="basic-search" name="search" type="text" placeholder="Search here..." class="basic-search">
          <!-- search submit button -->
          <i type="submit" class="ficon ft-search"></i>
         </div>
        </form>
       </div>
      </div>
      <div class="card">
       <div class="card-body">
        <div class="categories-list">
         <div class="category-title pb-1">
          <h4 class="card-title mb-0">Categories</h4>
          <hr>
         </div>
         <div class="product-cat" id="categories">
          <ul class="treeview">
           <li><span>Watches</span>
            <ul>
             <li><span>Apple Watch</span></li>
             <li><span>Fitbit</span></li>
            </ul>
           </li>
           <li><span>Tablets</span>
            <ul>
             <li><span>iPad</span></li>
             <li><span>iPad Pro</span></li>
            </ul>
           </li>
           <li class="open"><span>Laptops</span>
            <ul>
             <li class="active"><span>Mac</span></li>
             <li><span>Mac Pro</span></li>
            </ul>
           </li>
           <li><span>Phone</span>
            <ul>
             <li><span>iPhone 9</span></li>
             <li><span>iPhone X</span></li>
             <li><span>iPhone Pro</span></li>
            </ul>
           </li>
          </ul>
         </div>
        </div>
        <!-- /Categories List -->

        <!-- /Price Range -->
        <div class="price-range">
         <div class="category-title mt-3 pb-1">
          <h4 class="card-title mb-0">Price</h4>
          <hr>
         </div>
         <div class="price-slider">
          <div class="price_slider_amount mb-2">
           <div class="range-amt"><strong>Price Range : </strong> <span class="range-val" id="lower-value"></span>
            - <span class="range-val" id="upper-value"></span></div>
          </div>
          <div class="form-group">
           <div class="slider-sm slider-success my-1" id="small-slider"></div>
          </div>
         </div>
        </div>
        <!-- /Price Range -->


        <!-- Striped Progress sample -->
        <div class="size">
         <div class="category-title mt-3 pb-1">
          <h4 class="card-title mb-0">Size</h4>
          <hr>
         </div>
         <div class="size-filter">
          <ul>
           <li><a href="#">XL</a></li>
           <li><a href="#">L</a></li>
           <li class="active"><a href="#">M</a></li>
           <li><a href="#">S</a></li>
           <li><a href="#">XS</a></li>
          </ul>
         </div>
        </div>
        <!-- /Striped Progress sample -->

        <!-- Color Options -->
        <div class="color-filter">
         <div class="category-title mt-3 pb-1">
          <h4 class="card-title mb-0">Color</h4>
          <hr>
         </div>
         <div class="sidebar-list">
          <ul class="skin-square skin">
           <li>
            <input type="checkbox" class="white" id="color-white">
            <label for="color-white">
             <a href="#">
              <span class="color-info white"></span>
              White <span class="count">(4)</span>
             </a>
            </label>
           </li>
           <li>
            <input type="checkbox" class="black" id="color-black">
            <label for="color-black">
             <a href="#">
              <span class="color-info black"></span>
              Black <span class="count">(5)</span>
             </a>
            </label>
           </li>
           <li>
            <input type="checkbox" class="amber" id="color-amber">
            <label for="color-amber">
             <a href="#">
              <span class="color-info amber"></span>
              Amber <span class="count">(6)</span>
             </a>
            </label>
           </li>
           <li>
            <input type="checkbox" class="blue" id="color-blue">
            <label for="color-blue">
             <a href="#">
              <span class="color-info blue"></span>
              Blue <span class="count">(3)</span>
             </a>
            </label>
           </li>
           <li>
            <input type="checkbox" class="success" id="color-success">
            <label for="color-success">
             <a href="#">
              <span class="color-info success"></span>
              Green <span class="count">(1)</span>
             </a>
            </label>
           </li>
           <li>
            <input type="checkbox" class="pink" id="color-pink">
            <label for="color-pink">
             <a href="#">
              <span class="color-info pink"></span>
              Pink <span class="count">(2)</span>
             </a>
            </label>
           </li>
           <li>
            <input type="checkbox" class="yellow" id="color-yellow">
            <label for="color-yellow">
             <a href="#">
              <span class="color-info yellow"></span>
              Yellow <span class="count">(5)</span>
             </a>
            </label>
           </li>
           <li>
            <input type="checkbox" class="teal" id="color-teal">
            <label for="color-teal">
             <a href="#">
              <span class="color-info teal"></span>
              Teal <span class="count">(3)</span>
             </a>
            </label>
           </li>
           <li>
            <input type="checkbox" class="red" id="color-red">
            <label for="color-red">
             <a href="#">
              <span class="color-info red"></span>
              Red <span class="count">(3)</span>
             </a>
            </label>
           </li>
          </ul>
         </div>
        </div>
        <!-- /Color Options -->

        <!-- Brands -->
        <div class="brands">
         <div class="category-title mt-3 pb-1">
          <h4 class="card-title mb-0">Brands</h4>
          <hr>
         </div>
         <div class="search-box">
          <input id="brandInput" type="text" placeholder="Search Brand" class="product-search">
          <i class="ficon ft-search"></i>
         </div>
         <div class="sidebar-list" id="brands">
          <ul class="skin-square skin">
           <li><input type="checkbox" class="apple" id="apple"><label for="apple"> <a href="#">Apple <span
               class="count">(4)</span></a></label></li>
           <li><input type="checkbox" class="lenovo" id="lenovo"><label for="lenovo"> <a href="#"> Lenovo
              <span class="count">(5)</span></a></label></li>
           <li><input type="checkbox" class="fitbit" id="fitbit"><label for="fitbit"><a href="#"> Fitbit
              <span class="count">(6)</span></a></label></li>
           <li><input type="checkbox" class="samsung" id="samsung"><label for="samsung"><a href="#">
              Samsung <span class="count">(3)</span></a></label></li>
           <li><input type="checkbox" class="garmin" id="garmin"><label for="garmin"><a href="#"> Garmin
              <span class="count">(7)</span></a></label></li>
           <li><input type="checkbox" class="fossil" id="fossil"><label for="fossil"><a href="#"> Fossil
              <span class="count">(8)</span></a></label></li>
           <li><input type="checkbox" class="sony" id="sony"><label for="sony"><a href="#"> Sony <span
               class="count">(5)</span></a></label></li>
           <li><input type="checkbox" class="htc" id="htc"><label for="htc"><a href="#"> HTC <span
               class="count">(10)</span></a></label></li>
           <li><input type="checkbox" class="microsft" id="microsft"><label for="microsft"><a href="#">
              Microsft <span class="count">(11)</span></a></label></li>
           <li><input type="checkbox" class="google" id="google"><label for="google"><a href="#"> Google
              <span class="count">(9)</span></a></label></li>
           <li><input type="checkbox" class="xaomi" id="xaomi"><label for="xaomi"><a href="#"> Xaomi <span
               class="count">(8)</span></a></label></li>
          </ul>
         </div>
        </div>
        <!-- /Brand -->

        <!-- Featured Image -->
        <div class="featured">
         <div class="category-title mt-3 pb-1">
          <h4 class="card-title mb-0">Featured</h4>
          <hr>
         </div>
         <div class="featured-image bg-success bg-lighten-2">
          <a href="ecommerce-product-detail.html">
           <div class="badge badge-danger">Best Deal</div>
           <img src="app-assets/images/elements/samsung-gear.png" alt="">
          </a>
         </div>
        </div>
        <!-- /Featured Image -->
       </div>
      </div>
     </div>
    </div>
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