<head>
    <title>Profile</title>
</head>

<?php require_once 'includes/navTop.php'; ?>

<style>
    .container-profileDetails{
        width: 100%;
        padding: 0;
        margin: 120px auto;
    }

    table{
        height: 315px;
        width: 600px;
        background-color: rgb(240, 248, 255);
        box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
        border-spacing: 15px;
        margin-left: 272px;
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

    
    .profileDetails-btn {
        border: 2px solid #253b70;
        background: transparent;
        border-radius: 3px;
        color: #253b70;
        text-decoration: none;
        padding: .5rem 1rem;
        font-family: 'Montserrat' !important;
        font-size: 11px;
        cursor: pointer;
    }
    .profileDetails-btn:hover {
        background-color: #253b70;
        color: white !important;
        cursor: pointer;
 
    }

    .a-btn {
        text-decoration: none;
        color: #253b70;
    }
    .a-btn:hover{
        color: white; 
    }

    .background-img-profile-details{
        width: 400px;
        position: absolute;
        right: 60px;
        top: 170px;
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