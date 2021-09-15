<?php 
require_once 'includes/navTop.php';
require_once 'classes/Category.php';
require_once 'classes/Product.php'; 
require_once 'admin/helpers/Format.php'; 

$category = new Category();
$pd = new Product();
$fm = new Foramt();
?>

<?php 
    if (isset($_GET['search'])) {
        $key = $_GET['search'];
    }else{
        $key = "none";
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>


<!-- BOOTSTRAP DON'T TOUCH OR CODE WILL BREAK -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<!-- BOOTSTRAP DON'T TOUCH OR CODE WILL BREAK -->  

<!-- jQuery library DON'T TOUCH OR CODE WILL BREAK-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- ionSlider DON'T TOUCH OR CODE WILL BREAK-->
<link rel="stylesheet" href="styleA/ion.rangeSlider.min.css">


<!-- Latest compiled JavaScript DON'T TOUCH OR CODE WILL BREAK-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- ionSlider JS DON'T TOUCH OR CODE WILL BREAK-->
<script src="js/ion.rangeSlider.min.js"></script>

</head>
<body>
    
    <div class="container-fluid" style="margin-top: 30px;">
        <div class="row">

            <!-- Start of filter side bar -->
            <div class="col-lg-3">
                <h5 style="font-weight: bold;">Filter Product</h5>
                <hr>

                <!-- key filter -->
                <input type="hidden" id="key" value="<?php echo $key;?>">

                <!-- Category filter -->
                <h6 style="color:#fc7c7c;; font-weight:bold;"">Select Category</h6>
                <ul class="list-group">
                    <?php
                        $getAllCategories = $category->getAllCategories();
                        if ($getAllCategories) {
                            while ($row = $getAllCategories->fetch_assoc()) {
                    ?>
                    <li class="list-group-item" style="width: 70%;">
                        <div class="form-check">
                            <label class="form-check-label" >
                                <input type="checkbox" class="form-check-input product_check" value="<?= $row['CategoryID'];?>" id="category">
                                <?= $row['CategoryName'];?>
                            </label>
                        </div>
                    </li>
                    <?php }}?>
                </ul>

                 <!-- Sub-Category filter -->
                 <h6 style="color:#fc7c7c; font-weight:bold;margin-top:1em;">Select Sub-Category</h6>
                <ul class="list-group">
                    <?php
                        $getAllSubCategories = $category->getAllSubCategories();
                        if ($getAllSubCategories) {
                            while ($row = $getAllSubCategories->fetch_assoc()) {
                    ?>
                    <li class="list-group-item" style="width: 70%;">
                        <div class="form-check">
                            <label class="form-check-label" >
                                <input type="checkbox" class="form-check-input product_check" value="<?= $row['SubCategoryID'];?>" id="subCategory">
                                <?= $row['SubCategoryName'];?>
                            </label>
                        </div>
                    </li>
                    <?php }}?>
                </ul>

                <!-- Price Filter Range -->
                <div class="list-group">
                    <h6 style="color:#fc7c7c;; font-weight:bold; margin-top: 1em;">Price</h6>
                    <input type="hidden" id="hidden_minimum_price" value="5">
                    <input type="hidden" id="hidden_maximum_price" value="1000">
                    <div class="wrap" style="width: 70%;">
                        <div id="price_range"></div>
                    </div>   
                </div>
                
                <!-- Condition Filter -->
                <h6 style="color:#fc7c7c; font-weight:bold; margin-top: 1em;">Select Condition</h6>
                <ul class="list-group">
                    
                    <li class="list-group-item" style="width: 70%;">
                        <div class="form-check">
                            <label class="form-check-label" >
                                <input type="checkbox" class="form-check-input product_check" value="new" id="condition"> Brand New
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item" style="width: 70%;">
                        <div class="form-check">
                            <label class="form-check-label" >
                                <input type="checkbox" class="form-check-input product_check" value="open" id="condition"> Open Box
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item" style="width: 70%;">
                        <div class="form-check">
                            <label class="form-check-label" >
                                <input type="checkbox" class="form-check-input product_check" value="barley" id="condition"> Barley Used
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item" style="width: 70%;">
                        <div class="form-check">
                            <label class="form-check-label" >
                                <input type="checkbox" class="form-check-input product_check" value="gently" id="condition"> Gently Used
                            </label>
                        </div>
                    </li>
                </ul>

                 <!-- Age Filter -->
                <h6 style="color:#fc7c7c; font-weight:bold; margin-top: 1em;">Select Age Group</h6>
                <ul class="list-group">
                    
                    <li class="list-group-item" style="width: 70%;">
                        <div class="form-check">
                            <label class="form-check-label" >
                                <input type="checkbox" class="form-check-input product_check" value="3" id="age"> 0-3 months
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item" style="width: 70%;">
                        <div class="form-check">
                            <label class="form-check-label" >
                                <input type="checkbox" class="form-check-input product_check" value="12" id="age"> 0-12 months
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item" style="width: 70%;">
                        <div class="form-check">
                            <label class="form-check-label" >
                                <input type="checkbox" class="form-check-input product_check" value="36" id="age"> 12-36 months
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item" style="width: 70%;">
                        <div class="form-check">
                            <label class="form-check-label" >
                                <input type="checkbox" class="form-check-input product_check" value="40" id="age"> 36+ months
                            </label>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Hidden Status Filter -->
            <input type="hidden" class="form-check-input product_check" value="Available" id="status">



            <!-- Start of body products content -->
            <div class="col-lg-9">
                <h4 class="text-center" style="font-weight: bold;" id="textChange">All Products</h4>
                <h6 class="text-center" style="font-weight: bold; margin-top:10px; color:gray;font-size:12px;"><a style="color:gray;" href="homepage.php"> Home</a> > Search </h6>
                <hr>

                <!-- Show spinner when loading products from database -->
                <div class="text-center">
                    <img src="img/Spinner.gif" id="spinner" width="250" style="display: none;">
                </div>

                <!-- product -->
                <div class="row" id="data">
                    <?php
                        $getAllProducts = $pd->getAllProducts();
                        if ($getAllProducts) {
                            while ($row = $getAllProducts->fetch_assoc()) {
                    ?>
                    <div class="col-md-3 mb-2">
                        <div class="card-deck">
                            <div class="card">
                                <!-- product image, don't touch style: pointer-everts or code will break -->
                                <img style="width: 100%; height: 250px;" src="<?php  
                                                                                $img = $pd->getSingleImagesByProductId($row['ProductID'])->fetch_assoc(); 
                                                                                $single = $img['ImagePath']; 
                                                                                $single = str_replace('../','',$single); 
                                                                                echo $single?>" class="card-img-top">
                                                                                
                                <div class="card-img-overlay" style="pointer-events: none">
                                    <h5 style="margin-top: 235px;" class="text-light bg-info text-center rounded p-1"><?= $row['ProductName'];?></h5>
                                </div>

                                <!-- Card content -->
                                <div class="card-body">
                                    <h3 class="card-title" style="margin-top: 52px;">Price: $<?= $row['Price'];?></h3>
                                    <h6>Condition: <span class="badge badge-<?php 
                                    if (strtolower($row['ProductCondition']) == "new"){ 
                                        echo 'primary';}
                                    else if(strtolower($row['ProductCondition']) == "barley"){
                                        echo 'info';
                                    }
                                    else if(strtolower($row['ProductCondition']) == "open"){
                                        echo 'success';
                                    }
                                    else if(strtolower($row['ProductCondition']) == "gently"){
                                        echo 'dark';
                                    }  
                                    ?>">
                                    <?= strtoupper($row['ProductCondition']);?></span></h6>

                                    <p><?= $fm->textShorten($row['Description'],100) ?></p>
                                    <a href="ProductPage.php?pdId=<?= $row['ProductID'];?>&userId=<?= $row['UserID'];?>&productCategory=<?= $row['ProductCategory']?>" style="background-color: #253b70;" class="btn btn-primary btn-block">Product Page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
            <!-- End of body products content -->
        </div>
    </div>

<!-- Filter jquery ajax script -->
<script>
    $(document).ready(function(){

        filter_data();

        function filter_data(){

            // Show spinner
            $("#spinner").show();

            var action = 'data';
            var category = get_filter_text('category');
            var subCategory = get_filter_text('subCategory');
            var condition = get_filter_text('condition');
            var age = get_filter_text('age');
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var key = $('#key').val();
            var status = $('#status').val();

            $.ajax({
                    url: 'includes/search.inc.php',
                    method: 'POST',
                    data:{ action:action,
                           category:category,
                           subCategory:subCategory,
                           condition:condition,
                           age:age,
                           minimum_price:minimum_price,
                           maximum_price:maximum_price,
                           key:key,
                           status:status },

                    success:function(data){
                        $("#data").html(data);
                        $("#spinner").hide();
                        $("#textChange").text("All Products");

                    }
                });

        }

            function get_filter_text(text_id){
            var filterData = [];
            $('#'+text_id+':checked').each(function(){
                filterData.push($(this).val());
            });
            return filterData;
        }

        // When check box is clicked get data
        $('.product_check').click(function(){
            filter_data();
        });

        // When price range is changes get data
        $('#price_range').ionRangeSlider({
            type: "double",
            min: 0,
            max: 1000,
            from: 5,
            to: 300,
            grid: true,
            onFinish:function(data) // When user mouse stop moving show products with that price range
            {
                
                // Saving it's instance to var
                var slider = $('#price_range').data("ionRangeSlider");

                // Get values (min,max)
                var from = slider.result.from;
                var to = slider.result.to;

                // save slider price under hidden input field
                $('#hidden_minimum_price').val(from);
                $('#hidden_maximum_price').val(to);
                
                // send data to function and filter
                filter_data();
            }
        });

    });
</script>


</body>
</html>








<?php require_once 'includes/footer.php';  ?>