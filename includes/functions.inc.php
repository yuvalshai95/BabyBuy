<?php 

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
        header("location: ../register.php?error=stmtfailed");

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