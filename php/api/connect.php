	<?php
	$servername = "localhost";
	$username = "shivkar2n";
	$password = "password";
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	?>
