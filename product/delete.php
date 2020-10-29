<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include_once '../config/database.php';
include_once '../objects/product.php';

$id = null;

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

$database = new Database();
$db = $database->getConnection();
$product = new Product($db);


if($id == null){
    http_response_code(404);
    echo json_encode(array("message" => "Product verwijderen mislukt."));
}else{
    $product->delete($id);
    http_response_code(200);
    echo json_encode(array("message" => "Product verwijderen gelukt."));
}