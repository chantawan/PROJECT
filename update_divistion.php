<?php
	include 'connect.php';

	$divistion_id=$_POST['divistion_id'];
	$divistion_name=$_POST['divistion_name'];
	$divistion_number=$_POST['divistion_number'];

	$sql_query = "UPDATE `divistion` 
	SET `divistion_name`='$divistion_name',
	`divistion_number`='$divistion_number'

     WHERE divistion_id = $divistion_id";

    if(mysqli_query($conn,$sql_query)){
		echo json_encode(array("statusCode"=>200));
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);

?>