<?php include_once '../classes/Admin.php'; ?>

<?php 
$admin = new Admin(); 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$adminEmail = $_POST['Email'];
	$adminPass = $_POST['UserPassword'];
	$loginCheck = $admin->checkLoginInfo($adminEmail,$adminPass);
}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">


		<form action="" method="post">
			<h1>Admin Login</h1>

			<span style="color:red; font-size: 18px;"> 
			<?php
				if (isset($loginCheck)) {
					echo $loginCheck;
				}
			?>
		</span>


			<div>
				<input type="text" placeholder="Email" name="Email"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="UserPassword"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->

		<div class="button">

			<a href="#">Yuval & Adi Project</a>
		</div><!-- button -->

	</section><!-- content -->

</div><!-- container -->
</body>
</html>