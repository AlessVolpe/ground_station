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


		$query = mysqli_query($connetion, "SELECT * FROM rover WHERE roverID=1");
		echo "<center><table border='1'>
		<tr>
		<th>Timestamp</th>
		<th>Status</th>
		<th>Battery</th>
		<th>Speed</th>
		<th>Coords x</th>
		<th>Coords y</th>
		<th>Camera Tilt</th>
		<th>Mide</th>

		</tr>";
		while ($row = mysqli_fetch_array($query)) {
			echo '<h4 style="color:#fff; text-align:center;">';
			echo "<tr>";
			echo "<th>".$row['timestamp']."</th>";
			echo "<th>".$row['status']."</th>";
			echo "<th>".$row['battery']."</th>";
			echo "<th>".$row['speed']."</th>";
			echo "<th>".$row['coordsx']."</th>";
			echo "<th>".$row['coordsy']."</th>";
			echo "<th>".$row['cameraTilt']."</th>";
			echo "<th>".$row['mode']."</th>";
			echo '</tr>';

			/*echo "Rover ID: ";
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
			echo '</h4>';*/
		}
		echo "</table></center>";
	}
	
	else{
		header("Location: login.html");
	}
?>

<style>
	table {
		border-collapse: collapse;
		width: 80%;
	}

	td,
	th {
		border: 1px solid #dddddd;
		text-align: center;
		padding: 8px;
		color: #fff;
	}

	th {
		background-color: #333;
	}

	.center {
		margin: 0 auto;
		margin: 1px solid #fff;
	}

	.b {
		color: #f26657;
		-webkit-text-stroke: 1px black;
	}

	.head {
		color: #000;
		background-color: #666;
	}
</style>