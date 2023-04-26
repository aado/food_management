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
?>
<!DOCTYPE html>
<html>
<title> Food Management</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




<style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style>

<!-- <style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-sidenav a {padding:20px}
</style> -->
<body >

<?php
include("menu.php");
?>
<!-- Top menu -->
<div class="w3-top">
<!-- w3-padding-xlarge -->
  <div class="w3-white w3-xlarge" >
    <!-- <div class="w3-opennav w3-left w3-hover-text-grey" onclick="w3_open()">☰</div> -->
    
    <?php
	if(isset($_SESSION[customer_id]))
	{
	?>
    	<div class="w3-right" style=" font-size: 20px; margin-right: 45px;">Welcome <?php echo  $rscustomer[customer_name] ; ?> | <a href="logout.php">Logout</a></div>
    <?php
	}
	else if(isset($_SESSION[user_id]))
	{
	?>
    	<div class="w3-right"  style=" font-size: 20px; margin-right: 45px;">Welcome <?php echo  $rsuser[name] ; ?> | <a href="logout.php">Logout</a></div>
    <?php
	}
	else
	{
	?>
	<!-- <a href="login.php">Login</a> |  -->
   	 <div class="w3-right w3-medium"> 
   	 		<!-- <a class="btn btn-outline-dark btn-lg" href="adminlogin.php" role="button"> Login </a> -->
   	 </div>
    <?php
	}
    ?>
    <!-- <div class="w3-center"><a href="index.php"><img src="images/restaurant.png" width="5%" height="100%" alt=""/></a></div> -->
  </div>
</div>