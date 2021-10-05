<?php

	$hostname= "localhost";
	$username="user_domotica";
	$password="1234*domotica";
	$dbname="domotica";
	$usertable="usu_usuarios";
	$yourfield = "nombre";
	
	// Create connection
	$conn = new mysqli($hostname, $username, $password,$dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
?>