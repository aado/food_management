<?php
include("header.php");
?>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32">  
    <div class="w3-padding-32">
    <centeR>
      <h4><b>User records</b></h4>
      <h6><i>View user records</i></h6>
      <h4><b><a href="user.php">Add User</a></b></h4>
	</centeR>      
      <p>
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
  <tr>
    <th scope="col">&nbsp;User type</th>
    <th scope="col">&nbsp;Name</th>
    <th scope="col">&nbsp;Login ID</th>
    <th scope="col">&nbsp;Email ID</th>
    <th scope="col">&nbsp;Mobile No.</th>
     
    <th scope="col">&nbsp;status</th>
    
    <th scope="col">&nbsp;Action</th>
  </tr>
  </thead>
  <tbody>
<?php
$sql= "SELECT * FROM usertb";  
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
  echo "<tr>
    <td>&nbsp;$rs[user_type]</td>
    <td>&nbsp;$rs[name]</td>
	 <td>&nbsp;$rs[login_id]</td>
    <td>&nbsp;$rs[email_id]</td>
	 <td>&nbsp;$rs[mobile_no]</td>
	
   
	  <td>&nbsp;$rs[status]</td>
  
    <td>&nbsp; <a href='user.php?editid=$rs[user_id]'>Edit</a> | <a href='viewuser.php?delid=$rs[user_id]' onclick='return deleteconfirm()'>Delete</a></td>
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