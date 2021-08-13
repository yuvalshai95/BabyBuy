<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BabyBuy</title>


    <!-- style Home Page -->
    <link href="styleA/homePageStyle.css" rel="stylesheet">

    <!-- style slideshow -->
    <link href="styleA/slideshowStyle.css" rel="stylesheet">

</head>

<body>
    
    <!-- top nav bar -->
    <?php include_once 'includes/navTop.php'; ?>
    
    <?php require_once 'classes/SliderForHomePage.php'; ?>
    <?php $slider = new SliderForHomePage(); ?>

    <br> <br> <br>

    <!-- search line --> 

    <div class="box">
        <form>
            <input type="text" name="" placeholder="Type...">
            <input type="submit" name="" value="Search">
        </form>
    </div>

    <br> <br>
    <!--  .............................................................................................................  -->
 
 
<!--Flex Slider START -->
<div class="flexslider" style="position:relative;width:75%; height: 500px; margin:auto;">
  <ul class="slides" style="position:relative;width:75%; height: 500px; margin:auto;">
    <?php
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
    <div class="title"><h2>FAVORITE CATEGORY</h2></div>
    <?php include 'favoriteCards.php'; ?>


    <!-- Product Cards - recent added -->
    <div class="title"><h2>RECENT ADDED</h2></div>
    <?php include 'productCards.php'; ?>


    <!-- Articles Cards -->
    <div class="title"><h2>ARTICLES</h2></div>
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




