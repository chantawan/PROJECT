<?php
session_start();
 include("connect.php");

$name = $_GET['name'];
$sql = "SELECT * FROM uploadfile WHERE fileID = $fileID;";
$result = mysql_query($sql);

	header("Content-Type: $type");
	header("Content-Length: $size"); 
	header("Content-Disposition: attachment; filename=$name"); 
 	
 	echo $content;
?>
	<a href="fileupload/<?php echo $name; ?>"><?php echo $name; ?></a>
 <?php 
?>