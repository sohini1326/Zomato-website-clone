<?php

	session_start();

	require "db_config.php";

	if (!empty($_GET)) {
		// get the order id from the previous page
		$order_id = $_GET['order_id'];

		$user_id = $_SESSION['user_id'];
	}else{
		die('INVALID URL');
	}


	//$cart_value_at_checkout = $_GET['cart_total'];

	$cart_value_at_checkout = 0;

	$query = "SELECT * FROM cart c INNER JOIN food f ON c.food_id = f.id WHERE user_id = $user_id";

	$result = mysqli_query($conn,$query);

	while ($row = mysqli_fetch_assoc($result)) {
		$cart_value_at_checkout += $row['quantity'] * $row['price'] ;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Checkout Page</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

</head>
<body>

	<?php include "includes/navbar.php" ; ?>

	<div class="checkout-page">

		<div class="checkout-page-left">
			<div class="apply-coupon">
				<h3>Cart Subtotal : Rs. <span id="total_before_disc"><?php echo $cart_value_at_checkout; ?></span></h3>

				<p><i>Select a coupon to avail the discount...</i><i class="fas fa-tags"></i></p>

				<form id="discount-form">

					<label style="font-family: 'Courgette', cursive;font-size: 1.6rem;" for="coupon">Choose a coupon:</label>
					<select name="coupon" id="coupon">
						<option value="NONE">NONE</option>
					    <option value="MAX50">MAX50</option>
					    <option value="15PER">15PER</option>
					    <option value="CELBRT150">CELBRT150</option>
					    <option value="GRAB25">GRAB25</option>
					</select>
					<br><br>
				</form>

				<button type="button" id="discount-btn">APPLY</button>
				<h4 id="applied_disc"></h4>

			</div>
		</div>

		<div class="checkout-page-right">
			<div class="select-coupon">

				<?php

					require "db_config.php";

					$query = "SELECT * FROM coupon";

					$result = mysqli_query($conn,$query);

					while ($row = mysqli_fetch_assoc($result)) {
						if ($row['coupon_type'] == 'FLAT OFF') {
							echo '<div class="coupon-details">
									<h4>'.$row['coupon_code'].'</h4>
									<div class="details">
										<h3 class="text-danger">'.$row['coupon_type'].'</h3>
										<h2>Rs. '.$row['coupon_value'].'  ( <span class="text-secondary" id="min-cart-val">Minimum Cart Value : Rs. '.$row['cart_min_value'].'</span> )</h2>
									</div>
							</div>';
						}else{
							echo '<div class="coupon-details">
									<h4>'.$row['coupon_code'].'</h4>
									<div class="details">
										<h3 class="text-danger">'.$row['coupon_type'].'</h3>
										<h2>'.$row['coupon_value'].' %  ( <span class="text-secondary" id="min-cart-val">Minimum Cart Value : Rs. '.$row['cart_min_value'].'</span> )</h2>
									</div>
							</div>';
						}
						
					}

				?>
				
			</div>

			<!-- so that we can retrieve the value of order id on the next page -->
			<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" id="order_id">

			<a href="select_address.php?order_id=<?php echo $order_id; ?>" class="btn btn-secondary btn-lg" style="float: right;margin-top: 25px;margin-right: 65px;" id="go-to-address-page">Proceed</a>
		</div>

	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/coupon.js"></script>
	<script type="text/javascript" src="js/final_coupon.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


