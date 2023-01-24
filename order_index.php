<?php
//session_start();
include('vendor/autoload.php');
use Helpers\Auth;
$auth = Auth::check();
if(isset($_SESSION['cart']))
{
$cart = $_SESSION['cart'];
}
// echo "<pre>";
// echo print_r($cart);
// echo "</pre>";

// $data = count($cart);
// echo $data * $cart['price'];
// die();
?>

<?php
include('includes/order_css.php');
?>
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern content-detached-left-sidebar   fixed-navbar" data-open="click"
 data-menu="vertical-menu-modern" data-col="content-detached-left-sidebar">

 <!-- BEGIN: Header-->
 <?php include('includes/header.php'); ?>
 <!-- END: Header-->


 <!-- BEGIN: Main Menu-->

 <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="main-menu-content">
   <?php include('includes/sidebar.php'); ?>
  </div>
 </div>

 <!-- END: Main Menu-->
 <!-- BEGIN: Content-->
 <div class="app-content content">
  <div class="content-overlay"></div>
  <div class="content-wrapper">
   <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
     <h3 class="content-header-title mb-0 d-inline-block">
      Shopping Cart
     </h3>
     <div class="row breadcrumbs-top d-inline-block">
      <div class="breadcrumb-wrapper col-12">
       <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Shopping Cart</li>
       </ol>
      </div>
     </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
     <div class="btn-group float-md-right">
      <button class="btn btn-info dropdown-toggle mb-1" type="button" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false">
       Action
      </button>
      <div class="dropdown-menu arrow">
       <a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i> Calender</a><a class="dropdown-item"
        href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i
         class="fa fa-life-ring mr-1"></i> Support</a>
       <div class="dropdown-divider"></div>
       <a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
      </div>
     </div>
    </div>
   </div>
   <div class="content-body">
    <div class="shopping-cart">
     <ul class="nav nav-tabs nav-justified">
      <li class="nav-item">
       <a class="nav-link active" id="shopping-cart" data-toggle="tab" aria-controls="shop-cart-tab"
        href="#shop-cart-tab" aria-expanded="true">Shopping Cart</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" id="checkout" data-toggle="tab" aria-controls="checkout-tab" href="#checkout-tab"
        aria-expanded="false">Checkout</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" id="complete-order" data-toggle="tab" aria-controls="comp-order-tab" href="#comp-order-tab"
        aria-expanded="false">Complete Order</a>
      </li>
     </ul>
     <div class="tab-content pt-1">
      <div role="tabpanel" class="tab-pane active" id="shop-cart-tab" aria-expanded="true"
       aria-labelledby="shopping-cart">
       <div class="card">
        <div class="card-content">
         <div class="card-body">
          <div class="table-responsive">
           <table class="table table-borderless mb-0">
            <thead>
             <tr>
              <th>Product</th>
              <th>Details</th>
              <th>No. Of Products</th>
              <th>Total</th>
              <th>Action</th>
             </tr>
            </thead>
            <tbody>
             <tr>
              <?php 
              foreach($cart as $key => $product): 
               $total = $product['qty'] * $product['price'];
              ?>
              <td>
               <div class="product-img d-flex align-items-center">
                <img class="img-fluid" src="<?= $product['file_name']; ?>" alt="Card image cap" />
               </div>
              </td>
              <td>
               <div class="product-title">
                <?= $product['product_name'];?>
               </div>
               <div class="product-color">
                <strong>Color : </strong> Pink
               </div>
               <div class="product-size">
                <strong>Size : </strong> Medium
               </div>
              </td>
              <td>
               <!-- quantity session only update  form -->
               <?php
                if(isset($_POST['update'])) {
                  // update session array
                  foreach($_SESSION['cart'] as $key => $value) {
                    if($value['product_id'] == $_POST['product_id']) {
                      $_SESSION['cart'][$key]['qty'] = $_POST['qty'];
                    }
                  }
                  // new session store for update quantity
                  $_SESSION['total_quantity'] = $_SESSION['cart']['qty'];
                  // auto redirect to cart page
                  echo "<meta http-equiv='refresh' content='0'>";
                }
                 ?>
               <div class="input-group">
                <form action="#" method="post">
                 <input type="hidden" name="product_id" value="<?= $product['product_id']; ?>">
                 <input type="text" name="qty" class="text-center count touchspin" value="<?= $product['qty']?>" />
                 <span>
                  <button type="submit" name="update" class="btn btn-icon btn-success btn-sm mr-5 mb-1">
                   <i class="la la-check"></i>
                  </button>
                 </span>
                </form>
               </div>
              </td>
              <td>
               <div class="total-price">$ : <?= $total; ?></div>
              </td>
              <td>
               <div class="product-action">
                <!-- <a href="#"><i class="ft-trash-2"></i></a> -->
                <?php 
                // remove item from cart
                if(isset($_GET['remove'])) {
                  foreach($_SESSION['cart'] as $key => $value) {
                    if($value['product_id'] == $_GET['remove']) {
                      unset($_SESSION['cart'][$key]);
                      echo "<meta http-equiv='refresh' content='0'>";
                    }
                  }
                }
                ?>
                <!-- remove item form -->
                <form action="#" method="GET">
                 <input type="hidden" name="remove" value="<?= $product['product_id']; ?>">
                 <button type="submit" class="btn btn-danger btn-sm"><i class="ft-trash-2"></i></button>
                </form>
               </div>
              </td>
             </tr>
             <?php endforeach; ?>
            </tbody>
           </table>
          </div>
         </div>
        </div>
       </div>
       <div class="row match-height">
        <div class="col-lg-6 col-md-12">
         <div class="card">
          <div class="card-header">
           <h4 class="card-title">Apply Coupon</h4>
          </div>
          <div class="card-content">
           <div class="card-body">
            <label class="text-muted">Enter your coupon code if you have one!</label>
            <form action="#">
             <div class="form-body">
              <input type="text" class="form-control" placeholder="Enter Coupon Code Here" />
             </div>
             <div class="form-actions border-0 pb-0 text-right">
              <button type="button" class="btn btn-info">
               Apply Code
              </button>
             </div>
            </form>
           </div>
          </div>
         </div>
        </div>
        <div class="col-lg-6 col-md-12">
         <div class="card">
          <div class="card-header">
           <h4 class="card-title">Price Details</h4>
          </div>
          <div class="card-content">
           <div class="card-body">
            <div class="price-detail">
             Your Total Items : ( <strong><?= count($cart); ?> items</strong> )
             <span class="float-right" style="color: blue; font-size: 15px;">
              <?php 
              if(isset($_SESSION['cart']))
              {
               //echo  $_SESSION['cart']['price'] * $_SESSION['cart']['qty'];
               $total_amount = $_SESSION['cart'];
               if(is_array($total_amount)){
                $cost = 0;
                foreach($total_amount as $price_amount)
                {
                  $cost +=$price_amount['price'] * $price_amount
                  ['qty'];
                }
               }else{
                $cost = 0;
               }
              }
              // foreach($total_amount as $amount){
              //   echo $amount['qty'] * $amount['price'];
              // }
              echo $cost;
              ?>

             </span>
            </div>
            <div class="price-detail">
             Delivery Charges
             <span class="float-right">$ <?= $cost + 100; ?></span>
            </div>
            <div class="price-detail">
             TAX / VAT <span class="float-right">$0</span>
            </div>
            <hr />
            <div class="price-detail">
             Payable Amount
             <span class="float-right">$2900</span>
            </div>
            <div class="total-savings">
             Your Total Savings on this order $ : <?= $cost; ?>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
       <form action="#">
        <div class="row">
         <div class="col-12">
          <div class="card">
           <div class="card-content">
            <div class="card-body">
             <div class="text-right">
              <a href="ecommerce-checkout.html" class="btn btn-info mr-2">Continue Shopping</a>
              <a href="ecommerce-checkout.html" class="btn btn-warning">Place Order</a>
             </div>
            </div>
           </div>
          </div>
         </div>
        </div>
       </form>
      </div>
      <div class="tab-pane" id="checkout-tab" aria-labelledby="checkout">
       <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
         <div class="card">
          <div class="card-header mb-3">
           <h4 class="card-title">Your cart (4)</h4>
          </div>
          <div class="card-content">
           <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
             <div>
              <h6 class="my-0">
               Fitbit Alta HR Special Edition x 1
              </h6>
              <small class="text-muted">Brief description</small>
             </div>
             <span class="text-muted">$250</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
             <div>
              <h6 class="my-0">Mackbook pro 19'' x 1</h6>
              <small class="text-muted">Brief description</small>
             </div>
             <span class="text-muted">$1150</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
             <div>
              <h6 class="my-0">VR Headset x 2</h6>
              <small class="text-muted">Brief description</small>
             </div>
             <span class="text-muted">$700</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
             <div>
              <h6 class="my-0">Smart Watch with LED x 1</h6>
              <small class="text-muted">Brief description</small>
             </div>
             <span class="text-muted">$700</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
             <span class="product-name"><strong>Cart Subtotal</strong></span>
             <span class="product-price"><strong>$2800</strong></span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
             <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
             </div>
             <span class="text-success">-$200</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
             <span class="product-name">Shipping &amp; Handling</span>
             <span class="product-price">$100</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
             <span class="product-name">TAX / VAT</span>
             <span class="product-price">$0</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
             <span class="product-name success">Order Total</span>
             <span class="product-price">$2700</span>
            </li>
           </ul>
          </div>
         </div>

         <form class="card p-2">
          <div class="input-group">
           <input type="text" class="form-control" placeholder="Promo code" />
           <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">
             Redeem
            </button>
           </div>
          </div>
         </form>
        </div>
        <div class="col-md-8 order-md-1">
         <div class="card">
          <div class="card-header">
           <h4 class="card-title">Billing address</h4>
          </div>
          <div class="card-content">
           <div class="card-body">
            <form class="needs-validation" novalidate="">
             <div class="row">
              <div class="col-md-6 mb-3">
               <label for="firstName">First name</label>
               <input type="text" class="form-control" id="firstName" placeholder="" value="" required="" />
               <div class="invalid-feedback">
                Valid first name is required.
               </div>
              </div>
              <div class="col-md-6 mb-3">
               <label for="lastName">Last name</label>
               <input type="text" class="form-control" id="lastName" placeholder="" value="" required="" />
               <div class="invalid-feedback">
                Valid last name is required.
               </div>
              </div>
             </div>

             <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
               <div class="input-group-prepend">
                <span class="input-group-text">@</span>
               </div>
               <input type="text" class="form-control" id="username" placeholder="Username" required="" />
               <div class="invalid-feedback">
                Your username is required.
               </div>
              </div>
             </div>

             <div class="mb-3">
              <label for="email">Email
               <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" />
              <div class="invalid-feedback">
               Please enter a valid email address for shipping
               updates.
              </div>
             </div>

             <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="" />
              <div class="invalid-feedback">
               Please enter your shipping address.
              </div>
             </div>

             <div class="mb-3">
              <label for="address2">Address 2
               <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" />
             </div>

             <div class="row">
              <div class="col-md-5 mb-3">
               <label for="country">Country</label>
               <select class="custom-select d-block w-100" id="country" required="">
                <option value="">Choose...</option>
                <option>United States</option>
               </select>
               <div class="invalid-feedback">
                Please select a valid country.
               </div>
              </div>
              <div class="col-md-4 mb-3">
               <label for="state">State</label>
               <select class="custom-select d-block w-100" id="state" required="">
                <option value="">Choose...</option>
                <option>California</option>
               </select>
               <div class="invalid-feedback">
                Please provide a valid state.
               </div>
              </div>
              <div class="col-md-3 mb-3">
               <label for="zip">Zip</label>
               <input type="text" class="form-control" id="zip" placeholder="" required="" />
               <div class="invalid-feedback">
                Zip code required.
               </div>
              </div>
             </div>
             <hr class="mb-2" />
             <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address" checked />
              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing
               address</label>
             </div>
             <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info" checked />
              <label class="custom-control-label" for="save-info">Save this information for next time</label>
             </div>
             <hr class="mt-2 mb-4" />

             <h4 class="mb-1">Payment</h4>

             <div class="d-block my-2">
              <div class="custom-control custom-radio">
               <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked=""
                required="" />
               <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
               <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="" />
               <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
               <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="" />
               <label class="custom-control-label" for="paypal">Paypal</label>
              </div>
             </div>
             <div class="row">
              <div class="col-md-6 mb-3">
               <label for="cc-name">Name on card</label>
               <input type="text" class="form-control" id="cc-name" placeholder="" required="" />
               <small class="text-muted">Full name as displayed on card</small>
               <div class="invalid-feedback">
                Name on card is required
               </div>
              </div>
              <div class="col-md-6 mb-3">
               <label for="cc-number">Credit card number</label>
               <input type="text" class="form-control" id="cc-number" placeholder="" required="" />
               <div class="invalid-feedback">
                Credit card number is required
               </div>
              </div>
             </div>
             <div class="row">
              <div class="col-md-3 mb-3">
               <label for="cc-expiration">Expiration</label>
               <input type="text" class="form-control" id="cc-expiration" placeholder="" required="" />
               <div class="invalid-feedback">
                Expiration date required
               </div>
              </div>
              <div class="col-md-3 mb-3">
               <label for="cc-expiration">CVV</label>
               <input type="text" class="form-control" id="cc-cvv" placeholder="" required="" />
               <div class="invalid-feedback">
                Security code required
               </div>
              </div>
             </div>
             <button class="btn btn-info btn-lg" type="submit">
              Continue to checkout
             </button>
            </form>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
      <div class="tab-pane" id="comp-order-tab" aria-labelledby="complete-order">
       <div class="card">
        <div class="card-header">
         <h4 class="card-title text-center">
          Thank you. Your order has been processed.
         </h4>
        </div>
       </div>
       <div class="card">
        <div class="card-content">
         <div class="card-body">
          <div class="d-flex justify-content-around lh-condensed">
           <div class="order-details text-center">
            <div class="order-title">Order Number</div>
            <div class="order-info">#CV45632</div>
           </div>
           <div class="order-details text-center">
            <div class="order-title">Date</div>
            <div class="order-info">
             10<sup>th</sup> Oct, 2018
            </div>
           </div>
           <div class="order-details text-center">
            <div class="order-title">Amount Paid</div>
            <div class="order-info">$2550</div>
           </div>
           <div class="order-details text-center">
            <div class="order-title">Payment Method</div>
            <div class="order-info">Credit Card</div>
           </div>
          </div>
         </div>
        </div>
       </div>
       <div class="card">
        <div class="card-header">
         <h4 class="mb-0"><strong>My Orders</strong></h4>
        </div>
       </div>
       <div class="card pull-up">
        <div class="card-header">
         <div class="float-left">
          <a href="#" class="btn btn-info">#CV45632</a>
         </div>
         <div class="float-right">
          <a href="#" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a>
          <a href="#" class="btn btn-outline-info"><i class="la la-map-marker"></i> Track</a>
         </div>
        </div>
        <div class="card-content">
         <div class="card-body py-0">
          <div class="d-flex justify-content-between lh-condensed">
           <div class="order-details text-center">
            <div class="product-img d-flex align-items-center">
             <img class="img-fluid" src="../../../app-assets/images/elements/fitbit-watch.png" alt="Card image cap" />
            </div>
           </div>
           <div class="order-details">
            <h6 class="my-0">
             Fitbit Alta HR Special Edition x 1
            </h6>
            <small class="text-muted">Brief description</small>
           </div>
           <div class="order-details">
            <div class="order-info">$250</div>
           </div>
           <div class="order-details">
            <h6 class="my-0">Delivered on Sun, Oct 15th 2018</h6>
            <small class="text-muted">Brief description</small>
           </div>
          </div>
         </div>
        </div>
        <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
         <span class="float-left">
          <span class="text-muted">Ordered On</span>
          <strong>Wed, Oct 3rd 2018</strong>
         </span>
         <span class="float-right">
          <span class="text-muted">Ordered Amount</span>
          <strong>$250</strong>
         </span>
        </div>
       </div>
       <div class="card pull-up">
        <div class="card-header">
         <div class="float-left">
          <a href="#" class="btn btn-info">#CV65472</a>
         </div>
         <div class="float-right">
          <a href="#" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a>
          <a href="#" class="btn btn-outline-info"><i class="la la-map-marker"></i> Track</a>
         </div>
        </div>
        <div class="card-content">
         <div class="card-body py-0">
          <div class="d-flex justify-content-between lh-condensed">
           <div class="order-details text-center">
            <div class="product-img d-flex align-items-center">
             <img class="img-fluid" src="../../../app-assets/images/elements/13.png" alt="Card image cap" />
            </div>
           </div>
           <div class="order-details">
            <h6 class="my-0">Mackbook pro 19'' x 1</h6>
            <small class="text-muted">Brief description</small>
           </div>
           <div class="order-details">
            <div class="order-info">$1150</div>
           </div>
           <div class="order-details">
            <h6 class="my-0">Delivered on Mon, Oct 16th 2018</h6>
            <small class="text-muted">Brief description</small>
           </div>
          </div>
         </div>
        </div>
        <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
         <span class="float-left">
          <span class="text-muted">Ordered On</span>
          <strong>Wed, Oct 3rd 2018</strong>
         </span>
         <span class="float-right">
          <span class="text-muted">Ordered Amount</span>
          <strong>$1150</strong>
         </span>
        </div>
       </div>
       <div class="card pull-up">
        <div class="card-header">
         <div class="float-left">
          <a href="#" class="btn btn-info">#CV78645</a>
         </div>
         <div class="float-right">
          <a href="#" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a>
          <a href="#" class="btn btn-outline-info"><i class="la la-map-marker"></i> Track</a>
         </div>
        </div>
        <div class="card-content">
         <div class="card-body py-0">
          <div class="d-flex justify-content-between lh-condensed">
           <div class="order-details text-center">
            <div class="product-img d-flex align-items-center">
             <img class="img-fluid" src="../../../app-assets/images/elements/vr.png" alt="Card image cap" />
            </div>
           </div>
           <div class="order-details">
            <h6 class="my-0">VR Headset x 2</h6>
            <small class="text-muted">Brief description</small>
           </div>
           <div class="order-details">
            <div class="order-info">$700</div>
           </div>
           <div class="order-details">
            <h6 class="my-0">Delivered on Tue, Oct 17th 2018</h6>
            <small class="text-muted">Brief description</small>
           </div>
          </div>
         </div>
        </div>
        <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
         <span class="float-left">
          <span class="text-muted">Ordered On</span>
          <strong>Wed, Oct 3rd 2018</strong>
         </span>
         <span class="float-right">
          <span class="text-muted">Ordered Amount</span>
          <strong>$700</strong>
         </span>
        </div>
       </div>
       <div class="card pull-up">
        <div class="card-header">
         <div class="float-left">
          <a href="#" class="btn btn-info">#CV84123</a>
         </div>
         <div class="float-right">
          <a href="#" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a>
          <a href="#" class="btn btn-outline-info"><i class="la la-map-marker"></i> Track</a>
         </div>
        </div>
        <div class="card-content">
         <div class="card-body py-0">
          <div class="d-flex justify-content-between lh-condensed">
           <div class="order-details text-center">
            <div class="product-img d-flex align-items-center">
             <img class="img-fluid" src="../../../app-assets/images/carousel/25.jpg" alt="Card image cap" />
            </div>
           </div>
           <div class="order-details">
            <h6 class="my-0">Smart Watch with LED x 1</h6>
            <small class="text-muted">Brief description</small>
           </div>
           <div class="order-details">
            <div class="order-info">$700</div>
           </div>
           <div class="order-details">
            <h6 class="my-0">Delivered on Wed, Oct 18th 2018</h6>
            <small class="text-muted">Brief description</small>
           </div>
          </div>
         </div>
        </div>
        <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
         <span class="float-left">
          <span class="text-muted">Ordered On</span>
          <strong>Wed, Oct 3rd 2018</strong>
         </span>
         <span class="float-right">
          <span class="text-muted">Ordered Amount</span>
          <strong>$700</strong>
         </span>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- END: Content-->
 <div></div>
 <div class="sidenav-overlay"></div>
 <div class="drag-target"></div>

 <!-- BEGIN: Footer-->
 <?php include('includes/footer.php'); ?>

 <script src="admin/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
 <!-- <script src="admin/app-assets/vendors/js/forms/icheck/icheck.min.js"></script> -->
 <script src="admin/app-assets/js/scripts/pages/ecommerce-cart.js"></script>

 <?php 
 /* 
 // item amount summed code start
<?php
$cost = 0;
if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $item) {
        $cost += $item['price'] * $item['qty'];
    }
}
echo $cost;

// item amount summed code end 
// true code 
?>


 */
 ?>