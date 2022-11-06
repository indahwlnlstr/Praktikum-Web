<?php
	session_start();
	$host = 'localhost'; //nama host
	$user = 'root'; // nama username dari database
	$passowrd = ''; //password dari database
	$db_name = 'pemancingan'; //nama database yang akan dihubungkan
	
	$connect = mysqli_connect($host,$user,$passowrd,$db_name);//connect ke database
?>