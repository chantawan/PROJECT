<?php
	include 'connect.php';

	$m_id=$_POST['m_id'];
	$m_firstname=$_POST['m_firstname'];
	$m_lastname=$_POST['m_lastname'];
    $m_email=$_POST['m_email'];
	$m_address=$_POST['m_address'];
	$m_tel=$_POST['m_tel'];
		
	$sql_query1 = "SELECT m_email from member where m_email = '$m_email' and m_id != $m_id";
	$result = mysqli_query($conn,$sql_query1);
	$num_row = mysqli_num_rows($result);

	if($num_row > 0){
		echo json_encode(array("statusCode"=>202));
	}
	else{
		$sql_query2 = "SELECT m_tel from member where m_tel = '$m_tel' and m_id != $m_id";
		$result = mysqli_query($conn,$sql_query2);
		$num_row = mysqli_num_rows($result);

		if($num_row > 0){
			echo json_encode(array("statusCode"=>203));
		}
		else{
			$sql = "UPDATE `member` 
			SET `m_firstname`='$m_firstname',
			`m_lastname`='$m_lastname',
			`m_email`='$m_email',
			`m_address`='$m_address',
			`m_tel`='$m_tel'
			 WHERE m_id = $m_id";

			$result = mysqli_query($conn,$sql);
			echo json_encode(array("statusCode"=>200));
		}
	}

	mysqli_close($conn);

?>