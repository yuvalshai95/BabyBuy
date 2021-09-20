<?php include_once 'classes/Category.php'; ?>
<?php include_once 'DataBase/DB_Config.php'; ?>
<?php include_once 'classes/Product.php'; ?>
<?php include_once 'classes/Article.php'; ?>
<?php include_once 'classes/User.php'; ?>



<?php
        $db = new Database();
        $pd = new Product();
        $category = new Category();
        $article = new Article();
        $user = new User();


        
        $getUser = $user->getUserById(41)->fetch_assoc();
       // print_r($getUser['']);

        if($getUser['Interest'] !== NULL){
       $myString = $getUser['Interest'];
       $myArray = explode(',',$myString);
       $interest = implode("','", $myArray);
       $interest = "'".$interest;
       $interest = $interest."'";
       echo $interest;
        }else{
                echo 'NULL';
        }


       $query = 'SELECT * FROM product p INNER JOIN category c on p.ProductCategory = c.CategoryID WHERE c.CategoryName IN ('.$interest.') LIMIT 4';

       $result = $db->select($query);

       print_r($result->fetch_assoc());


?>


