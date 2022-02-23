    <?php include "./connect.php";
        session_start();
        $sql = "SELECT user_id from devopsTask.user WHERE username='{$_POST["reciever"]}'";
        $recieverId = $conn->query($sql)->fetch_array()[0];
        $sendTime =date('Y-m-d h:m:s');  
        $sql = "INSERT INTO `devopsTask`.`update` (`sender_id`, `reciever_id`, `message`, `sentTime`) VALUES ('{$_SESSION['id']}','{$recieverId}', '{$_POST['message']}', '{$sendTime}')";
        print_r($sql);
        $conn->query($sql);
        $conn->close();
        header('location: /dashboard.php',200);
    ?>