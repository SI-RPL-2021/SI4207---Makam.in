<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bs5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/styleform.css">
    <link rel="stylesheet" href="css/verifikasi.css">
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
                        <a class="nav-link activepage link-navbar tebel-sedang " href="#">Home &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="#">Verifikasi &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="#">Selamat Datang, <span method="post" name="user" class="users">Reza</span> &nbsp;&nbsp;</a>
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
                    <img src="./assets/admin.png" class="img float-left" >
                </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="top-0 end-0">
                        <img src="./assets/chart.png" class="imageadmin" >
                    </div>
                    <div class="top-0 end-0">
                        <img src="./assets/berkas.png" class="imageadmin1" >
                    </div>
                    <div class="tulisan">
                        <h1 class="tulis">Berkas Dokumen<br>User</h1>
                        <h1 class="tulis1">Cek Laporan</h1>
                    </div>
                    <a href="./user_verifikasi.html"><type="submit" class="btn btn-primary" id="buttonsadmins">Lihat</button></a> 
                    <a href="./grafiklaporan.html"><type="submit" class="btn btn-primary" id="buttonsadmins1">Lihat</button></a> 
                
            </div>

        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="js/onscroll.js"></script>

  </body>
</html>