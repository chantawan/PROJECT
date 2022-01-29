<?php

/* Set database data */
$db_host        = 'localhost';      /* Standard: localhost */
$db_user        = 'root';      /* User name */
$db_password    = "";       /* Password */
$db_name        = 'project2';   /* Name of the database */
$db_table       = 'newfiles';       /* Table in the database for storing file data */

/* Set file path for downloads without slash at the end */
$filepath       = 'pattani';


/*
    Please do not change anything from here
*/
$db = new PDO("mysql:host=$db_host;dbname=$db_name","$db_user","$db_password");
?>
