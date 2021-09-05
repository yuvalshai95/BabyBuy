<?php require_once 'includes/navTop.php'; ?>
<?php 
    require_once 'classes/Category.php'; 
    require_once 'classes/Product.php'; 
    require_once 'classes/SubCategory.php'; 

    $pd = new Product();
    $category = new Category();
    $sub = new SubCategory();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleA/addproductyuval.css">
        <!-- jQuery CDN  DON'T TOUCH OR CODE WILL BREAK-->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- jQuery CDN  DON'T TOUCH OR CODE WILL BREAK-->
    <title>Add new product</title>
</head>
<body>
    
<div class="container">
    <div class="title">Add new product</div>
    <form action="" method="POST">
        <div class="product-details">

            <div class="input-box">
                <span class="details">Name:</span>
                <input style="width: 127%;" type="text" name="pdName">

                <div style="margin-top: 2.8em;" class="input-box">
                    <span style="margin-top:1em;" class="details">Description:</span>
                    <textarea name="pdDescription" cols="48.5" rows="10"></textarea>
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
                    <img  src = "admin/img/photo2.jpg">
                    <img  src = "admin/img/photo2.jpg">
                    <img  src = "admin/img/photo2.jpg">
                    <img  src = "admin/img/photo2.jpg">
                </div>
            </div>



            </div>


            <div style=" margin-left: 12em;" class="input-box">
                <span class="details">Category:</span>
                <select id="pdCategory" name="pdCategory">
                <?php
                    $getAllCategories = $category->getAllCategories();
                    while ($row = $getAllCategories->fetch_assoc()) {
                        
                ?>
                    <option value="<?= $row['CategoryID'] ?>"><?= $row['CategoryName']; ?></option>
                <?php } ?>
                </select>

                <span class="details">Sub-Category:</span>
                <select id="pd_Sub_shoes_12" name="pd_Sub_shoes_12">
                    <option value="#">sub2</option>
                </select>

                <!-- hidden -->
                <select id="pd_Sub_bags_5" name="pd_Sub_bags_5">
                    <option value="#">sub4</option>
                    <option value="#">sub5</option>
                </select>
                <!-- hidden -->

                <!-- hidden -->
                <select id="pd_Sub_toys_1" name="pd_Sub_bags_5">
                    <option value="#">sub1</option>
                </select>
                <!-- hidden -->

                <span class="details">Pick Up:</span>
                <select name="pdPickUp">
                    <option value="#">Local</option>
                    <option value="#">Shipping</option>
                </select>

                <span class="details">Age Group:</span>
                <select name="pdAge">
                    <option value="#">0-3 months</option>
                    <option value="#">0-12 months</option>
                    <option value="#">12-36 months</option>
                    <option value="#">36+ months</option>
                </select>

                <span class="details">Condition:</span>
                <select name="pdAge">
                    <option value="#">Brand New</option>
                    <option value="#">Open Box</option>
                    <option value="#">Barley Used</option>
                    <option value="#">Gently Used</option>
                </select>

                <span class="details">Price:</span>
                <input type="text" name="pdPrice">
            </div>


            <input type="hidden" name="pdStatus" value="For Sale">

            <div style="margin-top:1em;" class="button">
                <input type="submit" name="submit" value="UPLOAD">
            </div>
        </div>
    </form>
</div>





</body>
</html>

<!-- Image Preview -->
<script src="js/imagePrev.js"></script>
<!-- Image Preview -->

<!-- Show sub categories by main category -->
<script>
 $("#pdCategory").change(function(){
    if($('#pdCategory').val() == 5){
      $("#pd_Sub_bags_5").show();
      $("#pd_Sub_shoes_12").hide();
      $("#pd_Sub_toys_1").hide();
    }else if(($('#pdCategory').val() == 1)){
      $("#pd_Sub_bags_5").hide();
      $("#pd_Sub_shoes_12").hide();
      $("#pd_Sub_toys_1").show();

    }else if($('#pdCategory').val() == 12){
        $("#pd_Sub_bags_5").hide();
      $("#pd_Sub_shoes_12").show();
      $("#pd_Sub_toys_1").hide();
    }
    
});
</script>
<!-- Show sub categories by main category -->


<?php require_once 'includes/footer.php'; ?>