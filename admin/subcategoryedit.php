<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Category.php'; ?>
<?php require_once '../classes/SubCategory.php'; ?>

<?php 
// Getting the categoryID from catlist page after clicking edit btn using the GET Method
if (!isset($_GET['subCategoryId'])  ||  $_GET['subCategoryId'] == NULL ) {

    // Reload catlist.php page script.. can't edit with null ID
    echo "<script>window.location = 'subcategorylist.php'; </script>";

}else{
    $id = $_GET['subCategoryId'];
}

?>

<?php
    $subCategory = new SubCategory(); // Creating new instance that connect to db with CRUD operation

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $updateSubCategory = $subCategory->subCategoryUpdate($_POST,$id); // Getting the msg from the method
    }
?>


<div class="grid_10">
            <div class="box round first grid">
                <h2>Update Sub-Category</h2>
               <div class="block copyblock">
                
               <!-- Succsess or Error msg -->
               <?php   
                    if (isset($updateSubCategory)) {
                        echo $updateSubCategory;
                    }
                ?>


                <?php
                $getSubCategory = $subCategory->getSubCategoryByID($id); // Getting a category by ID
                if ($getSubCategory) {
                    
                    // Making result var an assoc array 
                    // (should be an array of 2 -> categoryId && categoryName)
                    $result = $getSubCategory->fetch_assoc();
                   
                ?> <!-- Ending the php tag to write html code -->


                 <form action=" " method="post" >
                    <table class="form">					
                        <tr>
                            <td >
                                <label for="">New Name: </label>
                            </td>

                            <tr>
                                <td >
                                    <!-- Showing category name on the value attribute from the db using result var-->
                                    <input type="text" name="subCategoryName" value="<?php echo $result['SubCategoryName']; ?>" class="medium" style="width: fit-content;"/>
                                </td>
                            </tr>
                        </tr>

                        <tr>
                            <tr>
                                <td><label for="">New Category: </label></td>
                            </tr>

                             <td>
                             
                                <select id="select" name="Category" aria-placeholder="TEXT">
                                <option>Select Category</option>

                                <?php
                                    $cat = new Category();
                                    $getCategories = $cat->getAllCategories();
                                    if ($getCategories) {
                                        while ($result = $getCategories->fetch_assoc()) {
                                            
                                ?>
                                    <option value=" <?= $result['CategoryID'];?> "> <?= $result['CategoryName'];?> </option>
                                <?php   } } ?>  
                                
                                </select>
                             </td>  
                        </tr>



						<tr> 
                            <tr>   
                                <td>
                                    <input type="submit" name="submit" Value="Update" class="btn btn-green"/>
                                </td>
                            </tr>

                             <td>
                                <a href="subcategorylist.php" class="btn btn-red">CANCEL</a>
                            </td> 

                        </tr>

                    </table>
                    </form>
                    <?php }  ?> <!-- closing the if statment with php tag -->

                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>