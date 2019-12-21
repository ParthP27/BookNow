<?php
session_start();
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
                                        <!-- <li><a href="aboutus.php">About</a></li> -->
                                        <!-- <li><a href="bookings.php">Services</a></li> -->
                                        <li><a href="insert.php">Insert</a></li>   
                                        <li><a href='login/login.php' name='signup'>USER LOGIN</a></li>                                     
                                    </ul>
                                </nav>
                            </div>
                        </div>
                         <?php
                        if(!isset($_SESSION['userid'])){
                            header("location: login/admin_login.php");
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
                            echo "<div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                            <div class='get_in_tauch'>
                                <a href='login/admin_logout.php' class='boxed-btn'>LOGOUT</a>
                            </div>
                        </div>";

                        # echo " <div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                         #   <div class='get_in_tauch'>
                         #       <a href='login/login.php' class='boxed-btn' name='signup'>USER LOGIN</a>
                          #  </div>
                       # </div>";
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <center>
    <div class="container">
    <form action="insertupdate.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <input type="text" name="hallId" placeholder="hallId"><br><br>
        <input type="text" name="hallName" placeholder="hallName"><br><br>
        <input type="text" name="hallCapacity" placeholder="capacity"><br><br>
        <input type="text" name="hallCharge" placeholder="hallCharge"><br><br>
        <input type="text" name="hallPlace" placeholder="place"><br><br>
        <input type="file" name="photo"><br><br>
        <input type="submit" name="submit" class="btn btn-primary">
    </form>
</div>
</form>
</div>
</center>
</body>
</html>