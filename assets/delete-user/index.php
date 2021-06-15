<?php
	include_once("../connection.php");
	session_start();
	if ($_SESSION['status']=="admin") {
	
	}else if ($_SESSION['status']=="user") {
	header("Location: ../../user/");
	} else {
	header("Location: ../../login/");
	}

	$id_user = $_GET['id'];

	$delete_user = mysqli_query($mysqli, "DELETE FROM user WHERE id_user='$id_user'");
	$delete_transaksi = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_user='$id_user'");
	$delete_penyewa_jasa = mysqli_query($mysqli, "DELETE FROM penyewa_jasa WHERE id_user='$id_user'");
	$delete_penyewa_makam = mysqli_query($mysqli, "DELETE FROM penyewa_makam WHERE id_user='$id_user'");
	header("Location: ../../admin/e-data/user/#popup");
	
?>