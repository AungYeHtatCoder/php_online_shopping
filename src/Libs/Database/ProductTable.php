<?php 
namespace App\OnlineShopping\Database;
use PDO;
use PDOException;

class ProductTable 

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // create product
 public function ProductCreate($data)
 {
  try {
   $query = "INSERT INTO products (product_name, category_id, price, old_price, description, file_name, product_status,  created_at) VALUES (:product_name, :category_id, :price, :old_price, :description, :file_name, :product_status, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // Get all products join with categories table 
 public function ProductIndex()
 {
  try {
   $query = "SELECT products.*, categories.category_name FROM products INNER JOIN categories ON products.category_id = categories.id ORDER BY products.id DESC";
   $statement = $this->db->prepare($query);
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // get all products with pagination
 public function ProductPagination($start, $limit)
 {
  try {
   $query = "SELECT products.*, categories.category_name FROM products INNER JOIN categories ON products.category_id = categories.id ORDER BY products.id DESC LIMIT $start, $limit";
   $statement = $this->db->prepare($query);
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // search product
 public function ProductSearch($search)
 {
  try {
   $query = "SELECT products.*, categories.category_name FROM products INNER JOIN categories ON products.category_id = categories.id WHERE products.product_name LIKE '%$search%' OR categories.category_name LIKE '%$search%'";
   $statement = $this->db->prepare($query);
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // get product by id with category 
 public function ProductShow($id)
 {
  try {
   $query = "SELECT products.*, categories.category_name FROM products INNER JOIN categories ON products.category_id = categories.id WHERE products.id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(['id' => $id]);
   return $statement->fetch(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

}