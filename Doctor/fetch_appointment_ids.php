<?php
// Assuming you have a database connection in your db.php file
include '../db.php';

// Fetch appointment IDs from the database
$sql = "SELECT appointment_id FROM appointments WHERE status='Accepted' ORDER BY appointment_id DESC";


$result = mysqli_query($conn, $sql);

if ($result) {
    $appointmentIds = mysqli_fetch_all($result, MYSQLI_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($appointmentIds);
} else {
    echo json_encode(['error' => mysqli_error($conn)]);
}

mysqli_close($conn);
?>
