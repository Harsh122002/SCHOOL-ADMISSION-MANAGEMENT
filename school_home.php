<?php

//home.php

session_start();

if(!isset($_SESSION["user_id"]))
{
 header("location:school_login.php");
}

$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");


include('function.php');

$user_name = '';
$user_id = '';

if(isset($_SESSION["user_name"], $_SESSION["user_id"]))
{
 $user_name = $_SESSION["user_name"];
 $user_id = $_SESSION["user_id"];
}

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

    <title>Student  Addmission Management</title>
    <link rel="shourtcut icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>
    <!--================= Header-area ======================-->
    <div class="header-area header-absoulate">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        <a href="">
                            <i class="fa fa-home"></i>
                            <span>Name <span id="na">School</span></span>
                        </a>
                    </div>
                </div>
    <!--================== Main menu-area ====================-->
                <!-- Navigation Area -->
             <div class="col-md-7">
                 <div class="main-menu">
                     <!-- Bootstrap Navigation Bar -->
                    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #CFCBCA;">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                          <input type="button" value="Home" name="Home" 
                          style="background-color: #CFCBCA;border: 0cm;"><a href="as1.php"></a>
                                </li>
                                <li class="nav-item">
                          <input type="button" value="Login" name="Login"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="#"></a>
                                </li>
                               <!--- <li class="nav-item">
                          <input type="button" value="Addmission" name="Addmission"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="student.php"></a>
                                </li>--->
                                <li class="nav-item">
                          <input type="button" value="Student" name="Student"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="sview.php"></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- End of Bootstrap Navigation Bar -->
                 </div>
             </div>
                <div class="col-md-1 text-right">
                    <span class="social-icon">
                        <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.google.com"><i class="fa fa-google-plus"></i></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!--======================= Slide-area =======================-->
    <div class="welcome-area">
        <div class="owl-carousel slider-content">
            <div class="single-slider-item slider-bg-1">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slide-text">
                                    <h2>We provide quality education</h2>
                                    <p>Education is what remains after one has forgotten<br>
                                        what one has learned in school.

                                        <br><i>Albert Einstein</i>
                                    </p>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider-item slider-bg-2">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slide-text">
                                    <h2>We provide intencive care</h2>
                                    <p>Education is the most powerful weapon<br>
                                        which you can use to change the world.

                                        <br><i>Nelson Mandela</i>
                                    </p>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <br />
  <div class="container">
   <h3 align="center"></h3>
   <br />
   <br />
   <div class="row">
    <div class="col-md-9">
     <div class="panel panel-default">
      <div class="panel-heading">
       <h3 class="panel-title">User Timeline</h3>
      </div>
      <div class="panel-body">
       <h1 align="center">Welcome <?php echo $user_name; ?></h1>
      </div>
     </div>
    </div>
    <div class="col-md-3">
     <div class="panel panel-default">
      <div class="panel-heading">
       <h3 class="panel-title">User Details</h3>
      </div>
      <div class="panel-body">
       <div align="center">
        <?php
        Get_user_avatar($user_id, $connect);
        echo '<br /><br />';
        echo $user_name;
        ?>
        <br />
        <br />
        <a href="logout.php" class="btn btn-default">Logout</a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <br />
  <br />
 <!--========================== Footer-area ===============================-->
<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget">
                        <div class="logo">
                            <a href="">
                                <i class="fa fa-home"></i>
                                <span>School</span>
                            </a>
                            <p> Education is what remains after one has forgotten <br>
                                what one has learned in school.

                                <br><i>Albert Einstein</i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget">
                        <h3></h3>
                        <div class="footer-menu">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="color:blue;">
                    <h5>Contact Us</h5>
                    <p class="school"><b>School Name:</b> xyz.<br>
                   <b> Email id:</b>xyz@xyz.edu.in.<br>
                    <b>Address:</b> xyz.<br>
                   <b> Phone No:</b>xxxxxxxx77</p><br>
                    <span class="social-icon">
                        <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.google.com"><i class="fa fa-google-plus"></i></a>
                    </span>
                </div>
                <p class="copy-right">Copyright &copy;by Harsh Chavada </p>
            </div>
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
