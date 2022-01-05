<?php
	include 'connect.php';
	date_default_timezone_set("Asia/Bangkok");

	$m_id=$_POST['m_id'];
	$date_today = date("Y-m-d");

	$sql1 = "SELECT * from booking where m_id = $m_id and booking_date >= '$date_today'";
	$result = mysqli_query($conn, $sql1);

	if(mysqli_num_rows($result) > 0){
		echo json_encode(array("statusCode"=>201));
	}
	else{
		$sql = "DELETE FROM `member` WHERE m_id = $id";
		$result = mysqli_query($conn, $sql);
		echo json_encode(array("statusCode"=>200));
	}

	mysqli_close($conn);
?>