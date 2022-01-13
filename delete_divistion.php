<?php
	include 'connect.php';
	date_default_timezone_set("Asia/Bangkok");

	$stadium_id=$_POST['stadium_id'];

	$sql1 = "SELECT * from booking where stadium_id = $stadium_id";
	$result = mysqli_query($conn, $sql1);

	if(mysqli_num_rows($result) > 0){
		echo json_encode(array("statusCode"=>201));
	}
	else{
		$sql = "DELETE FROM `stadium` WHERE stadium_id=$stadium_id";
		$result = mysqli_query($conn, $sql);
		echo json_encode(array("statusCode"=>200));
	}

	mysqli_close($conn);
?>