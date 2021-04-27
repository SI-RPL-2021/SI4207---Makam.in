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
        echo "<script>";
        echo "alert('Username atau Password salah!')";
        echo "</script>";
    } elseif ($_GET['msg']=="sukses") {
        echo '<script>';
        echo 'alert("Sukses membuat akun baru, Silahkan login untuk melengkapi identitas :)")';
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
    <link rel="stylesheet" href="../css/styleform.css">
    <link rel="stylesheet" href="../css/styleadmin.css">
    <link rel="icon" href="../assets/logonisan.png">
    <title>Makam.in</title>
  </head>
  <body>
    <!-- konten -->
    <div class="container"><br><br>
            <image src="../assets/login.png" class="imagelogin">
    <a href="../"><img src="../assets/logo.png" class="logoset"></a>
    </div>
    <a href="../"><type="submit" class="btn btn-primary" id="btnback2">Kembali</button></a>
    <div class="rows">
    <h4 class="sewalahan">Sewa lahan makam mudah<br>hanya di Makam.in</h4>
    <h6 class="gabung">Gabung dan nikmati kemudahan mengurus <br>izin lahan makam</h6>
    </div>
        <div class="auth">
             <div class="container">
                <div class="row">
                        <div class="col-md-7 col-lg-5">
                             <div class="card">
                                <div class="card-body">
            <form action="../assets/login-proses/index.php" method="post" onsubmit="return check()">
            <div class="mb-3">
            <h1 class="login">Masuk</h1>
            <h6 class="daftar">Belum punya akun?<a href="../register/" class="daftarmember"> Daftar</h6></a><br>
             <label for="exampleInputEmail1" class="form-label">Nomor Hp atau Email</label>
             <input type="text" name="user" class="form-control" id="exampleInputEmail1" required="">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                 <input type="password" name="password" class="form-control" id="exampleInputPassword1" required="">
            </div>
                <div class="row">
                    <div class="col-6 text-left">
                        <div class="form-group form-check ml-2">
                        <input type="checkbox" name="rememberme" class="form-check-input" id="checks" value="ya" checked="">
                            <label class="form-check-label" for="exampleCheck1"> &nbsp;Ingat saya</label>
                            <h6><a href="#" class="sandi">Lupa kata sandi?</a></h6>
                        <input type="submit" name="submit" class="btn btn-primary" id="buttons" value="Masuk">
                        <h6><a href="../login-admin/" class="admins">Masuk sebagai admin</a></h6>
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