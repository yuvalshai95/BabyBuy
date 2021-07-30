<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link href="styleA/css/all.css" rel="stylesheet">

        <!-- style Product Page -->
        <link href="styleA/productPage.css" rel="stylesheet">

</head>
<body>

    <!-- top nav bar -->
    <?php include_once 'includes/navTop.php'; ?>

<div class="productPageContainer">
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="img/cradle.png" width="100%" id="ProductImg">
                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="img/cradle.png" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="img/cradle1.png" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="img/cradle2.png" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="img/cradle3.png" alt="" width="100%" class="small-img">
                    </div>
                </div>
            </div>

            <div class="col-2">
                <p>Product Category</p>
                <h1>Product Name</h1>
                <h4>Price: 20.3$ | Shipping price: 3$</h4>
                <h5>Age: 0-3</h5>
                <h5>Pickup Option: Xxx</h5>
                <h5>Condition: Xxx</h5>
                <h5>Status: Xxx</h5>
                <a href="" class="btn"><i class="fas fa-heart"></i> Add to Wishlist</a>
                <h3>Product Details <i class="fa fa-indent"></i></h3>
                <br>
                <p>Lorem Ipsum is simply dummy text of the 
                    printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy 
                    text ever since the 1500s, when an unknown printer 
                    took a galley of type and scrambled it to make a type 
                    specimen book. It has survived not only five 
                    centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged.</p>
            </div>
        </div>

        <div class="row seller">
        <h3>Seller Details</h3>
        <p>Adi Hemo</p>
        <p>Zalman Shazar, Qiriat Yam</p>
        <p>052-6682665</p>
        <p>adi4hemo@gmail.com</p>
        </div>

        <div class="row map">
            <h1>***MAP***</h1>
        </div>


    </div>
</div>
















    <!-- footer-->
    <?php include_once 'includes/footer.php'; ?>

<script>
    var ProductImgg = document.getElementById("ProductImg");
    var SmallImg = document.getElementsByClassName("small-img");
    SmallImg[0].onclick = function(){
        ProductImgg.src = SmallImg[0].src;
    }

    SmallImg[1].onclick = function(){
        ProductImgg.src = SmallImg[1].src;
    }

    SmallImg[2].onclick = function(){
        ProductImgg.src = SmallImg[2].src;
    }

    SmallImg[3].onclick = function(){
        ProductImgg.src = SmallImg[3].src;
    }

</script>



</body>
</html>