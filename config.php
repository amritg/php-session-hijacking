<?php
	$serverName = "localhost";
	$userName  = "amritg";
	$password = "root";
	$dbName = "injection";
	$conn = mysqli_connect($serverName, $userName, $password, $dbName);

	$message = '';
	if(!$conn){
		die("Connection failed");
	}
?>
