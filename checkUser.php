<?php

include "connect.php";

$emp_firstname = $_POST['emp_firstname'];
$emp_password = $_POST['emp_password'];

if ($emp_firstname != "" && $emp_password != ""){

    $sql_query = "SELECT a.emp_id , a.emp_firstname , a.Position_id , b.Position_name from employee a 
    JOIN position b ON a.Position_id = b.Position_id
    where a.emp_firstname = '$emp_firstname' and a.emp_password = '$emp_password'";
    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);
    
    if($num_row == 1){
        $row = mysqli_fetch_array($result);
        $emp_id = $row['emp_id'];
        $Position_name = $row['Position_name'];
        $_SESSION['emp_id'] = $emp_id;
        $_SESSION['emp_firstname'] = $emp_firstname;
        $_SESSION['Position_name'] = $Position_name;

        $position_id = $row['Position_id'];
        
        if($position_id == 1){
            echo json_encode(array("positionId"=>1));
        }
        else if($position_id == 2){
            echo json_encode(array("positionId"=>2));
        }
        else if($position_id == 3){
            echo json_encode(array("positionId"=>3));
        }
        else{
            echo json_encode(array("statusCode"=>202));
        }
    }
    else{
        
        echo json_encode(array("statusCode"=>202));
    
    }
}
mysqli_close($conn);