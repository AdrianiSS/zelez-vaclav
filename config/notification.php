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
        mysqli_free_result ($result);
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
    <form action="" method="post" autocomplete="off" enctype="text/plain">
        <label for="notification">Zadat notifikaciu</label>
        <input type="text" name="notification" id="notification" required value="" rows="4" cols="50">
        <button type="submit" name="submit">Odoslat</button>
    </form>
</body>
</html>