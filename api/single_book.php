<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../models/Book.php';


$database = new Database();
$db = $database->connect();

//Post object 
$book = new Book($db);

//get the book id from the params
$book->id = isset($_GET['id']) ? $_GET['id'] : die();

$book->singleBook();

$book_arr = [
  'id' => $book->id,
  'title' => $book->title,
  'author' => $book->author,
  'price' => $book->price,
];

//convert to json:
print_r(json_encode($book_arr));

