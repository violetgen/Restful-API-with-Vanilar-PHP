<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/database.php';
include_once '../models/Book.php';


$database = new Database();

$db = $database->connect();

//Book object 
$book = new Book($db);

//get data from request:
$data = json_decode(file_get_contents("php://input"));

$book->id = $data->id; 


if($book->deleteBook()) {
  echo json_encode(['message' => 'Book deleted']);
} else {
  echo json_encode(['message' => 'Book not deleted']);
}