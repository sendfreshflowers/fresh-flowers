<?php
include 'inc/core_inc.php';
//Cart Management
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
	$_SESSION['quantity'] = array();
	$_SESSION['cart_price'] = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<title>We Care</title>
<!icon>
<link rel="shortcut icon" href="logo.jpg" type="image/x-icon"/>
	<meta name = "description" content = "We are readily available for you 24x7. Email: care@sendfreshflowers.co.in">
<!Css Reset>
	<meta name="keywords" content="contact us,help, customer care, send fresh flowers india" />
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
<img src = "pics/contactus.jpg" alt = "Contact Us"></img>
</div>
<div class = "body_content">
<div class = "form_wrapper">
<h4 class = "text-center">Contact Us</h4>
<hr>
<p style = "margin-top:20px;font-size:16px;padding-top:10px;">Call us on:</p>
<p style = "margin-left:130px;font-size:15px;">+91 8185985626</p>
<p style = "font-size:16px;padding-top:10px;">Mail us:</p>
<p style = "margin-left:130px;font-size:15px;"><a href = "services_feedback.php">care@sendfreshflowers.co.in</a></p>
<p style = "margin-left:130px;font-size:15px;"><a href = "services_feedback.php">care.sendfreshflowers@gmail.com</a></p>
<p style = "font-size:16px;padding-top:10px;">Follow us on:</p>
<!Social Buttons>
	<div class = "social_contactus">
	                    <ul class="list-inline">
                        <li><a href="#"><i class=" fa fa-facebook" style = "color:#3b5998"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" style = "color: #00ACED"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" style = "color:#D14836"></i></a></li>
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
</div>
<! Jquery Link>
    <script src="js/jquery.js"></script>
<! Bootstrap jscript Link>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="js/mainsite_jscript.js"></script>
<!Select Js link>
<script src="select_master/dist/js/bootstrap-select.js"></script>

</body>
</html>