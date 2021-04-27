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
$id_user = $_SESSION['id_user'];
$view = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user = '$id_user'");
while ($view = mysqli_fetch_array($view)) {
  $namas = $view['nama'];
  $verifs = $view['verif'];
  $emails = $view['email'];
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
    <link rel="stylesheet" href="../../css/body.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <link rel="stylesheet" href="../../css/sewa.css">
    <link rel="stylesheet" href="../../css/pesan.css">
    <link rel="stylesheet" href="../../css/masuk_admin.css">
    <link rel="icon" href="../../assets/logonisan.png">
    <title>Makam.in</title>
  </head>
  <body>
      <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-35" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../../assets/logo.png" height="30px">
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
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../../track/">Tracking &nbsp;&nbsp;</a>
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
                          <a href="../../assets/logout-proses/"><span class="lgt">Logout</span></a>
                        </div>
                    </div> 
                </ul>

            </div>
        </div>
            
    </nav>
    <!-- Content -->
    <div class="container">
        <div class="row">
            <?php
            while ($makam = mysqli_fetch_array($SqlQuery)) {
                    $gbr_nama   = $makam['gbr_nama'];
                    $gbr        = explode('|', $gbr_nama);
                    $stoks      = $makam['id_makam'];
                    echo "<div class='profile-card'>";
                    echo "<div class='profile-content'>";
                    echo "<div class='profile-image'>";
                    echo "<img class='card-img-top' src='../../source/".$gbr[0]."' alt='Card image cap'>";
                    echo "</div>";
                    echo "<div class='card-title'>";
                    echo "<h6 class='tpu'>".$makam['nama']."</h6>";
                    echo "<p class='card-text'>".$makam['alamat']."<br></p>";
                    echo "<p class='alamat'>".$makam['kecamatan'].", ".$makam['kota'].", ".$makam['kode_pos']."</p>";
                    echo "</div>";
                    ?><h6 class='tersedia'><?php $stok = mysqli_query($mysqli,"SELECT AVG(stok) AS stok FROM `makam_stok` WHERE makam_stok.id_makam='$stoks'");if ($stok>=1){echo ('Tersedia');}else{echo ('Habis');}?></h6>
                    <?php echo "<div class='btn-div'>";
                    echo "<a href='blok/?id_makam=".$makam['id_makam']."' class='btn btn-primarys'>Pesan</a>";
                    echo "</div></div></div>";
                }
            ?>
        </div>
    </div>


    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../../bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../../js/onscroll.js"></script>

  </body>
</html>