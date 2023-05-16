<?php
include("header.php");


if(isset($_POST['insertbilling']))
{
	$totalAmount = $con->real_escape_string(trim($_POST['totalAmount']));
	$user=$con->real_escape_string(trim($_POST['onduty']));
	$billno =$con->real_escape_string(trim($_POST['billno']));

	$query = "INSERT INTO `billingtb`( `bill_type`, `bill_no`, `customer_id`, `order_date`, `bill_date`, `bill_time`, `tax`, `tax_typ`, `discount`, `discount_type`, `other_cost`, `status`, `onduty`) VALUES ('','$billno',0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,0,'',0,'','$totalAmount','Completed','$user');"; 

				$query_run=mysqli_query($con,$query) or die (mysqli_error($con));
				
					if($query_run==1)
					{
						 $insertorder="INSERT INTO `ordertb`(`order_id`, `order_date`, `customer_id`, `totalamount`) VALUES (CURRENT_TIMESTAMP,'$billno','$totalAmount')";
						 $execute = mysqli_query($con,$insertorder) or die (mysqli_error($con));
						 		if($execute)
								{

									echo '<script> alert("Submitted! ");
									window.location.href = "foodmenu.php";</script>';
								}
					}
					else{
						echo '<script> alert("Unsuccessful! ");
									window.location.href = "foodmenu.php";</script>';	
						}
}else{

	echo '<script> alert("System Error! Try again later.");
									window.location.href = "foodmenu.php";</script>';
}



?>