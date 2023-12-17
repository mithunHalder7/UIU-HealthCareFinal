<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FAQ Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for FAQ page -->
  <style>
    body {
      padding: 20px;
    }

    .accordion-item {
      margin-bottom: 60px;
    }

    .accordion-button {
      background-color: #F99417; /* Background color for accordion buttons */
      border-radius: 10px; /* Border radius for accordion buttons */
    }

    .accordion-body input {
      width: calc(100% + 10px); /* Make input 10px larger */
      background-color: #F99417; /* Background color for input fields */
      border-radius: 10px; /* Border radius for input fields */
    
    }
    .nav-item{
    margin-right: 50px;
    font-weight: bold;
  }
  .custom-image {
  border: 2px solid #F99417; 
  border-radius: 200px; 
  padding: 10px;
  height: 300px;
  width: 600px;
    }
  .btn-secondary:hover {
    background-color: rgb(255, 255, 255);
    color: #080502; /* Change text color on hover */
  }

  .btn-primary:hover {
    background-color: rgb(255, 255, 255);
    color: #010101; /* Change text color on hover */
  }
    
    .custom-btn {
      background-color: #F99417; /* Set your desired color */
      color: #FFFFFF; /* Set the text color */
      height: 50px;
      border-radius: 16px;
      text-align: center;
      justify-content: center;
   
    }
    .custom-icon .fa-regular.fa-circle-check {
    color: #F99417; /* Set your desired icon color */}

    .custom-navbar {
  /* Set your desired background color */
    height:90px;
  }
  .custom-input {
    color: #e5e5e51d; /* Set your desired text color */
    background-color: #e5e5e5;; /* Set your desired background color */
    /* You can customize other styles as needed */
    border-radius: 20px;
    height: 50px;
    left: 200px;
  }
  body{
    overflow-x: hidden;
  }
  .custom-content {
        /* Add your styles for content here */
        margin-top: 600px; /* Increase the margin-top value to move the content further down */
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
    text-align: right; /* Align labels to the right */
    padding-right: 10px; /* Add some space between labels and input fields */
  }

  .custom-input1 {
     /* Make input fields take the full width of the container */
    background-color: #e5e5e5;
  }
  .custom-input2{
    width: 45%;
    background-color: #e5e5e5;
  }
  .custom-input4{
    width: 60%;
    height: 100px;
    background-color: #e5e5e5;
  }
  .custom-inputa{
    width: 500px;
    background-color: #e5e5e5;
    

  }
  .custom-input::placeholder {
    font-family: 'Your Custom Font', sans-serif; /* Replace 'Your Custom Font' with the font name you want to use */
   /* Set the font style, e.g., italic */
    font-size: 16px; /* Set the font size as needed */
    color: #999; /* Set the color for the placeholder text */
  }
 
.bg-custom {
    background-color: #ffffff; /* Set the background color to white */
  border: none; /* Remove the default border */
  border-radius: 10px; /* Add border radius for rounded corners */
  box-shadow: 0 6px 4px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
  justify-items: center;
  height: 200px;
  border-top: 4px solid #F99417;
  align-items: center;
}
a{
    text-decoration: none;
}

/* Custom card title and text color */
.text-custom {
  color: black; /* Set your desired text color */
}
.custom-input-group{
    width: 40% !important; /* Customize the width as needed */
    position: relative;
}
.bg-custom-footer {
  background-color: #F99417; /* Set the desired background color for the footer */
  color: #ffffff; /* Set the text color for the footer */
  padding: 10px; /* Add padding to the footer for spacing */
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
    border: none; /* Remove the hover effect */
   
  }
  .custom-img{
   height: 50px;
   width: 50px;
   border-radius: 30px;
  }
  .custom-input-group{
    padding-right: 40px !important; /* Adjust as needed to make space for the button */
    display: flex;
    padding-right: 40px;
  }
  .custom-input3{
    padding-right: 40px;
    flex: 1;
    border-radius: 15px;
    background-color:#e5e5e5;
    border-top-right-radius: 15px !important;
    border-bottom-right-radius: 15px !important;
  }
  .custom-input input.form-control {
    border-radius: 15px; /* Apply border radius to both sides */
  }

  #upload-button{
    background-color: #999;
    width: 200px;
    height: 50px;
    margin-top: 20px;
    border-radius: 20px;
   
  }

  .add-icon {
        cursor: pointer;
        color: #F99417;
        font-size: 20px;
        margin-top: 10px;
    }
  </style>
</head>
<body>


        <!-- Navbar (if you have one) -->

        <nav class="navbar navbar-expand-lg custom-navbar">
            <div class="container-fluid">
                <img src="United_International_University_Monogram.svg.png" alt="Icon" class="img-icon" style="width: 70px; height: 70px;">
              <a class="navbar-brand" href="#" ><span style="color: #F99417; font-weight: 500;">UIU</span><br><span style="color: #F99417;">Health</span>Sync</a>
          
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active " href="#">Doctor</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#">FAQ</a>
                  </li>
                  
                 
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2 custom-input" type="search" placeholder="Search for nearest hospitals" aria-label="Search">
                    <a href="login.php"  class="btn custom-btn">Login</a>
                  <!-- <button class="btn custom-btn" type="submit">Search</button> -->
                </form>
              </div>
            </div>
          </nav>

<div class="container">
    <h1 class="mb-4 text-center">Frequently Asked Questions</h1>

  <div class="accordion" id="faqAccordion">
    <!-- FAQ Item 1 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Question 1: 
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            <input type="text" class="form-control" placeholder="Your answer here">
          </div>
        </div>
      </div>
  
      <!-- FAQ Item 2 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Question 2: Why do we use it?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            <input type="text" class="form-control" placeholder="Your answer here">
          </div>
        </div>
      </div>
  
      <!-- FAQ Item 3 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Question 3: How does it work?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            <input type="text" class="form-control" placeholder="Your answer here">
          </div>
        </div>
      </div>
  
      <!-- FAQ Item 4 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Question 4: Is it free to use?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            <input type="text" class="form-control" placeholder="Your answer here">
          </div>
        </div>
      </div>
  
      <!-- FAQ Item 5 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            Question 5: Can I customize the styles?
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            <input type="text" class="form-control" placeholder="Your answer here">
          </div>
        </div>
      </div>
  
      
      

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
