<?php
include("header.php");
if($_POST[randomid] == $_SESSION[randomid])
{
	if(isset($_POST[submit]))
	{
	
		if(isset($_GET[editid]))
			{
				$sql= "UPDATE taxtb  SET tax='$_POST[tax]',tax_type='$_POST[taxtype]',status='$_POST[status]' WHERE tax_id='$_GET[editid]'";
				$qsql = mysqli_query($con,$sql);
				if(!$qsql)
				{
					echo mysqli_error($con);
				}
				if(mysqli_affected_rows($con) == 1)
				{
					echo "<script>alert('Item record updated successfully..');</script>";
				}
			}
			else
			{

		$sql= "INSERT INTO taxtb(tax,tax_type,status) VALUES('$_POST[tax]','$_POST[taxtype]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(!$qsql)
		{
			echo mysqli_error($con);
		}
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('tax record inserted successfully..');</script>";
			echo "<script>window.location='viewtax.php';</script>";
		}
			}
	}
}

$_SESSION[randomid]  = rand();
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM taxtb WHERE tax_id='$_GET[editid]'";
	$qsqledit =mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center" style="max-width:1200px;margin-top:50px">  
       <br>
    <div class="w3-padding-32">
          <h4><b>Tax</b></h4>
      <h6><i>Add New Tax Record</i></h6>
      <form method="post" action="">
      <input type="hidden" name="randomid" value="<?php echo $_SESSION[randomid]; ?>" >
      <?php
	  include("datatables.php");
	  ?>
      <center><table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <tr>
              <th scope="row">Tax Type</th>
              <td><input type="text" name="taxtype" id="taxtype" value="<?php echo $rsedit[tax_type]; ?>" readonly="readonly" style="background-color:#CFC"></td>
            </tr>
            <tr>
              <th width="138" scope="row">Tax</th>
              <td width="212"><input type="text" name="tax" id="tax" value="<?php echo $rsedit[tax]; ?>">%</td>
            </tr>
            <tr>
              <th scope="row">Status</th>
              <td><select name="status" id="status">
                <option value="">Select status</option>
                <?php
				$arr = array("Active","Inactive");
				foreach($arr as $val)
				{
					if($val == $rsedit[status])
					{
					echo "<option value='$val' selected>$val</option>";
					}
					else
					{					
					echo "<option value='$val'>$val</option>";
					}
				}
				?>
              </select></td>
            </tr>
            <tr>
              <th colspan="2" scope="row"><input type="submit" name="submit" id="submit" value="Submit"></th>
            </tr>
      </table>
      </center>
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