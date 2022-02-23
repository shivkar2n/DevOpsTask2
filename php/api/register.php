<?php include "connect.php";

try {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$sql = "INSERT INTO `devopsTask`.`user` (`username`, `password`) VALUES ('$username', '$password')";
	if ($conn->query($sql) === TRUE) {
		return http_response_code(200);
	} else
		throw new Exception("");
} catch (Exception $e) {
	echo "Error: " . $sql . "<br>" . $conn->error;
	return http_response_code(500);
} finally {
	$conn->close();
}
