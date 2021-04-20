<?php

	require "db_config.php";

	session_start();

	// insert into order_track table in db


	$order_id = uniqid();
	$user_id = $_SESSION['user_id'];

	date_default_timezone_set("Asia/Kolkata");
	$order_date = date("Y/m/d h:i:sa");

	$total = 0;

	$query = "SELECT * FROM cart c INNER JOIN food f ON c.food_id = f.id WHERE user_id = $user_id";

	$result = mysqli_query($conn,$query);

	while ($row = mysqli_fetch_assoc($result)) {
		$total += $row['quantity'] * $row['price'] ;
	}


	// query to insert into the table

	$query1 = "INSERT INTO `order_track` (`id`, `user_id`, `order_date`, `order_total`, `coupon`, `address`, `payment_mode`, `payment_status`, `order_status`) VALUES ('$order_id', '$user_id', '$order_date', '$total', '\"\"', '0', '\'\'', 'Pending', 'Not purchased');";

	if(mysqli_query($conn,$query1)){

		// populate the order_details table with the food_items ordered

		$result1 = mysqli_query($conn,$query);
		
		while ($row1 = mysqli_fetch_assoc($result1)) {

			$food_id = $row1['food_id'];
			$quantity = $row1['quantity'] ;


			$query2 = "INSERT INTO order_details VALUES(NULL,'$order_id',$food_id,$quantity)";

			mysqli_query($conn,$query2);
		}

		// redirect to coupons page
		header('Location:checkout.php?order_id='.$order_id);

	}else{
		echo "Order not placed";
	}
?>