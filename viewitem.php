<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql = "DELETE FROM itemtb WHERE item_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Item record deleted successfully..');</script>";
	}
}
?>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <div class="w3-padding-32">
      <h4><b>Item records</b></h4>
      <h6><i>View item records</i></h6>
      <a href="item.php">Add item</a>
      <p>
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
  <tr>
    <th scope="col">&nbsp;Category</th>
    <th scope="col">&nbsp;Item name</th>
    <th scope="col">&nbsp;Item description</th>
    <th scope="col">&nbsp;Item cost</th>
    <th scope="col">&nbsp;Image</th>
    <th scope="col">&nbsp;status</th>
    
    <th scope="col">&nbsp;Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql= "SELECT * FROM itemtb";  
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
		
	$sqlmaincat = "SELECT * FROM categorytb WHERE category_id='$rs[category_id]'";
	$qsqlmaincat = mysqli_query($con,$sqlmaincat);
	$rsmaincat = mysqli_fetch_array($qsqlmaincat);
  echo "<tr>
    <td>&nbsp;$rsmaincat[cat_name]</td>
    <td>&nbsp;$rs[item_name]</td>
    <td>&nbsp;$rs[item_discription]</td>
	 <td>&nbsp;₱ $rs[item_cost]</td>
	  <td>&nbsp;<img src='itemimg/$rs[item_img]' width='50' height='50'></td>
    <td>&nbsp;$rs[status]</td>
   
    <td>&nbsp;<a href='item.php?editid=$rs[item_id]'>Edit</a> | <a href='viewitem.php?delid=$rs[item_id]' onclick='return deleteconfirm()'>Delete</a></td></td>
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