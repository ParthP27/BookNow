<?php

session_start();
$con = mysqli_connect('localhost','root');
if($con)
{
	echo "connection yes";
}
else
{
	echo "connection no";
	
}
mysqli_select_db($con,'sessionpractical');
$name = $_POST['user'];
$pass = $_POST['password'];

$q = " select * from signin where name='$name' && password='$pass' ";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
if($num == 1)
{
	echo " duplicate data";
header('location:login.php?set=1');
}
else
{
	$gy= "INSERT INTO signin (name,password) VALUES ('$name','$pass') "; 
	mysqli_query($con,$gy);
header('location:login.php?upset=1');
}

?>