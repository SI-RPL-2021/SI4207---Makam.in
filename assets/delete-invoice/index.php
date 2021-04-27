<?php
	include_once("../connection.php");
	session_start();
	if ($_SESSION['status']=="admin") {
	
	}else if ($_SESSION['status']=="user") {
		
	} else {
	header("Location: ../../login/");
	}

	$id_transaksi = $_GET['transaksi'];
	$id_sewa = $_GET['sewa'];
	$id_user = $_SESSION['id_user'];
	$tipe = $_GET['tipe'];
	$id_renew = $_GET['renew'];

	if ($tipe=="lahan") {
		if (isset($id_renew)) {
			$delete_invoice = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi' AND id_sewa='$id_sewa' AND id_user='$id_user' AND id_renew='$id_renew'");
			header("Location: ../../bayar/");
		} else {
			$delete_invoice = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi' AND id_sewa='$id_sewa' AND id_user='$id_user'");
			$delete_penyewa_makam = mysqli_query($mysqli, "DELETE FROM penyewa_makam WHERE id_sewa='$id_sewa' AND id_user='$id_user'");
			header("Location: ../../bayar/");
		}
		
	} elseif ($tipe=="jasa") {
		if (isset($id_renew)) {
			$delete_invoice_jasa = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi' AND id_sewa='$id_sewa' AND id_user='$id_user' AND id_renew='$id_renew'");
			header("Location: ../../bayar/");
		} else {
			$delete_invoice_jasa = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi' AND id_sewa='$id_sewa' AND id_user='$id_user'");
			$delete_penyewa_jasa = mysqli_query($mysqli, "DELETE FROM penyewa_jasa WHERE id_sewa='$id_sewa' AND id_user='$id_user'");
			header("Location: ../../bayar/");
		}
	} else {
		header("Location: ../../bayar/");
	}
	
?>