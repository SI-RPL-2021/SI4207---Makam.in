<?php
include '../connection.php';
if (isset($_POST['submit'])) {
	$id_user = $_POST['id_user'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$telp = $_POST['telp'];
	$nik = $_POST['nik'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$kawin = $_POST['kawin'];
	$alamat = $_POST['alamat'];
	$negara = $_POST['negara'];
	$gender = $_POST['gender'];
	$agama = $_POST['agama'];
	$pekerjaan = $_POST['pekerjaan'];
	$verif = $_POST['verif'];
  	$bulan_count = date("m");
    $tahun_count = date("Y");
	$password = $_POST['password'];
	if (isset($password)) {
		$passwords = md5($password);
		$update = mysqli_query($mysqli, "UPDATE `user` SET `nama` = '$nama', `password` = '$passwords', `email` = '$email', `telp` = '$telp', `nik` = '$nik', `tempat_lahir` = '$tempat_lahir', `tanggal_lahir` = '$tanggal_lahir', `kawin` = '$kawin', `alamat` = '$alamat', `negara` = '$negara', `gender` = '$gender', `agama` = '$agama', `pekerjaan` = '$pekerjaan', `verif` = '$verif' WHERE `user`.`id_user` = '$id_user'");
		header("Location: ../../user/e-identitas/#popup");
	} else {
		$result = mysqli_query($mysqli, "UPDATE `user` SET `nama` = '$nama', `email` = '$email', `telp` = '$telp', `nik` = '$nik', `tempat_lahir` = '$tempat_lahir', `tanggal_lahir` = '$tanggal_lahir', `kawin` = '$kawin', `alamat` = '$alamat', `negara` = '$negara', `gender` = '$gender', `agama` = '$agama', `pekerjaan` = '$pekerjaan', `verif` = '$verif' WHERE `user`.`id_user` = '$id_user'");
			header("Location: ../../user/e-identitas/#popup");
	}	
}
?>