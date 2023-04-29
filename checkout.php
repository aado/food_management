<?php

include 'con.php';


if(isset($_POST['insertbilling']))
{
	$totalAmount = $con->real_escape_string(trim($_POST['totalAmount']));
	$user=$con->real_escape_string(trim($_POST['onduty']));
	

			$query = "INSERT INTO `billingtb`(`bill_id`, `bill_type`, `bill_no`, `customer_id`, `order_date`, `bill_date`, `bill_time`, `tax`, `tax_typ`, `discount`, `discount_type`, `other_cost`, `status`, `onduty`) VALUES('bill_id','Cash',MAX(bill_no)+1,MAX(customer_id)+1,CURRENT_DATE,CURRENT_DATE,CURRENT_TIME,'0','','','','$totalAmount','Completed','$user')"; 

				$query_run=mysqli_query($con,$query) or die (mysqli_error($con));
				
					if($query_run==1)
					{
						 $insertorder="INSERT INTO `ordertb`(`order_id`, `order_date`, `customer_id`, `totalamount`) VALUES (CURRENT_TIMESTAMP,MAX(customer_id)+1,'$totalAmount')";
						 $execute = mysqli_query($conn,$updateorder) or die (mysqli_error($conn));
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