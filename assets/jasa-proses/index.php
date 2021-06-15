<?php
include '../connection.php';
date_default_timezone_set('Asia/Jakarta');
$id_user = $_POST['id_user'];
$id_sewa = $_POST['id_sewa'];
$verif = $_POST['verif'];
$nama_makam = $_POST['nama_makam'];
$blok = $_POST['blok'];
$nama_nisan = $_POST['nama_nisan'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$email = $_POST['email'];
$jumlah = $_POST['jumlah'];
$id_transaksi = $_POST['id_transaksi'];
$paid = $_POST['paid'];
$tipe = $_POST['tipe'];
$bulan_count = date("m");
$tahun_count = date("Y");
$tgl_input = date("d M Y");

// INSERT NEW ITEM 
if (isset($_POST['submit'])) {
	$waktu_input = date("h:i:s a");
	
	$paket_sewa = mysqli_query($mysqli, "SELECT * FROM paket_sewa WHERE nama_paket='$jumlah'");
	while ($t = mysqli_fetch_array($paket_sewa)) {
		$nama_paket = $t['nama_paket'];
		$jumlahs = $t['jumlah'];
		$makam = mysqli_query($mysqli, "SELECT * FROM makam WHERE nama='$nama_makam'");
		while ($m = mysqli_fetch_array($makam)) {
			$id_makam = $m['id_makam'];
			$harga = 80000;
			// $satu_bulan = 30;
			$total = $jumlahs*$harga;

			$result = mysqli_query($mysqli, "INSERT INTO penyewa_jasa (id_sewa, verif, id_user, id_makam, nama_makam, blok, nama_nisan, nama, telp, email, jumlah, bulan_count, tahun_count, tgl_input, waktu_input) VALUES ('$id_sewa', '$verif', '$id_user', '$id_makam', '$nama_makam', '$blok', '$nama_nisan', '$nama', '$telp', '$email', '$jumlahs', '$bulan_count', '$tahun_count', '$tgl_input', '$waktu_input')");

			$write_transaksi = mysqli_query($mysqli, "INSERT INTO transaksi (id_transaksi, id_user, id_sewa, verif, paid, tipe, nama, email, telp, unit, total, bulan_count, tahun_count) VALUES ('$id_transaksi', '$id_user', '$id_sewa', '$verif', '$paid', '$tipe', '$nama', '$email', '$telp', '$jumlahs', '$total', '$bulan_count', '$tahun_count')");
				
				header("Location: ../../sewa/jasa/data/?id_makam=".$id_makam."&blok=".$blok."&jumlah=".$jumlahs."&sewa=".$id_sewa."&#popup");
		}
	}
}

// UPDATE
if (isset($_POST['update'])) {
	$paket_sewa = mysqli_query($mysqli, "SELECT * FROM paket_sewa WHERE nama_paket='$jumlah'");
	while ($t = mysqli_fetch_array($paket_sewa)) {
		$nama_paket = $t['nama_paket'];
		$jumlahs = $t['jumlah'];
		$makam = mysqli_query($mysqli, "SELECT * FROM makam WHERE nama='$nama_makam'");
		while ($m = mysqli_fetch_array($makam)) {
			$id_makam = $m['id_makam'];
			$harga = 80000;
			// $satu_bulan = 30;
			$total = $jumlahs*$harga;

			$result = mysqli_query($mysqli, "UPDATE penyewa_jasa SET id_makam='$id_makam', verif='$verif', nama_makam='$nama_makam', blok='$blok', nama_nisan='$nama_nisan', nama='$nama', telp='$telp', email='$email', jumlah='$jumlahs' WHERE id_sewa='$id_sewa' AND id_user='$id_user'");
			$write_transaksi = mysqli_query($mysqli, "UPDATE transaksi SET nama='$nama', email='$email', telp='$telp', unit='$jumlahs'  WHERE id_transaksi='$id_transaksi' AND id_user='$id_user' AND id_sewa='$id_sewa'");

			header("Location: ../../sewa/jasa/data/?id_makam=".$id_makam."&blok=".$blok."&jumlah=".$jumlahs."&sewa=".$id_sewa."&#popup");
		}
	}
}
?>













































