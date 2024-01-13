<?php

//forget_password.php

$host = "localhost";
$dbname = "testing";
$username = "root";
$password = ""; // Replace with your actual database password

$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$message = '';


session_start();


try {
    // Create a PDO connection
    $connect = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // Handle the exception if the connection fails
    echo "Connection failed: " . $e->getMessage();
    exit; // Exit the script if the connection fails
}




if(isset($_SESSION["user_id"]))
{
 header("location:home.php");
}
if(isset($_POST["submit"]))
{
    if(empty($_POST["user_email"]))
    {
        $message = '<div class="alert alert-danger">Email Address is required</div>';
    }
    else
    {
        $user_email = trim($_POST["user_email"]); // Fetch the user's email

        $data = array(
            ':user_email' => $user_email
        );

        $query = "SELECT * FROM register_user WHERE user_email = :user_email";

        $statement = $connect->prepare($query);

        $statement->execute($data);

        if($statement->rowCount() > 0)
        {
            $result = $statement->fetchAll();

            foreach($result as $row)
            {
                if($row["user_email_status"] == 'not verified')
                {
                    $message = '<div class="alert alert-info">Your Email Address is not verified, so first verify your email address by clicking on this <a href="resend_email_otp.php">link</a></div>';
                }
                else
                {
                    $user_otp = rand(100000, 999999);

                    $sub_query = "UPDATE register_user SET user_otp = '".$user_otp."' WHERE register_user_id = '".$row["register_user_id"]."'";

                    $connect->query($sub_query);
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
         <p>Harsh</p>
         ';
         $mail->Body    =   $message_body;   // Body of the email here
         if($mail->Send())
         {
          echo '<script>alert("Please Check Your Email for password reset code")</script>';
    
          echo '<script>window.location.replace("forget_password.php?step2=1&code=' . $row["user_activation_code"] . '")</script>';
     

         }
        }
       }
      }
      else
      {
       $message = '<div class="alert alert-danger">Email Address not found in our record</div>';
      }
     }
    }
    
    if(isset($_POST["check_otp"]))
    {
     if(empty($_POST["user_otp"]))
     {
      $message = '<div class="alert alert-danger">Enter OTP Number</div>';
     }
     else
     {
      $data = array(
       ':user_activation_code'  => $_POST["user_code"],
       ':user_otp'     => $_POST["user_otp"]
      );
    
      $query = "
      SELECT * FROM register_user 
      WHERE user_activation_code = :user_activation_code 
      AND user_otp = :user_otp
      ";
    
      $statement = $connect->prepare($query);
    
      $statement->execute($data);
    
      if($statement->rowCount() > 0)
      {
       echo '<script>window.location.replace("forget_password.php?step3=1&code=' . $_POST["user_code"] . '")</script>';
      }
      else
      {
       $message = '<div class="alert alert-danger">Wrong OTP Number</div>';
      }
     }
    }
    
    if(isset($_POST["change_password"]))
    {
     $new_password = $_POST["user_password"];
     $confirm_password = $_POST["confirm_password"];
    
     if($new_password == $confirm_password)
     {
      $query = "
      UPDATE register_user 
      SET user_password = '".password_hash($new_password, PASSWORD_DEFAULT)."' 
      WHERE user_activation_code = '".$_POST["user_code"]."'
      ";
    
      $connect->query($query);
    
      echo '<script>window.location.replace("login.php?reset_password=success")</script>';
     }
     else
     {
      $message = '<div class="alert alert-danger">Confirm Password is not match</div>';
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
                          style="background-color: #CFCBCA;border: 0cm;"><a href="as.php"></a>
                                </li>
                                <li class="nav-item">
                          <input type="button" value="Login" name="Login"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="#"></a>
                                </li>
                                <li class="nav-item">
                          <input type="button" value="Admission" name="Addmission"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="student.php"></a>
                                </li>
                                <li class="nav-item">
                          <input type="button" value="Student" name="Student"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="view.php"></a>
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
       <h3 align="center">Forgot Password script  using OTP</h3>
       <br />
       <div class="panel panel-default">
        <div class="panel-heading">
         <h3 class="panel-title">Forgot Password script using OTP</h3>
        </div>
        <div class="panel-body">
         <?php
    
         echo $message;
    
         if(isset($_GET["step1"]))
         {
         ?>
         <form method="post">
          <div class="form-group">
           <label>Enter Your Email</label>
           <input type="text" name="user_email" class="form-control" />
          </div>
          <div class="form-group">
           <input type="submit" name="submit" class="btn btn-success" value="Send" />
          </div>
         </form>
         <?php
         }
         if(isset($_GET["step2"], $_GET["code"]))
         {
         ?>
         <form method="POST">
          <div class="form-group">
           <label>Enter OTP Number</label>
           <input type="text" name="user_otp" class="form-control" />
          </div>
          <div class="form-group">
           <input type="hidden" name="user_code" value="<?php echo $_GET["code"]; ?>" />
           <input type="submit" name="check_otp" class="btn btn-success" value="Send" />
          </div>
         </form>
         <?php
         }
    
         if(isset($_GET["step3"], $_GET["code"]))
         {
         ?>
         <form method="post">
          <div class="form-group">
           <label>Enter New Password</label>
           <input type="password" name="user_password" class="form-control" />
          </div>
          <div class="form-group">
           <label>Enter Confirm Password</label>
           <input type="password" name="confirm_password" class="form-control" />
          </div>
          <div class="form-group">
           <input type="hidden" name="user_code" value="<?php echo $_GET["code"]; ?>" />
           <input type="submit" name="change_password" class="btn btn-success" value="Change" />
          </div>
         </form>
         <?php 
         }
         ?>
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
    