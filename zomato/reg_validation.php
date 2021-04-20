<?php

if ($_SERVER['REQUEST_METHOD']=='GET') {
	echo "INVALID URL";
	exit();
}

// connect to database
require "db_config.php";

session_start();

// receive the data from user
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// to encrypt the password in our database so that even if it gets hacked, hacker doesn't get the passwrods of the mail ids
$password = md5($password);

// insert these daat into database

// write the query
$query = "INSERT INTO users VALUES (NULL,'$name','$email','$password','Profile-PNG-Icon.png')";

// run the query
if(mysqli_query($conn,$query)){
	// fetch user details

	$query2 = "SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$password'";
	$result = mysqli_query($conn,$query2);
	$fetched_result = mysqli_fetch_assoc($result);
	$name = $fetched_result['name'];
	$user_id = $fetched_result['user_id'];
	$email = $fetched_result['email'];
	$_SESSION['name'] = $name;
	$_SESSION['user_id'] = $user_id;
	$_SESSION['email'] = $email;


	$query3 = "INSERT INTO user_details (user_id) VALUES ($user_id)";
	mysqli_query($conn, $query3);
	

	header('Location:profile.php');
}else{
	header('Location:index.php?err=2');
}
?>