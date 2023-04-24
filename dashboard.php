
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
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">

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
                  <br>
  <div class="row">
    <div class="col">
      <h4 style="text-align:center;"><b><u>Transactions</u></b></h4>
      <table id="dataorders" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>

<?php
include("footer.php");
?>