<?php 
include('vendor/autoload.php');
use App\OnlineShopping\Database\Company;
use App\OnlineShopping\Database\Language;
use App\OnlineShopping\Database\FavouriteMusic;
use App\OnlineShopping\Database\FavouriteMovie;

// $db = new Company();
// $companies = $db->companyOption();
// echo "<pre>";
// print_r($companies);
// echo "</pre>";
//$companies = Company::companyOption();
// echo "<pre>";
// print_r($companies);
// echo "</pre>";
// foreach ($companies as $key => $value) {
//     echo $key . " => " . $value . "<br>";
// }

$languages = Language::LanguagesOptions();
// echo "<pre>";
// print_r($languages);
// echo "</pre>";
foreach ($languages as $key => $value) {
    echo $key . " => " . $value . "<br>";
}
echo "<hr>";
$music = FavouriteMusic::FavouriteMusicOptions();

foreach ($music as $key => $value) {
    echo $key . " => " . $value . "<br>";
}
echo "<hr>";
$movie = FavouriteMovie::FavouriteMovieOptions();
foreach ($movie as $key => $value) {
    echo $key . " => " . $value . "<br>";
}
?>