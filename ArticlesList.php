    <!-- top nav bar -->
    <?php include_once 'includes/navTop.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link href="styleA/css/all.css" rel="stylesheet">
    <link href="styleA/css/all.min.css" rel="stylesheet">
    <!-- style Articles List -->
    <link href="styleA/articlesListStyle.css" rel="stylesheet">
    <!-- style pagination  -->
    <link href="styleA/pagination.css" rel="stylesheet">
</head>
<body>
    


<div class="content clearfix">
    <div class="main-content">
        <h1 class="recent-post-title">Recent Articles</h1>
        <?php 
             $db = new Database();
             $format = new Foramt();

            // Define how many results you want per page
            $result_per_page = 2;

            // Find out the numberof results stored in database
            $article = new Article();
            $result = $article->getAllArticles();
            $number_of_results = mysqli_num_rows($result);

            // Determine number of total pages available
            $number_of_pages = ceil($number_of_results/$result_per_page);

            // Determine which page number visitor is currently on
            if (!isset($_GET['page']) || $_GET['page']==NULL) {
                 $page = 1;
            }else{
                $page = $_GET['page'];
            }

            // Determine the sql LIMIT starting number for the resutls on the displaying page
            $this_page_first_result = ($page-1)*$result_per_page;

             //TODO: recmove this query from this page and insert in to Article class
             // Retrieve selected results from database and display them on page

             $getArticles = $article->getArticlesByLimit($this_page_first_result,$result_per_page);

             while ($row = $getArticles->fetch_assoc()) {
        ?>

        <div class="post">
            <img src="admin/<?php echo $row['ImagePath'];?>" alt="" class="post-image">
            <div class="post-preview">
                <h2><a href="SingleArticlePage.php?articleId=<?= $row['ArticleID']; ?>" class="par ttl"><?= $row['ArticleHeader']; ?></a></h2>
                <i class="far calendar"><?= $row['ArticleTimeStamp']; ?></i>
                <p class="preview-text">
                    <?php echo $format->textShorten($row['ArticleBody'],350) ?>
                </p>
                <!-- TODO: Make link work -->
                <a href="SingleArticlePage.php?articleId=<?= $row['ArticleID']; ?>" class="readMoreBTN read-more">Read More</a>
            </div>
        </div>
        <?php } ?>

        <!-- Page Pagination  -->
        <div class="pagination">
            <?php

                if ($page == 1) {
                    $prev = 1;
                }else{
                    $prev = $page-1;
                }
                if ($page == $number_of_pages) {
                    $next = $number_of_pages;
                }else{
                    $next = $page+1;
                }
                
                // Display Previous page
                echo '<a href="ArticlesList.php?page='.$prev.'" style="color:black;">&laquo; Previous </a>';

                // Display the links to the pages
                for($page = 1;$page<=$number_of_pages;$page++){
                    echo '<a  class="current" href="ArticlesList.php?page='.$page.'" >' . $page . '</a> ';
                }

                // Display Next page
                echo '<a href="ArticlesList.php?page='.$next.'" style="color:black;"> Next &raquo; </a>';
            ?>
        </div>
    </div>
</div>

<!-- right side ad -->
<div class="ads">
    <img src="img/ads-labor.jpg" alt="">
</div>


    <!-- footer-->
    <?php include_once 'includes/footer.php'; ?>





</body>
</html>