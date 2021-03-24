<!DOCTYPE html>
<html>
<head>
	<title>Makam.in</title>
	<link rel="icon" href="../assets/img/icon.png" type="image/gif">
	<link rel="stylesheet" type="text/css" href="../assets/css/verifikasi.css">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/jquery/jquery-3.6.0.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
        .navbar-nav li{
            background-color: red
            margin-left:30px;
            margin-right:30px;
        }
    </style>
</head>
<body>
    <div class="container" style="font-family: 'Quicksand';font-weight: bold">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid" >
            <img src="../assets/img/icon.png" style="width: 30px">
            <a class="navbar-brand" href="#">Makam.in</a>
            <div class="collaps navbar-collapse justify-content-between">
                <ul class="navbar-nav me-auto">
                    
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="homeadmin.php" >Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="verifikasi.php" style="border-bottom: 2px solid ;border-bottom-color: #4CB051">Verifikasi</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="#" >Selamat Datang, <span style="color: #4CB051">Reza!</span></a>
                    </li>
                </ul>
            </div>
          </div>
        </nav>
    </div>
	<!-- <?php 
    $varKet = 'home';
    include('navbar_sglogin.php'); 
    ?> -->
	<div class="InfoSec" style="font-family: 'Quicksand'"> 
        <div class="container">
            <div class="InfoRow">
                <div class="InfoColumn">
                    <div class="ImgWrapper">
                        <img src="../assets/img/admin/homeadmin.png">
                    </div>
                </div>
                <div class="InfoColumn">
                    <div class="d-flex justify-content-around">
                    	<div class="ImgWrapperx">
	                        <img src="../assets/img/admin/berkas.png" style="height: 205px">
	                        <p class="Subtitlex" >Berkas Dokumen User</p>
	                        <button type="button" class="btn rounded-pill" style="background: #4CB051;color: white;width: 100%" onclick="window.location='verifikasi_dokumen.php'">Lihat</button>
	                    </div>
	                    <div class="ImgWrapperx">
	                        <img src="../assets/img/admin/laporan.png">
	                        <p class="Subtitlex">Cek Laporan</p>
	                        <button type="button" class="btn rounded-pill" style="background: #4CB051; color: white;width: 100%" onclick="window.location='verifikasi_laporan.php'">Lihat</button>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>