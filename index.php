
  
<!-- !PAGE CONTENT! -->
<?php
include("header.php");

if(isset($_SESSION[user_id]))
{
  echo "<script>window.location='dashboard.php';</script>";
}
if(isset($_POST["btnlogin"]))
{
  $pwd = md5($_POST[password]);
  $sql  = "SELECT * FROM usertb where login_id='$_POST[loginid]' AND password='$pwd' and status='Active'";
  $qsql = mysqli_query($con,$sql);
  if(mysqli_num_rows($qsql) ==1)
  {
    $rs = mysqli_fetch_array($qsql);
    $_SESSION[user_id] = $rs[user_id];
    echo "<script>window.location='dashboard.php';</script>";
  }
  else
  {
    echo "<script>alert('Inavalid login credentials entered..');</script>";
  }
}
?>
  
<!-- !PAGE CONTENT! -->
<div  style="max-width:100%;">


  
  <hr id="about">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center" style="background-image:  url('images/1.jpg'); height: 700px; background-position: center,width:100%;
  background-repeat: no-repeat;
  background-size: cover" >  
    <div class="w3-padding-32" style="background-color:white;width: 520px;margin-top: 15%; margin-left: 30%;">
      <h4><b>Login Panel</b></h4>
      <h6><i>Kindly enter Login ID and Password to Login</i></h6>
      <p>
      <form method="post" action="">
      <?php
    include("datatables.php");
    ?>
           <center> <table id="example" class="table table-striped table-bordered" cellspacing="0" style="width:500px;">
              <tbody>
                <tr>
                  <th width="166" scope="row">Login ID</th>
                  <td width="176">&nbsp;<input type="text" name="loginid"></td>
                </tr>
                <tr>
                  <th scope="row">Password</th>
                  <td>&nbsp;<input type="password" name="password"></td>
                </tr>
                <tr>
                  <th colspan="2" scope="row">&nbsp;<input type="submit" name="btnlogin" value="Click Here to Login"></th>
                  </tr>
              </tbody>
            </table>
            </center>
    </form>
      </p>
    </div>
  </div>
  <!-- <hr> -->
<?php
//include("footer.php");
?> 