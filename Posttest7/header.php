<?php
    include "connector/connection.php";
	if(!isset($_SESSION['login'])){
		header("Location: login.php");
        exit;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemancingan Berkah Abah</title>
    <link rel="stylesheet" href="../postest3.css">
</head>
<body>
    
    </div>
    <div class="navbar">
        <div class="logo-left">
            <img src="../gambar2/kolam-logo.png" alt="" width="80" height="80">
        </div>
        <ul>
            <li><a href="../pesan/index.php">Pesan</a></li>
            <li><a href="../kolam/index.php">Kolam</a></li>
            <li><a href="../index.php">Home</a></li>
        </ul>
    </div>