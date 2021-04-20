$(document).ready(function(){


	$cart_total = Number($('#cart-value').text());

	if ($cart_total === 0) {
		$('#checkout_btn').addClass('checkout-btn-disable');
		$('#no-item-in-cart').text("It's sad!! Nothing in the cart to proceed.Add something to grab exciting offers..");
		
	}
})