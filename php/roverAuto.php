<?php
/*Welcome to the php roverAuto*/
	session_start();
	$roverID = $_POST['roverID'];
	$roverStatus = $_POST['roverStatus'];
	$battery = $_POST['battery'];
	$speed = $_POST['speed'];
	$coordsx = $_POST['coordsx'];
	$coordsy = $_POST['coordsy'];
	$cameraTilt = $_POST['cameraTilt'];
	$mode = $_POST['mode'];
	
	/*Save all the input*/

	$connetion = mysqli_connect("localhost", "root", ""); /*try to connect to localhost*/
	mysqli_select_db($connetion, 'sasa'); /*try to select the db of sasa*/

	$query = "INSERT into rover(roverID, roverStatus, battery, speed, coordsx, coordsy, cameraTilt, mode) VALUES ('$roverID', '$roverStatus', '$battery', $speed', '$coordsx',  '$coordsy',  '$cameraTilt', '$mode')";
	$result = mysqli_query($connetion, $query);
	
	/*Query: insert all the input in the rover table*/

	if ($result) {
		echo "yes"; /*if result, OK*/
	} else {
		echo "Error"; /*Error*/
	}
?>
