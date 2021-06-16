<?php
include '../connection.php';
$id_bank = $_POST['id_bank'];
$merek = $_POST['merek'];
$nomor = $_POST['nomor'];
$pemilik = $_POST['pemilik'];

if($id_bank=="") {
	if ($_POST['submit']) {
		$result = mysqli_query($mysqli, "INSERT INTO `bank` (`merek`, `nomor`, `pemilik`) VALUES ('$merek', '$nomor', '$pemilik')");
	}
	header("Location: ../../admin/e-data/bank/");
} else {
	if ($_POST['submit']) {
		$result = mysqli_query($mysqli, "INSERT INTO `bank` (`id_bank`, `merek`, `nomor`, `pemilik`) VALUES ('$id_bank', '$merek', '$nomor', '$pemilik')");
	}
	if ($_POST['update']) {
		$update = mysqli_query($mysqli, "UPDATE `bank` SET `merek` = '$merek', `nomor` = '$nomor', `pemilik` = '$pemilik' WHERE `bank`.`id_bank` = '$id_bank'");
	}
header("Location: ../../admin/e-data/bank/form/?id=".$id_bank."&#popup");
}
?>