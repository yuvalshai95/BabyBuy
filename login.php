<?php include_once 'includes/navTop.php'; ?>

<style>
    input{
        margin:1em 1em 1em 65em;
        display: block;
    }
    h1{
        text-align: center;
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

    <h1>Login</h1>
    
    <form action="includes/login.inc.php" method="POST">
        <input type="text" placeholder="Email" name="email">
        <input type="password" placeholder="Password" name="password">
        <input type="submit" name="submit" value="Sign-In">
    </form>
</div>














<?php
    include_once 'includes/footer.php';
?>