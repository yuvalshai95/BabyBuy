<?php include_once 'includes/navTop.php'; ?>

<?php
    if (!isset($_GET['articleId'])) {
        header("location: 404.php");
    }else{
        $id = $_GET['articleId'];
    }

    $article = new Article();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link href="styleA/css/all.css" rel="stylesheet">
    <link href="styleA/css/all.min.css" rel="stylesheet">
    <!-- style Articles List -->
    <link href="styleA/singleArticleStyle.css" rel="stylesheet">
</head>
<body>
    


<div class="content clearfix">
    <div class="main-content single">

        <?php
            $getArticle = $article->getArticleByID($id);
            if($getArticle){
                $row = $getArticle->fetch_assoc();
            }

            // init array to store all images path                
            $imagePath = [];

            // get all images path
            $getAllImages = $article->getAllImagesByArticleId($id);

             // add all images path to the array
             while($result = $getAllImages->fetch_assoc()){
                array_push($imagePath,$result['ImagePath']);
            }

            $i=0;

    ?>

        <h1 class="post-title"><?= $row['ArticleHeader']; ?></h1>
        <div class="post-content">
            <img src="admin/<?php if($i < sizeof($imagePath)){echo $imagePath[$i]; $i++;}else{echo 'img/general_photo.jpg';} ?>" alt="" class="article-img">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur magni facere dicta, mollitia nostrum voluptatum!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptas hic quam rem culpa fuga delectus laudantium laborum praesentium repellendus accusamus, illo commodi ut dignissimos molestias. Facilis eligendi hic odio.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus optio architecto aliquid aperiam, blanditiis voluptates nesciunt. Explicabo itaque ipsa voluptatem praesentium hic nihil ratione impedit.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, quasi fugiat asperiores iusto beatae porro error et consequuntur laudantium ullam aspernatur numquam, quos id voluptate cumque quas perspiciatis temporibus quis tempore libero optio! Provident, fugiat?</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia ducimus nisi officia magni aliquid quo praesentium perspiciatis eius accusamus exercitationem?</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur magni facere dicta, mollitia nostrum voluptatum!</p>
            <img src="admin/<?php if($i < sizeof($imagePath)){echo $imagePath[$i]; $i++;}else{echo 'img/general_photo.jpg';} ?>" alt="" class="article-img">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptas hic quam rem culpa fuga delectus laudantium laborum praesentium repellendus accusamus, illo commodi ut dignissimos molestias. Facilis eligendi hic odio.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus optio architecto aliquid aperiam, blanditiis voluptates nesciunt. Explicabo itaque ipsa voluptatem praesentium hic nihil ratione impedit.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, quasi fugiat asperiores iusto beatae porro error et consequuntur laudantium ullam aspernatur numquam, quos id voluptate cumque quas perspiciatis temporibus quis tempore libero optio! Provident, fugiat?</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia ducimus nisi officia magni aliquid quo praesentium perspiciatis eius accusamus exercitationem?</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur magni facere dicta, mollitia nostrum voluptatum!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptas hic quam rem culpa fuga delectus laudantium laborum praesentium repellendus accusamus, illo commodi ut dignissimos molestias. Facilis eligendi hic odio.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus optio architecto aliquid aperiam, blanditiis voluptates nesciunt. Explicabo itaque ipsa voluptatem praesentium hic nihil ratione impedit.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, quasi fugiat asperiores iusto beatae porro error et consequuntur laudantium ullam aspernatur numquam, quos id voluptate cumque quas perspiciatis temporibus quis tempore libero optio! Provident, fugiat?</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia ducimus nisi officia magni aliquid quo praesentium perspiciatis eius accusamus exercitationem?</p>
            <img src="admin/<?php if($i < sizeof($imagePath)){echo $imagePath[$i]; $i++;}else{echo 'img/general_photo.jpg';} ?>" alt="" class="article-img">
        </div>
    </div>




    <!-- Side bar start -->
    <div class="sidebar single">

        <div class="section popular">
            <h2 class="section-title">Popular</h2>

            <div class="post clearfix">
                <img src="img/article1.png" alt="">
                <a href="" class="title a"><h4>Title Title Title</h4></a>
            </div>

            <div class="post clearfix">
                <img src="img/article1.png" alt="">
                <a href="" class="title a"><h4>Title Title Title</h4></a>
            </div>

            <div class="post clearfix">
                <img src="img/article1.png" alt="">
                <a href="" class="title a"><h4>Title Title Title Title</h4></a>
            </div>

            <div class="post clearfix">
                <img src="img/article1.png" alt="">
                <a href="" class="title a"><h4>Title Title Title Title Title</h4></a>
            </div>
        </div>

        <div class="section topics">
            <h2 class="section-title">Topics</h2>
            <ul>
                <li><a href="#" class="par">Pregnancy</a></li>
                <li><a href="#" class="par">Toys</a></li>
                <li><a href="#" class="par">Food</a></li>
                <li><a href="#" class="par">Clothing</a></li>
                <li><a href="#" class="par">Carriages</a></li>
                <li><a href="#" class="par">Education</a></li>
                <li><a href="#" class="par">Babies</a></li>
                <li><a href="#" class="par">Leisure</a></li>
            </ul>
        </div>

    </div>

    <!-- Side bar end -->

</div>




<!-- footer-->
<?php include_once 'includes/footer.php'; ?>



</body>
</html>