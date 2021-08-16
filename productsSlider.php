<?php
    if (isset($_GET['productCategory'])) {
       $category_id = $_GET['productCategory'];

    }

    $pd = new Product();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Product Slider</title>
    <link rel="stylesheet" href="styleA/productsSliderStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<div class="body">
    <div class="container">
        <?php

            $getSimilarProducts = $pd->getSimilarProducts($category_id);
            if ($getSimilarProducts) {
                while ($result = $getSimilarProducts->fetch_assoc()) {
                    


        ?>

        <div class="slider">
            <div class="image">
                <img src="admin/<?php echo $result['Image']; ?>" style=" width: 250px; height: 200px;">
                <div class="Button">
                    <a href="ProductPage.php?pdId=<?php echo $result['ProductID']; ?>&userId=<?php echo $result['UserID']; ?>" class="Pbtn">Buy Now</a>
                </div>
            </div>
            <div class="product-details">
                <div class="product-name">
                    <a href="#"><?= $result['ProductName']; ?></a>
                    <span><?= $result['ProductCondition']; ?></span>
                </div>
                <a href="#" class="price">$<?= $result['Price']; ?></a>
            </div>
        </div>
    <?php }} ?>
    

     
        </div>
        </div>
            <i class="fas fa-chevron-right arrow"></i>
        </div>
    </div>

</div>

    <script type="text/javascript">
        const arrows = document.querySelectorAll(".arrow");
        const container= document.querySelectorAll(".container");

        arrows.forEach((arrow, i) => {
            const ItemNo = container[i].querySelectorAll("img").length;
            let clickitem = 0;
            arrow.addEventListener("click", () => {
                clickitem++;
                if(ItemNo - (6 + clickitem) >= 0){
                    container[i].style.transform = `translateX(${
                        container[i].computedStyleMap().get("transform")[0].x.value
                        - 455}px)`;
                }else{
                    container[i].style.transform = "translateX(0)";
                    clickitem = 0;
                }
            });
        });
    </script>
   
</body>
</html>
