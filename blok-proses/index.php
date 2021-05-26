<?php
include '../connection.php';
date_default_timezone_set('Asia/Jakarta');
$id_stok = $_POST['id_stok'];
$id_makam = $_POST['id_makam'];
$blok = $_POST['blok'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$bulan_count = date("m");
$tahun_count = date("Y");
if($id_stok=="") {
	if ($_POST['submit']) {
		$result = mysqli_query($mysqli, "INSERT INTO `makam_stok` (`id_makam`, `blok`, `harga`, `stok`, `bulan_count`, `tahun_count`) VALUES ('$id_makam', '$blok', '$harga', '$stok', '$bulan_count', '$tahun_count')");
	}
	header("Location: ../../admin/e-data/blok/");
} else {
	if ($_POST['update']) {
		$update = mysqli_query($mysqli, "UPDATE `makam_stok` SET `id_makam` = '$id_makam', `blok` = '$blok', `harga` = '$harga', `stok` = '$stok' WHERE `makam_stok`.`id_stok` = '$id_stok'");
	}
header("Location: ../../admin/e-data/blok/form/?id=".$id_stok."&#popup");
}
?>