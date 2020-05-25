<?php
$connetion = mysqli_connect("localhost", "root", "");
mysqli_select_db($connetion, 'sasa');

$query = mysqli_query($connetion, "SELECT * FROM ground_station ORDER BY id DESC LIMIT 1;");
while ($row = mysqli_fetch_array($query)) {
	echo "Id: ";
	echo $row['id'];
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
}
