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
    <!--=========================== Content-area ============================-->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Set initial widths for each column */
        th:nth-child(1),
        td:nth-child(1) {
            width: 5%;
        }

        th:nth-child(2),
        td:nth-child(2) {
            width: 15%;
        }
    </style>


<div id="padding" class="table-responsive">
        <div class="section-title">
            <h3>Students list</h3>
        </div>

        <?php 
        $cn = mysqli_connect("localhost", "root", "", "db_admission");

        // Check connection
        if (!$cn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        

        if(isset($_GET['did']))
        {
        delete();
        print '<h6 class= "successMessage">Student Deleted.</h6>';
        }
               

                 
				$sql = "select * from student";
				
				$table = mysqli_query($cn, $sql);
               
				
                print '<table class="table">';
                print '<thead><tr><th>ID</th><th>Image</th><th>Student Name</th><th>Father Name</th><th>Birth Date</th><th>Contact</th><th>Email</th><th>Address</th><th>Class</th><th>Shift</th><th>Gender</th><th>Blood Group</th><th>Caste</th><th>District</th><th>State</th><th>Pincode</th><th>Action</th></tr></thead>';
                print '<tbody>';
				
				while($row = mysqli_fetch_assoc($table))
				{    $imagePath = ''.$row["photo_path"];

                   
                    
					print '<tr>';
					print '<td >'.htmlentities($row["id"]).'</td>';
                    print '<td><img src="' . $imagePath . '" alt="Student Photo" style="width:100px;"></td>';
					print '<td >'.htmlentities($row["sname"]).'</td>';
					print '<td>'.htmlentities($row["gname"]).'</td>';
                    print '<td>'.htmlentities($row["birth_data"]).'</td>';
					print '<td>'.htmlentities($row["contact"]).'</td>';
					print '<td>'.htmlentities($row["email"]).'</td>';
					print '<td >'.htmlentities($row["address"]).'</td>';
					print '<td>'.htmlentities($row["class"]).'</td>';
					print '<td>'.htmlentities($row["shift"]).'</td>';
					print '<td>'.htmlentities($row["gender"]).'</td>';
					print '<td>'.htmlentities($row["blgroup"]).'</td>';
					
					print '<td>'.htmlentities($row["District"]).'</td>';
					print '<td>'.htmlentities($row["State"]).'</td>';
					print '<td>'.htmlentities($row["Pincode"]).'</td>';
					print '<td>'.htmlentities($row["Caste"]).'</td>';
					print '<td>
        <a href="edit.php?id=' . $row['id'] . '" class="btn btn-success">update</a>
        <a href="?did=' . $row['id'] . '" class="btn btn-danger">delete</a>
        <a href="pdf.php?id=' . $row['id'] . '" class="btn btn-success">PDF
        
        </a>
      </td>';
			
                    print '</tr>';
				}
	
				print '</tbody></table>';


                function delete()
                {
                    global $cn;
                    if ($cn && isset($_GET['did'])) {
                        $id = $_GET['did'];
                        $sql = "DELETE FROM student WHERE id = ?";
                        $stmt = mysqli_prepare($cn, $sql);
                
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, "i", $id);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_close($stmt);
                        } else {
                            echo "Error in preparing statement: " . mysqli_error($cn);
                        }
                    }
                }
                $stmt = mysqli_prepare($cn, $sql);

                if (!$stmt) {
                    die("Error in preparing statement: " . mysqli_error($cn));
                }
                                
                
	
    ?>
     
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
                    <b>address:</b> xyz.<br>
                   <b> Phone No:</b>xxxxxxxx77</p><br>
                    <span class="social-icon">
                        <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.google.com"><i class="fa fa-google-plus"></i></a>
                    </span>
                </div>
                <p class="copy-right">Copyright &copy;Harsh Chavada</p>
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
