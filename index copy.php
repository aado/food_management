
  
<!-- !PAGE CONTENT! -->

<?php
include("header.php");

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
  
<!-- !PAGE CONTENT! -->
<div  style="max-width:100%;">
  <hr id="about">
  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center" style="background-image:  url('images/1.jpg'); height: 700px; background-position: center,width:100%;
  background-repeat: no-repeat;
  background-size: cover;  position: absolute;
    height: 100%;
    top: 0;
    bottom: 0; width: 100%" >  
    <!-- <div class="w3-padding-32" style="background-color:white;width: 520px;margin-top: 15%; margin-left: 30%;">
      <h4><b>Login Panel</b></h4>
      <h6><i>Kindly enter Login ID and Password to Login</i></h6>
      <p> -->

	
      <form method="post" action="">
      <?php
    include("datatables.php");
    ?>
           <!-- <center> <table id="example" class="table table-striped table-bordered" cellspacing="0" style="width:500px;">
              <tbody>
                <tr>
                  <th width="166" scope="row">Login ID</th>
                  <td width="176">&nbsp;<input type="text" name="loginid"></td>
                </tr>
                <tr>
                  <th scope="row">Password</th>
                  <td>&nbsp;<input type="password" name="password"></td>
                </tr>
                <tr>
                  <th colspan="2" scope="row">&nbsp;<input type="submit" name="btnlogin" value="Click Here to Login"></th>
                  </tr>
              </tbody>
            </table>
            </center> -->
    <!-- </form>
      </p>
    </div> -->
  </div>
  <!-- <hr> -->
<?php
//include("footer.php");
?> 


<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<!-- <span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span> -->

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
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
	

	<!-- <div id="dropDownSelect1"></div> -->

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