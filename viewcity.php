<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql = "delete from citytb where city_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Record deleted successfully..');</script>";
	}
}
?>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <div class="w3-padding-32">
      <h4><b>Billing records</b></h4>
      <h6><i>View billing records</i></h6>
      <p>
      <?php
include("datatables.php");
?>
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <tr>
    <th scope="col">&nbsp;user_id</th>
    <th scope="col">&nbsp;city</th>
    <th scope="col">&nbsp;status</th>
    
    <th scope="col">&nbsp;Action</th>
  </tr>
<?php
$sql= "SELECT * FROM citytb";  
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
  echo "<tr>
    <td>&nbsp;$rs[user_id]</td>
    <td>&nbsp;$rs[city]</td>
    <td>&nbsp;$rs[status]</td>
   
    <td>&nbsp; <a href='city.php?editid=$rs[city_id]'>Edit</a> | <a href='viewcity.php?delid=$rs[city_id]' onclick='return deleteconfirm()'>Delete</a></td>
  </tr>";
}
?>
</table>

      </p>
    </div>
  </div>
  <hr>
<?php
include("footer.php");
?>
<script type="application/javascript">
function deleteconfirm()
{
	if(confirm("Are you sure want to delete this record..") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>