<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql = "DELETE FROM categorytb WHERE category_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('category record deleted successfully..');</script>";
	}
}
?>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <div class="w3-padding-32">
      <h4><b>Category records</b></h4>
      <h6><i>View category records</i></h6><a href="category.php" style="text-align:right;">Add Category</a>
      <p>
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
          <tr>
            <th scope="col">&nbsp;Main category</th>
            <th scope="col">&nbsp;Category name</th>
            <th scope="col">&nbsp; Note</th>
            <th scope="col">&nbsp;status</th>
            <th scope="col">&nbsp;Action</th>
            
          </tr>
  </thead>
  <tbody>
	<?php
    $sql= "SELECT * FROM categorytb";  
    $qsql = mysqli_query($con,$sql);
    while($rs = mysqli_fetch_array($qsql))
    {       
        $sqlmaincat = "SELECT * FROM categorytb WHERE category_id='$rs[main_catid]'";
        $qsqlmaincat = mysqli_query($con,$sqlmaincat);
        $rsmaincat = mysqli_fetch_array($qsqlmaincat);
        
      echo "<tr>
        <td>&nbsp;$rsmaincat[cat_name]</td>
        <td>&nbsp;$rs[cat_name]</td>
        <td>&nbsp;$rs[cat_note]</td>
        <td>&nbsp;$rs[status]</td>
       
        <td>&nbsp; <a href='category.php?editid=$rs[category_id]'>Edit</a> | <a href='viewcategory.php?delid=$rs[category_id]' onclick='return deleteconfirm()'>Delete</a></td>
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

<?php
include("footer.php");
?>