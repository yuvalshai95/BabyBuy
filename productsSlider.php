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
        <div class="slider">
            <div class="image">
                <img src="img/toy.png">
    
                <div class="Button">
                    <a href="#" class="Pbtn">Buy Now</a>
                </div>
            </div>
    
            <div class="product-details">
                <div class="product-name">
                    <a href="#">Round Neck Yellow T-shirt</a>
                    <span>New Arrival</span>
                </div>
                <a href="#" class="price">$500</a>
            </div>
        </div>
        <div class="slider">
            <div class="image">
                <img src="img/toy2.png">
    
                <div class="Button">
                    <a href="#" class="Pbtn">Buy Now</a>
                </div>
            </div>
    
            <div class="product-details">
                <div class="product-name">
                    <a href="#">Running Shoes</a>
                    <span>New Arrival</span>
                </div>
                <a href="#" class="price">$300</a>
            </div>
        </div>
        <div class="slider">
            <div class="image">
                <img src="img/toy3.png">
    
                <div class="Button">
                    <a href="#" class="Pbtn">Buy Now</a>
                </div>
            </div>
    
            <div class="product-details">
                <div class="product-name">
                    <a href="#">BLACK-CK Analog Watch</a>
                    <span>New Arrival</span>
                </div>
                <a href="#" class="price">$350</a>
            </div>
        </div>
        <div class="slider">
            <div class="image">
                <img src="img/blanket.png">
    
                <div class="Button">
                    <a href="#" class="Pbtn">Buy Now</a>
                </div>
            </div>
    
            <div class="product-details">
                <div class="product-name">
                    <a href="#">Dark Blue Track Pants</a>
                    <span>New Arrival</span>
                </div>
                <a href="#" class="price">$580</a>
            </div>
        </div>
        <div class="slider">
            <div class="image">
                <img src="img/car.png">
    
                <div class="Button">
                    <a href="#" class="Pbtn">Buy Now</a>
                </div>
            </div>
    
            <div class="product-details">
                <div class="product-name">
                    <a href="#">Smart Lace-Ups Shoes</a>
                    <span>New Arrival</span>
                </div>
                <a href="#" class="price">$250</a>
            </div>
        </div>
        <div class="slider">
            <div class="image">
                <img src="img/carriage.png">
    
                <div class="Button">
                    <a href="#" class="Pbtn">Buy Now</a>
                </div>
            </div>
    
            <div class="product-details">
                <div class="product-name">
                    <a href="#">CK312 Analog Watch</a>
                    <span>New Arrival</span>
                </div>
                <a href="#" class="price">$400</a>
            </div>
        </div>
        <div class="slider">
            <div class="image">
                <img src="img/cradle.png">
    
                <div class="Button">
                    <a href="#" class="Pbtn">Buy Now</a>
                </div>
            </div>
    
            <div class="product-details">
                <div class="product-name">
                    <a href="#">Analog-Digital Watch</a>
                    <span>New Arrival</span>
                </div>
                <a href="#" class="price">$1000</a>
            </div>
        </div>
        <div class="slider">
            <div class="image">
                <img src="img/dress.png">
    
                <div class="Button">
                    <a href="#" class="Pbtn">Buy Now</a>
                </div>
            </div>
    
            <div class="product-details">
                <div class="product-name">
                    <a href="#">Men Light Blue Jeans</a>
                    <span>New Arrival</span>
                </div>
                <a href="#" class="price">$520</a>
            </div>
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
