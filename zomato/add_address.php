<?php

	session_start();

	require "db_config.php";

	$user_id = $_SESSION['user_id'];
	$order_id = $_GET['order_id'];

	$address = $_GET['address'];
	$city = $_GET['city'];
	$pincode = $_GET['pin'];


	$query = "INSERT INTO address VALUES(NULL,$user_id,'$address','$city',$pincode)";

	if(mysqli_query($conn,$query)){

		// we need the id of the last inserted address to populate the order_track table
		$last_id = mysqli_insert_id($conn);

		$query1 = "UPDATE order_track SET address=$last_id WHERE id LIKE '$order_id'";

		mysqli_query($conn,$query1);
			
	}else{
		echo "-1";
	}

?>