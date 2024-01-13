<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'testing');
if (isset($_SESSION['user_id'])) {
	$userId = $_SESSION['user_id'];
 
	// SQL query to retrieve email based on user ID
	$sql = "SELECT * FROM register_user WHERE register_user_id = '$userId'";
 
	// Execute the query
	$result = mysqli_query($connection, $sql);
 
	// Check if the query was successful
	if ($result) {
	    // Fetch data
	    $row = mysqli_fetch_assoc($result);
 
	    if ($row) {
		   $email_id = $row['user_email'];
		  
	    } else {
		   echo "User not found in the database.";
	    }
 
	    // Free the result set
	    mysqli_free_result($result);
	} else {
	    // Display an error message if the query fails
	    echo "Error: " . mysqli_error($connection);
	}
 } else {
	echo "User not logged in.";
 }
 
 // Close the connection
 mysqli_close($connection);



// require 'C:\xampp\htdocs\students\razorpay-php-testapp-master\razorpay-php\Razorpay.php';

// use Razorpay\Api\Api;

$cn = mysqli_connect("localhost", "root", "", "db_admission");
$sname = "";
					$gname = "";
					$brdata="";
					$contact = "";
					$email = "";
					$address = "";
					$class = "";
					$shift = "";
					$gender = "";
					$blgroup = "";
					$District = "";
					$State = "";
					$Pincode = "";
					$Caste = "";
					
					$esname = "";
					$egname = "";
					$ebrdata="";
					$econtact = "";
					$eemail = "";
					$eaddress = "";
					$eclass = "";
					$eshift = "";
					$egender = "";
					$eblgroup = "";
					$eDistrict = "";
					$eState = "";
					$ePincode = "";
					$eCaste = "";
					
					if(isset($_POST['submit']))
					{
					$sname = $_POST['sname'];
					$gname = $_POST['gname'] ;
					$brdata = $_POST['brdata'] ;
					$contact = $_POST['contact'];
					$email = $_POST['email'];
					$address = $_POST['address'];
					$class = $_POST['class'];
					$shift = $_POST['shift'];
						
					if(isset($_POST['gender'])){
					$gender = $_POST['gender'];}
						
					$blgroup = $_POST['blgroup'];
					$District = $_POST['District'];
					$State = $_POST['State'];
					$Pincode = $_POST['Pincode'];
					$Caste = $_POST['Caste'];


					if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
						$photoFileName = time() . '_' . $_FILES['photo']['name'];
						$photoFilePath = 'uploads/photos/' . $photoFileName; // Adjust the path as needed
						move_uploaded_file($_FILES['photo']['tmp_name'], $photoFilePath);
					 } else {
						$photoFilePath = ""; // Set default value if no file is uploaded
					 }
					 
					 if (isset($_FILES['document']) && $_FILES['document']['error'] == 0) {
						$documentFileName = time() . '_' . $_FILES['document']['name'];
						$documentFilePath = 'uploads/documents/' . $documentFileName; // Adjust the path as needed
						move_uploaded_file($_FILES['document']['tmp_name'], $documentFilePath);
					 } else {
						$documentFilePath = ""; // Set default value if no file is uploaded
					 }	
						$er = 0;
						
						if($sname == "")
						{
							$er++;
							$esname = "*Required";
						}
						else{
							$sname = test_input($sname);
							if(!preg_match("/^[a-zA-Z ]*$/",$sname)){
							$er++;
							$esname = "*Only letters and white space allowed";
						}
						}

						if($gname == "")
						{
							$er++;
							$egname = "*Required";
						}
						else{
							$gname = test_input($gname);
							if(!preg_match("/^[a-zA-Z ]*$/",$gname)){
							$er++;
							$egname = "*Only letters and white space allowed";
						}
						}

						if($contact == "")
						{
							$er++;
							$econtact = "*Required";
						}
						else{
							$contact = test_input($contact);
							if(!preg_match("/^[+0-9]*$/",$contact)){
							$er++;
							$econtact = "*Only numbers are allowed";
							}
							
						}

						if($email == "")
						{
							$er++;
							$eemail = "*Required";
						}
						else
						{
							$email = test_input($email);
							if(!filter_var($email, FILTER_VALIDATE_EMAIL))
							{
								$er++;
								$eemail = "*Email format is invalid";
							}
							
						}

						if($address == "")
						{
							$er++;
							$eaddress = "*Required";
						}

						if($class == "")
						{
							$er++;
							$eclass = "*Required";
						}

						if($shift == 0)
						{
							$er++;
							$eshift = "*Please select shift";
						}

						 if (empty($gender)) {
						 	$er++;
						    $egender = "*Gender is required";
						  } else {
						    $gender = test_input($gender);
						  }
						  
						if($blgroup == "")
						{
							$er++;
							$eblgroup = "*Required";
                        }
                        elseif(strlen($blgroup) > 3)
                        {
                            $er++;
                            $eblgroup = "*Not more than 3 character";
                        }
                            
                        else
                        {
                            $blgroup = test_input($blgroup);
                            if(!preg_match("/^[a-zA-Z+-]*$/",$blgroup))
                            {
                                $er++;
                                $eblgroup = "*Blood group not valid";
                            }

                        }


						
                            
                       
				    if($Caste == 0)
				    {
					    $er++;
					    $eCaste = "*Please select Division";
				    }
						
						if($er == 0)
						{
                            /* $cn = mysqli_connect("localhost", "root", "", "db_admission");*/
					   

						//$sql = "INSERT INTO student (sname, gname, birth_data,contact, email, address, class, shift, gender, blgroup,District,State,Pincode,Caste) VALUES('".mysqli_real_escape_string($cn, $sname)."', '".mysqli_real_escape_string($cn, $gname)."', '".mysqli_real_escape_string($cn, $contact)."', '".mysqli_real_escape_string($cn, $email)."', '".mysqli_real_escape_string($cn, $address)."', '".mysqli_real_escape_string($cn, $class)."', '".mysqli_real_escape_string($cn, $shift)."', '".mysqli_real_escape_string($cn, $gender)."', '".mysqli_real_escape_string($cn, $blgroup)."', '".mysqli_real_escape_string($cn, $District)."', '".mysqli_real_escape_string($cn, $State)."', '".mysqli_real_escape_string($cn, $Pincode)."', '".mysqli_real_escape_string($cn, $Caste)."')";
							$sql = "INSERT INTO student (sname, gname, birth_data,contact, email, address, class, shift, gender, blgroup, District, State, Pincode, Caste, photo_path, document_path) VALUES ('" . mysqli_real_escape_string($cn, $sname) . "', '" . mysqli_real_escape_string($cn, $gname) . "', '" . mysqli_real_escape_string($cn, $brdata) . "', '" . mysqli_real_escape_string($cn, $contact) . "', '" . mysqli_real_escape_string($cn, $email) . "', '" . mysqli_real_escape_string($cn, $address) . "', '" . mysqli_real_escape_string($cn, $class) . "', '" . mysqli_real_escape_string($cn, $shift) . "', '" . mysqli_real_escape_string($cn, $gender) . "', '" . mysqli_real_escape_string($cn, $blgroup) . "', '" . mysqli_real_escape_string($cn, $District) . "', '" . mysqli_real_escape_string($cn, $State) . "', '" . mysqli_real_escape_string($cn, $Pincode) . "', '" . mysqli_real_escape_string($cn, $Caste) . "', '" . $photoFilePath . "', '" . $documentFilePath . "')";
							if(mysqli_query($cn , $sql))
							{
								print '<span class = "successMessage">Data saved into system.</span>';
								
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
       $mail->addAddress($email, '');      // Enter your receiver email-id

       $mail->isHTML(true);
       $mail->Subject = 'Addmission form sumbit';      // Your email subject line
       $message_body = '
       <p>you are Addmission form successfully sumbited.</p>
	  <p> Please Download pdf in Student Menu</p>
	  <p>Please Ready Note in pdf</p>
	
       <p>Sincerely,</p>
       <p>Harsh</p>
       ';
       $mail->Body    =   $message_body;   // Body of the email here
	  if($mail->Send())
	  {
	   echo '<script>alert("Please Check Your Email")</script>';
      
	   header('location:pay.php');
	  }
	  else
	  {
	   $message = $mail->ErrorInfo;
	  }
	 


							
									
							}
							else
							{
								print '<span class= "errorMessage">'.mysqli_error($cn).'</span>';
							}
						}
						else
						{
							print '<span class = "errorMessage">Please fill all the required fields correctly.</span>';
						}
					}
					
					function test_input($data) {
					  $data = trim($data);
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					  return $data;
					}
					// $api = new Api('rzp_test_04excYMhTTXEIA', 'obz0lpTNYqFBTYGUwD0fv34w');
					// $order = $api->order->create([
					// 	'amount' => 1, // Amount in paise
					// 	'currency' => 'INR',
					// 	'receipt' => 'order_receipt_' . time(),
					//  ]);
					//  $orderId = $order['id'];
					// header('Location:view.php ' . $order['short_url']);

					// $api->utility->verifyWebhookSignature($webhookData, $webhookSignature, $webhookSecret);
					// Handle the payment success or failure here
					
					 
				

				
//================================ PHP End =============================	//

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
    <!-- ================= Header-area ====================== -->
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
                          style="background-color: #CFCBCA;border: 0cm;"><a href="index.php"></a>
                                </li>
                                <li class="nav-item">
                          <input type="button" value="Admission" name="Admission"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="efrist.php"></a>
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
    <!--=========================== Content-area ============================-->
    <div class="form-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3>Admission form</h3>
				</div>

				<div class="row">
					<div class="col-md-12">
						<form action="" method="post" enctype="multipart/form-data" >
							<div class="row">
								<div class="col-md-6">
									<div class="left-side-form">
										<h5><label for="sname">Student name</label>
										<span class="error"><?php print $esname; ?></span></h5>
										<p><input type="text" name="sname" value="<?php print $sname; ?>"></p>

										<h5><label for="gname">Father name</label><span class="error">
												<?php print $egname; ?></span></h5>
										<p><input type="text" name="gname" value="<?php print $gname; ?>"></p>

										<h5><label for="brdata">BrithDate</label><span class="error">
												<?php print $brdata; ?></span></h5>
										<p><input type="date" name="brdata" value="<?php print $brdata; ?>"require></p>

										<h5><label for="contact">contact</label><span class="error">
												<?php print $econtact; ?></span></h5>
										<p><input type="text" name="contact" value="<?php print $contact; ?>"></p>

										<h5><label for="email">Email</label><span class="error"><?php print $eemail; ?></span></h5>
											<p><input type="text" name="email" value="<?php print $email_id; ?>" readonly></p>


										<h5><label for="address">address</label><span class="error">
												<?php print $eaddress; ?></span></h5>
										<p><textarea name="address"><?php print $address; ?></textarea></p>

										<h5><label for="State">State</label><br>
										<p><select name="State" id="">
												<option value="NA">NA</option>
												<option value="Gujarat">Gujarat</option>
												</select><span class="error">
												<?php print $eState; ?></span></h5></p>
										<h5><label for="Pincode">Pincode</label><span class="error">
												<?php print $ePincode; ?></span></h5>

												<p><input type="text" style="width: 500px;" placehodler="Pincode"  name="Pincode" value="<?php print $Pincode; ?>"></p>
									
									
									
									</div>
								</div>
								<div class="col-md-6">
									<div class="right-side-form">
										<h5><label for="class">class</label><span class="error">
										<p><select name="class" id="">
												<option value="NA">NA</option>
												<option value="Nursery">Nursery</option>
												<option value="KJ">KJ</option>
												<option value="HKJ">HKJ</option>
												<option value="1  Standard">1  Standard</option>
												<option value="2  Standard">2  Standard</option>
												<option value="3  Standard">3  Standard</option>
												<option value="4  Standard">4  Standard</option>
												<option value="5  Standard">5  Standard</option>
												<option value="6  Standard">6  Standard</option>
												<option value="7  Standard">7  Standard</option>
												<option value="8  Standard">8  Standard</option>
												<option value="9  Standard">9  Standard</option>
												<option value="10  Standard">10  Standard</option>
												<option value="11  Standard">11  Standard</option>
												<option value="12  Standard">12  Standard</option>
												

												</select><span class="error">

										<h5><label for="shift">shift</label></h5>
										<p><select name="shift" id="">
										<option value="NA">NA</option>
												<option value="Nursery/KJ/LHJ">Nursery/KJ/LHJ</option>
												<option value="Primary(1 to 8)">Primary(1 to 8)</option>
												<option value="Secondery School(9 to 10)">Secondery School(9 to 10)</option>
												<option value="Higher Secondery School(11 to 12)(Science)">Higher Secondery School(11 to 12)(Science)</option>
												<option value="Higher Secondery School(11 to 12)(Commerce)">Higher Secondery School(11 to 12)(Commerce)</option>
												<option value="Higher Secondery School(11 to 12)(Arts)">Higher Secondery School(11 to 12)(Arts)</option>		
											</select><span class="error">
												<?php print $eshift; ?></span></p>


										<h5><label for="gender">Gender</label></h5>
										<input type="radio" name="gender" value="male"><span>Male</span>
										<input type="radio" name="gender" value="female"><span>Female</span>
										<input type="radio" name="gender" value="others"><span>Others</span>
										<span class="error">
											<?php print $egender; ?></span>

										<h5><label for="blgroup">blood group</label>
										<p><select name="blgroup" id="">
										<option value="NA">NA</option>
												<option value="A+">A+</option>
												<option value="O+">O+</option>
												<option value="B+">B+</option>
												<option value="AB+">AB+</option>
												<option value="A-">A-</option>
												<option value="B-">B-</option>
												<option value="O-">O-</option>
												<option value="AB-">AB-</option>
												</select>
										
										<span class="error">
												<?php print $eblgroup; ?></span></h5>

										

										<h5><label for="Caste">Caste</label></h5>
										<p><select name="Caste" id="">
										<option value="NA">NA</option>
												<option value="Genaral">Genaral</option>
												<option value="Ews">Ews</option>
												<option value="SEBC/OBC">SEBC/OBC</option>
												<option value="SC">SC</option>
												<option value="ST">ST</option>
											</select><span class="error">
												<?php print $eCaste; ?></span></p>

												<h5><label for="District">District</label>
										<p><select name="District" id="">
												<option value="NA">NA</option>
												<option value=" Ahmedabad"> Ahmedabad</option>
												<option value="Amreli">Amreli</option>
												<option value="Banaskantha">Banaskantha</option>
												<option value="Bharuch">Bharuch</option>
												<option value="Bhavnagar">Bhavnagar</option>
												<option value="Dang">Dang</option>
												<option value="Jamnagar">Jamnagar</option>
												<option value="Junagadh">Junagadh</option>
												<option value="Kheda">Kheda</option>
												<option value="Kachchh">Kachchh</option>
												<option value="Mehsana">Mehsana</option>
												<option value="Patan">Patan</option>
												<option value="Rajkot">Rajkot</option>
												<option value="Sabarkantha">Sabarkantha</option>
												<option value="Surat">Surat</option>
												<option value="Surendranagar">Surendranagar </option>
												<option value="Vadodara">Vadodara</option>
												<option value="Aravalli">Aravalli</option>
												<option value="Narmada">Narmada</option>
												<option value="Anand">Anand</option>
												<option value="Panchhamahal">Panchhamahal</option>
												<option value="Gir Somanath">Gir Somanath</option>
												<option value="Valasad">Valasad</option>
												<option value="Gandhinager">Gandhinager</option>
												<option value="Morbi">Morbi</option>
												<option value="Porbander">Porbander</option>
												<option value="Navasari">Navasari</option>
												<option value="Dahod">Dahod</option>
												<option value="Botad">Botad</option>
												<option value="Chhota udipur">Chhota udipur</option>
												</select><span class="error">
												<?php print $eDistrict; ?></span></h5></p>
										<!-- Add this inside the form -->
										<!-- Add this inside the form -->
<h5><label for="photo">Upload Photo</label></h5>
<p><input type="file" name="photo" accept="image/*" require></p>

<h5><label for="document">Upload Document</label></h5>
<p><input type="file" name="document" accept=".pdf, .doc, .docx" require></p>



										<p><input type="submit" name="submit" value="Submit"><a href="pay.php"></a></p>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
                <p class="copy-right">Copyright &copy;MCA SEM1 </p>
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
