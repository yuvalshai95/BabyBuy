<?php
    require_once '../PHPMailer/PHPMailer.php';
    require_once '../PHPMailer/SMTP.php';
    require_once '../PHPMailer/Exception.php';
    require_once 'functions.inc.php';

    // Form user inputs
    $name = $_POST['name'];
    $userEmail = $_POST['email'];
    $message = $_POST['message'];

    //Error handling
    if(empty($name) || empty($userEmail) || empty($message)){

        header('location: ../contact.php?error=empty');
        exit();
    }

    //valid name
    else if(invalidUserFirstName($name)){

        header('location: ../contact.php?error=name');
        exit();
    }

    //valid email
    else if(invalidUserEmail($userEmail)){
        header('location: ../contact.php?error=mail');
        exit();
    }

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
    $mail->Subject = "New Form Submission From :".$userEmail;

    //Enable HTML
	$mail->isHTML(true);

    // Set sender email
    $mail->setFrom("babybuyservice@gmail.com");

    // email body
    $mail->Body = 'User Name: '.$name.'<br/>'.'User Email: '.$userEmail.'<br/>'.'User Message: '.$message;

	// Add recipient 
	$mail->addAddress("babybuyservice@gmail.com");

	// Finally send email
	$mail->Send();

	// Closing smtp connection
	$mail->smtpClose();

    header('location: ../contact.php?error=none');
    
    

    
