$(document).ready(function(){
	$('#add-proceed').click(function(){

		$address = $('#new_address').val();
		$city = $('#city').val();
		$pincode = $('#pincode').val();

		$order_id = $('#order_id').val();


		$.ajax({
			url:"add_address.php?address=" + $address + "&city=" + $city + "&pin=" + $pincode + "&order_id=" + $order_id
			

		})
	});
});