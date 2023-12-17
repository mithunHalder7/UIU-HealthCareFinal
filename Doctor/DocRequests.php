<?php
// Assuming you have a database connection established in db.php
include '../db.php';

// Fetch the desired columns from the appointments table by joining with the users table
// $sql = "SELECT appointments.appointment_id, user.name, 
//         DATE_FORMAT(appointments.date, '%e %M, %Y') as formatted_date,
//         DATE_FORMAT(appointments.time, '%h:%i %p') as formatted_time,
//         appointments.status
//         FROM appointments 
//         INNER JOIN user ON appointments.user_id = user.id";

$sql = "SELECT appointments.appointment_id, user.name, 
        DATE_FORMAT(appointments.date, '%e %M, %Y') as formatted_date,
        DATE_FORMAT(appointments.time, '%h:%i %p') as formatted_time,
        appointments.status
        FROM appointments 
        INNER JOIN user ON appointments.user_id = user.id
        ORDER BY appointments.appointment_id DESC";


$result = mysqli_query($conn, $sql);

// Check for query execution success
if ($result) {
    // Fetch all rows as an associative array
    $appointments = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Handle the error if query execution fails
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="DocRequests.css">
</head>

<body>
    <?php include '../Global_Components/DoctorNavbar.php' ?>

    <div class="Patient-search">
        <form action="">
            <input type="search" class="navbar-search" placeholder="Search here">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
    </div>

    <div class="tableContainer" style="overflow: scroll;">
        <table>
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appointment) : ?>
                    <tr>
                        <td><?php echo $appointment['appointment_id']; ?></td>
                        <td><?php echo $appointment['name']; ?></td>
                        <td><?php echo $appointment['formatted_date']; ?></td>
                        <td><?php echo $appointment['formatted_time']; ?></td>
                        <td id="status-<?php echo $appointment['appointment_id']; ?>" class="status-cell">
                            <?php echo $appointment['status']; ?>
                        </td>


                        <td>
                            <input type="button" class="cancel" value="Cancel" onclick="updateStatus('<?php echo $appointment['appointment_id']; ?>', 'Cancelled')">
                            <input type="button" class="accept" value="Accept" onclick="updateStatus('<?php echo $appointment['appointment_id']; ?>', 'Accepted')">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php include '../Global_Components/footer.php' ?>


    <script>
        function updateStatus(appointmentId, newStatus) {
            const formData = new FormData();
            formData.append("appointment_id", appointmentId);
            formData.append("status", newStatus);

            fetch('update_status.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the status in the HTML table
                        const statusCell = document.getElementById(`status-${appointmentId}`);
                        statusCell.textContent = newStatus;

                        // Update the style dynamically
                        updateCellStyle(statusCell, newStatus);
                    } else {
                        console.error('Error:', data.error);
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }

        function updateCellStyle(cell, status) {
            // Update the style dynamically based on the appointment status
            if (status === 'Accepted') {
                cell.style.color = 'green';
            } else if (status === 'Cancelled') {
                cell.style.color = 'red';
            } else {
                cell.style.color = 'black'; // Default color
            }
        }

        function fetchUpdatedDataAndRefreshTable() {
            // Fetch updated data from the server
            fetch('fetch_updated_data.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Replace the entire table content with the updated data
                        const tableContainer = document.querySelector('.tableContainer');
                        tableContainer.innerHTML = data.tableContent;

                        // Update the styles for the new data
                        const statusCells = document.querySelectorAll('.status-cell');
                        statusCells.forEach(cell => {
                            const appointmentId = cell.id.replace('status-', '');
                            updateCellStyle(cell, data.appointments.find(app => app.appointment_id == appointmentId).status);
                        });
                    } else {
                        console.error('Error fetching updated data:', data.error);
                    }
                })
                .catch((error) => {
                    console.error('Error fetching updated data:', error);
                });
        }

        // Call fetchUpdatedDataAndRefreshTable at regular intervals
        setInterval(fetchUpdatedDataAndRefreshTable, 5000); // Adjust the interval as needed (e.g., every 5 seconds)
    </script>

</body>

</html>