<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="project";
	$conn = mysqli_connect($servername, $username, $password,$db);
	$conn -> set_charset("utf8");
	date_default_timezone_set("Asia/Bangkok");
?>