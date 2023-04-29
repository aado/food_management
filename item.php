<?php
include("main_header.php");
include("header.php");
if($_POST[randomid] == $_SESSION[randomid])
{
	$imgname = rand() . $_FILES["image"]["name"];
	move_uploaded_file($_FILES["image"]["tmp_name"], "itemimg/" . $imgname);

	if(isset($_POST[submit]))
	{
		if(isset($_GET[editid]))  
			{
				$sql= "UPDATE itemtb  SET category_id='$_POST[category]',item_name='$_POST[itemname]',item_discription='$_POST[itemdescription]',item_cost='$_POST[itemcost]',status='$_POST[status]'WHERE item_id='$_GET[editid]'";

				$sql= "UPDATE stocktb SET qty='$_POST[qty]', status='$_POST[status]' WHERE item_id='$_GET[editid]'";
				// $qsql1 = mysqli_query($con,$sql1);
				$qsql = mysqli_query($con,$sql);

				// if($qsql == 1)
				// {
				// 	$sql1= "INSERT INTO `stocktb`( `stock_type`, `item_id`, `date`, `qty`, `status`) VALUES ('$_POST[stock_type]', '$_POST[item_id]',date('Y-m-d'), '$_POST[qty]', '$_POST[status]')";
				// $qsql1 = mysqli_query($con,$sql1);
				// }


				if(!$qsql)
				{
					echo mysqli_error($con);
				}
				if(mysqli_affected_rows($con) == 1)
				{

						echo "<script>alert('Item record updated successfully..');</script>";
					echo "<script>window.location='viewitem.php';</script>";
					
				}
			}
			else
			{
				$sql= "INSERT INTO itemtb(category_id,item_name,item_discription,item_cost,item_img,status,discount_type,discount_amt) VALUES('$_POST[category]','$_POST[itemname]','$_POST[itemdescription]','$_POST[itemcost]','$imgname','$_POST[status]','$_POST[discounttype]','$_POST[discount_amt]')";

				$sql= "INSERT INTO `stocktb`( `stock_type`, `item_id`, `date`, `qty`, `status`) VALUES ('Stock', '$_POST[editid]',CURRENT_TIMESTAMP(), '$_POST[qty]', '$_POST[status]')";

				$qsql = mysqli_query($con,$sql);
				if(!$qsql)
				{
					echo mysqli_error($con);
				}
				if(mysqli_affected_rows($con) == 1)
				{
					echo "<script>alert('item record inserted successfully..');</script>";
					echo "<script>window.location='viewitem.php';</script>";
				}
			}
	}
}
$_SESSION[randomid]  = rand();
if(isset($_GET[editid]))
{

	$sqledit = "SELECT * FROM itemtb WHERE item_id='$_GET[editid]'";
	$qsqledit =mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);

	$query = "SELECT * FROM stocktb WHERE item_id='$_GET[editid]'";
	$queryedit =mysqli_query($con,$query);
	$stockedit = mysqli_fetch_array($queryedit);
}
?>
  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center" style="max-width:1200px;margin-top:50px">  
       <br><br>
<br>

    <div class="w3-padding-32">
          <h4><b>Item</b></h4>
      <h6><i>Add New Item Record</i></h6>
      <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="randomid" value="<?php echo $_SESSION[randomid]; ?>" >
      <center>
      <table id="example" class="table table-striped table-bordered" cellspacing="0" style="width:50%;">
            <tr>
              <th width="138" scope="row">Category</th>
              <td width="212">
                <select name="category" id="category" required="required" oninvalid="setCustomValidity('Please select category.')" onchange="try{setCustomValidity('')}catch(e){}">
                    <option value="">Select category</option>
                    <?php
					$sqlcat = "SELECT * FROM categorytb WHERE status='Active' and main_catid='0'";
					$qsqlcat = mysqli_query($con,$sqlcat);
					while($rscat = mysqli_fetch_array($qsqlcat))
					{
						if($rscat[category_id] ==$rsedit[category_id] )
						{
							echo "<option value='$rscat[category_id]' selected>$rscat[cat_name]</option>";
						}
						else
						{
							echo "<option value='$rscat[category_id]'>$rscat[cat_name]</option>";
						}
						
											$sqlsubcat = "SELECT * FROM categorytb WHERE status='Active' and main_catid='$rscat[category_id]'";
											$qsqlsubcat = mysqli_query($con,$sqlsubcat);
											while($rssubcat = mysqli_fetch_array($qsqlsubcat))
											{
												if($rssubcat[category_id] ==$rsedit[category_id] )
												{
													echo "<option value='$rssubcat[category_id]' selected> $rscat[cat_name] -> $rssubcat[cat_name]</option>";
												}
												else
												{
													echo "<option value='$rssubcat[category_id]'> $rscat[cat_name] -> $rssubcat[cat_name]</option>";
												}
												
											}
					}
					?>
                </select></td>
            </tr>
            <tr>
              <th scope="row">Item Name</th>
              <td><input type="text" name="itemname" id="itemname" value="<?php echo $rsedit[item_name]; ?>" required="required" oninvalid="setCustomValidity('Please enter item name.')" onchange="try{setCustomValidity('')}catch(e){}"></td>
            </tr>
            <tr>
              <th scope="row">Item Description</th>
              <td><textarea name="itemdescription" id="itemdescription" required="required" oninvalid="setCustomValidity('Please enter item description.')" onchange="try{setCustomValidity('')}catch(e){}"><?php echo $rsedit[item_discription]; ?></textarea></td>
            </tr>
            <tr>
              <th scope="row">Item Cost</th>
              <td scope="row"><input type="text" name="itemcost" id="itemcost" value="<?php echo $rsedit[item_cost]; ?>" required="required" oninvalid="setCustomValidity('Please enter item cost.')" onchange="try{setCustomValidity('')}catch(e){}"></td>
            </tr>
            <tr>
              <th scope="row">Quantity</th>
              <td scope="row"><input type="text" name="qty" id="qty" value="<?php 
              echo $stockedit[qty]; ?>" required="required" oninvalid="setCustomValidity('Please enter item quantity.')" onchange="try{setCustomValidity('')}catch(e){}"></td>
            </tr>
            <!-- <tr>
              <th scope="row">Discount type</th>
              <td scope="row">
              <select name="discounttype">
              <option value="">Select discount type</option>
              <?php
			  $arr = array("Flat","Percentage");
			  foreach($arr as $val)
			  {
				  if($val == $rsedit[discount_type])
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
              </td>
            </tr> 
            <tr>
              <th scope="row">Discount amount</th>
              <td scope="row"><input type="text" name="discount_amt" id="discount_amt" value="<?php echo $rsedit[discount_amt]; ?>" ></td>
            </tr>
            <tr>
              <th scope="row">Image</th>
              <td scope="row"><input type="file" name="image" id="image" required="required" oninvalid="setCustomValidity('Please select file.')" onchange="try{setCustomValidity('')}catch(e){}" accept="image/*"></td>
            </tr>-->
            <tr>
              <th scope="row">Status</th>
              <td scope="row"><label for="status2"></label>
                <select name="status" required="required" oninvalid="setCustomValidity('Please select status.')" onchange="try{setCustomValidity('')}catch(e){}">
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
				?>>
              </select></td>
            </tr>
            <tr>
              <th colspan="2" scope="row"><input type="submit" name="submit" id="submit" value="Submit"></th>
            </tr>
      </table>
      </select>
      </form>
      <p>&nbsp;</p>
      </div>
  </div>

<?php
include("footer.php");
?>
<?php
include("datatables.php");
?>