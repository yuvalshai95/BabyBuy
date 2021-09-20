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
</div>




<!-- footer-->
<?php include_once 'includes/footer.php'; ?>



</body>
</html>