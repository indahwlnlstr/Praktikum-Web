<?php
	include '../connector/connection.php';
	$idKolam = $_POST['id'];

	$rowKolam = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM kolam WHERE id_kolam='$idKolam'"));

	$harga = $rowKolam['harga'];

	echo json_encode(array('harga' => $harga));
?>