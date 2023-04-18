<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql = "DELETE FROM billingb WHERE bill_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('bill record deleted successfully..');</script>";
	}
}
?>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center" style="max-width:1200px;margin-top:50px">  
    <div class="w3-padding-32">
      <h4><b>Billing records</b></h4>
      <h6><i>View billing records</i></h6>
      <p>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
  <tr>
    <th scope="col">&nbsp;Bill type</th>
    <th scope="col">&nbsp;Bill No.</th>
    <th scope="col">&nbsp;Customer</th>
    <th scope="col">&nbsp;Order date</th>
    <th scope="col">&nbsp;Bill date</th>
    <th scope="col">&nbsp;Bill time</th>
    <th scope="col">&nbsp;Tax</th>
    <th scope="col">&nbsp;Tax type</th>
    <th scope="col">&nbsp;Discount</th>
    <th scope="col">&nbsp;Discount type</th>
    <th scope="col">&nbsp;Ohter cost</th>
    <th scope="col">&nbsp;Status</th>
    <th scope="col">&nbsp;Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql= "SELECT * FROM billingtb";  
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
		
	$sqlmaincat = "SELECT * FROM customertb WHERE customer_id='$rs[customer_id]'";
	$qsqlmaincat = mysqli_query($con,$sqlmaincat);
	$rsmaincat = mysqli_fetch_array($qsqlmaincat);
  echo "<tr>
    <td>&nbsp;$rs[bill_type]</td>
    <td>&nbsp;$rs[bill_no]</td>
    <td>&nbsp;$rs[customer_id]</td>
    <td>&nbsp;$rs[order_date]</td>
    <td>&nbsp;$rs[bill_date]</td>
    <td>&nbsp;$rs[bill_time]</td>
    <td>&nbsp;$rs[tax]</td>
    <td>&nbsp;$rs[tax_typ]</td>
    <td>&nbsp;$rs[discount]</td>
    <td>&nbsp;$rs[discount_type]</td>
    <td>&nbsp;$rs[other_cost]</td>
    <td>&nbsp;$rs[status]</td>
    <td>&nbsp;<a href='viewitem.php?delid=$rs[item_id]' onclick='return deleteconfirm()'>Delete</a></td>
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