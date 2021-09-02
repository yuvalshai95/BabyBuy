<?php
include_once '../../classes/User.php';
$user = new User();

if (isset($_POST['submit'])) {
    
    $fb = $_POST['facebook'];
    $ig = $_POST['instagram'];
    $ln = $_POST['linkedin'];

    // 1) Check all fields not empty
    if (empty($fb) || empty($ig) || empty($ln)) {

        // Send user back to register page with error msg
        header("location: ../social.php?error=empty");

        exit(); // Stop the script from running
    }

    $user -> updateSocial($fb, $ig, $ln);
    header("location: ../social.php?action=success");
    exit();


}else{
    header("location: ../social.php");
    exit();
}