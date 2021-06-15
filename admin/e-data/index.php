<?php
error_reporting(0);
include_once("../../assets/connection.php");
session_start();
if ($_SESSION['status']=="admin") {

}elseif ($_SESSION['status']=="user") {
header("Location: ../../user/");
}else{
header("Location: ../../login/"); 
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
    <link href="../../bs5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <link rel="stylesheet" href="../../css/styleform.css">
    <link rel="stylesheet" href="../../css/verifikasi.css">
    <link rel="stylesheet" href="../../css/grafik.css">
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
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="../verifikasi/">Verifikasi &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="#">Data Manager &nbsp;&nbsp;</a>
                    </li>
                    
                    <div class="dropdown">
                        <button class="dropbtn">Selamat Datang <span method="post" name="user" class="users"><?=$_SESSION['nama']?></span>
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16" id="logout">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                            </svg>
                            <a href="user/form/?id=<?=$_SESSION['id_user']?>"><span class="lgt">Rubah Profile</span></a>
                            <a href="../../assets/logout-proses/"><span class="lgt">Logout</span></a>
                        </div>
                      </div> 
                </ul>

            </div>
        </div>
    </nav>

    <!-- konten -->
    <div class="container">

        <br><br><br>
        <center>
        <table border="0" style="margin-top: 0;">
            <tr>
                <td><a href="user/" style="color: black;text-decoration: none;"><h2 class="ajuan1" style="margin:0;margin-left:40px;">User</h2></a></td>
                <td><a href="makam/" style="color: black;text-decoration: none;"><h2 class="ajuan1" style="margin:0;margin-left:40px;">Makam</a></td>
                <td><a href="paketsewa/" style="color: black;text-decoration: none;"><h2 class="ajuan1" style="margin:0;margin-left:40px;">Paket Sewa</a></td>
                <td><a href="bank" style="color: black;text-decoration: none;"><h2 class="ajuan1" style="margin:0;margin-left:40px;">Bank</a></td>
            </tr>
            <tr>
                <td><a href="user/"><center><img src="../../assets/chart.png" class="imageadmins" style="width: 134px; height: 95px;"></a></center></td>
                <td><a href="makam/"><center><img src="../../assets/chart.png" class="imageadmins" style="width: 134px; height: 95px;"></a></center></td>
                <td><a href="paketsewa/"><center><img src="../../assets/chart.png" class="imageadmins" style="width: 134px; height: 95px;"></a></center></td>
                <td><a href="bank/"><img src="../../assets/chart.png" class="imageadmins" style="width: 134px; height: 95px;"></a></center></td>
            </tr>
            <tr>
                <td colspan="2"><a href="blok/" style="color: black;text-decoration: none;"><h2 class="ajuan1" style="margin:0;margin-left:40px;margin-top: 15%;">Blok, Stok dan Harga Makam</a></td>
                <td colspan="2"><a href="jadwal/" style="color: black;text-decoration: none;"><h2 class="ajuan1" style="margin:0;margin-left:40px;margin-top: 15%;">Jadwal Pemakaman</a></td>
            </tr>
            <tr>
                <td colspan="2"><a href="blok/"><center><img src="../../assets/chart.png" class="imageadmins" style="width: 134px; height: 95px;"></center></a></td>
                <td colspan="2"><a href="jadwal/"><center><img src="../../assets/chart.png" class="imageadmins" style="width: 134px; height: 95px;"></center></a></td>
            </tr>
        </table>
        </center>
        <a href="../"><button class="btn btn-primary" id="btnback2" style="margin-top: 10%;">Back</button></a>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../../bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../../js/onscroll.js"></script>

  </body>
</html>