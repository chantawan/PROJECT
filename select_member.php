<?php
	include 'connect.php';

    $m_id = $_POST['m_id'];
	
	$sql = "SELECT * FROM member where m_id = $m_id";
	$result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $data = array(
        "m_id" => $row['m_id'],
        "m_username" => $row['m_username'],
        "m_firstname" => $row['m_firstname'],
        "m_lastname" => $row['m_lastname'],
        "m_email" => $row['m_email'],
        "m_address" => $row['m_address'],
        "m_tel" => $row['m_tel'],
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
  