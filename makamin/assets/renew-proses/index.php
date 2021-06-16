<?php
include '../connection.php';
date_default_timezone_set('Asia/Jakarta');

$id_transaksi = $_GET['transaksi'];
$id_user = $_GET['user'];
$id_sewa = $_GET['sewa'];
$id_renew = $_GET['renew'];
$verif = "wait";
$paid = "wait";
$tipe = $_GET['tipe'];
$nama = $_GET['nama'];
$email = $_GET['email'];
$telp = $_GET['telp'];
$unit = $_GET['unit'];
$deskripsi = $_GET['deskripsi'];
$total = $_GET['total'];
$pajak = $_GET['pajak'];
$metode_bayar = $_GET['metode_bayar'];
$resi_transfer = $_GET['resi_transfer'];
$bulan_count = date("m");
$tahun_count = date("Y");
	
$renew = mysqli_query($mysqli, "INSERT INTO transaksi (id_transaksi, id_user, id_sewa, id_renew, verif, paid, tipe, nama, email, telp, unit, deskripsi, total, pajak, metode_bayar, resi_transfer, bulan_count, tahun_count) VALUES ('$id_transaksi', '$id_user', '$id_sewa', '$id_renew', '$verif', '$paid', '$tipe', '$nama', '$email', '$telp', '$unit', '$deskripsi', '$total', '$pajak', '$metode_bayar', '$resi_transfer', '$bulan_count', '$tahun_count')");
header("Location: ../../bayar/");
?>













































