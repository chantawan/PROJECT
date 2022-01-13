<?php
	include 'connect.php';

    $stadium_id = $_POST['stadium_id'];
	
	$sql = "SELECT * FROM stadium where stadium_id = $stadium_id";
	$result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $data = array(
        "stadium_id" => $row['stadium_id'],
        "stadium_name" => $row['stadium_name'],
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
  