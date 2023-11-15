<?php
$response = array(); // Initialize response array

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if (!$email) {
        $response['status'] = 'error';
        $response['message'] = 'Invalid email format';
    } else {
        // Establish database connection
        $dbHost = 'localhost';
        $dbUser = 'impeefgv_mbztech';
        $dbPassword = 'Mbztech50.';
        $dbName = 'impeefgv_fortexs_consultation';
    
        $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

        if (!$conn) {
            $response['status'] = 'error';
            $response['message'] = 'Connection failed: ' . mysqli_connect_error();
        } else {
            // Construct the INSERT query
            $insert_query = "INSERT INTO subscribers (email) VALUES ('$email')";

            // Execute the INSERT query
            if (mysqli_query($conn, $insert_query)) {
                $response['status'] = 'success';
                $response['message'] = 'Subscription successful!';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Error: ' . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }

    // Send the response as JSON
    echo json_encode($response);
}
?>
