<?php
include "connect.php";

$m_username = $_POST['m_username'];
$m_password = $_POST['m_password'];
    $sql_query = "SELECT m_id , m_username , role_id  from member where m_username = '$m_username' and m_password = '$m_password'";
    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);

    if($num_row == 1){
        $row = mysqli_fetch_array($result);

        $m_id = $row['m_id'];
        $_SESSION['m_id'] = $m_id;
        $_SESSION['m_username'] = $m_username;
        echo json_encode(array("statusCode"=>200));
        
    }else{
    
        echo json_encode(array("statusCode"=>201));
    
    }

mysqli_close($conn);