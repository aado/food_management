<?php
include("header.php");

if($_POST[randomid] == $_SESSION[randomid])
{
	if(isset($_POST[submit]))
	{
		if(isset($_GET[editid]))
		{
			$sql= "UPDATE citytb set user_id='$_POST[operator]',city='$_POST[city]',status='$_POST[status]' WHERE city_id='$_GET[editid]'";
			$qsql = mysqli_query($con,$sql);
			if(!$qsql)
			{
				echo mysqli_error($con);
			}
			if(mysqli_affected_rows($con) == 1)
			{
				echo "<script>alert('City record updated successfully..');</script>";
				echo "<script>window.location='viewcity.php';</script>";
			}
		}
		else
		{
			$sql= "INSERT INTO citytb(user_id,city,status) VALUES('$_POST[operator]','$_POST[city]','$_POST[status]')";
			$qsql = mysqli_query($con,$sql);
			if(!$qsql)
			{
				echo mysqli_error($con);
			}
			if(mysqli_affected_rows($con) == 1)
			{
				echo "<script>alert('City record inserted successfully..');</script>";
				echo "<script>window.location='viewcity.php';</script>";
			}
		}
	}
}
$_SESSION[randomid]  = rand();
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM citytb WHERE city_id='$_GET[editid]'";
	$qsqledit =mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center" style="max-width:1200px;margin-top:50px">  
       <br>
    <div class="w3-padding-32">
          <h4><b>City</b></h4>
      <h6><i>Add New city Record</i></h6>
      <form method="post" action="">
      <input type="hidden" name="randomid" value="<?php echo $_SESSION[randomid]; ?>" >
      <?php
include("datatables.php");
?>
<center>
      <table width="284" cellspacing="0" class="table table-striped table-bordered" id="example" >
            <tr>
              <th width="115" scope="row">Operator</th>
              <td width="163"><label for="operator"></label>
                <select name="operator" id="operator" required="required" oninvalid="setCustomValidity('Please select operator.')" onchange="try{setCustomValidity('')}catch(e){}">
                <option value="">Select operator</option>
                <?php
                	$sqlusertb = "SELECT * FROM usertb WHERE user_type='Operator' AND status='Active'";
                    $qsqlusertb =mysqli_query($con,$sqlusertb);
                    while($rsusertb = mysqli_fetch_array($qsqlusertb))
					{
						echo "<option value='$rsusertb[user_id]'>$rsusertb[name] ($rsusertb[login_id])</option>";
					}
				?>
              </select></td>
            </tr>
            <tr>
              <th scope="row">City</th>
              <td><input type="text" name="city" id="city" value="<?php echo $rsedit[city]; ?>" required="required" oninvalid="setCustomValidity('Please enter city name.')" onchange="try{setCustomValidity('')}catch(e){}"></td>
            </tr>
            <tr>
              <th scope="row">Status</th>
              <td>
                <select name="status" id="status" required="required" oninvalid="setCustomValidity('Please select status.')" onchange="try{setCustomValidity('')}catch(e){}">
                <option value="">Select status</option>
                <?php
				$arr = array("Active","Inactive");
				foreach($arr as $val)
				{
					echo "<option value='$val'>$val</option>";	
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