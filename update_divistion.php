<?php
	include 'connect.php';

	$stadium_id=$_POST['stadium_id'];
	$stadium_name=$_POST['stadium_name'];
	$divistion_number=$_POST['divistion_number'];

	$sql_query = "UPDATE `divistion` 
	SET `stadium_name`='$stadium_name',
	`divistion_number`='$divistion_number'

     WHERE stadium_id = $stadium_id";

    if(mysqli_query($conn,$sql_query)){
		echo json_encode(array("statusCode"=>200));
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);

?>