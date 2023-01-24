<?php
include('../vendor/autoload.php');
use App\OnlineShopping\Database\MySQL;
use App\OnlineShopping\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;
$auth = Auth::check();
$password = md5($_POST['password']);
$db = new UsersTable(new MySQL());

$update_password = $db->PasswordUpdate($auth->id, $password);

if($update_password){
 HTTP::redirect("../admin/admin_profile.php?success_password_update=password");
}else{
 HTTP::redirect("../admin/admin_profile.php?error=password");
}