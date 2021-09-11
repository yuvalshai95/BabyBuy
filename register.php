<?php require_once 'includes/navTop.php'; ?>

<?php
    require_once 'classes/Category.php';
    $category = new Category();
    $allCategories = $category->getAllCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- BOOTSTRAP DON'T TOUCH OR CODE WILL BREAK -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<!-- BOOTSTRAP DON'T TOUCH OR CODE WILL BREAK -->

<!-- jQuery library DON'T TOUCH OR CODE WILL BREAK-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="styleA/register.css">

<!-- GSAP Animations (for Hero section)-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>      
<div class="signup-form">


    <form action="includes/register.inc.php" method="POST">
    <?php 
    // Error handling
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<div class='validation'>Fill in all fields !</div>";
        }
        else if($_GET["error"] == "invaliduserfirstname"){
            echo "<div class='validation'>First Name Not Valid !</div>";
        }
        else if($_GET["error"] == "invaliduserlastname"){
            echo "<div class='validation'>Last Name Not Valid !</div>";
        }
        else if($_GET["error"] == "invalidemail"){
            echo "<div class='validation'>E-mail Not Valid !</div>";
        }
        else if($_GET["error"] == "invalidpassword"){
            echo "<div class='validation'>Password Not Valid !</div>";
        }
        else if($_GET["error"] == "invalidmatchpassword"){
            echo "<div class='validation'>Password doesn't match !</div>";
        }
        else if($_GET["error"] == "emailistaken"){
            echo "<div class='validation'>This email address is already taken !</div>";
        }
        else if($_GET["error"] == "invalidcity"){
            echo "<div class='validation'>City Not Valid !</div>";
        }
        else if($_GET["error"] == "invalidaddress"){
            echo "<div class='validation'>Address Not Valid !</div>";
        }
        else if($_GET["error"] == "invalidphone"){
            echo "<div class='validation'>Phone Number Not Valid !</div>";
        }
        else if($_GET["error"] == "stmtfailed"){
            echo "<div class='validation'>Something went wrong, try agian!</div>";
        }
        else if($_GET["error"] == "none"){
            echo "<div class='success'>You have signed up!</div>";
        }
    }

    ?>
        <h2>Sign up</h2>
        <p class="hint-text">Create your account. It's free and only takes a minute.</p>
        
        <div class="form-group">
            <div class="row">
                <div class="col-xs-6"><input type="text" class="form-control" name="firstName" placeholder="First Name*"></div>
                <div class="col-xs-6"><input type="text" class="form-control" name="lastName" placeholder="Last Name*"></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-6"><input type="text" class="form-control" name="city" placeholder="City*"></div>
                <div class="col-xs-6"><input type="text" class="form-control" name="address" placeholder="Address*"></div>
        </div>

        <div class="form-group">
            <input class="form-control" type="text" name="email" placeholder="Email*">
        </div>

        <div class="form-group">
            <input class="form-control" type="text" name="phone" placeholder="Mobile Phone*">
        </div>

        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password*">
        </div>

        <div class="form-group">
            <input class="form-control" type="password" name="validatePassword" placeholder="Confirm Password*">
        </div>

        <h2>Interested In</h2>
        <div class="checkboxes">

        <!-- Get all categories from database in checkbox format-->
        <?php
            if($allCategories){
                while ($row = $allCategories->fetch_assoc()) {      
        ?>

            <input type="checkbox" name="categories[]" value="<?= $row['CategoryName'];?>"></input> <label class="checkbox-inline"><?= $row['CategoryName'];?></label>
        <?php } } ?>
        </div>
        
        <div class="form-group">
            <input class="create_account" type="submit" name="submit" value="Create Account">
        </div>
       

    </form>
    <div class="text-center">Already have an account? <a href="login.php">Sign in</a> </div>
</div>


    <img src="img/register-teddy.png" class="teddy-bear">


    
</body>
</html>

<script>
      gsap.from(".teddy-bear", { opacity: 0, duration: 2, delay: 1.5, x: -200 });
</script>