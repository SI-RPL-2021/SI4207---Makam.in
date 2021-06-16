<?php
error_reporting(0);
include_once("../assets/connection.php");
session_start();
$id_user = $_SESSION['id_user'];
$view = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user = '$id_user'");
while ($view = mysqli_fetch_array($view)) {
  $namas = $view['nama'];
  $niks = $view['nik'];
  $tempat_lahirs = $view['tempat_lahir'];
  $tanggal_lahirs = $view['tanggal_lahir'];
  $kawins = $view['kawin'];
  $alamats = $view['alamat'];
  $negaras = $view['negara'];
  $genders = $view['gender'];
  $agamas = $view['agama'];
  $pekerjaans = $view['pekerjaan'];
  $verifs = $view['verif'];
  $emails = $view['email'];
  $telps = $view['telp'];
  $passwords = $view['password'];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../bs5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/body.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/styleform.css">
    <?php
    if (isset($_SESSION['id_user'])) {
    ?>
    <link rel="stylesheet" href="../css/masuk_admin.css">
    <?php
    }
    ?>
    <link rel="icon" href="../assets/logonisan.png">
    <title>Makam.in</title>
  </head>
  <body>
    
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-3 fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="../">
                <img src="../assets/logo.png" height="40px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang " href="../">Home &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="../login/">Sewa &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../login/">Perpanjang &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../login/">Bayar &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../login/">Tracking &nbsp;&nbsp;</a>
                    </li>
                    <?php
                    if (isset($_SESSION['id_user'])) {
                    ?>
                    <div class="dropdown">
                        <button class="dropbtn">Selamat Datang, <span method="post" name="user" class="users"><?php if ($verifs=="yes"){echo($namas);}else{echo($_SESSION['email']);} ?></span>
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16" id="logout">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                              </svg>
                            <a href="../user/e-identitas/"><span class="lgt">Rubah Profile</span></a>
                            <a href="../assets/logout-proses/"><span class="lgt">Logout</span></a>
                        </div>
                    </div> 
                    <?php
                    } else {
                    ?>
                    <li class="nav-item">
                        <a href="../register/" class="nav-link bg-custom rounded-pill tebel-sedang shadow" id="btn-sign1">Daftar</a>
                    </li>
                    &nbsp;&nbsp;
                    <li class="nav-item">
                        <a href="../login/" class="nav-link bg-custom rounded-pill tebel-sedang shadow" id="btn-sign">Masuk</a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>

            </div>
        </div>
    </nav>

    <!-- konten -->
    <div class="container">
        <table width="80%" style="margin: 0;">
            <div class="dropdown">
                <!-- dropdown 1 -->
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%; position: static;margin: 0;margin-top: 15%;">
                    Persyaratan
                    
                      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                      </svg>
                </button>
                <ul class="dropdown-menu" role="menu" style="width: 100%;">
                    <li>
                        <div class="container">
                        <a href="#" style="max-width: 100%;background-color: rgb(193, 241, 190);font-family: 'Quicksand', sans-serif;font-weight: bolder;color: black;text-decoration: none;">
                            <h6 class="syarat">
                                Persyaratan Izin Penggunaan Tanah Makam (Makam Baru/Perpanjangan/Tumpangan) :
                               <br><br>
                                1. Surat permohonan yang di dalamnya terdapat pernyataan kebenaran dan keabsahan dokumen & data di atas kertas bermaterai (sesuai dengan peraturan yang berlaku)
                                <br><br>
                                2. Identitas Pemohon/Penanggungjawab :
                                <br>
                                a. WNI : Kartu Tanda Penduduk (KTP) dan Kartu Keluarga (KK) (Fotokopi)
                                <br>
                                b. WNA : Kartu Izin Tinggal Terbatas (KITAS) atau VISA / Paspor (Fotokopi)
                                <br><br>
                                3. Jika dikuasakan Surat kuasa di atas kertas bermaterai (sesuai dengan peraturan yang berlaku) dan KTP orang yang diberi kuasa
                                <br><br>
                                4. Kartu Tanda Penduduk (KTP) dan Kartu Keluarga (KK) jenazah (Fotokopi)
                                <br><br>
                                5. Surat Keterangan Kematian dari Puskesmas/Rumah Sakit (Fotokopi)
                                <br><br>
                                6. Surat Keterangan laporan kematian dari Kelurahan setempat (Fotokopi)
                                <br><br>
                                7. Surat Pengantar dari TPU
                                <br><br>
                                8. Izin Penggunaan Tanah Makam terdahulu (Asli, Jika Perpanjangan), (Fotokopi, Jika Tumpang)
                                <br><br>
                                Keterangan Persyaratan :
                                <br>
                                * Baru : 1-7<br>
                                * Perpanjangan : No. 1-3, 7-8<br>
                                * Tumpangan : No, 1-8
                            </h6>
                        </a>
                        </div>
                    </li>
                </ul>
            </div>
        </table>

        <table width="80%" style="margin: 0;">
            <div class="dropdown">
                <!-- dropdown 1 -->
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%; position: static;margin: 0;margin-top: 2%;">
                    Mekanisme Pelayanan
                    
                      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                      </svg>
                </button>
                <ul class="dropdown-menu" role="menu" style="width: 100%;">
                    <li>
                        <div class="container">
                        <a href="#" style="max-width: 100%;background-color: rgb(193, 241, 190);font-family: 'Quicksand', sans-serif;font-weight: bolder;color: black;text-decoration: none;">
                            <h6 class="syarat">
                                1. Memeriksa kelengkapan dan keaslian data/berkas sesuai persyaratan administrasi. jika berkas dinyatakan lengkap dan benar secara administrasi, maka dilanjutkan ketahap berikutnya (memberikan tanda terima berkas kepada pemohon). Jika berkas dinyatakan tidak lengkap dan benar, maka berkas dikembalikan ke pemohon.
                               <br><br>
                                2. Mencetak dan membubuhkan paraf SKRD
                                <br><br>
                                3. Menandatangani SKRD
                                <br><br>
                                4. Memberikan nomor dan stempel basah SKRD
                                <br><br>
                                5. Menerima SKRD untuk diserahkan kepada pemohon
                                <br><br>
                                6. Menerima dan menyerahkan tanda bukti pembayaran SKRD yang sudah di validasi Kasda
                                <br><br>
                                7. Memeriksa tanda bukti pembayaran SKRD yang sudah di validasi Kasda, mencetak dan membubuhkan paraf pada Surat Izin
                                <br><br>
                                8. Penandatanganan Surat Izin
                                <br><br>
                                9. Memberikan nomor dan stempel Surat Izin serta mengarsipkan salinan surat Izin dan berkas data pemohon
                                <br><br>
                                10. Menerima Surat Izin yang sudah ditandatangani pejabat, diberi nomor dan stempel basah. Menghubungi pemohon untuk pengambilan Surat Izin dan mencatat ke dalam buku besar
                            </h6>
                        </a>
                        </div>
                    </li>
                </ul>
            </div>
        </table>

        <table width="80%" style="margin: 0;">
            <div class="dropdown">
                <!-- dropdown 1 -->
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%; position: static;margin: 0;margin-top: 2%;">
                    Biaya
                    
                      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                      </svg>
                </button>
                <ul class="dropdown-menu" role="menu" style="width: 100%;">
                    <li>
                        <div class="container">
                            <a href="#" style="max-width: 100%;background-color: rgb(193, 241, 190);font-family: 'Quicksand', sans-serif;font-weight: bolder;color: black;text-decoration: none;">
                                <h6 class="syarat">
                                    Sewa tanah makam untuk jangka waktu 3 (tiga) tahun :
                                    <br><br>
                                </h6>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="syarat">Blok AA.I</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <h6 class="syarat">: Rp. 100.000,-</h6>
                                    </div>
                                    <br>
                                    <div class="col-sm-2">
                                        <h6 class="syarat">Blok AA.II</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <h6 class="syarat">: Rp. 80.000,-</h6>
                                    </div>
                                    <br>
                                    <div class="col-sm-2">
                                        <h6 class="syarat">Blok A.I</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <h6 class="syarat">: Rp. 60.000,-</h6>
                                    </div>
                                    <br>
                                    <div class="col-sm-2">
                                        <h6 class="syarat">Blok A.II</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <h6 class="syarat">: Rp. 40.000,-</h6>
                                    </div>
                                    <br>
                                    <div class="col-sm-2">
                                        <h6 class="syarat">Blok A.III</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <h6 class="syarat">: Rp. 0,-</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </table>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../js/onscroll.js"></script>
  </body>
</html>