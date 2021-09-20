<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Slider.php'; ?>

<?php $slider = new Slider(); ?> <!-- Creating new instance that connect to db with CRUD operation -->

<!-- Box icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>

        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>

				<tr>

				<!--/ Table Titles -->
					<th>No.</th>
					<th>Slider Title</th>
					<th>Slider Image</th>
					<th>Edit</th>
					<th>Remove</th>
					<!--/ Table Titles -->
				</tr>

			</thead>

			<tbody>

			<?php
				$getSlider = $slider->getAllSliders();

				if ($getSlider) {
					$i = 0;
					while($result = $getSlider->fetch_assoc()){
					$i++;	
			?>

				<tr class="odd gradeX" id="tr_<?php echo $result['SliderID']; ?>">
					<td class="tableCenter"> <?= $i; ?> </td>
					<td class="tableCenter"><?= $result['SliderTitle']; ?> </td>
					<td class="center"> <img src="<?= $result['SliderImage']; ?>" height="40px;" width="60px;"></td>				
					<td>
						<a href="slideredit.php?sliderId=<?php echo $result['SliderID']; ?>" > <i class='bx bx-edit' style="font-size: 32px;color:gray;"></i> </a>
					</td>
					<td>
						<div class="delete">
							<button type="button" onclick="delete_data('<?php echo $result['SliderID']?>')"><i class='bx bx-x-circle'></i></button>
						</div>
						</td>

				</tr>

			<?php 	} } ?> <!-- Closing the if and while loop -->

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
						url: 'inc/removeSlider.inc.php',
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






<style>
	.delete button {
    background: none;
    border: none;
    cursor: pointer;
    color: gray;
    font-size: 32px;
}
</style>


<?php include 'inc/footer.php';?>


