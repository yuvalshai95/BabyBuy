<head>
    <title>Profile</title>
      <!-- CSS Profile Style -->
  <link rel="stylesheet" href="styleA/profileStyle.css">

</head>

<?php require_once 'includes/navTop.php'; ?>


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
<div class="container-profileDetails">

    <img class="background-img-profile-details" src="img/profile.png" alt="baby-profile-details">

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
        <td width = "30%"><a class="a-btn" href="editpassword.php"><button class="profileDetails-btn">Update Password</button></a></td>
        <td width = "30%"><a class="a-btn" href="editprofile.php"><button class="profileDetails-btn">Update Details</button></a></td>
    </tr>

</table>

</div>






<?php require_once 'includes/footer.php'; ?>