<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Category.php'; ?>

<?php 
// Getting the categoryID from catlist page after clicking edit btn using the GET Method
if (!isset($_GET['categoryid'])  ||  $_GET['categoryid'] == NULL ) {

    // Reload catlist.php page script.. can't edit with null ID
    echo "<script>window.location = 'catlist.php'; </script>";

}else{
    $id = $_GET['categoryid'];
}

?>



<?php
    $cat = new Category(); // Creating new instance that connect to db with CRUD operation

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $CategoryName = $_POST['CategoryName']; // Input from the form to send to the db

        $updateCategory = $cat->categoryUpdateName($CategoryName, $id); // Getting the msg from the method
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock">
                
               <!-- Succsess or Error msg -->
               <?php   
                    if (isset($updateCategory)) {
                        echo $updateCategory;
                    }
                ?>


                <?php
                $getCategory = $cat->getCategoryByID($id); // Getting a category by ID
                if ($getCategory) {
                    
                    // Making result var an assoc array 
                    // (should be an array of 2 -> categoryId && categoryName)
                    $result = $getCategory->fetch_assoc();
                   
                ?> <!-- Ending the php tag to write html code -->


                 <form action=" " method="post" >
                    <table class="form">					
                        <tr>
                            <td style="width: 100px;">
                                <label for="">New Name: </label>
                            </td>

                            <td>
                                <!-- Showing category name on the value attribute from the db using result var-->
                                <input type="text" name="CategoryName" value="<?php echo $result['CategoryName']; ?>" class="medium" />
                            </td>
                        </tr>

                        <!-- TODO: Add "Cancel" BTN to return to slider list -->    
                        <!-- Update BTN -->
						<tr> 
                             <!-- CANCEL BTN -->
                             <td style="width: 100px;">
                                <a href="catlist.php" class="btn btn-red">CANCEL</a>
                            </td>
                            <!-- CANCEL BTN -->

                            <td>
                                <input type="submit" name="submit" Value="Update" class="btn btn-green"/>
                            </td>
                        </tr>
                        <!-- Update BTN -->


                    </table>
                    </form>
                    <?php }  ?> <!-- closing the if statment with php tag -->

                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>