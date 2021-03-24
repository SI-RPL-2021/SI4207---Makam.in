<!DOCTYPE html>
<html>
<head>
	<title>Makam.in</title>
	<link rel="icon" href="../assets/img/icon.png" type="image/gif">
	<link rel="stylesheet" type="text/css" href="../assets/css/verifikasi_laporan.css">
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
    <style type='text/css'>.element,html{scrollbar-width:none}html::-webkit-scrollbar,.element::-webkit-scrollbar{display:none}</style>
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
	<div class="InfoSec" style="font-family: 'Quicksand';">
        <div class="container">
            <div class="d-flex justify-content-center">
				<p style="color: black;margin-top: 20px;font-weight: 700;font-size: 20px;">Grafik Laporan</p>
        	</div>
        </div>
    </div>
    <div class="InfoSec" style="font-family: 'Quicksand'"> 
        <div class="container">
            <div class="InfoRow" style="margin-top: 10vh">
                <div class="InfoColumn" align="center">
                    <p style="width: 250px;">Data Ajuan Permohonan Sewa Makam</p>
                    <img src="../assets/img/admin/g1.PNG">
                </div>    
                <div class="InfoColumn" align="center">
                    <p style="width: 250px">Data Ajuan Permohonan Perpanjang Lahan Makam</p>
                    <img src="../assets/img/admin/g2.PNG">
                </div>
                <div class="InfoColumn" align="center">
                    <p>Lama Verifikasi</p>
                    <img src="../assets/img/admin/g3.PNG">
                </div>
            </div>
        </div>
</body>
</html>