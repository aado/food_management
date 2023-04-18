<?php
include("header.php");
if(isset($_GET[cid]))
{
	$sql = "UPDATE customertb SET status='$_GET[status]' WHERE customer_id='$_GET[cid]'";
	$qsql = mysqli_query($con,$sql);
	echo "<script>alert('Customer status updated successfully..');</script>";
}
if(isset($_GET[delid]))
{
	$sql = "DELETE FROM customertb WHERE customer_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Customer record deleted successfully..');</script>";
	}
}
?>
  
<!-- !PAGE CONTENT! -->
<div class=" w3-padding" style="margin-top:100px">

  <!-- About Section -->
  <div class="">  

     <center>
     		<h4><b>customer records</b></h4>
      		<h6><i>View customer records</i></h6>
      </center>
      <p>    
      <table id="example" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
      <thead>
  <tr>
    <th>&nbsp;Customer type</th>
    <th >&nbsp;Customer detail</th>
    <th >&nbsp;Login id</th>
    <th >&nbsp;Delivery Address</th>
    <th >&nbsp;City</th>
       <th >&nbsp;Mobile Number</th>
    <th >&nbsp;status</th>
    
    <th >&nbsp;Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql= "SELECT * FROM customertb";  
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
	$sqlcity = "SELECT * FROM citytb WHERE city_id='$rs[city_id]'";
	$qsqlcity = mysqli_query($con,$sqlcity);
	$rscity = mysqli_fetch_array($qsqlcity);
  echo "<tr>
    <td>&nbsp;$rs[customer_type]</td>
    <td>&nbsp;";
	if($rs[customer_type]== "Regular")
	{
	echo "<strong>Shop:</strong>  ".$rs[shop_name];
	echo "<br /><strong>TIN No:</strong> ". $rs[tin_no];
	}
	if($rs[customer_type]== "One time")
	{
	echo "<strong>Name:</strong> ". $rs[customer_name];
	}
	echo "</td>
	 <td>&nbsp;$rs[login_id]</td>
    <td>&nbsp;$rs[address]</td>
    <td>&nbsp;$rscity[city]</td>
	 <td>&nbsp;$rs[mobile_no]</td>
	  <td>&nbsp;$rs[status]</td>
  
  <td>
<center><a href='viewcustomer.php?cid=$rs[customer_id]&status=Active'>Activate</a> | <a href='viewcustomer.php?cid=$rs[customer_id]&status=Deactivated' onclick='return deleteconfirm()'>Deactivate</a>  
  <br />
<a href='customer.php?editid=$rs[customer_id]'>Edit</a> | <a href='viewcustomer.php?delid=$rs[customer_id]' onclick='return deleteconfirm()'>Delete</a></center></td></td>
  </tr>";
}
?>
</tbody>
</table>

      </p>
  </div>
  <hr>
<?php
include("footer.php");
?><?php
include("datatables.php");
?>
<script>
function deleteconfirm()
{
	if(confirm("Are you sure??") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>