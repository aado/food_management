
<?php
  include("header.php");
  include("main_header.php");
?>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">


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
                $sql = "SELECT SUM(qty) AS TOTALSTOCKS FROM `stocktb` WHERE status='Active'";
                // $qsql = mysqli_query($con,$sql);
                  // echo mysqli_num_rows($qsql);

                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_array($result)) {
    echo $row['TOTALSTOCKS']; // Print a single column data
    // echo print_r($row);       // Print the entire row data
}
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
                  $sql = "SELECT SUM(other_cost) AS totalsales,bill_date FROM `billingtb` where bill_date=CURRENT_DATE;";
                // $qsql = mysqli_query($con,$sql);
                  // echo mysqli_num_rows($qsql);

                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_array($result)) {
    echo $row['totalsales']; // Print a single column data
    // echo print_r($row);       // Print the entire row data
}
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
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">

              OVERALL TOTAL SALES (TODAY)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                ₱ 
                <?php 
                 $sql = "SELECT SUM(bill_amount) AS totalsales,bill_date FROM `billingtb` where bill_date=CURRENT_DATE;";
                // $qsql = mysqli_query($con,$sql);
                  // echo mysqli_num_rows($qsql);

                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_array($result)) {
    echo $row['totalsales']; // Print a single column data
    // echo print_r($row);       // Print the entire row data
}
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
                  <br>
  <div class="row">
    <div class="col">
      <h4 style="text-align:center;"><b><u>Transactions</u></b></h4>
      <table id="dataorders" class="table table-striped" style="width:100%">

        <thead>
            <tr>
                <th>Order Date</th>
                <th>Customer ID</th>
                <th> Amount </th>
                <th> Status </th>
                <th> Cashier</th>
            </tr>
        </thead>
        <?php
        $sql= "SELECT * FROM billingtb";  
        $qsql = mysqli_query($con,$sql);
        while($rs = mysqli_fetch_array($qsql))
        {
    
  $sqlmaincat = "SELECT * FROM orderdetailstb WHERE customer_id='$rs[customer_id]'";
  $qsqlmaincat = mysqli_query($con,$sqlmaincat);
  $rsmaincat = mysqli_fetch_array($qsqlmaincat);
  echo "<tr>
    <td>&nbsp;$rs[order_date]</td>
    <td>&nbsp;$rs[customer_id]</td>
    <td>&nbsp;₱ $rs[bill_amount]</td>
   <td>&nbsp; $rs[status]</td>
   <td>&nbsp; $rs[onduty]</td>
   
  </tr>";
}
?>
      </table>

    </div>
  </div>

<?php
include("footer.php");
?>