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

<!-- GSAP Animations-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>


<!-- Box icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

<!-- JS Script -->
<script src="../js/homepage.js"></script>

</head>
<body>

    <!-- Header -->
    <header id="home" class="header">
        <!-- Navigation -->
        <nav class="nav">
            <div class="navigation nav-container">

                <div class="navigation-logo">
                    <h1>BabyBuy</h1>
                </div>

                <div class="menu-primary">
                    <ul class="nav-list-primary">

                        <li class="nav-item-primary">
                            <a href="homepage.php" class="nav-link-primary">Home</a>
                        </li>

                        <li class="nav-item-primary">
                            <a href="search.php" class="nav-link-primary">Shop</a>
                        </li>

                        <li class="nav-item-primary">
                            <a href="addproduct.php" class="nav-link-primary">Sell</a>
                        </li>

                        <li class="nav-item-primary">
                            <a href="ArticlesList.php" class="nav-link-primary">Articles</a>
                        </li>

                        <li class="nav-item-primary">
                            <a href="#" class="nav-link-primary">Contact</a>
                        </li>

                    </ul>
                </div>

                <div class="menu-secondary">
                    <ul class="nav-list-secondary">

                        <li class="nav-item-secondary">
                            <a href="wishlist.php" class="nav-link-secondary icon"><i class='bx bx-heart' style='color:#ffffff; font-size:30px;'  ></i></a>
                        </li>

                        <li class="nav-item-secondary">
                            <a href="profile.php" class="nav-link-secondary"><i class='bx bxs-user-circle' style='color:#ffffff; font-size:30px;' ></i></a>
                        </li>

                        <li class="nav-item-secondary">
                            <a href="?action=logout" class="nav-link-secondary"><i class='bx bx-log-out bx-rotate-180' style='color:#ffffff; font-size:30px;' ></i></a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

    <img src="./img/BabyBoss.png" class="hero-img">
    <div class="hero-content">

        <h1>
            <span>Another Text H1</span>
            <span> Line 2Another Text H1</span>
        </h1>

        <a href="search.php" class="btn">Shop Now</a>
    </div>

    </header>



<script>
// Fix Nav
const navBar = document.querySelector(".nav");
const navHeight = navBar.getBoundingClientRect().height;

window.addEventListener("scroll", ()=>{
    const scrollHeight = window.pageYOffset;
    if(scrollHeight > navHeight){
        navBar.classList.add("fix-nav");
    }else{
        navBar.classList.remove("fix-nav");
    }
});

//GSAP
gsap.from(".navigation-logo", { opacity: 0, duration: 1, delay: 0.5, y: -10 });
gsap.from(".hero-img", { opacity: 0, duration: 1, delay: 1.5, x: -200 });
gsap.from(".hero-content h1", { opacity: 0, duration: 1, delay: 2.5, y: -45 });
gsap.from(".hero-content a", { opacity: 0, duration: 1, delay: 3.5, y: 50 });
</script>












<!--

    <div class="Navbar">

        <div class="con">

            <a  class="logo" href="homepage.php">Baby<span>Buy</span></a>

            <nav>

                <ul class="primary-nav">
                    <li> <a href="homePage.php">Home</a></li>
                    <li> <a href="search.php">Shop</a></li> -->
                    <?php /*
                     // check if user is logged in
                     if (Session::get("userId")){    */?> <!--
                        <li> <a href="addproduct.php">Sell</a></li> -->
                     <?php /* } */?> <!--
                    <li> <a href="ArticlesList.php">Articles</a></li>
                    <li> <a href="#">About Us</a></li>
                </ul>

                <ul class="secondary-nav"> -->

                <?php /*
                     // check if user is logged in
                     if (Session::get("userId")){    */ ?> <!--
                
                    <li class="cta"> <a href="wishlist.php" class="wishlistBTN">Wishlist</a></li> -->

                    <!-- Profile button -->
                  <!--  <li class="cta"> <a href="profile.php">My Account</a> </li> -->

                    <!-- Logout button -->
                <!--    <li class="cta"> <a href="?action=logout">Logout</a> </li> -->

                    <?php /* }else{  */ ?>
                     <!-- Login button -->
                  <!--  <li class="cta"> <a href="login.php">Log In</a> </li> ->

                    <!-- Register button -->
                   <!-- <li class="cta"> <a href="register.php">Sign Up</a> </li> -->
                    



                    <?php /* } */ ?> <!--
                </ul>
            </nav>
        </div>
    </div> -->

</body>
</html>






