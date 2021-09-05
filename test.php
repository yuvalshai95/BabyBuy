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
    $getAllCategories = $category->getAllCategories();
    while($row = $getAllCategories->fetch_assoc()){
        $sub_by_cat = $sub->getSubByMainCategoryID($row['CategoryID'])->fetch_assoc();
            echo $sub_by_cat['SubCategoryName'];
    }
?>


<select  id="father_selector">
    <option value="12">shoes</option>
    <option value="5">bags</option>
</select>

<select  id="pd_Sub_shoes_12">
    <option value="#">sub2</option>
</select>

<select style="display: none;"  id="pd_Sub_bags_5">
    <option value="#">sub3</option>
    <option value="#">sub4</option>
</select>

<script>
 $("#father_selector").change(function(){
    if($('#father_selector').val() == 5){
      $("#pd_Sub_bags_5").show();
      $("#pd_Sub_shoes_12").hide();
    }else{
      $("#pd_Sub_bags_5").hide();
    }
    
});
</script>





