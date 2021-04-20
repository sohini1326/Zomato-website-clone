<?php
	
	require "db_config.php";

	session_start();

	if (!empty($_GET)) {
		$restaurant_id = $_GET['id'];
	}else{
		die('INVALID URL');
	}

	$query = "SELECT * FROM restaurant WHERE id = $restaurant_id ";
	$result = mysqli_query($conn,$query);
	$fetched_result = mysqli_fetch_assoc($result);


	$restrau_name = $fetched_result['name'];
	$restrau_address = $fetched_result['address'];
	$restrau_img = $fetched_result['image'];
	$restrau_rating = $fetched_result['rating'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Restaurant - <?php echo "$restrau_name"; ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Pacifico&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

</head>
<body>

	<?php include "includes/navbar.php" ; ?>

	<div class="container">

		<div class="restrau-page">
			<div class="restrau-page-left">
				<img src="<?php echo "$restrau_img"; ?>">
			</div>
			<div class="restrau-page-right">
				<h3 style="font-size: 3rem;"><?php echo "$restrau_name"; ?></h3>

				<div class="row">
					<div class="col-md-3 text-center">
						<h5><?php echo "$restrau_rating"; ?> <i style="color: #ffcc00 ;" class="fas fa-star"></i></h5>
					</div>
				</div>
				
				<p style="font-weight: bold;"><?php echo "$restrau_address"; ?></p>
			</div>
		</div>

		<div class="mt-5 text-center mb-5">
			<h2 style="font-family: 'Pacifico', cursive; font-size: 3rem; color: #880000;">Our Menu...</h2>
		</div>

		 <!-- menu of the restaurants-->
		 <!-- data-id attribute is very important for adding the dish to the cart-->

		 <div class="menu-list">

		 	<?php

		 		$query2 = "SELECT * FROM food WHERE res_id = $restaurant_id";
		 		$result2 = mysqli_query($conn,$query2);

		 		while ($row = mysqli_fetch_assoc($result2)) {
		 			echo '<div class="food">
			 				<div class="food-img">
						 		<img src="'.$row['image'].'">
						 	</div>
			 				<div class="food-desc">
						 		<h3>'.$row['name'].'</h3>
						 		<p>'.$row['description'].'</p>
			 				</div>
			 				<div class="food-price"><h4>Rs. '.$row['price'].'</h4></div>
			 				<div class="food-add-to-cart" ><button data-id='.$row['id'].' class="btn btn-success btn-lg add_the_food">Add to Cart</button></div>
			 			</div>';
		 		}

		 	?>

		 	
		 </div>


		<div class="review-section">
		 	<div class="mt-5 ml-5 mb-5" style="display: flex;justify-content: space-between;">
				<h2 style="font-family: 'Pacifico', cursive; font-size: 3rem; color: #880000;">Our Reviews...</h2>
				<button class="btn btn-primary btn-lg mr-5" data-toggle="modal" data-target="#reviewModal" style="float: right;">Add Review</button>
		 	</div>

		 	<div class="review-row">

		 		<?php

		 			$query3 = "SELECT * FROM review r INNER JOIN users s ON r.user_id=s.user_id WHERE restaurant_id = $restaurant_id";

		 			$result3 = mysqli_query($conn,$query3);

		 			if (mysqli_num_rows($result3) > 0 ) {

		 				while ($row = mysqli_fetch_assoc($result3)) {

		 					$temp = $row['review_date'];
							$temp1 = date('d-M-Y', strtotime($temp));

		 					echo '<div class="indiv-review">
							 			<div class="rev-date-user">
							 				<p>Reviewed by  :   <b>'.$row['name'].'</b></p>
							 				<p>Reviewed On  :   <b>'.$temp1.'</b></p>
							 			</div>
							 			<div class="rev-details">
							 				<h5><span class="mr-4">'.$row['review_tag'].'</span> ';

							 				$filled_stars = $row['rating_score'];
							 				$unfilled_stars = 5 - $filled_stars;

							 				if ($filled_stars >= 3) {
							 					for ($i=0; $i < $filled_stars ; $i++) { 
							 					echo '<span><i class="fas fa-star" style="color:green;"></i></span>';
							 					}
							 					for ($i=0; $i < $unfilled_stars; $i++) { 
							 					echo '<span><i class="far fa-star"></i></span>';
							 					}
							 				}else{
							 					for ($i=0; $i < $filled_stars ; $i++) { 
							 					echo '<span><i class="fas fa-star" style="color:red;"></i></span>';
							 					}
							 					for ($i=0; $i < $unfilled_stars; $i++) { 
							 					echo '<span><i class="far fa-star"></i></span>';
							 					}
							 				}
			
							 echo '</h5>
							 			<p>'.$row['review_text'].'</p>
							 			</div>
							 	</div>';
		 				}
		 			}else{
		 				echo '<h4 class="text-center mb-2 text-danger">No reviews posted yet..Be the first one to review!!</h4>';
		 			}

		 			

		 		?>
		 		
		 	</div>
		</div>

		 	

	</div>



	<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header rev-bgclr">
		        <h5 class="modal-title text-dark" id="exampleModalLabel">Your Review</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">

		        <form action="add_review.php?restaurant_id=<?php echo $restaurant_id; ?>" method="POST">

		        	<i class="fas fa-tags rev-icon-design"></i><label class="rev-label" for="review-tag">Review Tag</label><br>
		        	<input class="rev-inpt-frmt" type="text" name="review_tag" id="review-tag" placeholder="GOOD../BAD.../AVERAGE"><br>

		        	<i class="fas fa-comment rev-icon-design"></i><label class="rev-label" for="review-desc">Review Text</label><br>
		        	<input class="rev-inpt-frmt" type="text" name="review_desc" id="review-desc" placeholder="Any suggestions..scope of improvements"><br>

		        	<i class="fas fa-star rev-icon-design"></i><label class="rev-label" for="star-rating">Star Rating</label><br>
		        	<select name="star_rating" id="star-rating">
					    <option value="1">1</option>
					    <option value="2">2</option>
					    <option value="3">3</option>
					    <option value="4">4</option>
					    <option value="5">5</option>
					</select>

		        	<input type="submit" name="" class="btn rev-btn btn-block" value="Submit the Review">

		        </form>

		      </div>
		    </div>
	  </div>
	</div>



	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/add_to_cart.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>