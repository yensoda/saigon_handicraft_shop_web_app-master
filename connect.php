<?php
	$server = "localhost:3306";
	$user="root";
	$pass="";
	$database="handicraft";
	$conn=mysqli_connect($server,$user,$pass,$database);
	mysqli_query($conn,'set names "utf8"');
?>