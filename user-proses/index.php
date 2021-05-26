<?php
include '../connection.php';
date_default_timezone_set('Asia/Jakarta');
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
$status = $_POST['status'];
$tgl_verif = date("d M Y");
$waktu_verif = date("h:i:s:a");
$bulan_count = date("m");
$tahun_count = date("Y");
$tgl_daftar = date("d M Y");
$waktu_daftar = date("h:i:s a");
$passwords = $_POST['password'];

if($passwords=="") {
	if ($_POST['submit']) {
		$result = mysqli_query($mysqli, "INSERT INTO `user` (`id_user`, `status`, `email`, `telp`, `verif`, `nama`, `nik`, `tempat_lahir`, `tanggal_lahir`, `kawin`, `alamat`, `negara`, `gender`, `agama`, `pekerjaan`, `tgl_verif`, `waktu_verif`, `bulan_count`, `tahun_count`, `tgl_daftar`, `waktu_daftar`) VALUES ('$id_user', '$status', '$email', '$telp', '$verif', '$nama', '$nik', '$tempat_lahir', '$tanggal_lahir', '$kawin', '$alamat', '$negara', '$gender', '$agama', '$pekerjaan', '$tgl_verif', '$waktu_verif', '$bulan_count', '$tahun_count', '$tgl_daftar', '$waktu_daftar')");
	}
	if ($_POST['update']) {
		$update = mysqli_query($mysqli, "UPDATE `user` SET `status` = '$status', `email` = '$email', `telp` = '$telp', `verif` = '$verif', `nama` = '$nama', `nik` = '$nik', `tempat_lahir` = '$tempat_lahir', `tanggal_lahir` = '$tanggal_lahir', `kawin` = '$kawin', `alamat` = '$alamat', `negara` = '$negara', `gender` = '$gender', `agama` = '$agama', `pekerjaan` = '$pekerjaan', `tgl_verif` = '$tgl_verif', `waktu_verif` = '$waktu_verif' WHERE `user`.`id_user` = '$id_user'");
	}
} else {
	$password = md5($passwords);
	if ($_POST['submit']) {
		$result = mysqli_query($mysqli, "INSERT INTO `user` (`id_user`, `status`, `email`, `telp`, `password`, `verif`, `nama`, `nik`, `tempat_lahir`, `tanggal_lahir`, `kawin`, `alamat`, `negara`, `gender`, `agama`, `pekerjaan`, `tgl_verif`, `waktu_verif`, `bulan_count`, `tahun_count`, `tgl_daftar`, `waktu_daftar`) VALUES ('$id_user', '$status', '$email', '$telp', '$password', '$verif', '$nama', '$nik', '$tempat_lahir', '$tanggal_lahir', '$kawin', '$alamat', '$negara', '$gender', '$agama', '$pekerjaan', '$tgl_verif', '$waktu_verif', '$bulan_count', '$tahun_count', '$tgl_daftar', '$waktu_daftar')");
	}
	if ($_POST['update']) {
		$update = mysqli_query($mysqli, "UPDATE `user` SET `status` = '$status', `email` = '$email', `telp` = '$telp', `password` = '$password', `verif` = '$verif', `nama` = '$nama', `nik` = '$nik', `tempat_lahir` = '$tempat_lahir', `tanggal_lahir` = '$tanggal_lahir', `kawin` = '$kawin', `alamat` = '$alamat', `negara` = '$negara', `gender` = '$gender', `agama` = '$agama', `pekerjaan` = '$pekerjaan', `tgl_verif` = '$tgl_verif', `waktu_verif` = '$waktu_verif' WHERE `user`.`id_user` = '$id_user'");
	}
}
header("Location: ../../admin/e-data/user/form/?id=".$id_user."&#popup");
?>