<?php require_once 'includes/navTop.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleA/addproductyuval.css">
    <title>Add new product</title>
</head>
<body>
    
<div class="container">
    <div class="title">Add new product</div>
    <form action="" method="POST">
        <div class="product-details">

            <div class="input-box">
                <span class="details">Name:</span>
                <input type="text" name="pdName">

                <div style="margin-top: 2.8em;" class="input-box">
                    <span style="margin-top:1em;" class="details">Description:</span>
                    <textarea name="pdDescription" cols="48.5" rows="10"></textarea>
                </div>

            </div>


            <div class="input-box">
                <span class="details">Category:</span>
                <select name="pdCategory">
                    <option value="#">cat 1</option>
                </select>

                <span class="details">Pick Up:</span>
                <select name="pdPickUp">
                    <option value="#">Local</option>
                </select>

                <span class="details">Age Group:</span>
                <select name="pdAge">
                    <option value="#">0-3 months</option>
                </select>

                <span class="details">Condition:</span>
                <select name="pdAge">
                    <option value="#">Brand New</option>
                </select>
            </div>


            <div class="input-box">
                <span class="details">Price:</span>
                <input type="text" name="pdPrice">
            </div>



  
            
            <div class="image-details">
            <div class="title">Add Images (up to 4)</div>
            <div class="wrap">
                <span class="image-title">Browse:</span>
                 <!-- making image[] array to hold multiple images and JS to display preview -->
                 <input type="file" name="image[]" onchange="displayImage(this)" id="image" multiple/>
                 <h6 style="color:gray;margin-top:0.5em;">Supported Files: jpg, jpeg, png, gif</h6>
            </div>
            
                <div class="images-display" id="images">
                    <img  src = "admin/img/photo.jpg">
                    <img  src = "admin/img/photo.jpg">
                    <img  src = "admin/img/photo.jpg">
                    <img  src = "admin/img/photo.jpg">
                </div>
            </div>

            <input type="hidden" name="pdStatus" value="For Sale">

            <div class="button">
                <input type="submit" name="submit" value="Upload">
            </div>
        </div>
    </form>
</div>





</body>
</html>

<!-- Image Preview -->
<script src="js/imagePrev.js"></script>
<!-- Image Preview -->

<?php require_once 'includes/footer.php'; ?>