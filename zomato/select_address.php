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
	<title>Select ADDRESS</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Caveat&family=Courgette&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

</head>
<body>

	<?php include "includes/navbar.php" ; ?>

	<h3 style="font-family: 'Satisfy', cursive;font-size: 3rem;" class="mt-4 text-center"><i style="margin-right: 15px;" class="fas fa-map-marker-alt"></i>  Deliver to: </h3>

	<div class="address-page container mt-4">

		<div class="address-inputs">
			<textarea id="new_address" rows="5" cols="50" style="border-radius: 15px;">Type in your address here...</textarea>
			<label for="city">City</label>
			<input type="text" name="" id="city" placeholder="City e.g. Kolkata">
			<label for="pincode">Pincode</label>
			<input type="text" name="" id="pincode" placeholder="Pin e.g. 700001">

			<!-- so that we can retrieve the value of order id on the next page -->
			<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" id="order_id">

			<a href="payment_options.php?order_id=<?php echo $order_id; ?>" class="btn btn-warning" style="margin-top: 30px;border-radius: 15px;" id="add-proceed">
				Add and Proceed
			</a>
		</div>

		<div class="address-selection">
			<h3 style="font-family: 'Courgette', cursive;font-size: 2rem;margin-bottom: 30px;">Select one from: </h3>

			<form action="choose_address.php" method="POST">

				<?php

					require "db_config.php";

					$user_id = $_SESSION['user_id'];

					$query = "SELECT * FROM address WHERE user_id LIKE $user_id";

					$result = mysqli_query($conn,$query);

					if(mysqli_num_rows($result) == 0){
						echo '<h4 class="text-center mt-5">No saved address...Kindly add one for your order to be delivered.</h4>';
					}

					while ($row = mysqli_fetch_assoc($result)) {
						echo '<div class="individual-addresses" style="margin-bottom: 8px;">
								<input type="radio" name="x" value="'.$row['id'].'"><span class="indiv-add">'.$row['address'].',<br>'.$row['city'].','.$row['pin'].'</span>
							</div>';
					}

				?>

				<!-- so that we can retrieve the value of order id on the next page -->
				<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" id="order_id">
				
				<input type="submit" class="btn btn-secondary btn-block" id="select-proceed" value="Select and Proceed">
				
			</form>
		</div>

	</div>

	

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/address.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>