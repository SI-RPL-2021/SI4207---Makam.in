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
        <div class="dropdown">
            <!-- dropdown 1 -->
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Persyaratan
                
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                  </svg>
            </button>

            <!-- dropdown 2 -->
            <button class="btn btn-secondary dropdown-toggles" type="button" id="dropdownMenuButton" data-bs-toggle="dropdowns" aria-expanded="false">
                Mekanisme Pelayanan
                
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                  </svg>
            </button>

            <!-- dropdown 3 -->
            <button class="btn btn-secondary dropdown-toggless" type="button" id="dropdownMenuButton" data-bs-toggle="dropdowns" aria-expanded="false">
                Biaya
                
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                  </svg>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a class="dropdown-item" href="#"><h6>Persyaratan Izin Penggunaan Tanah Makam (Makam Baru/Perpanjangan/Tumpangan)</h6>
                <h6 class="syarat">1. Surat permohonan yang di dalamnya terdapat pernyataan kebenaran dan keabsahan dokumen & data di atas kertas bermaterai (sesuai dengan peraturan<br>
                yang berlaku)</h6>
                <h6 class="syarat">2. Identitas Pemohon/Penanggungjawab<br>
                    a. WNI : Kartu Tanda Penduduk (KTP) dan Kartu Keluarga (KK) (Fotokopi)<br>
                    b. WNA : Kartu Izin Tinggal Terbatas (KITAS) atau VISA / Paspor (Fotokopi)
                </h6>
                <h6 class="syarat">3. Jika dikuasakan<br>
                    Surat kuasa di atas kertas bermaterai (sesuai dengan peraturan yang berlaku) dan KTP orang yang diberi kuasa
                </h6>
                <h6 class="syarat">
                    4. Kartu Tanda Penduduk (KTP) dan Kartu Keluarga (KK) jenazah (Fotokopi)
                </h6>
                <h6 class="syarat">
                    5. Surat Keterangan Kematian dari Puskesmas/Rumah Sakit (Fotokopi)
                </h6>
                <h6 class="syarat">
                    6. Surat Keterangan laporan kematian dari Kelurahan setempat (Fotokopi)
                </h6>
                <h6 class="syarat">
                    7. Surat Pengantar dari TPU
                </h6>
                <h6 class="syarat">
                    8. Izin Penggunaan Tanah Makam terdahulu (Asli, Jika Perpanjangan), (Fotokopi, Jika Tumpang)
                </h6>
                <br>
                <h6 class="syarat">
                    Keterangan Persyaratan :<br>
                    * Baru : 1-7<br>
                    * Perpanjangan : No. 1-3, 7-8<br>
                    * Tumpangan : No, 1-8
                </h6>
            </a></li>
            </ul>
          </div>

        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../js/onscroll.js"></script>
    



  </body>
</html>