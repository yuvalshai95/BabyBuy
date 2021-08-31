<?php 
require_once '../DataBase/DB_Config.php';


function emptyInputRegister($firstName,  $lastName,  $city, $address, $email,  $password,  $validatePassword, $phone){
    // Checking if there is an empty field input
    if ( empty($firstName) ||  empty($lastName) ||  empty($city) || empty($address) || 
        empty($email) || empty($password) || empty($validatePassword) || empty($phone) ) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emptyInputLogin($userEmail, $userPass){
    // Checking if there is an empty field input
    if ( empty($userEmail) || empty($userPass) ) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidUserFirstName($firstName){

    // Check if user first name has only letters and length is 2 or more no special chars
    if (preg_match("/^[a-zA-Z]{2,}$/",$firstName)) {
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}

function invalidUserLastName($lastName){

    // Check if user last name has only letters and length is 2 or more no special chars
    if (preg_match("/^[a-zA-Z]{2,}$/",$lastName)) {
        $result = false;
    }else{
        $result = true;
    }

    return $result;
}

function invalidUserEmail($email){
    // Check for valid email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidUserPassword($password){

  //  ^: anchored to beginning of string
  //  \S*: any set of characters
  //  (?=\S{8,}): of at least length 8
  //  (?=\S*[a-z]): containing at least one lowercase letter
  //  (?=\S*[A-Z]): and at least one uppercase letter
  //  (?=\S*[\d]):
  //  (?=\S*[\W]): and at least one special char
  //  $: anchored to the end of the string
    if (preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/",$password)) {
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}

function passwordMatch($password, $validatePassword){
    if ($password !== $validatePassword) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emailExists($link, $email){
    $query = "SELECT *
              FROM users 
              WHERE users.UserEmail  = ?";
   $stmt = mysqli_stmt_init($link);
   if (!mysqli_stmt_prepare($stmt,$query)) {

        // Send user back to register page with error msg
        header("location: ../login.php?error=stmtfailed");

        exit(); // Stop the script from running
   }

   mysqli_stmt_bind_param($stmt,"s", $email);
   mysqli_stmt_execute($stmt);

   $result = mysqli_stmt_get_result($stmt);

   if($row = mysqli_fetch_assoc($result)){
        return $row;

   }else{
       $result = false;
       return $result;
   }

   mysqli_stmt_close($stmt);
    
}

function isNotEmailExists($link, $email){
    $db = new Database();
    $query = "SELECT *
              FROM users 
              WHERE users.UserEmail  = ?";
   $stmt = mysqli_stmt_init($link);
   if (!mysqli_stmt_prepare($stmt,$query)) {

        // Send user back to register page with error msg
        header("location: ../login.php?error=stmtfailed");

        exit(); // Stop the script from running
   }

   mysqli_stmt_bind_param($stmt,"s", $email);
   mysqli_stmt_execute($stmt);

   $result = mysqli_stmt_get_result($stmt);

   if(mysqli_num_rows($result) == 0){
         $isNotExists = true;

   }else{
       $isNotExists = false;
       
   }
   return $isNotExists;
   mysqli_stmt_close($stmt);

}


function invalidCity($city){
    //removing white space from city input
    $city = str_replace(' ','',$city);
    if (preg_match("/^[a-zA-Z]{2,}$/",$city)) {
        $result = false;
    }else{
        $result = true;
    }

    return $result;
}

function invalidAddress($address){
    //removing white space from address input
    $address = str_replace(' ','',$address);
    if (preg_match("/^[a-zA-Z0-9]{2,}$/",$address)) {
        $result = false;
    }else{
        $result = true;
    }

    return $result;
}

function invalidPhoneNumber($phone){
    if (preg_match("/^[0-9]{10}$/",$phone)) {
        $result = false;
    }else{
        $result = true;
    }

    return $result;
}

function invalidPassword($conn,$userPass,$userEmail){
    $query = "SELECT *
             FROM users 
             WHERE users.UserEmail  = ? AND users.UserPassword = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$query)) {

    // Send user back to register page with error msg
    header("location: ../login.php?error=stmtfailed");

    exit(); // Stop the script from running
    }

    mysqli_stmt_bind_param($stmt,"ss", $userEmail,$userPass);
    mysqli_stmt_execute($stmt);
 
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) === 0){
        $invalid = true;
    }
    else{
        $invalid = false;
    }
    return $invalid;
    mysqli_stmt_close($stmt);
}

function  loginUser($conn, $userEmail, $userPass){
    $query =  "SELECT *
               FROM users
               WHERE users.UserEmail = ? AND users.UserPassword = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$query)) {

        // Send user back to register page with error msg
        header("location: ../login.php?error=stmtfailed");
    
        exit(); // Stop the script from running
        }

    mysqli_stmt_bind_param($stmt,"ss", $userEmail,$userPass);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if($result !== false){
        session_start();
        $row = $result->fetch_assoc();
        Session::set('userId',$row['UserID']);
        Session::set('userFirstName',$row['FirstName']);
        Session::set('userLastName',$row['LastName']);
        Session::set('userCity',$row['City']);
        Session::set('userEmail',$row['UserEmail']);
        Session::set('userPass',$row['UserPassword']);
        Session::set('userPhone',$row['PhoneNumber']);
        Session::set('userInterest',$row['Interest']);
        Session::set('userAddress',$row['Address']);

        header('Location: ../homepage.php');
        exit();
    }
}
