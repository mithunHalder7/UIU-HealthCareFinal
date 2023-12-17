<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "healthsync";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read the image file as binary data
$imageData = file_get_contents('Images/doc.jpg');

// Insert the image data into the database
$stmt = $conn->prepare("INSERT INTO doctor (image) VALUES (?)");
$stmt->bind_param("b", $imageData);
$stmt->execute();

echo "Image inserted successfully.";

// Close connection
$stmt->close();
$conn->close();
?>