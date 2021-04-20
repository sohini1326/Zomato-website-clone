<?php
	
	require "db_config.php";

	session_start();

	if (!empty($_GET)) {
		$cuisine_id = $_GET['id'];
	}else{
		die('INVALID URL');
	}

	$query = "SELECT * FROM cuisines WHERE id = $cuisine_id ";
	$result = mysqli_query($conn,$query);
	$fetched_result = mysqli_fetch_assoc($result);

	$cuisine_name = $fetched_result['name'];
	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cuisine - <?php echo $cuisine_name; ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Acme&family=Courgette&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

</head>
<body>

	<?php include "includes/navbar.php" ; ?>

	<div class="container">

		<h2 class="mt-5">Cuisine :<i style="color: #B22222"> <?php echo $cuisine_name; ?> </i></h2>
		<h4 class="mt-5 text-center" style="font-family: 'Pacifico', cursive; font-size: 2.3rem;">
			Grab your favourite <i class="fas fa-heart" style="color: #b30000"></i> from...</h4>

		<div class="list-of-restaurants">

			<?php

				$query2 = "SELECT f.name,f.image AS food_img,f.res_id,c.id AS cuisine_id,c.name AS cuisine_name, 
					r.name AS restaura_name,r.rating 
					FROM food f 
					INNER JOIN cuisines c ON f.cus_id = c.id
					INNER JOIN restaurant r ON f.res_id = r.id
					WHERE c.id = $cuisine_id";

				$result2 = mysqli_query($conn,$query2);

				while ($row = mysqli_fetch_assoc($result2)) {
					echo '<div class="retsurant-details">
							<div class="pic">
								<img src="'.$row['food_img'].'">
							</div>
							<div class="info">
								<h2>'.$row['name'].'</h2>
								<a href="restaurant.php?id='.$row['res_id'].'" style="text-decoration: none;"><h3>'.$row['restaura_name'].'</h3></a>
								<h4>'.$row['rating'].'   <i style="color: #ffcc00 ;" class="fas fa-star"></i></h4>
							</div>
						</div>';
				}

			?>


			
		</div>

		<div class="catchy-line">
			<h4>Presents you with a plenty of choices...<br> Don't let it go...   <i class="fas fa-hand-holding-heart"></i></h4>
		</div>
		
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/app.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


