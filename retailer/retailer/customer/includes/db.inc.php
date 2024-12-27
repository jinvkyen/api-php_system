<?php

	$server_name = "localhost";
	$db_username = "root";
	$db_password = "jinSQL";
	$db_name = "dbRetailer";
	
	$conn = mysqli_connect ($server_name, $db_username, $db_password, $db_name);
	
	
	if(!$conn) {
		die("Failed to connect to the server". mysqli_connect_error());
	} else {
		//echo "Connected Successfully";
	}
