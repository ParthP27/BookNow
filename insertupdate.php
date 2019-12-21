<?php
    session_start();
    $file_name     = $_FILES["photo"]["name"];
    // $photo = $_FILES['pic']['name'];
    $filetmp = $_FILES['photo']['tmp_name'];
    $filetype = $_FILES['photo']['type'];
    $path = "upload/".$file_name;
   # echo $file_name;

    $hallId = $_POST['hallId'];
    $hallName = $_POST['hallName'];
    $hallCapacity = $_POST['hallCapacity'];
    $hallCharge = $_POST['hallCharge'];
    $hallPlace = $_POST['hallPlace'];
    #echo $path;


define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'project');

$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$con){
    die("Connection Failed".mysqli_connect_error());
}


   
    
            
           move_uploaded_file($filetmp,$path);
//            $INSERT = "INSERT Into profile(id, branch, year, college, address, photo) values ('".mysqli_real_escape_string($conn,$id)."','".mysqli_real_escape_string($conn,$branch)."','".mysqli_real_escape_string($conn,$year)."','".mysqli_real_escape_string($conn,$clg)."','".mysqli_real_escape_string($conn,$add)."','".mysqli_real_escape_string($conn,$path)."')";
//            $stmt = $conn->prepare($INSERT);
//            $stmt->bind_param('issssb',$id, $branch, $year, $clg, $add, $photo);
//            $stmt->execute();
            // $INSERT = "UPDATE profile SET branch='".mysqli_real_escape_string($conn,$branch)."', year='".mysqli_real_escape_string($conn,$year)."', college='".mysqli_real_escape_string($conn,$clg)."', address='".mysqli_real_escape_string($conn,$add)."',  photo='".mysqli_real_escape_string($conn,$path)."' WHERE id='".mysqli_real_escape_string($conn,$id)."'";

            $INSERT = "INSERT INTO hall(hall_id, hall_name, hall_capacity, hall_charge, hall_place, image) VALUES ('$hallId','$hallName','$hallCapacity','$hallCharge','$hallPlace','$path')";

            if ($con->query($INSERT) === TRUE) {
                $message = "New record created successfully";
                echo "<script>
                alert('$message');
                </script>";
                echo '<center><h3>Data Inserted successfully</h3></center>';
            } else {
                echo "Error: " . $INSERT . "<br>" . $con->error;
                echo '<center><h3>Failed to Insert Data.
                Please Insert Data Again</h3></center>';
            }
            // $q_INSERT = mysqli_query($con,$INSERT);
            // if ($conn->query($INSERT) === TRUE) {
            //     $message = "New record created successfully";
            //     echo "<script>
            //     alert('$message');
            //     window.location.href='profile.php';
            //     </script>";
            // } else {
            //     echo "Error: " . $INSERT . "<br>" . $conn->error;
            // }
            // $conn->close();
        

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
                                              <li><a class="active" href="admin_home.php">home</a></li>
                                        <!-- <li><a href="aboutus.php">About</a></li> -->
                                        <!-- <li><a href="bookings.php">Services</a></li> -->
                                        <li><a href="insert.php">Insert</a></li> 
                                        <li><a href="login/login.php">User Login</a></li>                                       
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


                        // if (isset($_SESSION['sett'])==1 || isset($_GET['login'])=='success' || isset($_GET['signup'])=='success') {
                            
                        
                        echo "<div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                            <div class='get_in_tauch'>
                                <a href='login/logout.php' class='boxed-btn'>LOGOUT</a>
                            </div>
                        </div>";
                        //}
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
</body>
</html>