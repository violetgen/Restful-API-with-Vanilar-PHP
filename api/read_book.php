<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../models/Book.php';


$database = new Database();
$db = $database->connect();

//book object 
$book = new book($db);

$result = $book->readBook();
//get row count:
$num = $result->rowCount();

if($num > 0 ){
  $book_arr = [];
  $book_arr['retrieved'] = [];

  //fetch as an asscoiative array
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    //use the individual elements by extracting the object
    extract($row);
      $book_item = [
        'id' => $id,
        'title' => $title,
        'author' => $author,
        'price' => $price,
      ];

      array_push($book_arr['retrieved'], $book_item);
  }

  //turn the array to json
  echo json_encode($book_arr);

} else {
  //No book 
  echo json_encode(['message' => 'No book found']);
}
