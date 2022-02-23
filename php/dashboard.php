<?php
session_start();
if (!isset($_SESSION["id"])) {
	header('location: /login.php',200);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
</head>

<body>
	<?php
	$title = "Dashboard";
	include "nav.php";
	?>

	<div class="container">
		<?php include "./api/connect.php";

		$sql = "SELECT M.sender_id, M.message, M.sentTime 
		FROM devopsTask.user as U 
		join devopsTask.update as M 
			on U.user_id = M.reciever_id
			WHERE U.user_id = {$_SESSION["id"]}";
			
		function senderName($id)
		{
			return "SELECT U.username
				FROM devopsTask.user as U
				WHERE U.user_id = {$id}";
		}
		$result = $conn->query($sql);
		$temp = $result->fetch_all();

		print_r("<hr>");
		if ($result->num_rows > 0) {
			for ($i=0; $i < sizeof($temp); $i++) { 
				print_r("Message: {$temp[$i][1]}<br>");
				print_r("Sent Time: {$temp[$i][2]}<br>");
				$msg = $conn->query(senderName($temp[$i][0]));
				print_r("Sender: {$msg->fetch_array()[0]}<br><br><hr>");
			}
		}
		$conn->close();
		?>
	</div>
</body>

</html>
