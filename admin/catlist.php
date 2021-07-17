<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Category.php'; ?>

<?php 
    $cat = new Category(); // Creating new instance that connect to db with CRUD operation

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php
					$getCat = $cat->getAllCategories(); // Getting a list of all categories
					if($getCat){
						$i = 0; // Var for replacing id

						// While loop to go through every category name
						while ($result = $getCat->fetch_assoc()) { 
							$i++;
					?> <!-- Ending the php tag to write html code -->

						<tr class="odd gradeX">
							<td> <?php echo $i; ?> </td> <!-- category id using i var -->
							<td><?php echo $result['CategoryName']; ?></td> <!-- category name from db -->
							<td><a href="catedit.php?categoryid=<?php echo $result['CategoryID']; ?>"> Edit </a> || <a href=""> Delete </a></td>
						</tr>

						<?php } } ?> <!-- closing the While loop and if stmt with php tags -->

					</tbody>
				</table>
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

