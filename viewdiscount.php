<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql = "DELETE FROM discounttb WHERE discount_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Discount record deleted successfully..');</script>";
	}
}
?>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <div class="w3-padding-32">
      <h4><b>discount records</b></h4>
      <h6><i>View discount records</i></h6>
      <p>
      <?php
	  include("datatables.php");
	  ?>
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
  <tr>
    <th scope="col">&nbsp;Discount type</th>
    <th scope="col">&nbsp;Discount amount</th>
    <th scope="col">&nbsp;Status</th>    
    <th scope="col">&nbsp;Action</th>
  </tr>
   </thead>
  <tbody>
<?php
$sql= "SELECT * FROM discounttb";  
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
	$sqlmaincat = "SELECT * FROM discounttb WHERE discount_id='$rs[discount_id]'";
	$qsqlmaincat = mysqli_query($con,$sqlmaincat);
	$rsmaincat = mysqli_fetch_array($qsqlmaincat);

  echo "<tr><td>&nbsp;$rs[discount_type]</td>";
  if($rs[discount_type] != "Flat" && $rs[discount_type] != "Item Flat Discount")
  {
  echo "<td>&nbsp; $rs[discount_amt]%</td>";
  }
  else if($rs[discount_type] != "Percentage" && $rs[discount_type] != "Item Percentage Discount")
  {
  echo "<td>&nbsp;₹ $rs[discount_amt]</td>";
  }
echo "<td>&nbsp;$rs[status]</td>   
	<td>&nbsp;
		<a href='discount.php?editid=$rs[discount_id]' >Update</a>
	</td>
  </tr>";
}
?>
</tbody>
</table>

      </p>
    </div>
  </div>
  <hr>
<?php
include("footer.php");
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