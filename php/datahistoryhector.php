<?php

session_start();

if ($_SESSION['userLogin'] == 'loggato') {
	$connetion = mysqli_connect("localhost", "root", "") or die(mysqli_error($connetion));
	mysqli_select_db($connetion, "sasa") or die(mysqli_error($connetion));

	if (isset($_REQUEST['invia'])) {
		$date = $_POST['date'];
		$query = mysqli_query($connetion, "SELECT * FROM rover WHERE CAST(timestamp as DATE) = '$date' AND roverID=3 ORDER BY id DESC");
		$newDate = date("d/m/Y", strtotime($date));
		echo "<h4 style='color: white; margin-left: 10%; margin-top: 10px;'>Showing database entries for " . $newDate . ".</h4>";
		echo "<br>";
		echo "<center><table>
			<tr>
			<th class='head'>Timestamp</th>
			<th class='head'>Status</th>
			<th class='head'>Battery</th>
			<th class='head'>Speed</th>
			<th class='head'>Coords x</th>
			<th class='head'>Coords y</th>
			<th class='head'>Camera Tilt</th>
			<th class='head'>Mode</th>
			</tr>";

		while ($row = mysqli_fetch_array($query)) {
			echo "<tr>";
			echo "<th>" . $row['timestamp'] . "</th>";
			echo "<th>" . $row['status'] . "</th>";
			echo "<th>" . $row['battery'] . "</th>";
			echo "<th>" . $row['speed'] . "</th>";
			echo "<th>" . $row['coordsx'] . "</th>";
			echo "<th>" . $row['coordsy'] . "</th>";
			echo "<th>" . $row['cameraTilt'] . "</th>";
			echo "<th>" . $row['mode'] . "</th>";
			echo '</tr>';
		}
		echo "</table></center>";
	} else {
		$query = mysqli_query($connetion, "SELECT * FROM rover WHERE roverID=3 ORDER BY id DESC");
		echo "<h4 style='color: white; margin-left: 10%; margin-top: 10px;'>Showing all database entries.</h4>";
		echo "<br>";
		echo "<center><table>
			<tr>
			<th class='head'>Timestamp</th>
			<th class='head'>Status</th>
			<th class='head'>Battery</th>
			<th class='head'>Speed</th>
			<th class='head'>Coords x</th>
			<th class='head'>Coords y</th>
			<th class='head'>Camera Tilt</th>
			<th class='head'>Mode</th>
			</tr>";

		while ($row = mysqli_fetch_array($query)) {
			echo "<tr>";
			echo "<th>" . $row['timestamp'] . "</th>";
			echo "<th>" . $row['status'] . "</th>";
			echo "<th>" . $row['battery'] . "</th>";
			echo "<th>" . $row['speed'] . "</th>";
			echo "<th>" . $row['coordsx'] . "</th>";
			echo "<th>" . $row['coordsy'] . "</th>";
			echo "<th>" . $row['cameraTilt'] . "</th>";
			echo "<th>" . $row['mode'] . "</th>";
			echo '</tr>';
		}
		echo "</table></center>";
	}
} else {
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
		color: #fff;
		background-color: #812535;
	}
</style>