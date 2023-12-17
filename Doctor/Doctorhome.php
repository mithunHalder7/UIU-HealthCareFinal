<?php  
$server ="localhost";
$username ="root"; //root = server user name, 
$password ="";
$database ="healthsync";

$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("Error".mysqli_connect_error());
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="doctorhome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <!-- this code is for navbar -->

    <?php include '../Global_Components/DoctorNavbar.php'; ?>

    <?php include '../Global_Components/banner.php'; ?>

    <!-- this code is for body div -->

    <div class="body">
        <div class="left-body" style="overflow: scroll;">
            <div class="consultationrem">
                <p>Consultation Remianing</p>
            </div> 
            <div class="tableConsrem">
        <?php

            $sql = "SELECT user.*, appointments.*
            FROM appointments
            LEFT JOIN user ON appointments.user_id = user.id
            WHERE appointments.status = 'Pending'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result-> fetch_assoc()){
                echo "<div class='row1'>
                    <p>".$row['name']."</p>
                    <P>".$row['student_id']."</P>
                    <P> STUDENT</P>
                    <P>".$row['reason']."</P>
                </div>";
                }
            }
              ?>  
            </div>
        </div>

        <div class="right-body" style="overflow: scroll;">

            <div class="consultationcomp">
                <p>Consultation Completed</p>
            </div>
            <div class="tableConscomp">
            <?php

              $sql = "SELECT user.*, appointments.*
              FROM appointments
              LEFT JOIN user ON appointments.user_id = user.id
              WHERE appointments.status IN ('Cancelled', 'Accepted')";

            $result = $conn->query($sql);
            if($result->num_rows > 0){
            while($row = $result-> fetch_assoc()){
            echo "<div class='row1'>
            <p>".$row['name']."</p>
            <P>".$row['student_id']."</P>
             <P>STUDENT</P>

    </div>";
    }
}
  ?>  
            </div>
        </div>
    </div>


    <!-- this code is for footer -->
    <?php include '../Global_Components/footer.php'; ?>


</body>

