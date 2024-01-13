<?php
//resend_email_otp.php

$host = "localhost";
$dbname = "testing";
$username = "root";
$password = ""; // Replace with your actual database password

$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $connect = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$message = '';

session_start();

if(isset($_SESSION["user_id"]))
{
    header("location:home.php");
}

if(isset($_POST["resend"]))
{
    if(empty($_POST["user_email"]))
    {
        $message = '<div class="alert alert-danger">Email Address is required</div>';
    }
    else
    {
        $data = array(
            ':user_email' => trim($_POST["user_email"])
        );

        $query = "SELECT * FROM register_user WHERE user_email = :user_email";
        $statement = $connect->prepare($query);
        $statement->execute($data);

        if($statement->rowCount() > 0)
        {
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                if($row["user_email_status"] == 'verified')
                {
                    $message = '<div class="alert alert-info">Email Address already verified, you can login into the system</div>';
                }
                else
                {
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

                    $mail->setFrom('chavadaharsh22@gmail.com', 'chavada harsh'); // This mail-id will be the same as your gmail-id

                    $user_email = $row["user_email"]; // Fetch user's email from the database
                    $user_otp = $row["user_otp"]; // Fetch user's OTP from the database

                    $mail->addAddress($user_email, ''); // Enter your receiver email-id

                    $mail->isHTML(true);
                    $mail->Subject = 'Verification code for Verify Your Email Address';      // Your email subject line
                    $message_body = '
                    <p>For verify your email address, enter this verification code when prompted: <b>'.$user_otp.'</b>.</p>
                    <p>Sincerely,</p>
                    <p>Webslesson.info</p>
                    ';
                    $mail->Body = $message_body;   // Body of the email here

                    if($mail->Send())
                    {
                        echo '<script>alert("Please Check Your Email for Verification Code")</script>';
                        echo '<script>window.location.replace("email_verify.php?code='.$row["user_activation_code"].'");</script>';
                    }
                    else
                    {
                        // Handle mail sending failure
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
                            <!--    <li class="nav-item active">
                          <input type="button" value="Home" name="Home" 
                          style="background-color: #CFCBCA;border: 0cm;"><a href="as.php"></a>
                                </li>-->
                                <li class="nav-item">
                          <input type="button" value="Login" name="Login"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="index.php"></a>
                                </li>
                              <!--  <li class="nav-item">
                          <input type="button" value="Addmission" name="Addmission"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="student.php"></a>
                                </li>
                                <li class="nav-item">
                          <input type="button" value="Student" name="Student"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="view.php"></a>
                                </li>-->
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
    <h3 align="center">Resend Email Verification OTP </h3>
    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Resend Email Verification OTP</h3>
        </div>
        <div class="panel-body">
            <?php echo $message; ?>
            <form method="post">
                <div class="form-group">
                    <label>Enter Your Email</label>
                    <input type="email" name="user_email" class="form-control" />
                </div>
                <div class="form-group">
                    <input type="submit" name="resend" class="btn btn-success" value="Send" />
                  
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
