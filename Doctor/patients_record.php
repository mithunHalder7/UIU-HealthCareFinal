<?php
// Assuming you have already established a database connection
include('../db.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user_id = $_SESSION['user_id'];

// Pagination
$recordsPerPage = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $recordsPerPage;

// Handle search functionality
$search_user_id = isset($_GET['search_user_id']) ? $_GET['search_user_id'] : '';
if (!empty($search_user_id)) {
    // If a user_id is provided in the search box, filter records for that user_id
    $search_condition = "AND a.user_id = $search_user_id";
} else {
    $search_condition = '';
}

// Query to fetch all records for each appointment
$sqlAllRecords = "
SELECT
    m.medicine_name,
    mr.dosages,
    t.test_name,
    ga.advice_text
FROM
    appointments a
LEFT JOIN
    medicine_records mr ON a.appointment_id = mr.appointment_id
LEFT JOIN
    medicines m ON mr.medicine_id = m.medicine_id
LEFT JOIN
    test_records tr ON a.appointment_id = tr.appointment_id
LEFT JOIN
    tests t ON tr.test_id = t.test_id
LEFT JOIN
    general_advices_records gar ON a.appointment_id = gar.appointment_id
LEFT JOIN
    general_advice ga ON gar.advice_id = ga.advice_id
WHERE
    1=1 $search_condition
    AND (m.medicine_name IS NOT NULL OR mr.dosages IS NOT NULL)
ORDER BY
    a.date DESC
LIMIT $offset, $recordsPerPage
";

$resultAllRecords = $conn->query($sqlAllRecords);

// Query to fetch the total number of records
$sqlTotalRecords = "
SELECT COUNT(*) AS total_records
FROM appointments a
LEFT JOIN
    medicine_records mr ON a.appointment_id = mr.appointment_id
LEFT JOIN
    test_records tr ON a.appointment_id = tr.appointment_id
LEFT JOIN
    general_advices_records gar ON a.appointment_id = gar.appointment_id
WHERE
    1=1 $search_condition
";

$resultTotalRecords = $conn->query($sqlTotalRecords);
$rowTotalRecords = $resultTotalRecords->fetch_assoc();
$totalRecords = $rowTotalRecords['total_records'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+8mkz5f5PlFf3Fiu12M2g2by5pBskYYgB5cE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="patients_record.css">
    <title>Records</title>
</head>

<body>
    <?php include '../Global_Components/DoctorNavbar.php'; ?>
    <div class="container mt-4">
        <div class="input-group custom-input-group">
            <input type="text" class="form-control custom-input3" placeholder="Search with user_id" aria-label="Search with user_id" aria-describedby="search-icon-button" id="search_user_id" name="search_user_id">
            <button class="btn custom-button" type="button" id="search-icon-button" onclick="searchRecords()">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
    <div class="container mt-4">
        <div class="d-flex flex-column ">
            <?php while ($record = $resultAllRecords->fetch_assoc()) : ?>
                <div class="d-flex mb-2">
                    <div class="me-2" style="width: 45%;">
                        <label for="medicine" class="custom-label">Medicine</label>
                        <input id="medicine" class="form-control custom-input1" type="text" value="<?php echo $record['medicine_name']; ?>" readonly>
                    </div>
                    <div style="width: 45%;">
                        <label for="dosage">Dosage</label>
                        <input id="dosage" class="form-control custom-input1" type="text" value="<?php echo $record['dosages']; ?>" readonly>
                    </div>
                </div>

                <div class="mb-2">
                    <label for="test">Test</label>
                    <input id="test" class="form-control custom-input2" type="text" value="<?php echo $record['test_name']; ?>" readonly>
                </div>

                <div class="mb-2">
                    <label for="advice">General Advice</label>
                    <input id="advice" class="form-control custom-input2" type="text" value="<?php echo $record['advice_text']; ?>" readonly>
                </div>

            <?php endwhile; ?>
        </div>
        <hr class="horizontal-line">
    </div>
    <div class="container mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                $totalPages = ceil($totalRecords / $recordsPerPage);
                for ($i = 1; $i <= $totalPages; $i++) :
                ?>
                    <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
    <div class="my-custom-margin"></div>
    <div class="footer text-center bg-custom-footer">
        <p>Powered by S.E.M.D <br>&copy; 2023 United International University. <br>All rights reserved.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        function searchRecords() {
            // Get the user_id value from the search box
            var user_id = document.getElementById('search_user_id').value;

            // Redirect to the same page with the search parameter
            window.location.href = 'patients_record.php?search_user_id=' + user_id;
        }
    </script>
</body>

</html>
