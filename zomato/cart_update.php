<?php
	
	require "db_config.php";

	session_start();

	$item_id = $_GET['item_id'];
	$new_quantity = $_GET['quantity'];
	$user_id = $_SESSION['user_id'];

	// update the increased quantity in the db

	$query ="UPDATE cart SET quantity=$new_quantity WHERE id LIKE $item_id AND user_id LIKE $user_id";

	if(mysqli_query($conn,$query)) {
	 	echo "1";
	 }else{
	 	echo "-1";
	 }

?>