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
	
	<title>Track Order</title>
<!icon>
<link rel="shortcut icon" href="logo.jpg" type="image/x-icon"/>
	<meta name = "description" content = "Know the status of your orders and payments easily">
	<meta name="keywords" content="track order,delivery status, order status, send fresh flowers india" />
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
	

	<div class = "body_content">
<?php 
if (isset($_POST['emailInput']) && isset($_POST['phoneInput']) && !empty($_POST['emailInput']) && !empty($_POST['phoneInput'])){
	$_SESSION['trackemail'] = $_POST['emailInput'];
	$_SESSION['trackphone'] = $_POST['phoneInput'];
	$query = "SELECT `id`,`ordertime`, `totalcost`, `paymentstatus`, `delivery` FROM `orders` WHERE `emailofsender` = :email AND `phoneofsender` = :phone";
	$sth = $dbh->prepare($query);
	$sth->bindParam(':email',$_POST['emailInput'],PDO::PARAM_STR);
	$sth->bindParam(':phone',$_POST['phoneInput'],PDO::PARAM_STR);
	$sth->execute();
	if($sth->rowCount() == 0){
		$_SESSION['track_error'] = "No Orders Found from the above user!";
		header('Location: services_trackorder.php');
	} else {
?>
<div class = "orders_display">
<table class = "table table-hover">
	<caption class = "text-center" style = "font-size:16px;">Order Details</caption>
	<thead>
		<tr class = "active">
			<th>Order Id</th>	
			<th>Order Date</th>	
			<th>Product Name</th>	
			<th>Price</th>	
			<th>Order Status</th>	
			<th>Delivery</th>	
		</tr>
	</thead>
	<tbody>
<?php
		while ($result = $sth->fetch(PDO::FETCH_ASSOC)){
		$order_id = $result['id'];
?>
		<tr class = "<?php if ($result['delivery'] == 1) echo 'success'; else if ($result['paymentstatus'] == 0) echo 'danger'; else if ($result['delivery'] == 0) echo 'info'; ?>">
			<td><?php echo '#CMB20150'.$order_id; ?></td>
			<td><?php 
			$phpdate = strtotime($result['ordertime']);
			$mysqldate = date( 'M j, Y', $phpdate );
			echo $mysqldate; ?></td>
			<td><?php 
				$query1 = "SELECT `item_id` FROM `order_details` WHERE `order_id` = '$order_id'";
				$sth1 = $dbh->query($query1);
				$count = $sth1->rowCount();
				while ($result1 = $sth1->fetch(PDO::FETCH_ASSOC)){
					echo getfield('items','name','id',$result1['item_id']);
					if ($count-- > 1) echo ' & <br>';
					
				}
				
			?></td>
			<td><?php echo '<span> &#8377 </span>'.$result['totalcost']; ?></td>
			<td><?php if ($result['paymentstatus'] == 0){
				echo 'Payment Failed!';
			} else {
				echo 'Order Placed';
			} ?></td>
			<td><?php if ($result['paymentstatus'] == 0) echo 'Cancelled.'; else if ($result['delivery'] == 1) echo 'Delivered.'; else if ($result['delivery'] == 0) echo 'Pending';?></td>
		</tr>
	
<?php
		}
?>
	</tbody>
	</table>
	</div>
	<div>
	<p style = "padding:0px 40px;text-align:center;">For changes/cancellations, please view our <a href = "services_faqs.php">Cancellation Policy</a> and contact our <a href = "services_contactus.php">Customer Care</a>. </p>
	</div>
	
<?php	
	}
	
} else {
	
?>
		<h4 class = "text-center" style = "margin:20px auto;">Please fill the following details to know your order status</h4>
		<hr>
		<!Form to Get data of user to track his order>
		<div class = "form_wrapper" style = "margin-top:30px;">
		<div class = "container">
		<div class = "row">
		<form class="form-horizontal" action = "<?php echo $current_file; ?>" method = "POST">
		<div class="form-group" style = "padding-bottom:10px;">

            <label class="control-label col-xs-3" style = "text-align:left" for="recipientName">Email Id :</label>

            <div class="col-xs-9">

            <input type="text" class="form-control" id="name_recipient" name = "emailInput" placeholder="Email Id"
<?php
			if (isset($_SESSION['trackemail'])){
				echo ' value = "'.$_SESSION['trackemail'].'" ';
			}
?>
			required>

            </div>

        </div>
		<div class="form-group" style = "padding-bottom:10px;">

            <label class="control-label col-xs-3" style = "text-align:left" for="recipientName">Phone No. :</label>

            <div class="col-xs-9">

            <input type="text" class="form-control" id="name_recipient" name = "phoneInput" placeholder="Phone Number"
<?php
			if (isset($_SESSION['trackphone'])){
				echo ' value = "'.$_SESSION['trackphone'].'" ';
			} else {
				echo ' value = "+91 "';
			}
?> required>
			<span class = "help-block">Enter along with country code. E.g. +91 7730******</span>
            </div>

        </div>
		<div class="form-group">
            <div class="col-xs-offset-4 col-xs-8" style = "margin-bottom:90px;">
                <button type="submit" class="btn btn-primary">Track</button>
			<?php
				if (isset($_SESSION['track_error']) & !empty($_SESSION['track_error'])){
				echo '<p class="text-danger" style = "margin-left:-80px;margin-top:20px">'.$_SESSION['track_error'].'</p>';
				}
				unset($_SESSION['track_error']);
			?>
            </div>
        </div>
		</form>
		
	</div>
	</div>
	</div>
	<?php }?>
	</div>
<div class = "body_banner">
	<img style = "border-radius:0px 10px 0px 0px" src = "pics/trackorder.jpg"></img>
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