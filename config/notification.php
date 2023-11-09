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
    <button type="button" name="on">Zapnut</button>
    <button type="button" name="off">Vypnut</button>
    <script src="../js/script.js"></script>
</body>
</html>