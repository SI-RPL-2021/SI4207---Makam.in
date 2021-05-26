<?php
error_reporting(0);
include_once("../../assets/connection.php");
session_start();
if ($_SESSION['status']=="admin") {
header("Location: ../../admin/");
}elseif ($_SESSION['status']=="user") {

}else{
header("Location: ../../login/"); 
}
if ($_SESSION['verif']=="yes") {

}else{
header("Location: ../../login/"); 
}
$SqlQuery = mysqli_query($mysqli, "SELECT * FROM makam");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../../bs5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/body.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <link rel="stylesheet" href="../../css/sewajasa.css">
    <link rel="stylesheet" href="../../css/masuk_admin.css">
    <link rel="stylesheet" href="../../css/styleadmin.css">  
    <link rel="icon" href="../../assets/logonisan.png">
    <title>Makam.in</title>
  </head>
  <body>
      <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-3 fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../../assets/logo.png" height="40px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang " href="../../">Home &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="#">Sewa &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../../renew/">Perpanjang &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../../bayar/">Bayar &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../../tracking/">Tracking &nbsp;&nbsp;</a>
                    </li>
                    <div class="dropdown">
                        <button class="dropbtn">Selamat Datang, <span method="post" name="user" class="users" style="color: rgb(45, 209, 39);"><?php if ($verifs=="yes"){echo($namas);}else{echo($_SESSION['email']);} ?></span>
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16" id="logout">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                              </svg>
                          <a href="../../user/e-identitas/"><span class="lgt">Rubah Profile</span></a>
                          <a href="../../assets/logout-proses/"><span class="lgt">Logout</span></a>
                        </div>
                    </div> 
                </ul>
            </div>
        </div>
    </nav>
    <!-- konten -->
    <div class="container"><br><br>
        <a href="../"><button class="btn btn-primary" id="btnback2" style="margin-top: 10%;margin-left: 2%;">Back</button></a>
        <table width="55%" style="margin-top: 7%;float: left;text-align: center;margin-left: 0;border-collapse: initial;padding: 3%;border-radius: .25rem;border: 1px solid rgba(0,0,0,.125);box-shadow: 0px 3px 3px 0px grey;font-family: 'Quicksand', sans-serif;padding-bottom: 2%;">
            <tr>
                <td><h1 class="login">Sewa Jasa</h1></td>
            </tr>
            <tr>
                <td><div class="alert alert-warning" role="alert" id="sewajasaalert" style="margin: 0;top: 0;left: 0; right: 0;position: static;transform: none;width: 100%; margin-top: 0;"><p class="alerts1">Sewa Jasa untuk jangka waktu 1 bulan</p></div></td>
            </tr>
            <tr>
                <td>
                  <table width="100%" style="background-color: rgb(193, 241, 190);text-align: center;margin-left: 0;border-collapse: initial;border-radius: 10px;border: 1px solid rgba(0,0,0,.125);box-shadow: 0px 3px 3px 0px grey;font-family: 'Quicksand', sans-serif;padding-bottom: 5%;">
                    <tr>
                      <td><h5 class="card-title" id="kunjungans">Nikmati Kunjungan Makam<br> Lebih Nyaman</h5></td>
                    </tr>
                    <tr>
                      <td><p class="card-text" id="pelayananmakam">Dengan Pelayanan Petugas Kebersihan Kami, Anda Tidak Akan<br>Di Repotkan Lagi Dengan Masalah Perawatan Makam, Rumput,<br> Keamanan dan Biaya-Biaya Lainya</p></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="alert alert-warning" role="alert" id="hargaa" style="margin: 0;top: 0;left: 0; right: 0;position: static;transform: none;width: 100%; margin-top: 0;"><p class="alerts2">Hanya Rp.80.000.-/<span class="per">per orang</span></p></div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="data/" class="btn btn-primary" id="btnsewajasa" style="margin: 0;top: 0;left: 0; right: 0;position: static;transform: none;width: 100%; margin-top: 10%;">Sewa Jasa Sekarang</a></td>
                    </tr>
                  </table>
                </td>
            </tr>
        </table>

        <table width="40%" style="float: right;text-align: center;">
            <tr>
                <td><image src="../../assets/sewajasa.png" style="z-index: -2;width: 312px;position: static;margin-top: 40%;"></td>
            </tr>
        </table>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../../bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../../js/onscroll.js"></script>

  </body>
</html>