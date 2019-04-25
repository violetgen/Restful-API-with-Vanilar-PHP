<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/database.php';
include_once '../models/Book.php';


$database = new Database();

$db = $database->connect();

//book object 
$book = new Book($db);

//get data from request:
$data = json_decode(file_get_contents("php://input"));

$book->id = $data->id; 
$book->title = $data->title;
$book->author = $data->author;
$book->price = $data->price;

if($book->updateBook()) {
  echo json_encode(['message' => 'Book updated']);
} else {
  echo json_encode(['message' => 'Book not updated']);
}