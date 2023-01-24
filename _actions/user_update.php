<?php
include('../vendor/autoload.php');
use App\OnlineShopping\Database\MySQL;
use App\OnlineShopping\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

$auth = Auth::check();

$data = [
 'user_name' => $_POST['user_name'],
 'public_name' => $_POST['public_name'],
 'email' => $_POST['email'],
 'company' => $_POST['company'],
 //'id' => $auth->id,
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
$db = new UsersTable(new MySQL());
$account_update = $db->UserUpdateAccount($auth->id, $data);

if($account_update){
 HTTP::redirect("../admin/admin_profile.php?success_account_update=account");
}else{
 HTTP::redirect("../admin/admin_profile.php?error=account");
}