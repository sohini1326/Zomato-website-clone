		

		<style type="text/css">
			#shopping-cart{
				position: absolute;
				top: 23px;
			    right: 237px;
			    font-size: 28px;
			    color: white;
			    cursor: pointer;
			}
		</style>



		<nav class="navbar bg-danger">
			<h3 class="navbar-brand text-white" style="font-family:'Kanit', sans-serif; font-size: x-large;">
				Zomato
			</h3>

			<?php

				if (empty($_SESSION)) {
					echo '<button class="btn btn-light" style="margin-right:45px" data-toggle="modal" data-target="#loginModal">Login</button>';
				}else{
					echo ' <a href="cart.php"><i id="shopping-cart" class="fas fa-shopping-cart"></i></a>
					<div class="dropdown" style="margin-right:45px">
							  	<button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi! 
							    	'.$_SESSION['name'].'
							  	</button>
							  	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							  		<a class="dropdown-item" href="index.php">My Home Page</a>
							    	<a class="dropdown-item" href="profile.php">My Profile</a>
							    	<a class="dropdown-item" href="my_orders.php">My orders</a>
							    	<a class="dropdown-item" href="logout.php">Logout</a>
							  	</div>
						</div>';
				}	

			?>
		</nav>