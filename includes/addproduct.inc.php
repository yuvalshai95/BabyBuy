<?php

require_once '../DataBase/DB_Config.php';
require_once '../includes/functions.inc.php';
require_once '../classes/Product.php';

$db = new Database();
$pd = new Product();

if(isset($_POST['submit'])){
    $userId = $_POST['userId'];
    $pdCategory = $_POST['pdCategory'];
    $pdName = $_POST['pdName'];
    $pdDescription = $_POST['pdDescription'];
    $pdPickUp = $_POST['pdPickUp'];
    $pdAge = $_POST['pdAge'];
    $pdPrice = $_POST['pdPrice'];
    $pdStatus = $_POST['pdStatus'];
    $pdCondition = $_POST['pdCondition'];
    $file = $_FILES;

    //TODO: DELETE
    if(isset($_POST['pd_Sub_shoes_12'])){
        $pdSubCategory = $_POST['pd_Sub_shoes_12'];
    }
    else if(isset($_POST['pd_Sub_bags_5'])){
        $pdSubCategory = $_POST['pd_Sub_bags_5'];
    }
    else if(isset($_POST['pd_Sub_bags_1'])){
        $pdSubCategory = $_POST['pd_Sub_bags_1'];
    }

    // 1)Check if empty field
    if(empty($pdName) || empty($pdDescription) || empty($pdPrice)){

        // Send user back to register page with error msg
        header("location: ../addproduct.php?error=emptyinput");

        exit(); // Stop the script from running
    }

    // 2)Check name input is valid
    if(invalidAddress($pdName) !== false){

    // Send user back to register page with error msg
    header("location: ../addproduct.php?error=invalidproductname");

    exit(); // Stop the script from running
    }

    // 3)Check price input is valid
    if(preg_match("/^[0-9]{1,6}$/",$pdPrice) == false){

        // Send user back to register page with error msg
        header("location: ../addproduct.php?error=invalidprice");

        exit(); // Stop the script from running
    }


    // No Errors -> insert product to database
    $pd->productInsert($userId, $pdCategory, $pdName, $pdDescription,$pdPickUp,$pdAge, $pdPrice, $pdStatus,$pdCondition,$file);
    

}else{
    echo 'else';
    header("location: ../addproduct.php");
    exit(); // Stop the script from running
}