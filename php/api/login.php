<?php include "connect.php";

session_start();
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM devopsTask.user WHERE username='$username' and password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "Successful login";
	$temp = $result->fetch_all(MYSQLI_ASSOC)[0];
	$_SESSION["id"] = $temp["user_id"];
	$_SESSION["username"] = $temp["username"];
	header('location: /dashboard.php',200);
} else {
	header('location: /login.php',404);
}
$conn->close();
