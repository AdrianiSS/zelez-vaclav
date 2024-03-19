<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

require 'connection.php';

if (isset($_POST["submit"])) {
    $name = $_POST["name"];

    if ($_FILES["image"]["error"] === 4) {
        echo "<script>alert('Vyberte obrazok')</script>";
    } else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('Nepodporovany format')</script>";
        } elseif ($fileSize > 1000000) {
            echo "<script>alert('Velkost obrazka je prilis velka')</script>";
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            $uploadDirectory = 'D:/xampp/htdocs/zelez-vaclav/tmp/';

            move_uploaded_file($tmpName, $uploadDirectory . $newImageName);

            // Use a prepared statement to prevent SQL injection
            $query = "INSERT INTO tb_upload (name, image) VALUES(?, ?)";
            $stmt = mysqli_prepare($conn, $query);

            // Check if the prepared statement was successful
            if ($stmt) {
                // Bind parameters to the statement
                mysqli_stmt_bind_param($stmt, 'ss', $name, $newImageName);

                // Execute the statement
                mysqli_stmt_execute($stmt);

                // Close the statement
                mysqli_stmt_close($stmt);

                header("Location: " . $_SERVER['PHP_SELF']);
                exit();

                echo "<script>
                        alert('Obrazok bol pridany');
                      </script>";
            } else {
                // Handle the error if the prepared statement fails
                echo "<script>alert('Prepared statement failed');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nahratie obrazkov</title>
</head>
<body>
    <h2>Welcome to the Dashboard, <?php echo $_SESSION["username"]; ?>!</h2>
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="name">Nazov: </label>
        <input type="text" name="name" id="name" required value=""> <br>
        <label for="image">Obrazok: </label>
        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"> <br> <br>
        <button type="submit" name="submit">Ulozit</button>
    </form>
    <?php
        $rows = mysqli_query($conn, "SELECT * FROM tb_upload ORDER BY id DESC");
        foreach ($rows as $row) :
    ?>
        <tr>
            <td><?= htmlspecialchars($row["name"]); ?></td>
            <td>
                <img src="../tmp/<?= htmlspecialchars($row['image']); ?>" width="100" height="100" alt="<?= htmlspecialchars($row['image']); ?>">
            </td>
            <td>
                <a href="delete-image.php?image_id=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this image?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <br>
    <a href="../offer.php">Spat na ponuku</a>
    <a href="logout.php">Logout</a>
    <script src="../js/script.js"></script>
</body>
</html>