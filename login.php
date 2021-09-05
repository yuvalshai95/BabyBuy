<?php include_once 'includes/navTop.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- jQuery CDN  DON'T TOUCH OR CODE WILL BREAK-->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- jQuery CDN  DON'T TOUCH OR CODE WILL BREAK-->

<!-- BOOTSTRAP DON'T TOUCH OR CODE WILL BREAK-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!-- BOOTSTRAP DON'T TOUCH OR CODE WILL BREAK-->

<!--Fontawesome CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

<link rel="stylesheet" href="styleA/login.css">

    <title>login</title>
</head>






<body>
<div class="container">

    <div class="d-flex justify-content-center h-100">

        <div class="card" id="rolling">

            <div class="card-header">
                <h3>Sign In</h3><span id="msg"></span>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                </div><p class="display"></p> <span id="msg"></span>
             </div>

            <?php
                // Error handling
                if(isset($_GET["error"])){
                    if ($_GET["error"] == "emptyinput") {
                        echo "<div class='validation'>Fill in all fields !</div>";
                    }
                    else if($_GET["error"] == "invalidemail"){
                        echo "<div class='validation'>Email not valid !</div>";
                    }
                    else if($_GET["error"] == "invalidpassword"){
                        echo "<div class='validation'>Password not valid !</div>";
                    }
                    else if($_GET["error"] == "emailnotexists"){
                        echo "<div class='validation'>Email not exists !</div>";
                    }
                    else if($_GET["error"] == "emailorpasswordwrong"){
                        echo "<div class='validation'>Email or password not found !</div>";
                    }
                }
            ?>

        <div class="card-body">
            <form action="includes/login.inc.php" method="POST" id="test" name="test">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" type="text" name="email" id="email" placeholder="E-mail">
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" value="Login" class="btn float-right login_btn"> 
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center links">
              <span style="color:white;">Don't have an account?</span><a style="color:orange;" href="register.php">Sign Up</a>
            </div>
        </div> 

        </div>
    </div>
</div>
</body>
</html>

<!--
<script>
    $(document).ready(function(){
        $('#rolling').slideDown('slow');
    });

    $(document).ready(function(){
        $("#submit").click(function(){
            if($("#email").val() === "" || $('#password').val() === ""){
                $(".display").fadeTo('slow','0.99');
                $('#msg').hide();
                $(".display").fadeIn('slow',function(){$("p").html("<span id='error'>Please enter email and password</span>");});
                return false;
            }else{
                $(".display").html('<span class="normal"><img src="img/Spinner.gif"></span>');
                var email = $('#email').val();
                var pass = $('#password').val();
                $.getJSON("includes/login.inc.php",{email:email,password:pass},function(json){
                        
                    // Parse JSON data if json.response.error = 1 then login successful
                    if(json.response.error == "1")
                    {
                        $(".display").css('background','#CBF8AF');
                        $(".display").css('border-bottom','4px solid #109601');
                        data = "<span id='msg'>Welcome To BabyBuy</span>";
                        window.location.href = "theme_profile.html";
                        /*
                        login successful, write code to Show next page here 
                        */
                    }

                });
                return false;
            }
        });
    });
</script>
-->



<style>
    /*
    input{
        margin:1em 1em 1em 65em;
        display: block;
    }
    h1{
        text-align: center;
    }
    */
    .info, .success, .warning, .error, .validation {
			border: 1px solid;
			margin: 10px 0px;
			padding: 15px 10px 15px 50px;
			background-repeat: no-repeat;
			background-position: 10px center;
		}

        .success {
			color: #4F8A10;
			background-color: #DFF2BF;
			background-image: url('https://i.imgur.com/Q9BGTuy.png');
		}

        .validation{
			color: #D63301;
			background-color: #FFCCBA;
			background-image: url('https://i.imgur.com/GnyDvKN.png');
		}
</style>










