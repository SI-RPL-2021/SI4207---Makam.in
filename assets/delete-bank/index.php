<?php
	include_once("../connection.php");
	session_start();
	if ($_SESSION['status']=="admin") {
	
	}else if ($_SESSION['status']=="user") {
	header("Location: ../../user/");
	} else {
	header("Location: ../../login/");
	}

	$id_bank = $_GET['id'];

	$delete_bank = mysqli_query($mysqli, "DELETE FROM bank WHERE id_bank='$id_bank'");
	header("Location: ../../admin/e-data/bank/#popup");
	
?>