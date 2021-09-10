<?php require_once 'includes/navTop.php';  
      require_once 'classes/Product.php';
      require_once 'classes/User.php';
?>

<?php
    if (Session::get("userId") == false) {
        echo "<script>window.location = '404.php'; </script>";
    }
    $currentUser = Session::get("userId");
    $pd = new Product();
    $user = new User();
?>


<!-- Add to wish list product user clicked on -->
<?php
    if (isset($_POST['currentUserId'])) {
        $wishPd     = $_POST['pdId'];
       $wishOwnerid = $_POST['ownerId'];

       // Add product to wish list if user and owner are different
       if($currentUser != $wishOwnerid){

        // Check this item is not already in wishlist table
        if ($pd->isProductInWishlist($wishPd , $wishOwnerid ) == false) {

            // Add product to wishlist
            $pd->InsertToWishlist($wishPd, $wishOwnerid , $currentUser);
        }
           
       }
       
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- jQuery CDN  DON'T TOUCH OR CODE WILL BREAK-->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- jQuery CDN  DON'T TOUCH OR CODE WILL BREAK-->


<!-- BOOTSTRAP DON'T TOUCH OR CODE WILL BREAK -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<!-- BOOTSTRAP DON'T TOUCH OR CODE WILL BREAK -->

<link rel="stylesheet" href="styleA/wishlist.css">

    <title>Wishlist</title>
</head>
<body>

    <div id="footer-container">


    <div class="small-container wishlist-page">

        <div class="header_wishlist">
            <span>My Wishlist</span>
        </div>
    
        <table>
            <tr>
                <!-- Table Header -->
                <th>Product</th>
                <th>Status</th>
                <th>Seller Details</th>
                <th>Product Page</th>
            </tr>

            
            <!-- Get all wishlist items by user ID from session-->
            <?php

            $getAllWishlist = $pd->getAllWishlist($currentUser);
            if ($getAllWishlist !== false) {
                while($row = $getAllWishlist->fetch_assoc()){
                    $product = $pd->getProductByIdAndUser($row['ProductID'],$row['UserID'])->fetch_assoc();
            ?>
            <tr id="tr_<?php echo $row['ID'] ?>">
                <td>
                    <div class="wishlist-info">
                        <img src="<?php  
                                    $img = $pd->getSingleImagesByProductId($product['ProductID'])->fetch_assoc(); 
                                    $single = $img['ImagePath']; 
                                    $single = str_replace('../','',$single); 
                                    echo $single?>">

                        <div>
                            <p><?php echo $product['ProductName'] ?></p>
                            <small>Unit Price: $<?php echo $product['Price'] ?></small>
                            <br>
                            <div class="delete">
                                <button type="button" onclick="delete_data('<?php echo $row['ID']?>')">Delete</button>
                            </div>
                        </div>              
                    </div>
                </td>
                <td><?php echo $product['Status'] ?></td>
                <td><button type="button" name="view" class="view_data" id="<?php echo $row['UserID']; ?>">Details</button></td>
                <td><a class="goto" href="ProductPage.php?pdId=<?php echo $row['ProductID']?>&userId=<?php echo $row['UserID']?>&productCategory=<?php echo $product['ProductCategory']?>">Go to page</a></td>
            </tr>
            <?php }}else{
        echo '<div align="center"><h3 style="color:red;">Empty :(</h3></div>';
    } ?>
        </table>
    </div>
    </div>

</body>
</html>


    <!-- jQuery Script to delete item from wishlist table -->
<script>
    function delete_data(id){
        jQuery.ajax({
            url: 'includes/wishlist.inc.php',
            type:'post',
            data: {id:id},
            success: function(result){
                // on success hide row
                jQuery("#tr_"+id).hide(600);
            }
        });
    }
</script>
 <!-- jQuery Script to delete item from wishlist table -->


<!-- User Details after button click bootstrap modal -->
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <button style="color:white; background-color:#253b70; padding:5px; border-radius:10px;" type="button" name="close" data-dismiss="modal">X</button>
                <h4 class="modal-title">User Details</h4>
            </div>

            <!-- Body, get body content from ajax function call -->
            <div class="modal-body" id="user_detail">
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button style="color:white; background-color:#253b70;" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- User Details after button click bootstrap modal -->


<!-- Script to show user details modal on click -->
<script>
    $(document).ready(function(){
        $('.view_data').click(function(){
            var user_id = $(this).attr("id"); // id from details button 

            $.ajax({
                url:"includes/userdata.inc.php",
                method:"post",
                data:{user_id:user_id},
                success: function(data){ 
                    // data we get back from the sever we want to show it in class=modal-body, id=user_detail
                    $('#user_detail').html(data);

                    //div id=datamodal selector -> on success show modal
                    $('#dataModal').modal("show");
                }
            });
        });
    });
</script>
<!-- Script to show user details modal on click -->


<?php require_once 'includes/footer.php';  ?>