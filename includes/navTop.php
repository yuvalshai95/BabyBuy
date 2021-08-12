<?php require_once 'DataBase/Session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Flex Slider CSS -->
    <link href="styleA/flexslider.css" rel="stylesheet">
    <!-- jQuery Flex Slider-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JS Flex Slider-->
    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navTop</title>
    <!-- style navBar -->
    <link href="styleA/navStyle.css" rel="stylesheet">
</head>
<body>
    
    <header>
        <div class="col-md-3 logo">
            <img class="logo" src="img/not_real_logo.png" alt="logo">
        </div>
        <div class="col-md-6 navbar">
            <nav>
                <ul class="nav__links">
                    <li> <a href="#">Home</a></li>
                    <li> <a href="#">Categories</a></li>
                    <li> <a href="#">Sell</a></li>
                    <li> <a href="#">Articles</a></li>
                    <li> <a href="#">About Us</a></li>
                </ul>
            </nav>

        </div>

        <div class="col-md-3 nav__buttons">
            <ul>
                <li class="nav-item">
                    <a href="#" class="wishlistBTN">
                        <button type="button" class="btn btn-outline-light">
                            <span style="font-size: 130%; color: #edf0f1;">
                            <i class="fas fa-heart" id="heart" style="color: #edf0f1; font-size: 16px;"></i></span> Wishlist 
                        </button>
                    </a>
                </li>
                <li> <a class="cta" href="#"><button>Login</button></a> </li>
                <li> <a class="cta" href="#"><button>Register</button></a> </li>
            </ul>
        </div>
    </header>



</body>
</html>






