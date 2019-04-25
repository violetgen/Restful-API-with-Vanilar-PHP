<?php 

  class Book {
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

    public function createBook(){
      $query = 'INSERT INTO ' . 
      $this->table . ' 
          SET
            title = :title,
            author = :author,
            price = :price';

        $stmt = $this->conn->prepare($query);

        //Remove unwanted elements in data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->price = htmlspecialchars(strip_tags($this->price));


        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':price', $this->price);

        if($stmt->execute()) {
          return true;
        }
        printf('Error occured: ', $stmt->error);

        return false;
      }
  }