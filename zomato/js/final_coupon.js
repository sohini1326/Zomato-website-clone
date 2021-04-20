$(document).ready(function(){

	$('#go-to-address-page').click(function(){

		$final_coupon_code = $('#coupon').val();
		$order_id = $('#order_id').val();

		$.ajax({
			url:"final_coupon.php?coupon="+$final_coupon_code+"&order_id="+$order_id
		});
	});
});