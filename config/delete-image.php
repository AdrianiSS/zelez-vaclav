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

    // Retrieve the image information from the first table
    $query1 = "SELECT image FROM tb_upload WHERE id = ?";
    $stmt1 = mysqli_prepare($conn, $query1);

    if ($stmt1) {
        mysqli_stmt_bind_param($stmt1, "i", $imageId);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_bind_result($stmt1, $imageName1);
        mysqli_stmt_fetch($stmt1);
        mysqli_stmt_close($stmt1);

        // Retrieve the corresponding image information from the second table
        $query2 = "SELECT image FROM upload_news WHERE id = ?";
        $stmt2 = mysqli_prepare($conn, $query2);

        if ($stmt2) {
            mysqli_stmt_bind_param($stmt2, "i", $imageId);
            mysqli_stmt_execute($stmt2);
            mysqli_stmt_bind_result($stmt2, $imageName2);
            mysqli_stmt_fetch($stmt2);
            mysqli_stmt_close($stmt2);

            // Prompt the user for confirmation before deleting the image
            $confirmed = "<script>confirm('Are you sure you want to delete this image?');</script>";
            if ($confirmed) {
                // Use prepared statement for the delete operation in the first table
                $deleteQuery1 = "DELETE FROM tb_upload WHERE id = ?";
                $deleteStmt1 = mysqli_prepare($conn, $deleteQuery1);

                if ($deleteStmt1) {
                    mysqli_stmt_bind_param($deleteStmt1, "i", $imageId);
                    mysqli_stmt_execute($deleteStmt1);
                    mysqli_stmt_close($deleteStmt1);

                    // Use prepared statement for the delete operation in the second table
                    $deleteQuery2 = "DELETE FROM upload_news WHERE id = ?";
                    $deleteStmt2 = mysqli_prepare($conn, $deleteQuery2);

                    if ($deleteStmt2) {
                        mysqli_stmt_bind_param($deleteStmt2, "i", $imageId);
                        mysqli_stmt_execute($deleteStmt2);
                        mysqli_stmt_close($deleteStmt2);

                        // Delete the image files from the server
                        $uploadDirectory = './config/tmp/';
                        $uploadDirectory2 = './config/tmp-img-news';
                        $imagePath1 = $uploadDirectory . $imageName1;
                        $imagePath2 = $uploadDirectory2 . $imageName2;

                        if (file_exists($imagePath1)) {
                            unlink($imagePath1); // Delete the file from the first table
                        }

                        if (file_exists($imagePath2)) {
                            unlink($imagePath2); // Delete the file from the second table
                        }

                        function backDestinationSite() {
                            // Perform some logic to determine the destination site
                            // For example, you could query a database based on user preferences or roles
                        
                            // Here's a simple example where we randomly choose a destination site
                            $possible_sites = ['upload-image.php', 'upload-news.php']; // Example list of sites
                            $random_index = array_rand($possible_sites); // Get a random index
                            $destination_site = $possible_sites[$random_index]; // Get the corresponding site
                        
                            return $destination_site;
                        }
                        $destination_site = backDestinationSite();
                        if ($destination_site === 'upload-image.php') {
                            header("Location: upload-image.php");
                            exit();
                        } elseif ($destination_site === 'upload-news.php') {
                            header("Location: upload-news.php");
                            exit();
                        } else {
                            header("Location: index.php");
                            exit();
                        } // Stop further execution
                    } else {
                        echo "<script>alert('Failed to delete image record from the second table');</script>";
                    }
                } else {
                    echo "<script>alert('Failed to delete image record from the first table');</script>";
                }
            }
        } else {
            echo "<script>alert('Failed to retrieve image information from the second table');</script>";
        }
    } else {
        echo "<script>alert('Failed to retrieve image information from the first table');</script>";
    }
} else {
    echo "<script>alert('Image ID not provided');</script>";
}
?>