<?php
	include_once("../connection.php");
	session_start();
	if ($_SESSION['status']=="admin") {
	
	}else if ($_SESSION['status']=="user") {
	header("Location: ../../user/");
	} else {
	header("Location: ../../login/");
	}

	$id_paket = $_GET['id'];

	$delete_makam = mysqli_query($mysqli, "DELETE FROM paket_sewa WHERE id_paket='$id_paket'");
	header("Location: ../../admin/e-data/paketsewa/#popup");
	
?>