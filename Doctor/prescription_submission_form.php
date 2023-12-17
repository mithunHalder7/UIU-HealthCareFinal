<?php
// Replace these with your actual database credentials
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Log the form values
    error_log(print_r($_POST, true));

    // Extract form values
    $appointmentId = $_POST['appointmentId'];
    $medicines = $_POST['medicines'];
    $dosages = $_POST['dosages'];
    $tests = $_POST['tests'];
    $generalAdvices = $_POST['generalAdvices'];

    // Insert appointment details into the appointments table

    // Insert medicines into the medicines table
    foreach ($medicines as $key => $medicine) {
        // Assuming dosages are stored in an array $dosages
        $dosage = isset($dosages[$key]) ? $dosages[$key] : null;

        // Assuming appointmentId is already defined
        $sqlMedicine = "INSERT INTO medicine_records (appointment_id, medicine_id, dosages) VALUES ('$appointmentId', '$medicine', '$dosage')";

        if ($conn->query($sqlMedicine) !== TRUE) {
            echo "Error inserting into medicine_records table: " . $conn->error;
        }
    }

    // Insert tests into the tests table
    foreach ($tests as $test) {
        $sqlTest = "INSERT INTO test_records (appointment_id, test_id) VALUES ('$appointmentId', '$test')";
        if ($conn->query($sqlTest) !== TRUE) {
            echo "Error inserting into tests table: " . $conn->error;
        }
    }

    // Insert general advices into the general_advices table
    foreach ($generalAdvices as $advice) {
        $sqlAdvice = "INSERT INTO general_advices_records (appointment_id, advice_id) VALUES ('$appointmentId', '$advice')";
        if ($conn->query($sqlAdvice) !== TRUE) {
            echo "Error inserting into general_advices table: " . $conn->error;
        }
    }

    
    header("Location: prescription.php");
    exit();
}

// Close the database connection
$conn->close();
