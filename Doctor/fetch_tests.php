<?php
// Assuming you have a database connection established in db.php
include '../db.php';

// Fetch tests from the database
$sql = "SELECT test_id, test_name FROM tests";
$result = mysqli_query($conn, $sql);

if ($result) {
    $tests = mysqli_fetch_all($result, MYSQLI_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($tests);
} else {
    echo json_encode(['error' => mysqli_error($conn)]);
}

mysqli_close($conn);
?>
