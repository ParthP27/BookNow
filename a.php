<?php
session_start();
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
   <!--  Header Starts -->
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
                                        <!-- <form action="includes/login.inc.php" method="post">
                                        <li><input type="text" name="mailuid" placeholder="Email/Username"></li>
                                         <li><input type="password" name="pwd" placeholder="Password"></li> </form> -->                                       
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
                        if (isset($_GET['set'])==1 || isset($_GET['login'])=='success' || isset($_GET['signup'])=='success') {
                            
                        
                        echo "<div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                            <div class='get_in_tauch'>
                                <a href='login/logout.php' class='boxed-btn' name='logout'>LOGOUT</a>
                            </div>
                        </div>";
                        }
                        else{
                                   echo " <div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                            <div class='get_in_tauch'>
                                <a href='login/signup.php' class='boxed-btn' name='signup'>SIGNUP</a>
                            </div>
                        </div>";
                        }
                        ?>


                        <!-- LOGOUT -->
                       <!--  <form action="login/includes/logout.inc.php" method="post">
                         <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="get_in_tauch">
                                <button type="submit" name="logout-submit">LOGOUT</button>
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

        
        
        
<div class="container">   
   <form method="post" action="#">
    <div class="form-group">
<select name="Color" class="form-control">
<option value="gb">Ganesh Banquet</option>
<option value="viz">Viz Park Hotel</option>
<option value="town">Town Hall</option>
<option value="crs">Crescent Banquet</option>

</select>
</div>
<input type="submit" name="submit" value="Get Selected Values">
</form>
</div>
        <table>
<tr>
    <th>
        id
    </th>
    <th>
        name
    </th>
    <th>
        Hall Charge
    </th>
    <th>
        capacity
    </th>
    <th>
        location
    </th>
</tr>
    <?php
    if(isset($_POST['submit'])){
$selected_val = $_POST['Color']; 
    
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
        echo "<tr><td>". $row["hall_id"]."</td><td>".$row["hall_name"]."</td><td>".$row["hall_charge"]."</td><td>".$row["hall_capacity"]."</td><td>".$row["hall_place"]."</td></tr>";
        
    }
}
?>

</table>

<div class="project_details">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 center-block">
                <div class="projects_details_info">
                    <div class="details_info">
                            <h3>Hall info</h3>
                            <div class="details_info_list">
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">ID</span>
                                   <span class="right_info"><?php echo $hall_id_print; ?></span>
                                </div>
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">NAME:</span>
                                   <span class="right_info"><?php echo $hall_name_print; ?></span>
                                </div>
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">HALL CHARGE:</span>
                                   <span class="right_info"><?php echo $hall_charge_print; ?></span>
                                </div>
                                 <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">CAPACITY:</span>
                                   <span class="right_info"><?php echo $hall_capacity_print; ?></span>
                                </div>
                                <!-- <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">CAPACITY:</span>
                                   <span class="right_info star">
                                       <i class="fa fa-star"></i>
                                       <i class="fa fa-star"></i>
                                       <i class="fa fa-star"></i>
                                       <i class="fa fa-star"></i>
                                       <i class="fa fa-star"></i>
                                    </span>
                                </div> -->
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">LOCATION:</span>
                                   <span class="right_info"><?php echo $hall_location_print; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<button>BOOK</button>

    </body>

</html>