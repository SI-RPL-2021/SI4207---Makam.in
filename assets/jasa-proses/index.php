<?php
include '../connection.php';

// INSERT NEW ITEM
if (isset($_POST['submit'])) {
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
	
	$paket_sewa = mysqli_query($mysqli, "SELECT * FROM paket_sewa WHERE nama_paket='$jumlah'");
	while ($t = mysqli_fetch_array($paket_sewa)) {
		$nama_paket = $t['nama_paket'];
		$jumlahs = $t['jumlah'];
		$makam = mysqli_query($mysqli, "SELECT * FROM makam WHERE nama='$nama_makam'");
		while ($m = mysqli_fetch_array($makam)) {
			$id_makam = $m['id_makam'];
			$makam_harga = mysqli_query($mysqli, "SELECT * FROM makam_stok WHERE id_makam='$id_makam' AND blok='$blok'");
			while ($h = mysqli_fetch_array($makam_harga)) {
				$harga = $h['harga'];
				$satu_bulan = 30;
				$total = $satu_bulan*$harga;

				$result = mysqli_query($mysqli, "INSERT INTO penyewa_jasa (id_sewa, verif, id_user, id_makam, nama_makam, blok, nama_nisan, nama, telp, email, jumlah) VALUES ('$id_sewa', '$verif', '$id_user', '$id_makam', '$nama_makam', '$blok', '$nama_nisan', '$nama', '$telp', '$email', '$jumlahs')");

				$write_transaksi = mysqli_query($mysqli, "INSERT INTO transaksi (id_transaksi, id_user, id_sewa, verif, paid, tipe, nama, email, telp, unit, total) VALUES ('$id_transaksi', '$id_user', '$id_sewa', '$verif_bayar', '$paid', '$tipe', '$nama', '$email', '$telp', '$jumlahs', '$total')");
				
				header("Location: ../../sewa/jasa/data/?id_makam=".$id_makam."&blok=".$blok."&jumlah=".$jumlahs."&sewa=".$id_sewa);
			}
		}
	}
}

// UPDATE
if (isset($_POST['update'])) {
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
	
	$paket_sewa = mysqli_query($mysqli, "SELECT * FROM paket_sewa WHERE nama_paket='$jumlah'");
	while ($t = mysqli_fetch_array($paket_sewa)) {
		$nama_paket = $t['nama_paket'];
		$jumlahs = $t['jumlah'];
		$makam = mysqli_query($mysqli, "SELECT * FROM makam WHERE nama='$nama_makam'");
		while ($m = mysqli_fetch_array($makam)) {
			$id_makam = $m['id_makam'];
			$makam_harga = mysqli_query($mysqli, "SELECT * FROM makam_stok WHERE id_makam='$id_makam' AND blok='$blok'");
			while ($h = mysqli_fetch_array($makam_harga)) {
				$harga = $h['harga'];
				$satu_bulan = 30;
				$total = $satu_bulan*$harga;

				$result = mysqli_query($mysqli, "UPDATE penyewa_jasa SET id_sewa='$id_sewa', verif='$verif', id_user='$id_user', id_makam='$id_makam', nama_makam='$nama_makam', blok='$blok', nama_nisan='$nama_nisan', nama='$nama', telp='$telp', email='$email', jumlah='$jumlahs' WHERE id_sewa='$id_sewa' AND id_user='$id_user' AND id_makam='$id_makam' AND blok='$blok' AND jumlah='$jumlahs'");

				header("Location: ../../sewa/jasa/data/?id_makam=".$id_makam."&blok=".$blok."&jumlah=".$jumlahs."&sewa=".$id_sewa);
			}
		}
	}
}
?>













































