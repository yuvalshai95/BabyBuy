<?php include_once 'classes/Category.php'; ?>
<?php include_once 'classes/SubCategory.php'; ?>
<?php include_once 'classes/Product.php'; ?>

<?php
        $pd = new Product();
        $category = new Category();
        $sub = new SubCategory();
?>

        <!-- jQuery CDN  DON'T TOUCH OR CODE WILL BREAK-->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- jQuery CDN  DON'T TOUCH OR CODE WILL BREAK-->



<?php

$test = "../admin/Web/6135e64af2a1c5.62634135.jpg";
$test = str_replace('../','',$test);



$getrecent = $pd->getRecentProducts();
while($row = $getrecent->fetch_assoc()){
    echo $row['ImagePath'];
?>
<img src="<?php echo $row['ImagePath']; ?>" alt="">
<?php } ?>


<img src="<?php echo $test ?>" alt="">

