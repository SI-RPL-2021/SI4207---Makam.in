<?php
include '../connection.php';
date_default_timezone_set('Asia/Jakarta');
$status = $_POST['status'];
$verif = $_POST['verif'];
$verif_bayar = $_POST['verif_bayar'];
$paid = $_POST['paid'];
$id_user = $_POST['id_user'];
$id_transaksi = $_POST['id_transaksi'];
$id_sewa = $_POST['id_sewa'];
$id_makam = $_POST['id_makam'];
$tipe = $_POST['tipe'];
$blok = $_POST['blok'];
$jumlahs = $_POST['jumlah'];
$total = $_POST['total'];
$jam = $_POST['jam'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$catatan = $_POST['catatan'];
$bulan_count = date("m");
$tahun_count = date("Y");
$tgl_input = date("d M Y");
$waktu_input = date("h:i:s a");
$jumlah = count($_FILES['gbr_smb']['name']);
$gbr_smb = '';
if ($jumlah > 0) {
	for ($i=0; $i < $jumlah; $i++) { 
		$file_name = $_FILES['gbr_smb']['name'][$i];
		$tmp_name = $_FILES['gbr_smb']['tmp_name'][$i];
		$gbr_smb	=  $gbr_smb.$file_name.'|';				
		move_uploaded_file($tmp_name, "../../source/berkas/".$file_name);								
	}
	$sgbr_smb = substr($gbr_smb,0,-1);
}
$jumlah1 = count($_FILES['gbr_kk_ktp']['name']);
$gbr_kk_ktp = '';
if ($jumlah1 > 0) {
	for ($a=0; $a < $jumlah1; $a++) { 
		$file_name1 = $_FILES['gbr_kk_ktp']['name'][$a];
		$tmp_name1 = $_FILES['gbr_kk_ktp']['tmp_name'][$a];
		$gbr_kk_ktp	=  $gbr_kk_ktp.$file_name1.'|';				
		move_uploaded_file($tmp_name1, "../../source/berkas/".$file_name1);								
	}
	$sgbr_kk_ktp = substr($gbr_kk_ktp,0,-1);
}
$jumlah2 = count($_FILES['gbr_sk']['name']);
$gbr_sk = '';
if ($jumlah2 > 0) {
	for ($b=0; $b < $jumlah2; $b++) { 
		$file_name2 = $_FILES['gbr_sk']['name'][$b];
		$tmp_name2 = $_FILES['gbr_sk']['tmp_name'][$b];
		$gbr_sk	=  $gbr_sk.$file_name2.'|';				
		move_uploaded_file($tmp_name2, "../../source/berkas/".$file_name2);								
	}
	$sgbr_sk = substr($gbr_sk,0,-1);
}
$jumlah3 = count($_FILES['gbr_kk_ktp_jenazah']['name']);
$gbr_kk_ktp_jenazah = '';
if ($jumlah3 > 0) {
	for ($c=0; $c < $jumlah3; $c++) { 
		$file_name3 = $_FILES['gbr_kk_ktp_jenazah']['name'][$c];
		$tmp_name3 = $_FILES['gbr_kk_ktp_jenazah']['tmp_name'][$c];
		$gbr_kk_ktp_jenazah	=  $gbr_kk_ktp_jenazah.$file_name3.'|';				
		move_uploaded_file($tmp_name3, "../../source/berkas/".$file_name3);								
	}
	$sgbr_kk_ktp_jenazah = substr($gbr_kk_ktp_jenazah,0,-1);
}
$jumlah4 = count($_FILES['gbr_sk_instansi']['name']);
$gbr_sk_instansi = '';
if ($jumlah4 > 0) {
	for ($d=0; $d < $jumlah4; $d++) { 
		$file_name4 = $_FILES['gbr_sk_instansi']['name'][$d];
		$tmp_name4 = $_FILES['gbr_sk_instansi']['tmp_name'][$d];
		$gbr_sk_instansi	=  $gbr_sk_instansi.$file_name4.'|';				
		move_uploaded_file($tmp_name4, "../../source/berkas/".$file_name4);								
	}
	$sgbr_sk_instansi = substr($gbr_sk_instansi,0,-1);
}
$jumlah5 = count($_FILES['gbr_sk_lokal']['name']);
$gbr_sk_lokal = '';
if ($jumlah5 > 0) {
	for ($e=0; $e < $jumlah5; $e++) { 
		$file_name5 = $_FILES['gbr_sk_lokal']['name'][$e];
		$tmp_name5 = $_FILES['gbr_sk_lokal']['tmp_name'][$e];
		$gbr_sk_lokal	=  $gbr_sk_lokal.$file_name5.'|';				
		move_uploaded_file($tmp_name5, "../../source/berkas/".$file_name5);								
	}
	$sgbr_sk_lokal = substr($gbr_sk_lokal,0,-1);
}
$jumlah6 = count($_FILES['gbr_sp']['name']);
$gbr_sp = '';
if ($jumlah6 > 0) {
	for ($f=0; $f < $jumlah6; $f++) { 
		$file_name6 = $_FILES['gbr_sp']['name'][$f];
		$tmp_name6 = $_FILES['gbr_sp']['tmp_name'][$f];
		$gbr_sp	=  $gbr_sp.$file_name6.'|';				
		move_uploaded_file($tmp_name6, "../../source/berkas/".$file_name6);								
	}
	$sgbr_sp = substr($gbr_sp,0,-1);
}

// INSERT NEW ITEM
if (isset($_POST['submit'])) {
	$makam_stok = mysqli_query($mysqli, "SELECT * FROM makam_stok WHERE id_makam='$id_makam' AND blok='$blok'");
	while ($stoks = mysqli_fetch_array($makam_stok)) {
		$stok_kurang = 1;
		$total_stok = $stoks['stok']-$stok_kurang;
		$update_stok = mysqli_query($mysqli, "UPDATE makam_stok SET stok='$total_stok' WHERE id_makam='$id_makam' AND blok='$blok'");
	}
	$result = mysqli_query($mysqli, "INSERT INTO penyewa_makam (id_sewa, verif, id_user, id_makam, blok, jumlah, jam, nama, telp, email, alamat, catatan, gbr_smb, gbr_kk_ktp, gbr_sk, gbr_kk_ktp_jenazah, gbr_sk_instansi, gbr_sk_lokal, gbr_sp, bulan_count, tahun_count, tgl_input, waktu_input) VALUES ('$id_sewa', '$verif', '$id_user', '$id_makam', '$blok', '$jumlahs', '$jam', '$nama', '$telp', '$email', '$alamat', '$catatan', '$sgbr_smb', '$sgbr_kk_ktp', '$sgbr_sk', '$sgbr_kk_ktp_jenazah', '$sgbr_sk_instansi', '$sgbr_sk_lokal', '$sgbr_sp', '$bulan_count', '$tahun_count', '$tgl_input', '$waktu_input')");

	$write_transaksi = mysqli_query($mysqli, "INSERT INTO transaksi (id_transaksi, id_user, id_sewa, verif, paid, tipe, nama, email, telp, unit, deskripsi, total, bulan_count, tahun_count) VALUES ('$id_transaksi', '$id_user', '$id_sewa', '$verif_bayar', '$paid', '$tipe', '$nama', '$email', '$telp', '$jumlahs', '$catatan', '$total', '$bulan_count', '$tahun_count')");
	header("Location: ../../sewa/lahan/data/?id=".$id_sewa."&id_makam=".$id_makam."&blok=".$blok."&jumlah=".$jumlahs."&jadwal=".$jam."&#popup");
}

// UPDATE
if (isset($_POST['update'])) {
	
	$result = mysqli_query($mysqli, "UPDATE penyewa_makam SET verif='$verif', nama='$nama', telp='$telp', email='$email', alamat='$alamat', catatan='$catatan', gbr_smb='$sgbr_smb', gbr_kk_ktp='$sgbr_kk_ktp', gbr_sk='$sgbr_sk', gbr_kk_ktp_jenazah='$sgbr_kk_ktp_jenazah', gbr_sk_instansi='$sgbr_sk_instansi', gbr_sk_lokal='$sgbr_sk_lokal', gbr_sp='$sgbr_sp' WHERE id_sewa='$id_sewa' AND id_makam='$id_makam' AND id_user='$id_user' AND blok='$blok' AND jumlah='$jumlahs' AND jam='$jam'");
	$write_transaksi = mysqli_query($mysqli, "UPDATE transaksi SET nama='$nama', telp='$telp', email='$email', deskripsi='$catatan' WHERE id_transaksi='$id_transaksi' AND id_sewa='$id_sewa' AND id_user='$id_user'");
	header("Location: ../../sewa/lahan/data/?id=".$id_sewa."&id_makam=".$id_makam."&blok=".$blok."&jumlah=".$jumlahs."&jadwal=".$jam."&#popup");
}
?>













































