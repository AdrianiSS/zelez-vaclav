<?php 
session_start();
require_once('connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize user input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);

    // Query the database to retrieve hashed password for the given username
    $query = "SELECT id, username, password FROM user WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Fetch user data
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Verify password
        if (password_verify($password, $stored_password)) {
            // Password is correct, set session and redirect to dashboard
            $_SESSION['username'] = $row['username'];

            function determineDestinationSite() {
                // Perform some logic to determine the destination site
                // For example, you could query a database based on user preferences or roles
            
                // Here's a simple example where we randomly choose a destination site
                $possible_sites = ['upload-image.php', 'upload-news.php']; // Example list of sites
                $random_index = array_rand($possible_sites); // Get a random index
                $destination_site = $possible_sites[$random_index]; // Get the corresponding site
            
                return $destination_site;
            }

            $destination_site = determineDestinationSite();
            if ($destination_site === 'upload-image.php') {
                header("Location: upload-image.php");
                exit();
            }
            elseif ($destination_site === 'upload-news.php') {
                header("Location: upload-news.php");
                exit();
            }
            else {
                header("Location: index.php");
        exit();
            }
            }
        }   else {
            // Invalid password
            $error_message = "Neplatné meno alebo heslo. Prosím, skúste to znovu.";
        }
    } else {
        // User not found
        $error_message = "Používateľ s daným menom neexistuje.";
    }

    // Close the database connection
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Prihlásenie</h2>
    
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
        <br>
        <input type="submit" value="Prihlásiť sa">
    </form>
    <br>
    <a href="../index.php">DOMOV</a>
</body>
</html>
