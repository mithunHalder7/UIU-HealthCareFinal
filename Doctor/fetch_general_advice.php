<?php
// Assuming you have a database connection established in db.php
include '../db.php';

// Fetch general advice from the database
$sql = "SELECT advice_id , advice_text FROM general_advice";
$result = mysqli_query($conn, $sql);

if ($result) {
    $advice = mysqli_fetch_all($result, MYSQLI_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($advice);
} else {
    echo json_encode(['error' => mysqli_error($conn)]);
}

mysqli_close($conn);
?>
