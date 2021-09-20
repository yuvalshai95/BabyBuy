<?php
require_once '../classes/Product.php';

$pd = new Product();

$idToDelete = $_POST['id'];

$pd -> deleteFromWishlist($idToDelete);
