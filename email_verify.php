<?php

//email_verify.php

$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

$error_user_otp = '';
$user_activation_code = '';
$message = '';

if(isset($_GET["code"]))
{
 $user_activation_code = $_GET["code"];

 if(isset($_POST["submit"]))
 {
  if(empty($_POST["user_otp"]))
  {
   $error_user_otp = 'Enter OTP Number';
  }
  else
  {
   $query = "
   SELECT * FROM register_user 
   WHERE user_activation_code = '".$user_activation_code."' 
   AND user_otp = '".trim($_POST["user_otp"])."'
   ";

   $statement = $connect->prepare($query);

   $statement->execute();

   $total_row = $statement->rowCount();

   if($total_row > 0)
   {
    $query = "
    UPDATE register_user
    SET user_email_status = 'verified' 
    WHERE user_activation_code = '".$user_activation_code."'
    ";

    $statement = $connect->prepare($query);

    if($statement->execute())
    {
     header('location:login.php?register=success');
    }
   }
   else
   {
    $message = '<label class="text-danger">Invalid OTP Number</label>';
   }
  }
 }
}
else
{
 $message = '<label class="text-danger">Invalid Url</label>';
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

    <title>Student  Admission Management</title>
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
            <!-- <div class="col-md-7">
                 <div class="main-menu">
                      Bootstrap Navigation Bar 
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
                          style="background-color: #CFCBCA;border: 0cm;"><a href="as.php"></a>
                                </li>
                                <li class="nav-item">
                          <input type="button" value="Login" name="Login"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="#"></a>
                                </li>
                                <li class="nav-item">
                          <input type="button" value="Addmission" name="Addmission"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="student.php"></a>
                                </li>
                                <li class="nav-item">
                          <input type="button" value="Student" name="Student"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="view.php"></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                     End of Bootstrap Navigation Bar 
                 </div>
             </div>-->
                <div class="col-md-1 text-right">
                    <span class="social-icon">
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-google-plus"></i></a>
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

                                    <a href="" class="boxed-btn">learn more <i class="fa fa-long-arrow-right"></i></a>
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

                                    <a href="" class="boxed-btn">learn more <i class="fa fa-long-arrow-right"></i></a>
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
   <h3 align="center">Registration with Email Verification using OTP</h3>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Enter OTP Number</h3>
    </div>
    <div class="panel-body">
     <?php echo $message; ?>
     <form method="POST">
      <div class="form-group">
       <label>Enter OTP Number</label>
       <input type="text" name="user_otp" class="form-control" />
       <?php echo $error_user_otp; ?>
      </div>
      <div class="form-group">
       <input type="submit" name="submit" class="btn btn-success" value="Submit" />
      </div>
     </form>
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
                        <h3>Navigation</h3>
                        <div class="footer-menu">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>Contact Us</h3>
                    <span class="social-icon">
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-google-plus"></i></a>
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
