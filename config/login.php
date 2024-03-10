<?php 
session_start();
require_once ('connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize user input to prevent SQL injection (you can use prepared statements for better security)
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query the database to check user credentials
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        // Valid credentials, redirect to dashboard
        header("Location: upload-image.php");
        exit();
    } else {
        // Invalid credentials, display an error message
        echo "Neplatne meno alebo heslo. Prosim, skuste to znovu.";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Prihlasenie</h2>
    
    <?php
    // Display error message if login fails
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>
    
    <form action="login.php" method="post">
        <label for="username">Meno:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Heslo:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Prihlasit sa">
    </form>
    <a href="../index.php">DOMOV</a>
</body>
</html>