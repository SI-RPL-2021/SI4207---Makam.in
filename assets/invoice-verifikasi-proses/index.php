<?php
include '../connection.php';
date_default_timezone_set('Asia/Jakarta');
$id_transaksi = $_POST['id_transaksi'];
$id_user = $_POST['id_user'];
$tgl_now = date("d M Y");
$waktu_now = date("h:i:s a");
if (isset($_POST['verif'])) {
	$verif = mysqli_query($mysqli, "UPDATE `transaksi` SET `verif` = 'yes', `tgl_verif` = '$tgl_now', `waktu_verif` = '$waktu_now'  WHERE `id_transaksi` = '$id_transaksi'");
}

if (isset($_POST['tolak'])) {
	$verif = mysqli_query($mysqli, "UPDATE `transaksi` SET `verif` = 'no', `tgl_verif` = '$tgl_now', `waktu_verif` = '$waktu_now' WHERE `id_transaksi` = '$id_transaksi'");
}

header("Location: ../../admin/verifikasi/transaksi/invoice/?id=".$id_transaksi."&user=".$id_user."&#popup");
?>