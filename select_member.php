<?php
	include 'connect.php';

    $m_id = $_POST['m_id'];
	
	$sql = "SELECT * FROM employee where emp_id = $emp_id";
	$result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $data = array(
        "emp_id" => $row['emp_id'],
        "emp_username" => $row['emp_username'],
        "emp_firstname" => $row['emp_firstname'],
        "emp_lastname" => $row['emp_lastname'],
        "emp_email" => $row['emp_email'],
        "emp_address" => $row['emp_address'],
        "emp_tel" => $row['emp_tel'],
        "statusCode"=>200
    );

    if(isset($data)){
        echo json_encode($data);
    }
    else{
        echo json_encode(array("statusCode"=>201));
    }

	mysqli_close($conn);
?>
  