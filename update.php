<?php
	include 'connect.php';

	$m_id=$_POST['m_id'];
	$m_firstname=$_POST['m_firstname'];
	$m_lastname=$_POST['m_lastname'];
    $m_email=$_POST['m_email'];
	$m_address=$_POST['m_address'];
	$m_tel=$_POST['m_tel'];

	$sql_query = "UPDATE `member` 
	SET `m_firstname`='$m_firstname',
	`m_lastname`='$m_lastname',
	`m_email`='$m_email',
	`m_address`='$m_address',
    `m_tel`='$m_tel'
     WHERE m_id = $m_id";

    if(mysqli_query($conn,$sql_query)){
		echo json_encode(array("statusCode"=>200));
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);

?>