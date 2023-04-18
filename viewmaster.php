<?php
include("header.php");
?>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <div class="w3-padding-32">
      <h4><b>master records</b></h4>
      <h6><i>View master records</i></h6>
      <p>
      <table width="200" border="1">
  <tr>
    <th scope="col">&nbsp;line_no</th>
    <th scope="col">&nbsp;line_type</th>
    <th scope="col">&nbsp;line_text</th>
    <th scope="col">&nbsp;status</th>
    
    <th scope="col">&nbsp;Action</th>
  </tr>
<?php
$sql= "SELECT * FROM mastertb";  
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
  echo "<tr>
    <td>&nbsp;$rs[line_no]</td>
    <td>&nbsp;$rs[line_type]</td>
	<td>&nbsp;$rs[line_text]</td>
   
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