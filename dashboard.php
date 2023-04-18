<?php
include("header.php");
?>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

<!-- First Photo Grid
<div class="w3-row-padding w3-padding-16 w3-center" id="food">
  <div class="w3-quarter" >
    <img src="images/users.png" alt="Sandwich" style="width:100%;height:275px;">
    <h3>Number of User records</h3>
    <p>
    <?php 
  $sql = "SELECT * FROM usertb WHERE status='Active'";
  $qsql = mysqli_query($con,$sql);
  echo mysqli_num_rows($qsql);
  ?>
    </p>
  </div>
  <div class="w3-quarter">
    <img src="images/transactionicon.png" alt="Steak" style="width:100%;height:275px;">
    <h3>Number Of Transaction Reacords</h3>
    <p> <?php 
  $sql = "SELECT * FROM transactiontb WHERE status='Active'";
  $qsql = mysqli_query($con,$sql);
  echo mysqli_num_rows($qsql);
  ?></p>
  </div>
  <div class="w3-quarter">
    <img src="images/tax.png" alt="Cherries" style="width:100%;height:275px;">
    <h3>number of tax records</h3>
    <p> <?php 
  $sql = "SELECT * FROM taxtb WHERE status='Active'";
  $qsql = mysqli_query($con,$sql);
  echo mysqli_num_rows($qsql);
  ?></p>
   
  </div>
  <div class="w3-quarter">
    <img src="images/stock.jpg" alt="Pasta and Wine" style="width:100%;height:275px;">
    <h3>number of stock records</h3>
    <p><?php 
  $sql = "SELECT * FROM stocktb WHERE status='Active'";
  $qsql = mysqli_query($con,$sql);
  echo mysqli_num_rows($qsql);
  ?></p>
  </div>
</div>-->

<!-- Second Photo Grid
<div class="w3-row-padding w3-padding-16 w3-center">
  <div class="w3-quarter">
    <img src="images/records.jpg" alt="Popsicle" style="width:100%;height:275px;">
    <h3>number of records </h3>
    <p><?php 
  $sql = "SELECT * FROM recordstb WHERE status='Active'";
  $qsql = mysqli_query($con,$sql);
  echo mysqli_num_rows($qsql);
  ?></p>
  </div>
  <div class="w3-quarter">
     <img src="images/master.jpg" alt="Popsicle" style="width:100%;height:275px;">
    <h3>number of master records </h3>
    <p><?php 
  $sql = "SELECT * FROM mastertb WHERE status='Active'";
  $qsql = mysqli_query($con,$sql);
  echo mysqli_num_rows($qsql);
  ?></p>
  </div>
  <div class="w3-quarter">
    <img src="images/item.jpg" alt="Popsicle" style="width:100%;height:275px;">
    <h3>number of item records </h3>
    <p><?php 
  $sql = "SELECT * FROM itemtb WHERE status='Active'";
  $qsql = mysqli_query($con,$sql);
  echo mysqli_num_rows($qsql);
  ?></p>
  </div>
  <div class="w3-quarter">
    <img src="images/discount.png" alt="Popsicle" style="width:100%;height:275px;">
    <h3>number of discount records </h3>
    <p><?php 
  $sql = "SELECT * FROM discounttb WHERE status='Active'";
  $qsql = mysqli_query($con,$sql);
  echo mysqli_num_rows($qsql);
  ?></p>
  </div>
  <div class="w3-quarter">
    <img src="images/customer.jpg" alt="Popsicle" style="width:100%;height:275px;">
    <h3>number of customer records </h3>
    <p><?php 
  $sql = "SELECT * FROM customertb WHERE status='Active'";
  $qsql = mysqli_query($con,$sql);
  echo mysqli_num_rows($qsql);
  ?></p>
  </div>
  <div class="w3-quarter">
    <img src="images/city.jpg" alt="Popsicle" style="width:100%;height:275px;">
    <h3>number of city records </h3>
    <p><?php 
  $sql = "SELECT * FROM citytb WHERE status='Active'";
  $qsql = mysqli_query($con,$sql);
  echo mysqli_num_rows($qsql);
  ?></p></div>
     <div class="w3-quarter">
    <img src="images/category.jpg" alt="Popsicle" style="width:100%;height:275px;">
    <h3>number of category records </h3>
    <p><?php 
  $sql = "SELECT * FROM categorytb WHERE status='Active'";
  $qsql = mysqli_query($con,$sql);
  echo mysqli_num_rows($qsql);
  ?></p></div>


     <div class="w3-quarter">
    <img src="images/billing.png" alt="Popsicle" style="width:100%;height:275px;">
    <h3>number of billing records </h3>
    <p><?php 
  $sql = "SELECT * FROM billingtb WHERE status='Active'";
  $qsql = mysqli_query($con,$sql);
  echo mysqli_num_rows($qsql);
  ?></p>
 </div>
</div>-->


<!-- <hr id="about"> -->

<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              TOTAL STOCKS</div>
              <p></p>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php 
                $sql = "SELECT * FROM stocktb WHERE status='Active'";
                $qsql = mysqli_query($con,$sql);
                  echo mysqli_num_rows($qsql);
              ?>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Earnings (Monthly) Card Example -->
                      <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-success shadow h-100 py-2">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                       <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">

              Remaining Stocks (Today)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php 
                  $sql = "SELECT * FROM stocktb WHERE status='Active'";
                  $qsql = mysqli_query($con,$sql);
                  echo mysqli_num_rows($qsql);
                ?>
              </div>
          </div>
                                      <div class="col-auto">
                                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Earnings (Monthly) Card Example -->
                      <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-info shadow h-100 py-2">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                       <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">

              TOTAL SALES (TODAY)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                ₱ 
                <?php 
                  $sql = "SELECT * FROM stocktb WHERE status='Active'";
                  $qsql = mysqli_query($con,$sql);
                  echo mysqli_num_rows($qsql);
                ?>
              </div>
          </div>
                                      <div class="col-auto">
                                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Pending Requests Card Example -->
                      <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-warning shadow h-100 py-2">
                              <div class="card-body">
                                 <div class="row no-gutters align-items-center">
                                       <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">

              OVERALL TOTAL SALES (TODAY)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                ₱ 
                <?php 
                  $sql = "SELECT * FROM stocktb WHERE status='Active'";
                  $qsql = mysqli_query($con,$sql);
                  echo mysqli_num_rows($qsql);
                ?>
              </div>
          </div>
                                      <div class="col-auto">
                                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>


  <div class="row">
    <?php
      $sql= "SELECT * FROM itemtb WHERE status='Active'";  
      $qsql = mysqli_query($con,$sql);
      while($rs = mysqli_fetch_array($qsql))
      {   
    ?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3 food-item">
          <form method="post" action="cart.php?action=add&id=<?php echo $rs["item_id"]; ?>">
            <input type="hidden" name="item_name" value="<?php echo $rs["item_name"]; ?>">
            <input type="hidden" name="item_cost" value="<?php echo $rs["item_cost"]; ?>">
            <input type="hidden" name="item_id" value="<?php echo $rs["item_id"]; ?>">
            <div class="card rounded-0" align="center";>                      
              <div class="food-img-holder position-relative overflow-hidden">
              <!-- <img src="<?php echo $rs["images"]; ?>" class="img-top"> -->
              </div>
              <div class="card-body">
                <div class="lh-1">
                  <div class="card-title fw-bold h5 mb-0"><?php echo $rs["item_name"]; ?></div>
                  <div class="card-description text-muted"><small><?php echo $rs["description"]; ?></small></div>
                  <div><small class="card-description text-success h6 mb-0">₱ <?php echo $rs["item_cost"]; ?>/-</small></div>
                  <div class="d-grid">
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
    <div class="col">
      2 of 2
    </div>
  </div>

<?php
include("footer.php");
?>