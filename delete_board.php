<?php
	include 'connect.php';

	$board_id=$_POST['board_id'];

	$sql1 = "SELECT * from board where board_id = $board_id";
	$result = mysqli_query($conn, $sql1);

	if(mysqli_num_rows($result) == 0){
		echo json_encode(array("statusCode"=>201));
	}
	else{
		$sql = "DELETE FROM `board` WHERE board_id=$board_id";
		$result = mysqli_query($conn, $sql);
		echo json_encode(array("statusCode"=>200));
	}

	mysqli_close($conn);
?>