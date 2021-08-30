<head>
    <title>Update Profile</title>
</head>


<?php require_once 'includes/navTop.php'; ?>

<!-- Temporary style -->
<style>
    table{
        width: 550px;
        margin: 0 auto;
        border: 2px solid black;
        border-spacing: 10px;
    }

    table tr td{
        text-align: justify;
    }
  label{
      margin-left: 49.5em;

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
<!-- Temporary style -->


<?php // Get user by user id from session
    $userId = Session::get("userId");
?>

<?php
    // Error handling
    if (isset($_GET["error"])) {

        if ($_GET["error"] == "empty") {
            echo "<div class='validation'>Fill in all fields !</div>";
        }

        else if($_GET["error"] == "stmtfailed"){
            echo "<div class='validation'>Something went wrong, try again!</div>";
        }
        else if($_GET["error"] == "currentpwd"){
            echo "<div class='validation'>Current password is Wrong, try again!</div>";
        }
        else if($_GET["error"] == "invalidnewpassword"){
            echo "<div class='validation'>New password not valid !</div>";
        }
        else if($_GET["error"] == "confirm"){
            echo "<div class='validation'>New password and Confrim password not matching !</div>";
        }
        else if($_GET["error"] == "oldnewmatch"){
            echo "<div class='validation'>New password cant be the same as the old password</div>";
        }
    }
?>


<!-- check all form inputs using update.inc -->
<form action="includes/passwordUpdate.inc.php" method="POST">
    <table>

    <tr>
        <td colspan="2"> <h2>Update Password</h2> </td>
    </tr>
        

        <tr>
            <td width= "20%" >Current Password</td>

            <td > <input type="password" name="pwd"</td>
        </tr>

        <tr>
            <td>New Password</td>

            <td><input type="password" name="newPwd"</td>
        </tr>

        <tr>
            <td>Confrim Password</td>

            <td><input type="password" name="confrimPwd"</td>
        </tr>
            <td><button><a href="profile.php"> << Go Back</a></button></td>
            <td width = "30%"><input type="submit" name="submit" value="Save Changes"></td>
           
        </tr>

        <input type="hidden" name=userId value="<?php echo $userId ?>">

    </table>

</form>


<?php require_once 'includes/footer.php'; ?>