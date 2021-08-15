<?php
    $pd = new ProductForHomePage();
    $foramt = new Foramt();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cards</title>
    <link href="styleA/css/all.css" rel="stylesheet">

    <!-- style product cards -->
    <link href="styleA/cardsStyle.css" rel="stylesheet">
</head>
<body>
    
<div class="productCardsContainer">
    <div class="container">

        <?php
            $getpd = $pd->getRecentProducts();
            if($getpd){
                while($result = $getpd->fetch_assoc()){

           
        ?>
        <!-- TODO: Add <a> tag to be able to click on the product and go to product page  -->
         <!-- TODO: Add <a> tag to be able to click on the Wishlist and go to product page  -->
        <div class="card">
            <div class="imgBx">
               <a href="ProductPage.php?pdId=<?php echo $result['ProductID']; ?>&userId=<?php echo $result['UserID']; ?>"> 
               <img src="admin/<?php echo $result['Image']; ?>" alt=""> </a>
                <ul class="action">
                    <li>
                       <a href="#"> <i class="fas fa-heart"></i> </a>
                        <span>Add to Wishlist</span>
                    </li>
                    <li>
                    <a href="ProductPage.php?pdId=<?php echo $result['ProductID']; ?>&userId=<?php echo $result['UserID']; ?>">  <i class="far fa-eye"></i> </a>
                        <span>View Details</span>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div class="productName">
                    <h3><?=$result['ProductName'];?></h3>
                </div>
                <div class="price_status">
                    <h2>$<?= $result['Price']; ?></h2>
                    <div class="status">
                        <h4><?= $result['ProductCondition']; ?></h4>
                    </div>
                </div>
            </div>
        </div>

        <?php }} ?>
       

    </div>

</div>










</body>
</html>