<?php
    require_once '../classes/Product.php';

    $userId = $_POST['userId'];
    $pd = new Product();
    $num =  $pd->getNumberOfItemsInWishlist($userId);
    echo $num;
