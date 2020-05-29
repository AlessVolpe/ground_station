<?php

/*Welcome to the php login*/

session_start();
/*if the user push the button 'send' in the login:'*/
if (isset($_POST['send'])) {
	$connection = mysqli_connect("localhost", "root", "") or die(mysqli_error($connection)); /*try to connect to localhost*/
	mysqli_select_db($connection, "sasa") or die(mysqli_error($connection)); /*select the db of sasa*/

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	/*save username and password from input*/
	
	$query = "SELECT * from users WHERE username = '$username' and password = '$password'";
	$result = mysqli_query($connection, $query);
	
	/*start the query, select all columns where username = '$username' and password = '$password'*/
	
	$row = mysqli_num_rows($result);
	/*count the rows of result*/
	
	if ($row == 1) {
		header("location: ../index.html");
		$_SESSION['userLogin'] = 'loggato';
		
	/*if = 1, the user is in the db -> Login. The php save the session variable 'userLogin', so the user can login in the other pages*/
	
	} else {
		header("location: ../loginError.html");
	/*Login Error*/
	}
	mysqli_close($connection);
}
