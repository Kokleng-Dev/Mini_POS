<?php

namespace DB;

class Migration {
  public function __construct(){
    
  }

  public function down($mysqli){
    $mysqli->query("
    DROP TABLE `customers`, `orders`, `order_details`, `products`, `product_categories`, `purchase_order_details`, `purchase_orders`, `suppliers`, `users`;
    ");
  }
  public function up($mysqli){
    $mysqli->query(
      "
          CREATE TABLE IF NOT EXISTS users(
          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(255),
          username VARCHAR(255),
          password VARCHAR(255),
          photo TEXT NULL,
          active tinyint(1) NOT NULL DEFAULT 1,
          created_by INT NOT NULL,
          updated_by INT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
      "
    );

    $mysqli->query("
      CREATE TABLE IF NOT EXISTS product_categories(
          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(255),
          photo TEXT NULL,
          created_by INT NOT NULL,
          updated_by INT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );


    ");

    $mysqli->query("

        CREATE TABLE IF NOT EXISTS products(
          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          product_category_id INT NOT NULL,
          name VARCHAR(255),
          price FLOAT(5,2) NOT NULL DEFAULT 0,
          description TEXT NULL,
          photo TEXT NULL,
          qty INT NOT NULL DEFAULT 0,
          created_by INT NOT NULL,
          updated_by INT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );

    ");

    $mysqli->query("

        CREATE TABLE IF NOT EXISTS orders(
          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          order_date date NOT NULL,
          order_code VARCHAR(255),
          total float(5,2) NOT NULL DEFAULT 0,
          created_by INT NOT NULL,
          updated_by INT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );

    ");

    $mysqli->query("

        CREATE TABLE IF NOT EXISTS order_details(
          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          order_id INT NOT NULL,
          product_id INT NOT NULL,
          quantity INT NOT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
     
    ");

    $mysqli->query("
         CREATE TABLE IF NOT EXISTS purchase_orders(
          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          customer_id INT NOT NULL,
          purchase_date date NOT NULL,
          code VARCHAR(255),
          total float(5,2) NOT NULL DEFAULT 0,
          supplier_id INT NOT NULL,
          description TEXT NULL,
          photo TEXT NULL,
          created_by INT NOT NULL,
          updated_by INT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
    ");

    $mysqli->query("
           CREATE TABLE IF NOT EXISTS purchase_order_details(
          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          purchase_order_id INT NOT NULL,
          product_id INT NOT NULL,
          quantity INT NOT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
      
    ");

    $mysqli->query("
         CREATE TABLE IF NOT EXISTS suppliers(
          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(255),
          address VARCHAR(255) NULL,
          contact VARCHAR(255) NULL,
          created_by INT NOT NULL,
          updated_by INT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
    ");

    $mysqli->query("
        CREATE TABLE IF NOT EXISTS customers(
          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(255),
          address VARCHAR(255) NULL,
          contact VARCHAR(255) NULL,
          created_by INT NOT NULL,
          updated_by INT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
    ");
    $count = $mysqli->query('SELECT count(*) FROM users')->fetch_assoc();
    if($count['count(*)'] == 0){
      $mysqli->query("
        INSERT INTO users(name,username,password,created_by) VALUES ('developer','developer','123',1);
      ");
    }
  }
}

?>
