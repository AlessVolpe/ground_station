<?php
/*Welcome to the php of datahistory*/

session_start();

/*Check if the user is logged*/
if ($_SESSION['userLogin'] == 'loggato') {
	$connetion = mysqli_connect("localhost", "root", "") or die(mysqli_error($connetion)); /*try to connect to localhost*/
	mysqli_select_db($connetion, "sasa") or die(mysqli_error($connetion)); /*try to select the db of sasa*/
	
	/*If the user push the 'invia' button*/

	if (isset($_REQUEST['invia'])) {
		$date = $_POST['date']; /*Save the date from input*/
		$query = mysqli_query($connetion, "SELECT * FROM rover WHERE CAST(timestamp as DATE) = '$date' AND roverID=1 ORDER BY id DESC");
		
		/*Query: select all the columns where the date extract from timestamp == $date and roverID=1; the order is decrescent*/
		
		$newDate = date("d/m/Y", strtotime($date)); /*Change the format of date*/
		echo "<h4 style='color: white; margin-left: 10%; margin-top: 10px;'>Showing database entries for " . $newDate . ".</h4>"; /*simple print*/
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
			
		/*Start to costruct the table; show the name of the all columns*/
		
		while ($row = mysqli_fetch_array($query)) {
		/*The result is in a array; while the function find a row:*/
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
		/*print all the elements*/
		}
		echo "</table></center>"; /*end of the html*/
		
	/*This is what the user can view in the datahistory without select a date*/
	} else {
		$query = mysqli_query($connetion, "SELECT * FROM rover WHERE roverID=1 ORDER BY id DESC");
		
		/*Select all the row where roverID=1; the order is decrescent*/
		
		echo "<h4 style='color: white; margin-left: 10%; margin-top: 10px;'>Showing all database entries.</h4>"; /*simple print*/
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
		
		/*Start to costruct the table; show the name of the all columns*/

		while ($row = mysqli_fetch_array($query)) {
			
		/*The result is in a array; while the function find a row:*/
		
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
		/*print all the elements*/
		}
		echo "</table></center>"; /*end of html*/
	}
} else {
	header("Location: login.html"); /*if not login, redirect to the login page*/
}

/*CSS*/
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