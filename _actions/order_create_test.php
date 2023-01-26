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
      'total_price' => $_POST['total_price'],
      'payment_type' => $_POST['payment_type'],
      'card_name' => $_POST['card_name'],
      'card_no' => $_POST['card_no'],
      'card_expire' => $_POST['card_expire'],
      'card_cvv' => $_POST['card_cvv'],
      'order_no' => date('Y-m-d').'-'.rand(1000,9999) . '-' . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)),
 'order_status' => 'pending',
      'user_id' => $_POST['user_id'],
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