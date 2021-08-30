<?php
require_once '../DataBase/DB_Config.php';
require_once '../includes/functions.inc.php';
require_once '../classes/User.php';

$db = new Database();
$user = new User();

if (isset($_POST['submit'])) {

    $id         = $_POST['userId'];
    $firstName  = $_POST['firstName'];
    $lastName   = $_POST['lastName'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $city       = $_POST['city'];
    $address    = $_POST['address'];

    // 1) Check empty fields
    if ( empty($firstName) || empty( $lastName) || empty($email) || empty( $phone) || empty( $city) || empty( $address)) {
        
        // Send user back to edit page with error msg
        header("location: ../editprofile?error=empty");

        exit();// Stop the script from running
    }

    // 2) Check first name input
    if (invalidUserFirstName($firstName) !== false) {
    
        // Send user back to edit page with error msg
        header("location: ../editprofile?error=invaliduserfirstname");

        exit();// Stop the script from running
    }

    // 3) Check last name input
    if (invalidUserLastName($lastName) !== false) {

        // Send user back to edit page with error msg
        header("location: ../editprofile?error=invaliduserlastname");

        exit();// Stop the script from running
    }

    // 4) Check email input
    if (invalidUserEmail($email) !== false) {

        // Send user back to edit page with error msg
        header("location: ../editprofile?error=invalidemail");

        exit();// Stop the script from running
    }

    // 5) Check phone number input
    if (invalidPhoneNumber($phone) !== false) {

        // Send user back to edit page with error msg
        header("location: ../editprofile?error=invalidphone");

        exit();// Stop the script from running
    }

    // 6) Check city input
    if (invalidCity($city) !== false) {

        // Send user back to edit page with error msg
        header("location: ../editprofile?error=invalidcity");

        exit();// Stop the script from running
    }

    // 7) Check address input
    if (invalidAddress($address) !== false) {

        // Send user back to edit page with error msg
        header("location: ../editprofile?error=invalidaddress");

        exit();// Stop the script from running
    }

    $user->updateUserDetails($id, $firstName, $lastName, $email, $phone, $city, $address);


}else{
    header("location: ../editprofile.php");
}