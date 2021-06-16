<?php
error_reporting(0);
include_once("../assets/connection.php");
session_start();
if ($_SESSION['status']=="admin") {
header("Location: ../admin/");
}elseif ($_SESSION['status']=="user") {

}else{
header("Location: ../login/"); 
}
if ($_SESSION['verif']=="yes") {

}elseif ($_SESSION['verif']=="no") {

}else{
header("Location: ../login/"); 
}
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
$bank = mysqli_query($mysqli, "SELECT * FROM bank");
$invoice = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_user='$id_user'");
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
    <link rel="stylesheet" href="../css/sewa.css">
    <link rel="stylesheet" href="../css/tagihan.css">
    <link rel="stylesheet" href="../css/masuk_admin.css">
    
    <link rel="icon" href="../assets/logonisan.png">
    <title>Makam.in</title>
  </head>
  <body>
      <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-3 fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
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
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="../sewa/">Sewa &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../renew/">Perpanjang &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../bayar/">Bayar &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="#">Tracking &nbsp;&nbsp;</a>
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
                          <a href="../user/e-identitas/"><span class="lgt">Rubah Profile</span></a>
                          <a href="../assets/logout-proses/"><span class="lgt">Logout</span></a>
                        </div>
                    </div> 
                </ul>

            </div>
        </div>
    </nav>
    <!-- konten -->
    <div class="container">
      <table border="1" width="100%" style="margin-top: 13%;">
        <tr>
            <th style="text-align: center;border: 1px solid black;">Tipe</th>
            <th style="border: 1px solid black;">Nama</th>
            <th style="text-align: center;border: 1px solid black;">Jumlah</th>
            <th colspan="2" style="text-align: center;border: 1px solid black;">Tindakan</th>
        </tr>
        <?php
        while ($view = mysqli_fetch_array($invoice)) {
        ?>
        <tr>
          <td style="text-align: center;border-right: 1px solid black;"><?=$view['tipe'];?></td>
          <td style="border-right: 1px solid black;">
          <?php
          echo $view['id_transaksi']." | ";
          if ($view['tipe']=="lahan") {
          echo $view['nama']." | ";
          $id_sewa = $view['id_sewa'];
          $sewa = mysqli_query($mysqli, "SELECT * FROM penyewa_makam WHERE id_sewa='$id_sewa' AND id_user='$id_user'");
          while ($s = mysqli_fetch_array($sewa)) {
            $id_makam = $s['id_makam'];
            $makam = mysqli_query($mysqli, "SELECT * FROM makam WHERE id_makam='$id_makam'");
            while ($m = mysqli_fetch_array($makam)) {
              echo $m['nama'];
            }
            echo " | Blok : ".$s['blok'];
            $jumlah = $s['jumlah'];
            $paket = mysqli_query($mysqli, "SELECT * FROM paket_sewa WHERE jumlah='$jumlah'");
            while ($p = mysqli_fetch_array($paket)) {
            echo " | Paket : ".$p['nama_paket'];
            }
          }
          }elseif($view['tipe']=="jasa"){ 
          $id_sewa = $view['id_sewa'];
          $jasa = mysqli_query($mysqli, "SELECT * FROM penyewa_jasa WHERE id_sewa='$id_sewa' AND id_user='$id_user'");
          while ($j = mysqli_fetch_array($jasa)) {
            $nama_nisan = $j['nama_nisan'];
            echo $nama_nisan." | ";
            $id_makam = $j['id_makam'];
            $makam = mysqli_query($mysqli, "SELECT * FROM makam WHERE id_makam='$id_makam'");
            while ($g = mysqli_fetch_array($makam)) {
              echo $g['nama'];
            }
            echo " | Blok : ".$j['blok'];
            $jumlah = $j['jumlah'];
            $paket = mysqli_query($mysqli, "SELECT * FROM paket_sewa WHERE jumlah='$jumlah'");
            while ($pkt = mysqli_fetch_array($paket)) {
            echo " | Paket : ".$pkt['nama_paket'];
            }
          }
          }
          ?>            
          </td>
          <td style="text-align: center;border-right: 1px solid black;"><?=$view['unit']?></td>
          <td style="text-align: center;"><a href="../stats/?transaksi=<?=$view['id_transaksi'];?>">Track</a></td>
          <td></td>
        </tr>
        <?php 
        }
        ?>
      </table>
    </div>
          

<!-- <div id="popup">
    <div class="window">
        <h1 class="berhasils">Upload Bukti Pembayaran</h1>
        <p class="contentbayar">Pastikan foto bukti pembayaran menampilkan : <br>
        - Tanggal dan waktu transfer<br>
        - Detail penerima transfer  <br>
        - Jumlah tagihan transfer <br>
        - Status (berhasil) <br>
        </p>
        <div class="imageups">
          <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16" id="imageicons">
            <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
            <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z"/>
          </svg>
          <button type="button" class="pilih" >Pilih File</button>
          <p class="milih">IMG_0671-2021</p>
        </div>
       <a href="./beranda_alert.html" class="close-button" title="Close"><span class="ok">Kirim</span></a>
    </div>
</div> -->
          
        
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../js/onscroll.js"></script>
    <script src="../js/main.js"></script>

    <script type="text/javascript">
    function bankPost() {
      var x = document.getElementById("bankInput").value;
      var y = document.getElementById("bankInput").value;
      document.getElementById("banktext").innerHTML = x;
      document.getElementById("banknomor").innerHTML = x;
      document.getElementById("banknama").innerHTML = y;
    }
    </script>
  </body>
</html>