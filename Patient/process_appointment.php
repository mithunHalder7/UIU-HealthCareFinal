<?php
session_start();
include '../db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id = $_SESSION['user_id'];
    $studentId = $_POST["student_id"];
    $age = $_POST["age"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $reason = $_POST["reason"];

    // TODO: Add validation and sanitization for the form data as needed

    // Now, you can perform actions like saving the appointment to a database, sending emails, etc.

    // Prepare the SQL statement to insert the appointment details
    $sql = "INSERT INTO appointments (user_id, student_id, age, date, time, contact, reason, status) 
   VALUES ($user_id, '$studentId', $age, '$date', '$time', '$contact', '$reason', 'Pending')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        // Display a toaster notification using JavaScript
        echo "<script>
                alert('Appointment created successfully!');
                window.location.href = '../Patient/patientAppointmentForm.php'; // Redirect to the form
             </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }



    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted, you can add any initial code here
    // For example, you might want to redirect the user to the form page
    header("Location: ../Patient/patientAppointmentForm.php");
    exit();
}
