<?php
error_reporting(0);
include_once("../../../assets/connection.php");
session_start();
if ($_SESSION['status']=="admin") {
header("Location: ../../../admin/");
}elseif ($_SESSION['status']=="user") {

}else{
header("Location: ../../../login/"); 
}
if ($_SESSION['verif']=="yes") {

}else{
header("Location: ../../../login/"); 
}
$id_user = $_SESSION['id_user'];
$view = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user = '$id_user'");
while ($view = mysqli_fetch_array($view)) {
  $namas = $view['nama'];
  $verifs = $view['verif'];
  $emails = $view['email'];
}
$id_makam = $_GET['id_makam'];
$blok = $_GET['blok'];
$jumlah = $_GET['jumlah'];
$jam = $_GET['jadwal'];
$id = $_GET['id'];
$SqlQuery = mysqli_query($mysqli, "SELECT * FROM penyewa_makam");
if (isset($id)) {
$penyewa = mysqli_query($mysqli, "SELECT * FROM penyewa_makam WHERE id_sewa='$id' AND id_user='$id_user'");
$transaksi = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_sewa='$id' AND id_user='$id_user'");
while ($s = mysqli_fetch_array($penyewa)) {
  $verifsewa = $s['verif'];
  $id_sewa = $s['id_sewa'];
  $id_user = $s['id_user'];
  $id_makam = $s['id_makam'];
  $blok = $s['blok'];
  $jumlah = $s['jumlah'];
  $jam = $s['jam'];
  $snama = $s['nama'];
  $stelp = $s['telp'];
  $semail = $s['email'];
  $salamat = $s['alamat'];
  $scatatan = $s['catatan'];
  $sgbr_smb = $s['gbr_smb'];
  $sgbr_kk_ktp = $s['gbr_kk_ktp'];
  $sgbr_sk = $s['gbr_sk'];
  $sgbr_kk_ktp_jenazah = $s['gbr_kk_ktp_jenazah'];
  $sgbr_sk_instansi = $s['gbr_sk_instansi'];
  $sgbr_sk_lokal = $s['gbr_sk_lokal'];
  $sgbr_sp = $s['gbr_sp'];
}
while ($t = mysqli_fetch_array($transaksi)) {
  $id_transaksi = $t['id_transaksi'];
}
}
$tiga_tahun = 36;
$total_harga = mysqli_query($mysqli, "SELECT * FROM makam_stok WHERE blok = '$blok' AND id_makam = '$id_makam'");
while ($t = mysqli_fetch_array($total_harga)) {
  $harga_makam = $t['harga'];
}
$totalin_harga = ($harga_makam*$jumlah)*$tiga_tahun;
function generatekode($length = 11) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../../../bs5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/navbar.css">
    <link rel="stylesheet" href="../../../css/body.css">
    <link rel="stylesheet" href="../../../css/responsive.css">
    <link rel="stylesheet" href="../../../css/sewajasa.css">  
    <link rel="stylesheet" href="../../../css/sewatanah.css">
    <link rel="stylesheet" href="../../../css/sewa.css">
    <link rel="stylesheet" href="../../../css/masuk_admin.css"> 
    <link rel="icon" href="../../../assets/logonisan.png">
    <title>Makam.in</title>
  </head>
  <body>
      <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-3 fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../../../assets/logo.png" height="40px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang " href="../../../">Home &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="#">Sewa &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../../../renew/">Perpanjang &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../../../bayar/">Bayar &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../../../track/">Tracking &nbsp;&nbsp;</a>
                    </li>
                    <div class="dropdown">
                        <button class="dropbtn">Selamat Datang, <span method="post" name="user" class="users"><?php if ($verifs=="yes"){echo($namas);}else{echo($_SESSION['email']);} ?></span>
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16" id="logout">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                            </svg>
                            <a href="../../../user/e-identitas/"><span class="lgt">Rubah Profile</span></a>
                            <a href="../../../assets/logout-proses/"><span class="lgt">Logout</span></a>
                        </div>
                    </div> 
                </ul>

            </div>
        </div>
    </nav>

    <!-- konten -->
    <div class="container"><br><br>
    <div class="auth">
         <div class="container">
            <div class="row">
                    <div class="col-md-12 col-lg-5">
                              <h5 class="card-titlesewa">
                              <?php 
                              if ($verifsewa=="yes") {
                                echo "Rubah Data Sewa Tanah Makam";
                              } elseif ($verifsewa=="no") {
                                echo "Data Sewa Tanah Makam <p style='color:red;'>[Ditolak]</p>";
                              } elseif ($verifsewa=="wait") {
                                echo "Data Sewa Tanah Makam <p style='color:#a8a8a9;'>[Menunggu Konfirmasi Admin]</p>";
                              } else {
                                echo "Data Sewa Tanah Makam";
                              }
                              ?>
                              </h5>

                              <!-- jika status penyewa makam verif is no -->
                              <?php
                              if ($verifsewa=="no") {
                              ?>
                              <form action="../../../assets/data-proses/index.php" method="post" enctype="multipart/form-data">                    
                                <h6 class="berkaspemohons">Berkas Persyaratan</h6> 
                                <h6 class="berkaspemohonssyarat" style="top: 250px;">Revisi wajib mengupload dokumen persyaratan sesuai dengan persyaratan berlaku</h6> 
                                <h6 class="pemohons">Data Pemohon</h6>
                                <input type="hidden" name="id_user" value="<?=$id_user?>">
                                <input type="hidden" name="id_transaksi" value="<?=$id_transaksi;?>">
                                <input type="hidden" name="id_sewa" value="<?=$id_sewa?>">
                                <input type="hidden" name="id_makam" value="<?=$id_makam?>">
                                <input type="hidden" name="verif_bayar" value="wait">
                                <input type="hidden" name="tipe" value="lahan">
                                <input type="hidden" name="blok" value="<?=$blok?>">
                                <input type="hidden" name="jumlah" value="<?=$jumlah?>">
                                <input type="hidden" name="jam" value="<?=$jam?>">
                                <input type="hidden" name="verif" value="wait">
                                <input type="hidden" name="total" value="<?=$totalin_harga?>">

                                         
                                <div class="form-group" id="formsewa">
                                  <label for="formGroupExampleInput" class="namapemohon">Nama Pemohon</label>
                                  <input type="text" name="nama" class="form-control" id="labelsewatanah" placeholder="Nama Lengkap" required="" value="<?=$snama?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="alamatpemohon">Alamat Pemohon</label>
                                    <textarea class="form-control" name="alamat" id="labelarea" rows="3" required="" placeholder="Alamat"><?=$salamat?></textarea>
                                  </div>

                                <div class="form-group">
                                  <label for="formGroupExampleInput2" class="nohp">No Telp/ Hp </label>
                                  <input type="number" name="telp" class="form-control" id="telpsewa" placeholder="628XX-XXXX-XXXX" required="" value="<?=$stelp?>">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput2" class="catatan">Email</label>
                                    <input type="email" name="email" class="form-control" id="catatansewa" placeholder="email@email.com" required="" value="<?=$semail?>">
                                  </div>
                                    
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="alamatpemohons">Catatan</label>
                                    <textarea class="form-control" name="catatan" id="labelarea" rows="3" placeholder="*Catatan" required=""><?=$scatatan?></textarea>
                                  </div>
                                    
                                  <div class="input-group mb-3">
                                      <h6 class="materai"><span class="mat">*</span> Surat Permohonan Bermaterai</h6>
                                    <div class="input-group-append">
                                        <input type="file" name="gbr_smb[]" multiple value="Upload" class="input-group" id="surat1" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                    <div class="rowsewa">

                                        <div class="input-group mb-3">
                                            <h6 class="materai1"><span class="mat">*</span> Identitas Pemohon/Penanggung Jawab [KK dan KTP]</h6>
                                          <div class="input-group-append">
                                              <input type="file" name="gbr_kk_ktp[]" multiple value="Upload" class="input-group" id="surat2" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                          <div class="rowsewa1">

                                            <div class="input-group mb-3">
                                                <h6 class="materai2"> &nbsp;Surat Kuasa</h6>
                                              <div class="input-group-append">
                                                  <input type="file" name="gbr_sk[]" multiple value="Upload" class="input-group" id="surat3" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                              <div class="rowsewa2">

                                                <div class="input-group mb-3">
                                                    <h6 class="materai3"><span class="mat">*</span> KTP dan Kartu Keluarga [KK] Jenazah (Fotokopi)</h6>
                                                  <div class="input-group-append">
                                                      <input type="file" name="gbr_kk_ktp_jenazah[]" multiple value="Upload" class="input-group" id="surat4" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                                  <div class="rowsewa3">

                                                    
                                                <div class="input-group mb-3">
                                                    <h6 class="materai4" style="font-size: 0.85rem;"><span class="mat">*</span> Surat Keterangan Kematian [Puskesmas/Rumah Sakit] (Fotokopi)</h6>
                                                  <div class="input-group-append">
                                                      <input type="file" name="gbr_sk_instansi[]" multiple value="Upload" class="input-group" id="surat5" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                                  <div class="rowsewa4">

                                                    <div class="input-group mb-3">
                                                        <h6 class="materai5" style="font-size: 0.85rem;"><span class="mat">*</span> Surat Keterangan Kematian [Kelurahan Setempat] (Fotokopi)</h6>
                                                      <div class="input-group-append">
                                                          <input type="file" name="gbr_sk_lokal[]" multiple value="Upload" class="input-group" id="surat6" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                                      <div class="rowsewa5">

                                                        <div class="input-group mb-3">
                                                            <h6 class="materai6"><span class="mat">*</span> Surat Pengantar dari TPU (asli)</h6>
                                                          <div class="input-group-append">
                                                              <input type="file" name="gbr_sp[]" multiple value="Upload" class="input-group" id="surat7" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                                          <div class="rowsewa6">
                                                        <input type="submit" name="update" id="button" value="Update">
                              </form>

                              <!-- jika status penyewa makam verif is yes -->
                              <?php
                              } elseif ($verifsewa=="yes") {
                              ?>
                              <form action="../../../assets/data-proses/index.php" method="post" enctype="multipart/form-data">                    
                                <h6 class="berkaspemohons">Berkas Persyaratan</h6> 
                                <h6 class="berkaspemohonssyarat" style="top: 250px;">Revisi wajib mengupload dokumen persyaratan sesuai dengan persyaratan berlaku</h6> 
                                <h6 class="pemohons">Data Pemohon</h6>
                                <input type="hidden" name="id_user" value="<?=$id_user?>">
                                <input type="hidden" name="id_transaksi" value="<?=$id_transaksi?>">
                                <input type="hidden" name="id_sewa" value="<?=$id_sewa?>">
                                <input type="hidden" name="id_makam" value="<?=$id_makam?>">
                                <input type="hidden" name="verif_bayar" value="wait">
                                <input type="hidden" name="tipe" value="lahan">
                                <input type="hidden" name="blok" value="<?=$blok?>">
                                <input type="hidden" name="jumlah" value="<?=$jumlah?>">
                                <input type="hidden" name="jam" value="<?=$jam?>">
                                <input type="hidden" name="verif" value="wait">
                                <input type="hidden" name="total" value="<?=$totalin_harga?>">

                                         
                                <div class="form-group" id="formsewa">
                                  <label for="formGroupExampleInput" class="namapemohon">Nama Pemohon</label>
                                  <input type="text" name="nama" class="form-control" id="labelsewatanah" placeholder="Nama Lengkap" value="<?=$snama?>" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="alamatpemohon">Alamat Pemohon</label>
                                    <textarea class="form-control" name="alamat" id="labelarea" rows="3" required="" placeholder="Alamat"><?=$salamat?></textarea>
                                  </div>

                                <div class="form-group">
                                  <label for="formGroupExampleInput2" class="nohp">No Telp/ Hp </label>
                                  <input type="number" name="telp" class="form-control" id="telpsewa" placeholder="628XX-XXXX-XXXX" value="<?=$stelp?>" required="">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput2" class="catatan">Email</label>
                                    <input type="email" name="email" class="form-control" id="catatansewa" placeholder="email@email.com" value="<?=$semail?>" required="">
                                  </div>
                                    
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="alamatpemohons">Catatan</label>
                                    <textarea class="form-control" name="catatan" id="labelarea" rows="3" placeholder="*Catatan" required=""><?=$scatatan?></textarea>
                                  </div>
                                    
                                  <div class="input-group mb-3">
                                      <h6 class="materai"><span class="mat">*</span> Surat Permohonan Bermaterai</h6>
                                    <div class="input-group-append">
                                        <input type="file" name="gbr_smb[]" multiple value="Upload" class="input-group" id="surat1" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                    <div class="rowsewa">

                                        <div class="input-group mb-3">
                                            <h6 class="materai1"><span class="mat">*</span> Identitas Pemohon/Penanggung Jawab [KK dan KTP]</h6>
                                          <div class="input-group-append">
                                              <input type="file" name="gbr_kk_ktp[]" multiple value="Upload" class="input-group" id="surat2" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                          <div class="rowsewa1">

                                            <div class="input-group mb-3">
                                                <h6 class="materai2"> &nbsp;Surat Kuasa</h6>
                                              <div class="input-group-append">
                                                  <input type="file" name="gbr_sk[]" multiple value="Upload" class="input-group" id="surat3" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                              <div class="rowsewa2">

                                                <div class="input-group mb-3">
                                                    <h6 class="materai3"><span class="mat">*</span> KTP dan Kartu Keluarga [KK] Jenazah (Fotokopi)</h6>
                                                  <div class="input-group-append">
                                                      <input type="file" name="gbr_kk_ktp_jenazah[]" multiple value="Upload" class="input-group" id="surat4" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                                  <div class="rowsewa3">

                                                    
                                                <div class="input-group mb-3">
                                                    <h6 class="materai4" style="font-size: 0.85rem;"><span class="mat">*</span> Surat Keterangan Kematian [Puskesmas/Rumah Sakit] (Fotokopi)</h6>
                                                  <div class="input-group-append">
                                                      <input type="file" name="gbr_sk_instansi[]" multiple value="Upload" class="input-group" id="surat5" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                                  <div class="rowsewa4">

                                                    <div class="input-group mb-3">
                                                        <h6 class="materai5" style="font-size: 0.85rem;"><span class="mat">*</span> Surat Keterangan Kematian [Kelurahan Setempat] (Fotokopi)</h6>
                                                      <div class="input-group-append">
                                                          <input type="file" name="gbr_sk_lokal[]" multiple value="Upload" class="input-group" id="surat6" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                                      <div class="rowsewa5">

                                                        <div class="input-group mb-3">
                                                            <h6 class="materai6"><span class="mat">*</span> Surat Pengantar dari TPU (asli)</h6>
                                                          <div class="input-group-append">
                                                              <input type="file" name="gbr_sp[]" multiple value="Upload" class="input-group" id="surat7" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                                          <div class="rowsewa6">
                                                        <input type="submit" name="update" id="button" value="Update">
                              </form>

                              <!-- jika status penyewa makam verif is wait -->
                              <?php
                              } elseif ($verifsewa=="wait") {
                              ?>
                              <form action="../../../assets/data-proses/index.php" method="post" enctype="multipart/form-data">                    
                                <h6 class="berkaspemohons">Berkas Persyaratan</h6> 
                                <h6 class="berkaspemohonssyarat" style="top: 250px;">Pemohon wajib mengupload dokumen persyaratan sesuai dengan persyaratan berlaku</h6> 
                                <h6 class="pemohons">Data Pemohon</h6>
                                <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>">
                                <input type="hidden" name="id_transaksi" value="<?php echo generatekode();?>">
                                <input type="hidden" name="id_sewa" value="<?php echo generatekode();?>">
                                <input type="hidden" name="id_makam" value="<?=$id_makam?>">
                                <input type="hidden" name="verif_bayar" value="wait">
                                <input type="hidden" name="tipe" value="lahan">
                                <input type="hidden" name="blok" value="<?=$blok?>">
                                <input type="hidden" name="jumlah" value="<?=$jumlah?>">
                                <input type="hidden" name="jam" value="<?=$jam?>">
                                <input type="hidden" name="verif" value="wait">
                                <input type="hidden" name="paid" value="wait">
                                <input type="hidden" name="total" value="<?=$totalin_harga?>">

                                         
                                <div class="form-group" id="formsewa">
                                  <label for="formGroupExampleInput" class="namapemohon">Nama Pemohon</label>
                                  <input type="text" name="nama" class="form-control" id="labelsewatanah" placeholder="Nama Lengkap" value="<?=$snama?>" required="" disabled="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="alamatpemohon">Alamat Pemohon</label>
                                    <textarea class="form-control" name="alamat" id="labelarea" rows="3" required="" placeholder="Alamat" disabled=""><?=$salamat?></textarea>
                                  </div>

                                <div class="form-group">
                                  <label for="formGroupExampleInput2" class="nohp">No Telp/ Hp </label>
                                  <input type="number" name="telp" class="form-control" id="telpsewa" placeholder="628XX-XXXX-XXXX" value="<?=$stelp?>" required="" disabled="">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput2" class="catatan">Email</label>
                                    <input type="email" name="email" class="form-control" id="catatansewa" placeholder="email@email.com" value="<?=$semail?>" required="" disabled="">
                                  </div>
                                    
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="alamatpemohons">Catatan</label>
                                    <textarea class="form-control" name="catatan" id="labelarea" rows="3" placeholder="*Catatan" required="" disabled=""><?=$scatatan?></textarea>
                                  </div>
                                    
                                  <div class="input-group mb-3">
                                      <h6 class="materai"><span class="mat">*</span> Surat Permohonan Bermaterai</h6>
                                    <div class="input-group-append">
                                        <input type="file" name="gbr_smb[]" multiple value="Upload" class="input-group" id="surat1" required="" disabled="">
                                    <div class="rowsewa">

                                        <div class="input-group mb-3">
                                            <h6 class="materai1"><span class="mat">*</span> Identitas Pemohon/Penanggung Jawab [KK dan KTP]</h6>
                                          <div class="input-group-append">
                                              <input type="file" name="gbr_kk-ktp[]" multiple value="Upload" class="input-group" id="surat2" required="" disabled="">
                                          <div class="rowsewa1">

                                            <div class="input-group mb-3">
                                                <h6 class="materai2"> &nbsp;Surat Kuasa</h6>
                                              <div class="input-group-append">
                                                  <input type="file" name="gbr_sk[]" multiple value="Upload" class="input-group" id="surat3" required="" disabled="">
                                              <div class="rowsewa2">

                                                <div class="input-group mb-3">
                                                    <h6 class="materai3"><span class="mat">*</span> KTP dan Kartu Keluarga [KK] Jenazah (Fotokopi)</h6>
                                                  <div class="input-group-append">
                                                      <input type="file" name="gbr_kk-ktp-jenazah[]" multiple value="Upload" class="input-group" id="surat4" required="" disabled="">
                                                  <div class="rowsewa3">

                                                    
                                                <div class="input-group mb-3">
                                                    <h6 class="materai4" style="font-size: 0.85rem;"><span class="mat">*</span> Surat Keterangan Kematian [Puskesmas/Rumah Sakit] (Fotokopi)</h6>
                                                  <div class="input-group-append">
                                                      <input type="file" name="gbr_sk-instansi[]" multiple value="Upload" class="input-group" id="surat5" required="" disabled="">
                                                  <div class="rowsewa4">

                                                    <div class="input-group mb-3">
                                                        <h6 class="materai5" style="font-size: 0.85rem;"><span class="mat">*</span> Surat Keterangan Kematian [Kelurahan Setempat] (Fotokopi)</h6>
                                                      <div class="input-group-append">
                                                          <input type="file" name="gbr_sk-lokal[]" multiple value="Upload" class="input-group" id="surat6" required="" disabled="">
                                                      <div class="rowsewa5">

                                                        <div class="input-group mb-3">
                                                            <h6 class="materai6"><span class="mat">*</span> Surat Pengantar dari TPU (asli)</h6>
                                                          <div class="input-group-append">
                                                              <input type="file" name="gbr_sp[]" multiple value="Upload" class="input-group" id="surat7" required="" disabled="">
                                                          <div class="rowsewa6">
                                                        <input type="submit" name="submit" id="button" value="Kirim" disabled="" style="background-color: #e9ecef;color: black; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;">
                              </form>

                              <!-- jika status penyewa makam verif is empty -->
                              <?php
                              } else {
                              ?>
                              <form action="../../../assets/data-proses/index.php" method="post" enctype="multipart/form-data">                    
                                <h6 class="berkaspemohons">Berkas Persyaratan</h6> 
                                <h6 class="berkaspemohonssyarat">Pemohon wajib mengupload dokumen persyaratan sesuai dengan persyaratan berlaku</h6> 
                                <h6 class="pemohons">Data Pemohon</h6>
                                <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>">
                                <input type="hidden" name="id_transaksi" value="<?php echo generatekode();?>">
                                <input type="hidden" name="id_sewa" value="<?php echo generatekode();?>">
                                <input type="hidden" name="id_makam" value="<?=$id_makam?>">
                                <input type="hidden" name="verif_bayar" value="wait">
                                <input type="hidden" name="tipe" value="lahan">
                                <input type="hidden" name="blok" value="<?=$blok?>">
                                <input type="hidden" name="jumlah" value="<?=$jumlah?>">
                                <input type="hidden" name="jam" value="<?=$jam?>">
                                <input type="hidden" name="verif" value="wait">
                                <input type="hidden" name="paid" value="wait">
                                <input type="hidden" name="total" value="<?=$totalin_harga?>">

                                         
                                <div class="form-group" id="formsewa">
                                  <label for="formGroupExampleInput" class="namapemohon">Nama Pemohon</label>
                                  <input type="text" name="nama" class="form-control" id="labelsewatanah" placeholder="Nama Lengkap" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="alamatpemohon">Alamat Pemohon</label>
                                    <textarea class="form-control" name="alamat" id="labelarea" rows="3" required="" placeholder="Alamat"></textarea>
                                  </div>

                                <div class="form-group">
                                  <label for="formGroupExampleInput2" class="nohp">No Telp/ Hp </label>
                                  <input type="number" name="telp" class="form-control" id="telpsewa" placeholder="628XX-XXXX-XXXX" required="">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput2" class="catatan">Email</label>
                                    <input type="email" name="email" class="form-control" id="catatansewa" placeholder="email@email.com" required="">
                                  </div>
                                    
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="alamatpemohons">Catatan</label>
                                    <textarea class="form-control" name="catatan" id="labelarea" rows="3" placeholder="*Catatan" required=""></textarea>
                                  </div>
                                    
                                  <div class="input-group mb-3">
                                      <h6 class="materai"><span class="mat">*</span> Surat Permohonan Bermaterai</h6>
                                    <div class="input-group-append">
                                        <input type="file" name="gbr_smb[]" multiple value="Upload" class="input-group" id="surat1" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                    <div class="rowsewa">

                                        <div class="input-group mb-3">
                                            <h6 class="materai1"><span class="mat">*</span> Identitas Pemohon/Penanggung Jawab [KK dan KTP]</h6>
                                          <div class="input-group-append">
                                              <input type="file" name="gbr_kk_ktp[]" multiple value="Upload" class="input-group" id="surat2" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                          <div class="rowsewa1">

                                            <div class="input-group mb-3">
                                                <h6 class="materai2"> &nbsp;Surat Kuasa</h6>
                                              <div class="input-group-append">
                                                  <input type="file" name="gbr_sk[]" multiple value="Upload" class="input-group" id="surat3" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                              <div class="rowsewa2">

                                                <div class="input-group mb-3">
                                                    <h6 class="materai3"><span class="mat">*</span> KTP dan Kartu Keluarga [KK] Jenazah (Fotokopi)</h6>
                                                  <div class="input-group-append">
                                                      <input type="file" name="gbr_kk_ktp_jenazah[]" multiple value="Upload" class="input-group" id="surat4" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                                  <div class="rowsewa3">

                                                    
                                                <div class="input-group mb-3">
                                                    <h6 class="materai4" style="font-size: 0.85rem;"><span class="mat">*</span> Surat Keterangan Kematian [Puskesmas/Rumah Sakit] (Fotokopi)</h6>
                                                  <div class="input-group-append">
                                                      <input type="file" name="gbr_sk_instansi[]" multiple value="Upload" class="input-group" id="surat5" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                                  <div class="rowsewa4">

                                                    <div class="input-group mb-3">
                                                        <h6 class="materai5" style="font-size: 0.85rem;"><span class="mat">*</span> Surat Keterangan Kematian [Kelurahan Setempat] (Fotokopi)</h6>
                                                      <div class="input-group-append">
                                                          <input type="file" name="gbr_sk_lokal[]" multiple value="Upload" class="input-group" id="surat6" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                                      <div class="rowsewa5">

                                                        <div class="input-group mb-3">
                                                            <h6 class="materai6"><span class="mat">*</span> Surat Pengantar dari TPU (asli)</h6>
                                                          <div class="input-group-append">
                                                              <input type="file" name="gbr_sp[]" multiple value="Upload" class="input-group" id="surat7" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required="">
                                                          <div class="rowsewa6">
                                                        <input type="submit" name="submit" id="button" value="Kirim">
                              </form>
                              <?php
                              }
                              ?>

                                        <!-- POPUP -->
                                        <div id="popup">
                                            <div class="window">
                                                <h1 class="berhasils"><?php if ($verifsewa=="wait") {echo "Data Berhasil Terinput!";} else {echo "Data Gagal Terinput!";}?></h1>
                                               <a href="../../../bayar/" class="close-button" title="Close"><span class="ok">OK</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                  </div>




     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="../../../bs5/dist/js/bootstrap.bundle.js"></script>
     <script src="../../../js/onscroll.js"></script>
     <script src="../../../js/main.js"></script>
 
 
   </body>
 </html>










