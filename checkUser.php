<?php
include "connect.php";

$m_firstname = $_POST['m_firstname'];
$m_password = $_POST['m_password'];

    $sql_query = "SELECT a.m_id , a.m_firstname , a.Position_id , b.Position_name from member a
     JOIN position b ON a.Position_id = b.Position_id
     where a.m_firstname = '$m_firstname' and a.m_password = '$m_password' and a.Position_id < 4" ;
    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);

    if($num_row == 1){
        $row = mysqli_fetch_array($result);

        $m_id = $row['m_id'];
        $Position_name = $row['Position_name'];
        $_SESSION['m_id'] = $m_id;
        $_SESSION['Position_name'] = $Position_name;
        $_SESSION['m_firstname'] = $m_firstname;
        echo json_encode(array("statusCode"=>200));
        
    }else{
    
        echo json_encode(array("statusCode"=>201));
    
    }

mysqli_close($conn);