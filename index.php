<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+8mkz5f5PlFf3Fiu12M2g2by5pBskYYgB5cE" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="style.css">
  <title>Home Page</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
      <img src="Images/United_International_University_Monogram.png" alt="Icon" class="img-icon">
      <a class="navbar-brand" href="#"><span style="color: #F99417; font-weight: 500;">UIU</span><br><span style="color: #F99417;">Health</span>Sync</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" style="font-weight: bold; margin-right:20px; margin-left:50px"  aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active"  style="font-weight: bold; margin-right:20px"  href="#">Doctor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="font-weight: bold; margin-right:20px" href="faq.php">FAQ</a>
          </li>


        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2 custom-input" type="search" placeholder="Search for nearest hospitals" aria-label="Search">
          <a href="login.php" class="btn custom-btn">Login</a>
          <!-- <button class="btn custom-btn" type="submit">Search</button> -->
        </form>
      </div>
    </div>
  </nav>


  <div class="container">
    <h1 class="mt-5"> <span style="color: #F99417;">UIU Healthcare</span><br>Simplifying Wellness for Academics</h1>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <button class="btn btn-primary" style="position: absolute; left: 100px; top: 530px; background-color:#F99417; border: none;">Contact Us</button>
          <div class="half-circle"></div>
        </div>
      </div>
    </div>

  </div>

  <div class="container custom-content">
    <div class="row mt-4">
      <div class="col-md-6">
        <!-- Left Column: Picture -->
        <img src="Images/doc.jpg" alt="Your Image" class="img-fluid custom-image">
      </div>
      <div class="col-md-6">
        <!-- Right Column: Text -->
        <p><span style="color: #F99417;">Have a good day!</span></p>
        <h4>May every individual around the world have access to high-quality healthcare, ensuring their well-being and a healthier future for all.</h4>

        <div class="custom-icon">
          <i class="fa-regular fa-circle-check"></i> Making Schedule Online is easy <br>
          <i class="fa-regular fa-circle-check"></i> Easy to connect with doctor
        </div>
      </div>
    </div>
  </div>

  <div class="my-custom-margin"> <!-- Add some margin-top for spacing -->
    <!-- Header -->
    <h6 class="text-center "><span style="color: #F99417;">Our Ratings</span></h6>

    <!-- Three Cards -->
    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card bg-custom">
          <div class="card-body">
            <h5 class="card-text text-custom">
              <center>1000+</center>
            </h5>
            <p class="card-title text-custom">Verified Specialists</p>

          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card bg-custom">
          <div class="card-body">
            <h5 class="card-title text-custom">
              <center>5000+</center>
            </h5>
            <p class="card-text text-custom">Satisfied Student</p>
          </div>
        </div>
      </div>
      <div class="col-md-4" >
        <div class="card bg-custom">
          <div class="card-body">

            <h5 class="card-text text-custom">
              <center>95%</center>
            </h5>
            <p class="card-title text-custom">Positive Feedback</p>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-4"></div> <!-- Adjust the margin value as needed -->

    <!-- Footer -->

  </div>
  <div class="mt-5"></div>

  <div class="mt-5"></div>

  <div class="my-custom-margin"></div>
  <div class="footer text-center bg-custom-footer">
    <p>Powered by S.E.M.D <br>&copy; 2023 United International University. <br>All rights reserved.</p>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>