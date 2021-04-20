<?php

	require "db_config.php";

	session_start();

	$coupon_code = $_GET['coupon_code'];
	$total_before_disc = $_GET['total_before_disc'];

	if($coupon_code == 'NONE'){
		echo "No discount applied !!!";
		echo 'Amount to be paid: Rs. '.$total_before_disc;
	}else{

		$query = "SELECT * FROM coupon WHERE coupon_code LIKE '$coupon_code' AND status LIKE 1";

		$result = mysqli_query($conn,$query);

		if (mysqli_num_rows($result) == 0) {
			echo 'This coupon code has expired. Retry!!!';
		}else{
			$fetched_result = mysqli_fetch_assoc($result);

			$cart_min_value = $fetched_result['cart_min_value'];

			if ($total_before_disc < $cart_min_value) {
				echo "Cart total has to be ".$cart_min_value." or above. Retry!!!";
			}else{
				$coupon_type = $fetched_result['coupon_type'];
				$coupon_value = $fetched_result['coupon_value'];
				$total_after_disc = 0;

				if ($coupon_type == 'FLAT OFF') {
					$total_after_disc = $total_before_disc - $coupon_value;
				}else{
					$total_after_disc = $total_before_disc - (($coupon_value/100)*$total_before_disc);
				}

				echo "Discount applied !!!";
				echo 'Amount to be paid: Rs. '.$total_after_disc;

				}
			}
	}

?>