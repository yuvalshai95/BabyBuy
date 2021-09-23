
<!--Include all classes-->
<?php 
    require_once 'DataBase/Session.php'; 
    Session::init(); 
    include_once 'DataBase/DB_Config.php'; 
    include_once 'classes/Slider.php'; 
    include_once 'classes/Product.php'; 
    include_once 'classes/Article.php'; 
    include_once 'classes/Category.php';
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
    <title>BabyBuy</title>

  <!-- Flex Slider CSS -->
  <link href="styleA/flexslider.css" rel="stylesheet">

  <!-- jQuery Flex Slider-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- JS Flex Slider-->
  <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>

  <!-- CSS style Home Page -->
  <link href="styleA/homePageStyle.css" rel="stylesheet">

  <!-- Fav icon -->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

  <!-- GSAP Animations (for Hero section)-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>

  <!-- Box icon For nav icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

  <!-- CSS Nav style -->
  <link rel="stylesheet" href="styleA/navStyle.css">

</head>


<body>
<!---------------------------------------------------------------------------------------------------------------->
   <!-- Header -->
  <header class="header">
    <!-- Navigation -->
    <nav class="nav">
      <div class="navigation nav-container">
        <div class="navigation-logo">
            <a style="color:black;text-decoration: none;" href="homepage.php"><h1>BabyBuy</h1></a> 
        </div>

        <div class="menu-primary">
          <ul class="nav-list-primary">

            <li class="nav-item-primary">
                <a href="homepage.php" class="nav-link-primary">Home</a>
            </li>

            <li class="nav-item-primary">
                <a href="search.php" class="nav-link-primary">Shop</a>
            </li>

            <?php 
              // check if user is logged in
              if (Session::get("userId")){    ?> 
            <li class="nav-item-primary">
                <a href="addproduct.php" class="nav-link-primary">Sell</a>
            </li>
            <?php } ?>

            <li class="nav-item-primary">
                <a href="ArticlesList.php" class="nav-link-primary">Articles</a>
            </li>

            <li class="nav-item-primary">
                <a href="contact.php" class="nav-link-primary">Contact</a>
            </li>

          </ul>
        </div>

        <div class="menu-secondary">
          <ul class="nav-list-secondary">

          <?php 
            // check if user is logged in
            if (Session::get("userId")){    ?> 
            <li class="nav-item-secondary">
              <span class="number" id="wishlistNumber"> <input type="hidden" id="sessionId" value="<?php echo Session::get("userId"); ?>"> </span>
                <a href="wishlist.php" class="nav-link-secondary icon"><i class='bx bx-heart' style='color:black; font-size:30px;'  ></i></a>
            </li>

            <li class="nav-item-secondary">
                <i class='bx bxs-user-circle' style='color:black; font-size:30px;' ></i>
                <div class="sub-menu">
                    <ul>
                      <li><a href="profile.php">Profile</a></li>
                      <li><a href="userproducts.php">Products</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item-secondary">
                <a href="?action=logout" class="nav-link-secondary"><i class='bx bx-log-out bx-rotate-180' style='color:black; font-size:30px;' ></i></a>
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

    <!-- Hero Image -->
    <img src="./img/kid2.png" class="hero-img">

    <!-- Hero body -->
    <div class="hero-content">
      <h1>
        <span>Shop & sell used</span>
        <span>baby and kid items</span>
      </h1>

        <!-- Button -->
        <a href="search.php" class="hero-btn">Start Shopping</a>
    </div>
    
  </header>

<!-- Fix Nav Script -->
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
 <!---------------------------------------------------------------------------------------------------------------->

  <section>
    <div class="banner-top">
      <div class="row">

        <div class="col">
          <h1>Declutter</h1>
          <p>Breath new life into your home</p>
          <p>and sell last year's go-tos.</p> 
        </div>

        <div class="col">
          <h1>Discover</h1>
          <p>Shop one-of-a-kind treasures</p>
          <p>and all of yours favorite brands.</p>
        </div>

        <div class="col">
          <h1>All from home</h1>
          <p>Make your space feel more like</p>
          <p>home without ever leaving it.</p>
        </div>

      </div>
    </div>
  </section>

    <br> <br>
    <!--  .............................................................................................................  -->
 
<section class="section-flex">
<!--Flex Slider START -->
<div class="flexslider">
  <ul class="slides">
    <?php
         $slider = new Slider();
          $getslider = $slider->getAllSliders();
          if($getslider)
          {
            while($result = $getslider->fetch_assoc())
            {

    ?>
    <li>
      <img src="admin/<?php echo $result['SliderImage']; ?>" />
    </li>
    <?php }}?>
  </ul>
</div>
<!--Flex Slider END -->
<br><br><br><br><br><br>


    <!-- search line --> 

    <div class="box">
        <form action="search.php" method="GET">
            <input type="text" name="search" placeholder="Search for anything ">
            <input type="submit" name="" value="Search">
        </form>
    </div>



</section>
<!---------------------------------------------------------------------------------------------------------------->


<!-- General Section -->
<section class="items">
<!---------------------------------------------------------------------------------------------------------------->
<!-- Favorite Cards Start -->
    <?php
      // check if user is logged in
      if (Session::get("userId")){ 
          $pd = new Product();
          $foramt = new Foramt();
          $user = new User(); 
          // get user by id
          $getUser = $user->getUserById(Session::get("userId"))->fetch_assoc();
            if(($getUser['Interest'] !== NULL)){
    ?>
    <!-- Product Cards - category -->
    <div class="title"><h4>FAVORITE CATEGORY</h4></div>
    <div class="productCardsContainer">
      <div class="container">
        <?php


              // get user interest
              $myString = $getUser['Interest'];

              // insert user interest into array
              $myArray = explode(',',$myString);

              //make array into string for database query
              $interest = implode("','", $myArray);

              //add "'" to the start of the string
              $interest = "'".$interest;

              // add "'" to the end of the string
              $interest = $interest."'";

              $getInterest = $pd->getInterstProducts($interest);
              if($getInterest){
                  while($result = $getInterest->fetch_assoc()){
          ?>

            <div class="card">
              <div class="imgBx">
                <a href="ProductPage.php?pdId=<?php echo $result['ProductID']; ?>&userId=<?php echo $result['UserID']; ?>&productCategory=<?= $result['ProductCategory']; ?>"> 
                <img src="<?php  
                              $img = $pd->getSingleImagesByProductId($result['ProductID'])->fetch_assoc(); 
                              $single = $img['ImagePath']; 
                              $single = str_replace('../','',$single); 
                              echo $single ?>"></a>
                  <ul class="action">
                    <li>
                      <i class='bx bx-heart' style='font-size:22px;' onclick="addToWishlist(<?php  echo Session::get("userId")?>,<?php  echo $result['ProductID']; ?>,<?php echo $result['UserID']; ?>)" ></i>
                    </li>

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
<?php }}}} ?>

    </div>
</div>
<!-- Favorite Cards END -->
<!---------------------------------------------------------------------------------------------------------------->






           
    <!-- Product Cards - recent added -->
    <div class="title"><h4>RECENTLY ADDED</h4></div>
    <?php include 'productCards.php'; ?>
    <!-- Product Cards - recent added -->

    <!-- Banner -->
    <section>
      <div class="banner">

      </div>
    </section>

    <!-- Top Categories -->
    <section class="categories">
      <div class="title"><h4>TOP CATEGORIES</h4></div>
      <div class="categories-container">
        <div class="row">

          <div class="col-items">
          <p>Travel Gear</p>
           <a href="search.php?search=carrier"><img src="img/babyCarrier.png" alt=""></a> 
          </div>

          <div class="col-items">
          <p>Car Seats</p>
           <a href="search.php?search=car seat"><img src="img/babycarseat.png" alt=""></a> 
          </div>

          
          <div class="col-items">
          <p>Cribs</p>
           <a href="search.php?search=crib"><img src="img/babyCrib.png" alt=""></a> 
          </div>

        </div>
        <div class="row">

          <div class="col-items">
           <a href=search.php?search=toys"><img src="img/babyToys.png" alt=""></a>
           <p>Toys</p>
          </div>

          <div class="col-items">
           <a href="search.php?search=stroller"><img src="img/BabyStroller.png" alt=""></a> 
           <p>Strollers</p>
          </div>


          <div class="col-items">
           <a href="search.php?search=diaper"><img src="img/babyDiapering.png" alt=""></a>
           <p>Diapering</p>
          </div>

        </div>
      </div>
    </section>
    <!-- Top Categories -->


    <!-- Articles Cards -->
    <div class="title" style="margin-top:20px;"><h4>ARTICLES</h4></div>
    <?php include 'articlesCards.php'; ?>
</section>




<!--Flex Slider Script -->
<script type="text/javascript">

    $(document).ready(function() {
        $('.flexslider').flexslider({
            animation: "slide"
      });
    });
</script>
<!--Flex Slider Script -->

<!-- wishlist number script -->
<script>
   $(document).ready(function(){
      var sessionId = $('#sessionId').val();
    $.ajax({
      url:'includes/wishlistNumber.inc.php',
      method:"POST",
      data:{userId:sessionId},
      success: function(data){
        $('#wishlistNumber').html(data);
      }
    });

   });
</script>



  <!-- footer-->
  <?php include_once 'includes/footer.php'; ?>

</body>
</html>




