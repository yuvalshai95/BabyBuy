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


<!-- Teddy Bear SVG image -->
<div class="teddy-bear">
   
    <!-- Created with Inkscape (http://www.inkscape.org/) -->
    <svg
        xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:cc="http://creativecommons.org/ns#"
        xmlns:dc="http://purl.org/dc/elements/1.1/"
        xmlns:svg="http://www.w3.org/2000/svg"
        xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
        xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
        xmlns:ns1="http://sozi.baierouge.fr"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        id="svg10220"
        viewBox="0 0 260.75 315.04"
        version="1.0"
    >
    <g
        id="g2885"
        transform="matrix(.87120 0 0 .91718 -.95229 -2.3259)"
        >
        <path
            class="c1"
            id="path10239"
 
            d="m189.01 9.1883c16.569-11.157 37.674-4.3701 53.586 4.4107 16.164 10.327 18.36 35.233 6.9238 49.909-1.2681 4.0124-4.9969 7.1971-6.3463 7.9623-5.7572 3.265-9.8479-19.256-17.241-24.205-8.7706-17.273-29.965-25.063-41.183-34.81z"
        />
        <path
            class="c2"
            id="path10241"
         
            d="m215.29 34.822s0.32448-5.6784 0.32448-6.6519v-5.3539c0-1.1357 0.97345-2.7581 1.7846-2.7581 0.81121 0 3.7315 3.2448 5.8407 4.056 2.1091 0.8112 9.8967 6.1651 11.357 7.4631 1.4602 1.2979 4.8672 8.112 4.8672 9.5722s-0.8112 6.0029-1.6224 7.3008c-0.81121 1.2979-1.2979 4.2183-2.7581 4.705-1.4602 0.48672-3.8938 0.64896-3.8938 0.64896l-10.708-12.655-4.8672-5.3539-0.32448-0.97344z"
        />
        <path
            class="c3"
            id="path10229"
        
            d="m172.08 169.79c20.423-3.7034 40.02-12.353 56.203-25.398 12.994-17.97 23.048-41.486 18.425-63.874-7.82-18.258-26.35-47.856-44.87-56.665-12.93-11.24-17.86-11.104-30.72-16.67-15.71-0.7154-32.93-1.0606-46.73 7.759-16.81 10.067-31.766 23.527-44.164 38.596-10.289 18.055-9.725 40.167-7.489 60.222 4.0326 28.438 30.34 48.734 57.742 52.386 13.736 1.8997 27.703 5.1278 41.604 3.638z"
        />
        <path
            class="c4"
            id="path10231"
       
            d="m114.03 96.595c-2.676-4.4705-10.719-11.19-14.735-4.8879-2.1498 7.0129 9.2815 15.578 13.432 7.2488 0.49267-0.75293 0.92088-1.5466 1.3027-2.3609z"
        />
        <path
            class="c5"
            id="path10233"
         
            d="m167.26 92.924c2.7208-7.7984 16.499-10.106 19.246-1.2391 2.3464 7.5155-8.5553 16.459-13.49 8.2197-2.0758-2.1936-3.8356-4.6555-5.7558-6.9806z"
        />
        <path
            class="c6"
            id="path10235"
   
            d="m166.81 93.154c-16.367-6.8389-37.456-7.31-51.918 3.9984-12.973 11.753-15.656 36.315 0.5515 46.622 17.321 12.677 43.701 11.985 60.096-1.8845 13.039-14.642 4.8831-37.563-8.7291-48.736z"
        />
        <path
            class="c7"
            id="path10237"
     
            d="m153.5 113.12c-4.0453-3.3477-8.9683-6.5145-14.443-6.1024-4.4428 0.30427-9.1312 0.39328-13.134 2.5748-1.6727 1.5205-2.1631 3.976-2.3124 6.15-0.1862 4.0678 1.8556 8.1961 5.3828 10.297 3.0038 2.5821 6.6239 5.3931 10.836 4.8456 2.4173-0.67893 4.3957-2.3894 6.3809-3.8666 3.9548-3.1041 7.4311-7.5932 7.3604-12.848-0.006-0.35087-0.0295-0.70144-0.0703-1.05z"
        />
        <path
            class="c8"
            id="path10243"
        
            d="m112.92 21.843c-14.159-6.459-34.742-13.235-45.954 1.986-13.351 13.954-11.409 35.926-0.473 50.575 10.507 9.889 4.145-15.442 12.851-18.895 8.141-13.959 21.126-23.823 33.576-33.666z"
        />
        <path
            class="c9"
            id="path10245"
         
            d="m84.852 42.448c0-0.97344-2.1091-3.4071-2.9203-4.8672-0.8112-1.4602-1.6224-2.1091-2.7581-2.4336-1.1357-0.32448-3.0826 0.16224-3.5693 0.97344-0.48672 0.8112-2.1091 4.705-2.9203 5.3539-0.8112 0.64896-4.3805 6.0029-4.5427 7.4631-0.16224 1.4602-1.4602 9.7344-1.4602 9.7344s2.5959 5.0295 3.7315 5.1917c1.1357 0.16224 3.0826-0.64896 3.5693-1.9469 0.48672-1.2979 4.056-4.3805 4.2183-5.8407 0.16224-1.4602 0.64896-2.7581 1.1357-4.3805 0.48672-1.6224 1.2979-2.9203 2.2714-4.056 0.97344-1.1357 2.4336-2.4336 2.5959-3.2448 0.16224-0.8112 0.32448-1.6224 0.64896-1.9469z"
        />
        <path
            class="c10"
            id="path10247"
        
            d="m91.548 149.6l-18.585 11.931c7.0487 13.442 24.291 30.248 14.174 44.807-3.4276 20.736 18.888 35.211 35.148 43.707 30.31 10.484 63.15 3.6896 92.884-5.2536 6.6932-7.399-18.861-4.4514-18.407-16.417-3.3096-12.409-1.7819-28.34 6.8052-38.366 15.803-8.2677 35.003-7.5861 52.369-5.8581 5.3687 4.5198 16.045 13.899 8.4201 1.0914-6.6143-16.901-19.903-32.481-38.826-34.496-14.57 2.0932-27.213 11.087-41.28 15.362-15 7.8517-31.293 0.0828-47.069 0.70572-17.09 0.46429-31.563-8.7473-45.634-17.214z"
        />
        <path
            class="c11"
            id="path10249"
           
            d="m96.71 195.82c-7.793-11.27-15.585-22.53-23.377-33.8-18.184-1.15-28.974 17.28-33.188 32.58-6.1311 13.377-8.5918 30.571 3.1408 39.622 1.3218 5.8494 24.384 12.196 20.789 9.7414-12.878-0.57971-22.227-14.779-37.671-11.011-10.842-2.5774-32.188 22.327-12.455 18.754 16.422 4.9007 41.567 12.754 38.934 32.175 3.3981 17.078 5.8496 35.79 0.65386 51.323 20.513 2.5252 36.536-13.755 52.713-23.627 15.264-12.412 36.511-9.3044 53.823-3.9379 17.373-0.16161 35.793-2.7967 45.148 15.757 5.4738 5.9154 27.326 20.518 36.012 21.606 2.2559 0.2825-3.6702-2.6561-2.3788-4.1651-8.6946-12.599-7.7762-27.74-7.4489-42.336 2.2264-16.074 11.347-36.14 29.106-38.871 12.757-3.2641 29.782 8.9947 37.426 11.095-2.0002-14.872-15.497-28.994-30.092-26.857-8.9301 3.0669-15.449-2.7672-5.9548-8.5136 4.9658-11.947 15.25-25.538 7.0299-38.452-7.8775-16.88-28.446-13.652-43.672-12.814-14.687 0.12639-28.904 7.4568-28.626 23.843-2.6714 11.377-2.563 28.372 12.058 30.646 6.6576 0.91323 16.669 5.0434 3.7175 6.8886-27.404 8.5827-57.717 13.788-85.799 5.5507-15.813-2.0935-22.815-21.635-35.201-25.372 6.3536-9.7363 12.417-20.939 5.3129-29.82z"
        />
        <path
            class="c12"
            id="path10251"
           
            d="m64.334 244.23c8.0598-0.37984 17.637-1.1862 22.502-8.624 2.5297-3.3755 4.2497-7.4309 4.4827-11.672"
        />
        <path
            class="c13"
            id="path10253"
            
            d="m256.52 240c-11.796 3.5971-26.951 3.5399-39.089 2.4188"
        />
        <path
            class="c14"
            id="path10255"
            
            d="m50.941 335.1c-19.046 1.23-30.594-17.49-39.154-31.9-8.0732-15.27-15.914-35.22-5.9338-51.33 15.832-3.9373 37.373 7.2718 44.799 21.31 0.71025 19.546 10.398 40.37 3.3793 59.26l-1.3405 1.3846-1.7499 1.2763z"
        />
        <path
            class="c15"
            id="path10259"
            d="m241.37 345.54c17.042 1.3705 37.233 0.49526 43.25-19.103 6.2415-16.91 11.167-34.679 13.638-52.569-2.5919-15.17-26.509-14.979-39.538-13.923-18.33 4.7621-27.658 26.654-27.442 44.186-0.12212 14.315 1.0708 29.684 10.092 41.409z"
        />
    </g
    >

    <metadata
        >
        <rdf:RDF
        >
        <cc:Work
            >
            <dc:format
            >image/svg+xml</dc:format
            >
            <dc:type
                rdf:resource="http://purl.org/dc/dcmitype/StillImage"
            />
            <cc:license
                rdf:resource="http://creativecommons.org/licenses/publicdomain/"
            />
            <dc:publisher
            >
            <cc:Agent
                rdf:about="http://openclipart.org/"
                >
                <dc:title
                >Openclipart</dc:title
                >
            </cc:Agent
            >
            </dc:publisher
            >
            <dc:title
            >teddy bear</dc:title
            >
            <dc:date
            >2012-11-13T09:47:17</dc:date
            >
            <dc:description
            >Big and drawable teddy bear. Path has been simplified.</dc:description
            >
            <dc:source
            >https://openclipart.org/detail/173133/teddy-bear-by-dkdlv-173133</dc:source
            >
            <dc:creator
            >
            <cc:Agent
                >
                <dc:title
                >dkdlv</dc:title
                >
            </cc:Agent
            >
            </dc:creator
            >
            <dc:subject
            >
            <rdf:Bag
                >
                <rdf:li
                >muÃ±eco</rdf:li
                >
                <rdf:li
                >peluche</rdf:li
                >
                <rdf:li
                >teddy</rdf:li
                >
                <rdf:li
                >teddy bear</rdf:li
                >
            </rdf:Bag
            >
            </dc:subject
            >
        </cc:Work
        >
        <cc:License
            rdf:about="http://creativecommons.org/licenses/publicdomain/"
            >
            <cc:permits
                rdf:resource="http://creativecommons.org/ns#Reproduction"
            />
            <cc:permits
                rdf:resource="http://creativecommons.org/ns#Distribution"
            />
            <cc:permits
                rdf:resource="http://creativecommons.org/ns#DerivativeWorks"
            />
        </cc:License
        >
        </rdf:RDF
        >
    </metadata
    >
    </svg>
<!-- Teddy Bear SVG image -->
</div>
  <!--  <img src="img/register-teddy.png" class="teddy-bear"> -->

  
</body>
</html>

<!-- Teddy Bear slide animation -->
<script>
    //  gsap.from(".teddy-bear", { opacity: 0, duration: 2, delay: 1.5, x: -200 });
</script>