<?php

//index.php

//error_reporting(E_ALL);

session_start();

if(isset($_SESSION["user_id"]))
{
 header("location:home.php");
}

include('function.php');

$connect = new PDO("mysql:host=localhost; dbname=testing", "root", "");

$message = '';
$error_user_name = '';
$error_user_email = '';
$error_user_password = '';
$user_name = '';
$user_email = '';
$user_password = '';

if(isset($_POST["register"]))
{
 if(empty($_POST["user_name"]))
 {
  $error_user_name = "<label class='text-danger'>Enter Name</label>";
 }
 else
 {
  $user_name = trim($_POST["user_name"]);
  $user_name = htmlentities($user_name);
 }

 if(empty($_POST["user_email"]))
 {
  $error_user_email = '<label class="text-danger">Enter Email Address</label>';
 }
 else
 {
  $user_email = trim($_POST["user_email"]);
  if(!filter_var($user_email, FILTER_VALIDATE_EMAIL))
  {
   $error_user_email = '<label class="text-danger">Enter Valid Email Address</label>';
  }
 }

 if(empty($_POST["user_password"]))
 {
  $error_user_password = '<label class="text-danger">Enter Password</label>';
 }
 else
 {
  $user_password = trim($_POST["user_password"]);
  $user_password = password_hash($user_password, PASSWORD_DEFAULT);
 }

 if($error_user_name == '' && $error_user_email == '' && $error_user_password == '')
 {
  $user_activation_code = md5(rand());

  $user_otp = rand(100000, 999999);

  $data = array(
   ':user_name'  => $user_name,
   ':user_email'  => $user_email,
   ':user_password' => $user_password,
   ':user_activation_code' => $user_activation_code,
   ':user_email_status'=> 'not verified',
   ':user_otp'   => $user_otp
  );

  $query = "
  INSERT INTO register_user 
  (user_name, user_email, user_password, user_activation_code, user_email_status, user_otp)
  SELECT * FROM (SELECT :user_name, :user_email, :user_password, :user_activation_code, :user_email_status, :user_otp) AS tmp
  WHERE NOT EXISTS (
      SELECT user_email FROM register_user WHERE user_email = :user_email
  ) LIMIT 1
  ";

  $statement = $connect->prepare($query);

  $statement->execute($data);

  if($connect->lastInsertId() == 0)
  {
   $message = '<label class="text-danger">Email Already Register</label>';
  } 
  else
  {
   $user_avatar = make_avatar(strtoupper($user_name[0]));

   $query = "
   UPDATE register_user
   SET user_avatar = '".$user_avatar."' 
   WHERE register_user_id = '".$connect->lastInsertId()."'
   ";

   $statement = $connect->prepare($query);

   $statement->execute();


 /*  require 'class/class.phpmailer.php';
   $mail = new PHPMailer;
   $mail->IsSMTP();
   $mail->Host = 'smtpout.secureserver.net';
   $mail->Port = '587';
   $mail->SMTPAuth = true;
   $mail->Username = 'xxxxxxxxxxxxxx';
   $mail->Password = 'xxxxxxxxxxxxxx';
   $mail->SMTPSecure = '';
   $mail->From = 'tutorial@webslesson.info';
   $mail->FromName = 'Webslesson';
   $mail->AddAddress($user_email);
   $mail->WordWrap = 50;
   $mail->IsHTML(true);
   $mail->Subject = 'Verification code for Verify Your Email Address';

  
   $mail->Body = $message_body;*/



   require "C:\\xampp\\htdocs\\students\\src\\Exception.php";
   require "C:\\xampp\\htdocs\\students\\src\\PHPMailer.php";
   require "C:\\xampp\\htdocs\\students\\src\\SMTP.php";

   $mail = new PHPMailer\PHPMailer\PHPMailer();

   
       $mail->SMTPDebug = 0;
       $mail->isSMTP();
       $mail->Host       = 'smtp.gmail.com';
       $mail->SMTPAuth   = true;
       $mail->Username   = 'chavadaharsh22@gmail.com';   // Enter your gmail-id              
       $mail->Password   = 'alvmmxvsapyhxhws';     // Enter your gmail app password that you generated 
       $mail->SMTPSecure = 'tls';
       $mail->Port       = 587;

       $mail->setFrom('chavadaharsh22@gmail.com', 'chavada harsh'); // This mail-id will be same as your gmail-id
       $mail->addAddress($user_email, '');      // Enter your receiver email-id

       $mail->isHTML(true);
       $mail->Subject = 'Verification code for Verify Your Email Address';      // Your email subject line
       $message_body = '
       <p>For verify your email address, enter this verification code when prompted: <b>'.$user_otp.'</b>.</p>
       <p>Sincerely,</p>
       <p>Webslesson.info</p>
       ';
       $mail->Body    =   $message_body;   // Body of the email here
       
   if($mail->Send())
   {
    echo '<script>alert("Please Check Your Email for Verification Code")</script>';

    header('location:email_verify.php?code='.$user_activation_code);
   }
   else
   {
    $message = $mail->ErrorInfo;
   }
  }

 }
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
   <h3 align="center"> Registration with Email Verification using OTP</h3>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Registration</h3>
    </div>
    <div class="panel-body">
     <?php echo $message; ?>
     <form method="post">
      <div class="form-group">
       <label>Enter Your Name</label>
      <input type="text" name="user_name" class="form-control" pattern="[A-Za-z]+" title="Only characters are allowed" />

       <?php echo $error_user_name; ?>
      </div>
      <div class="form-group">
       <label>Enter Your Email</label>
       <input type="text" name="user_email" class="form-control" />
       <?php echo $error_user_email; ?>
      </div>
      <div class="form-group">
       <label>Enter Your Password</label>
       <input type="password" name="user_password" class="form-control" />
       <?php echo $error_user_password; ?>
      </div>
      <div class="form-group">
       <input type="submit" name="register" class="btn btn-success" value="Click to Register" />&nbsp;&nbsp;&nbsp;
       <a href="resend_email_otp.php" class="btn btn-default">Resend OTP</a>
       &nbsp;&nbsp;&nbsp;
      <a href="login.php" class="btn btn-default">login</a>
       &nbsp;&nbsp;&nbsp;
       <a href="school_login.php" class="btn btn-default">School_login</a>
       &nbsp;&nbsp;&nbsp;
      <!-- <a href="login.php">  Login  </a>
       <a href="school_login.php">  School_Login  </a>-->
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
                        <h3></h3>
                        <div class="footer-menu">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="color:blue;">
                    <h5>Contact Us</h5>
                    <p class="school"><b>School Name:</b> xyz.<br>
                   <b> Email id:</b>xyz@xyz.edu.in.<br>
                    <b>address:</b> xyz.<br>
                   <b> Phone No:</b>xxxxxxxx77</p><br>
                    <span class="social-icon">
                        <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.google.com"><i class="fa fa-google-plus"></i></a>
                    </span>
                </div>
                <p class="copy-right">Copyright &copy;by Harsh Chavada</p>
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
