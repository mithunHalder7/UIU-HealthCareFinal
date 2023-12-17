<?php
// Include your database connection
include '../db.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the POST request
    $appointmentId = $_POST["appointment_id"];
    $newStatus = $_POST["status"];

    // TODO: Validate data and handle errors

    // Update the status in the database
    $updateSql = "UPDATE appointments SET status = '$newStatus' WHERE appointment_id = '$appointmentId'";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        // Success
        echo json_encode(["success" => true]);
    } else {
        // Error
        echo json_encode(["success" => false, "error" => mysqli_error($conn)]);
    }
} else {
    // Handle non-POST requests if needed
    echo json_encode(["success" => false, "error" => "Invalid request method"]);
}

// Close the database connection
mysqli_close($conn);
?>
