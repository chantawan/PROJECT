<?php
	include 'connect.php';

    $emp_id = $_POST['emp_id'];
	
	$sql = "SELECT * FROM employee where emp_id = $emp_id";
	$result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $data = array(
        "emp_id" => $row['emp_id'],
        "emp_firstname" => $row['emp_firstname'],
        "emp_lastname" => $row['emp_lastname'],
        "emp_password" => $row['emp_password'],
        "emp_cardid" => $row['emp_cardid'],
        "gender_id" => $row['gender_id'],
        "Position_id" => $row['Position_id'],
        "divistion_id" => $row['divistion_id'],
        "emp_email" => $row['emp_email'],
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
  