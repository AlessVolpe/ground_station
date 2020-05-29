<?php
	session_start();
	
	// inizio codice che killa la sessione dopo cinque minuti di inattività
	$time = $_SERVER['REQUEST_TIME'];
	$timeout_duration = 300;
	if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
		session_unset();
		session_destroy();
		session_start();
	}

	$_SESSION['LAST_ACTIVITY'] = $time;
	
	// fine
	
	// controllo se sono loggato

	if($_SESSION['userLogin'] == 'loggato'){

		$connetion = mysqli_connect("localhost", "root", "") or die(mysqli_error($connetion));
		mysqli_select_db($connetion, "sasa") or die(mysqli_error($connetion));

		
		$query = mysqli_query($connetion, "SELECT * FROM ground_station");
		while ($row = mysqli_fetch_array($query)) {
			echo '<span style="color:#000;text-align:center;">';
			echo "Rover ID: ";
			echo $row['roverID'];
			echo "<br>Speed: ";
			echo $row['speed'];
			echo "<br>Coords x: ";
			echo $row['coordsx'];
			echo "<br>Coords y: ";
			echo $row['coordsy'];
			echo "<br>Camera Tilt: ";
			echo $row['cameraTilt'];
			echo "<br>Mode: ";
			echo $row['mode'];
			echo "<br>Timestamp: ";
			echo $row['timestamp'];
			echo "<br><br>";
			echo '</span>';
		}
	}
	
	else{
		header("Location: login.html");
	}
