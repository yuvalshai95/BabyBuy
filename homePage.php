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

    <!-- style Home Page -->
    <link href="styleA/homePageStyle.css" rel="stylesheet">

<!-- Fav icon -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

</head>

<body>


    <!-- top nav bar -->
    <?php include_once 'includes/navTop.php'; ?>
  
    <br> <br> <br>


    <!-- search line --> 

    <div class="box">
        <form action="productSearch.php" method="GET">
            <input type="text" name="search" placeholder="Search For Products ">
            <input type="submit" name="" value="Search">
        </form>
    </div>

    <br> <br>
    <!--  .............................................................................................................  -->
 
 
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

<!--  .............................................................................................................  -->

<br> <br> <br>


    <!-- Product Cards - category -->
    <div class="title"><h4>FAVORITE CATEGORY</h4></div>
    <?php include 'favoriteCards.php'; ?>

           
    <!-- Product Cards - recent added -->
    <div class="title"><h4>RECENT ADDED</h4></div>
    <?php include 'productCards.php'; ?>


    <!-- Articles Cards -->
    <div class="title"><h4>ARTICLES</h4></div>
    <?php include 'articlesCards.php'; ?>











<!--Flex Slider Script -->
<script type="text/javascript">

    $(document).ready(function() {
        $('.flexslider').flexslider({
            animation: "slide"
      });
    });
</script>
<!--Flex Slider Script -->

    <!-- footer-->
    <?php include_once 'includes/footer.php'; ?>

</body>
</html>




