<?php
    require_once '../DataBase/DB_Config.php';
    require_once '../classes/Product.php';
    require_once '../admin/helpers/Format.php';

    $db = new Database();
    $pd = new Product();
    $fm = new Foramt();
?>

<?php
if (isset($_POST['action'])) {

    $query = "SELECT * FROM product WHERE ProductCategory != ''";

    // Check price filter
    if (isset($_POST['minimum_price'],$_POST['maximum_price']) && !empty($_POST['minimum_price']) && !empty($_POST['maximum_price'])) {
        $query .= "AND Price BETWEEN '".$_POST['minimum_price']."' AND '".$_POST['maximum_price']."'";
    }
    
    // 1) Check all category checked boxes
    if(isset($_POST['category'])){

        //Data from filterData var is array {shoes,bags,toys}
        //convert array to string for the sql query using implode php function
        $category = implode("','", $_POST['category']);

        //Creating a query with all the selected checkbox
        $query .= "AND ProductCategory IN ('".$category."')";

    }

    // 2) Check all category checked boxes
    if(isset($_POST['condition'])){

        $condition = implode("','", $_POST['condition']);

        //adding to the query all the selected checkbox
        $query .= "AND ProductCondition IN ('".$condition."')";

    }

    // 2) Check all category checked boxes
    if(isset($_POST['age'])){

        $age = implode("','", $_POST['age']);

        //adding to the query all the selected checkbox
        $query .= "AND Age IN ('".$age."')";

    }

    $query .= "ORDER BY ProductName ASC ";

    $result = $db->select($query);

    if ($result !== false) {

    
    while ($row = $result->fetch_assoc()) {
    ?>
           
           <div class="col-md-3 mb-2">
                        <div class="card-deck">
                        <!-- add style="border: none;" to card dive to remove border -->
                            <div class="card">
                                <!-- product image, don't touch style: pointer-everts or code will break -->
                                <img style="width: 100%; height: 250px;" src="<?php  
                                                                                $img = $pd->getSingleImagesByProductId($row['ProductID'])->fetch_assoc(); 
                                                                                $single = $img['ImagePath']; 
                                                                                $single = str_replace('../','',$single); 
                                                                                echo $single?>" class="card-img-top">
                                                                                
                                <div class="card-img-overlay" style="pointer-events: none">
                                    <h6  style="margin-top: 235px; color:#585858; font-weight:bold;text-align:center;"><?= $row['ProductName'];?></h6>
                                </div>

                                <!-- Card content -->
                                <div  style="padding:.5em .6em .2em .6em;" class="card-body">
                                   
                                    <!-- Description -->
                                    <p style="margin-top:20px; margin-bottom:0;"><?= $fm->textShorten($row['Description'],65) ?></p>

                                    <!-- div wrap price and badge -->
                                    <div class="wrap" style="display: flex; justify-content:space-between; padding:.2em .3em 0 .3em; margin-top:10px;">

                                        <!-- Price -->
                                        <h5 class="card-title" style="color:#FF6659; font-weight:bold;">$<?= $row['Price'];?></h5>

                                        <!-- badge -->
                                        <span style="block-size: fit-content;" class="badge badge-<?php 
                                        if (strtolower($row['ProductCondition']) == "new"){ 
                                            echo 'primary';
                                        }
                                        else if(strtolower($row['ProductCondition']) == "used"){
                                            echo 'warning';
                                        }
                                        else if(strtolower($row['ProductCondition']) == "barely used"){
                                            echo 'info';
                                        }
                                        else if(strtolower($row['ProductCondition']) == "open box"){
                                            echo 'success';
                                        }
                                        else if(strtolower($row['ProductCondition']) == "gently used"){
                                            echo 'dark';
                                        }  
                                        ?>">
                                        <?= strtoupper($row['ProductCondition']);?></span>
                                    </div>
                                   
                                    <!-- product page button -->
                                  <a style="margin-bottom: 5px;background-color: #21b8e6;border-color: #21b8e6;" href="ProductPage.php?pdId=<?= $row['ProductID'];?>&userId=<?= $row['UserID'];?>&productCategory=<?= $row['ProductCategory']?>" class="btn btn-primary btn-block">Product Page</a>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php }}else{
            echo '<div style="margin:auto;"><h3>No Products Found :(</h3></div>';
        } ?>     
<?php } ?>
