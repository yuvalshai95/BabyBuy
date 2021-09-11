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
    <title>Product Page</title>
    <link href="styleA/css/all.css" rel="stylesheet">
    <link href="styleA/css/all.min.css" rel="stylesheet">

        <!-- style Product Page -->
        <link href="styleA/productPage.css" rel="stylesheet">

</head>
<body>



<div class="productPageContainer">
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img  src="<?php  
                        $img = $pd->getSingleImagesByProductId($pd_id)->fetch_assoc(); 
                        $single = $img['ImagePath']; 
                        $single = str_replace('../','',$single); 
                        echo $single?>" width="100%" id="ProductImg">

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
                <p><?= $result['CategoryName']; ?></p>
                <h1><?= $result['ProductName']; ?></h1>
                <h4>Price: $<?= $result['Price']; ?> | Shipping price: $3</h4>
                <h5>Age: 
                    <?php
                        if ($result['Age']>0 && $result['Age']<4) {
                            echo '0-3';
                        }
                        else if($result['Age']>3 && $result['Age']<8){
                            echo '4-7';
                        }else{
                            echo '8+';
                        }
                    ?>
                </h5>
                <h5>Pickup Option: <?= $result['PickupOptions']; ?></h5>
                <h5>Condition: <?= $result['ProductCondition']; ?></h5>
                <h5>Status: <?= $result['Status']; ?></h5>
                <a href="" class="btn"><i class="fas fa-heart"></i> Add to Wishlist</a>
                <h3>Product Details <i class="fa fa-indent"></i></h3>
                <br>
                <p class="prodDetails"> <?= $result['Description']; ?></p>
            </div>
        </div>

        <div class="row-seller">
            <div class="col-2 seller">
                <div class="details">
                    <h3>Seller Details</h3>
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


    <!-- Products Slider-->
    <?php include_once 'productsSlider.php'; ?>



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


</body>
</html>