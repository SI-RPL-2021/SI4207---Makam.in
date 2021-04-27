<?php
error_reporting(0);
include_once("../assets/connection.php");
session_start();
if ($_SESSION['status']=="admin") {
header("Location: admin/");
}elseif ($_SESSION['status']=="user") {
header("Location: user/");
}else{
    
}
if (isset($_GET['msg'])) {
    if ($_GET['msg']=="gagal") {
        echo '<script>';
        echo 'alert("Username atau Password salah!")';
        echo '</script>';
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bs5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/styleform.css">
    <link rel="icon" href="./assets/logonisan.png">
    <title>Makam.in</title>
  </head>
  <body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-3 fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/logo.png" height="40px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang " href="./">Home &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="login/">Sewa &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="login/">Perpanjang &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="login/">Bayar &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="login/">Tracking &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a href="register/" class="nav-link bg-custom rounded-pill tebel-sedang shadow" id="btn-sign1">Daftar</a>
                    </li>
                    &nbsp;&nbsp;
                    <li class="nav-item">
                        <a href="login/" class="nav-link bg-custom rounded-pill tebel-sedang shadow" id="btn-sign">Masuk</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- konten -->
    <div class="container">

        <br><br><br>

        <div class="row mt-5 mb-5">

            <div class="col-lg-12 gambar">
                <img src="./assets/nisan.png" width="100%">
            </div>

            <div class="col-sm-12 position-relative p-4">

                <div class="top-0 end-0">
                    <img src="./assets/nisan.png" class="img float-left" >
                </div>
                    <br>
                    <br>
                    <br>
                    <br>
                
                    <h1 class="text-truncate tebel-sedang judul1">Urus izin dan sewa<br>
                lahan makam jadi<br>
                lebih mudah<br>
                <div class="hr"></div>
                

                <div class="desc mt-4">
                    <p>Sewa hingga perpanjang makam dapat langsung <br>didaftarkan secara online tanpa harus<br>
                        bolak-balik</p>
                </div>

                <div class="mt-5">
                    <a href="infolanjut/" class="button rounded-pill shadow tebel-sedang">Info Lebih Lanjut</a>
                </div>
            </div>

        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="js/onscroll.js"></script>

  </body>
</html>