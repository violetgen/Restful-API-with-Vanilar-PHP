<?php

  class Database {
    private $host = "localhost";
    private $db_name = "books";
    private  $username ="steven";
    private $password = "here";
    private $conn;

    //connect to the database 
    public function connect() {
      $this->conn = null;

      try {
        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        echo "Error connecting to the database: ". $e->getMessage();
      }

      return $this->conn;
    }
  }