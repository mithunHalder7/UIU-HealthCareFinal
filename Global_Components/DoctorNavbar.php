<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  


// Logout logic
if (isset($_GET['logout'])) {
    // Clear all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location:../login.php");
    exit();
}
// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page if not logged in
    header("Location:../login.php");
    exit();
}

$dynamicPart = $_SESSION["user_image_path"];
$navbarImagePath = "../images/" . $dynamicPart;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Global_Components/PatientNavbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <!-- this code is for navbar -->

    <div id="navbar_custom">
        <div class="nav-img">
            <a href=""><img src="../images/Frame 2.svg" alt=""></a>
        </div>
        <div id="nav_link_custom">
            <ul>
                <li><a href="../Doctor/Doctorhome.php">Home</a></li>
                <li><a href="../Doctor/DocRequests.php">Requests</a></li>
                <li><a href="../Doctor/patients_record.php">Records</a></li>
                <li><a href="../Doctor/prescription.php">Prescriptions</a></li>
                <li><a href="../Doctor/faq.php">FAQ</a></li>

            </ul>

        </div>
        <div class="nav-search">
            <form action="">
                <input type="search" class="navbar-search" placeholder="Search here">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <div class="nav-icons">
            <ul>
                <li>
                    <!-- Add an ID to the profile picture for JavaScript manipulation -->
                    <img src="<?php echo $navbarImagePath; ?>" alt="Profile" class="profile-picture" id="profilePicture">
                    <!-- Dropdown menu -->
                    <div class="dropdown" id="dropdown">
                        <a href="?logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <script>
        // Add JavaScript code for the profile picture dropdown menu
        document.addEventListener("DOMContentLoaded", function() {
            const profilePicture = document.getElementById("profilePicture");
            const dropdown = document.getElementById("dropdown");

            profilePicture.addEventListener("click", function() {
                // Toggle the dropdown menu
                if (dropdown.style.display === "block") {
                    dropdown.style.display = "none";
                } else {
                    dropdown.style.display = "block";
                }
            });

            // Close the dropdown menu if the user clicks outside of it
            window.addEventListener("click", function(event) {
                if (!event.target.matches('.profile-picture')) {
                    if (dropdown.style.display === "block") {
                        dropdown.style.display = "none";
                    }
                }
            });
        });
    </script>
</body>

</html>