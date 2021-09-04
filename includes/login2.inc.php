<?php
    require_once '../DataBase/DB_Config.php';
    require_once '../includes/functions.inc.php';
    require_once '../classes/User.php';

    $user = new User();
    $db = new Database();

    $email = $_GET['email'];
    $pass = $_GET['password'];
    


?>