
$(document).ready(function(){
	
	$('#reg_btn').click(function(){
		$('#loginModal').modal('hide');
		$('#registerModal').modal('show');
	});

	$('#login_btn').click(function(){
		$('#registerModal').modal('hide');
		$('#loginModal').modal('show');
	});

});