<?php
include 'inc/core_inc.php';
//Cart Management
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
	$_SESSION['quantity'] = array();
	$_SESSION['cart_price'] = 0;
}
	if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['human']) && !empty($_POST['name']) &&!empty($_POST['email']) && !empty($_POST['message']) && !empty($_POST['human'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'From: Contact Form <no-reply@sendfreshflowers.co.in>' . "\r\n"; 
		$to = 'care@sendfreshflowers.co.in'; 
		$subject = 'Message from Contact Form';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}

// If there are no errors, send the email
 if (!isset($errName) && !isset($errEmail) && !isset($errMessage) && !isset($errHuman)) {
	if (mail ($to, $subject, $body, $from)) {
		$res='<p class="text-success">Thank You for the message! We Will get back to you shortly.</div>';
	} else {
		$res='<p class="text-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
} 
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<title>Feedback</title>
<!icon>
<link rel="shortcut icon" href="logo.jpg" type="image/x-icon"/>
	<meta name = "description" content = "We value your feedback. Kindly feel free to write to us on any improvements/grievances.">
	<meta name="keywords" content="contact us,rate, review, send fresh flowers india" />
<!Css Reset>
	<link rel="stylesheet" type="text/css" href="css/cssreset.css">
	
<! Bootstrap Css links>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">

<!Select Css link>
	<link rel="stylesheet" type="text/css" href="select_master/dist/css/bootstrap-select.min.css">
<!font-awesome link>
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">

<!Custom style sheet>
<!link rel="stylesheet" type="text/css" href="css/styles_mainpage.css">
<link rel="stylesheet" type="text/css" href="css/styles_services.css">

<!Alert Plugin links>
	<script src="js/alert/lib/sweet-alert.min.js"></script>
	<link rel="stylesheet" href="js/alert/lib/sweet-alert.css">
</head>
<body>
<div>
<! Main Page Header>
<?php include 'inc/header_mainpage_inc.php'; ?>

<div class = "mainbody_wrapper shadow_top">
<div class = "body_banner">
<img src = "pics/feedback.jpg" alt = "Feedback"></img>
</div>
<div class = "body_content">
<div class = "form_wrapper" style = "width:70%;">
<h3 class = "text-center" style = "margin-top:-10px; margin-bottom:-10px;">Feedback</h3>
<hr>
<!Feedback Form>

<div class="container">
  		<div class="row">
  			<div>
				<form class="form-horizontal" role="form" method="post" action="<?php $current_file;?>">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label text-left">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" required>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label text-left">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" required>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label text-left">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="human" class="col-sm-2 control-label text-left">2 + 3 = ?</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer" required>
							<?php if (isset($errHuman)) echo "<p class='text-danger'>$errHuman</p>";?>
							<?php if (isset($res)) echo $res;?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-6">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>
					</div>
				</form> 
			</div>
		</div>
	</div>


</div>
</div>

</div>
<!footer>
<footer>

	<div class="footer-bottom" style = "position:absolute; bottom:0px;">
        <div class="container">
            <p class="pull-left"> Copyright © Send Fresh Flowers. All right reserved. </p>
            <div class="pull-right">
                <ul class="nav nav-pills payments">
                	<li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                    <li><i class="fa fa-cc-paypal"></i></li>
                </ul> 
            </div>
        </div>
    </div>
</footer>
<! Jquery Link>
    <script src="js/jquery.js"></script>
<! Bootstrap jscript Link>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="js/mainsite_jscript.js"></script>
<!Select Js link>
<script src="select_master/dist/js/bootstrap-select.js"></script>

</body>
</html>