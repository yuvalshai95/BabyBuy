<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/SubCategory.php'; ?>

<?php 
$subCategory = new SubCategory(); // Creating new instance that connect to db with CRUD operation
// Getting the categoryID from 
if (!isset($_GET['categoryid'])  ||  $_GET['categoryid'] == NULL ) {

    // Reload catlist.php page script.. can't edit with null ID
    echo "<script>window.location = 'catlist.php'; </script>";

}else{
    $id = $_GET['categoryid'];
}

?>

<?php
	// We have a *Delete button so we have to check using the GET Method if it was clicked
    if ((isset($_GET['subCategoryId']) && (isset($_GET['subCategoryName'])))) {
        $idToDelete = $_GET['subCategoryId'];
        $subCatName = $_GET['subCategoryName'];
        $deleteSubCategory = $subCategory->deleteSubCategoryById($idToDelete,$subCatName);
    }
?>


<div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block"> 

                <?php
				if (isset($deleteSubCategory)) {
					echo $deleteSubCategory;
				}
				?>
					
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Sub Category Name</th>
                            <th>Category - ID</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php
					$getSub = $subCategory->getSubByMainCategoryID($id); // Getting a list of all categories
					if($getSub){
						$i = 0; // Var for replacing id

						// While loop to go through every category name
					    // Making result var an assoc array
						while ($result = $getSub->fetch_assoc()) { 
							$i++;
					?> <!-- Ending the php tag to write html code -->

						<tr class="odd gradeX">
							<td> <?php echo $i; ?> </td> <!-- category id using i var -->
							<td><?php echo $result['SubCategoryName']; ?></td> 
                            <td><?php echo $result['CategoryName'].'-'.$result['CategoryID']; ?></td>

							<td> 
								<a onclick="return confirm('Are You Sure You Want To Delete This Sub-Category?')" 
                                href="?subCategoryId=<?php echo $result['SubCategoryID']; ?>&
                                     subCategoryName=<?php echo $result['SubCategoryName']; ?>&
                                     categoryid=<?php echo $id ?>">Delete</a>
                            </td>
								<!-- Get method to delete if the btn was click is at the top of the page -->
						</tr>

						<?php } } ?> <!-- closing the While loop and if stmt with php tags -->
                               
					</tbody>
				</table>

                <tr>
                    <td>  
                        <td>
                            <a href="catlist.php" class="btn btn-red"><< Go Back (Category List)</a>
                        </td> 
                    </td>
                </tr>

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
