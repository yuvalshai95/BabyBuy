<?php 
require_once 'includes/navTop.php';
require_once 'classes/Category.php';
require_once 'classes/Product.php'; 
require_once 'admin/helpers/Format.php'; 

$category = new Category();
$pd = new Product();
$fm = new Foramt();
?>

<head>
    <!-- BOOTSTRAP DON'T TOUCH OR CODE WILL BREAK -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Latest compiled JavaScript DON'T TOUCH OR CODE WILL BREAK-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Search</title>
    
</head>




<?php 
    if (!isset($_GET['search']) || $_GET['search'] == NULL) {
        header("location: 404.php");
        exit();
    }else{
        $key = $_GET['search'];
    }
    
?>



<div class="col-lg-12">
    <h4 class="text-center" style="font-weight: bold; margin-top:10px;" id="textChange">Products found with "<?= $key?>"</h4>
    <h6 class="text-center" style="font-weight: bold; margin-top:10px; color:gray;"><a style="color: gray;" href="homePage.php">Home</a> > Search </h6>
    <hr style="width: 55%;margin: .5em auto;">
    <div style="justify-content: center;" class="row" id="data">

    <?php
        $getSearch = $pd->getProductBySearch($key);
        if($getSearch){
            while ($row = $getSearch->fetch_assoc()) {
    ?>
        <div class="col-md-2 mb-2">
            <div class="card-deck">
            <!-- add style="border: none;" to card dive to remove border -->
                <div class="card">
                    <!-- product image, don't touch style: pointer-everts or code will break -->
                    <img style="width: 100%; height: 250px;" src="admin/<?= $row['Image'];?>" class="card-img-top">
                    <div class="card-img-overlay" style="pointer-events: none">
                        <h6  style="margin-top: 235px; color:#585858; font-weight:bold;text-align:center;"><?= $row['ProductName'];?></h6>
                    </div>

                    <!-- Card content -->
                    <div  style="padding:.5em .6em .2em .6em;" class="card-body">
                        
                        <!-- Description -->
                        <p style="margin-top:20px; margin-bottom:0;"><?= $fm->textShorten($row['Description'],65) ?></p>

                        <!-- div wrap price and badge -->
                        <div class="wrap" style="display: flex; justify-content:space-between; padding:.2em .3em 0 .3em; margin-top:10px;">

                            <!-- Price -->
                            <h5 class="card-title" style="color:#FF6659; font-weight:bold;">$<?= $row['Price'];?></h5>

                            <!-- badge -->
                            <span style="block-size: fit-content;" class="badge badge-<?php 
                            if (strtolower($row['ProductCondition']) == "new"){ 
                                echo 'primary';
                            }
                            else if(strtolower($row['ProductCondition']) == "used"){
                                echo 'warning';
                            }
                            else if(strtolower($row['ProductCondition']) == "barely used"){
                                echo 'info';
                            }
                            else if(strtolower($row['ProductCondition']) == "open box"){
                                echo 'success';
                            }
                            else if(strtolower($row['ProductCondition']) == "gently used"){
                                echo 'dark';
                            }  
                            ?>">
                            <?= strtoupper($row['ProductCondition']);?></span>
                        </div>
                        
                        <!-- product page button -->
                        <a style="margin-bottom: 5px;background-color: #21b8e6;border-color: #21b8e6;" href="ProductPage.php?pdId=<?= $row['ProductID'];?>&userId=<?= $row['UserID'];?>&productCategory=<?= $row['ProductCategory']?>" class="btn btn-primary btn-block">Product Page</a>
                    </div>
                </div>
            </div>
        </div>
        <?php }} ?>
    </div>















<?php require_once 'includes/footer.php'; ?>