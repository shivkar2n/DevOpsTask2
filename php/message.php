<?php
session_start();
if (!isset($_SESSION["id"])) {
	header('location: /login.php',200);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Send Message</title>
  </head>
  <body>
    <?php
	$title = "Send Message";
	include "nav.php";
	?>
    <form action="api/send.php" method="post">
      <label for="reciever">Reciever</label>
      <select name="reciever" value="Send To:" >
      <?php include "./api/connect.php";
          $sql = "SELECT username from devopsTask.user WHERE username != '{$_SESSION["username"]}'";
          $result = $conn->query($sql);
          $temp = $result->fetch_all();

          if ($result->num_rows > 0) {
            for ($i=0; $i < sizeof($temp); $i++) { 
              print_r("<option>{$temp[$i][0]}</option>");
            }
          }
          $conn->close();
        ?>
      </select>
      <br />
      <br />
      <label for="message">Message</label>
      <input type="text" name="message" />
      <br />
      <button type="submit">Send</button>
    </form>
  </body>
</html>

