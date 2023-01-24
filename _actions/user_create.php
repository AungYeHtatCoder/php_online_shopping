<?php
include('../vendor/autoload.php');
use App\OnlineShopping\Database\MySQL;
use App\OnlineShopping\Database\UsersTable;

$data = [
 'user_name' => $_POST['user_name'],
 'email' => $_POST['email'],
 'password' => md5($_POST['password']),
 'phone' => $_POST['phone'],
 'address' => $_POST['address'],
 'fix_address' => $_POST['fix_address'],
 'status' => 1,
 'role_id' => 2,
 
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
$db = new UsersTable(new MySQL());

$users = $db->UserRegister($data);

if ($users) {
 header('location: ../login_form.php?success=1');

} else {
 echo "Error";
}