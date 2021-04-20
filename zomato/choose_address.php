<?php

	session_start();

	require "db_config.php";

	$address_id = $_POST['x'];
	$order_id = $_POST['order_id'];

	$query = "UPDATE order_track SET address=$address_id WHERE id LIKE '$order_id'";

	if (mysqli_query($conn,$query)) {
		header('Location:payment_options.php?order_id='.$order_id);
	}else{
		echo "Some issue occurred!!";
	}

?>