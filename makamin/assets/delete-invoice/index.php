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
		if ($id_renew!="") {
			$delete_invoice = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi' AND id_sewa='$id_sewa' AND id_user='$id_user' AND id_renew='$id_renew'");
		} else {
			$penyewa_makam = mysqli_query($mysqli, "SELECT * FROM penyewa_makam WHERE id_sewa='$id_sewa' AND id_user='$id_user'");
			$sewa = mysqli_fetch_array($penyewa_makam);
			$id_makam = $sewa['id_makam'];
			$blok = $sewa['blok'];
			$makam_stok = mysqli_query($mysqli, "SELECT * FROM makam_stok WHERE id_makam='$id_makam' AND blok='$blok'");
			$stoks = mysqli_fetch_array($makam_stok);
			$stok_tambah = 1;
			$total_stok = $stoks['stok']+$stok_tambah;
			$update_stok = mysqli_query($mysqli, "UPDATE makam_stok SET stok='$total_stok' WHERE id_makam='$id_makam' AND blok='$blok'");
			$delete_invoice = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi' AND id_sewa='$id_sewa' AND id_user='$id_user'");
			$delete_penyewa_makam = mysqli_query($mysqli, "DELETE FROM penyewa_makam WHERE id_sewa='$id_sewa' AND id_user='$id_user'");
		}

		
	} elseif ($tipe=="jasa") {
		if ($id_renew!="") {
			$delete_invoice_jasa = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi' AND id_sewa='$id_sewa' AND id_user='$id_user' AND id_renew='$id_renew'");
		} else {
			$delete_invoice_jasa = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi' AND id_sewa='$id_sewa' AND id_user='$id_user'");
			$delete_penyewa_jasa = mysqli_query($mysqli, "DELETE FROM penyewa_jasa WHERE id_sewa='$id_sewa' AND id_user='$id_user'");
		}
	} else {
		header("Location: ../../bayar/");
	}
	header("Location: ../../bayar/#popup");
?>