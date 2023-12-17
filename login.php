
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+8mkz5f5PlFf3Fiu12M2g2by5pBskYYgB5cE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container-fluid custom-height ">
        <div class="row h-100 ">
            <!-- Left Section with Login Form -->
            <div class="col-md-4 bg-white p-5 shadow-right ">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <img src="Images/United_International_University_Monogram.png" alt="Icon" class="img-icon">
                        <a class="navbar-brand custom-logo" href="#" style="color:black;"><span style="color: #F99417; font-weight: 500;">UIU</span><br><span style="color: #F99417;">Health</span>Sync</a>
                        <p class="text-dark custom-text">Login into your account</p>
                        <form action="processLogin.php" method="POST" >
                            <label for="password" class="text-secondary">E-Mail</label>
                            <div class="input-group">
                                <input type="text" class="form-control bg-light" style="border: none;  border-radius: 12px;" id="password" placeholder="Enter E-mail" name="email" required>
                                <div class="input-group-append">
                                    <span class="input-group-text text-white" style="background-color: #F99417;">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            <label for="password" class="text-secondary">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control bg-light" style="border: none; border-radius: 12px;" id="password" placeholder="Enter Password" name="password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text text-white" style="background-color: #F99417;">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                </div>
                            </div>


                            <div class="text-right">
                                <a href="#">Forgot Password?</a>
                            </div>
                            <div class="mt-3"> <button type="submit" class="btn custom-btn btn-block" style="border: 14px;" name="login">Login</button></div>
                            <div class="text-center mt-2">
                                <?php
                                if (isset($errorMessage)) {
                                    echo '<div class="alert alert-danger" role="alert">' . $errorMessage . '</div>';
                                }
                                ?>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
            <!-- Right Section with Image -->
            <div class="col-md-4 d-none d-md-block p-0">
                <div class="d-flex h-100">
                    <div class="image-container">
                        <img src="Images/login.png" alt="Image">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>