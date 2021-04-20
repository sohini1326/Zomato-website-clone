<?php

	session_start();

	// get the order id from the previous page
	if (!empty($_GET)) {
		$order_id = $_GET['order_id'];
	}else{
		die('INVALID URL');
	}
	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Make your PAYMENT</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Satisfy&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

</head>
<body>

	<?php include "includes/navbar.php" ; ?>

	<div class="payment-page">
		<h3 style="font-family: 'Permanent Marker', cursive;font-size: 2.3rem;margin-bottom: 22px;">Mode of Payment :</h3>

		<form action="choose_pay_options.php" method="POST">
			
			<div class="modes">
				<input type="radio" name="x" value="credit card"><i class="bold">Credit Card </i><i class="icon fas fa-credit-card"></i><hr>
				<input type="radio" name="x" value="debit card"><i class="bold">Debit Card </i><i class="icon fab fa-cc-visa"></i><hr>
				<input type="radio" name="x" value="UPI"><i class="bold">UPI </i><i class="icon fab fa-cc-paypal"></i><hr>
				<input type="radio" name="x" value="Amazon pay"><i class="bold">Amazon Pay </i><i class="icon fab fa-cc-amazon-pay"></i><hr>
				<input type="radio" name="x" value="Net Banking"><i class="bold">Net Banking </i><i class="icon fas fa-money-check-alt"></i><hr>
				<input type="radio" name="x" value="COD"><i class="bold">Cash on Delivery </i><i class="icon fas fa-wallet"></i><hr>
			</div>

			<!-- so that we can retrieve the value of order id on the next page -->
			<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" id="order_id">
			
			<input type="submit" class="btn btn-primary btn-block" value="Place Order">

		</form>
	</div>
		

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/app.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


