
<?php
    require_once '../classes/Product.php';
    $pd = new Product();

    if (isset($_POST['currentUserId'])) {
        $currentUser = $_POST['currentUserId'];
        $wishPd     = $_POST['pdId'];
       $wishOwnerid = $_POST['ownerId'];
       $return_msg = array();

       // Add product to wish list if user and owner are different
       if($currentUser != $wishOwnerid){

        // Check this item is not already in wishlist table
        if ($pd->isProductInWishlist($wishPd , $currentUser ) == false) {

            // Add product to wishlist
            $pd->InsertToWishlist($wishPd, $wishOwnerid , $currentUser);
            echo 'Product added !';

        }else{
            echo "This product is already in your wishlist";
        }
           
       }else{
           echo "You cant add your own products to wishlist";  
       }
       
    } 
?>