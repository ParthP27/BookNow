<?php
session_start();
 if(!isset($_SESSION['userid'])){
                            header("location: login/login.php");
                        }
?>

<?php


define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'project');

$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$con){
    die("Connection Failed".mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="home.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

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
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <?php
                       
                        // else{
                        //     echo $_SESSION['userid'];
                        // }
                        if (isset($_POST['logout'])) {
                            
                            session_destroy();
                        }
                        ?>
                         <?php
                        // if (isset($_GET['set'])==1 || isset($_GET['login'])=='success' || isset($_GET['signup'])=='success') {
                            
                        
                        echo "<div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                            <div class='get_in_tauch'>
                                <a href='login/logout.php' class='boxed-btn'>LOGOUT</a>
                            </div>
                        </div>";
                        ?>
                       
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <br><br>
<!-- Header ends-->
<div class="container">   
   <form method="post" action="#">
    <div class="form-group">
        <select name="Color" class="form-control">
        <?php
        $result1 = "SELECT hall_name FROM hall";
        $a1 = mysqli_query($con,$result1);
        if ($a1 ->num_rows > 0) {
            while ($row = $a1 -> fetch_assoc()) {
                $f = $row['hall_name'];
                echo '<option value='.$f.'>'.$f.'</option>';
            }
        }
        ?>
</select>
</div>

 <center>   
<input type="submit" name="submit" value="Get Selected Values" class="btn btn-primary"></center>
</form>
</div>
<br>

    <?php
    if(isset($_POST['submit'])){
$selected_val = $_POST['Color']; 
    
$result ="SELECT * FROM hall WHERE hall_name='$selected_val'";
$a = mysqli_query($con,$result);

}
            else
            {
                $result ="SELECT * FROM hall WHERE hall_id=4";
                $a = mysqli_query($con,$result);
            }
    if ($a ->num_rows > 0){
    while($row = $a-> fetch_assoc()) {
        $hall_id_print = $row["hall_id"];
        $hall_name_print = $row["hall_name"];
        $hall_charge_print = $row["hall_charge"];
        $hall_capacity_print = $row["hall_capacity"];
        $hall_location_print = $row["hall_place"];
        $_SESSION['txnAmount'] = $row["hall_charge"];
        $_SESSION['hall_id_print'] = $row["hall_id"];
         $_SESSION['hall_name_print'] = $row["hall_name"];
        $hall_image = $row["image"];

        
        
    }
}
?>
    

    <form action="a3.php" method="post">
        <center><input type="submit" name="book" class="btn btn-primary"></center>        
    </form>
    <br>
    <form action="as.php" method="post">
        <center><input type="submit" name="d" class="btn btn-primary" value="Advanced Search"></center>        
    </form>
     


    <div class="project_details">
        <div class="container">
            <div class="row">
                 <?php
                 if(isset($_POST['submit'])){
                   
                        echo '
                <div class="col-xl-6 col-lg-6">
                    <div class="project_details_left">
                        <div class="single_details">

                                <h3>'; echo $hall_name_print; echo ' <br>
                                  Description</h3>
                                <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                    liqua orem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                    liqua orem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <p>Eiusmod tempor incididunt ut labore et dolore magna liqua orem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                        <div class="single_details">
                                <h3>Capacity</h3>
                                <p>'; echo $hall_capacity_print; echo '</p>
                        </div>
                        <div class="single_details">
                                <h3>Reviews</h3>
                                <p>Eiusmod tempor incididunt ut labore et dolore magna liqua orem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>

                

                <div class="col-xl-6 col-lg-6">
                    <div class="projects_details_info">
                        <div class="details_thumb">
                            ';echo '<img src='.$hall_image.' alt="">';
                            echo '
                        </div>
                      <div class="details_info">
                            <h3>Hall info</h3>
                            <div class="details_info_list">
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">ID</span>
                                   <span class="right_info">'; echo $hall_id_print; echo '</span>
                                </div>
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">Name:</span>
                                   <span class="right_info">';echo $hall_name_print; echo '</span>
                                </div>
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">HALL CHARGE:</span>
                                   <span class="right_info">'; echo $hall_charge_print; echo '</span>
                                </div>
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">CAPACITY:</span>
                                   <span class="right_info">'; echo $hall_capacity_print; echo '</span>
                                </div>
                               
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">LOACTION</span>
                                   <span class="right_info">';echo $hall_location_print; echo '</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project_share">
                        <div class="single_details_info d-flex justify-content-between align-items-center">
                            <span class="left_info">Share:</span>
                            <span class="right_info">
                                <a href="#"> <i class="fa fa-facebook"></i> </a>
                                <a href="#"> <i class="fa fa-twitter"></i> </a>
                                <a href="#"> <i class="fa fa-instagram"></i> </a>
                                <a href="#"> <i class="fa fa-pinterest-p"></i> </a>
                            </span>
                        </div>
                    </div>
                </div>';
                }
                #This Else is for isset command
                else{
                    echo '
                <div class="col-xl-6 col-lg-6">
                    <div class="project_details_left">
                        <div class="single_details">

                                <h3>Ganesh Banquet <br>
                                  Description</h3>
                                <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                    liqua orem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                    liqua orem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <p>Eiusmod tempor incididunt ut labore et dolore magna liqua orem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                        <div class="single_details">
                                <h3>Capacity</h3>
                                <p>Eiusmod tempor incididunt ut labore et dolore magna liqua orem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                        <div class="single_details">
                                <h3>Reviews</h3>
                                <p>Eiusmod tempor incididunt ut labore et dolore magna liqua orem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>

                

                <div class="col-xl-6 col-lg-6">
                    <div class="projects_details_info">
                        <div class="details_thumb">
                            <img src="img/project/ganesh.jpg" alt="">
                        </div>
                      <div class="details_info">
                            <h3>Hall info</h3>
                            <div class="details_info_list">
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">ID</span>
                                   <span class="right_info">'; echo $hall_id_print; echo '</span>
                                </div>
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">Name:</span>
                                   <span class="right_info">';echo $hall_name_print; echo '</span>
                                </div>
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">HALL CHARGE:</span>
                                   <span class="right_info">'; echo $hall_charge_print; echo '</span>
                                </div>
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">CAPACITY:</span>
                                   <span class="right_info">'; echo $hall_capacity_print; echo '</span>
                                </div>
                               
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">LOACTION</span>
                                   <span class="right_info">';echo $hall_location_print; echo '</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project_share">
                        <div class="single_details_info d-flex justify-content-between align-items-center">
                            <span class="left_info">Share:</span>
                            <span class="right_info">
                                <a href="#"> <i class="fa fa-facebook"></i> </a>
                                <a href="#"> <i class="fa fa-twitter"></i> </a>
                                <a href="#"> <i class="fa fa-instagram"></i> </a>
                                <a href="#"> <i class="fa fa-pinterest-p"></i> </a>
                            </span>
                        </div>
                    </div>
                </div>';
                }
            
          echo   '</div>
        </div>
    </div>';
?>

   
    <!-- Hall_details_end -->
    <!-- Book Button Starts-->
    
               <!--  <div class="get_in_tauch">
                                <center><a href="#" class="boxed-btn">Book Now</a></center>
                </div> -->
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
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
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
                                <a href="#" class="boxed-btn2">Contact Us</a>
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
                                            <!-- <h3 class="footer_heading">
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
                                                Speak Now
                                            </h3>
                                            <ul class="quick_links">
                                                <li><a href="#">+10 267 3567 267</a></li>
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
 <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->  </p>
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