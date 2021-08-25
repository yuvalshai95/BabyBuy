<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Product.php'; ?>
<?php include_once 'helpers/Format.php'; ?>

<?php
$product = new Product();
$format  = new Foramt();
?>

<!-- PopUp Alert Script -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
	// We have a *Reminder button so we have to check using the GET Method if it was clicked
	if(isset($_GET['userId']) && isset($_GET['userProduct'])){
		$userDetails = $product->getUserProduct($_GET['userProduct'],$_GET['userId'])->fetch_assoc();
		$userEmail = $userDetails['UserEmail'];

		// Changing product "Days" counter from productlist page table to 0  
		$product->updateProductDate($_GET['userId'],$_GET['userProduct']);

		// pop up alert for success 
		echo '
		<script>
			swal({
			  title: "A Reminder Was Sent  To '.$userEmail.' !",
			  text: "",
			  icon: "success",
			  button: "Close",
			});
		</script>';

	}else{
		// User email was not received by GET method
		$userEmail = "";
	}
?>


<?php 
	//PHPMailer Code
    // Include required phpmailer files
    require_once '../PHPMailer/PHPMailer.php';
    require_once '../PHPMailer/SMTP.php';
    require_once '../PHPMailer/Exception.php';

    // Define name spaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Create instance of phpmailer
    $mail = new PHPMailer();

    // Set mailer to use smtp
    $mail->isSMTP();

    // Define smtp host
    $mail->Host = "smtp.gmail.com";

    // Enable smtp authentication
    $mail->SMTPAuth = true;

    // Set type of encryption (ssl/tls)
    $mail-> SMTPSecure = "tls";

    // set port to connect smtp
    $mail->Port = 587;

	// Removing php strict ssl behaviour
	$mail->SMTPOptions = array(
	'ssl' => array(
	'verify_peer' => false,
	'verify_peer_name' => false,
	'allow_self_signed' => true ) );

    // Set gmail username
    $mail->Username = "babybuyservice@gmail.com";

    // Set gmail password
    $mail->Password = "yuval123456";

    // Set email subject
    $mail->Subject = "no-reply: BabyBuyService Product Reminder";

	//Enable HTML
	$mail->isHTML(true);

    // Set sender email
    $mail->setFrom("babybuyservice@gmail.com");

    // Email body
    $mail->Body = "<h1>This is HTML h1</h1>
	</br>
	<p>This is plain text email body</p>";

	// Add recipient 
	$mail->addAddress($userEmail);

	// Finally send email
	$mail->Send();

	// Closing smtp connection
	$mail->smtpClose();

?>

<?php 
	// We have a *Delete button so we have to check using the GET Method if it was clicked
	if ((isset($_GET['productId']) && (isset($_GET['productName'])))) {
		$idToDelete = $_GET['productId'];
		$productName = $_GET['productName'];
		$deleteProduct = $product->deleteProductById($idToDelete,$productName);
	}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>

		<?php 
			// Printing the deleted product success message 
			if(isset($deleteProduct)){
				echo $deleteProduct;
			}
		?>

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
				// Function to find the difference between two dates.
				function dateDiffInDays($date1, $date2) 
				{
					// Calculating the difference in timestamps
					$diff = strtotime($date2) - strtotime($date1);
									
					// 1 day = 24 hours
					// 1 day = 24hr* 60min * 60sec = 86400 seconds
					return abs(round($diff / 86400));
				}

				// Run Query
				$getProduct = $product->getAllProducts();
				
				if ($getProduct) {
					$i = 0;
					while($result = $getProduct->fetch_assoc()){
					$i++;	
					$getuser = $product->getUserProduct($result['ProductID'],$result['UserID'])->fetch_assoc();	
			?>

				<tr class="odd gradeX">
				
					<td class="tableCenter"> <?= $i; ?> </td>
					<td class="tableCenter"><?= $result['FirstName'].'-'.$result['UserID']; ?> </td>
					<td class="tableCenter"><?= $result['CategoryName'].'-'.$result['ProductCategory']; ?> </td>
					<td class="tableCenter"><?= $result['ProductName']; ?> </td>
					<td class="tableCenter"><?= $format->textShorten($result['Description'], 30); ?> </td>
					<td class="tableCenter"><?= $result['PickupOptions']; ?> </td>
					<td class="tableCenter"><?= $result['Age']; ?> </td>
					<td class="tableCenter"><?= $result['Price']; ?> </td>
					<td class="tableCenter"><?= $result['Status']; ?> </td>
					<td class="tableCenter"><?= $result['ProductCondition']; ?></td>
					<td class="center"> <img src="<?= $result['Image']; ?>" height="40px;" width="60px;"></td>
					<td class="tableCenter"> 

						<!-- Show how many days since the product was uploaded-->
						<?php 
								// Start date (from db)
								$date1 = $result['ProductTime'];
								
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

					<td class="tableCenter"> 
						<a href="?userId=<?= $getuser['UserID']?>&userProduct=<?= $result['ProductID']?>" >Reminder</a> || 
						<a onclick="return confirm('Are You Sure You Want To Delete This Product?')" href="?productId=<?php echo $result['ProductID']; ?>&productName=<?php echo $result['ProductName']; ?>"> Delete</a>
					</td>
				</tr>

				<?php } } ?> 

				
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
