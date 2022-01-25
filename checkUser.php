<?php

include "connect.php";

$emp_firstname = $_POST['emp_firstname'];
$emp_password = $_POST['emp_password'];

if ($emp_firstname != "" && $emp_password != ""){

    $sql_query = "SELECT a.emp_id , a.emp_firstname , a.Position_id , b.Position_name from employee a 
    JOIN position b ON a.Position_id = b.Position_id
    where a.emp_firstname = '$emp_firstname' and a.emp_password = '$emp_password' and a.Position_id < 4";
    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);

    if($num_row == 1){
        $row = mysqli_fetch_array($result);
        $emp_id = $row['emp_id'];
        $Position_name = $row['Position_name'];
        $_SESSION['emp_id'] = $emp_id;
        $_SESSION['emp_firstname'] = $emp_firstname;
        $_SESSION['Position_name'] = $Position_name;
        echo json_encode(array("statusCode"=>200));
    
    }else{
        
        echo json_encode(array("statusCode"=>201));
    
    }
}
mysqli_close($conn);