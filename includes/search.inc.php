<?php
    require_once '../DataBase/DB_Config.php';
    require_once '../classes/Product.php';
    require_once '../admin/helpers/Format.php';

$db = new Database();
$pd = new Product();
$fm = new Foramt();

if (isset($_POST['action'])) {

    $query = "SELECT * FROM product WHERE ProductCategory != ''";
    
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

    $result = $db->select($query);
    $output = '';

    if ($result !== false) {
        while ($row = $result->fetch_assoc()) {
            $output .= '
            <div class="col-md-3 mb-2">
                <div class="card-deck">
                    <div class="card">
                   
                    <img style="width: 100%; height: 250px;" src="admin/'. $row['Image'].'" class="card-img-top">
                    <div class="card-img-overlay" style="pointer-events: none">
                        <h5 style="margin-top: 230px;" class="text-light bg-info text-center rounded p-1">'. $row['ProductName'].'</h5>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title" style="margin-top: 25px;">Price: $'. $row['Price'].'</h3>
                        <p>'.$fm->textShorten($row['Description'],100).'</p>
                        <a href="ProductPage.php?pdId='.$row['ProductID'].'&userId='.$row['UserID'].'&productCategory='.$row['ProductCategory'].'" class="btn btn-primary btn-block">Product Page</a>
                    </div>
                </div>
            </div>
        </div>';
        }
    }else{
        $output .= '<h3>No Products Found!</h3>';
    }
    echo $output;
}


?>