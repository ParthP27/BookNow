<?php

session_start();


 if(!isset($_SESSION['userid'])){
    header("location: login/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slide.css">
</head>

<body> 
 <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area white-bg">
                <div class="container-fluid p-0">
                    <div class="row align-items-center justify-content-between no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.html">
                                    <img src="2.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="#"><?php echo $_SESSION["useruid"];  ?></a></li>
                                        <li><a class="active" href="home.php">home</a></li>
                                        <li><a href="aboutus.php">About</a></li>
                                        <li><a href="bookings.php">Services</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                        <li><a href="login/admin_login.php">Admin</a></li>                                    
                                    </ul>
                                </nav>
                            </div>
                        </div>
                                            <?php
                                            if(!isset($_SESSION['userid'])){
                                                header("location: login/login.php");
                                            }
                                            // else{
                                            //     echo $_SESSION['userid'];
                                            // }
                                            if (isset($_POST['logout'])) {
                                                echo "LOGOUT";
                                                session_destroy();
                                            }
                                            ?>
                        <?php
                      #  if (isset($_GET['set'])==true || isset($_GET['login'])=='success' || isset($_GET['signup'])=='success') {
                            
                        
                        echo "<div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                            <div class='get_in_tauch'>
                                <a href='login/logout.php' class='boxed-btn' name='logout'>LOGOUT</a>
                            </div>
                        </div>";
                       # }
                       # else{
                        #           echo " <div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                        #    <div class='get_in_tauch'>
                        #        <a href='login/login.php' class='boxed-btn' name='signup'>LOGIN</a>
                       #     </div>
                      #  </div>";
                       # }
                        #echo " <div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                         #  <div class='get_in_tauch'>
                         #       <a href='login/admin_login.php' class='boxed-btn' name='signup'>ADMIN</a>
                         #   </div>
                       # </div>";
                        ?>           

                    

                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider overlay2 d-flex align-items-center justify-content-center slider_bg_3">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                                <h3>We Book your space</h3>
                                <p>Find a place fast & easy</p>
                                <!-- <a href="#" class="boxed-btn2">See Our Locations</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider overlay2 d-flex align-items-center justify-content-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                                <h3>We Book your space</h3>
                                <p>Find a place fast & easy</p>
                                <!-- <a href="#" class="boxed-btn2">See Our Locations</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider overlay2 d-flex align-items-center justify-content-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                                <h3>We Book your space</h3>
                                <p>Find a place fast & easy</p>
                                <!-- <a href="#" class="boxed-btn2">See Our Locations</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="about_thumb">
                        <img src="img/about/1.png" alt="">
                        <div class="exprience">
                            <h3>Looking for a venue?</h3>
                            <span>Find a place fast & easy</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-md-6">
                    <div class="about_info">
                        <div class="section_title">
                            <span class="sub_heading">About Us</span>
                            <h3>Hassle Free Planning & Booking <br>
                                </h3>
                            <div class="seperator"></div>
                        </div>
                        <p>
                        Manage your guests and keep them updated real time. Don’t miss out on a single moment captured by everyone & cherish them forever!</p>
                        <ul class="about_list">
                            <li>24HRS HELPLINE, EVERY DAY</li>
                            <li>Best Prices Guaranteed.</li>
                        </ul>
                        <a href="aboutus.php" class="boxed-btn">ABOUT US</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

 

    <!-- Footer Starts-->
    <footer class="footer footer_bg">
        <div class="footer_top">
            <div class="container-fluid p-0">
                <div class="row no-gutters ">
                    <div class="col-xl-3 col-12 col-md-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="index.html">
                                    <img src="2.png" alt="">
                                </a>
                            </div>
                            <ul class="social_links">
                                <li>
                                    <a href="https://facebook.com"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="http://twitter.com"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://instagram.com/parth_narodia/"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9 col-12 col-md-8">
                        <div class="footer_header d-flex justify-content-between">
                            <div class="footer_header_left">
                                <h3>Do you have any Query ?</h3>
                                <p>Please Contact us without hesitation. </p>
                            </div>
                            <div class="footer_btn">
                                <a href="contact.php" class="boxed-btn2">Contact Us</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8 col-12 col-md-12">
                                <div class="row">
                                    <div class="col-xl-4 col-12 col-md-4">
                                        <div class="footer_widget">
                                            <h3 class="footer_heading">
                                                Navigation
                                            </h3>
                                            <ul class="quick_links">
                                                <li><a href="home.php">Home</a></li>
                                                <li><a href="aboutus.php"> About</a></li>
                                                <li><a href="bookings.php">Services</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-12 col-md-4">
                                        <div class="footer_widget">
                                        <!--     <h3 class="footer_heading">
                                                Services
                                            </h3>
                                            <ul class="quick_links">
                                                <li><a href="#">Banquet</a></li>
                                                <li><a href="#"> Marriage</a></li>
                                                <li><a href="#"> Party</a></li>
                                            </ul> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-12 col-md-4 ">
                                        <div class="footer_widget">
                                            <h3 class="footer_heading">
                                                Contact Now
                                            </h3>
                                            <ul class="quick_links">
                                                <li><a href="#">+91 123456789</a></li>
                                                <li><a href="#"> contact@booking.com</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_copy_right">
            <p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> </p>
        </div>
    </footer>
    <!-- Footer Ends-->
    <!--Script-->

    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>

</body>
</html>