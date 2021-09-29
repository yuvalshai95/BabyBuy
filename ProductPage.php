    <!-- top nav bar -->
    <?php include_once 'includes/navTop.php'; ?>
<?php
    if ( !isset($_GET['pdId']) || !isset($_GET['userId']) || !isset($_GET['productCategory']) 
          || $_GET['pdId']==NULL ||  $_GET['userId']==NULL ||  $_GET['productCategory']==NULL) {

        // Reload homepage.php page script.. can't get productinfo with null ID
        echo "<script>window.location = '404.php'; </script>";
    } else{

        // got all the var's needed from the URL to show product page
        $pd_id = $_GET['pdId'];
        $user_id = $_GET['userId'];
        $category_id = $_GET['productCategory'];
    }

    $pd = new Product();
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="styleA/css/all.css" rel="stylesheet">
    <link href="styleA/css/all.min.css" rel="stylesheet">

    <!-- style Product Page -->
    <link href="styleA/productPage.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>



<div class="productPageContainer">
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <div class="big-img">
                    <img  src="<?php  
                            $img = $pd->getSingleImagesByProductId($pd_id)->fetch_assoc(); 
                            $single = $img['ImagePath']; 
                            $single = str_replace('../','',$single); 
                            echo $single?>" width="100%" id="ProductImg">
                </div>
                <!-- get all product images from database -->
                <div class="small-img-row">
                <?php
                            // init array to store all images path                
                            $imagePath = [];

                            // get all images path
                            $getAllImages = $pd->getAllImagesByProductId($pd_id);

                            // add all images path to the array
                            while($row = $getAllImages->fetch_assoc()){
                                array_push($imagePath,$row['ImagePath']);
                            }

                            // display to user images
                            foreach ($imagePath as $path) {

                                // remove from path -> "../"
                                $path = str_replace('../','',$path);
                                echo '      <div class="small-img-col">
                                                <img src="'.$path.'" alt="" width="100%" class="small-img">
                                            </div>';
                            }
                ?>
                </div>

            </div>

            <?php
               
                $getpd = $pd->getProductByIdAndUser($pd_id,$user_id);
                if ($getpd) {
                    $result = $getpd->fetch_assoc();

                }

            ?>


            <div class="col-2">
                <p style="color:#adabab;font-weight: bold;"><a style="color:#adabab;font-weight: bold;" href="homePage.php">Home</a>  / <?= $result['CategoryName']; ?></p>
                <h1><?= $result['ProductName']; ?></h1>
                <h4>$<?= $result['Price']; ?> | <?= $result['Status']; ?></h4>
                <h5>Age: 
                    <?php
                        if ($result['Age']<4) {
                            echo '0-3 months';
                        }
                        else if($result['Age']<12){
                            echo '0-12 months';
                        }else if($result['Age']<36){
                            echo '12-36 months';
                        }else{
                            echo '36+ months';
                        }
                    ?>
                </h5>
                <h5>Pickup Option: <?= $result['PickupOptions']; ?></h5>
                <h5>Condition: <?= $result['ProductCondition']; ?></h5>
                

                <!-- Wishlist button if user logged in-->
                <?php if(Session::get("userId")) {?>
                <span class="btn" onclick="addToWishlist(<?php  echo Session::get("userId")?>,<?php  echo $result['ProductID']; ?>,<?php echo $result['UserID']; ?>)" > <i class="fas fa-heart wishlist"></i> Add to Wishlist</span>
                <?php } ?>

                <h3>Product Details <i class="fa fa-indent"></i></h3>
                <br>
                <p class="prodDetails"> <?= $result['Description']; ?></p>
                
            </div>
        </div>

        <div class="row-seller">
            <div class="col-2 seller">
                <div class="details">
                    <h3>Seller Contact Information</h3>
                    <p class="sellerDetails"><?= $result['FirstName']; ?> <?= $result['LastName']; ?></p>
                    <p class="sellerDetails"><?= $result['Address']; ?>, <?= $result['City']; ?></p>
                    <p class="sellerDetails"><?= $result['PhoneNumber']; ?></p>
                    <p class="sellerDetails"><?= $result['UserEmail']; ?></p>
                </div>
                <div class="whatsappIcon">
                    
                <!--TODO Make whatsapp phone number work -->
                   <label class="contact" for="" id="nav-toggle-bottom" data-toggle="tooltip" 
                            title="Ask me about this product" data-placement="bottom">
                        <a href="https://wa.me/<?php 
                                                $result['PhoneNumber'] = str_replace('0','972',$result['PhoneNumber']);
                                                 echo $result['PhoneNumber'];?>" 
                                                 target="_blank" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
                   </label> 
                </div>

            </div>


        </div>

        <div class="row map">

            <?php
                // create new user instance
                $user = New User();

                // get user from database
                $getUser = $user->getUserById($user_id);

                // if user in data base get his address
                if($getUser){
                    $result = $getUser->fetch_assoc();

                    // get user city and repalce all white spaces with "+" sign
                    $city = $result['City'];
                    $city = str_replace(" ","+",$city);

                    // get user address and repalce all white spaces with "+" sign
                    $address = $result['Address'];
                    $address = str_replace(" ","+",$address);

                    // combine user city and address
                    $full_address = $city ."+".$address;


            ?>  
                        <div class="resp-container">
                            <iframe  src="https://maps.google.com/maps?q=<?php echo $full_address ?>&output=embed" ></iframe>
                        </div>
                        
                    
            <?php }?>




    </div>
</div>

    <!-- Product Cards - recent added -->
    <div class="productCards-productPage">
        <div class="title"><h4>SIMILAR PRODUCTS</h4></div>
        <?php include 'productCardsForProductPage.php'; ?>
    </div>
    
    <!-- Product Cards - recent added -->




    <!-- footer-->
    <?php include_once 'includes/footer.php'; ?>



<!-- script to show all product images -->
<script>
    var ProductImgg = document.getElementById("ProductImg");
    var SmallImg = document.getElementsByClassName("small-img");
    SmallImg[0].onclick = function(){
        ProductImgg.src = SmallImg[0].src;
    }

    SmallImg[1].onclick = function(){
        ProductImgg.src = SmallImg[1].src;
    }

    SmallImg[2].onclick = function(){
        ProductImgg.src = SmallImg[2].src;
    }

    SmallImg[3].onclick = function(){
        ProductImgg.src = SmallImg[3].src;
    }

</script>


<script>
        $(function () {
            $("[data-toggle='tooltip']").tooltip();
        });
    </script>



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