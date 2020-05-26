<?php
$connetion = mysqli_connect("localhost", "root", "") or die(mysqli_error($connetion));
mysqli_select_db($connetion, "sasa") or die(mysqli_error($connetion));


$query = mysqli_query($connetion, "SELECT * FROM rover WHERE roverID=1");
while ($row = mysqli_fetch_array($query)) {
	echo '<h4 style="color:#fff; text-align:center;">';

	echo '<table class="center">';
	echo '<tr>';
	echo '<th>Timestamp</th>';
	echo '<th>Status</th>';
	echo '<th>Battery</th>';
	echo '<th>Speed</th>';
	echo '<th>Coords x</th>';
	echo '<th>Coords y</th>';
	echo '<th>Camera Tilt</th>';
	echo '<th>Mode</th>';
	echo '<tr>';
	
	echo '<th>#{user.username}</th>';
	echo '<th>#{user.email}</th>';
	echo '</tr>';
	echo '</tr>';
	echo '</table>';

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