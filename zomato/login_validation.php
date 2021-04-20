<?php

require "db_config.php";

// this url on direct hitting should not respond. It is built to handle the form sbmssn
// $_SERVER['REQUEST_METHOD']=='POST' incase of form sbmssn
if ($_SERVER['REQUEST_METHOD']=='GET') {
	echo "INVALID URL";
	exit();
}

// super global associative array which web developers use to stoe the details of the user
session_start();


// connect to database thorough the file mentioned above


// fetch the data from html
$email = $_POST['email'];
$password = $_POST['password'];

// the password is encrypted in our database. So, the password given by the user won't match to the ones stored in database. Hence we encrypt it so that it gets matched with the ones stored.
$password = md5($password);

// check for login so info has to be fetched from the database. Hence we need to run a query.

//WRITE THE QUERY
$query = "SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$password'";

// run the query in the mysql database using php function
$result = mysqli_query($conn,$query);

// to see the asscociative array properly we use this function
$fetched_result = mysqli_fetch_assoc($result);

// incase of right login, the attribute 'numrows' in $result is 1, otherwise 0 So we fetch it
$num_rows = mysqli_num_rows($result);

if($num_rows == 1){
	// once logged in we need to start the session so that we can access user details from any pages

	$name = $fetched_result['name'];
	$user_id = $fetched_result['user_id'];
	$_SESSION['name'] = $name;
	$_SESSION['user_id'] = $user_id;
	$_SESSION['email'] = $email;
	header('Location:profile.php');
}else{
	// we need to send one message to the index.php so that it ca understand that some error has occurred and the login modal pops up once again with the error message displayed. So, we use 'get' variable
	header('Location:index.php?err=1');
}
?>