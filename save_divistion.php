<?php
	include 'connect.php';
	 
	$stadium_name=$_POST['stadium_name'];
	$divistion_number=$_POST['divistion_number'];

	$sql_query = "SELECT stadium_name from divistion where stadium_name = '$stadium_name'";
    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);

    if($num_row == 0){
		$sql = "INSERT INTO `divistion`( `stadium_name`, `divistion_number`) 
		VALUES ('$stadium_name','$divistion_number')";

		$result = mysqli_query($conn,$sql);
		echo json_encode(array("statusCode"=>200));
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>