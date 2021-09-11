<?php include_once 'classes/Category.php'; ?>
<?php include_once 'classes/SubCategory.php'; ?>
<?php include_once 'classes/Product.php'; ?>
<?php include_once 'classes/Article.php'; ?>

<?php
        $pd = new Product();
        $category = new Category();
        $sub = new SubCategory();
        $article = new Article();
?>

        <!-- jQuery CDN  DON'T TOUCH OR CODE WILL BREAK-->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- jQuery CDN  DON'T TOUCH OR CODE WILL BREAK-->


<?php
    $getpd = $pd->getProductByIdAndUser(22,1)->fetch_assoc();

    $phone = $getpd['PhoneNumber'];
    $phone = str_replace('0','972',$phone);
    echo $phone;
?>





