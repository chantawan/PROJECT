<?php

include "connect.php";

$emp_username = $_POST['emp_username'];
$emp_password = $_POST['emp_password'];

if ($emp_username != "" && $emp_password != ""){

    $sql_query = "SELECT emp_id , emp_username from employee where emp_username = '$emp_username' and emp_password = '$emp_password'";
    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);

    if($num_row == 1){
        $row = mysqli_fetch_array($result);

        $emp_id = $row['emp_id'];
        $_SESSION['emp_id'] = $emp_id;
        $_SESSION['emp_username'] = $emp_username;
        echo json_encode(array("statusCode"=>200));
    
    }else{
        
        echo json_encode(array("statusCode"=>201));
    
    }
}
mysqli_close($conn);