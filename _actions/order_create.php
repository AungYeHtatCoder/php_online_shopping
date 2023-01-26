<?php 
include('../vendor/autoload.php');
use App\OnlineShopping\Database\MySQL;
use App\OnlineShopping\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;
use App\OnlineShopping\Database\OrderTable;

$auth = Auth::check();

$data = array(
 
 'product_id' => $_POST['product_id'],
 'qty' => $_POST['qty'],
 'price' => $_POST['price'],
 'sub_total_price' => $_POST['sub_total_price'],
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

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

$db = new OrderTable(new MySQL());

// $orders = $db->OrderCreate($data);

// echo "<pre>";
// print_r($orders);
// echo "</pre>";
// die();

if($db)
{
    $array_data = array();
    foreach($data as $key => $value)
    {
        $array_data[$key] = $value;
    }
    $result = $db->OrderCreate($array_data);
    
// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();

 HTTP::redirect('../order_complete.php');
}else{
 echo "Order not created";
}