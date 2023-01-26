<form class="needs-validation" novalidate="" method="post" action="_actions/order_create_test.php">
 <?php 
                    if(isset($_SESSION['cart'])){
                      $order_form = $_SESSION['cart'];
                    }
                    foreach($order_form as $key => $form_data):
                    ?>
 <input type="hidden" name="product_id" value="<?= $form_data['product_id'] ?>">
 <input type="hidden" name="qty" value="<?= $form_data['qty'] ?>">
 <input type="hidden" name="price" value="<?= $form_data['price'] ?>">
 <input type="hidden" name="sub_total_price" value="<?= $form_data['qty'] * $form_data['price'] ?>">
 <?php endforeach; ?>
 <?php 
              if(isset($_SESSION['cart']))
              {
               //echo  $_SESSION['cart']['price'] * $_SESSION['cart']['qty'];
               $order_amount_data = $_SESSION['cart'];
               if(is_array($order_amount_data)){
                $order_cost_data = 0;
                foreach($order_amount_data as $amount_item_form)
                {
                  $order_cost_data +=$amount_item_form['price'] * $amount_item_form
                  ['qty'];
                }
               }else{
                $order_cost_data = 0;
               }
              }
              //echo $order_cost_data;
              ?>
 <input type="hidden" name="total_price" value="<?= $order_cost_data; ?>">
 <div class="d-block my-2">
  <div class="custom-control custom-radio">
   <input id="credit" name="payment_type" type="radio" class="custom-control-input" checked="" required=""
    value="Credit Card" />
   <label class="custom-control-label" for="credit">Credit card</label>
  </div>
  <div class="custom-control custom-radio">
   <input id="debit" name="payment_type" type="radio" class="custom-control-input" required="" value="Debit Card" />
   <label class="custom-control-label" for="debit">Debit card</label>
  </div>
  <div class="custom-control custom-radio">
   <input id="paypal" name="payment_type" type="radio" class="custom-control-input" required="" value="Paypal Card" />
   <label class="custom-control-label" for="paypal">Paypal</label>
  </div>
 </div>
 <div class="row">
  <div class="col-md-6 mb-3">
   <label for="cc-name">Name on card</label>
   <input type="text" class="form-control" id="cc-name" placeholder="" required="" name="card_name" />
   <small class="text-muted">Full name as displayed on card</small>
   <div class="invalid-feedback">
    Name on card is required
   </div>
  </div>
  <div class="col-md-6 mb-3">
   <label for="cc-number">Credit card number</label>
   <input type="text" class="form-control" id="cc-number" placeholder="" required="" name="card_no" />
   <div class="invalid-feedback">
    Credit card number is required
   </div>
  </div>
 </div>
 <div class="row">
  <div class="col-md-3 mb-3">
   <label for="cc-expiration">Expiration</label>
   <input type="text" class="form-control" id="cc-expiration" placeholder="" required="" name="card_expire" />
   <div class="invalid-feedback">
    Expiration date required
   </div>
  </div>
  <div class="col-md-3 mb-3">
   <label for="cc-expiration">CVV</label>
   <input type="text" class="form-control" id="cc-cvv" placeholder="" required="" name="card_cvv" />
   <div class="invalid-feedback">
    Security code required
   </div>
  </div>
  <input type="hidden" name="order_date" value="<?= date('Y-m-d'); ?>">
  <input type="hidden" name="user_id" value="<?= $auth->id; ?>">

 </div>
 <button class="btn btn-info btn-lg" type="submit">
  Continue to checkout
 </button>
</form>


<?php 
// Create a new instance of MySQL class
  $db = new OrderTable(new MySQL());
  foreach($data as $row){
  $query = "INSERT INTO orders (product_id, qty, price, sub_total_price, total_price, payment_type, card_name, card_no, card_expire, card_cvv, user_id) VALUES (:product_id, :qty, :price, :sub_total_price, :total_price, :payment_type, :card_name, :card_no, :card_expire, :card_cvv, :user_id)";
  $db->insert($query, $row);
  }

  /*
<?php
include('../vendor/autoload.php');
use App\OnlineShopping\Database\MySQL;
use App\OnlineShopping\Database\OrderTable;
use Helpers\HTTP;

$data = array();

// Check for form submission
if(isset($_POST['submit'])) {
  // Loop through each form field
  for($i = 0; $i < count($_POST['product_id']); $i++) {
    $data[] = array(
      'product_id' => $_POST['product_id'][$i],
      'qty' => $_POST['qty'][$i],
      'price' => $_POST['price'][$i],
      'sub_total_price' => $_POST['sub_total_price'][$i],
      'total_price' => $_POST['total_price'][$i],
      'payment_type' => $_POST['payment_type'][$i],
      'card_name' => $_POST['card_name'][$i],
      'card_no' => $_POST['card_no'][$i],
      'card_expire' => $_POST['card_expire'][$i],
      'card_cvv' => $_POST['card_cvv'][$i],
      'order_no' => date('Y-m-d').'-'.rand(1000,9999) . '-' . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)),
 'order_status' => 'pending',
      'user_id' => $_POST['user_id'][$i],
    );
  }

  // Create a new instance of MySQL class
  $db = new OrderTable(new MySQL());
  foreach($data as $row){
  $query = $db->OrderCreate($row);
 
  }
  // echo "<pre>";
  // print_r($query);
  // echo "</pre>";
  // die();
  if($query){
   HTTP::redirect('../order_complete.php');
  }else{
   HTTP::redirect('../order_checkout.php');
  }
}

  */