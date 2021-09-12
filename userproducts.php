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

<link rel="stylesheet" href="styleA/userproducts.css">

<!-- Box icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <title>MyProducts</title>
</head>
<body>




    <div class="small-container myproducts-page">

        <div class="header_myproducts">
            <span>My Products</span>
        </div>
    
        <table>
            <tr>
                <!-- Table Header -->
                <th>Product</th>
                <th>Details</th>
                <th>Remove</th>

            </tr>

            
            <!-- Get all user items by user ID from session-->
            <?php

            $getAllItems = $pd->getAllProductsByUserId($currentUser);
            if ($getAllItems !== false) {
                while($row = $getAllItems->fetch_assoc()){
            ?>
            <tr id="tr_<?php echo $row['ProductID'] ?>">
                <td>
                    <div class="product-info">
                        <img src="<?php  
                                    $img = $pd->getSingleImagesByProductId($row['ProductID'])->fetch_assoc(); 
                                    $single = $img['ImagePath']; 
                                    $single = str_replace('../','',$single); 
                                    echo $single?>">

                        <div>
                            <p><?php echo $row['ProductName'] ?></p>

                        </div>              
                    </div>
                </td>

                <!-- Details -->
                <td>EDIT</td>

                <!-- Remove -->
                <td>
                    <div class="delete">
                        <button type="button" onclick="delete_data('<?php echo $row['ProductID']?>')"><i class='bx bx-x-circle'></i></button>
                    </div>
                </td>

            </tr>
            <?php }}else{
        echo '<div align="center"><h3 style="color:red;">Empty :(</h3></div>';
    } ?>
        </table>
    </div>


</body>
</html>


    <!-- jQuery Script to delete item from wishlist table -->
<script>
    function delete_data(id){
        jQuery.ajax({
            url: 'includes/userproducts.inc.php',
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



<?php require_once 'includes/footer.php';  ?>