<?php
session_start();
echo $_SESSION['hall_id_print'];

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

$q1="select date FROM book WHERE date < '2019-10-12' ";
        $result1=mysqli_query($con,$q1);
        if ($result1 ->num_rows > 0){
    while($row1 = $result1-> fetch_assoc()) {
        
            $s= $row1["date"];
    }
}

        // $q1 = "select date FROM book where date < '2019-10-14'";
        // $
        if($s < '2019-10-12'){
            $q2="DELETE from book WHERE date < '2019-10-12' ";
            $result2=mysqli_query($con,$q2);
            
        }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	<!-- Header Starts -->
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
    <!-- Header Ends -->
		<form action="a2.php" method="post">
        <center><input type="submit" name="book" class="btn btn-primary"></center>        
    </form>
</body>
</html>

