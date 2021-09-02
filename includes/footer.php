<?php
  $filepath = realpath(dirname(__FILE__));
  require_once ($filepath.'/../classes/User.php');

  $user = new User();
  $getSocial = $user->getSocial()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    
    <!-- style footer -->
    <link href="styleA/footerStyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
<footer>
    <div class="footer-content">
        <h3>BabyBuy</h3>
        <p>FOLLOW US ON OUR SOCIAL NETWORKS </p>
        <ul class="socials">
            <li><a href="<?= $getSocial['facebook']?>"><i class="fa fa-facebook-square" style="color: #edf0f1;"></i></a></li>
            <li><a href="<?= $getSocial['instagram']?>"><i class="fa fa-instagram" style="color: #edf0f1;"></i></a></li>
            <li><a href="<?= $getSocial['linkedin']?>"><i class="fa fa-linkedin" style="color: #edf0f1;"></i></a></li>
        </ul>
    </div>

    <div class="footer-bottom">
        <p><?= $getSocial['copyright']?></p>
    </div>

</footer>


</body>
</html>