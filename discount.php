<?php
include("header.php");
if($_POST[randomid] == $_SESSION[randomid])
{
	if(isset($_POST[submit]))
	{
				$sql= "UPDATE discounttb  SET  discount_amt='$_POST[discountamt]',status='$_POST[status]' WHERE discount_id='$_GET[editid]'";
				$qsql = mysqli_query($con,$sql);
				if(!$qsql)
				{
					echo mysqli_error($con);
				}
				if(mysqli_affected_rows($con) == 1)
				{
					echo "<script>alert('Discount record updated successfully..');</script>";
				}
	}
}
$_SESSION[randomid]  = rand();
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM discounttb WHERE discount_id='$_GET[editid]'";
	$qsqledit =mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center" style="max-width:1200px;margin-top:50px">  
       <br>
    <div class="w3-padding-32">
          <h4><b>Discount</b></h4>
      <h6><i>Add New Discount Record</i></h6>
      <form method="post" action="">
            <input type="hidden" name="randomid" value="<?php echo $_SESSION[randomid]; ?>" >
      <table  border="1"  id="example" class="table table-striped table-bordered">
            <tr>
              <th width="138" scope="row">discount type</th>
              <td width="212"><label for="operator"></label>
                <label for="discount type"></label>
              <input type="text" name="discounttype" id="discount type" value="<?php echo $rsedit[discount_type];?>" readonly style="background-color:#EBE39F;"></td>
            </tr>
            <tr>
              <th scope="row">Discount amount</th>
              <td><input type="text" name="discountamt" id="discountamt" value="<?php echo $rsedit[discount_amt];?>"></td>
            </tr>
            <tr>
              <th scope="row">Status</th>
              <td><label for="status"></label>
                <select name="status" id="status">                         
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