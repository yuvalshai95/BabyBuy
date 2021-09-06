<?php include_once 'classes/Category.php'; ?>
<?php include_once 'classes/SubCategory.php'; ?>
<?php
        $category = new Category();
        $sub = new SubCategory();
?>

        <!-- jQuery CDN  DON'T TOUCH OR CODE WILL BREAK-->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- jQuery CDN  DON'T TOUCH OR CODE WILL BREAK-->



<?php

$name = "Leather Shoes";
   //removing white space from city input
   $name = str_replace(' ','',$name);
   if (preg_match("/^[a-zA-Z]{2,}$/",$name)) {
       $result = false;
   }else{
       $result = true;
   }


?>




