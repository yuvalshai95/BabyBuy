<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <link href="styleA/css/all.css" rel="stylesheet">
    <link href="styleA/css/all.min.css" rel="stylesheet">
    <!-- style Articles Cards -->
    <link href="styleA/addProductPage.css" rel="stylesheet">
</head>
<body>
    <!-- top nav bar -->
    <?php include_once 'includes/navTop.php'; ?>


    <div class="content clearfix">
        <div class="main-content">
            <h1 class="recent-post-title">Upload Your Product</h1>
            <hr />

            <h2>Product Details</h2>
            <form action="" class="upload-product-form">
                <label for="pname">Product name:</label><br>
                <input type="text" id="pname" name="pname"><br><br>
                <label for="description">Description:</label><br>
                <textarea type="text" id="description" name="description"></textarea><br><br>
                <label for="pname">Price:</label><br>
                <input type="text" id="price" name="price"><br><br>
                <label for="cars">Category:</label><br>
                <select name="cars" id="cars">
                    <option value="none"></option>
                    <option value="toys">Toys</option>
                    <option value="clothing">Clothing</option>
                    <option value="furniture">Furniture</option>
                    <option value="books">Books</option>
                </select><br><br>
                
            </form>

            <hr />

            <h2>Pictures</h2>


            <hr />


            <h2>Contact Details</h2>


            <hr />

            <button type="button" onclick="alert('Thank You!')" class="submit-btn">Submit</button>
        </div>
    </div>



















    <!-- footer-->
    <?php include_once 'includes/footer.php'; ?>        
</body>
</html>