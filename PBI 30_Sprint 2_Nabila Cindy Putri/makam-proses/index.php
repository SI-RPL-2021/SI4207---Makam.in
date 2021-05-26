<?php
include '../connection.php';
date_default_timezone_set('Asia/Jakarta');
session_start();
$id_user = $_SESSION['id_user'];
$id_makam = $_POST['id_makam'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$kecamatan = $_POST['kecamatan'];
$kode_pos = $_POST['kode_pos'];
$bulan_count = date("m");
$tahun_count = date("Y");
$jumlah = count($_FILES['gbr_nama']['name']);
$gbr_nama = $_POST['gbr_nama'];

if($jumlah > 1) {
	for ($i=0; $i < $jumlah; $i++) { 
		// $file_names = $_FILES['gbr_nama']['name'][$i];
		// $ex = strtolower(end(explode('.',$file_names)));
		// // $file_name = $_FILES['gbr_nama']['name'][$i];
		// $tmp_name = $_FILES['gbr_nama']['tmp_name'][$i];
		// $gbr_nama	= str_replace(" ", "", basename($gbr_nama))."".date('d-m-YHis')."[".$i."]".str_replace(" ", "", ".".basename($ex)).$_FILES['gbr_nama'][$i]."|";
		// move_uploaded_file($tmp_name, "../../source/makam/".substr($gbr_nama,0,-1));

		$file_name = $_FILES['gbr_nama']['name'][$i];
		$tmp_name = $_FILES['gbr_nama']['tmp_name'][$i];
		$gbr_nama	=  $gbr_nama.$file_name.'|';			
		move_uploaded_file($tmp_name, "../../source/makam/".$file_name);						
	}
	$sgbr_nama= substr($gbr_nama,0,-1);
	
	if ($_POST['submit']) {
		$result = mysqli_query($mysqli, "INSERT INTO `makam` (`id_makam`, `nama`, `alamat`, `kota`, `kecamatan`, `kode_pos`, `gbr_nama`, `bulan_count`, `tahun_count`) VALUES ('$id_makam', '$nama', '$alamat', '$kota', '$kecamatan', '$kode_pos', '$sgbr_nama', '$bulan_count', '$tahun_count')");
	}
	if ($_POST['update']) {
		$update = mysqli_query($mysqli, "UPDATE `makam` SET `nama` = '$nama', `alamat` = '$alamat', `kota` = '$kota', `kecamatan` = '$kecamatan', `kode_pos` = '$kode_pos', `gbr_nama` = '$sgbr_nama' WHERE `makam`.`id_makam` = '$id_makam'");
	}
} else {
	if ($_POST['update']) {
		$update = mysqli_query($mysqli, "UPDATE `makam` SET `nama` = '$nama', `alamat` = '$alamat', `kota` = '$kota', `kecamatan` = '$kecamatan', `kode_pos` = '$kode_pos' WHERE `makam`.`id_makam` = '$id_makam'");
	}	
}
header("Location: ../../admin/e-data/makam/form/?id=".$id_makam."&#popup");
?>