<?php 
    require 'connection.php';
    if (isset($_POST["submit"])){
        $name = $_POST["name"];
        if($_FILES["image"]["error"] === 4){
           echo
                "<script>
                    alert('Obrazok neexistuje')
                </script>"; 
        }
        else{
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
            if(!in_array($imageExtension, $validImageExtension)){
                echo
                    "<script>
                        alert('Nepodporovany format')
                    </script>";
            }
            elseif($fileSize > 1000000){
                echo
                    "<script>
                        alert('Velkost obrazka je prilis velka')
                    </script>";
            }
            else{
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;

                move_uploaded_file($tmpName, '/Users/adrianzivcic/www/zelez-vaclav/tmp_img_news/' . $newImageName);
                $query = "INSERT INTO upload_news (name, image) VALUES('$name', '$newImageName')";
                mysqli_query($conn, $query);
                echo
                    "<script>
                        alert('Obrazok bol pridany')
                        document.location.href = '../offer.php'
                    </script>";
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
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="name">Nazov: </label>
        <input type="text" name="name" id="name" required value=""> <br>
        <label for="image">Obrazok: </label>
        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"> <br> <br>
        <button type="submit" name="submit">Ulozit</button>
    </form>
    <br>
    <a href="../news.php">Spat na novinky</a>
    <script src="../js/script.js"></script>
</body>
</html>