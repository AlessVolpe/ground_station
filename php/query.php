<?php
/*Welcome to the php page of rover*/

/*If the user push the 'send data' button:*/
	if (isset($_POST['subtodb'])) {
		$roverID = $_POST['roverID'];
		$speed = $_POST['speed'];
		$coordsx = $_POST['coordsx'];
		$coordsy = $_POST['coordsy'];
		$cameraTilt = $_POST['cameraTilt'];
		$mode = $_POST['mode'];
		
	/*Save all the input*/

		$connetion = mysqli_connect("localhost", "root", ""); /*try to connect to localhost*/
		mysqli_select_db($connetion, 'sasa'); /*try to select the db*/
		
		$query = "INSERT into rover(roverID, speed, coordsx, coordsy, cameraTilt, mode) VALUES ('$roverID', '$speed', '$coordsx',  '$coordsy',  '$cameraTilt', '$mode')";
		$result = mysqli_query($connetion, $query);
		
	/*Query: insert all the input in the table rover*/
	
		if ($result) {
			header("Location: ../unnamed.html#realTime"); /*If result==true, OK*/
		} else {
			echo "Error"; /*Error*/
		
	}
	
	/*If the user push 'start' button*/

	else if (isset($_POST['start'])) {
		$statusStart = $_POST['statusStart']; /*save input*/
		
		$connetion = mysqli_connect("localhost", "root", ""); /*try to connect to localhost*/
		mysqli_select_db($connetion, 'sasa'); /*try to select the db*/

		$query = "INSERT into rover(roverID, status) VALUES ('1', '$statusStart')";
		$result = mysqli_query($connetion, $query);
		
	/*Query: insert input and roverID=1 in the rover table*/

		if ($result) {
			header("Location: ../unnamed.html#realTime"); /*If result==True, OK*/
		} else {
			echo "Error"; /*Error*/
		}
	}
	
	/*if the user push 'stop' button*/

	else if (isset($_POST['stop'])) {
		$statusStop = $_POST['statusStop']; /*save input*/

		$connetion = mysqli_connect("localhost", "root", ""); /*try to connect to localhost*/
		mysqli_select_db($connetion, 'sasa'); /*try to select the db*/

		$query = "INSERT into rover(roverID, status) VALUES ('1', '$statusStop')";
		$result = mysqli_query($connetion, $query);
		
		/*Query: insert input and roverID=1 in the rover table*/

		if ($result) {
			header("Location: ../unnamed.html#realTime"); /*If result==True, OK*/
		} else {
			echo "Error"; /*Error*/
		}
	}
