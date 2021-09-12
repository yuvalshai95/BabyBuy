<?php
require_once '../DataBase/DB_Config.php';
require_once '../classes/Product.php';

$pd = new Product();

$idToDelete = $_POST['id'];

$pd -> deleteFromProductById($idToDelete);
