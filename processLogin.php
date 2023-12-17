<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = ($_POST["password"]);

    // Query to check if the user is a patient
    $sqlPatient = "SELECT id, navbar_image FROM user WHERE email LIKE '%$email%' AND password = '$password'";
    $resultPatient = mysqli_query($conn, $sqlPatient);
    $dataPatient = $resultPatient->fetch_assoc();
    $numPatient = mysqli_num_rows($resultPatient);

    // Query to check if the user is an admin
    $sqlAdmin = "SELECT id, navbar_image FROM user WHERE email LIKE '%$email%' AND password = '$password'";
    $resultAdmin = mysqli_query($conn, $sqlAdmin);
    $dataAdmin = $resultAdmin->fetch_assoc();
    $numAdmin = mysqli_num_rows($resultAdmin);

    if ($numPatient == 1 && stripos($email, 'bscse') !== false) {
        // Set session variables for the patient
        $_SESSION["user_id"] = $dataPatient["id"];
        $_SESSION["user_image_path"] = $dataPatient["navbar_image"];

        // Print the results
        echo "Patient ID: " . $_SESSION["user_id"] . "<br>";
        echo "Patient Image Path: " . $_SESSION["user_image_path"] . "<br>";

        // Redirect to Patient_home.php for patients
        header("location:./Patient/Patient_home.php");
        exit();
    } elseif ($numAdmin == 1 && stripos($email, 'admin') !== false) {
        // Set session variables for the admin
        $_SESSION["user_id"] = $dataAdmin["id"];
        $_SESSION["user_image_path"] = $dataAdmin["navbar_image"];

        // Print the results
        echo "Admin ID: " . $_SESSION["user_id"] . "<br>";
        echo "Admin Image Path: " . $_SESSION["user_image_path"] . "<br>";

        // Redirect to Doctorhome.php for admins
        header("location:./Doctor/Doctorhome.php");
        exit();
    } else {
        $errorMessage = "Invalid email or password. Please try again.";
    }
}
?>
