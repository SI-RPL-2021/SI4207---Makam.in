<?php
include '../connection.php';
date_default_timezone_set('Asia/Jakarta');
$id_sewa = $_POST['id_sewa'];
$id_user = $_POST['id_user'];
$tgl_now = date("d M Y");
$waktu_now = date("h:i:s a");
if (isset($_POST['verif'])) {
	$verif = mysqli_query($mysqli, "UPDATE `penyewa_makam` SET `verif` = 'yes', `tgl_verif` = '$tgl_now', `waktu_verif` = '$waktu_now'  WHERE `id_sewa` = '$id_sewa'");
}

if (isset($_POST['tolak'])) {
	$verif = mysqli_query($mysqli, "UPDATE `penyewa_makam` SET `verif` = 'no', `tgl_verif` = '$tgl_now', `waktu_verif` = '$waktu_now' WHERE `id_sewa` = '$id_sewa'");
}

header("Location: ../../admin/verifikasi/transaksi/berkas-lahan/?id=".$id_sewa."&user=".$id_user."&#popup");
?>