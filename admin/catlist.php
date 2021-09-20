<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Category.php'; ?>

<!-- Box icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block"> 
					
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Edit</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>

					<?php
					$cat = new Category();
					$getCat = $cat->getAllCategories(); // Getting a list of all categories
					if($getCat){
						$i = 0; // Var for replacing id

						// While loop to go through every category name
					    // Making result var an assoc array
						while ($result = $getCat->fetch_assoc()) { 
							$i++;
					?> <!-- Ending the php tag to write html code -->

						<tr class="odd gradeX" id="tr_<?php echo $result['CategoryID']; ?>">
							<td> <?php echo $i; ?> </td> <!-- category id using i var -->

							<td><?php echo $result['CategoryName']; ?></td> <!-- category name from db -->

							<td>
								<a href="catedit.php?categoryid=<?php echo $result['CategoryID']; ?>"> <i class='bx bx-edit' style="font-size: 32px;color:gray;"></i> </a>
							</td>
								
							<td>
								<div class="delete">
									<button type="button" onclick="delete_data('<?php echo $result['CategoryID']?>')"><i class='bx bx-x-circle'></i></button>
								</div>
							</td>
								
						</tr>

						<?php } } ?> <!-- closing the While loop and if stmt with php tags -->

					</tbody>
				</table>
               </div>
            </div>
        </div>





<!-- jQuery Script to delete item from wishlist table -->
<script>
function delete_data(id){
	// using sweet alert to popup an alert asking user if he is sure he want to delete
	Swal.fire({
	title: 'Are you sure?',
	text: "You won't be able to revert this!",
	icon: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#253b70',
	cancelButtonColor: '#d33',
	confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		// User clicked yes, he wants to delete
		if (result.isConfirmed) {
			jQuery.ajax({
						url: 'inc/removeCategory.inc.php',
						type:'post',
						data: {id:id},
						success: function(result){
							// on success hide row
							jQuery("#tr_"+id).hide(600);
					}
				})
		}
	});
}
</script>
 <!-- jQuery Script to delete item from wishlist table -->

		<script type="text/javascript">
			$(document).ready(function () {
				setupLeftMenu();
				$('.datatable').dataTable();
				setSidebarHeight();
			});
		</script>

<style>
	.delete button {
    background: none;
    border: none;
    cursor: pointer;
    color: gray;
    font-size: 32px;
}
.edit button {
    background: none;
    border: none;
    cursor: pointer;
    color: gray;
    font-size: 32px;
}
</style>
<?php include 'inc/footer.php';?>

