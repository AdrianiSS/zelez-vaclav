<?php
require 'connection.php';

    function insertNotification($conn, $notification) {
        $sql = "INSERT INTO notifications (notification) VALUES (?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $notification);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo "Data Inserted";
            } else {
                echo "Data Not Inserted";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Statement preparation failed.";
        }
    }

    function updateStatus($conn, $status) {
        $sqlUpdateStatus = "UPDATE notifications SET status = ?";
        $stmt = mysqli_prepare($conn, $sqlUpdateStatus);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $status);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
        } else {
            echo "Statement preparation failed.";
        }
    }

    if (isset($_POST["submit"])) {
        $notification = $_POST["notification"];
        insertNotification($conn, $notification);
    }

    if (isset($_POST["on"])) {
        updateStatus($conn, 1);
    }

    if (isset($_POST["off"])) {
        updateStatus($conn, 0);
    }

    mysqli_close($conn);
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