<?php 
    session_start();

    // Check if the user is not logged in
    if (!isset($_SESSION['username'])) {
        // Redirect to the login page if not logged in
        header("Location: ./login.php");
        exit();
    }
    
    require 'connection.php';

    if (isset($_POST["submit"])) {
        $name = htmlspecialchars($_POST["name"]);
        $image_id = $_POST["image_id"];

        // Check if the image file is uploaded
        if ($_FILES["image"]["error"] !== 4) {
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

                $ftpHost = 'ftp.zeleziarstvovaclav.sk';
                $ftpUsername = 'ws040912';
                $ftpPassword = 'c747eL1jFREDHFDmt1lS3z';
                $ftpDirectory = './config/tmp-img-news/';

                $ftpConnection = ftp_connect($ftpHost);
                if ($ftpConnection) {
                    if (ftp_login($ftpConnection, $ftpUsername, $ftpPassword)) {
                        ftp_pasv($ftpConnection, true);
                        ftp_chdir($ftpConnection, $ftpDirectory);
                        if (ftp_put($ftpConnection, $newImageName, $tmpName, FTP_BINARY)) {
                            if (!empty($image_id)) {
                                // Update existing image with new image and name
                                $query = "UPDATE upload_news SET name = ?, image = ? WHERE id = ?";
                                $stmt = mysqli_prepare($conn, $query);
                                mysqli_stmt_bind_param($stmt, 'ssi', $name, $newImageName, $image_id);
                                mysqli_stmt_execute($stmt);
                            } else {
                                // Insert new image with name
                                $query = "INSERT INTO upload_news (name, image) VALUES (?, ?)";
                                $stmt = mysqli_prepare($conn, $query);
                                mysqli_stmt_bind_param($stmt, 'ss', $name, $newImageName);
                                mysqli_stmt_execute($stmt);
                            }
                            echo "<script>alert('Obrázok bol pridaný/upravený');</script>";
                        } else {
                            echo "<script>alert('Nepodarilo sa nahrať obrázok na FTP server');</script>";
                        }
                    } else {
                        echo "<script>alert('Prihlásenie na FTP server zlyhalo');</script>";
                    }
                    ftp_close($ftpConnection);
                } else {
                    echo "<script>alert('Nepodarilo sa pripojiť k FTP serveru');</script>";
                }
            }
        } else {
            // Update only the name if no image is uploaded
            if (!empty($image_id)) {
                $query = "UPDATE upload_news SET name = ? WHERE id = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, 'si', $name, $image_id);
                mysqli_stmt_execute($stmt);

                echo "<script>alert('Názov bol úspešne aktualizovaný');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nahratie obrazkov do noviniek</title>
</head>
<body>
    <h2>Vitaj v nahrávaní obrázkov pre sekciu Novinky, <?php echo htmlspecialchars($_SESSION["username"]);
        ?>!</h2>
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="name">Názov: </label>
        <input type="text" name="name" id="name" required value=""> <br>
        <label for="image">Obrázok: </label>
        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" required value=""> <br> <br>
        <input type="hidden" name="image_id" id="image_id" value="">
        <button type="submit" name="submit">Uložiť</button>
        <br>
        <br>
        <br>
    </form>
    <?php
        $rows = mysqli_query($conn, "SELECT * FROM upload_news ORDER BY id DESC");
        foreach ($rows as $row) :
    ?>
        <div>
            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                <input type="text" name="name" value="<?= htmlspecialchars($row["name"]); ?>">
                <input type="file" name="image" id="edit_image" accept=".jpg, .jpeg, .png">
                <input type="hidden" name="image_id" value="<?= $row['id']; ?>">
                <button type="submit" name="submit">Upraviť</button>
                <a href="delete-image.php?image_id=<?= $row['id']; ?>&source_page=upload-news.php">Vymazat</a>
            </form>
        </div>
        <img src="./tmp-img-news/<?= htmlspecialchars($row['image']); ?>" width="100" height="100" alt="<?= htmlspecialchars($row['image']); ?>">
    <?php endforeach; ?>
    <br>
    <a href="../news.php">Spat na novinky</a>
    <a href="logout.php">Odhlásiť sa!</a>
</body>
</html>