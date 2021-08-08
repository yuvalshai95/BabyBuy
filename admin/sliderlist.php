<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Slider.php'; ?>

<?php $slider = new Slider(); ?> <!-- Creating new instance that connect to db with CRUD operation -->


<?php 

	// We have a *Delete button so we have to check using the GET Method if it was clicked
	if ((isset($_GET['sliderId']) && (isset($_GET['sliderTitle'])))) {
		$idToDelete = $_GET['sliderId'];
		$sliderName = $_GET['sliderTitle'];
		$deleteSlider = $slider->deleteSliderById($idToDelete,$sliderName);
	}

?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>

		<?php
			if(isset($deleteSlider)){
				echo $deleteSlider;
			}

		?>


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
						<a href="slideredit.php?sliderId=<?php echo $result['SliderID']; ?>" > Edit </a> || 
						<a onclick="return confirm('Are You Sure You Want To Delete This Slider?')" href="?sliderId=<?php echo $result['SliderID']; ?>&sliderTitle=<?php echo $result['SliderTitle']; ?>" > Delete </a> 
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
