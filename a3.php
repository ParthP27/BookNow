

<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'project');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$con){
    die("Connection Failed".mysqli_connect_error());
}
if(!isset($_SESSION['userid'])){
                            header("location: login/login.php");
                        }
?>

  <?php
  $d = date('Y-m-d');
$q1="SELECT date FROM book WHERE date < '$d' ";
        $result1=mysqli_query($con,$q1);
        if ($result1 ->num_rows > 0){
    while($row1 = $result1-> fetch_assoc()) {
        
            $s= $row1["date"];


            $q2="DELETE from book WHERE date < '$d' ";
            $result2=mysqli_query($con,$q2);
    }
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
                        // }
                        // else{
                        //            echo " <div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                        //     <div class='get_in_tauch'>
                        //         <a href='login/signup.php' class='boxed-btn' name='signup'>SIGNUP</a>
                        //     </div>
                        // </div>";
                        // }
                        ?>
                        <!-- <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="get_in_tauch">
                                <a href="login/login.php" class="boxed-btn">LOGIN</a>
                            </div>
                        </div> -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php
$a3 = $_SESSION['hall_name_print'];
echo '<center><h3>You are Booking '.$a3.'</h3></center>';

?>
<div class="container">   
   <form method="post" action="#">

<center>
  DATE: <input type="date" name="bday">
  <br>
  <br>
  <input type="submit" name="submit" value="GET SELECTED VALUE" class="btn btn-primary"></center>
  <br>
</form>
<?php
$status_book = "DELETE FROM `book` WHERE status=0";
$q_status_book = mysqli_query($con,$status_book);
$check = 1;
        if(isset($_POST['submit'])){
$selected_val = $_POST['bday']; 
            $v = $_SESSION['hall_id_print']; 
           # $n = $_SESSION['hall_name_print'];
            #echo $v;
            if($selected_val < date('Y-m-d') )
            {
                ?> <script>alert("you cannot book previous dates");</script>
                <?php
                $check = 1;
            }
        else
        {
            $t=0;
            $q="select date from book where h_id='$v'";
            $f=mysqli_query($con,$q);
            if ($f ->num_rows > 0){
    while($row = $f-> fetch_assoc()) {
        if($row['date'] == $selected_val)
        {
            $t=1;
        }
    }
}
            if($t == 0)
            {
                ?> <script>alert( "you can book");</script>
                <?php
                $d="INSERT INTO `book`( `h_id`, `date`) VALUES ('$v','$selected_val')";
                $l=mysqli_query($con,$d);
                $check =0;
            }
            else
            {
                ?> <script>alert("you can not book");</script> 
                <?php
                $check = 1;
            }
}
       } 
?>
<?php 
if ($check==0) {
    

echo '<form action="checkout.php" method="post">
        <center><input type="submit" name="book" class="btn btn-primary"></center>        
    </form>';
}
?>
</div>
<br><br>    
   
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
                                          <!--   <h3 class="footer_heading">
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