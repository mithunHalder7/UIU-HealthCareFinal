<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+8mkz5f5PlFf3Fiu12M2g2by5pBskYYgB5cE" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="style.css">
  <title>Doctors Profile</title>
</head>
<style>
  .custom-image {
    border: 2px solid #F99417;
    border-radius: 200px;
    padding: 10px;
    height: 300px;
    width: 600px;
  }

  .btn-secondary:hover {
    background-color: rgb(255, 255, 255);
    color: #080502;
    /* Change text color on hover */
  }

  .btn-primary:hover {
    background-color: rgb(255, 255, 255);
    color: #010101;
    /* Change text color on hover */
  }

  .custom-btn {
    background-color: #F99417;
    /* Set your desired color */
    color: #FFFFFF;
    /* Set the text color */
    height: 50px;
    border-radius: 16px;
    text-align: center;
    justify-content: center;

  }

  .custom-icon .fa-regular.fa-circle-check {
    color: #F99417;
    /* Set your desired icon color */
  }

  .custom-navbar {
    /* Set your desired background color */
    height: 90px;
  }

  .custom-input {
    color: #e5e5e51d;
    /* Set your desired text color */
    background-color: #e5e5e5;
    ;
    /* Set your desired background color */
    /* You can customize other styles as needed */
    border-radius: 20px;
    height: 50px;
    left: 200px;
  }

  body {
    overflow-x: hidden;
  }

  .custom-content {
    /* Add your styles for content here */
    margin-top: 600px;
    /* Increase the margin-top value to move the content further down */
  }

  .half-circle {
    width: 700px;
    height: 350px;
    background: #F99417;
    border-radius: 700px 700px 0 0;
    right: -150px;
    position: absolute;
    display: flex;

  }

  .custom-label {
    text-align: right;
    /* Align labels to the right */
    padding-right: 10px;
    /* Add some space between labels and input fields */
  }

  .custom-input1 {
    /* Make input fields take the full width of the container */
    background-color: #e5e5e5;
  }

  .custom-input2 {
    width: 45%;
    background-color: #e5e5e5;
  }

  .custom-input4 {
    width: 60%;
    height: 100px;
    background-color: #e5e5e5;
  }

  .custom-input::placeholder {
    font-family: 'Your Custom Font', sans-serif;
    /* Replace 'Your Custom Font' with the font name you want to use */
    /* Set the font style, e.g., italic */
    font-size: 16px;
    /* Set the font size as needed */
    color: #999;
    /* Set the color for the placeholder text */
  }

  .bg-custom {
    background-color: #ffffff;
    /* Set the background color to white */
    border: none;
    /* Remove the default border */
    border-radius: 10px;
    /* Add border radius for rounded corners */
    box-shadow: 0 6px 4px rgba(0, 0, 0, 0.1);
    /* Add a subtle shadow */
    justify-items: center;
    height: 200px;
    border-top: 4px solid #F99417;
    align-items: center;
  }

  a {
    text-decoration: none;
  }

  /* Custom card title and text color */
  .text-custom {
    color: black;
    /* Set your desired text color */
  }

  .custom-input-group {
    width: 40% !important;
    /* Customize the width as needed */
    position: relative;
  }

  .bg-custom-footer {
    background-color: #F99417;
    /* Set the desired background color for the footer */
    color: #ffffff;
    /* Set the text color for the footer */
    padding: 10px;
    /* Add padding to the footer for spacing */
    width: 100%;
    font-weight: 100;
    font-size: small;

  }

  .my-custom-margin {
    margin: 150px;
  }

  .custom-button {
    position: absolute;
    right: 60px;
    height: 100%;
    top: 0;
    border: none;
    background-color: transparent;
  }

  .custom-button:hover {
    border: none;
    /* Remove the hover effect */

  }

  .custom-img {
    height: 50px;
    width: 50px;
    border-radius: 30px;
  }

  .custom-input-group {
    padding-right: 40px !important;
    /* Adjust as needed to make space for the button */
    display: flex;
    padding-right: 40px;
  }

  .custom-input3 {
    padding-right: 40px;
    flex: 1;
    border-radius: 15px;
    background-color: #e5e5e5;
    border-top-right-radius: 15px !important;
    border-bottom-right-radius: 15px !important;
  }

  .custom-input input.form-control {
    border-radius: 15px;
    /* Apply border radius to both sides */
  }

  .nav-item {
    margin-right: 50px;
    font-weight: bold;
  }

  #upload-button {
    background-color: #999;
    width: 200px;
    height: 50px;
    margin-top: 20px;
    border-radius: 20px;

  }
</style>

<body>
  <?php include '../Global_Components/DoctorNavbar.php'; ?>
  <div class="container mt-4">
    <!-- Add a container for the profile image and upload text -->
    <!-- Add a container for the profile image and upload button -->
    <div class="container mt-4">
      <div class="input-group custom-input-group">

        <!-- Default profile image -->
        <img src="profile_avatar.png" alt="Profile Avatar" class="custom-avatar" width="70px" height="70px">
        <!-- Hidden file input for image upload -->
        <input type="file" class="form-control custom-input3" id="upload-photo" accept="image/*" style="display: none;">
        <!-- Container for the profile image and upload button -->
        <div class="custom-avatar-container">


          <!-- Button to trigger file input -->
          <button class="btn custom-button" type="button" id="upload-button" onclick="document.getElementById('upload-photo').click();" style="left:40px">
            Update Your Photo
          </button>
        </div>
      </div>
    </div>

  </div>

  <br>
  <div class="container mt-4">
    <div class="d-flex flex-column ">
      <!-- 1st row -->
      <div class="d-flex mb-2">
        <div class="me-2" style="width: 45%;">
          <label for="Name" class="custom-label">Name</label>

          <input id="password" class="form-control custom-input1" type="text" placeholder="">
        </div>
        <div style="width: 45%;">
          <label for="confirm-password">Doctor Id</label>
          <input id="confirm-password" class="form-control custom-input1" type="number" placeholder="">
        </div>
      </div>

      <br>

      <!-- 2nd row -->

      <div class="d-flex mb-2">
        <div class="me-2" style="width: 45%;">
          <label for="Name" class="custom-label">Specialized In</label>
          <input id="password" class="form-control custom-input1" type="text" placeholder="">
        </div>
        <div style="width: 45%;">
          <label for="confirm-password">Contact Number</label>
          <input id="confirm-password" class="form-control custom-input1" type="number" placeholder="">
        </div>
      </div>

      <br>
      <!-- 3rd row -->
      <div class="d-flex mb-2">
        <div class="me-2" style="width: 45%;">
          <label for="Name" class="custom-label">Email</label>
          <input id="password" class="form-control custom-input1" type="email" placeholder="">
        </div>
        <div style="width: 45%;">
          <label for="confirm-password">Status</label>
          <input id="confirm-password" class="form-control custom-input1" type="number" placeholder="">
        </div>
      </div>




      <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 100px;margin-right: 70px; margin-bottom: 100px;">
        <button class="btn btn-primary me-md-2" type="button" style="background-color: #F99417; border: none;">Cancel</button>
        <button class="btn btn-primary" type="button" style="background-color: #F99417;border:none;">Save changes</button>
      </div>


    </div>
  </div>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>


  <div class="footer text-center bg-custom-footer" style="width: 100%;">
    <p>Powered by S.E.M.D <br>&copy; 2023 United International University. <br>All rights reserved.</p>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>