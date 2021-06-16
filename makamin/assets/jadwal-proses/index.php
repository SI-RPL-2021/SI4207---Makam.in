<?php
include '../connection.php';
$id_jadwal = $_POST['id_jadwal'];
$id_makam = $_POST['id_makam'];
$blok = $_POST['blok'];
$jampertama = $_POST['jampertama'];
$jamkedua = $_POST['jamkedua'];
$jam = $jampertama." - ".$jamkedua;

if($id_stok=="") {
	if ($_POST['submit']) {
		$result = mysqli_query($mysqli, "INSERT INTO `jadwal_pemakaman` (`id_makam`, `blok`, `jam`) VALUES ('$id_makam', '$blok', '$jam')");
	}
	header("Location: ../../admin/e-data/jadwal/");
} else {
	if ($_POST['submit']) {
		$result = mysqli_query($mysqli, "INSERT INTO `jadwal_pemakaman` (`id_makam`, `blok`, `jam`,) VALUES ('$id_makam', '$blok', '$jam')");
	}
	if ($_POST['update']) {
		$update = mysqli_query($mysqli, "UPDATE `jadwal_pemakaman` SET `id_makam` = '$id_makam', `blok` = '$blok', `jam` = '$jam' WHERE `jadwal_pemakaman`.`id_jadwal` = '$id_jadwal'");
	}
header("Location: ../../admin/e-data/jadwal/form/?id=".$id_stok."&#popup");
}
?>