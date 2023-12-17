<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
   

    <style>

        .editBtn{
            padding: 10px 20px;
            font-size: 16px;
            background-color: #FCA311;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        
    </style>
</head>


<body>

    <!-- this code is for navbar -->
    <div id="navbar_custom">
        <div class="nav-img">
            <a href=""><img src="../images/Frame 2.svg" alt=""></a>
        </div>
        <div id="nav_link_custom">
            <ul>
                <li><a href="../Patient/Patient_home.php">Home</a></li>
                <li><a href="../Patient/patientAppointmentForm.php">Appointment</a></li>
                <li><a href="../Patient/patients_record.php">Records</a></li>
                <li><a href="../Patient/faq.php">FAQ</a></li>
            
            </ul>
        </div>
        <button  class="editBtn" onclick="findNearestHospital()">Find Nearest Hospital</button>
        <button class="editBtn" id="closeMapButton" onclick="closeMap()">Close Map</button>
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

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script>
        function findNearestHospital() {
            const geoapifyApiKey = '76b3e48a247c42649e9be64f78231733';

            // Get the map container and close button
            const mapContainer = document.getElementById('map');
            const closeMapButton = document.getElementById('closeMapButton');

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };

                    // Show the map container and close button
                    mapContainer.style.display = 'block';
                    closeMapButton.style.display = 'block';

                    const map = L.map('map').setView(userLocation, 13);

                    // Use a different tile provider (OpenStreetMap) to ensure the map background shows
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(map);

                    const userMarker = L.marker(userLocation).addTo(map).bindPopup('Your Location');

                    fetch(`https://api.geoapify.com/v2/places?categories=healthcare&lat=${userLocation.lat}&lon=${userLocation.lng}&apiKey=${geoapifyApiKey}`)
                        .then(response => response.json())
                        .then(hospitals => {
                            hospitals.features.forEach(hospital => {
                                const hospitalLocation = [hospital.geometry.coordinates[1], hospital.geometry.coordinates[0]];
                                const hospitalMarker = L.marker(hospitalLocation).addTo(map).bindPopup(hospital.properties.name);

                                // Add a click event to the hospital marker to show directions
                                hospitalMarker.on('click', function() {
                                    L.Routing.control({
                                        waypoints: [
                                            L.latLng(userLocation.lat, userLocation.lng),
                                            L.latLng(hospitalLocation[0], hospitalLocation[1])
                                        ],
                                        routeWhileDragging: true
                                    }).addTo(map);
                                });
                            });

                            const bounds = L.latLngBounds(userLocation);
                            hospitals.features.forEach(hospital => {
                                bounds.extend([hospital.geometry.coordinates[1], hospital.geometry.coordinates[0]]);
                            });
                            map.fitBounds(bounds);
                        })
                        .catch(error => {
                            console.error('Error fetching hospital data:', error);
                        });
                }, function(error) {
                    console.error('Error getting user location:', error);
                });
            } else {
                console.error('Geolocation is not supported by this browser.');
            }
        }

        function closeMap() {
            // Hide the map container and close button
            document.getElementById('map').style.display = 'none';
            document.getElementById('closeMapButton').style.display = 'none';
        }

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