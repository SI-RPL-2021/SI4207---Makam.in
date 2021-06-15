<?php
include '../connection.php';
date_default_timezone_set('Asia/Jakarta');
if (isset($_POST['submit'])) {
	$id_user = $_POST['id_user'];
	$status = $_POST['status'];
	$verif = "new";
	$email = $_POST['email'];
	$telp = $_POST['telp'];
  	$bulan_count = date("m");
    $tahun_count = date("Y");
	$passwords = $_POST['password'];
	$password = md5($passwords);
	$tgl_daftar = date("d M Y");
	$waktu_daftar = date("h:i:s a");
	$result = mysqli_query($mysqli, "INSERT INTO `user` (`id_user`,`status`, `verif`, `email`, `telp`, `password`, `bulan_count`, `tahun_count`, `tgl_daftar`, `waktu_daftar`) VALUES ('$id_user','$status', '$verif', '$email', '$telp', '$password', '$bulan_count', '$tahun_count', '$tgl_daftar', '$waktu_daftar')");
	header("Location: ../../login/?msg=sukses");
} else {
	header("Location: ../../register/?msg=gagal");
}
?>