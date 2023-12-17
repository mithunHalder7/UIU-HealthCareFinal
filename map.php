<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nearest Hospital Locator</title>
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for the map page -->
  <style>
    #map {
      height: 400px;
      width: 100%;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">My Map Page</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <button class="btn btn-primary" onclick="searchNearestHospital()">Search Nearest Hospital</button>
        </li>
      </ul>
    </div>
  </div>
</nav>



<!-- Map Container -->
<div class="container mt-4">
  <div id="map"></div>
</div>

<!-- Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Custom JavaScript for the map functionality -->
<script>
  // Initialize the map
  var map = L.map('map').setView([0, 0], 12);

  // Add the OpenStreetMap tile layer
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);

  // Function to search for the nearest hospital
  function searchNearestHospital() {
    // Implement your logic to find the nearest hospital based on user's location
    // Update the map or perform any other actions
    // ...

    // For now, let's just center the map to a sample location (change as needed)
    map.setView([37.7749, -122.4194], 15); // San Francisco, CA
  }
</script>

<!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
