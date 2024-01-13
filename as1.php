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
<style>
     .owl-carousel {
         width: 100%;
         margin: auto;
     }

     .owl-item img {
         width: 100%;
         border-radius: 8px;
     }
 </style>

<body>
    <!--================= Header-area ======================-->
    <div class="header-area header-absoulate">
     <div class="container">
         <div class="row">
             <!-- Logo Area -->
             <div class="col-md-4">
                 <div class="logo">
                     <a href="">
                         <i class="fa fa-home"></i>
                         <span>Name <span id="na">School</span></span>
                     </a>
                 </div>
             </div>

             <!-- Navigation Area -->
             <div class="col-md-7">
                 <div class="main-menu">
                    <!-- Bootstrap Navigation Bar -->
                    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #CFCBCA;">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNav"  aria-expanded="false"
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
                          <input type="button" value="Resister/login" name="Resister/login"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="school_home.php
                          "></a>
                                </li>
                           <!--     <li class="nav-item">
                          <input type="button" value="Addmission" name="Addmission"
                          style="background-color: #CFCBCA;border: 0cm;"><a href="student.php"></a>
                                </li>-->
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

             <!-- Social Icons -->
             <div class="col-md-1 text-right">
                 <span class="social-icon">
                     <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                     <a href="https://www.google.com"><i class="fa fa-google-plus"></i></a>
                 </span>
             </div>
         </div>
     </div>
 </div>

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

 <div class="owl-carousel owl-theme">
    <div class="item"><img src="/students/assets/img/school.jpg" alt="Slide 1"></div>
    <div class="item"><img src="/students/assets/img/monkey.jpg" alt="Slide 2"></div>
    <div class="item"><img src="/students/assets/img/school-children.jpg" alt="Slide 3"></div>
</div>


 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



<script>
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            margin: 5,
            
            nav: false, // Hide navigation buttons
            dots: true, // Show navigation dots
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true
        });
    });
</script>



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
             <div class="col-md-4">
                 <h3>Contact Us</h3>
                 <span class="social-icon">
                     <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                     <a href="https://www.google.com"><i class="fa fa-google-plus"></i></a>
                 </span>
             </div>
             <p class="copy-right">Copyright &copy;Harsh Chavada </p>
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