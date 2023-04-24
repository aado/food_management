
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
  height: inherit;
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

<div class="row">
  <div class="col-8">
<div class="tab"  style="margin-left: 30px;width: 20%;">
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
<div id="<?php echo $rs['category_id']; ?>" class="tabcontent" style="height:inherit;">
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
					<img src='itemimg/<?php echo $rsitem["item_img"]; ?>' style="width: 100%;height: 100%;margin-bottom: 10px;">
                  <div class="card-title fw-bold h5 mb-0"><?php echo $rsitem["item_name"]; ?></div>
                  <div class="card-description text-muted"><small><?php echo $rsitem["description"]; ?></small></div>
                  <div><small class="card-description text-success h6 mb-0">₱ <?php echo $rsitem["item_cost"]; ?></small></div>
                  <div class="d-grid" style="margin-top: 10px;">
                  <div class="input-group input-sm">
                    <span class="input-group-text rounded-0">Quantity</span>
                    <input type="number" class="form-control rounded-0 text-center" id="quantity" name="quantity" value="1" required="required">
                  </div>
                  <input type="button" name="add" style="margin-top:5px;" class="btn btn-primary btn-sm rounded-0" data-name='<?php echo $rsitem["item_name"]; ?>' data-id='<?php echo $rsitem["item_id"]; ?>' data-cost='<?php echo $rsitem["item_cost"]; ?>'  data-total='<?php echo $rsitem["item_cost"]; ?> * <?php echo $rsitem["quantity"]; ?>' value="Add to Cart" onclick="addToCart(this)">
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
</div>
<div class="col" style="margin-right:1%;">
  <h4><u> ORDER DETAILS </u></h4>
      <div class="container">
        <!-- <div class="jumbotron py-5 my-5"> -->
        <!-- <h3 class='text-center'> No orders yet?      -->
        </div>   
        <table class="table table-striped table-bordered" id="orders" style="width:100%">
       <thead class="thead-dark">
      <tr>
      <th width="40%">Food Name</th>
      <th width="10%">Quantity</th>
      <th width="20%">Price Details</th>
      <th width="15%">Order Total</th>
      <th width="5%">Action</th>
      </tr>
      </thead>
      <tbody>
      </tbody>
      <tfoot id="overall">
        <tr>
          <td></td>
          <td></td>
          <td>Total</td>
          <td width="10%" id="totalOrder">0</td>
      </tr>
      </tfoot>
    </table>
    <div style="">
    <button type="button" style="margin-left:40%;" class="btn btn-warning btn-lg"> Checkout </button>
    </div>
 </div>   
</div>
</div>
<!-- 
<div id="Paris" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div> -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script>
  $(function() {
  // $("#subtotal").html(sumColumn(4));
  // $("#totalOrder").html(sumColumn(4));
});
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

// Add to cart
function addToCart(e) {
  // alert(name +' '+cost);
  console.log($(e).attr('data-name'));
  console.log($(e).attr('data-cost'));
  console.log($(e).attr('data-id'));
  console.log($("#quantity").val());
  var total = $("#quantity").val() * parseFloat($(e).attr('data-cost'));
  $("#orders tbody").append('<tr><td>'+$(e).attr('data-name')+'</td><td>'+$("#quantity").val()+'</td><td>'+$(e).attr('data-cost')+'</td><td>'+total.toFixed(2)+'</td></tr>');
  $("#orders tfoot tr td#totalOrder").html(sumColumn(4));
}

// Total Order
function sumColumn(index) {
  $("#orders tfoot tr td#totalOrder").html(0);
  var total = 0;
  $("td:nth-child(" + index + ")").each(function() {
    total += parseFloat($(this).text()) || 0;
    console.log(total);
  });  
  return total.toFixed(2);
}

</script>
   
</body>
</html> 


<?php
include("footer.php");
?>