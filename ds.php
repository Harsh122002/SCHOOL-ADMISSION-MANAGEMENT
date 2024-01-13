<?php
$cn=mysqli_connect("localhost","root","","db_addmission");
?>



<!doctype html>
<html lang="en">

<head>
    <!--============================== Required meta tags ===========================-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--============================= Fonts =======================================-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100i,300,300i,400,700" rel="stylesheet">

    <!--============================= CSS =======================================-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="style.css">

    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>

    <title>Student Admission Management</title>
    <link rel="shourtcut icon" type="image/jpg" href="assets/img/favicon.jpg">
</head>

<body>
    <div class="main" style="margin: 0px;width: 100%;border: 3px solid;border-radius: 5px;height: 100px;;">
        <div class="container">
           <div class="eg">
            <img src="assets/img/favicon.jpg" style="width:30px ;height: 30px;">
            <span class="sc">DR.SUBHASH academy </span>

           </div>
                <!--================== Main menu-area ====================-->
                <div class="col-md-7">
                    <div class="main-menu">
                        <div class="row">
                            <input type="submit" name="home" value="Home" style="width: 80px;px;height: 50px;border: 0px;
                                border-radius: 0%;    background-color:#c5c4d0;color: blue;font-size: 15px;">
                          <form action="" method="post">
                            <input type="submit" name="Addmission" value="Addmission" style="width:150px;height: 50px;border: 0px;
                                border-radius: 0%;    background-color:#c5c4d0;color: blue;font-size: 15px;"></form>
                                 <?php
                                    if(isset($_POST["Addmission"]))
                                    header("location:http://localhost/Student-Admission/admin/student_add.php");?>

                            <input type="submit"  name="Student" value="students" style="width:80px;height: 50px;border: 0px;
                            border-radius: 0%;    background-color:#c5c4d0;color: blue;font-size: 15px;">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--================= Header-area ======================-->
        <div class="header-absoulate">
            <div class="header-area header-absoulate">

            </div>
        </div>
        <!--======================= Slide-area =======================-->

        <!--=========================== Content-area ============================-->
        <div class="sder">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-indicators">
                    <li class="active" data-slide-to="0"></li>
                    <li data-slide-to="1"></li>
                    <li data-slide-to="2"></li>
                </div>
                <div class="carousel-inner" style="height: 600px; border: 5px solid;border-color: rgb(23, 20, 26);">
                    <div class="carousel-item active">
                        <div class="image">
                            <img class="d-block w-100"
                                src="https://www.joonsquare.com/usermanage/image/business/dr-subhash-academy-junagadh-25974/dr-subhash-academy-junagadh-dr.-subhash-academy-2.jpg"
                                alt="First slide">
                        </div>
                    </div>
                    <div class="image">
                        <div class="carousel-item" style="height: 600px;">
                            <img class="d-block w-100"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqaNyI_obtkhyPMFktE3CYr_wbTz8GbCvNOg&usqp=CAU"
                                alt="Second slide">
                        </div>
                    </div>
                </div>

                <!--========================== Footer-area ===============================-->
                <footer class="foot">
                    <div class="ad">
                    <h2 class="as" style="text-align: center;">Contact Information</h2>
                    <div class="row ">
                        <div>
                            <h3>Phone</h3>
                            <p>(123) 456-7890</p>
                        </div>
                        <div>
                            <h3>Email</h3>
                            <p>info@example.com</p>
                        </div>
                        <div>
                            <h3>Address</h3>
                            <p>123 Street, City, Country</p>
                        </div>
                    </div>
                    <p style="text-align: center;"> copyright &Chavada;</p>
                </div>
               
                </footer>
            


                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->

                <script src="assets/js/popper-1.12.9.min.js"></script>
                <script src="assets/js/bootstrap.min.js"></script>
                <script src="assets/js/owl.carousel.min.js"></script>
                <script src="assets/js/main.js"></script>
</body>

</html>