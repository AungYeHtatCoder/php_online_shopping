<?php 
namespace App\OnlineShopping\Database;
use PDO;
use PDOException;

class UsersTable 

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 public function UserRegister($data)
 {
  try {
   $query = "INSERT INTO users (user_name, public_name, email, password, phone, address, fix_address, country, state, role_id, status, created_at) VALUES (:user_name, :public_name, :email, :password, :phone, :address, :fix_address, :country, :state, :role_id, :status,  NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // user login

  public function UserLogin($email, $password)
 {
  $statement = $this->db->prepare("SELECT users.*, roles.name as role, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE email = :email AND password = :password");
  $statement->execute([
   ':email' => $email,
   ':password' => $password
  ]);
  $row = $statement->fetch();
  return $row ?? false;
 }

 // user profile update
 
 public function ProfileUpdate($id, $profile_img)
	{
		$statement = $this->db->prepare(
			"UPDATE users SET profile_img=:profile_img WHERE id = :id"
		);
		$statement->execute([':profile_img' => $profile_img, ':id' => $id]);

		return $statement->rowCount();
	}

	// user_name, public_name, email, company update
	public function UserUpdateAccount($id, $data)
	{
		$statement = $this->db->prepare(
			"UPDATE users SET user_name=:user_name, public_name=:public_name, email=:email, company=:company WHERE id = :id"
		);
		$statement->execute(
			[':user_name' => $data['user_name'], ':public_name' => $data['public_name'], ':email' => $data['email'], ':company' => $data['company'], ':id' => $id ]
		);

		return $statement->rowCount();
	}


 // user name update
 
 public function NameUpdate($id, $name)
	{
		$statement = $this->db->prepare(
			"UPDATE users SET name=:name WHERE id = :id"
		);
		$statement->execute([':name' => $name, ':id' => $id]);

		return $statement->rowCount();
	}

 // user Password update
 
 public function PasswordUpdate($id, $password)
	{
		$statement = $this->db->prepare(
			"UPDATE users SET password=:password WHERE id = :id"
		);
		$statement->execute([':password' => $password, ':id' => $id]);

		return $statement->rowCount();
	}

	// user info update , $bio, $birth_date, $country, $language, $phone, $website, $fav_music, $fav_movie 
	public function UserInfoUpdate($id, $bio, $birth_date, $country, $language, $phone, $website, $fav_music, $fav_movie)
	{
		$statement = $this->db->prepare(
			"UPDATE users SET bio=:bio, birth_date=:birth_date, country=:country, language=:language, phone=:phone, website=:website, fav_music=:fav_music, fav_movie=:fav_movie WHERE id = :id"
		);
		$statement->execute([':bio' => $bio, ':birth_date' => $birth_date, ':country' => $country, ':language' => $language, ':phone' => $phone, ':website' => $website, ':fav_music' => $fav_music, ':fav_movie' => $fav_movie, ':id' => $id]);

		return $statement->rowCount();
	}

	// user phone update
 
 public function PhoneUpdate($id, $phone)
	{
		$statement = $this->db->prepare(
			"UPDATE users SET phone=:phone WHERE id = :id"
		);
		$statement->execute([':phone' => $phone, ':id' => $id]);

		return $statement->rowCount();
	}


	public function BioUpdate($id, $bio)
	{
		$statement = $this->db->prepare(
			"UPDATE users SET bio=:bio WHERE id = :id"
		);
		$statement->execute([':bio' => $bio, ':id' => $id]);

		return $statement->rowCount();
	}

	// get all users data join with roles	table
	public function getAllUsers()
	{
		$statement = $this->db->prepare(
			"SELECT users.*, roles.name as role, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id" 
		);
		$statement->execute();
		$users = $statement->fetchAll();
		return $users;
	}

	// get user by id join with	roles table
	public function getUserById($id)  
	{
		$statement = $this->db->prepare(
			"SELECT users.*, roles.name as role, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE users.id = :id" 
		);
		$statement->execute([':id' => $id]);
		$user = $statement->fetch();
		return $user;
	}

	// delete user by id
	public function deleteUserById($id)
	{
		$statement = $this->db->prepare(
			"DELETE FROM users WHERE id = :id"
		);
		$statement->execute([':id' => $id]);

		return $statement->rowCount();
	}
	

	
  // update role_id 
  public function updateRole($id, $role_id)
  {
    try {
      $query = "UPDATE users SET role_id = :role_id WHERE id = :id";
      $statement = $this->db->prepare($query);
      $statement->execute([':role_id' => $role_id, ':id' => $id]);
      return $statement->rowCount();
    } catch (PDOException $e) {
      return $e->getMessage();
    } 
    }
}