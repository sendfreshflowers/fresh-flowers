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
	
	<title>Best Sellers</title>
<!icon>
<link rel="shortcut icon" href="logo.jpg" type="image/x-icon"/>
	<meta name="description" content="Easily choose from our Best selling gifts and send them right away." />
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
<link rel="stylesheet" type="text/css" href="css/styles_mainpage.css">
<link rel="stylesheet" type="text/css" href="css/styles_services.css">

<!Alert Plugin links>
	<script src="js/alert/lib/sweet-alert.min.js"></script>
	<link rel="stylesheet" href="js/alert/lib/sweet-alert.css">
	
<!Google Fonts API Sablo Link>
	<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
<style type = "text/css">
.social_header{
	top:90px;
}

</style>
	
</head>
<body>
<div>
<! Main Page Header>
<?php include 'inc/header_mainpage_inc.php'; ?>

<div class = "mainbody_wrapper shadow_top">
<h2 class = "text-center" style = "	font-family: 'Slabo 27px', serif;
	padding-top:15px;">Best Sellers</h2>
<hr>

<div class = "container">
	<div class = "row">
<?php
	$location = $_SESSION['location'];
	$query = "SELECT `id`,`name`,`price`,`pic` FROM  `items` WHERE `location` = '$location' ORDER BY `orders` DESC LIMIT 16";
	$sth = $dbh->query($query);
	while ($result = $sth->fetch(PDO::FETCH_ASSOC)){
		
	
// Products Display
$cart_size = sizeof($_SESSION['cart']);
echo '<div class="product_wrapper">
			<div class="thumbnail">';
			echo '<h4 id = "'.$result['id'].'" class = "product_details_display text-center" style = "margin-top:2px;margin-bottom:10px;white-space: nowrap; overflow:hidden; text-overflow: ellipsis; cursor:pointer">'.$result['name'].'</h4>
			<img id = "'.$result['id'].'" class = "product_details_display" src="'.$result['pic'].'" alt="'.$result['name'].'" style = "cursor:pointer;width:228px;height:228px;">
			<p style =  "margin: 10px; margin-top:20px; font-size:16px"><span style = "margin-left:10px;"> &#8377 '.$result['price'].'</span> <span class = "pull-right" style = "margin-top:-5px;">';
			if ($cart_size == 0){
				echo '<button class = "btn btn-success addtocart" id = "addtocart_'.$result['id'].'">Add To Cart';
			} else {
				$found = 0;
			foreach($_SESSION['cart'] as $val){
				if ($result['id'] == $val){
					$found = 1;
					break;
				}
			}
			if ($found == 0){
			echo '<button class = "btn btn-success addtocart" id = "addtocart_'.$result['id'].'">Add To Cart';
			} else if ($found == 1){
				echo '<button class = "btn btn-default disabled addtocart" id = "addtocart_'.$result['id'].'">Added To Cart';
			}
			}
			echo '</button></span></p>';
			echo'</div>
			</div>';
	}
?>
	</div>
</div>
</div>

<!Modal for Product Details>
<div id="myModal" class="modal fade">
        <div class="modal-dialog" style = "width:800px;">
            <div id = "product_details" class="modal-content">
				<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Loading...</h4>
                </div>
               
            </div>
            </div>
        </div>
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