<?php
require_once '../DataBase/DB_Config.php';
require_once '../includes/functions.inc.php';
require_once '../classes/User.php';

$user = new User();
$db = new Database();

if (isset($_POST['submit'])) {
    $userEmail = $_POST["email"];
    $userPass = $_POST["password"];

 // 1) Check if empty field
 if (emptyInputLogin($userEmail, $userPass) !== false) {

    // Send user back to register page with error msg
    header("location: ../login.php?error=emptyinput");

    exit(); // Stop the script from running
}

  // 2) Check user email input
  if (invalidUserEmail($userEmail) !== false){
    
    // Send user back to register page with error msg
    header("location: ../login.php?error=invalidemail");

    exit(); // Stop the script from running
}

    // 3) Check user password input
    if (invalidUserPassword($userPass) !== false) {

        // Send user back to register page with error msg
        header("location: ../login.php?error=invalidpassword");

        exit(); // Stop the script from running
    }

    // 4) Check user emails is in the database input
    if (isNotEmailExists($db->link,$userEmail) !== false) {

        // Send user back to register page with error msg
        header("location: ../login.php?error=emailnotexists");

        exit(); // Stop the script from running
    }

    // 5) Check user emails with given password is a match
    if (invalidPassword($db->link,$userPass,$userEmail) !== false) {

    // Send user back to register page with error msg
    header("location: ../login.php?error=emailorpasswordwrong");

    exit(); // Stop the script from running
}

    loginUser($db->link, $userEmail, $userPass);
  


}else{
    header("location: ../login.php");
    exit(); 
}