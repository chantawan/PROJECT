<?php
	include 'connect.php';

	$divistion_id=$_POST['divistion_id'];

	$sql1 = "SELECT * from employee where divistion_id = $divistion_id";
	$result = mysqli_query($conn, $sql1);

	if(mysqli_num_rows($result) > 0){
		echo json_encode(array("statusCode"=>201));
	}
	else{
		$sql = "DELETE FROM `divistion` WHERE divistion_id=$divistion_id";
		$result = mysqli_query($conn, $sql);
		echo json_encode(array("statusCode"=>200));
	}

	mysqli_close($conn);
?>