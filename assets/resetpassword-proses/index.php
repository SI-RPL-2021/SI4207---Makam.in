<?php
include '../connection.php';
date_default_timezone_set('Asia/Jakarta');
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$telp = $_POST['telp'];
	$passwords = $_POST['password'];
	$password = md5($passwords);
	$cek_kesamaan = mysqli_query($mysqli, "SELECT * FROM user WHERE email='$email' and telp='$telp'");
	$c = mysqli_fetch_array($cek_kesamaan);
	$id_user = $c['id_user'];
	$check = mysqli_num_rows($cek_kesamaan);
	if ($check == 1) {
		$update_password = mysqli_query($mysqli, "UPDATE user SET password='$password' WHERE id_user='$id_user' AND email='$email' AND telp='$telp'");
		header("Location: ../../resetpassword/?user=".$email."&telp=".$telp."&new=".$passwords."&msg=sukses");
	} elseif ($check > 1) {
		header("Location: ../../resetpassword/?msg=gagal");
	} else {
		header("Location: ../../resetpassword/?msg=gagal");
	}
}
?>