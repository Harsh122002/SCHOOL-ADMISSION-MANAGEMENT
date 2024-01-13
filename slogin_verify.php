<?php
if (!isset($_POST["action"])) {
  echo json_encode(['error' => 'Action is not set']);
  exit;
}

//login_verify.php
$db_host = 'localhost';
$db_name = 'testing';
$db_user = 'root';
$db_password = '';

$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

session_start();

$error = '';

$next_action = '';

sleep(2);
if (!isset($_POST["action"])) {
  echo "no";// Handle the case where action is not set
}


if(isset($_POST["action"]))
{
 if($_POST["action"] == 'email')
 {
  if($_POST["user_email"] != '')
  {
   $data = array(
    ':user_email' => $_POST["user_email"]
   );

   $query = "
   SELECT * FROM register_school 
   WHERE user_email = :user_email
   ";

   $statement = $connect->prepare($query);

   $statement->execute($data);

   $total_row = $statement->rowCount();

   if($total_row == 0)
   {
    $error = 'Email Address not found';

    $next_action = 'email';
   }
   else
   {
    $result = $statement->fetchAll();

    foreach($result as $row)
    {
     $_SESSION["register_user_id"] = $row["register_user_id"];

     $_SESSION["user_name"] = $row["user_name"];

     $_SESSION['user_email'] = $row["user_email"];

     $_SESSION["user_password"] = $row["user_password"];
    }
    $next_action = 'password';
   }
  }
  else
  {
   $error = 'Email Address is Required';

   $next_action = 'email';
  }
 }

 if($_POST["action"] == 'password')
 {
  if($_POST["user_password"] != '')
  {
   if(password_verify($_POST["user_password"], $_SESSION["user_password"]))
   {
    $login_otp = rand(100000,999999);

    $data = array(
     ':user_id'  => $_SESSION["register_user_id"],
     ':login_otp' => $login_otp,
     ':last_activity'=> date('d-m-y h:i:s')
    );

    $query = "
    INSERT INTO login_data1 
    (user_id, login_otp, last_activity) 
    VALUES (:user_id, :login_otp, :last_activity)
    ";

    $statement = $connect->prepare($query);

    if($statement->execute($data))
    {
     $_SESSION['login_id'] = $connect->lastInsertId();
     $_SESSION['login_otp'] = $login_otp;

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
       $mail->addAddress('chavadaharsh22@gmail.com', '');      // Enter your receiver email-id

       $mail->isHTML(true);
       $mail->Subject = 'Verification code for Login';      // Your email subject line
       $message_body = '
       <p>For verify your email address, enter this verification code when prompted: <b>'.$login_otp.'</b>.</p>
       <p>Sincerely,</p>
       <p>Harsh</p>
       ';
       $mail->Body    =   $message_body;   // Body of the email here
       if($mail->Send())
       {
        $next_action = 'otp';
       }
       else
       {
        $error = '<label class="text-danger">'.$mail->ErrorInfo.'</label>';
        $next_action = 'password';
       }
      }
     }
     else
     {
      $error = 'Wrong Password';
      $next_action = 'password';
     }
    }
    else
    {
     $error = 'Password is Required';
     $next_action = 'password';
    }
   }
  
   if($_POST["action"] == "otp")
   {
    if($_POST["user_otp"] != '')
    {
     if($_SESSION['login_otp'] == $_POST["user_otp"])
     {
      $_SESSION['user_id'] = $_SESSION['register_user_id'];
      unset($_SESSION["register_user_id"]);
      unset($_SESSION["user_email"]);
      unset($_SESSION["user_password"]);
      unset($_SESSION["login_otp"]);
     }
     else
     {
      $error = 'Wrong OTP Number';
      $next_action = 'otp';
     }
    }
    else
    {
     $error = 'OTP Number is required';
     $next_action = 'otp';
    }
   }
  
  
  
  
  
   $output = array(
    'error'   => $error,
    'next_action' => $next_action
   );
  
   echo json_encode($output);
  }
  
  
  ?>
  