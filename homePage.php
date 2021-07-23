<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BabyBuy</title>


    <!-- style Home Page -->
    <link href="stylehomep.css" rel="stylesheet">


</head>

<body>
    
    <!-- top nav bar -->
    <?php include_once 'navAdi.php';?>

    <br> <br> <br>

    <div class="box">
        <form>
            <input type="text" name="" placeholder="Type...">
            <input type="submit" name="" value="Search">
        </form>
    </div>

<br> <br> <br>
    <!--  .............................................................................................................  -->

    <!-- Slideshow container -->
    <div class="slideshow-container">

        <img name="slide" width="80%" height="400" style="text-align: center;">

        <!-- Next and previous buttons -->
     
    </div>
    <br>

    <!-- The dots/circles 
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    -->






    <br> <br> <br>




esrdhtfghnbvvxffgh
fgchvnbvcxvbn
dxgfcgnb xml
    


    <!-- footer-->
    <!-- ? -->


</body>
</html>



<script>
    var i = 0;
    var images = [];
    var time = 4000;

    // Image List:
    images[0]= 'img/img1.jpg';
    images[1]= 'img/img2.jpg';
    images[2]= 'img/img3.jpg';

    // Change Image:
    function changeImg(){
        document.slide.src = images[i];

        if(i < images.length - 1){
            i++;
        } else{
            i = 0;
        }

        setTimeout("changeImg()", time);

    }

    window.onload = changeImg;


</script>

