<?php include_once 'includes/navTop.php'; ?>

<?php
    $category = new Category();
    $allCategories = $category->getAllCategories();
?>

<style>
    input{
        margin:auto;
        display: block;
        margin-top: .5em;
    }
    label{
        text-align: center;
        display: block;

    }
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

<div class="container">

<?php 
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

    <form action="includes/register.inc.php" method="POST">
        <label for="firstName" >*First Name</label>
        <input type="text" name="firstName">

        <label for="lastName">*Last Name</label>
        <input type="text" name="lastName">

        <label for="city">*City</label>
        <input type="text" name="city">

        <label for="address">*Address</label>
        <input type="text" name="address">

        <label for="email">*E-Mail</label>
        <input class="email" type="text" name="email">

        <label for="password">*Password</label>
        <input type="password" name="password">

        <label for="validatePassword">*Confirm Password</label>
        <input type="password" name="validatePassword">

        <label for="phone">*Phone Number</label>
        <input type="text" name="phone">

        <label for="interest">Interest</label>

        <!-- Get all categories from database in checkbox format-->
        <?php
            if($allCategories){
                while ($row = $allCategories->fetch_assoc()) {      
        ?>
            <input type="checkbox" name="categories[]" value="<?= $row['CategoryName'];?>"></input>
            <label for=""><?= $row['CategoryName'];?> </label>

        <?php } } ?>


        <input type="submit" name="submit" value="Create Account">
    </form>


</div>










<?php
    include_once 'includes/footer.php';
?>