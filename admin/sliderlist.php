<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Slider.php'; ?>

<?php
$slider = new Slider();

?>


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
					<th>Action</th>
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

				<tr class="odd gradeX">
					<td class="tableCenter"> <?= $i; ?> </td>
					<td class="tableCenter"><?= $result['SliderTitle']; ?> </td>
					<td class="center"> <img src="<?= $result['SliderImage']; ?>" height="40px;" width="60px;"></td>				
					<td>
						<a href="">Edit</a> || 
						<a onclick="return confirm('Are you sure to Delete!');" >Delete</a> 
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
<?php include 'inc/footer.php';?>
