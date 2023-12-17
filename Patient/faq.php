<?php
// Assuming you have a database connection
include("../db.php");
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Fetch FAQs from the database
$sql = "SELECT id, question, answer FROM faq";
$result = $conn->query($sql);

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FAQ Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for FAQ page -->
  <link rel="stylesheet" href="faq.css">

</head>

<body>


  <!-- Navbar (if you have one) -->

  <?php include '../Global_Components/PatientNavbar.php'; ?>


  <div class="container">
    <h1 class="mb-4 text-center">Frequently Asked Questions</h1>

    <div class="accordion" id="faqAccordion">

      <?php
      // Populate the FAQs dynamically
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>

          <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?php echo $row['id']; ?>">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $row['id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $row['id']; ?>">
                <?php echo htmlspecialchars($row['question']); ?>
              </button>
            </h2>
            <div id="collapse<?php echo $row['id']; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $row['id']; ?>" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                <?php echo htmlspecialchars($row['answer']); ?>
              </div>
            </div>
          </div>

      <?php
        }
      } else {
        echo "0 results";
      }

      // Close the database connection
      $conn->close();
      ?>

    </div>
  </div>

  <br>
  <br>
  <div class="footer text-center bg-custom-footer" style="width: 2050px;left: 0px;position: absolute;top: 868px;">
    <p>Powered by S.E.M.D <br>&copy; 2023 United International University. <br>All rights reserved.</p>
  </div>

  <!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript features) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>