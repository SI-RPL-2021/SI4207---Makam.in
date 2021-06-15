<?php
include '../connection.php';
date_default_timezone_set('Asia/Jakarta');
$id_user = $_POST['id_user'];
$tgl_now = date("d M Y");
$waktu_now = date("h:i:s a");
if (isset($_POST['verif'])) {
	$verif = mysqli_query($mysqli, "UPDATE `user` SET `verif` = 'yes', `tgl_verif` = '$tgl_now', `waktu_verif` = '$waktu_now'  WHERE `user`.`id_user` = '$id_user'");
}

if (isset($_POST['tolak'])) {
	$verif = mysqli_query($mysqli, "UPDATE `user` SET `verif` = 'no', `tgl_verif` = '$tgl_now', `waktu_verif` = '$waktu_now' WHERE `user`.`id_user` = '$id_user'");
}

header("Location: ../../admin/verifikasi/berkas/e-identitas/?id=".$id_user."&#popup");
?>