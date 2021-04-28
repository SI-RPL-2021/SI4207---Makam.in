<?php
error_reporting(0);
include_once("../assets/connection.php");
session_start();
if ($_SESSION['status']=="admin") {
header("Location: ../admin/");
}elseif ($_SESSION['status']=="user") {
header("Location: ../user/");
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
    <link href="../bs5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/body.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/styleadmin.css">
    <link rel="icon" href="../assets/logonisan.png">
    <title>Makam.in</title>
  </head>
  <body>
    <!-- konten -->
    <div class="container"><br><br>
            <image src="../assets/admin.png" class="imageloginadmin">
    <a href="../"><img src="../assets/logo.png" class="logoset"></a>
    </div>
    <a href="../"><type="submit" class="btn btn-primary" id="btnback2">Kembali</button></a>
    <div class="rows">
    <h4 class="bantu">Bantu Mereka urus Sewa Lahan <br>Makam</h4>
    
    </div>
        <div class="auth">
             <div class="container">
                <div class="row">
                        <div class="col-md-7 col-lg-5">
                             <div class="card">
                                <div class="card-body">
            <form action="../assets/login-proses/index.php" method="post" onsubmit="return check()">
            <div class="mb-3">
            <h1 class="masuk">Masuk</h1>
            <h6 class="amin">Semoga sehat selalu,<a href="#" class="mins"> Min!</h6></a><br>
             <label for="exampleInputEmail1" class="form-label" id="usernames">Username</label>
             <input type="text" name="user" class="form-control" id="exampleInputEmail1" required="">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                 <input type="password" name="password" class="form-control" id="exampleInputPassword1" required="">
            </div>
            <input type="checkbox" name="rememberme" class="form-check-input" id="checks1" value="ya" checked="">
            <h6 class="ingats">Ingat saya <span class="lupas">Lupa kata sandi?</span></h6>
                        </div>
                <div class="row">
                    <div class="col-6 text-left">
                        <div class="form-group form-check ml-2">
                        <input type="submit" name="submit" class="btn btn-primary" id="buttonsdaftar" value="Masuk"> 
            </form>
             </div>
            </div>
            </div>

        </div>
        </div>
        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../js/onscroll.js"></script>

  </body>
</html>