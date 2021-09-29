<?php
    $pd = new Product();
    $foramt = new Foramt();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cards</title>
    <link href="styleA/css/all.css" rel="stylesheet">

    <!-- style product cards -->
    <link href="styleA/cardsStyle.css" rel="stylesheet">

    <!-- Box icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</head>
<body>
    
<div class="productCardsContainer">
    <div class="container">

        <?php
            $getpd = $pd->getSimilarProducts($category_id);
            if($getpd){
                while($result = $getpd->fetch_assoc()){


        ?>
        <!-- TODO: Add <a> tag to be able to click on the product and go to product page  -->
         <!-- TODO: Add <a> tag to be able to click on the Wishlist and go to product page  -->
        <div class="card">
            <div class="imgBx">
               <a href="ProductPage.php?pdId=<?php echo $result['ProductID']; ?>&userId=<?php echo $result['UserID']; ?>&productCategory=<?= $result['ProductCategory']; ?>"> 
               <img src="<?php  
                            $img = $pd->getSingleImagesByProductId($result['ProductID'])->fetch_assoc(); 
                            $single = $img['ImagePath']; 
                            $single = str_replace('../','',$single); 
                            echo $single ?>"></a>
                <ul class="action">

                <!-- Checking to see if user is logged in -->
                <?php 
                    // User is logged in -> show wishlist button
                    if(Session::get("userId") !== false){ ?>
                    <li>
                        <i class='bx bx-heart' style='font-size:22px;' onclick="addToWishlist(<?php  echo Session::get("userId")?>,<?php  echo $result['ProductID']; ?>,<?php echo $result['UserID']; ?>)" ></i>
                    </li>
                    <?php } ?>

                    <li>

                    <a href="ProductPage.php?pdId=<?php echo $result['ProductID']; ?>&userId=<?php echo $result['UserID']; ?>&productCategory=<?php echo $result['ProductCategory']; ?>">  <i class="far fa-eye"></i> </a>
                        <span>View Details</span>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div class="productName">
                    <h3><?=$result['ProductName'];?></h3>
                </div>
                <div class="price_status">
                    <h2>$<?= $result['Price']; ?></h2>
                    <div style="background: <?php 
                                                if($result['ProductCondition'] == "new"){
                                                    echo '#007bff';
                                                }
                                                else if($result['ProductCondition'] == "barley"){
                                                    echo '#6c757d';
                                                }
                                                else if($result['ProductCondition'] == "open"){
                                                    echo '#28a745';
                                                } 
                                                else if($result['ProductCondition'] == "gently"){
                                                    echo '#343a40';
                                                } 
                                                ?>;" class="status">

                        <h4><?= strtoupper($result['ProductCondition']); ?></h4>
                    </div>
                </div>
            </div>
        </div>

        <?php }} ?>
       


    </div>

</div>


<!-- alert adding item to user wishlist -->
<script>
    function addToWishlist(currentUserId,pdId,ownerId){
        $.ajax({
            url:'includes/addToWishList.inc.php',
            type:'POST',
            data:{currentUserId:currentUserId,pdId:pdId,ownerId:ownerId},
            success: function(data){
                // Remove all white spaces
                var trimData = $.trim(data);

                // alert the message using sweet alert
               if(trimData == "This product is already in your wishlist"){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        backdrop: 'rgba(0,0,123,0.4)',
                        text: trimData,
                        footer: ''
                    })
               }else if(trimData == "You cant add your own products to wishlist"){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    backdrop: 'rgba(0,0,123,0.4)',
                    text: trimData,
                    footer: ''
                })
               }else{
                Swal.fire({
                    icon: 'success',
                    title: trimData,
                    showConfirmButton: false,
                    padding: '1em',
                    timer: 2500
                    })
               }


                // wishlist number function
                $(document).ready(function(){
                    var sessionId = currentUserId;
                    $.ajax({
                    url:'includes/wishlistNumber.inc.php',
                    method:"POST",
                    data:{userId:sessionId},
                    success: function(data){
                        $('#wishlistNumber').html(data);
                    }
                    });
                });

            }
        })
    }
</script>





</body>
</html>