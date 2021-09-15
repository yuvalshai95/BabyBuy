﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Category.php'; ?>


<?php
    $cat = new Category(); // Creating new instance that connect to db with CRUD operation

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $CategoryName = $_POST['CategoryName']; // Input from the form to send to the db

        if($cat->checkIfCategoryNameExists($CategoryName) == false){

            $insertCat = $cat->catInsert($CategoryName); // Getting the msg from the method
        }else{
            $insertCat = "<span  class='alert alert-danger' role='alert'>This name already exists !</span>";
        }

    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
                
               <!-- Succsess or Error msg -->
               <?php   
                    if (isset($insertCat)) {
                        echo $insertCat;
                    }
                ?>

                 <form action=" " method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="CategoryName" placeholder="Enter Category Name..." class="medium" style="margin-top: 1rem;"/>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" class="btn btn-green"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>