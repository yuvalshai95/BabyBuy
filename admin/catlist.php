<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Category.php'; ?>

<?php 
    $cat = new Category(); // Creating new instance that connect to db with CRUD operation

	// We have a Delete button so we have to check using the GET Method if it was clicked
	if ((isset($_GET['categoryId']) && (isset($_GET['categoryName'])))) {
		$idToDelete = $_GET['categoryId'];
		$catName = $_GET['categoryName'];
		$deleteCategory = $cat->deleteCategoryById($idToDelete,$catName);
	}

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block"> 
					
				<?php
				if (isset($deleteCategory)) {
					echo $deleteCategory;
				}

				?>

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
					    // Making result var an assoc array
						while ($result = $getCat->fetch_assoc()) { 
							$i++;
					?> <!-- Ending the php tag to write html code -->

						<tr class="odd gradeX">
							<td> <?php echo $i; ?> </td> <!-- category id using i var -->

							<td><?php echo $result['CategoryName']; ?></td> <!-- category name from db -->

							<td><a href="catedit.php?categoryid=<?php echo $result['CategoryID']; ?>"> Edit </a> || 
								<a onclick="return confirm('Are You Sure You Want To Delete This Category?')" href="?categoryId=<?php echo $result['CategoryID']; ?>&categoryName=<?php echo $result['CategoryName']; ?>" > Delete </a> </td>
						</tr>

						<?php } } ?> <!-- closing the While loop and if stmt with php tags -->

					</tbody>
				</table>
               </div>
            </div>
        </div>



		<!-- JavaScript to reaplce the onclick in the <a> tag in the Delete tag (must add class="confirmation") -->
			<!-- 
					<script type="text/javascript">
				var elems = document.getElementsByClassName('confirmation');
				var confirmIt = function (e) {
					if (!confirm('Are you sure?')) e.preventDefault();
				};
				for (var i = 0, l = elems.length; i < l; i++) {
					elems[i].addEventListener('click', confirmIt, false);
				}
			</script> -->

		<script type="text/javascript">
			$(document).ready(function () {
				setupLeftMenu();

				$('.datatable').dataTable();
				setSidebarHeight();
			});
		</script>

<?php include 'inc/footer.php';?>

