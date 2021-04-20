$(document).ready(function(){

	$('#discount-btn').click(function(){
		$coupon_code = $('#coupon').val();
		$total_before_disc = $('#total_before_disc').text();

		$.ajax({

				url:"apply_coupon.php?coupon_code=" + $coupon_code +"&total_before_disc=" + $total_before_disc ,
				success:function(data){
					$('#applied_disc').text(data);
				}
		});
	});
});