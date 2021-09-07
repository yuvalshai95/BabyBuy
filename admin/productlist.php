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
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reminder'])){
		$userDetails = $product->getUserProduct($_POST['userProduct'],$_POST['userId'])->fetch_assoc();
		$userEmail = $userDetails['UserEmail'];

		// Changing product "Days" counter from productlist page table to 0  
		$product->updateProductDate($_POST['userId'],$_POST['userProduct']);

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
		$userDetails['LastName']=" ";
		// User email was not received by POST method
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
    //$mail->Body = file_get_contents('../PHPMailer/EmailContent/body.php');
	$mail->Body =  $mail->Body = '<!DOCTYPE html>
								<html lang="en"	 xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
								<head>
								<meta charset="UTF-8">
								<meta name="viewport" content="width=device-width,initial-scale=1">
								<meta name="x-apple-disable-message-reformatting">
								<title></title>
								
								<style>
								table, td, div, h1, p {font-family: Arial, sans-serif;}
								</style>
								</head>
								<body style="margin:0;padding:0;">
								<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
								<tr>
								<td align="center" style="padding:0;">
								<table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
									<tr>
									<td align="center" style="padding:40px 0 30px 0;background:orange;">
										<img src="https://assets.codepen.io/210284/h1.png" alt="" width="300" style="height:auto;display:block;" />
									</td>
									</tr>
									<tr>
									<td style="padding:36px 30px 42px 30px;">
										<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
										<tr>
											<td style="padding:0 0 36px 0;color:#153643;">
											<h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Creating Email Magic '.$userDetails['LastName'].'</h1>
											<p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan et dictum, nisi libero ultricies ipsum, posuere neque at erat.</p>
											
											</td>
										</tr>
										
										</table>
									</td>
									</tr>
									
									
									
									<tr>
							<td style="padding:30px;background:#ee4c50;">
							<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
							<tr>
							<td style="padding:0;width:50%;" align="left">
								<p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
								&reg; Someone, Somewhere 2021<br/>
							</td>
							<td style="padding:0;width:50%;" align="right">
								<table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
								<tr>
									<td style="padding:0 0 0 10px;width:38px;">
									<a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
									</td>
									<td style="padding:0 0 0 10px;width:38px;">
									<a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
									</td>
								</tr>
								</table>
							</td>
							</tr>
							</table>
							</td>
							</tr>  ';

   
	// Add recipient 
	$mail->addAddress($userEmail);

	// Finally send email
	$mail->Send();

	// Closing smtp connection
	$mail->smtpClose();

?>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
		$idToDelete = $_POST['productId'];
		$productName = $_POST['productName'];
		$deleteProduct = $product->deleteProductById($idToDelete,$productName);
	}
?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>

		<!-- delete message when product is deleted -->
		<div style="margin-top: 2em;">	
		<?php 
			// Printing the deleted product success message 
			if(isset($deleteProduct)){
				echo $deleteProduct;
			}
		?>
		</div>
		

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
					<th>Reminder</th>
					<th>Delete</th>
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
					<td class="center"> <img style="width: 60px; height:60px;" src="<?php  
                            $img = $product->getSingleImagesByProductId($result['ProductID'])->fetch_assoc(); 
                            $single = $img['ImagePath']; 
                            $single = str_replace('../admin/','',$single); 
                            echo $single ?>""></td>
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
					<!-- Reminder BTN POST method-->
					<form action="" method="POST">
						<input type="hidden" name="userId" value="<?= $getuser['UserID']?>">
						<input type="hidden" name="userProduct" value="<?= $result['ProductID']?>">
						<input type="submit" name="reminder" Value="Reminder" class="btn btn-green"/>
					</form>

					</td>
					<td class="tableCenter">
						 <form action="" method="POST">
							<input type="hidden" name="productId" value="<?php echo $result['ProductID']; ?>">
							<input type="hidden" name="productName" value="<?php echo $result['ProductName']; ?>">
							<input onclick="return confirm('Are You Sure You Want To Delete This Product?')" type="submit" name="delete" Value="Delete" class="btn btn-red"/>
						 </form>
						 
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
