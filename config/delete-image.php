<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

require 'connection.php';

if (isset($_GET["image_id"])) {
    $imageId = $_GET["image_id"];

    // Retrieve the image information from the database
    $query = "SELECT image FROM tb_upload WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $imageId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $imageName);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);


        $confirmation = '<script>
            confirm("Are you sure you want to delete this image?");
        </script>';

        if ($confirmation) {
            $deleteQuery = "DELETE FROM tb_upload WHERE id = ?";
            $deleteStmt = mysqli_prepare($conn, $deleteQuery);
        }
        // Delete the record from the database
        if ($deleteStmt) {
            mysqli_stmt_bind_param($deleteStmt, "i", $imageId);
            mysqli_stmt_execute($deleteStmt);
            mysqli_stmt_close($deleteStmt);

            // Delete the image file from the server
            $uploadDirectory = 'D:/xampp/htdocs/zelez-vaclav/tmp/';
            $imagePath = $uploadDirectory . $imageName;

            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the file
            }

            echo "<script>
                    alert('Obrazok bol odstraneny');
                    window.location.href = '../config/upload-image.php';
                  </script>";
        }   else {
            echo "<script>alert('Failed to delete image record');</script>";
        }
    }       else {
        echo "<script>alert('Failed to retrieve image information');</script>";
    }
} else {
    echo "<script>alert('Image ID not provided');</script>";
}
?>