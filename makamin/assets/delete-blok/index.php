<?php
	include_once("../connection.php");
	session_start();
	if ($_SESSION['status']=="admin") {
	
	}else if ($_SESSION['status']=="user") {
	header("Location: ../../user/");
	} else {
	header("Location: ../../login/");
	}

	$id_stok = $_GET['id'];

	$delete_blok = mysqli_query($mysqli, "DELETE FROM makam_stok WHERE id_stok='$id_stok'");
	header("Location: ../../admin/e-data/blok/#popup");
	
?>