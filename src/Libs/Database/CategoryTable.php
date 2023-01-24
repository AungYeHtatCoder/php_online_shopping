<?php 
namespace App\OnlineShopping\Database;
use PDO;
use PDOException;

class CategoryTable 

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // create category
 public function CategoryCreate($data)
 {
  try {
   $query = "INSERT INTO categories (category_name, created_at) VALUES (:category_name, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
 // category index
 public function CategoryIndex()
 {
  $statement = $this->db->prepare("SELECT * FROM categories");
  $statement->execute();
  $rows = $statement->fetchAll();
  return $rows ?? false;
 }
}