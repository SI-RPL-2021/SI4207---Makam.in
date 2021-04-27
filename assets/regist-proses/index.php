<?php
include '../connection.php';
if (isset($_POST['Submit'])) {
	$id_user = $_POST['id_user'];
	$status = $_POST['status'];
	$verif = $_POST['verif'];
	$email = $_POST['email'];
	$telp = $_POST['telp'];
	$passwords = $_POST['password'];
	$password = md5($passwords);	
	$result = mysqli_query($mysqli, "INSERT INTO `user` (`id_user`,`status`, `verif`, `email`, `telp`, `password`) VALUES ('$id_user','$status', '$verif', '$email', '$telp', '$password')");
	header("Location: ../../login/?msg=sukses");
} else {
	header("Location: ../../register/?msg=gagal");
}
?>