<?php
	include 'connect.php';

    $divistion_id = $_POST['divistion_id'];
	
	$sql = "SELECT * FROM divistion where divistion_id = $divistion_id";
	$result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $data = array(
        "divistion_id" => $row['divistion_id'],
        "divistion_name" => $row['divistion_name'],
        "divistion_number" => $row['divistion_number'],
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
  