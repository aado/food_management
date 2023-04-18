<?php
include("header.php");
if($_POST[randomid] == $_SESSION[randomid])
{
	if(isset($_POST[submit]))
	{
		$pwd= md5($_POST[password]);
		if(isset($_GET[editid]))
			{
				$sql= "UPDATE usertb  SET user_type='$_POST[usertype]',name='$_POST[name]',login_id='$_POST[loginid]',";
				if($_POST[password] != "")
				{
				$sql= $sql . " password='$_POST[password]',";
				}
				$sql= $sql . " email_id='$_POST[emailid]',mobile_no='$_POST[mobileno]',status='$_POST[status]' WHERE user_id='$_GET[editid]'";
				$qsql = mysqli_query($con,$sql);
				if(!$qsql)
				{
					echo mysqli_error($con);
				}
				if(mysqli_affected_rows($con) == 1)
				{
					echo "<script>alert('User record updated successfully..');</script>";
				}
			}	
			else
			{
				if(isset($_POST[submit]))
				{
					$sql= "INSERT INTO usertb(user_type,name,login_id,password,email_id,mobile_no,status) VALUES('$_POST[usertype]','$_POST[name]','$_POST[loginid]','$pwd','$_POST[emailid]','$_POST[mobile]','$_POST[status]')";
					$qsql = mysqli_query($con,$sql);
					if(!$qsql)
					{
						echo mysqli_error($con);
					}
					if(mysqli_affected_rows($con) == 1)
					{
						echo "<script>alert('User record inserted successfully..');</script>";
						echo "<script>window.location='viewuser.php';</script>";
					}
				}
			}
	}
}
$_SESSION[randomid]  = rand();
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM usertb WHERE user_id='$_GET[editid]'";
	$qsqledit =mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center" style="max-width:1200px;margin-top:50px">  
       <br>
    <div class="w3-padding-32">
          <h4><b>User</b></h4>
      <h6><i>Add New User Record</i></h6>      <?php
	  include("datatables.php");
	  ?>

      <form action="" method="post" enctype="multipart/form-data">
       <input type="hidden" name="randomid" value="<?php echo $_SESSION[randomid]; ?>" >
     <center>
      <table width="233" cellspacing="0" class="table table-striped table-bordered"  id="example">
            <tr>
              <th width="138" scope="row">User Type</th>
              <td width="212">
                <select name="usertype" id="usertype">                
                <option value="">Select status</option>
                <?php
				$arr = array("Operator","Admin");
				foreach($arr as $val)
				{
					if($val == $rsedit[user_type])
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
              <th scope="row"> Name</th>
              <td><input type="text" name="name" id="name" value="<?php echo $rsedit[name]; ?>"></td>
            </tr>
            <tr>
              <th scope="row">Login Id</th>
              <td>
                <input type="text" name="loginid" id="loginid" value="<?php echo $rsedit[login_id]; ?>"></td>
            </tr>
            <tr>
              <th scope="row">Password</th>
              <td scope="row"><input type="password" name="password" id="password" ></td>
            </tr>
            <tr>
              <th scope="row">Confirm Password</th>
              <td scope="row">
              <input type="password" name="confirmpassword" id="confirmpassword" ></td>
            </tr>
            <tr>
              <th scope="row">Email ID</th>
              <td scope="row"><label for="emailid"></label>
              <input type="email" name="emailid" id="emailid" value="<?php echo $rsedit[email_id]; ?>"></td>
            </tr>
            <tr>
              <th scope="row">Mobile No.</th>
              <td scope="row"><label for="mobile"></label>
              <input type="text" name="mobile" id="mobile" value="<?php echo $rsedit[mobile_no]; ?>"></td>
            </tr>
            <tr>
              <th scope="row">Status</th>
              <td scope="row"><p>
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
                </select>
              </p></td>
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