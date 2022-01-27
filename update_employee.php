<?php
	include 'connect.php';

	$emp_id=$_POST['emp_id'];
	$emp_firstname=$_POST['emp_firstname'];
	$emp_lastname=$_POST['emp_lastname'];
	$emp_password=$_POST['emp_password'];
	$emp_cardid=$_POST['emp_cardid'];
	$gender_id=$_POST['gender_id'];
	$Position_id=$_POST['Position_id'];
	$divistion_id=$_POST['divistion_id'];
    $emp_email=$_POST['emp_email'];
	$emp_tel=$_POST['emp_tel'];
		
	$sql_query = "SELECT emp_firstname from employee where emp_firstname = '$emp_firstname' and emp_id != '$emp_id' ";
	$result = mysqli_query($conn,$sql_query);
	$num_row = mysqli_num_rows($result);

	if($num_row == 0){
		
		$sql_query1 = "SELECT emp_email from employee where emp_email = '$emp_email' and emp_id != '$emp_id' ";
		$result = mysqli_query($conn,$sql_query1);
		$num_row = mysqli_num_rows($result);

		if($num_row > 0){
			echo json_encode(array("statusCode"=>202));
		}

		else{
			$sql_query2 = "SELECT emp_tel from employee where emp_tel = '$emp_tel' and emp_id != '$emp_id'";
			$result = mysqli_query($conn,$sql_query2);
			$num_row = mysqli_num_rows($result);
		if($num_row > 0){
			echo json_encode(array("statusCode"=>203));
		}else{
			$sql_query3 = "SELECT emp_cardid from employee where emp_cardid = '$emp_cardid' and emp_id != '$emp_id' ";
			$result = mysqli_query($conn,$sql_query3);
			$num_row = mysqli_num_rows($result);
		
			if($num_row > 0){
				echo json_encode(array("statusCode"=>204));
			}
		else{
			$sql = "UPDATE `employee` 
			SET `emp_firstname`='$emp_firstname',
			`emp_lastname`='$emp_lastname',
			`emp_password`='$emp_password',
			`emp_cardid`='$emp_cardid',
			`gender_id`='$gender_id',
			`Position_id`='$Position_id',
			`divistion_id`='$divistion_id',
			`emp_email`='$emp_email',
			`emp_tel`='$emp_tel'
			 WHERE emp_id = $emp_id";

			$result = mysqli_query($conn,$sql);
			echo json_encode(array("statusCode"=>200));
		}
	}
}
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}

	mysqli_close($conn);

?>