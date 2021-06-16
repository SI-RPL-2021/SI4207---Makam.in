<?php
error_reporting(0);
include_once("../../../../assets/connection.php");
session_start();
if ($_SESSION['status']=="admin") {

}elseif ($_SESSION['status']=="user") {
header("Location: ../../../../user/");
}else{
header("Location: ../../../../login/"); 
}
$id_sewa = $_GET['id'];
$id_user = $_GET['user'];
$view = mysqli_query($mysqli, "SELECT * FROM penyewa_jasa WHERE id_sewa = '$id_sewa' AND id_user='$id_user'");
while ($view = mysqli_fetch_array($view)) {
  $verifs = $view['verif'];
  $id_makams = $view['id_makam'];
  $nama_makams = $view['nama_makam'];
  $bloks = $view['blok'];
  $nama_nisans = $view['nama_nisan'];
  $namas = $view['nama'];
  $telps = $view['telp'];
  $emails = $view['email'];
  $jumlahs = $view['jumlah'];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../../../../bs5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../../css/navbar.css">
    <link rel="stylesheet" href="../../../../css/body.css">
    <link rel="stylesheet" href="../../../../css/responsive.css">
    <link rel="stylesheet" href="../../../../css/sewajasa.css">   
    <link rel="stylesheet" href="../../../../css/identitasktp.css"> 
    <link rel="icon" href="../../../../assets/logonisan.png">
    <title>Makam.in</title>
  </head>
  <body>
     
    <!-- konten -->
    <a href="../" style="margin-left: 18%;"><button type="button" id="btn-primaryktp" class="btn btn-primary"><p class="back">Back</p></button></a>
    <div class="container">
    <div class="auth">
         <div class="container" style="margin-left: 10%;">
            <div class="row">
                    <div class="col-md-7 col-lg-5">
                              <h5 class="card-titlesewaktp">
                              <?php 
                              if ($verifs=="yes") {
                                echo "Verifikasi Berkas <p style='color:rgb(45, 209, 39);'>[Terverifikasi]</p>";
                              }elseif ($verifs=="no") {
                                echo "Verifikasi Berkas <p style='color:red;'>[Ditolak]</p>";
                              } else {
                                echo "Verifikasi Berkas";
                              }
                              ?>
                              </h5>

                              <form action="../../../../assets/jasa-verifikasi-proses/index.php" method="post">
                              <input type="hidden" name="id_user" value="<?=$id_user?>">
                              <input type="hidden" name="id_sewa" value="<?=$id_sewa?>">
                              <table border="0">
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Email</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Telepon</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" class="form-control" name="email" id="labelsewatanah" placeholder="Email" required="" value="<?=$emails?>" disabled></td>
                                  <td><input type="number" class="form-control" name="telp" id="labelsewatanah" placeholder="Telepon" required="" value="<?=$telps?>" disabled></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Nama Pemohon</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Nama Nisan</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nik" class="form-control" id="labelsewatanah" placeholder="317XXXXXXXXXXXXX" required="" value="<?=$namas?>" disabled></td>
                                  <td><input type="text" name="negara" list="negara" name="negara" class="form-control" id="labelsewatanah" placeholder="Kewarganegaraan" required="" value="<?=$nama_nisans?>" disabled></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Nama Makam</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Blok</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nama" class="form-control" id="labelsewatanah" placeholder="Nama Lengkap" required="" value="<?=$nama_makams?>" disabled></td>
                                  <td><select name="blok" class="form-control" id="labelsewatanah" placeholder="Jenis Kelamin" required="" disabled>
                                    <option value="<?=$bloks?>" selected><?=$bloks?></option>
                                  </select></td>
                                </tr>
                                <tr>
                                  <td colspan="2"><center><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Jumlah</label></td>
                                </center></tr>
                                <tr>
                                  <td colspan="2"><center><input type="text" name="tempat_lahir" class="form-control" id="labelsewatanah" placeholder="Tempat Lahir" required="" value="<?=$jumlahs?>" disabled></center></td>
                                <tr>
                                  <td><input type="submit" name="tolak" class="form-control" id="labelsewatanah" style="background-color: red;color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;" value="TOLAK"></td>
                                  <td><input type="submit" name="verif" class="form-control" id="labelsewatanah" style="background-color: rgb(45, 209, 39);color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;" value="VERIFIKASI"></td>
                                </tr>
                              </table>
                              </form>

                              <!-- POPUP -->
                              <div id="popup">
                                  <div class="window">
                                      <h1 class="berhasils" style="position: static;top: 0;margin-top: 40px;right: 0;text-align: center;"><?php if ($verifs=="yes") {echo "Berhasil Terverifikasi!";} else {echo "Verifikasi Tertolak!";}?></h1>
                                     <a href="../" class="close-button" title="Close"><span class="ok">OK</span></a>
                                  </div>
                              </div>
                      </div>
                </div>
            </div>
        </div>
    </div>


     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="../../../../bs5/dist/js/bootstrap.bundle.js"></script>
     <script src="../../../../js/onscroll.js"></script>
     <script src="../../../../js/main.js"></script>
    <?php
    
    ?>
 
   </body>
 </html>










