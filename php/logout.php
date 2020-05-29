<?php
/*Welcome to the php logout*/
	session_start(); /*Start the session*/
	session_unset(); /*Free all the session variables*/
	session_destroy(); /*Destroy the session*/
	
	header('location: ../login.html'); /*Redirect to the login html*/
	exit(); /*end*/

?>