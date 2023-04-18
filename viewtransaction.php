<?php
include("header.php");
?>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <div class="w3-padding-32">
      <h4><b>transaction records</b></h4>
      <h6><i>View transaction records</i></h6>
      <p>
      <table width="200" border="1">
  <tr>
    <th scope="col">&nbsp;<?php
include("header.php");
?>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <div class="w3-padding-32">
      <h4><b>records</b></h4>
      <h6><i>View records</i></h6>
      <p>
      <table width="200" border="1">
  <tr>
    <th scope="col">&nbsp;transaction_id</th>
    <th scope="col">&nbsp;bill_id</th>
    <th scope="col">&nbsp;trans_type</th>
    <th scope="col">&nbsp;customer_id</th>
     <th scope="col">&nbsp;user_id</th>
     <th scope="col">&nbsp;amt</th>
     <th scope="col">&nbsp;payment_type</th>
      <th scope="col">&nbsp;payment_details</th>
    <th scope="col">&nbsp;Status</th>
    <th scope="col">&nbsp;Action</th>
  </tr>
<?php
$sql= "SELECT * FROM transactiontb";  
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
  echo "<tr>
    <td>&nbsp;$rs[transaction_id]</td>
    <td>&nbsp;$rs[bill_id]</td>
    <td>&nbsp;$rs[trans_type]</td>
    <td>&nbsp;$rs[customer_id]</td>
	<td>&nbsp;$rs[user_id]</td>
    <td>&nbsp;$rs[amt]</td>
    <td>&nbsp;$rs[payment_type]</td>
   <td>&nbsp;$rs[payment_details]</td>
    <td>&nbsp;$rs[status]</td>
    <td>&nbsp;Edit } Delete</td>
  </tr>";
}
?>

</table>

      </p>
    </div>
  </div>
  <hr>
<?php
include("footer.php");
?>