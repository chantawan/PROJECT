<?php
	include 'connect.php';

	if(!isset($_SESSION['emp_id'])){
		$emp_username = "self";
	}else{
		$emp_username = $_SESSION['emp_username'];
	}
	 
	$emp_username=$_POST['emp_username'];
	$emp_password=$_POST['emp_password'];
	$emp_firstname=$_POST['emp_firstname'];
	$emp_lastname=$_POST['emp_lastname'];
    $emp_email=$_POST['emp_email'];
	$emp_tel=$_POST['emp_tel'];

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