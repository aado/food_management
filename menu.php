<?php
if(isset($_SESSION[customer_id]))
{
?>
<nav class="w3-sidenav w3-card-2 w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidenav">
  <a href="javascript:void(0)" onclick="w3_close()"  class="w3-closenav">Close Customer Menu</a>
  <a href="customeraccount.php">Account</a>
  <a href="customerprofile.php">Profile</a>
  <a href="changepassword.php">Change Password</a>
  <a href="viewbilling.php">Billing</a>
  <a href="viewcity.php">City</a>
  <a href="viewcustomer.php">Customer</a>
  <a href="viewdiscount.php">Discount</a>
  <a href="viewmaster.php">Master</a>
  <a href="viewrecords.php">Records</a>
  <a href="viewtax.php">Tax</a>
  <a href="viewtransaction.php">Transaction</a>
  <a href="viewuser.php">User</a>
  <a href="viewcategory.php">Category</a>
  <a href="logout.php">Logout</a>
  
</nav>
<?php
}
if(isset($_SESSION[user_id]))
{
?>
<nav class="w3-sidenav w3-card-2 w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:30%;min-width:300px" id="mySidenav">
  <a href="javascript:void(0)" onclick="w3_close()"  class="w3-closenav">Close Admin Menu</a>
  <a href="dashboard.php">Dashboard</a>
  <a href="foodmenu.php">Menu</a>
  <a href="viewitem.php">Items</a>
  <a href="viewstock.php">Stock</a>
  <!-- <a href="viewbilling.php">Billing</a> -->
  <!-- <a href="viewcity.php">City</a> -->
  <!-- <a href="viewcustomer.php">Customer</a> -->
  <!-- <a href="viewdiscount.php">Discount</a> -->
  <!-- <a href="viewmaster.php">Master</a> -->
  <!-- <a href="viewrecords.php">Records</a> -->
  <!-- <a href="viewtransaction.php">Transaction</a> -->
  <a href="viewcategory.php">Category</a>
  <!-- <a href="viewuser.php">User</a> -->
  <!-- <a href="viewtax.php">Tax</a> -->
  <a href="logout.php">Logout</a>
</nav>
<?php
}
?>