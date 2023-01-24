<?php
/**
 * Populate MySQL Table Using faker
 * 
 * @author 
 */
require_once('../vendor/autoload.php');

try{
    $count = 100;
    $faker = \Faker\Factory::create();

    //Connecting MySQL Database
    $pdo  = new PDO('mysql:host=localhost;dbname=mm_oop', 'root', '', array(
        PDO::ATTR_PERSISTENT => true
    ));
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    //Check if the table exists
    $tableExists = $pdo->query("SHOW TABLES LIKE 'users'")->rowCount() > 0;
    if ($tableExists) {
        //Truncate the table
        $stmt = $pdo->prepare("truncate table users");
        $stmt->execute();
    } else {
        throw new Exception("The table 'users' does not exist in the database.");
    }

    //Insert the data
    $sql = 'INSERT INTO users (user_name, public_name, email, password, phone, address, fix_address, profile_img, company, bio, birth_date, country, language, fav_music, fav_movie, website,  role_id, status, created_at) 
    VALUES (:user_name, :public_name, :email, :password, :phone, :address, :fix_address, :profile_img, :company, :bio, :birth_date, :country, :language, :fav_music, :fav_movie, :website,  :role_id, :status, :created_at)';
    $stmt = $pdo->prepare($sql);

    for ($i=0; $i < $count; $i++) {
        $date = $faker->dateTime($max = 'now', 'UTC')->format('Y-m-d H:i:s');
        $password = password_hash($faker->password(8), PASSWORD_DEFAULT);
        $status = $faker->randomElement(array(0,1));
        $stmt->execute(
            [
                'user_name' => $faker->name,
                'public_name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'fix_address' => $faker->address,
                'profile_img' => $faker->imageUrl($width = 640, $height = 480),
                'company' => $faker->company,
                'bio' => $faker->text($maxNbChars = 200),
                'birth_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'country' => $faker->country,
                'language' => $faker->word,
                'fav_music' => $faker->word,
                'fav_movie' => $faker->word,
                'website' => $faker->url,
                'role_id' => $faker->numberBetween(1, 10),
                'status' => $status, 
                'created_at' => $date
            ]
        );
    }
} catch(Exception $e){
    echo '<pre>';print_r($e);echo '</pre>';exit;
}

if ($stmt->rowCount() > 0) {
    echo 'Data Inserted Successfully';
} else {
    echo 'Data Inserted Failed';
}