<?php
session_start();
include '../connection.php';
$user = mysqli_escape_string($mysqli, $_POST['user']);
$passwords = mysqli_escape_string($mysqli, $_POST['password']);
$password = md5($passwords);
$login = mysqli_query($mysqli, "SELECT * FROM user WHERE email='$user' and password='$password' OR telp='$user' and password='$password'");
$check = mysqli_num_rows($login);
if ($check > 0) {
	$page = mysqli_fetch_assoc($login);
	$id_user = $_POST['id_user'];
	if ($page['status']=="admin") {
		$_SESSION['id_user'] = $page['id_user'];
		$_SESSION['email'] = $email;
		$_SESSION['telp'] = $telp;
		$_SESSION['password'] = $password;
		$_SESSION['nama'] = $page['nama'];
		$_SESSION['nik'] = $page['nik'];
		$_SESSION['tempat_lahir'] = $page['tempat_lahir'];
		$_SESSION['tanggal_lahir'] = $page['tanggal_lahir'];
		$_SESSION['kawin'] = $page['kawin'];
		$_SESSION['alamat'] = $page['alamat'];
		$_SESSION['negara'] = $page['negara'];
		$_SESSION['gender'] = $page['gender'];
		$_SESSION['agama'] = $page['agama'];
		$_SESSION['pekerjaan'] = $page['pekerjaan'];
		$_SESSION['status'] = "admin";
		header("Location: ../../admin/");
	}else if ($page['status']=="user") {
		$_SESSION['id_user'] = $page['id_user'];
		$_SESSION['email'] = $page['email'];
		$_SESSION['telp'] = $page['telp'];
		$_SESSION['password'] = $password;
		$_SESSION['nama'] = $page['nama'];
		$_SESSION['nik'] = $page['nik'];
		$_SESSION['tempat_lahir'] = $page['tempat_lahir'];
		$_SESSION['tanggal_lahir'] = $page['tanggal_lahir'];
		$_SESSION['kawin'] = $page['kawin'];
		$_SESSION['alamat'] = $page['alamat'];
		$_SESSION['negara'] = $page['negara'];
		$_SESSION['gender'] = $page['gender'];
		$_SESSION['agama'] = $page['agama'];
		$_SESSION['pekerjaan'] = $page['pekerjaan'];
		$_SESSION['verif'] = $page['verif'];
		$_SESSION['status'] = "user";
		header("Location: ../../user/");
	}else{
		header("Location: ../../login/?msg=gagal");
	}
}else{
	header("Location: ../../login/?msg=gagal");
}
?>