<?php

session_start();

if(isset($_SESSION["user_id"]))
{
 header("location:home.php");
}

?>

<!DOCTYPE html>
<html>
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="http://code.jquery.com/jquery.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
    <div class="col-md-7">
                 <div class="main-menu">
                     <!-- Bootstrap Navigation Bar  -->
                    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #CFCBCA;">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <!-- <li class="nav-item active">
                          <input type="button" value="Home" name="Home" 
                          style="background-color: #CFCBCA;border: 0cm;"><a href="as.php"></a>
                          
                                </li> -->
                                <li class="nav-item">
                          <input type="button" value="Login" name="Login"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="index.php"></a>
                                </li>
                                <!-- <li class="nav-item">
                          <input type="button" value="Addmission" name="Addmission"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="student.php"></a>
                                </li>
                                <li class="nav-item">
                          <input type="button" value="Student" name="Student"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="view.php"></a>
                                </li> -->
                            </ul>
                        </div>
                    </nav>
                     <!-- End of Bootstrap Navigation Bar  -->
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
    <!--=========================== Content-area ============================-->
  <br />
  <div class="container">
   <h3 align="center">Login</h3>
   <br />

   <?php
   if(isset($_GET["register"]))
   {
    if($_GET["register"] == 'success')
    {
     echo '
     <h1 class="text-success">Email Successfully verified, Registration Process Completed...</h1>
     ';
    }
   }

   if(isset($_GET["reset_password"]))
   {
    if($_GET["reset_password"] == 'success')
    {
     echo '<h1 class="text-success">Password change Successfully, Now you can login with your new password</h1>';
    }
   }
   ?>

   <div class="row">
    <div class="col-md-3">&nbsp;</div>
    <div class="col-md-6">
     <div class="panel panel-default">
      <div class="panel-heading">
       <h3 class="panel-title">Login</h3>
      </div>
      <div class="panel-body">
       <form method="POST" id="login_form">
        <div class="form-group" id="email_area">
         <label>Enter Email Address</label>
         <input type="text" name="user_email" id="user_email" class="form-control" />
         <span id="user_email_error" class="text-danger"></span>
        </div>
        <div class="form-group" id="password_area" >
         <label>Enter password</label>
         <input type="password" name="user_password" id="user_password" class="form-control" />
         <span id="user_password_error" class="text-danger"></span>
        </div>
        <div class="form-group" id="otp_area" style="display:none;">
         <label>Enter OTP Number</label>
         <input type="text" name="user_otp" id="user_otp" class="form-control" />
         <span id="user_otp_error" class="text-danger"></span>
        </div>
        <div class="form-group" align="right">
         <input type="hidden" name="action" id="action" value="email" />
         <input type="submit" name="next" id="next" class="btn btn-primary" value="Next" />
        </div>
       </form>
      </div>
     </div>
     <div align="center">
      <b><a href="forget_password.php?step1=1">Forgot Password</a></b>
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

<script>

$(document).ready(function(){
 $('#login_form').on('submit', function(event){
  event.preventDefault();
  var action = $('#action').val();
  $.ajax({
   url:"login_verify.php",
   method:"POST",
   data:$(this).serialize(),
   dataType:"json",
   beforeSend:function()
   {
    $('#next').attr('disabled', 'disabled');
   },
   success:function(data)
   {
    $('#next').attr('disabled', false);
    if(action == 'email')
    {
     if(data.error != '')
     {
      $('#user_email_error').text(data.error);
     }
     else
     {
      $('#user_email_error').text('');
      $('#email_area').css('display', 'none');
      $('#password_area').css('display', 'block');
     }
    }
    else if(action == 'password')
    {
     if(data.error != '')
     {
      $('#user_password_error').text(data.error);
     }
     else
     {
      $('#user_password_error').text('');
      $('#password_area').css('display', 'none');
      $('#otp_area').css('display', 'block');
     }
    }
    else
    {
     if(data.error != '')
     {
      $('#user_otp_error').text(data.error);
     }
     else
     {
      window.location.replace("home.php");
     }
    }

    $('#action').val(data.next_action);
   }
  })
 });
});

</script>
