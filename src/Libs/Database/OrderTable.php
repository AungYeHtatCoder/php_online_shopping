<?php

namespace App\OnlineShopping\Database;

use PDO;
use PDOException;

class OrderTable
{
	private $db = null;

	public function __construct(MySQL $db)
	{
		$this->db = $db->connect();
	}
  

	// insert order
 // public function OrderCreate($data)
 // {
  
 //   try {
	// 		$query = " INSERT INTO orders (product_id, qty, price, total_price, user_id, order_date, order_status) VALUES (:product_id, :qty, :price, :total_price, :user_id, NOW(), :order_status)";

	// 		$statement = $this->db->prepare($query);
 //   foreach($data as $key => $value)
 //   {
 //    $statement->bindValue($key, $value);
 //   }
 //   $statement->execute();
	// 		return $this->db->lastInsertId();
	// 	} catch (PDOException $e) {
	// 		return $e->getMessage()();
	// 	}
 // }

 public function OrderCreate($data) {
  try {
    $query = " INSERT INTO orders (product_id, qty, price, sub_total_price, total_price, payment_type, card_name, card_no, card_expire, card_cvv, order_date, order_status, order_no, user_id) VALUES (:product_id, :qty, :price, :sub_total_price, :total_price, :payment_type, :card_name, :card_no, :card_expire, :card_cvv, NOW(), :order_status, :order_no, :user_id)";

    $statement = $this->db->prepare($query);
    $statement->bindValue(':product_id', $data['product_id']);
    $statement->bindValue(':qty', $data['qty']);
    $statement->bindValue(':price', $data['price']);
    $statement->bindValue(':sub_total_price', $data['sub_total_price']);
    $statement->bindValue(':total_price', $data['total_price']);
    $statement->bindValue(':payment_type', $data['payment_type']);
    $statement->bindValue(':card_name', $data['card_name']);
    $statement->bindValue(':card_no', $data['card_no']);
    $statement->bindValue(':card_expire', $data['card_expire']);
    $statement->bindValue(':card_cvv', $data['card_cvv']);
    $statement->bindValue(':order_status', $data['order_status']);
    $statement->bindValue(':order_no', $data['order_no']);
    $statement->bindValue(':user_id', $data['user_id']);
    $statement->execute();
    return $this->db->lastInsertId();
  } catch (PDOException $e) {
    return $e->getMessage();
  }
}


 // Get All Orders
//  public function GetAllOrder()
//  {
//   $query = "SELECT * FROM orders";
//   $statement = $this->db->prepare($query);
//   $statement->execute();
//   $result = $statement->fetchAll();
//   return $result;
//  }

// get all orders & products & categories & users join
  public function GetAllOrder()
  {
    $statement = $this->db->prepare("SELECT orders.*, products.*, categories.category_name, users.* FROM orders INNER JOIN products ON orders.product_id = products.id INNER JOIN categories ON products.category_id = categories.id INNER JOIN users ON orders.user_id = users.id ORDER BY orders.id DESC");
    $statement->execute();
    return $statement->fetchAll();
  }

 // Get All Orders
 public function GetAllOrderById($id)
 {
  $query = "SELECT * FROM orders WHERE user_id = :id";
  $statement = $this->db->prepare($query);
  $statement->execute([':id' => $id]);
  $result = $statement->fetchAll();
  return $result;
 }

 // Get All Orders
 public function GetAllOrderByIdAndStatus($id, $status)
 {
  $query = "SELECT * FROM orders WHERE user_id = :id AND order_status = :status";
  $statement = $this->db->prepare($query);
  $statement->execute([':id' => $id, ':status' => $status]);
  $result = $statement->fetchAll();
  return $result;
 }

 // Get All Orders
 public function GetAllOrderByIdAndStatusAndDate($id, $status, $date)
 {
  $query = "SELECT * FROM orders WHERE user_id = :id AND order_status = :status AND order_date = :date";
  $statement = $this->db->prepare($query);
  $statement->execute([':id' => $id, ':status' => $status, ':date' => $date]);
  $result = $statement->fetchAll();
  return $result;
 }

 // Get All Orders
 public function GetAllOrderByIdAndStatusAndDateAndProduct($id, $status, $date, $product)
 {
  $query = "SELECT * FROM orders WHERE user_id = :id AND order_status = :status AND order_date = :date AND product_id = :product";
  $statement = $this->db->prepare($query);
  $statement->execute([':id' => $id, ':status' => $status, ':date' => $date, ':product' => $product]);
  $result = $statement->fetchAll();
  return $result;
  
  
}

}


/* 
public function OrderCreate($data) {
  try {
    $query = "INSERT INTO orders (product_id, qty, price, sub_total_price, total_price, payment_type, card_name, card_no, card_expire, card_vcc, order_date, order_status, order_no, user_id) VALUES (:product_id, :qty, :price, :sub_total_price, :total_price, :payment_type, :card_name, :card_no, :card_expire, :card_vcc, NOW(), :order_status, :order_no, :user_id)";

    $statement = $this->db->prepare($query);
    $statement->bindValue(':product_id', $data['product_id']);
    $statement->bindValue(':qty', $data['qty']);
    $statement->bindValue(':price', $data['price']);
    $statement->bindValue(':sub_total_price', $data['sub_total_price']);
    $statement->bindValue(':total_price', $data['total_price']);
    $statement->bindValue(':payment_type', $data['payment_type']);
    $statement->bindValue(':card_name', $data['card_name']);
    $statement->bindValue(':card_no', $data['card_no']);
    $statement->bindValue(':card_expire', $data['card_expire']);
    $statement->bindValue(':card_vcc', $data['card_vcc']);
    $statement->bindValue(':order_status', $data['order_status']);
    $statement->bindValue(':order_no', $data['order_no']);
    $statement->bindValue(':user_id', $data['user_id']);
    $statement->execute();
    return $this->db->lastInsertId();
  } catch (PDOException $e) {
    return $e->getMessage();
  }
}

*/