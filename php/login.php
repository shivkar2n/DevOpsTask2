<?php
session_start();
if (isset($_SESSION["id"])) {
	header('location: /dashboard.php',200);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login</title>
</head>

<body>
	<?php
	$title = "Login";
	include "nav.php";
	?>
	<form action="api/login.php" method="post">
		<label for="username">Username:</label>
		<input type="text" name="username" />
		<br />
		<label for="password">Password:</label>
		<input type="password" name="password" />
		<br />
		<button type="submit">Submit</button>
	</form>
</body>

</html>
