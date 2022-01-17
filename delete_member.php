<?php
	include 'connect.php';
	date_default_timezone_set("Asia/Bangkok");

	$m_id=$_POST['emp_id'];
	$date_today = date("Y-m-d");

	$sql1 = "SELECT * from emp_id where emp_id = $emp_id";
	$result = mysqli_query($conn, $sql1);

	if(mysqli_num_rows($result) > 0){
		echo json_encode(array("statusCode"=>201));
	}
	else{
		$sql = "DELETE FROM `member` WHERE emp_id = $emp_id";
		$result = mysqli_query($conn, $sql);
		echo json_encode(array("statusCode"=>200));
	}

	mysqli_close($conn);
?>