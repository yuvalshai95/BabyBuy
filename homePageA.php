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
 
    <!-- image slider start -->
    <div class="slider">
            <div class="slides">
                <!-- radio buttons start -->
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <!-- radio buttons end -->

                <!-- slider images start -->
                <div class="slide first">
                    <img src="img/img1.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="img/img2.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="img/img3.jpg" alt="">
                </div>
                <!-- slider images end -->

                <!-- automatic navigation start -->
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                </div>
                <!-- automatic navigation end -->
        </div>

        <!-- manual navigation start -->
        <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
        </div>
        <!-- manual navigation end -->

    </div>
    <!-- image slider end -->


    <script type="text/javascript">
        var counter = 1;
        setInterval(function(){
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 3) {
                counter = 1;
            }
        }, 5000)
    </script>

<!--  .............................................................................................................  -->

<br> <br> <br>


    <!-- Product Cards -->
    <?php include_once 'productCards.php'; ?>

















    

    <!-- footer-->
    <?php include_once 'includes/footer.php'; ?>

</body>
</html>




