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
        echo 'alert("Gagal membuat akun baru :(")';
        echo '</script>';
    } elseif ($_GET['msg']=="sukses") {
        echo '<script>';
        echo 'alert("Sukses membuat akun baru, Silahkan login untuk melengkapi identitas :)")';
        echo '</script>';
    }
}
function generatekode($length = 11) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
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
    <link rel="stylesheet" href="../css/styledaftar.css">
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
            <form action="../assets/regist-proses/index.php" method="post">
            <input type="hidden" name="id_user" value="<?php echo generatekode();?>">
            <div class="mb-3">
            <h1 class="login">Daftar Sekarang</h1>
            <h6 class="daftar">Sudah punya akun?<a href="../login/" class="daftarmember"> Masuk</h6></a><br>
             <label for="exampleInputEmail1" class="form-label">Email</label>
             <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="email@email.com" required="">
            </div>
            <div class="mb-3">
              <label for="exampleInputTelp1" class="form-label">Nomor Telepon</label>
                 <input type="number" name="telp" class="form-control" id="exampleInputTelp1" placeholder="628XX-XXXX-XXXX" required="">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                 <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="********" required="">
            </div>
            <input type="checkbox" name="rememberme" class="form-check-input" id="checks1" type="ya" required="">
            <h6 class="mendaftar">Dengan mendaftar, saya menyetujui <span class="syarat">
                        Syarat dan<br> Ketentuan</span> serta <span class="syarat">Kebijakan Privasi</span></h6>
                        </div>
                <div class="row">
                    <div class="col-6 text-left">
                        <div class="form-group form-check ml-2">
                        <input type="hidden" name="verif" value="no">
                        <input type="hidden" name="status" value="user">
                        <input type="submit" name="Submit" class="btn btn-primary" id="buttons" value="Daftar">
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