<?php //require_once 'DataBase/Session.php'; ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navTop</title>
    <!-- style navBar 
    <link href="styleA/navStyle.css" rel="stylesheet">-->
    <!--
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
    -->

    <!-- style navBar -->
    <link href="styleA/navStyle.css" rel="stylesheet">

</head>
<body>
    
    <header>
        <div class="col-md-2 logo">
            <img class="logo" src="img/not_real_logo.png" alt="logo">
        </div>
        <div class="col-md-7 navbar">
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
                <li> <a class="cta" href="#"><button onclick="openLoginForm()">Login</button></a> </li>
                <li> <a class="cta" href="#"><button>Register</button></a> </li>
            </ul>
        </div>
    </header>




    <div class="popup-overlay"></div>
    <div class="login-popup">
        <div class="login-popup-close" onclick="closeLoginForm()">&times;</div>
        <div class="form">
            <div class="avatar">
                <img src="img/not_real_logo.png" alt="image" class="img-fluid" id="image">
            </div>

            <div class="header">
                <h3 class="signin-text">Sign In</h3>
            </div>

            <div class="element">
                <label for="email">Email: </label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
    
            <div class="element">
                <label for="password">Password</label>
                <input type="password" name="password" id="" class="form-control" id="password">
            </div>

            <div class="element btn">
                <button class="btn btn-class">Login</button>
                <label class="forgotPass" for="" id="nav-toggle-button" data-toggle="tooltip" 
                    title="Relax and try to remember your password" data-placement="bottom">Forgot Password?</label>        
            </div>
   
        </div>
    </div>


    <script>
        $(function () {
            $("[data-toggle='tooltip']").tooltip();
        });

        function openLoginForm() {
            document.body.classList.add("showLoginForm");
        }
        
        function closeLoginForm() {
            document.body.classList.remove("showLoginForm");
        }




    </script>




</body>
</html>






