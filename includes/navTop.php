<?php require_once 'DataBase/Session.php'; 
    Session::init();
?>
<!--Include all classes-->
<?php 
    include_once 'DataBase/DB_Config.php'; 
    include_once 'classes/Slider.php'; 
    include_once 'classes/Product.php'; 
    include_once 'classes/Article.php'; 
    include_once 'classes/Category.php';
    include_once 'classes/SubCategory.php';
    include_once 'classes/User.php';  
    include_once 'admin/helpers/Format.php'; 
 ?> 

<!--Logout user after clicked logout btn-->
<?php
    if (isset($_GET['action']) &&  $_GET['action']=="logout") {
        session_destroy();
        header("Location: homepage.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- style navBar -->
    <link href="styleA/navStyle.css" rel="stylesheet"> 

</head>
<body>

    
    <div class="Navbar">

        <div class="con">

            <a  class="logo" href="homepage.php">Baby<span>Buy</span></a>

            <nav>

                <ul class="primary-nav">
                    <li> <a href="homePage.php">Home</a></li>
                    <li> <a href="#">Categories</a></li>
                    <li> <a href="search.php">Shop</a></li>
                    <li> <a href="ArticlesList.php">Articles</a></li>
                    <li> <a href="#">About Us</a></li>
                </ul>

                <ul class="secondary-nav">

                <?php
                     // check if user is logged in
                     if (Session::get("userId")){    ?>
                
                    <li class="cta"> <a href="wishlist.php" class="wishlistBTN">Wishlist</a></li>

                    <!-- Profile button -->
                    <li class="cta"> <a href="profile.php">My Account</a> </li>

                    <!-- Logout button -->
                    <li class="cta"> <a href="?action=logout">Logout</a> </li>

                    <?php }else{  ?>
                    <!-- Register button -->
                    <li class="cta"> <a href="register.php">Sign Up</a> </li>
                    
                    <!-- Login button -->
                    <li class="cta"> <a href="login.php">Log In</a> </li>


                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>

</body>
</html>






