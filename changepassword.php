<?php
include("header.php");
if($_POST[randomid] == $_SESSION[randomid])
{
	if(isset($_POST[submit]))
	{
		$sql= "INSERT INTO customertb(customer_type,customer_name,login_id,password,address,city_id,shop_name,tin_no,mobile_no,status) VALUES('$_POST[customertype]','$_POST[custmername]','$_POST[loginid]','$_POST[password]','$_POST[address]','$_POST[city]','$_POST[shopname]','$_POST[tinno]','$_POST[mobileno]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(!$qsql)
		{
			echo mysqli_error($con);
		}
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Customer record inserted successfully..');</script>";
		}
	}
}
$_SESSION[randomid]  = rand();
?>
  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center" style="max-width:1200px;margin-top:50px">  
       <br>
    <div class="w3-padding-32">
          <h4><b>Customer</b></h4>
      <h6><i>Add New Customer Record</i></h6>
      <form action="" method="post" enctype="multipart/form-data">
         <input type="hidden" name="randomid" value="<?php echo $_SESSION[randomid]; ?>" >
         <?php
		 include("datatables.php");
		 ?>
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
      
            <tr>
              <th width="138" scope="row">Customer Type</th>
              <td width="212"><label for="operator"></label>
                <label for="customertype"></label>
                <select name="customertype" id="customertype">
                </select>
<label for="discount type"></label>
                <label for="usertype"></label></td>
            </tr>
            <tr>
              <th scope="row">Customer Name</th>
              <td><input type="text" name="custmername" id="custmername"></td>
            </tr>
            <tr>
              <th scope="row">Login Id</th>
              <td><label for="ite"></label>
                <label for="itemdescription"></label>
                <label for="loginid"></label>
                <input type="text" name="loginid" id="loginid"></td>
            </tr>
            <tr>
              <th scope="row">Password</th>
              <td scope="row"><label for="image"></label>
                <label for="password"></label>
              <input type="text" name="password" id="password"></td>
            </tr>
            <tr>
              <th scope="row">Confirm Password</th>
              <td scope="row"><label for="confirmpassword"></label>
              <input type="text" name="confirmpassword" id="confirmpassword"></td>
            </tr>
            <tr>
              <th scope="row">Address</th>
              <td scope="row"><label for="address"></label>
              <textarea name="address" id="address"></textarea></td>
            </tr>
            <tr>
              <th scope="row">City</th>
              <td scope="row"><input type="text" name="city" id="city"></td>
            </tr>
            <tr>
              <th scope="row">Shop Name</th>
              <td scope="row"><label for="shopname"></label>
              <input type="text" name="shopname" id="shopname"></td>
            </tr>
            <tr>
              <th scope="row">Tin No.</th>
              <td scope="row"><label for="tinno"></label>
              <input type="text" name="tinno" id="tinno"></td>
            </tr>
            <tr>
              <th scope="row">Mobile No.</th>
              <td scope="row"><label for="mobileno"></label>
              <input type="text" name="mobileno" id="mobileno"></td>
            </tr>
            <tr>
              <th scope="row">Status</th>
              <td scope="row"><label for="mobile"></label>
                <label for="status"></label>
                <select name="status" id="status">
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