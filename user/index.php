<?php
error_reporting(0);
include_once("../../../assets/connection.php");
session_start();
if ($_SESSION['status']=="admin") {

}elseif ($_SESSION['status']=="user") {
header("Location: ../../../user/");
}else{
header("Location: ../../../login/"); 
}
if (isset($_GET['msg'])) {
    if ($_GET['msg']=="gagal") {
        echo '<script>';
        echo 'alert("Username atau Password salah!")';
        echo '</script>';
    }
}
$user = mysqli_query($mysqli, "SELECT * FROM user");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../../../bs5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/navbar.css">
    <link rel="stylesheet" href="../../../css/body.css">
    <link rel="stylesheet" href="../../../css/responsive.css">
    <link rel="stylesheet" href="../../../css/sewa.css">
    <link rel="stylesheet" href="../../../css/pesan.css">
    <link rel="stylesheet" href="../../../css/userverifikasi.css">
    <link rel="stylesheet" href="../../../css/masuk_admin.css">
    <link rel="stylesheet" href="../../../css/styleadmin.css">
    <link rel="stylesheet" href="../../../css/identitasktp.css"> 
    <link rel="icon" href="../../../assets/logonisan.png">
    <title>Makam.in</title>
  </head>
  <body>
      <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-35" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../../../assets/logo.png" height="30px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="position: sticky;transform: none;padding: 0;color: black;width: auto;height: auto;text-transform: none;top: 24px;left: 0; padding: .25rem .75rem;">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang " href="../../">Home &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="../../verifikasi/">Verifikasi &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="#">Data Manager &nbsp;&nbsp;</a>
                    </li>
                    <div class="dropdown">
                        <button class="dropbtn" style="position: static;transform: none;padding: 0;color: black;width: 100%;height: auto;text-transform: none;margin-top: 15px;left: 0;">Selamat Datang <span method="post" name="user" class="users"><?=$_SESSION['nama']?></span>
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16" id="logout">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                            </svg>
                            <a href="form/?id=<?=$_SESSION['id_user']?>"><span class="lgt">Rubah Profile</span></a>
                            <a href="../../../assets/logout-proses/"><span class="lgt">Logout</span></a>
                        </div>
                    </div>
                </ul>
            </div>
        </div>          
    </nav>

    <!-- Content -->
    <div class="container">
      <br><br><br><br>
      <center>
        <table>
          <tr>
            <td><img src="../../../assets/berkas.png" style="width: 60px;"></td>
            <td><h1 style="margin: 0;font-family: 'Quicksand', sans-serif;font-weight: bold;font-size: 16px;">Data User</h1></td>
          </tr>
        </table>
        <a href="form/"><button class="btn btn-primary" style="margin-top:-4%;position: static;float: right;transform: none;">Tambah Akun Baru</button></a>
        <a href="../"><button class="btn btn-primary" id="btnback2" style="margin-top:-4%;position: static;float: left;transform: none;">Back</button></a>
      </center>
        <div class="row" style="margin-top: 3%;width: 80%;">
            <?php
              while ($view = mysqli_fetch_array($user)) {
            ?>
            <div class="col-md-6" style="padding-bottom: 2%;padding-right: 337px;"> 
            <div class="profile-card" id="cardverif" style="height: auto;width: 405px;margin: auto;padding: initial;">
                <div class="profile-content">                
                  <table border="0" width="100%">                    
                    <tr>
                      <td colspan="2">
                        <div class="kotak">
                          <img src="../../../assets/user.png" class="userverifs">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <div class="card-title">
                          <h6 class="dadang max-card"><?=$view['nama']?></h6>
                          <h6 class="makams max-card">[<?=$view['status']?>]</h6>
                          <p class="datauser max-card"><?=$view['email']?>, <br> Verif: <?=$view['verif']?>, <?=$view['telp']?></p> 
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><center><a href="form/?id=<?=$view['id_user']?>" style="color: white;text-decoration: none;"><button onclick="togglePopup()" style="position: static;margin-left: 15%;top: 0;left: 0;transform: none;"><h6 class="verifusr">Edit</h6></button></a></center></td>
                      <td><a href="../../../assets/delete-user/?id=<?=$view['id_user']?>" style="color: white;text-decoration: none;float: left;"><button onclick="togglePopup()" style="position: static;margin-left: 5%;top: 0;left: 0;transform: none;"><h6 class="verifusr">Hapus</h6></button></a></td>
                    </tr>
                  </table>
                </div>
            </div>
            </div>
          <?php
            }
          ?>
        </div>
      </div>
                                                       
 <!-- popup -->
<div id="popup">
  <div class="window">
    <h1 class="berhasils">Data Berhasil Terhapus!</h1>
    <a href="#" class="close-button" title="Close"><span class="ok">OK</span></a>
  </div>
</div>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../../../bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../../..js/onscroll.js"></script>
    <script>
        function togglePopup(){
  document.getElementById("popup-1").classList.toggle("active");
  document.getElementById("popup-2").classList.toggle("active");
  document.getElementById("popup-3").classList.toggle("active");
  document.getElementById("popup-4").classList.toggle("active");
  document.getElementById("popup-5").classList.toggle("active");
  document.getElementById("popup-6").classList.toggle("active");
}
    </script>
  </body>
</html>