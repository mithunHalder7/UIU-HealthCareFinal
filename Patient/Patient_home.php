<?php
// Assuming you have already established a database connection
include('../db.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user_id = $_SESSION['user_id'];

// Query to fetch medicines and dosages
$sqlMedicines = "
SELECT
    m.medicine_name,
    mr.dosages
FROM
    medicine_records mr
LEFT JOIN
    medicines m ON mr.medicine_id = m.medicine_id
WHERE
    mr.appointment_id = (SELECT appointment_id
                        FROM appointments
                        WHERE user_id = $user_id
                        ORDER BY date ASC
                        LIMIT 1)
";

$resultMedicines = $conn->query($sqlMedicines);

// Query to fetch tests
$sqlTests = "
SELECT
    t.test_name
FROM
    test_records tr
LEFT JOIN
    tests t ON tr.test_id = t.test_id
WHERE
    tr.appointment_id = (SELECT appointment_id
                        FROM appointments
                        WHERE user_id = $user_id
                        ORDER BY date ASC
                        LIMIT 1)
";

$resultTests = $conn->query($sqlTests);

// Query to fetch general advice
$sqlGeneralAdvice = "
SELECT
    ga.advice_text
FROM
    general_advices_records gar
LEFT JOIN
    general_advice ga ON gar.advice_id = ga.advice_id
WHERE
    gar.appointment_id = (SELECT appointment_id
                          FROM appointments
                          WHERE user_id = $user_id
                          ORDER BY date DESC
                          LIMIT 1)
";

$resultGeneralAdvice = $conn->query($sqlGeneralAdvice);

// Query to fetch appointment dates
$sqlDates = "
SELECT DATE_FORMAT(date, '%e %M, %Y') AS formatted_date
FROM appointments
WHERE user_id = $user_id
ORDER BY date DESC
";

$resultDates = $conn->query($sqlDates);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Patient_home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
</head>

<html>

<body>

    <?php include '../Global_Components/PatientNavbar.php'; ?>

    <?php include '../Global_Components/banner.php'; ?>


    <!-- this code is for payment div-->
    <div class="payment">
        <div class="current-balance">
            <p>Due Balance : 50 TK</p>
        </div>
        
    </div>

    <!-- this code is for body div -->

    <div class="body">
        <div class="left-body">
            <div class="top-corner">
                Last Prescription
            </div>

            <div class="left-body-flex">
                <div class="row1">
                    <div class="element1">
                        <h5>Medicines</h5>
                        <div class="element1div">
                            <?php
                            if ($resultMedicines->num_rows > 0) {
                                while ($row = $resultMedicines->fetch_assoc()) {
                                    echo "<p>{$row['medicine_name']} {$row['dosages']}</p>";
                                }
                            } else {
                                echo "<p>No medicines found</p>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="element1">
                        <h5>Tests</h5>
                        <div class="element1div">
                            <?php
                            if ($resultTests->num_rows > 0) {
                                while ($row = $resultTests->fetch_assoc()) {
                                    echo "<p>{$row['test_name']}</p>";
                                }
                            } else {
                                echo "<p>No tests found</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row2">
                    <div class="element1">
                        <h5>General Advice</h5>
                        <div class="element1div">
                            <?php
                            if ($resultGeneralAdvice->num_rows > 0) {
                                while ($row = $resultGeneralAdvice->fetch_assoc()) {
                                    echo "<p>{$row['advice_text']}</p>";
                                }
                            } else {
                                echo "<p>No general advice found</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-body" style="overflow: scroll;">
            <div class="top-corner">
                Visit History
            </div>
            <div class="historyall">
                <?php
                if ($resultDates->num_rows > 0) {
                    while ($row = $resultDates->fetch_assoc()) {
                        echo "<div class='history'>{$row['formatted_date']}</div>";
                    }
                } else {
                    echo "<p>No visit history found</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Add your footer include here -->

</body>

</html>

<!-- this code is for footer -->



<?php include '../Global_Components/footer.php'; ?>

</body>

</html>

