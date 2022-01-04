<?php
	include 'connect.php';

	if(!isset($_SESSION['emp_id'])){
		$emp_username = "self";
	}else{
		$emp_username = $_SESSION['emp_username'];
	}
	 
	$m_username=$_POST['m_username'];
	$m_password=$_POST['m_password'];
	$m_firstname=$_POST['m_firstname'];
	$m_lastname=$_POST['m_lastname'];
    $m_email=$_POST['m_email'];
	$m_address=$_POST['m_address'];
	$m_tel=$_POST['m_tel'];

	$sql_query = "SELECT m_username from member where m_username = '$m_username'";
    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);

    if($num_row == 0){
		
		$sql_query1 = "SELECT m_email from member where m_email = '$m_email'";
		$result = mysqli_query($conn,$sql_query1);
		$num_row = mysqli_num_rows($result);

		if($num_row > 0){
			echo json_encode(array("statusCode"=>202));
		}

		else{
			$sql_query2 = "SELECT m_tel from member where m_tel = '$m_tel'";
			$result = mysqli_query($conn,$sql_query2);
			$num_row = mysqli_num_rows($result);

			if($num_row > 0){
				echo json_encode(array("statusCode"=>203));
			}
			else{
				$sql = "INSERT INTO `member`( `m_username`, `m_password`, `m_firstname`, `m_lastname`, `m_email`, `m_address`, `m_tel`,`emp_id`) 
				VALUES ('$m_username','$m_password','$m_firstname','$m_lastname','$m_email','$m_address','$m_tel','$emp_username')";

				$result = mysqli_query($conn,$sql);
				echo json_encode(array("statusCode"=>200));
			}
		}
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>