
// we need to write an ajax call of jquery so that the particular item gets added to the cart table in the db 
//at backend, without refreshing the page

$(document).ready(function(){
	$('.add_the_food').click(function(){
		var food_id = $(this).data('id');
		$.ajax({
			url:"add_to_cart.php?food_id="+food_id,
			success:function(data){
				alert(data);
			}
		});
	});
});