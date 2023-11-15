<?php

// Only process POST requests.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbHost = 'localhost';
    $dbUser = 'impeefgv_mbztech';
    $dbPassword = 'Mbztech50.';
    $dbName = 'impeefgv_fortexs_consultation';

    $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the form fields and remove whitespace.
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r", "\n"), array(" ", " "), $name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["phone"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Check that data was sent to the script.
    if (empty($name) || empty($phone) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "Please complete the form and try again.";
        exit;
    }

    // Save the form data to the database
    $sql = "INSERT INTO form_data (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

    if ($stmt->execute()) {
        // Set a 200 (okay) response code.
        http_response_code(200);
        echo "Thank You! Your message has been saved.";
    } else {
        // Set a 500 (internal server error) response code.
        http_response_code(500);
        echo "Oops! Something went wrong and we couldn't save your message.";
    }

    $stmt->close();
    $conn->close();
} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>
