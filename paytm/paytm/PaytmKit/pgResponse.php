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

<!-- Navigation Menu Starts -->
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
                                        <li><a class="active" href="../../../home.php">home</a></li>
                                        <li><a href="../../../aboutus.php">About</a></li>
                                        <li><a href="../../../bookings.php">Services</a></li>
                                        <li><a href="../../../contact.php">Contact</a></li>                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <?php
                       
                       
                        if (isset($_POST['logout'])) {
                            
                            session_destroy();
                        }
                        ?>
                         <?php                      
                        echo "<div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                            <div class='get_in_tauch'>
                                <a href='../../../login/logout.php' class='boxed-btn'>LOGOUT</a>
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


<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<center><h1>Transaction status is success</h1></center>";
    #$status = "INSERT into book(status) VALUES (1) ";
    #$q_status = mysqli_query($con,$status);
		//Store the data in the table
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<center><h1>Transaction status is failure</h1></center>";
    #$status = "INSERT into book(status) VALUES (0) ";
   #$q_status = mysqli_query($con,$status);
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		// foreach($_POST as $paramName => $paramValue) {
		// 		echo "<br/>" . $paramName . " = " . $paramValue;
		// }

		if (isset($_POST['ORDERID'],$_POST['TXNAMOUNT'])) {
			$custId = $_SESSION['userid']; 
			#echo 'ORDER_ID:'.$_POST['ORDERID'].'<br>';
			#echo 'Amount:'.$_POST['TXNAMOUNT'];
			$orderId = $_POST['ORDERID'];
			$amount = $_POST['TXNAMOUNT'];
			$txnId = $_POST['TXNID'];
			$PaymentMode = $_POST['PAYMENTMODE'];
			$bankName = $_POST['BANKNAME'];
			$bankTxnId = $_POST['BANKTXNID'];
			// echo 'Transaction Date:'.$_POST['TXNDATE'];
			// echo 'Payment Mode:'.$PaymentMode;
			// echo 'Bank Name:'.$bankName;
      $hall_payment = $_SESSION['hall_id_print'];
			$date_curr = date('Y-m-d');
			$insert = "INSERT INTO `bill`(`bill_c_id`, `orderId`, `txnID`, `txnAmount`, `paymentMode`, `bankName`, `bankTxnId`, `txnDate`) VALUES ('$custId','$orderId','$txnId','$amount','$PaymentMode','$bankName','$bankTxnId','$date_curr')";
			$q=mysqli_query($con,$insert);
      if ($_POST["STATUS"] == "TXN_SUCCESS") {
      $status = "UPDATE `book` SET `status`=1 WHERE h_id=$hall_payment";
      $q_status = mysqli_query($con,$status);}
			echo 
                    ' 
                     <div class="project_details">
	        		<div class="container">
	            	<div class="row">
	            	
                    <div class="col-md-auto ">
                    <div class="projects_details_info">
                    	<div class="details_info">
                            <h3>Payment info</h3>
                            <div class="details_info_list">
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">Customer ID</span>
                                   <span class="right_info">'; echo $custId; echo '</span>
                                </div>
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">Order ID:</span>
                                   <span class="right_info">';echo $orderId; echo '</span>
                                </div>
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">Transaction ID:</span>
                                   <span class="right_info">'; echo $txnId; echo '</span>
                                </div>
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">Amount:</span>
                                   <span class="right_info">'; echo $amount; echo '</span>
                                </div>
                               
                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">Payment Mode</span>
                                   <span class="right_info">';echo $PaymentMode; echo '</span>
                                </div>

                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">Bank Name</span>
                                   <span class="right_info">';echo $bankName; echo '</span>
                                </div>

                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">Bank Transaction ID</span>
                                   <span class="right_info">';echo $bankTxnId; echo '</span>
                                </div>

                                <div class="single_details_info d-flex justify-content-between align-items-center">
                                   <span class="left_info">Transaction Date</span>
                                   <span class="right_info">';echo $date_curr; echo '</span>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>';
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}



?>

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



