<?php
require_once '../DataBase/DB_Config.php';
require_once '../includes/functions.inc.php';
require_once '../classes/User.php';

$db = new Database();
$user = new User();

if (isset($_POST['submit'])) {
    $id         = $_POST['userId'];
    $pwd        = $_POST['pwd'];
    $newPwd     = $_POST['newPwd'];
    $confrimPwd = $_POST['confrimPwd'];

    // 1) Check empty fields
    if (empty($pwd) || empty($newPwd) || empty($confrimPwd)) {
        // Send user back to edit page with error msg
        header("location: ../editpassword?error=empty");
        exit();// Stop the script from running
    }

    // 2) Check current password and new password are different
    if(strcmp($pwd,$newPwd) == 0){
        // Send user back to edit page with error msg
        header("location: ../editpassword?error=oldnewmatch");
        exit();// Stop the script from running
    }

    // 3) Check new password  and confirm are the same
    if(strcmp($newPwd,$confrimPwd) !== 0){
        // Send user back to edit page with error msg
        header("location: ../editpassword?error=confirm");
        exit();// Stop the script from running
    }

    // 4) Check current password is a match from database
    if(!$user->isPasswordDatabase($pwd)){
        // Send user back to edit page with error msg
        header("location: ../editpassword?error=currentpwd");
        exit();// Stop the script from running
    }

    // 5) Check new password is valid
    if(invalidUserPassword($newPwd) !== false){
        // Send user back to edit page with error msg
        header("location: ../editpassword?error=invalidnewpassword");
        exit();// Stop the script from running
    }

    $user->updateUserPassword($id, $newPwd);


}else{
    header("location: ../editpassword.php");
    exit();
}