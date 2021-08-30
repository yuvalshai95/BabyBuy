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
    $user = new User();
    $userId = Session::get("userId");
    $getUser = $user->getUserById($userId);
    if ($getUser !== false) {
            
        $row = $getUser->fetch_assoc();
    }
?>

<?php
    // Error handling
    if (isset($_GET["error"])) {

        if ($_GET["error"] == "empty") {
            echo "<div class='validation'>Fill in all fields !</div>";
        }
        else if($_GET["error"] == "invaliduserfirstname"){
            echo "<div class='validation'>First Name Not Valid !</div>";
        }
        else if($_GET["error"] == "invaliduserlastname"){
            echo "<div class='validation'>Last Name Not Valid !</div>";
        }
        else if($_GET["error"] == "invalidemail"){
            echo "<div class='validation'>Email Not Valid !</div>";
        }
        else if($_GET["error"] == "invalidphone"){
            echo "<div class='validation'>Phone Not Valid !</div>";
        }
        else if($_GET["error"] == "invalidcity"){
            echo "<div class='validation'>City Not Valid !</div>";
        }
        else if($_GET["error"] == "invalidaddress"){
            echo "<div class='validation'>Address Not Valid !</div>";
        }
    }
?>


<!-- check all form inputs using update.inc -->
<form action="includes/update.inc.php" method="POST">
    <table>

    <tr>
        <td colspan="2"> <h2>Update Profile Details</h2> </td>
    </tr>
        

        <tr>
            <td width= "20%" >First Name</td>

            <td > <input type="text" name="firstName" value="<?= $row['FirstName']?>"</td>
        </tr>

        <tr>
            <td>Last Name</td>

            <td><input type="text" name="lastName" value="<?= $row['LastName']?>"</td>
        </tr>

        <tr>
            <td>E-mail</td>

            <td><input type="text" name="email" value="<?= $row['UserEmail']?>"</td>
        </tr>

        <tr>
            <td>Mobile Number:</td>

            <td><input type="text" name="phone" value="<?= $row['PhoneNumber']?>"</td>
        </tr>

        <tr>
            <td>City:</td>

            <td><input type="text" name="city" value="<?= $row['City']?>"</td>
        </tr>

        <tr>
            <td>Address:</td>

            <td><input type="text" name="address" value="<?= $row['Address']?>"></td>
        </tr>

        <tr>
        
            <td width = "30%"><input type="submit" name="submit" value="Save Changes"></td>
        </tr>


        <input type="hidden" name=userId value="<?php echo $userId ?>">

    </table>

</form>


<?php require_once 'includes/footer.php'; ?>