// when an item is added to the cart, all the further functions are handled through this

$(document).ready(function(){

	var id,current_quantity,new_quantity,current_price,new_price,base_value,total;

	// SUB BUTTONS

	$('.sub').click(function(){

		id = $(this).data('id');


		// reduce the quantity
		current_quantity = Number($('#quantity_number' + id).text());

		// price change
		current_price = Number($('#price' + id).text());
		base_value = current_price/current_quantity;
		new_price = current_price - base_value;
			
		// total change
		total = Number($('#cart-value').text());

		// if quantity is 1 then the entire row must be removed
		if (current_quantity === 1) {

			// confirm box from jquery
			if(confirm('Are you sure??You want to remove the product from your cart..')){

				// remove from UI & update the total
				$('#item-in-cart' + id).remove();
				var updated_total = total-base_value;
				$('#cart-value').text(updated_total);

				// remove from db
				$.ajax({
					url:"remove_cart_item.php?item_id="+id,
				});
			}
			
		}else{
			new_quantity = current_quantity-1;

			$.ajax({
				// we need to pass both food_id and new quantity through the url in order to update the quantity in the db
				url: "cart_update.php?item_id="+id+"&quantity="+new_quantity,
				success:function(data){
					//alert(data);

					// UPDATE THE UI
					// update the new quantity
					$('#quantity_number' + id).text(new_quantity);
					// updating the price change
					$('#price' + id).text(new_price);
					// updating the total value of cart
					$('#cart-value').text(total-base_value);
				},
				error: function(){
					alert('Some error occurred!! Please try again later');
				}
			});
		}
		
		
	});



	// ADD BUTTONS

	$('.add').click(function(){

		// product id
		id = $(this).data('id');


		// increase the quantity
		current_quantity = Number($('#quantity_number' + id).text());
		new_quantity = current_quantity+1;

		// price change
		current_price = Number($('#price' + id).text());
		base_value = current_price/current_quantity;
		new_price = current_price + base_value;
		
		// total change
		total = Number($('#cart-value').text());

		$.ajax({
			// we need to pass both food_id and new quantity through the url in order to update the quantity in the db
			url: "cart_update.php?item_id="+id+"&quantity="+new_quantity,
			success:function(data){
				//alert(data);

				// update the new quantity
				$('#quantity_number' + id).text(new_quantity);
				// updating the price change
				$('#price' + id).text(new_price);
				// updating the total value of cart
				$('#cart-value').text(total + base_value);
			},
			error: function(){
				alert('Some error occurred!! Please try again later');
			}
		});
		
	});
});