<?php
	
	require "db_config.php";

	session_start();

	$item_id = $_GET['item_id'];
	$user_id = $_SESSION['user_id'];


	$query ="DELETE FROM cart WHERE id LIKE $item_id AND user_id LIKE $user_id";

	if(mysqli_query($conn,$query)) {
	 	echo "1";
	 }else{
	 	echo "-1";
	 }

?>