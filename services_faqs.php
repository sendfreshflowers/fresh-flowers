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
	
	<title>Frequently Asked Questions</title>
<!icon>
<link rel="shortcut icon" href="logo.jpg" type="image/x-icon"/>
	<meta name = "description" content = "Get all your questions answered before you place your order.">
	<meta name="keywords" content="help, customer care, faqs, send fresh flowers india" />
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

<div class = "mainbody_wrapper shadow_top" style = "height:550px;">
<div class = "body_banner">
<img src = "pics/faqs.jpg" alt = "Faqs"></img>
</div>
<div class = "body_content">
	<h4 class = "text-center" style = "padding-top:10px;">FAQs !</h4>


<!Accordion for FAQs>


    <div id="accordion" class="panel-group" style = "width:80%;margin:auto;">
		<hr>
        <div class="panel panel-default">

            <div class="panel-heading">

                <h4 class="panel-title">

                    <a data-toggle="collapse" data-parent="#accordion" href="#locations">1. What Locations do you serve?</a>

                </h4>

            </div>

            <div id="locations" class="panel-collapse collapse in">

                <div class="panel-body">

                    <p>Currently we are serving in Coimbatore. We will be opening in other cities shortly.</p>

                </div>

            </div>

        </div>

        <div class="panel panel-default">

            <div class="panel-heading">

                <h4 class="panel-title">

                    <a data-toggle="collapse" data-parent="#accordion" href="#timeofdelivery">2. What time of the day will the delivery be done?</a>

                </h4>

            </div>

            <div id="timeofdelivery" class="panel-collapse collapse">

                <div class="panel-body">

                    <p>We deliver throughout the day. You will be requested to enter your preferred time slot while placing order. We will try our best to deliver during that time slot.</p>

                </div>

            </div>

        </div>

        <div class="panel panel-default">

            <div class="panel-heading">

                <h4 class="panel-title">

                    <a data-toggle="collapse" data-parent="#accordion" href="#addresschange">3. Can I change the delivery address or time slot?</a>

                </h4>

            </div>

            <div id="addresschange" class="panel-collapse collapse">

                <div class="panel-body">

                    <p>Yes you can! Kindly get in touch with us through our <a href = "services_contactus.php">Customer Care</a> and let us know!</p>

                </div>

            </div>

        </div>       

		<div class="panel panel-default">

            <div class="panel-heading">

                <h4 class="panel-title">

                    <a data-toggle="collapse" data-parent="#accordion" href="#cancellation">4. What are order cancellation charges?</a>

                </h4>

            </div>

            <div id="cancellation" class="panel-collapse collapse">

                <div class="panel-body">

                    <p>You can cancel your order till one day before the delivery date. Cancellation charge of 10% will be applicable.</p>
					<p>However, if you wish to change date of delivery or address of delivery, kindly contact our <a href = "services_contactus.php">Customer Care</a></p>

                </div>

            </div>

        </div>        
		
		<div class="panel panel-default">

            <div class="panel-heading">

                <h4 class="panel-title">

                    <a data-toggle="collapse" data-parent="#accordion" href="#bulkorders">5. Do you handle bulk orders?</a>

                </h4>

            </div>

            <div id="bulkorders" class="panel-collapse collapse">

                <div class="panel-body">

                    <p>Yes we Do! Kindly get in touch with us through our <a href = "services_contactus.php">customer care</a> and we will serve you!</p>

                </div>

            </div>

        </div> 
		<div class="panel panel-default">

            <div class="panel-heading">

                <h4 class="panel-title">

                    <a data-toggle="collapse" data-parent="#accordion" href="#customgift">6. I want to give a gift of my choice, not in your catalogue. Can you do that?</a>

                </h4>

            </div>

            <div id="customgift" class="panel-collapse collapse">

                <div class="panel-body">

                    <p>Yes! Kindly get in touch with us through our <a href = "services_contactus.php">customer care</a> and we will handle your order.</p>

                </div>

            </div>

        </div>
		<div class="panel panel-default">

            <div class="panel-heading">

                <h4 class="panel-title">

                    <a data-toggle="collapse" data-parent="#accordion" href="#corporate">7. Do you serve corporate entities?</a>

                </h4>

            </div>

            <div id="corporate" class="panel-collapse collapse">

                <div class="panel-body">

                    <p>Yes! Whether you are an organisation conducting an event, or event organizers, we provide fresh flowers for the occassion. </p>
					<p>Get in touch with us through our <a href = "services_contactus.php">customer care</a> and we will take your order.</p>

                </div>

            </div>

        </div>

    </div>


	
</div>
<!ending div of body content above>


</div>
<!footer>
<footer>

	<div class="footer-bottom">
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