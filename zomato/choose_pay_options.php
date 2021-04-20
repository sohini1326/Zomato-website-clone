<?php

	session_start();

	require "db_config.php";

	$user_id = $_SESSION['user_id'];

	$pay_mode = $_POST['x'];
	$order_id = $_POST['order_id'];

	$query = "UPDATE order_track SET payment_mode='$pay_mode',payment_status='Paid',order_status='Purchased' WHERE id LIKE '$order_id'";

	if (mysqli_query($conn,$query)) {

		$query1 = "DELETE FROM cart WHERE user_id=$user_id";

		if (mysqli_query($conn,$query1)){
			header('Location:payment_response.php?order_id='.$order_id);
		}else{
			echo "Couldn't place the order.";
		}
		
	}else{
		echo "Some issue occurred!!";
	}

?>