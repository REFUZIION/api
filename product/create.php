<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include_once '../config/database.php';
include_once '../objects/product.php';

$naam = null;
$beschrijving = null;
$prijs = null;
$categorie = null;

if(isset($_GET['naam'])) {
    $naam = $_GET['naam'];
}

if(isset($_GET['beschrijving'])) {
    $beschrijving = $_GET['beschrijving'];
}

if(isset($_GET['prijs'])) {
    $prijs = $_GET['prijs'];
}

if(isset($_GET['categorie'])) {
    $categorie = $_GET['categorie'];
}

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

if($naam == null || $beschrijving == null || $prijs == null || $categorie == null){
    http_response_code(404);
    echo json_encode(array("message" => "Product toevoegen mislukt."));
}else{
    $product->create($naam, $beschrijving, $prijs, $categorie);
    http_response_code(200);
    echo json_encode(array("message" => "Product toevoegen gelukt."));
}