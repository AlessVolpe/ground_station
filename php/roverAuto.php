<?php

session_start();
if ($_SESSION['userLogin'] == 'loggato') {
	$roverID = $_POST['roverID'];
	$roverStatus = $_POST['roverStatus'];
	$battery = $_POST['battery'];
	$speed = $_POST['speed'];
	$coordsx = $_POST['coordsx'];
	$coordsy = $_POST['coordsy'];
	$cameraTilt = $_POST['cameraTilt'];
	$mode = $_POST['mode'];

	$connetion = mysqli_connect("localhost", "root", "");
	mysqli_select_db($connetion, 'sasa');

	$query = "INSERT into rover(roverID, roverStatus, battery, speed, coordsx, coordsy, cameraTilt, mode) VALUES ('$roverID', '$roverStatus', '$battery', $speed', '$coordsx',  '$coordsy',  '$cameraTilt', '$mode')";
	$result = mysqli_query($connetion, $query);

	if ($result) {
		echo "yes";
	} else {
		echo "Error";
	}
} else {
	header("Location: login.html");
}
