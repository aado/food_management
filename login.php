<?php
include("header.php");

if(isset($_SESSION[customer_id]))
{
	echo "<script>window.location='customeraccount.php';</script>";
}
if(isset($_POST["btnlogin"]))
{
	$pwd = md5($_POST[password]);
	$sql  = "SELECT * FROM customertb where login_id='$_POST[loginid]' AND password='$pwd'";
	$qsql = mysqli_query($con,$sql);
	$rs = mysqli_fetch_array($qsql);
	if(mysqli_num_rows($qsql) ==1)
	{		
		if($rs[status] == "Pending")
		{
			echo "<script>alert('Your account not activated yet.. You will have to wait 24 hours to log into your account...');</script>";
		}
		else if($rs[status] == "Deactivated")
		{
			echo "<script>alert('Your account has been deactivated. Kindly contact us for further information..');</script>";
		}
		else
		{
			$_SESSION[customer_id] = $rs[customer_id];
			echo "<script>window.location='customeraccount.php';</script>";
		}
	}
	else
	{
		echo "<script>alert('Inavalid login credentials entered..');</script>";
	}
}
?>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">


  
  <hr id="about">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center" style="max-width:1200px;margin-top:50px">  
    <div class="w3-padding-32">
      <h4><b>Customer Login Panel..</b></h4>
      <h6><i>Kindly enter Login ID and Password to Login</i></h6>
      <p>
      <form method="post" action="">
      <?php
	  include("datatables.php");
	  ?>
            <center><table id="example" class="table table-striped table-bordered" cellspacing="0" style="width:500px;">
              <tbody>
                <tr>
                  <th width="166" scope="row">Login ID</th>
                  <td width="176">&nbsp;<input type="text" name="loginid"></td>
                </tr>
                <tr>
                  <th scope="row">Password</th>
                  <td>&nbsp;<input type="password" name="password"></td>
                </tr>
                <tr>
                  <th colspan="2" scope="row">&nbsp;<input type="submit" name="btnlogin" value="Click Here to Login"></th>
                  </tr>
              </tbody>
            </table>
            </center>
		</form>
      </p>
    </div>
  </div>
  <hr>
<?php
include("footer.php");
?>