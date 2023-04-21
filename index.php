<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

<?php
	session_start();
	error_reporting(0);
	$dt = date("Y-m-d");
	include('dbconnection.php');
	if(isset($_SESSION[customer_id]))
	{
		$sqlcustomer  = "SELECT  * FROM customertb WHERE customer_id='$_SESSION[customer_id]'";
		$qsqlcustomer = mysqli_query($con,$sqlcustomer);
		$rscustomer  = mysqli_fetch_array($qsqlcustomer);
	}
	if(isset($_SESSION[user_id]))
	{
		$sqluser = "SELECT  * FROM usertb WHERE user_id='$_SESSION[user_id]'";
		$qsqluser = mysqli_query($con,$sqluser);
		$rsuser  = mysqli_fetch_array($qsqluser);
	}
	if(isset($_SESSION[user_id]))
	{
		echo "<script>window.location='dashboard.php';</script>";
	}
	if(isset($_POST["btnlogin"]))
	{
		$pwd = md5($_POST[password]);	
		$sql  = "SELECT * FROM usertb where login_id='$_POST[loginid]' AND password='$pwd' and status='Active'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_num_rows($qsql) ==1)
		{
		$rs = mysqli_fetch_array($qsql);
		$_SESSION[user_id] = $rs[user_id];
		echo "<script>window.location='dashboard.php';</script>";
		}
		else
		{
		echo "<script>alert('Inavalid login credentials entered..');</script>";
		}
	}
?>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/1.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="">
					<!-- <span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span> -->

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="loginid" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>  
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="btnlogin">
							Login
						</button>
					</div>

					<!-- <div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>