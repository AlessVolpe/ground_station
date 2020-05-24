<?php
	if(isset($_POST['send'])) {
		$connection = mysqli_connect("localhost", "root", "") or die (mysqli_error($connection));
		mysqli_select_db($connection, "sasa") or die (mysqli_error($connection));
			
		$username = $_POST['username'];
		$password = $_POST['password'];
			
		$query = "SELECT * from users WHERE username = '$username' and password = '$password'";
			
		$result = mysqli_query($connection, $query);
		$row = mysqli_num_rows($result);
		if($row == 1){
			session_start();
			header("location: ../index.html");
		} else{
			echo "Login fallito";
		}
		mysqli_close($connection);
	}
?>
