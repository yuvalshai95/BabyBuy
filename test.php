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

    $getArticle = $article->getArticleByID(47);
    if($getArticle){
        $row = $getArticle->fetch_assoc();
    }

    // init array to store all images path                
    $imagePath = [];

    // get all images path
    $getAllImages = $article->getAllImagesByArticleId(47);

    // add all images path to the array
    while($row = $getAllImages->fetch_assoc()){
        array_push($imagePath,$row['ImagePath']);
    }

    $i=0;
?>

<?php

    if($i < sizeof($imagePath)){
         echo $imagePath[$i];
    }
?>







