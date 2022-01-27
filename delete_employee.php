<?php
	include 'connect.php';
	date_default_timezone_set("Asia/Bangkok");

	$emp_id=$_POST['emp_id'];
	

	$sql1 = "SELECT * from employee";
	$result = mysqli_query($conn, $sql1);

	if(mysqli_num_rows($result) == 0){
		echo json_encode(array("statusCode"=>201));
	}
	else{
		$sql = "DELETE FROM `employee` WHERE emp_id = $emp_id";
		$result = mysqli_query($conn, $sql);
		echo json_encode(array("statusCode"=>200));
	}

	mysqli_close($conn);
?>