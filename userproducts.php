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
                <td>
                    <button type="button" name="edit" class="edit_data" id="<?php echo $row['ProductID']; ?>">Details</button>
                    <input type="hidden" name="currentUser_id" class="current_user" id="<?php echo $currentUser;?>">
                </td>

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


<!--  product Details after button click bootstrap modal -->
    <div id="edit_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">  
                     <button style="color:white; background-color:#253b70; margin:0 0;" type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 style="    margin-top: 1em;margin-right: 5.5em;" class="modal-title">Product Details</h4>  
                </div>  

                <!-- Body, get body content from ajax function call -->
                <div class="modal-body" id="product_detail">  
                    
                </div>

                <!-- Footer -->
                <div class="modal-footer">  
                     <button style="color:white; background-color:#253b70;" type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
<!--  product Details after button click bootstrap modal -->


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



<!-- Script to show user details modal on click -->
<script>
    $(document).ready(function(){
        $('.edit_data').click(function(){
            var product_id = $(this).attr("id"); // id from details button 
            var currentUser_id = $('.current_user').attr("id") // user id from hidden input

            $.ajax({
                url:"includes/productdata.inc.php",
                method:"POST",
                data:{product_id:product_id,
                      currentUser_id:currentUser_id},
                success: function(data){
                    // data we get back from the sever we want to show it in class=modal-body, id=user_detail
                    $('#product_detail').html(data);

                    //div id=datamodal selector -> on success show modal
                    $('#edit_data_Modal').modal("show");
                }
            });
        });
    });
 
</script>
<!-- Script to show user details modal on click -->
<?php require_once 'includes/footer.php';  ?>