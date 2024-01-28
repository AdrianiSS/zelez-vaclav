<?php 
    require 'connection.php';
    if (isset($_POST["submit"])){
        $notification = $_POST["notification"];
        $sql = "INSERT INTO notifications (notification) VALUES ('$notification')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Data Inserted";
        }
        else {
            echo "Data Not";
        }
        mysqli_close($conn); 
    }

    if (isset($_POST["on"])) {
        $sqlUpdateStatus = "UPDATE notifications SET status = 1";
        mysqli_query($conn, $sqlUpdateStatus);
    }

    if (isset($_POST["off"])) {
        $sqlUpdateStatus = "UPDATE notifications SET status = 0";
        mysqli_query($conn, $sqlUpdateStatus);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" autocomplete="off">
        <label for="notification">Zadat notifikaciu</label>
        <input type="text" name="notification" id="notification" required value="">
        <button type="submit" name="submit">Odoslat</button>
    </form>
    <form action="" method="post">
        <button type="submit" name="on">Zapnut</button>
        <button type="submit" name="off">Vypnut</button>
    </form>
    <button id="togglePopupButton">Toggle Popup</button>
    
    <script src="../js/script.js"></script>
</body>
</html>