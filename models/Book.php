<?php 

  class Post {
    private $conn;
    private $table = 'books';

    public $id;
    public $title;
    public $author;
    public $price;
    public $created_at;
    
    public function __construct($db)
    {
      $this->conn = $db;
    }
  }