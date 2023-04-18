<?php
include("header.php");
if($_POST[randomid] == $_SESSION[randomid])
{
	if(isset($_POST[submit]))
	{
			if(isset($_GET[editid]))
			{
				$sql= "UPDATE categorytb set main_catid='$_POST[maincategory]',cat_name='$_POST[categoryname]',cat_note='$_POST[note]',status='$_POST[status]' WHERE category_id='$_GET[editid]'";
				$qsql = mysqli_query($con,$sql);
				if(!$qsql)
				{
					echo mysqli_error($con);
				}
				if(mysqli_affected_rows($con) == 1)
				{
					echo "<script>alert('Category record updated successfully..');</script>";
				}
			}
			else
			{
			$sql= "INSERT INTO categorytb(main_catid,cat_name,cat_note,status) VALUES('$_POST[maincategory]','$_POST[categoryname]','$_POST[note]','$_POST[status]')";
			$qsql = mysqli_query($con,$sql);
			if(!$qsql)
			{
				echo mysqli_error($con);
			}
			if(mysqli_affected_rows($con) == 1)
			{
				echo "<script>alert('Category record inserted successfully..');</script>";
			}
		}
	}
}
$_SESSION[randomid]  = rand();
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM categorytb WHERE category_id='$_GET[editid]'";
	$qsqledit =mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center" style="max-width:1200px;margin-top:50px">  
       <br>
    <div class="w3-padding-32"><br>

          <h4><b>Category</b></h4>
      <h6><i>Add New category Record</i></h6>
      <form method="post" action="">
      <input type="hidden" name="randomid" value="<?php echo $_SESSION[randomid]; ?>" >
      <centeR>
      <table id="example" class="table table-striped table-bordered" cellspacing="0" style="width:50%;">
            <tr>
              <th width="138" scope="row">Main category</th>
              <td width="212"><label for="maincategory"></label>
                    <select name="maincategory" id="maincategory">
                    <option value="">Select category</option>
                    <?php
					$sqlcat = "SELECT * FROM categorytb WHERE status='Active' AND main_catid='0'";
					$qsqlcat = mysqli_query($con,$sqlcat);
					while($rscat = mysqli_fetch_array($qsqlcat))
					{
						if($rscat[category_id] ==$rsedit[main_catid] )
						{
							echo "<option value='$rscat[category_id]' selected>$rscat[cat_name]</option>";
						}
						else
						{
							echo "<option value='$rscat[category_id]'>$rscat[cat_name]</option>";
						}
					}
					?>
                  </select>
              </td>
            </tr>
            <tr>
              <th scope="row">category name</th>
              <td><input type="text" name="categoryname" id="categoryname" value="<?php echo $rsedit[cat_name]; ?>"></td>
            </tr>
            <tr>
              <th scope="row">note</th>
              <td><label for="note"></label>
              <textarea name="note" id="note"><?php echo $rsedit[cat_note]; ?></textarea></td>
            </tr>
            <tr>
              <th scope="row">Status</th>
              <td><label for="status"></label>
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
              </select></td>
            </tr>
            <tr>
              <th colspan="2" scope="row"><input type="submit" name="submit" id="submit" value="Submit"></th>
            </tr>
      </table>
      </centeR>
      </form>
      <p>&nbsp;</p>
      </div>
  </div>

<?php
include("footer.php");
?><?php
include("datatables.php");
?>