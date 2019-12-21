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

$q = " select * from signin where name='$name' ";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
echo $num;
if($num ==1)
{
	$_SESSION['username']= $name;
	echo "set result";
	header('location:home.php');
}
else
{
	header('location:login.php');	
}

?>