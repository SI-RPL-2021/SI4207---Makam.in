<?php
include '../connection.php';
$id_paket = $_POST['id_paket'];
$nama_paket = $_POST['nama_paket'];
$deskripsi = $_POST['deskripsi'];
$jumlah = $_POST['jumlah'];

if($id_paket=="") {
	if ($_POST['submit']) {
		$result = mysqli_query($mysqli, "INSERT INTO `paket_sewa` (`nama_paket`, `deskripsi`, `jumlah`) VALUES ('$nama_paket', '$deskripsi', '$jumlah')");
	}
	header("Location: ../../admin/e-data/paketsewa/");
} else {
	if ($_POST['submit']) {
		$result = mysqli_query($mysqli, "INSERT INTO `paket_sewa` (`id_paket`, `nama_paket`, `deskripsi`, `jumlah`) VALUES ('$id_paket', '$nama_paket', '$deskripsi', '$jumlah')");
	}
	if ($_POST['update']) {
		$update = mysqli_query($mysqli, "UPDATE `paket_sewa` SET `nama_paket` = '$nama_paket', `deskripsi` = '$deskripsi', `jumlah` = '$jumlah' WHERE `paket_sewa`.`id_paket` = '$id_paket'");
	}
header("Location: ../../admin/e-data/paketsewa/form/?id=".$id_paket."&#popup");
}
?>