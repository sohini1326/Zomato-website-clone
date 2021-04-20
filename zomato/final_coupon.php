<?php

	require "db_config.php";

	session_start();

	$final_coupon_code = $_GET['coupon'];
	$order_id = $_GET['order_id'];

	$query = "UPDATE order_track SET coupon='$final_coupon_code' WHERE id LIKE '$order_id'";

	if (mysqli_query($conn , $query)) {
		echo "Updated";
	}else{
		echo "Issue";
	}

?>