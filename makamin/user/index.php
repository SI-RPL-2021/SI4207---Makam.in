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

}elseif ($_SESSION['verif']=="wait") {

}elseif ($_SESSION['verif']=="new") {

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
    <link rel="stylesheet" href="../css/alertberanda.css">
    <link rel="stylesheet" href="../css/masuk_admin.css">
    <link rel="icon" href="../assets/logonisan.png">
    <title>Makam.in</title>
  </head>
  <body>

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
                        <a class="nav-link activepage link-navbar tebel-sedang " href="#">Home &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="<?php if ($verifs=="yes"){echo("../sewa/");}else{echo("e-identitas/");} ?>">Sewa &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="<?php if ($verifs=="yes"){echo("../renew/");}else{echo("e-identitas/");} ?>">Perpanjang &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="<?php if ($verifs=="yes"){echo("../bayar/");}else{echo("e-identitas/");} ?>">Bayar &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="<?php if ($verifs=="yes"){echo("../tracking/");}else{echo("e-identitas/");} ?>">Tracking &nbsp;&nbsp;</a>
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
                            <a href="e-identitas/"><span class="lgt">Rubah Profile</span></a>
                            <a href="../assets/logout-proses/"><span class="lgt">Logout</span></a>
                        </div>
                    </div> 
                </ul>

            </div>
        </div>
    </nav>

    <!-- konten -->
    <div class="container">
    <div class="alert alert-warning" role="alert" id="alertberanda" <?php if ($verifs=="yes") {
        echo "hidden";
    } else {
        echo "";
    } 
    ?>>
    <h3 class="sebelum">
    <?php 
    if ($verifs=="yes") {
    echo "";
    } elseif ($verifs=="new") {
    echo "Sebelum melakukan pendaftaran sewa/perpanjangan, harap mengisi identitas diri Anda terlebih dahulu.";
    } elseif ($verifs=="wait") {
    echo "Menunggu konfirmasi Admin, Harap bersabar dan tenang :)";
    } elseif ($verifs=="no") {
    echo "Verifikasi ditolak, silahkan masukkan identitas diri yang baru :)";
    } else {
    echo "Sebelum melakukan pendaftaran sewa/perpanjangan, harap mengisi identitas diri Anda terlebih dahulu.";
    }
    ?>
    <a href="<?php if ($verifs=="yes"){echo("#");}else{echo("e-identitas/");} ?>" class="klikaku"><?php if ($verifs=="yes"){echo("");}else{echo("Klik disini");} ?></a></h3></div>
    <br><br><br>

        <div class="row mt-5 mb-5">

            <div class="col-sm-12 position-relative p-4">

                <div class="top-0 end-0">
                    <img src="../assets/nisan.png" class="img float-left" >
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
                    <a href="../infolanjut/" class="button rounded-pill shadow tebel-sedang">Info Lebih Lanjut</a>
                </div>
            </div>

        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../js/onscroll.js"></script>
  </body>
</html>