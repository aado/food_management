<?php
include("header.php");
if($_POST[randomid] == $_SESSION[randomid])
{
	if(isset($_POST[submit]))
	{
		
			if(isset($_GET[editid]))
			{
				$sql= "UPDATE mastertb set line_no='$_POST[m1]',line_type='$_POST[m2]',line_text='$_POST[m3]',status='$_POST[status]' WHERE master_id='$_GET[editid]'";
				$qsql = mysqli_query($con,$sql);
				if(!$qsql)
				{
					echo mysqli_error($con);
				}
				if(mysqli_affected_rows($con) == 1)
				{
					echo "<script>alert('Master record updated successfully..');</script>";
				}
			}
			else
			{
		$sql= "INSERT INTO mastertb(line_no,,line_type,line_text,status) VALUES('$_POST[m1]','$_POST[m2]','$_POST[m3]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(!$qsql)
		{
			echo mysqli_error($con);
		}
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('master record inserted successfully..');</script>";
		}
	}
}
}
$_SESSION[randomid]  = rand();
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM mastertb ";
	$qsqledit =mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center" style="max-width:1200px;margin-top:50px">  
       <br>
    <div class="w3-padding-32">
          <h4><b>Master</b></h4>
      <h6><i>Add New Master Record</i></h6>
      <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="randomid" value="<?php echo $_SESSION[randomid]; ?>" >
      <table width="366" border="1">
            <tr>
              <th width="138" scope="row">1</th>
              <td width="212"><label for="operator"></label>
                <input type="text" name="m1" id="m1">
<label for="discount type"></label>
                <label for="usertype"></label></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td><input type="text" name="m2" id="m2"></td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td><label for="ite"></label>
                <label for="itemdescription"></label>
                <label for="m3"></label>
                <input type="text" name="m3" id="m3"></td>
            </tr>
            <tr>
              <th colspan="2" scope="row">&nbsp;</th>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td scope="row"><label for="image"></label>
                <label for="m4"></label>
              <input type="text" name="m4" id="m4"></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td scope="row"><label for="m5"></label>
              <input type="text" name="m5" id="m5"></td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td scope="row"><label for="m6"></label>
              <input type="text" name="m6" id="m6"></td>
            </tr>
            <tr>
              <th colspan="2" scope="row"><input type="submit" name="submit" id="submit" value="Submit"></th>
            </tr>
        </table>
      </form>
      <p>&nbsp;</p>
      </div>
  </div>

<?php
include("footer.php");
?>
<?php
include("datatables.php");
?>