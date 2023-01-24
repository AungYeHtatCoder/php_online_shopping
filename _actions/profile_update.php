<?php
include('../vendor/autoload.php');
use App\OnlineShopping\Database\MySQL;
use App\OnlineShopping\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

$auth = Auth::check();

$file_name = $_FILES['profile_img']['name'];
$file_tmp = $_FILES['profile_img']['tmp_name'];
$errors = $_FILES['profile_img']['error'];
$type = $_FILES['profile_img']['type'];

$id = $auth->id;
$profile_img = $file_name;

$db = new UsersTable(new MySQL());

//$profile_update = $db->ProfileUpdate($id, $profile_img);


if ($errors) {
	HTTP::redirect("../admin/admin_profile.php", "error=file");
}

if ($type === "image/jpeg" or $type === "image/png") {

	//$table->updateProfile($auth->id, $file_name);
 $db->ProfileUpdate($auth->id, $file_name);

	move_uploaded_file($file_tmp, "profile/$file_name");

	$auth->profile_img = $file_name;

	HTTP::redirect("../admin/admin_profile.php?success=profile");
} else {
	HTTP::redirect("../admin/admin_profile.php", "error=type");
}