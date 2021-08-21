<?php
    $article = new Article();
    $foramt = new Foramt();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles Cards</title>

    <!-- style Articles Cards -->
    <link href="styleA/articlesCards.css" rel="stylesheet">

    
</head>
<body>
    
    <div class="articleCardsContainer">
        <div class="ArticleContainer">

        <!-- TODO: Change <a> tag to correct page -->
        <?php
            $getarticle = $article->getRecentArticles();
            if($getarticle){
                while ($result = $getarticle->fetch_assoc()) {
        ?>
            <div class="card-item">
                <div class="ArticleCard">
                  <a href="ProductPage.php?articleId=<?php echo $result['ArticleID']; ?>">  <img class="card-img" src="admin/<?php echo $result['ImagePath']; ?>" alt=""> </a>
                    <div class="card-content">
                    <a href="ProductPage.php?articleId=<?php echo $result['ArticleID']; ?>">  <h2 class="card-header"><?= $result['ArticleHeader']; ?></h2> </a>
                    <p class="card-text">
                           <?php echo $foramt->textShorten($result['ArticleBody'],180) ?>
                    </p> 
                        
                    </div>
                    <div class="card-btnn">
                    <a href="ProductPage.php?articleId=<?php echo $result['ArticleID']; ?>">    <button class="card-btn">Read More <span>&rarr;</span></button> </a>
                    </div>
                </div>
            </div>

            <?php } } ?> 

            <div class="seeMore">
                <a href="#" class="seeMoreHref">See More <i class='fas fa-angle-double-right'></i></a>
            </div>
        </div>
    </div>


</body>
</html>