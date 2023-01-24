<?php
include('../vendor/autoload.php');
use App\OnlineShopping\Database\MySQL;
use App\OnlineShopping\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;
use Carbon\Carbon;
$auth = Auth::check();


// $data = [
//  'bio' => $_POST['bio'],
//  'birth_date' => date('Y-d-M', strtotime($_POST['birth_date'])),
//  'country' => $_POST['country'],
//  'language' => $_POST['language'],
//  'phone' => $_POST['phone'],
//  'website' => $_POST['website'],
//  'fav_music' => $_POST['fav_music'],
//  'fav_movie' => $_POST['fav_movie'],
// ];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// date function
function dateConvert($date){
 $date = str_replace('/', '-', $date);
 return date('m-d-Y', strtotime($date));
}
$bio = $_POST['bio'];
// birth_date with date format stored in database
//$birth_date = date('M-d-Y', strtotime($_POST['birth_date']));
// $birth_date = dateConvert($_POST['birth_date']);
// $date = $_POST['birth_date'];

//$birth_date = date('Y-m-d', $date);
//'exam_date' => date("Y-m-d", strtotime($_POST['exam_date'])),
$birth_date = date("Y-m-d", strtotime($_POST['birth_date']));
// Get the birth date from the form
//$birth_date = $_POST['birth_date'];

// Convert the birth date to a Carbon object
$//birth_date = Carbon::createFromFormat('F j, Y', $birth_date);
$country = $_POST['country'];
$language = $_POST['language'];
$language_string = implode(",", $language);
$phone = $_POST['phone'];
$website = $_POST['website'];
$fav_music = $_POST['fav_music'];
$fav_music_string = implode(",", $fav_music);
$fav_movie = $_POST['fav_movie'];
$fav_movie_string = implode(",", $fav_movie);

// echo $bio . "<br>";
// echo $birth_date . "<br>";
// echo $country . "<br>";
// echo $language_string . "<br>";
// echo $phone . "<br>";
// echo $website . "<br>";
// echo $fav_music_string . "<br>";
// echo $fav_movie_string . "<br>";
$db = new UsersTable(new MySQL());
$user_info_update = $db->UserInfoUpdate($auth->id,$bio, $birth_date, $country, $language_string, $phone, $website, $fav_music_string, $fav_movie_string);
if($user_info_update){
 HTTP::redirect("../admin/admin_profile.php?success_user_info_update=user_info");
}else{
 HTTP::redirect("../admin/admin_profile.php?error=user_info");
}