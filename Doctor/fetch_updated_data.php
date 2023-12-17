<?php
include '../db.php';

// Fetch the desired columns from the appointments table by joining with the users table
$sql = "SELECT appointments.appointment_id, user.name, appointments.date, appointments.time, appointments.status
        FROM appointments
        INNER JOIN user ON appointments.user_id = user.id";

$result = mysqli_query($conn, $sql);

// Check for query execution success
if ($result) {
    // Fetch all rows as an associative array
    $appointments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($appointments);
} else {
    // Handle the error if query execution fails
    echo json_encode(['error' => mysqli_error($conn)]);
}

// Close the database connection
mysqli_close($conn);
?>
