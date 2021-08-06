<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Product.php'; ?>
<?php include_once 'helpers/Format.php'; ?>

<?php
$product = new Product();
$format  = new Foramt();
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">

			<!-- Table Titles -->
			<thead>
			
				<tr>
					<th>Serial No.</th>
					<th>User-ID </th>
					<th>Category-ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Pick Up</th>
					<th>Age Group</th>
					<th>Price</th>
					<th>Remarks</th>
					<th>Status</th>
					<th>Condition</th>
					<th>Image</th>
					<th>Days</th>
					<th>Action</th>
				</tr>
				
			</thead>
			<!--/ Table Titles -->

			<tbody>

			<?php
				$getProduct = $product->getAllProducts();

				if ($getProduct) {
					$i = 0;
					while($result = $getProduct->fetch_assoc()){
					$i++;	
			?>

				<tr class="odd gradeX">
					<td class="tableCenter"> <?= $i; ?> </td>
					<td class="tableCenter"><?= $result['FirstName'].'-'.$result['UserID']; ?> </td>
					<td class="tableCenter"><?= $result['CategoryName'].'-'.$result['ProductCategory'];; ?></td>
					<td class="tableCenter"><?= $result['ProductName']; ?></td>
					<td class="tableCenter"><?= $format->textShorten($result['Description'], 30); ?></td>
					<td class="tableCenter"><?= $result['PickupOptions']; ?></td>
					<td class="tableCenter"><?= $result['Age']; ?></td>
					<td class="tableCenter"><?= $result['Price']; ?></td>
					<td class="tableCenter"><?= $result['Remarks']; ?></td>
					<td class="tableCenter"><?= $result['Status']; ?> </td>
					<td class="tableCenter"><?= $result['ProductCondition']; ?></td>
					<td class="center"> <img src="<?= $result['Picture']; ?>" height="40px;" width="60px;"></td>
					<td class="tableCenter"> 
						<!-- Show how many days since the product was uploaded-->
						<?php 

								// Function to find the difference 
								// between two dates.
								function dateDiffInDays($date1, $date2) 
								{
									// Calculating the difference in timestamps
									$diff = strtotime($date2) - strtotime($date1);
									
									// 1 day = 24 hours
									// 24 * 60 * 60 = 86400 seconds
									return abs(round($diff / 86400));
								}
								
								// Start date (from db)
								$date1 = $result['ProductTime'];;
								
								// End date (current date)
								$date2 = date('Y-m-d H:i:s');
								
								// Function call to find date difference
								$dateDiff = dateDiffInDays($date1, $date2);

								// Check how many days passed
								if($dateDiff >= 14){

									// Display the result in red
									$msg = "<span class = 'error'> ".$dateDiff."  </span>";
									echo $msg;
									
								}
								else{

									// Display the result in green
									$msg = "<span class = 'success'> ".$dateDiff." </span>";
									echo $msg;
								}

						?> 
				</td>

					<!-- TODO: make links work -->
					<td class="tableCenter"> <a href="">Edit</a> || <a href="">Delete</a> || <a href="">Status</a> </td>
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
