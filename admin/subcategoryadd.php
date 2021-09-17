<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/SubCategory.php';?>
<?php include '../classes/Category.php';?>

<?php
    $subCategory = new SubCategory(); // Creating new instance that connect to db with CRUD operation

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ){

        if($subCategory->checkIfSubCategoryNameExists($_POST['subCategoryName']) == false){

            $insertSubCategory = $subCategory->subCategoryInsert($_POST); // Getting the msg from the method
        }else{
            $insertSubCategory = "<span  class='alert alert-danger' role='alert'>This name already exists !</span>";
        }
    }
?>




<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Sub-Category</h2>
        <div class="block">  
            
        <?php
            if (isset($insertSubCategory)) {
                echo $insertSubCategory;
            }
        ?>

         <form style="margin-top: 15px;" action="" method="POST">
            <table class="form">
               
                <tr>
                    <td style="width: 170px;">
                        <label>Sub Category Name: </label>
                    </td>
                    <td>
                        <input type="text" name="subCategoryName" placeholder="Enter Name..." class="medium" style="width: auto;" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category: </label>
                    </td>
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

                <!-- Submit BTN START-->
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" class="btn btn-green" />
                    </td>
                </tr>
                <!-- Submit BTN END-->

                </table>
                    </form>
                </div>
            </div>
        </div>

    <script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>

<?php include 'inc/footer.php';?>