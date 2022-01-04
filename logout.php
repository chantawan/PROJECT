<?php

$option = $_GET["option"];

session_start();
session_destroy();

if($option == 2){
    header('Location: login_user.php');
}
else if($option == 1){
    header('Location: login_admin.php');
}
else{
    echo "error";
}

?>
