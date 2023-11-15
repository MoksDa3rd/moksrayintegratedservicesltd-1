<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['pass'];

    // Database connection (replace with your actual credentials)
    $dbHost = 'localhost';
    $dbUser = 'impeefgv_mbztech';
    $dbPassword = 'Mbztech50.';
    $dbName = 'impeefgv_fortexs_consultation';

    $conn = mysqli_connect($dbHost, $dbUser  , $dbPassword , $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve hashed password from database based on username
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();

    if ($hashedPassword !== null) {
        // Verify password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, start a session
            $_SESSION['username'] = $username;
            header("Location: coming-soon.php"); // Redirect to dashboard
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Username does not exist";
    }

    $conn->close();
}
?>
<!-- Your HTML login form -->
<!-- ... -->
