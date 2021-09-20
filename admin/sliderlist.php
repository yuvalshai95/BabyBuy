<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Slider.php'; ?>

<?php $slider = new Slider(); ?> <!-- Creating new instance that connect to db with CRUD operation -->

<!-- Box icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery CDN  DON'T TOUCH OR CODE WILL BREAK-->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<!-- BOOTSTRAP DON'T TOUCH OR CODE WILL BREAK -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 


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
						<div class="edit">
							<button type="button" name="edit" class="edit_data" id="<?php echo $result['SliderID']; ?>"><i class='bx bx-edit'></i></button>
						</div>
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


<!--  product Details after button click bootstrap modal -->
<div id="edit_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">  
                     <button style="color:white; background-color:#253b70; margin:0 0;opacity: 1;" type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 style="    margin-top: 1em;margin-right: 5.5em;" class="modal-title">Slider Details</h4>  
                </div>  

                <!-- Body, get body content from ajax function call -->
                <div class="modal-body" id="slider_detail">  
                    
                </div>

                <!-- Footer -->
                <div class="modal-footer">  
                     <button style="color:white; background-color:#253b70;" type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
<!--  product Details after button click bootstrap modal -->




<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>


<!-- Script to show user details modal on click -->
<script>
    $(document).ready(function(){
        $('.edit_data').click(function(){
            var slider_id = $(this).attr("id"); // id from details button 

            $.ajax({
                url:"inc/sliderData.inc.php",
                method:"POST",
                data:{slider_id:slider_id},
                success: function(data){
                    // data we get back from the sever we want to show it in class=modal-body, id=user_detail
                    $('#slider_detail').html(data);

                    //div id=datamodal selector -> on success show modal
                    $('#edit_data_Modal').modal("show");
                }
            });
        });
    });
 
</script>
<!-- Script to show user details modal on click -->







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
.edit button {
    background: none;
    border: none;
    cursor: pointer;
    color: gray;
    font-size: 32px;
}
</style>


<?php include 'inc/footer.php';?>


