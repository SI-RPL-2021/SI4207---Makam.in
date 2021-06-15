<?php
	include_once("../connection.php");
	session_start();
	if ($_SESSION['status']=="admin") {
	
	}else if ($_SESSION['status']=="user") {
	header("Location: ../../user/");
	} else {
	header("Location: ../../login/");
	}

	$id_makam = $_GET['id'];

	$delete_makam = mysqli_query($mysqli, "DELETE FROM makam WHERE id_makam='$id_makam'");
	header("Location: ../../admin/e-data/makam/#popup");
	
?>