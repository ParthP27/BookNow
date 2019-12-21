<?php
$to = "ppnarodiya27@gmail.com";
$subject = "Response";
$msg = "Thank you";
$header = "From: ";

if (mail($to, $subject, $msg, $header)){
	echo "Mail Sent";

}
else
	echo "Not";



?>