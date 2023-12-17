
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+8mkz5f5PlFf3Fiu12M2g2by5pBskYYgB5cE" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="PatientAppiointmentForm.css">
  <title>Patient's Appointment form</title>
  <style>
    .custom-label {
      font-weight: bold;
    }

    .custom-input1,
    .custom-input4 {
      border: 1px solid #ced4da;
      border-radius: 5px;
      padding: 8px;
      margin-bottom: 10px;
    }

    .custom-input1 {
      width: 100%;
    }

    .custom-input4 {
      width: 100%;
      height: 150px;
    }

    .container {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      margin-top: 30px;
    }

    .btn-custom {
      background-color: #F99417;
      border: none;
      color: #fff;
    }
  </style>
</head>

<html>

<body>
  <?php include '../Global_Components/PatientNavbar.php'; ?>
  <br>

  <body style="background-color: #f8f9fa;">

    <form action="process_appointment.php" method="post">
      <div class="container">
        <div class="d-flex flex-column">
          <!-- 1st row -->
          <div class="d-flex mb-3">
            <div class="me-3" style="flex: 1;">
              <label for="student_id" class="custom-label">Student ID</label>
              <input name="student_id" class="form-control custom-input1" type="text" placeholder="011******">
            </div>
            <div style="flex: 1;">
              <label for="age">Age</label>
              <input name="age" class="form-control custom-input1" type="text" placeholder="">
            </div>
          </div>

          <!-- 2nd row -->
          <div class="d-flex mb-3">
            <div class="me-3" style="flex: 1;">
              <label for="date" class="custom-label">Date</label>
              <input name="date" class="form-control custom-input1" type="date" placeholder="">
            </div>
            <div style="flex: 1;">
              <label for="time">Time</label>
              <input name="time" class="form-control custom-input1" type="time" placeholder="">
            </div>
          </div>

          <!-- 3rd row -->
          <div class="d-flex mb-3">
            <div class="me-3" style="flex: 1;">
              <label for="email" class="custom-label">Email</label>
              <input name="email" class="form-control custom-input1" type="email" placeholder="*********@uiu.ac.bd">
            </div>
            <div style="flex: 1;">
              <label for="contact">Contact</label>
              <input name="contact" class="form-control custom-input1" type="number" placeholder="+880**********">
            </div>
          </div>

          <!-- 4th row -->
          <div class="mb-3">
            <label for="reason" class="custom-label">Reason for Appointment</label>
            <textarea name="reason" class="form-control custom-input4" rows="4" placeholder="Enter your reason for the appointment"></textarea>
          </div>

          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary me-md-2 btn-custom" type="button">Cancel</button>
            <button class="btn btn-primary btn-custom" type="submit">Save changes</button>
          </div>
        </div>
      </div>
    </form>



    <div class="footer text-center bg-custom-footer" style="width: 100%;">
      <p>Powered by S.E.M.D <br>&copy; 2023 United International University. <br>All rights reserved.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>

</html>