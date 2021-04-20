<?php

	session_start();

	require "db_config.php";

	$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Your Cart</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

</head>
<body>

	<?php include "includes/navbar.php" ; ?>

	<div class="cart-page">
		<div class="cart-advertise-display">
			<img src="img/family_dinner.jpg">
			<h4>Thank you for choosing us!!<br>Visit Again!! <i class="fas fa-praying-hands"></i></h4>
		</div>

		<div class="cart-product-display">
			<h2 class="mt-4 ml-4" style="font-family: 'Cookie', cursive;font-size: 3.4rem;text-decoration: underline;margin-bottom: 40px;"> My Cart</h2>

			<span id="no-item-in-cart" class="mt-4 mb-5 ml-5 text-center text-danger" style="display: inline-block;font-family: 'Zen Dots', cursive;font-size: 1.4rem;"></span>

			<table class="table w-auto ml-5">
					<thead class="thead-dark" style="text-align: center;">
						<tr>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price (INR)</th>
						</tr>
					</thead>

					<tbody style="text-align: center;">


						<?php

							$query = "SELECT c.id,f.name,f.price,c.quantity FROM cart c INNER JOIN food f
							ON c.food_id = f.id
							WHERE c.user_id = $user_id";

							$result = mysqli_query($conn,$query);

							$total=0;

							while ($row = mysqli_fetch_assoc($result)) {

								$total = $total + ($row['price']*$row['quantity']);

								echo '<tr id="item-in-cart'.$row['id'].'" class="dishes">
											<td>'.$row['name'].'</td>
											<td>
												<div class="quantity-div">
													<button data-id='.$row['id'].' class="btn btn-sm btn-outline-danger mr-3 sub">
														<i class="fas fa-minus"></i>
													</button>
													<span id="quantity_number'.$row['id'].'" style="padding-top: 3px;">'.$row['quantity'].'</span>
													<button data-id='.$row['id'].' class="btn btn-sm btn-outline-success ml-3 add">
														<i class="fas fa-plus"></i>
													</button>
												</div>
											</td>
											<td><span id="price'.$row['id'].'">'.$row['price']*$row['quantity'].'</span></td>
										</tr>';
							}

						?>
					</tbody>
			</table>

			<div class="total-line"></div>
			<div class="cart-total">
				<h3>Cart Total : <span style="font-family: 'Acme', sans-serif;font-size: 2.5rem;">Rs. <span id="cart-value"> <?php  echo $total; ?> </span></span></h3>

				
				<a href="place_order.php" id="checkout_btn" class="btn btn-warning btn-lg">Proceed to Checkout</a>

			</div>


			
		</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/cart.js"></script>
	<script type="text/javascript" src="js/cart_button.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


