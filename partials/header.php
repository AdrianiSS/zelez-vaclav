<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="./img/favicon.png" type="image/x-icon">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <div class="logo">
            <a href="index.php"><img src="img/logo-nav.png" alt="zeleziarstvovaclav"></a>
        </div>
        <div class="toggle">
            <a><ion-icon name="menu-outline"></ion-icon></a>
            <a><ion-icon name="close-outline"></ion-icon></a>
        </div>
        <ul class="menu">
            <li><a href="index.php">Domov</a></li>
            <li><a href="offer.php">Ponuka</a></li>
            <li><a href="news.php">Novinky</a></li>
            <li><a href="contact.php">Kontakt</a></li>
            <li><a href="mailto:adrianzivcic@gmail.com"><ion-icon name="mail-outline"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
        </ul>
    </nav>
    <main>