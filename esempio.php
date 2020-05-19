<?php
$connetion = mysqli_connect("localhost","root","");
mysqli_select_db($connetion, 'ground_station');
$velocity = $_GET ['velocity'];
$coords = $_GET ['coords'];
$mode = $_GET ['mode'];

?>