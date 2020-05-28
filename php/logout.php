<?php
	session_start();
	session_unset();
	session_destroy();
	//setcookie ("ID_my_site", "", time() - 3600);
	header('location: ../login.html');
	exit();
?>