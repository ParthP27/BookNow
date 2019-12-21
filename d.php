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
                        if (isset($_GET['set'])==true || isset($_GET['login'])=='success' || isset($_GET['signup'])=='success') {
                            
                        
                        echo "<div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                            <div class='get_in_tauch'>
                                <a href='login/logout.php' class='boxed-btn' name='logout'>LOGOUT</a>
                            </div>
                        </div>";
                        }
                        else{
                                   echo " <div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                            <div class='get_in_tauch'>
                                <a href='login/login.php' class='boxed-btn' name='signup'>LOGIN</a>
                            </div>
                        </div>";
                        }
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
<div class="container"> 
<form method="post" action="">
<div class="form-group">
<select name="sort_by" class="form-control">
<option value="hall_charge">charges</option>
<option value="hall_capacity">capacity</option>
</select>
</div>
<center>
<input type="submit" name="submit_sort" value="Get Selected Values" class="btn btn-primary"></center>
</form>
</div>


    
        
        <?php
        if(isset($_POST['submit_sort'])){
            
            $selected_val = $_POST['sort_by'];
            $p="hall_charge";
            $b="hall_capacity";
            if($selected_val == $p)
            {
                echo '<form method="post" action="">';
            echo '<div class="form-group">
            <select name="hall" >';
                $result ="SELECT hall_charge,hall_name FROM hall ORDER BY hall_charge;";
        $a = mysqli_query($con,$result);
                ?>
    
        <?php
        if ($a ->num_rows > 0){
    while($row = $a-> fetch_assoc()) {
        $f= $row['hall_name'];
       echo '<option value='.$f.' >'.$f.'</option>';
            }
        
    }
     echo '<input name="hh" type="submit" value="get you data" class="btn btn-primary">';
        echo '</form></div>';
}
            else
            {
                echo '<form method="post" action="">';
                echo '<select name="hall" >';
                $result ="SELECT hall_charge,hall_name FROM hall ORDER BY hall_capacity;";
        $a = mysqli_query($con,$result);
                ?>
    
        <?php
        if ($a ->num_rows > 0){
        while($row = $a-> fetch_assoc()) {
        $f= $row['hall_name'];
        echo '<option value='.$f.' >'.$f.'</option>';
            }
        
    }
     echo '<input name="hh" type="submit" value="get you data" class="btn btn-primary">';
        echo '</form>';
            }
    
       
        
            
        }
        ?>
        <form action="a3.php" method="post">
        <center><input type="submit" name="book" class="btn btn-primary"></center>        
    </form>
        <?php
    if(isset($_POST['hh'])){
$selected_val = $_POST['hall']; 
    
$result ="SELECT * FROM hall WHERE hall_name='$selected_val'";
$a = mysqli_query($con,$result);

}
            else
            {
                $result ="SELECT * FROM hall WHERE hall_id=1";
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
        $hall_image = $row["image"];

        
        
    }
}
?>
    </BODY>
</HTML>
        
