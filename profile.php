<head>
    <title>Profile</title>
</head>

<?php require_once 'includes/navTop.php'; ?>

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





<?php
    $user = new User();
    $userId = Session::get("userId");
    $getUser = $user->getUserById($userId);
    if ($getUser !== false) {
            
        $row = $getUser->fetch_assoc();
    }
?>


<?php
    if ( isset($_GET['update']) && $_GET['update'] == "success") {
        echo "<div class='success'>User Profile Details Updated Successfully !</div>";
    }

    else if( isset($_GET['update']) && $_GET['update'] == "error" ){

        echo "<div class='validation'>Error occurred update failed</div>";
    }
?>

<table>

   <tr>
    <td colspan="3"> <h2>Your Profile Details</h2> </td>
   </tr>
       

    <tr>
        <td width= "20%" >Name</td>
        <td width="5%">:</td>
        <td > <?php echo $row['FirstName'].' ';
                   echo $row['LastName']?>
        </td>
    </tr>

    <tr>
        <td>E-mail</td>
        <td>:</td>
        <td><?= $row['UserEmail']?></td>
    </tr>

    <tr>
        <td>Mobile Number</td>
        <td>:</td>
        <td><?= $row['PhoneNumber']?></td>
    </tr>

    <tr>
        <td>City</td>
        <td>:</td>
        <td><?= $row['City']?></td>
    </tr>

    <tr>
        <td>Address</td>
        <td>:</td>
        <td><?= $row['Address']?></td>
    </tr>

    <tr>
        <td width = "30%"><a  style="color:orange;"href="editpassword.php">Update Password</a></td>
        <td width = "30%"><a  style="color:orange;"href="editprofile.php">Update Details</a></td>
    </tr>

</table>








<?php require_once 'includes/footer.php'; ?>