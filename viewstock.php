<?php
include("main_header.php");
include("header.php");
if($_POST[randomid] == $_SESSION[randomid])
{

	// if ($qty[$i] == 0) {

	// 	$sql= "SELECT * FROM stocktb WHERE item_id='$itemid[$i]'";  
	// 	$qsql = mysqli_query($con,$sql);
	// 	while($rs = mysqli_fetch_array($qsql))
	// 	{
	// 		$remaining = $rs['qty'];
	// 		$sql= "UPDATE stocktb
	// 		SET stock_type = 'stock', qty = '".$rs['qty']."'
	// 		WHERE item_id='$itemid[$i]'";
	// 		$qsql = mysqli_query($con,$sql);
	// 		if(!$qsql)
	// 		{
	// 			echo mysqli_error($con);
	// 		}
	// 	}

	// } else {
	// 	print_r($qty[$i]);

	// 	$sql= "UPDATE stocktb
	// 	SET stock_type = 'stock', qty = '$qty[$i]'
	// 	WHERE item_id='$itemid[$i]'";
	// 	$qsql = mysqli_query($con,$sql);

	// 	// -- $sql= "DELETE FROM stocktb  WHERE stock_type='Stock' AND item_id='$itemid[$i]' AND date='$_POST[stkdate]'";
	// 	// -- $qsql = mysqli_query($con,$sql);
		
	// 	// --  $sql= "INSERT INTO stocktb(stock_type,item_id,date,qty,status) VALUES('Stock','$itemid[$i]','$_POST[stkdate]','$qty[$i]','Active')";
	// 	// -- $qsql = mysqli_query($con,$sql);
	// 	if(!$qsql)
	// 	{
	// 		echo mysqli_error($con);
	// 	}
	// }


	if(isset($_POST[btnqty]))
	{
		
		$itemid=$_POST[itemid];
		$qty = $_POST[qty];
		
		for($i=0;$i<count($itemid); $i++)
		{
			$sql= "DELETE FROM stocktb  WHERE stock_type='Stock' AND item_id='$itemid[$i]' AND date='$_POST[stkdate]'";
			$qsql = mysqli_query($con,$sql);
			
			 $sql= "INSERT INTO stocktb(stock_type,item_id,date,qty,status) VALUES('Stock','$itemid[$i]','$_POST[stkdate]','$qty[$i]','Active')";
			$qsql = mysqli_query($con,$sql);
			if(!$qsql)
			{
				echo mysqli_error($con);
			}
		}
	
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Stock record updated successfully..');</script>";
		}
	}
}
$_SESSION[randomid] = rand();
?>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 ">  
    <div >
     <center> <h4><b>stock records</b></h4>
      <h6><i>View stock records</i></h6></center>
      <script type="application/javascript">
	  function checkdate(stkdate)
	  {		  
	  window.location='viewstock.php?stkdate=' + stkdate;
	  }
      </script>
<form method="post" action="">
<input type="hidden" name="randomid" value="<?php echo $_SESSION[randomid]; ?>" >
<strong>Item Stock Date:</strong> <input type="date" name="stkdate" value="<?php 
if(isset($_GET[stkdate]))
{
echo $_GET[stkdate];
}
else
{
echo date("Y-m-d"); 	
}
?>" onChange="checkdate(this.value)" >
<p>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
  <tr>
    <th scope="col">&nbsp;Image</th>
    <th scope="col">&nbsp;Category</th>
    <th scope="col">&nbsp;Item name</th>   
    <th scope="col">&nbsp;Total Quantity</th>   
    <th scope="col">&nbsp;Total Sales</th>  
    <th scope="col">&nbsp;Remaining Quantity</th>  
  </tr>
  </thead>
  <tbody>
<?php
$sql= "SELECT * FROM itemtb WHERE status='Active'";  
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{		
	$sqlmaincat = "SELECT * FROM categorytb WHERE category_id='$rs[category_id]'";
	$qsqlmaincat = mysqli_query($con,$sqlmaincat);
	$rsmaincat = mysqli_fetch_array($qsqlmaincat);
	
	if(file_exists('itemimg/'.$rs[item_img]))
	{
		$img =  'itemimg/'.$rs[item_img];
	}
	else
	{
		$img =  "images/food-flat.png";
	}
	
	$sqlstocktb = "SELECT * FROM stocktb WHERE stock_type='Stock' AND item_id='$rs[item_id]' ";

	if(isset($_GET[stkdate]))
	{
	$sqlstocktb   = $sqlstocktb  . " AND date='$_GET[stkdate]' ";
	}
	else
	{
	$sqlstocktb   = $sqlstocktb  . " AND date='$dt' ";		
	}

	$qsqlstocktb= mysqli_query($con,$sqlstocktb);
	$rsstocktb = mysqli_fetch_array($qsqlstocktb);
	
	$sqlsalestb = "SELECT * FROM stocktb WHERE stock_type='Sales' AND item_id='$rs[item_id]' ";
	if(isset($_GET[stkdate]))
	{
	$sqlsalestb   = $sqlsalestb  . " AND date='$_GET[stkdate]' ";
	}
	else
	{
	$sqlsalestb   = $sqlsalestb  . " AND date='$dt' ";		
	}
	$qsqlsalestb= mysqli_query($con,$sqlsalestb);
	$rssalestb = mysqli_fetch_array($qsqlsalestb);
	
	
  echo "<tr>
	<td>&nbsp;<img src='$img' width='50' height='50'></td>
    <td>&nbsp;$rsmaincat[cat_name]</td>
    <td>&nbsp;$rs[item_name]</td>
<td>&nbsp;";
	echo "<input type='hidden' name='itemid[]' value='$rs[item_id]' >";
?>
	
    <input type='text' name='qty[]' <?php
    if(isset($_GET[stkdate]))
	{
		if($_GET[stkdate] != date("Y-m-d"))
		{
			echo " readonly ";
		}

	}
	?> value="<?php echo $rs[qty]; ?>" >
    
<?php
echo "</td>   <td>&nbsp;";
?>
	<input type='text' name='qtysales[]' <?php
    if(isset($_GET[stkdate]))
	{
		if($_GET[stkdate] != date("Y-m-d"))
		{
			echo " readonly ";
		}
	}
	?> value="<?php echo $rssalestb[qty]; ?>"  readonly="readonly" style="background-color:#FFC">
<?php
echo "</td>   
    <td>&nbsp;";
?>
	<input type='text' name='qtyremaining[]' <?php
    if(isset($_GET[stkdate]))
	{
		if($_GET[stkdate] != date("Y-m-d"))
		{
			echo " readonly ";
		}
	}
	?> value="<?php echo $rsstocktb[qty]-$rssalestb[qty]; ?>"  readonly="readonly" style="background-color:#FFC">
<?php
echo "</td>   
   
  </tr>";
}
?>
</tbody>
</table>
<center><input type="submit" name="btnqty" value="Update stock quantity" ></center>
</form>
<?php
include("datatables.php");
?>
      </p>
    </div>
  </div>
  <hr>
<?php
include("footer.php");
?>