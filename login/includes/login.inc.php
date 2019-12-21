<?php
if(isset($_POST['login-submit'])){
	require 'dbh.inc.php';

	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if(empty($mailuid) || empty($password) ){
	echo '<script>alert("Empty Fields");
	window.open("../login.php?error=emptyfield","_self");</script>';
	//header("location: ../login.php?error=emptyfields");
	exit();
	}
	else {
		$sql = "SELECT * FROM user WHERE uidusers=? OR email=?;";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../login.php?error=sqlerror");
		exit();
		}
		else {
			mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$pwdcheck = password_verify($password, $row['upassword']);
				if ($pwdcheck == false) {
					echo '<script>alert("Wrong Password");
					window.open("../login.php?error=wrongpassword","_self");</script>';
					exit();
				}
				elseif ($pwdcheck == true) {
					session_start();
					$_SESSION['userid'] = $row['uid'];
					$_SESSION['useruid'] = $row['uidusers'];

					header("location: ../../home.php?login=success?set=1");
					$_SESSION['sett'] = $set;
					exit();

				}
			}
			else {
				echo '<script>alert("No User Found");
					window.open("../login.php?error=wrongpassword","_self");</script>';
				#header("location: ../login.php?error=nouser");
				exit();
			}
		}
	}
}
