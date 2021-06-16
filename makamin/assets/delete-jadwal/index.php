<?php
	include_once("../connection.php");
	session_start();
	if ($_SESSION['status']=="admin") {
	
	}else if ($_SESSION['status']=="user") {
	header("Location: ../../user/");
	} else {
	header("Location: ../../login/");
	}

	$id_jadwal = $_GET['id'];

	$delete_jadwal = mysqli_query($mysqli, "DELETE FROM jadwal_pemakaman WHERE id_jadwal='$id_jadwal'");
	header("Location: ../../admin/e-data/jadwal/#popup");
	
?>