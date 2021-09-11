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

<style>
    .nav-list-primary li a{
        color:white !important;
    }
    .nav-list-secondary li a{
        color:white !important;
    }
</style>

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

<nav style="background-color: #253b70;" class="nav">
      <div class="navigation nav-container">
        <div style="color:white;" class="navigation-logo">
            <h1>BabyBuy</h1>
        </div>

        <div  class="menu-primary">
          <ul  class="nav-list-primary">

            <li class="nav-item-primary" >
                <a  href="homepage.php" class="nav-link-primary" style="text-decoration: none;">Home</a>
            </li>

            <li class="nav-item-primary">
                <a href="search.php" class="nav-link-primary" style="text-decoration: none;">Shop</a>
            </li>

            <?php 
              // check if user is logged in
              if (Session::get("userId")){    ?> 
            <li class="nav-item-primary">
                <a href="addproduct.php" class="nav-link-primary" style="text-decoration: none;">Sell</a>
            </li>

            <?php } ?>
            
            <li class="nav-item-primary">
                <a href="ArticlesList.php" class="nav-link-primary" style="text-decoration: none;">Articles</a>
            </li>

            <li class="nav-item-primary">
                <a href="#" class="nav-link-primary" style="text-decoration: none;">Contact</a>
            </li>

          </ul>
        </div>

        <div class="menu-secondary">
          <ul class="nav-list-secondary"> 

                <?php 
                // check if user is logged in
                if (Session::get("userId")){    ?> 

                <li class="nav-item-secondary">
                    <a href="wishlist.php" class="nav-link-secondary icon"><i class='bx bx-heart' style='color:white; font-size:30px;'  ></i></a>
                </li>

                <li class="nav-item-secondary">
                    <a href="profile.php" class="nav-link-secondary"><i class='bx bxs-user-circle' style='color:white; font-size:30px;' ></i></a>
                </li>

                <li class="nav-item-secondary">
                    <a href="?action=logout" class="nav-link-secondary"><i class='bx bx-log-out bx-rotate-180' style='color:white; font-size:30px;' ></i></a>
                </li>

                <?php }else{ ?>

                    <li class="nav-item-secondary">
                    <a href="login.php" class="nav-link-secondary login">Login</a>
                </li>

                <li class="nav-item-secondary">
                    <a href="register.php" class="nav-link-secondary register">Register</a>
                </li>

                <?php } ?>

            </ul>
        </div>
      </div>
    </nav>

</body>
</html>






