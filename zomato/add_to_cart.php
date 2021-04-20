<?php
	
	require "db_config.php";

	session_start();

	$food_id = $_GET['food_id'];
	$user_id = $_SESSION['user_id'];

	// one user can insert one food item only once in the cart and then increase its quantity in the cart

	$query ="SELECT * FROM cart WHERE food_id LIKE $food_id AND user_id LIKE $user_id";

	$result = mysqli_query($conn,$query);

	if (mysqli_num_rows($result) > 0) {
		echo "This product already exists in your cart";
		exit();
	}

	// insert the values in db otherwise

	$query1 = "INSERT INTO cart VALUES (NULL,$food_id,$user_id,1)";

	if(mysqli_query($conn,$query1)) {
	 	echo "Product added to cart";
	 }else{
	 	echo "Some error occurred!! Please try again.";
	 }

?>