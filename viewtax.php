<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql = "DELETE FROM taxtb WHERE tax_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('tax record deleted successfully..');</script>";
	}
}
?>

  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <div class="w3-padding-32">
      <h4><b>Tax records</b></h4>
      <p>
     
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
  <tr>
    <th scope="col">&nbsp;Tax type</th>
    <th scope="col">&nbsp;Tax percentage</th>
    
    <th scope="col">&nbsp;status</th>
    
    <th scope="col">&nbsp;Action</th>
  </tr>
</thead>
<tbody>
<?php
$sql= "SELECT * FROM taxtb";  
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
$sqlmaincat = "SELECT * FROM customertb WHERE customer_id='$rs[customer_id]'";
	$qsqlmaincat = mysqli_query($con,$sqlmaincat);
	$rsmaincat = mysqli_fetch_array($qsqlmaincat);
  echo "<tr>
    <td>&nbsp;$rs[tax_type]</td>
    <td>&nbsp;$rs[tax]%</td>
    <td>&nbsp;$rs[status]</td>
    <td>&nbsp;<a href='tax.php?editid=$rs[tax_id]'>Edit</a> </td>
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
<?php
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