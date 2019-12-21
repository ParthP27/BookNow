<!DOCTYPE html>
<html>
<head>
	<meta charset=="UTF-8">
<title>
</title>
<style>

body  {
  background-image: url("https://image.freepik.com/free-vector/abstract-black-tech-fold-shadow-background_1408-563.jpg");
  background-color: #cccccc;
  background-size: 100% 100%;
	background-size: cover;
	height: 600px;
	width= 100%;
}
</style>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body >
	<div class="hey">
	<div class="container">
	<h1 class="text-center"> <font color="white">Welcome to the World of EXAM...........</font></h1>
<br>
		<div class="row">
			<div class="col-lg-6">

			
			<h2 class="text-center "> <font color="white">LOGIN FORM</font></h2> 
				<form action="validation.php" method="post">
					<div class="form-group">
					<label><font color="cyan">Username</font>  </label>
					<input type="text" name="user" class="form-control">
					</div>
					<div class="form-group">
					<label> <font color="cyan">Password</font> </label>
					<input type="password" name="password" class="form-control">
					</div>
				<button type="submit" class="btn btn-primary"> Login </button>
				</form>
			
			
			</div>
			<div class="col-lg-6">
				
			<h2 class="text-center "><font color="white">SIGNIN FORM</font></h2> 
				<form action="registration.php" method="post">
					<div class="form-group">
					<label><font color="cyan">Username</font>  </label>
					<input type="text" name="user" class="form-control">
					</div>
					<div class="form-group">
					<label> <font color="cyan">Password</font> </label>
					<input type="password" name="password" class="form-control">
					</div>
				<button type="submit" class="btn btn-primary"> Signin </button>
				</form>
			</div>
			
		</div>

		
	</div>	
	
	
	<?php
				if(isset($_GET['set']))
				{	
					echo "<div class='container'>";
					
					echo "<h3 class='text-center text-success'> DUPLICATE </h3>";
					echo "</div>";
					 
				}
				if(isset($_GET['upset']))
				{	
					echo "<div class='container'>";
					
					echo "<h3 class='text-center text-primary'> YOUR DATA IS SUCCESSFULLY ADDED NOW YOU CAN LOGIN</h3>";
					echo "</div>"; 
					
				}
			?>
	</div>
</body>
</html>
						