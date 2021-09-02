<?php

include_once '../../classes/User.php';
$user = new User();

if (isset($_POST['submit'])) {

    $copyright = $_POST['copyright'];
    
    // 1) Check all fields not empty
    if (empty($copyright)) {

        // Send user back to register page with error msg
        header("location: ../copyright.php?error=empty");

        exit(); // Stop the script from running
    }

    $user->updateCopyright($copyright);
    header("location: ../copyright.php?action=success");
    exit();

}else{
    header("location: ../copyright.php");
    exit();
}