<?php
require_once '../DataBase/DB_Config.php';
require_once '../includes/functions.inc.php';
require_once '../classes/User.php';


$db = new Database();
$user = new User();

if(isset($_POST['submit'])){

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $validatePassword = $_POST['validatePassword'];
    $phone = $_POST['phone'];
    $Interest = $_POST['categories'];

    // 1) Check if empty field
    if (emptyInputRegister($firstName,  $lastName,  $city, $address, $email,  $password,  $validatePassword, $phone) !== false) {

        // Send user back to register page with error msg
        header("location: ../register.php?error=emptyinput");

        exit(); // Stop the script from running
    }

    // 2) Check user first name input
    if (invalidUserFirstName($firstName) !== false) {
        
        // Send user back to register page with error msg
        header("location: ../register.php?error=invaliduserfirstname");

        exit(); // Stop the script from running
    }

    // 3) Check user last name input
    if (invalidUserLastName($lastName) !== false) {
    
        // Send user back to register page with error msg
        header("location: ../register.php?error=invaliduserlastname");

        exit(); // Stop the script from running
    }


    // 4) Check user email input
    if (invalidUserEmail($email) !== false){
    
        // Send user back to register page with error msg
        header("location: ../register.php?error=invalidemail");

        exit(); // Stop the script from running
    }

    // 5) Check user password input
    if (invalidUserPassword($password) !== false) {

        // Send user back to register page with error msg
        header("location: ../register.php?error=invalidpassword");

        exit(); // Stop the script from running
    }

    // 6) Check if user password and validate password are matched
    if (passwordMatch($password, $validatePassword) !== false) {

        // Send user back to register page with error msg
        header("location: ../register.php?error=invalidmatchpassword");

        exit(); // Stop the script from running
    }

    // 7) Check if user email is free to use
    if (emailExists($db->link, $email) !== false) {

        // Send user back to register page with error msg
        header("location: ../register.php?error=emailistaken");

        exit(); // Stop the script from running
    }

    // 8) Check city input
    if (invalidCity($city) !== false) {

        // Send user back to register page with error msg
        header("location: ../register.php?error=invalidcity");

        exit(); // Stop the script from running
    }
    
    // 9) Check address input
    if (invalidAddress($address) !== false) {
        
        // Send user back to register page with error msg
        header("location: ../register.php?error=invalidaddress");

        exit(); // Stop the script from running
    }

    // Check phone number input
    if (invalidPhoneNumber($phone) !== false) {
        
        // Send user back to register page with error msg
        header("location: ../register.php?error=invalidphone");

        exit(); // Stop the script from running
    }

    // user made no mistake, creating the user
    $user->userInsert($_POST);




}else{
    header("location: ../register.php");
    exit(); // Stop the script from running
}