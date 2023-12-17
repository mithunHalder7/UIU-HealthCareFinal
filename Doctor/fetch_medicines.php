<?php
// Assuming you have a database connection established in db.php
include '../db.php';

// Fetch medicines from the database
$sql = "SELECT medicine_id, medicine_name FROM medicines";
$result = mysqli_query($conn, $sql);

if ($result) {
    $medicines = mysqli_fetch_all($result, MYSQLI_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($medicines);
} else {
    echo json_encode(['error' => mysqli_error($conn)]);
}

mysqli_close($conn);
?>
