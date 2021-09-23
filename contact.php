<?php include_once 'includes/navTop.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styleA/contact.css">

    <!-- GSAP Animations (for Hero section)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>

    <title>Contact Us</title>
</head>
<body>
    <div class="contact-title">
    <?php 
    // Error handling
    if (isset($_GET["error"])) {

        if ($_GET["error"] == "mail") {
            echo "<div class='validation'>Email not valid !</div>";
        }
        else if($_GET["error"] == "name"){
            echo "<div class='validation'>First name not valid !</div>";
        }
        else if($_GET["error"] == "empty"){
            echo "<div class='validation'>Fill in all fields !</div>";
        }
        else if($_GET["error"] == "none"){
            echo "<div class='success'>We got your email, we will be in touch soon !</div>";
        }
            
    }
?>
        <h1>Say Hello</h1>
        <h2>We are always ready to serve you!</h2>
    </div>

    <div class="contact-form">
        <form action="includes/contact-form-handler.php" id="contact-form" method="POST">
            <input type="text" name="name" class="form-control" placeholder="Enter First Name"><br/>
            <input type="email" name="email" class="form-control" placeholder="Enter your email"><br/>
            <textarea name="message" class="form-control" placeholder="Enter your message here" rows="4"></textarea><br/>
            
            <input type="submit" name="submit" class="form-control submit" value="SEND MESSAGE">
        </form>

    </div>

    <!-- Hero Image -->
    <img src="./img/contact4.png" class="hero-img">
</body>
</html>

<script>
      gsap.from(".contact-title", { opacity: 0, duration: 2, delay: 0, y: -100 });
      gsap.from(".contact-form", { opacity: 0, duration: 2.5, delay: 0.5, y: -100 });
      gsap.from(".hero-img", { opacity: 0, duration: 1, delay: 3, x: -200 });
</script>


<?php include_once 'includes/footer.php'; ?>