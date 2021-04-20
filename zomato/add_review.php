<?php

	require "db_config.php";

	session_start();

	$user_id = $_SESSION['user_id'];
	$restaurant_id = $_GET['restaurant_id'];

	$review_tag = $_POST['review_tag'];
	$review_desc = $_POST['review_desc'];
	$star_rating = $_POST['star_rating'];

	date_default_timezone_set("Asia/Kolkata");
	$review_date = date("Y/m/d h:i:sa");

	$query = "SELECT * FROM review WHERE user_id=$user_id AND restaurant_id=$restaurant_id";

	$result = mysqli_query($conn,$query);

	if (mysqli_num_rows($result)>0) {
		header('Location:restaurant.php?id='.$restaurant_id);
	}else{
		$query1 = "INSERT INTO review VALUES(NULL,$user_id,$restaurant_id,'$review_tag','$review_desc',
					'$review_date',$star_rating)";

		if(mysqli_query($conn,$query1)){
			header('Location:restaurant.php?id='.$restaurant_id);
		}else{
			echo "Some issue occurred!!!";
		}
	}


?>