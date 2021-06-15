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
        echo 'alert("Gagal reset password, Email/Nomor Telepon tidak cocok! :(")';
        echo '</script>';
    } elseif ($_GET['msg']=="sukses") {
        echo '<script>';
        echo 'alert("Sukses, Silahkan catat password barunya :)")';
        echo '</script>';
    }
}
$user = $_GET['user'];
$telp = $_GET['telp'];
$new = $_GET['new'];
if (isset($new)) {
    $user = mysqli_query($mysqli, "SELECT * FROM user WHERE email='$user' AND telp='$telp'");
    while ($u = mysqli_fetch_array($user)) {
        $email = $u['email'];
        $telp = $u['telp'];
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
        <table width="100%">
            <tr>
                <td><a href="../"><img src="../assets/logo.png" style="float: right;margin-left: 0;left: 80%;width: 200px;position: static;"></a>
                <td> <a href="../"><button class="btn btn-primary" id="btnback2" style="width: 150px;float: left;top: 7%;left: 4%;">Kembali</button></a></td>
            </tr>
        </table>
        <br><br>

        <form action="../assets/resetpassword-proses/" method="post">
        <input type="hidden" name="password" value="<?php echo generatekode();?>">
        <input type="hidden" name="status" value="user">
        <table width="45%" style="float: left;text-align: center;margin-left: 4%;border-collapse: initial;padding: 10px;border-radius: .25rem;border: 1px solid rgba(0,0,0,.125);box-shadow: 0px 3px 3px 0px grey;font-family: 'Quicksand', sans-serif;">
            <tr>
                <td colspan="2"><h1 class="login">Reset Password</h1></td>
            </tr>
            <tr>
                <td colspan="2"><h6 class="daftar">Belum Punya Akun?<a href="../register/" class="daftarmember" style="margin: 0;top: 0;left: 0; right: 0;position: static;transform: none;"> Daftar</h6></a><br></td>
            </tr>
            <tr>
                <td colspan="2"><label for="exampleInputEmail1" class="form-label" style="margin: 0;top: 0;left: 0; right: 0;position: static;transform: none;float: left;">Email</label></td>
            </tr>
            <tr>
                <td colspan="2"><input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="email@email.com" required="" style="margin: 0;top: 0;left: 0; right: 0;position: static;transform: none;width: 100%;" value="<?=$email?>"></td>
            </tr>
            <tr>
                <td colspan="2"><label for="exampleInputPassword1" class="form-label" style="margin: 0;top: 0;left: 0; right: 0;position: static;transform: none;float: left;">Nomor Telepon</label></td>
            </tr>
            <tr>
                <td colspan="2"><input type="number" name="telp" class="form-control" id="exampleInputTelp1" placeholder="628XX-XXXX-XXXX" required="" style="margin: 0;top: 0;left: 0; right: 0;position: static;transform: none;width: 100%;" value="<?=$telp?>"></td>
            </tr>
            <?php
            if (isset($new)) {?>
            <tr>
                <td colspan="2"><label for="exampleInputPassword1" class="form-label" style="margin: 0;top: 0;left: 0; right: 0;position: static;transform: none;float: left;">Kata Sandi Baru</label></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" class="form-control" id="exampleInputPassword1" placeholder="********" required="" style="margin: 0;top: 0;left: 0; right: 0;position: static;transform: none;width: 100%;" value="<?=$new?>"></td>
            </tr>
            <?php
            } else {
            ?>
            <tr>
                <td colspan="2"><input type="submit" name="submit" class="btn btn-primary" id="buttons" value="Reset" style="margin: 0;top: 0;left: 0; right: 0;position: static;transform: none;width: 100%; margin-top: 10%;"></td>
            </tr>
            <?php
            }
            ?>
        </table>
        </form>

        <table width="50%" style="float: right;text-align: center;">
            <tr>
                <td><image src="../assets/login.png" style="z-index: -2;width: 350px;position: static;margin-top: 6%;"></td>
            </tr>
            <tr>
                <td><h4 class="sewalahan" style="margin-top: 0;">Sewa lahan makam mudah<br>hanya di Makam.in</h4></td>
            </tr>
            <tr>
                <td><h6 class="gabung">Gabung dan nikmati kemudahan mengurus <br>izin lahan makam</h6></td>
            </tr>
        </table>
    </div>
    <br><br><br>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../js/onscroll.js"></script>

  </body>
</html>