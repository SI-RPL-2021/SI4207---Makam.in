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
$id_transaksi = $_GET['transaksi'];
$transaksi = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
while ($t = mysqli_fetch_array($transaksi)) {
  $transaksi_verif = $t['verif'];
  $transaksi_tgl_verif = $t['tgl_verif'];
  $transaksi_waktu_verif = $t['waktu_verif'];
  $transaksi_paid = $t['paid'];
  $transaksi_paid_tgl = $t['paid_tgl'];
  $transaksi_paid_waktu = $t['paid_waktu'];
  $transaksi_tipe = $t['tipe'];
  $transaksi_nama = $t['nama'];
  $id_sewa = $t['id_sewa'];
}
if ($transaksi_tipe=="lahan") {
  $penyewa_makam = mysqli_query($mysqli, "SELECT * FROM penyewa_makam WHERE id_sewa='$id_sewa'");
  while ($a = mysqli_fetch_array($penyewa_makam)) {
    $penyewa_makam_verif = $a['verif'];
    $penyewa_makam_tgl_verif = $a['tgl_verif'];
    $penyewa_makam_waktu_verif = $a['waktu_verif'];
    $tgl_input = $a['tgl_input'];
    $waktu_input = $a['waktu_input'];
    $jumlahs = $a['jumlah'];
    $id_makam = $a['id_makam'];
    $blok = $a['blok']; 
    $jam = $a['jam'];
  }
}
if ($transaksi_tipe=="jasa") {
  $penyewa_jasa = mysqli_query($mysqli, "SELECT * FROM penyewa_jasa WHERE id_sewa='$id_sewa'");
  while ($b = mysqli_fetch_array($penyewa_jasa)) {
    $penyewa_jasa_verif = $b['verif'];
    $penyewa_jasa_tgl_verif = $b['tgl_verif'];
    $penyewa_jasa_waktu_verif = $b['waktu_verif'];
    $tgl_input = $b['tgl_input'];
    $waktu_input = $b['waktu_input'];
    $jumlahs = $b['jumlah']; 
    $id_makam = $b['id_makam'];
    $blok = $b['blok'];
  }
}
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
  $user_tgl_verif = $view['tgl_verif'];
  $user_waktu_verif = $view['waktu_verif'];
}
if($tgl_input!=""){
  $section = 1;
  if($transaksi_paid=="yes"){
    $section = 2;
    if($transaksi_tipe=="lahan"){
      if($penyewa_makam_verif=="yes"){
        $section = 3;
        if($transaksi_verif=="yes"){
          $section = 5;
        }
      }
    } elseif($transaksi_tipe=="jasa"){
      if($penyewa_jasa_verif=="yes"){
        $section = 3;
        if($transaksi_verif=="yes"){
          $section = 5;
        }
      }
    }
  }
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
    <link rel="stylesheet" href="../css/tracking.css">
    <link rel="stylesheet" href="../css/masuk_admin.css">
    <link rel="stylesheet" href="../css/identitasktp.css">
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
       

    <a href="../tracking/" style="margin-left: 11%;"><button type="button" id="btn-primaryktp" class="btn btn-primary" style="margin-top: 10%;"><p class="back">Back</p></button></a>
    <center><img src="../assets/tracking.png" class="logotracking" style="margin-top: 0; margin-left: 0;"><br><h6><?=$id_transaksi?> | <?=$transaksi_nama?></h6></center>
    <br> 
    <div class="process-wrapper">
    <div id="progress-bar-container">
    	<ul>
    		<li class="step step01 active"><div class="step-inner" style="top: 50%;"><a class="verif">Input Data & Dokumen</div></a></li>
    		<li class="step step02 <?php if($transaksi_paid=="yes"){echo "active";}else{echo "";}?>"><div class="step-inner" style="top: 50%;"><a class="verif">Pembayaran</div></a></li>
        <li class="step step03 <?php if($transaksi_paid=="yes"){if($transaksi_tipe=="lahan"){if($penyewa_makam_verif=="yes"){echo "active";}else{echo"";}}if($transaksi_tipe=="jasa"){if($penyewa_jasa_verif=="yes"){echo "active";}else{echo "";}}}?>"><div class="step-inner" style="top: 50%;"><a class="verif">Verifikasi Berkas <?php if($transaksi_tipe=="lahan"){if($penyewa_makam_verif=="no"){?><span style="color: red;">[Ditolak]</span><?php }}elseif($transaksi_tipe=="jasa"){if($penyewa_jasa_verif=="no"){?><span style="color: red;">[Ditolak]</span><?php }}?></div></a></li>
    		<li class="step step04 <?php if($transaksi_paid=="yes"){if($transaksi_tipe=="lahan"){if($penyewa_makam_verif=="yes"){if($transaksi_verif=="yes"){echo "active";}}}elseif($transaksi_tipe=="jasa"){if($penyewa_jasa_verif=="yes"){if($transaksi_verif=="yes"){echo "active";}}}}?>"><div class="step-inner" style="top: 50%;"><a class="verif">Verifikasi Pembayaran <?php if($transaksi_verif=="no"){?><span style="color: red;">[Ditolak]</span><?php }?></div></a></li>
    		<li class="step step05 <?php if($transaksi_paid=="yes"){if($transaksi_tipe=="lahan"){if($penyewa_makam_verif=="yes"){if($transaksi_verif=="yes"){echo "active";}}}elseif($transaksi_tipe=="jasa"){if($penyewa_jasa_verif=="yes"){if($transaksi_verif=="yes"){echo "active";}}}}?>"><div class="step-inner" style="top: 50%;"><a class="verif"><?php if($transaksi_paid=="yes"){if($transaksi_tipe=="lahan"){if($penyewa_makam_verif=="yes"){if($transaksi_verif=="yes"){echo "Selesai";}else{echo "Belum Selesai";}}else{echo "Belum Selesai";}}elseif($transaksi_tipe=="jasa"){if($penyewa_jasa_verif=="yes"){if($transaksi_verif=="yes"){echo "Selesai";}else{echo "Belum Selesai";}}else{echo "Belum Selesai";}}else{echo "Belum Selesai";}}else{echo "Belum Selesai";}?></div></a></li>
    	</ul>
    	
    	<div id="line">
    		<div id="line-progress"></div>
    	</div>
    </div>

    <div id="progress-content-section">

    	<div class="section-content discovery <?php if($section==1){echo "active";}?>">
    		<h2>Input Data & Dokumen</h2>
            <h6><?=$user_tgl_verif?></h6>
    		<p>Input Data & Dokumen telah berhasil dilakukan pada <?=$tgl_input?> pukul <?=$waktu_input?></p>
    </div>
  	<div class="section-content creative <?php if($section==2){echo "active";}?>">
  		<h2><?php if($transaksi_paid=="yes"){echo "Pembayaran";}else{echo "Menunggu Pembayaran...";}?></h2>
          <h6><?php if($transaksi_paid=="yes"){echo $transaksi_paid_tgl;}else{echo "";}?></h6>
  		<p><?php if($transaksi_paid=="yes"){echo "Transaksi telah berhasil dibayar pada ".$transaksi_paid_tgl." pukul ".$transaksi_paid_waktu;}else{echo "";}?></p>
    </div>

    <div class="section-content strategy <?php if($section==3){echo "active";}?>">
      <h2><?php if($transaksi_tipe=="lahan"){if($penyewa_makam_verif=="yes"){echo "Verifikasi Berkas";}elseif($penyewa_makam_verif=="no"){echo "Verifikasi Berkas Ditolak";}else{echo "Menunggu Proses Verifikasi Berkas...";}}elseif($transaksi_tipe=="jasa"){if($penyewa_jasa_verif=="yes"){echo "Verifikasi Berkas";}elseif($penyewa_jasa_verif=="no"){echo "Verifikasi Berkas Ditolak";}else{echo "Menunggu Proses Verifikasi Berkas...";}}?></h2>
          <h6><?php if($transaksi_tipe=="lahan"){if($penyewa_makam_verif=="yes"){echo $penyewa_makam_tgl_verif;}elseif($penyewa_makam_verif=="no"){echo "<a href='../sewa/lahan/data/?id=".$id_sewa."&id_makam=".$id_makam."&blok=".$blok."&jumlah=".$jumlahs."&jam=".$jam."'>Ajukan Ulang Berkas</a>";}else{echo "";}}elseif($transaksi_tipe=="jasa"){if($penyewa_jasa_verif=="yes"){echo $penyewa_jasa_tgl_verif;}elseif($penyewa_jasa_verif=="no"){echo "<a href='../sewa/jasa/data/?sewa=".$id_sewa."'>Ajukan Ulang Berkas</a>";}else{echo "";}}?></h6>
      <p><?php if($transaksi_tipe=="lahan"){if($penyewa_makam_verif=="yes"){echo "Berkas telah berhasil diverifikasi pada ".$penyewa_makam_tgl_verif." pukul ".$penyewa_makam_waktu_verif;}elseif($penyewa_makam_verif=="no"){echo "";}else{echo "";}}elseif($transaksi_tipe=="jasa"){if($penyewa_jasa_verif=="yes"){echo "Berkas telah berhasil diverifikasi pada ".$penyewa_jasa_tgl_verif." pukul ".$penyewa_jasa_waktu_verif;}elseif($penyewa_jasa_verif=="no"){echo "";}else{echo "";}}?></p>
    </div>
  	
  	<div class="section-content production <?php if($section==4){echo "active";}?>">
  		<h2><?php if($transaksi_verif=="yes"){echo "Verifikasi Pembayaran";}elseif($transaksi_verif=="no"){echo "Verifikasi Pembayaran Ditolak";}else{echo "Menunggu Proses Verifikasi Pembayaran...";}?></h2>
          <h6><?php if($transaksi_verif=="yes"){echo $transaksi_tgl_verif;}elseif($transaksi_verif=="no"){echo "<a href='../bayar/invoice/?transaksi=".$id_transaksi."'>Ajukan Ulang Resi Pembayaran</a>";}else{echo "";}?></h6>
  		<p><?php if($transaksi_verif=="yes"){echo "Verifikasi Pembayaran telah berhasil dilakukan pada ".$transaksi_tgl_verif." pukul ".$transaksi_waktu_verif;}elseif($transaksi_verif=="no"){echo "";}?></p>
  	</div>
  	
  	<div class="section-content analysis <?php if($section==5){echo "active";}?>">
  		<h2><?php if($transaksi_paid=="yes"){if($transaksi_tipe=="lahan"){if($penyewa_makam_verif=="yes"){if($transaksi_verif=="yes"){echo "Selesai";}else{echo "Belum Selesai";}}else{echo "Belum Selesai";}}elseif($transaksi_tipe=="jasa"){if($penyewa_jasa_verif=="yes"){if($transaksi_verif=="yes"){echo "Selesai";}else{echo "Belum Selesai";}}else{echo "Belum Selesai";}}else{echo "Belum Selesai";}}else{echo "Belum Selesai";}?></h2>
          <h6><?php if($transaksi_paid=="yes"){if($transaksi_tipe=="lahan"){if($penyewa_makam_verif=="yes"){if($transaksi_verif=="yes"){echo $transaksi_tgl_verif;}else{echo "";}}else{echo "";}}elseif($transaksi_tipe=="jasa"){if($penyewa_jasa_verif=="yes"){if($transaksi_verif=="yes"){echo $transaksi_tgl_verif;}else{echo "";}}else{echo "";}}else{echo "";}}else{echo "";}?></h6>
  		<p><?php if($transaksi_paid=="yes"){if($transaksi_tipe=="lahan"){if($penyewa_makam_verif=="yes"){if($transaksi_verif=="yes"){echo "Terimakasih telah menggunakan layanan Makam.in!<br>Produk dalam Transaksi ini dapat digunakan sejak tanggal ".$transaksi_tgl_verif." pukul ".$transaksi_waktu_verif;}else{echo "";}}else{echo "";}}elseif($transaksi_tipe=="jasa"){if($penyewa_jasa_verif=="yes"){if($transaksi_verif=="yes"){echo "Terimakasih telah menggunakan layanan Makam.in!<br>Produk dalam Transaksi ini dapat digunakan sejak tanggal ".$transaksi_tgl_verif." pukul ".$transaksi_waktu_verif;}else{echo "";}}else{echo "";}}else{echo "";}}else{echo "";}?></p>
  	</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    
    $(".step").click( function() {
	$(this).prevAll();
	$(this).nextAll();
});


$(".step01").click( function() {
	$(".discovery").addClass("active").siblings().removeClass("active");
});

$(".step02").click( function() {
	$(".creative").addClass("active").siblings().removeClass("active");
});

$(".step03").click( function() {
	$(".strategy").addClass("active").siblings().removeClass("active");
});

$(".step04").click( function() {
	$(".production").addClass("active").siblings().removeClass("active");
});

$(".step05").click( function() {
	$(".analysis").addClass("active").siblings().removeClass("active");
});


<?php
if ($section==2) {?>
  $("#line-progress").css("width", "25%");
  <?php
}
if ($section==3) {?>
  $("#line-progress").css("width", "50%");
  <?php
}
if ($section==5) {?>
  $("#line-progress").css("width", "100%");
  <?php
}
?>
</script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../js/onscroll.js"></script>

  </body>
</html>