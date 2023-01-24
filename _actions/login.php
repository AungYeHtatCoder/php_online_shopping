<?php
session_start();
include('../vendor/autoload.php');
use App\OnlineShopping\Database\MySQL;
use App\OnlineShopping\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

$email = $_POST['email'];
$password = md5($_POST['password']);

$db = new UsersTable(new MySQL());

$users = $db->UserLogin($email, $password);
// echo "<pre>";
// print_r($users);
// echo "</pre>";
// die();

if($users->value === 1){
 $_SESSION['user'] = $users;
 HTTP::redirect('../admin/admin_profile.php?success=1');
} else if($users->value === 2){
 $_SESSION['user'] = $users;
 HTTP::redirect('../order_index.php');
} else {
 HTTP::redirect('../login_form.php?error=1');
}