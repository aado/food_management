<?php
include("header.php");
if($_POST[randomid] == $_SESSION[randomid])
{
	if(isset($_POST[submit]))
	{
		$pwd = md5($_POST[password]);
		$sql= "INSERT INTO customertb(customer_type,customer_name,login_id,password,address,city_id,shop_name,tin_no,mobile_no,status) VALUES('$_POST[customertype]','$_POST[custmername]','$_POST[loginid]','$pwd','$_POST[address]','$_POST[city]','$_POST[shopname]','$_POST[tinno]','$_POST[mobileno]','Pending')";
		$qsql = mysqli_query($con,$sql);
		if(!$qsql)
		{
			echo mysqli_error($con);
		}
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Thanks for the Registration.. You will have to wait 24 hours to log into your account...');</script>";
			echo "<script>window.location='login.php';</script>";			
		}
	}
}
$_SESSION[randomid]  = rand();
?>
  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center" style="max-width:1200px;margin-top:50px">  
       <br>
    <div class="w3-padding-32">
          <h4><b>Registration panel</b></h4>
      <h6><i>Kindly fill the following form to register</i></h6>
      <form action="" method="post" enctype="multipart/form-data">
         <input type="hidden" name="randomid" value="<?php echo $_SESSION[randomid]; ?>" >         <?php
		 include("datatables.php");
		 ?>

      <center><table id="example" class="table table-striped table-bordered" cellspacing="0" style="width:500px;">
            <tr>
              <th width="138" scope="row">Customer Type</th>
              <td width="212">
              	<select name="customertype" id="customertype" onchange="loadcustomertype(this.value)">
                <option value=''>Select customer type</option>
                <?php
				$arr= array("One time","Regular");
				foreach($arr as $val)
				{
					echo "<option value='$val'>$val</option>";
				}
				?>
                </select>
                </td>
                </tr>
           </table>
            <span id='divloadcustomertype'>

			</span>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" style="width:500px;">
            <tr>
              <th scope="row" width="138" scope="row">Login Id</th>
              <td width="212"><input type="text" name="loginid" id="loginid"></td>
            </tr>
            <tr>
              <th scope="row">Password</th>
              <td scope="row"><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
              <th scope="row">Confirm Password</th>
              <td scope="row"><input type="password" name="confirmpassword" id="confirmpassword"></td>
            </tr>
            <tr>
              <th scope="row">Address</th>
              <td scope="row"><textarea name="address" id="address"></textarea></td>
            </tr>
            <tr>
              <th scope="row">City</th>
              <td scope="row">
              <select name="city">
              <option value="">Select city</option>
              <?php
			  $sqlcity = "SELECT * FROM citytb where status='Active'";
			  $qsqlcity = mysqli_query($con,$sqlcity);
			  while($rscity  = mysqli_fetch_array($qsqlcity))
			  {
				  echo "<option value='$rscity[city_id]'>$rscity[city]</option>";
			  }
			  ?>
              </select>
              </td>

            
            <tr>
              <th scope="row">Mobile No.</th>
              <td scope="row"><input type="text" name="mobileno" id="mobileno"></td>
            </tr>
           
            <tr>
              <th colspan="2" scope="row"><center><input type="submit" name="submit" id="submit" value="Click Here to Register"></center></th>
            </tr>
        </table></center>
      </form>
      <p>&nbsp;</p>
      </div>
  </div>

<?php
include("footer.php");
?>
<script type="application/javascript">
function loadcustomertype(custtype)
{
	if (custtype == "One time")
	{
        document.getElementById("divloadcustomertype").innerHTML = "<table id='example' class='table table-striped table-bordered' cellspacing='0' style='width:500px;'><tr><th scope='row' width='200'>Customer Name</th><td><input type='text' name='custmername' id='custmername'></td></tr></table>";
        return;
    } 
	else if (custtype == "Regular")
	{ 
        document.getElementById("divloadcustomertype").innerHTML = "<table id='example' class='table table-striped table-bordered' cellspacing='0' style='width:500px;'><tr><th scope='row' width='200'>Shop Name</th><td scope='row'><input type='text' name='shopname' id='shopname'></td></tr><tr><th scope='row'>TIN No.</th><td scope='row'><input type='text' name='tinno' id='tinno'></td></tr></table>";
        return;
    }
}
</script>            
            