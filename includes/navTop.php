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

<!--Check user login details after login click-->
<?php
    $user = new User();
    if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['loginBtn']) ){
        $userEmail = $_POST['email'];
        $userPass = $_POST['password'];
        $loginCheck = $user->checkLoginInfo($userEmail,$userPass);
        
    }
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
           <a href="homePage.php"> <img class="logo" src="img/babybuy big with text.png" alt="logo" style="width: 230px; height: 75px;"> </a>
        </div>
        <div class="col-md-7 navbar">
            <nav>
                <ul class="nav__links">
                    <li> <a href="homePage.php">Home</a></li>
                    <li> <a href="#">Categories</a></li>
                    <li> <a href="#">Sell</a></li>
                    <li> <a href="ArticlesList.php">Articles</a></li>
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

                <?php
                    // check if user is logged in
                    if (Session::get("userId")) {
                    
                         echo  '<li> <a class="cta" href="?action=logout"><button>Logout</button></a> </li>';
                         
                    }else{ //user is logged out
                       echo '<li> <a class="cta" href="#"><button onclick="openLoginForm()">Login</button></a> </li>';
                    }
                ?>
                
                <li> <a class="cta" href="#"><button onclick="openRegisterForm()">Register</button></a> </li>
            </ul>
        </div>
    </header>


<!-- Login - Start -->

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

            <span style="color:red; font-size: 18px;"> 
			<?php
				if (isset($loginCheck)) {
					echo $loginCheck;
				}
			?>
			</span>
            
            <form action="" method="POST">
                <div class="element">
                    <label for="email">Email: </label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email">
                </div>
        
                <div class="element">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="" class="form-control" id="password" placeholder="Password">
                </div>

                <div class="element btn">
                    <input class="btn btn-class" type="submit" value="Login" name="loginBtn" />
                    <label class="forgotPass" for="" id="nav-toggle-button" data-toggle="tooltip" 
                        title="Relax and try to remember your password" data-placement="bottom">Forgot Password?</label>        
                </div>
            </form>
   
        </div>
    </div>
<!-- Login - End -->


<!-- Register - Start -->

    <div class="register-popup">
        <div class="register-popup-close" onclick="closeRegisterForm()">&times;</div>
        <div class="regForm">
            <div style="display:flex;">
                <div class="regAvatar">
                    <img src="img/not_real_logo.png" alt="image" class="img-fluid" id="image">
                </div>

                <div class="regHeader">
                    <h2 class="register-text">Register</h2>
                </div>
            </div>

            <div style="display:flex; width: 100%; justify-content: center;">
                <div style="display:block;">

                    <div class="regElement">
                        <label for="first-name">First Name: </label>
                        <input type="firstName" name="firstName" class="form-control" id="firstName">
                    </div>

                    <div class="regElement">
                        <label for="last-name">Last Name: </label>
                        <input type="lastName" name="lastName" class="form-control" id="lastName">
                    </div>

                    <div class="regElement">
                        <label for="city">City: </label>
                        <input type="city" name="city" class="form-control" id="city">
                    </div>

                    <div class="regElement">
                        <label for="adress">Adress: </label>
                        <input type="adress" name="adress" class="form-control" id="adress">
                    </div>
                </div>
            
                <div style="display:block;">

                    <div class="regElement">
                        <label for="phone-number">Phone Number: </label>
                        <input type="phone-number" name="phone-number" class="form-control" id="phone-number">
                    </div>

                    <div class="regElement">
                        <label for="email">Email: </label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
            
                    <div class="regElement">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>

                    <div class="regElement">
                        <label for="interest">Interest</label>
                        <input type="interest" name="interest" class="form-control" id="interest">
                    </div>
                </div>

            </div>

            <div class="regElement btn">
                <button class="btn btn-class">Register</button>       
            </div>
   
        </div>
    </div>
<!-- Register - End -->





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

        function openRegisterForm() {
            document.body.classList.add("showRegisterForm");
        }
        
        function closeRegisterForm() {
            document.body.classList.remove("showRegisterForm");
        }

    </script>

</body>
</html>






