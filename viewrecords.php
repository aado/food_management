<?php
include("header.php");
?>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <div class="w3-padding-32">
      <h4><b>stock records</b></h4>
      <h6><i>View stock records</i></h6>
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
    <th scope="col">&nbsp;bill_recid</th>
    <th scope="col">&nbsp;bill_id</th>
    <th scope="col">&nbsp;item_id</th>
    <th scope="col">&nbsp;qty</th>
     <th scope="col">&nbsp;item_cost</th>
     <th scope="col">&nbsp;discount</th>
     <th scope="col">&nbsp;discount_type</th>
    <th scope="col">&nbsp;Status</th>
    <th scope="col">&nbsp;Action</th>
  </tr>
<?php
$sql= "SELECT * FROM recordstb";  
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
  echo "<tr>
    <td>&nbsp;$rs[bill_recid]</td>
    <td>&nbsp;$rs[bill_id]</td>
    <td>&nbsp;$rs[item_id]</td>
    <td>&nbsp;$rs[qty]</td>
	<td>&nbsp;$rs[item_cost]</td>
    <td>&nbsp;$rs[discount]</td>
    <td>&nbsp;$rs[discount_type]</td>
   
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