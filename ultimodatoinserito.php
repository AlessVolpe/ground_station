<?php
	$connetion = mysqli_connect("localhost","root","");
    mysqli_select_db($connetion, 'ground_station');
	
	$query = mysqli_query($connetion, "SELECT * FROM unnamed ORDER BY id DESC LIMIT 1;");
	while($row = mysqli_fetch_array($query)) {
			echo "Id: ";
			echo $row['id'];
			echo "<br>Velocity: ";
			echo $row['velocity'];
			echo "<br>Coords: ";
			echo $row['coords'];
			echo "<br>Mode: ";
			echo $row['mode'];
			echo "<br>Timestamp: ";
			echo $row['timestamp'];
	}
?>