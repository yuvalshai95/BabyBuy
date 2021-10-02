<?php
require_once '../DataBase/DB_Config.php';
require_once '../includes/functions.inc.php';
require_once '../classes/Product.php';


$db = new Database();
$pd = new Product();

if(isset($_POST['edit'])){
    $name           = $_POST['name'];
    $description    = $_POST['description'];
    $price          = $_POST['price'];
    $pickup         = $_POST['pickup'];
    $age            = $_POST['age'];
    $condition      = $_POST['condition'];
    $status         = $_POST['status'];
    $userId         = $_POST['currentUser_id'];
    $productId      = $_POST['productId'];
    $pdCategory     = $_POST['pdCategory'];

    $pd->updateProductById($userId,$productId,$name,$description,$price,$pickup,$age,$condition,$status);
    header("location: ../userproducts.php");

}else{
    header("location: userproducts.php");
    exit();
}