<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Log in - VGDB</title>
  <link rel="icon" href="res/favicon.png">
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="form">   
	  <?php
		if(!(isset($_POST['invia']))) {
		?>
      
      <div class="tab-content">
        <div id="login">   
          <h1>Welcome Back!</h1>
	<form action="" method="POST">
	<div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name="username">
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password">
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>

          <br>
          
          <input type="submit" name="invia" value="Log in" class="button button-block">
          
          </form>

        </div>
	  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

	<?php
	} else {
		$connection = mysqli_connect("localhost", "root", "") or die (mysqli_error($connection));
		mysqli_select_db($connection, "ground_station") or die (mysqli_error($connection));
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query = "SELECT * from utenti WHERE username = '$username' and password = '$password'";
		
		$result = mysqli_query($connection, $query);
		$row = mysqli_num_rows($result);
		if($row == 1){
			session_start();
			header("location: index.html");
		} else{
			echo "Login fallito";
		}
	mysqli_close($connection);
	}
	?>
</body>
</html>