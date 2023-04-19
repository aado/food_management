
<?php
  include("header.php");
  include("main_header.php");
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #4b71f9;
  width: 15%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  /* border-left: none; */
  /* height: 300px; */
}
</style>
</head>
<body>
<br>
<div  style="margin-left: 30px;">
<h2>Menu</h2>
<p>Please Pick delicious menu for order</p>
</div style="margin-left: 30px;">
<div class="tab"  style="margin-left: 30px;">
	<?php
		$sql= "SELECT * FROM categorytb WHERE main_catid=0";  
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{   
	?>
		<button class="tablinks" onclick="openCity(event, '<?php echo $rs['category_id']; ?>')" id="defaultOpen"><?php echo $rs["cat_name"]; ?></button>
		<!-- <button class="tablinks" onclick="openCity(event, 'Paris')">Cat2</button> -->
		<!-- <button class="tablinks" onclick="openCity(event, 'Tokyo')">Cat1</button> -->
  	<?php }  ?>
</div>
<?php
	$sqlcat= "SELECT * FROM categorytb WHERE main_catid=0";  
	$qsqlcat = mysqli_query($con,$sqlcat);
	while($rs = mysqli_fetch_array($qsqlcat))
	{   
?>
<div id="<?php echo $rs['category_id']; ?>" class="tabcontent">
  <h3><?php echo $rs['cat_name']; ?></h3>
  <div class="row">
    <?php
      $sql= "SELECT * FROM itemtb WHERE status='Active' AND category_id=".$rs['category_id']."";  
      $qsql = mysqli_query($con,$sql);
      while($rsitem = mysqli_fetch_array($qsql))
      {   
    ?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3 food-item">
          <form method="post" action="cart.php?action=add&id=<?php echo $rsitem["item_id"]; ?>">
            <input type="hidden" name="item_name" value="<?php echo $rsitem["item_name"]; ?>">
            <input type="hidden" name="item_cost" value="<?php echo $rsitem["item_cost"]; ?>">
            <input type="hidden" name="item_id" value="<?php echo $rsitem["item_id"]; ?>">
            <div class="card rounded-0" align="center";>                      
              <div class="food-img-holder position-relative overflow-hidden">
              <!-- <img src="<?php echo $rsitem["images"]; ?>" class="img-top"> -->
              </div>
              <div class="card-body">
                <div class="lh-1">
					<img src='itemimg/<?php echo $rsitem["item_img"]; ?>' style="width: 240px;height: 153px;margin-bottom: 10px;">
                  <div class="card-title fw-bold h5 mb-0"><?php echo $rsitem["item_name"]; ?></div>
                  <div class="card-description text-muted"><small><?php echo $rsitem["description"]; ?></small></div>
                  <div><small class="card-description text-success h6 mb-0">₱ <?php echo $rsitem["item_cost"]; ?></small></div>
                  <div class="d-grid" style="margin-top: 10px;">
                  <div class="input-group input-sm">
                    <span class="input-group-text rounded-0">Quantity</span>
                    <input type="number" class="form-control rounded-0 text-center" id="quantity" name="quantity" value="1" required="required">
                  </div>
                  <input type="submit" name="add" style="margin-top:5px;" class="btn btn-primary btn-sm rounded-0" value="Add to Cart">
                  </div>
                </div>
              </div>
              
            </div>
          </form>    
        </div>
        <?php
        }
        ?>
  </div>
</div>
<?php } ?>
<!-- 
<div id="Paris" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div> -->

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 





<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;">
<!-- <div class="row">
  <h1 style="text-align:center;text-align: center;color: #761dc9;"> MENU </h1>
	<div class="row" style="position: absolute;left: 45px;margin-top: 60px;width: 40%;">
		<div class="col-4">
			<div class="list-group" id="myList" role="tablist">
			<a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Category</a>
			<a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
			<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
			<a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
			<a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
			</div>
		</div>
		<div class="col-8">
			<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>
			<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
			<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
			<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
			</div>
		</div>
	</div>
  <div class="row">
    <?php
    //   $sql= "SELECT * FROM itemtb WHERE status='Active'";  
    //   $qsql = mysqli_query($con,$sql);
    //   while($rs = mysqli_fetch_array($qsql))
    //   {   
    ?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3 food-item">
          <form method="post" action="cart.php?action=add&id=<?php echo $rs["item_id"]; ?>">
            <input type="hidden" name="item_name" value="<?php echo $rs["item_name"]; ?>">
            <input type="hidden" name="item_cost" value="<?php echo $rs["item_cost"]; ?>">
            <input type="hidden" name="item_id" value="<?php echo $rs["item_id"]; ?>">
            <div class="card rounded-0" align="center";>                      
              <div class="food-img-holder position-relative overflow-hidden">
              <!-- <img src="<?php echo $rs["images"]; ?>" class="img-top"> -->
              <!-- </div>
              <div class="card-body">
                <div class="lh-1">
					<img src='itemimg/<?php echo $rs["item_img"]; ?>' style="width: 240px;height: 153px;margin-bottom: 10px;">
                  <div class="card-title fw-bold h5 mb-0"><?php echo $rs["item_name"]; ?></div>
                  <div class="card-description text-muted"><small><?php echo $rs["description"]; ?></small></div>
                  <div><small class="card-description text-success h6 mb-0">₱ <?php echo $rs["item_cost"]; ?></small></div>
                  <div class="d-grid" style="margin-top: 10px;">
                  <div class="input-group input-sm">
                    <span class="input-group-text rounded-0">Quantity</span>
                    <input type="number" class="form-control rounded-0 text-center" id="quantity" name="quantity" value="1" required="required">
                  </div>
                  <input type="submit" name="add" style="margin-top:5px;" class="btn btn-primary btn-sm rounded-0" value="Add to Cart">
                  </div>
                </div>
              </div>
              
            </div>
          </form>    
        </div> -->
        <?php
        // }
        ?>
  </div>
<script>
	// $('#myList a').on('click', function (e) {
	// 	e.preventDefault()
	// 	$(this).tab('show')
	// })

</script>
<?php
include("footer.php");
?>