<?php
	$conn = new mysqli('localhost', 'root', '', 'attsystem');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>