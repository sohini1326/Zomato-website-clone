<?php

require "db_config.php";

session_start();
// if the user is logged in he needs to be redirected to the profile page
/*if (!empty($_SESSION)) {
	header('Location:profile.php');
}*/

// we need not print the empty array
// code will run only when there is some error
if (!empty($_GET)) {
	$err = $_GET['err'];
}else{
	$err = 0;
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Zomato_clone</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">


	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

</head>


<body>
	<div class="main">

		<?php include "includes/navbar.php" ; ?>

		<div class="intro">
			<div class="intro-left">
				<div id="intro-text">
					<h2>There is no love sincerer than the love of food...</h2>
					<h5><div id="strt-line"></div>George Bernard Shaw</h5>
				</div>
			</div>
			<div class="intro-right">
				<div id="img-slider">
					<div id="img-box"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		
		<div class="restaura-heading">
		      <i class="fas fa-utensils" style="font-size: 75px;margin-right: 33px;"></i>
		      <h3 style="font-family: 'Acme', sans-serif;font-size: 64px" class="text-dark text-center">Top Restaurants</h3>
		      <i class="fas fa-utensils" style="font-size: 75px;margin-left: 33px;"></i>
		</div>

		<div class="restaura-decor">
			<div class="restaura-decor-left">
				<img src="img/chef1.jpg" id="im1">
				<img src="img/chef3.jpg" id="im2">
			</div>
			<div class="restaura-decor-right">
				<h3 class="text-danger">Good food..<br><span> Good life..<i class="fas fa-heartbeat"></i></span></h3>
			</div>
		</div>

		<div class="restaura-row">

			<?php

				$query = "SELECT * FROM restaurant";

				$result = mysqli_query($conn,$query);

				while ($row = mysqli_fetch_assoc($result)) {
					echo '<div class="restaura_col">
							<a href="restaurant.php?id='.$row['id'].'" style="text-decoration:none;">
								<img src="'.$row['image'].'">
							</a>
								<h3>'.$row['name'].'</h3>
								<h5>'.$row['rating'].'  <i style="color: #ffcc00 ;" class="fas fa-star"></i></h5>
								<p><i>Rs. <b>'.$row['rate'].'</b> per person</i></p>
							
						</div>';
				}

			?>
				
		</div>

	</div>


	<div class="cuisines">

		<div class="restaura-heading" style="padding-top: 25px;">
		      <i class="fas fa-grin-stars" style="font-size: 75px;margin-right: 33px;color: white;"></i>
		      <h3 style="font-family: 'Acme', sans-serif;font-size: 64px" class="text-white text-center">Top Cuisines 
		      </h3>
		      <i class="fas fa-grin-stars" style="font-size: 75px;margin-left: 33px;color: white;"></i>
		</div>

		<div class="container">

			<div class="cuisine-intro">
				<h4 class="text-white" style="font-family: 'Pacifico', cursive;font-size: 2.5rem;">
					Why wait???...Go by your favorite cuisine..
				</h4>
				<i class="fas fa-pizza-slice"></i>
				<i class="fas fa-hamburger"></i>
				<i class="fas fa-ice-cream"></i>
				<i class="fas fa-egg"></i>
				<i class="fas fa-fish"></i>
			</div>

			
			<div class="cuisine-row">

				<?php

					$query2 = "SELECT * FROM cuisines";
					$result2 = mysqli_query($conn,$query2);

					while ($row=mysqli_fetch_assoc($result2)) {
						echo '<div class="cuisine-col">
									<a href="cuisine.php?id='.$row['id'].'"><img src="'.$row['cuisine_pic'].'"></a>
									<h3 class="text-white">'.$row['name'].'</h3>
							</div>';
					}

				?>	

			</div>
		</div>

	</div>


	<div class="footer-section">
		<div class="footer-section-left">
			<div class="address">
				<i class="fas fa-map-marker-alt"></i>
				<div class="address-details">
					<h4>21 Revolution Street</h4>
					<h5>Mumbai, India</h5>
				</div>
			</div>
			<div class="contact-us">
				<i class="fas fa-headphones"></i>
				<h5>+1800 555 777</h5>
			</div>
			<div class="mail-us">
				<i class="fas fa-envelope"></i>
				<h5>support@zomato.com</h5>
			</div>
		</div>
		<div class="footer-section-right">
			<h1 style="font-family: 'Acme', sans-serif;font-size: 55px;"><i>Zomato</i></h1>
			<div class="social-links">
				<i class="fab fa-facebook-square"></i>
				<i class="fab fa-twitter-square"></i>
				<i class="fab fa-google-plus-square"></i>
				<i class="fab fa-instagram-square"></i>
			</div>
			<div class="app">
				<i class="fab fa-google-play"></i>
				<h5>Get the app</h5>
			</div>
		</div>

	</div>

	<p style="text-align: center;" class="text-secondery">&copy; All rights reserved.</p>
	

	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-white" id="exampleModalLabel">Login</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<p id="login_error" class="text-danger"></p>
		        <form action="login_validation.php" method="POST">

		        	<i class="fas fa-envelope-open-text icon-design"></i><label for="mail">Email</label><br>
		        	<input class="inpt-frmt" type="email" name="email" id="mail" placeholder="xyz@gmail.com"><br>

		        	<i class="fas fa-user-lock icon-design"></i><label for="pswrd">Password</label><br>
		        	<input class="inpt-frmt" type="password" name="password" id="pswrd" placeholder="Abc@_$234"><br>

		        	<input type="submit" name="" class="btn btn-dark btn-block" value="Login">

		        </form>

		        <p class="mt-5 text-center">
		        	Not a member?? 
		        	<button class="btn btn-primary btn-sm" id="reg_btn">Sign Up</button>
		        </p>
		      </div>
		    </div>
	  </div>
	</div>


	<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-white" id="exampleModalLabel">Sign Up</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<p id="reg_error" class="text-danger"></p>
		        <form action="reg_validation.php" method="POST">
		        	<i class="far fa-user icon-design"></i><label for="reg-name">Username</label><br>
		        	<input class="inpt-frmt" type="text" name="name" id="reg-name" placeholder="Sohini Roy"><br>

		        	<i class="fas fa-envelope-open-text icon-design"></i><label for="reg-mail">Email</label><br>
		        	<input class="inpt-frmt" type="email" name="email" id="reg-mail" placeholder="xyz@gmail.com"><br>

		        	<i class="fas fa-user-lock icon-design"></i><label for="reg-pswrd">Password</label><br>
		        	<input class="inpt-frmt" type="password" name="password" id="reg-pswrd" placeholder="Abc@_$234"><br>

		        	<input type="submit" name="reg-btn" class="btn btn-dark btn-block" value="Register">
		        </form>

		        <p class="mt-5 text-center">
		        	Already a member?? 
		        	<button class="btn btn-warning btn-sm" id="login_btn">Login</button>
		        </p>
		      </div>
		    </div>
	  </div>
	</div>



	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/app.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			var err = '<?php echo $err; ?>';
			if(err === '1'){
				$('#login_error').text('Incorrect email/password');
				$('#loginModal').modal('show');
			}else if(err === '2'){
				$('#reg_error').text('Some error occurred');
				$('#registerModal').modal('show');
			}
		});
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
</body>
</html>