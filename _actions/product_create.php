<?php 
include('../vendor/autoload.php');
use App\OnlineShopping\Database\MySQL;
use App\OnlineShopping\Database\ProductTable;
use Helpers\Auth;
use Helpers\HTTP;

$file_name = $_FILES['file_name']['name'];
$file_tmp = $_FILES['file_name']['tmp_name'];
$errors = $_FILES['file_name']['error'];
$type = $_FILES['file_name']['type'];
$data = [
 'product_name' => $_POST['product_name'],
 'category_id' => $_POST['category_id'],
 'price' => $_POST['price'],
 'old_price' => $_POST['old_price'],
 'description' => $_POST['description'],
 'file_name' => $file_name,
 'product_status' => 'Active',
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";

$db = new ProductTable(new MySQL());

if($type === 'image/jpeg' || $type === 'image/png' || $type === 'image/jpg') {
 if($errors === 0) {
  if(move_uploaded_file($file_tmp, 'product_img/'.$file_name)) {
   $db->ProductCreate($data);
   // echo "<pre>";
   // print_r($result);
   // echo "</pre>";
   // die();
   HTTP::redirect('../admin/product_index.php');
  }
 } else {
  echo "Error";
 }
} else {
 echo "File type is not supported";
}