<?php
include('../vendor/autoload.php');
use App\OnlineShopping\Database\MySQL;
use App\OnlineShopping\Database\CategoryTable;
use Helpers\Auth;
use Helpers\HTTP;

$data = [
 'category_name' => $_POST['category_name'],
];

$db = new CategoryTable(new MySQL());

if ($db->CategoryCreate($data)) {
 HTTP::redirect('../admin/category_index.php?success=Category created successfully');
} else {
 echo "Error";
}