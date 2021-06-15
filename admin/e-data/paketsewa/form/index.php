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
$id_paket = $_GET['id'];
$view = mysqli_query($mysqli, "SELECT * FROM paket_sewa WHERE id_paket = '$id_paket'");
while ($view = mysqli_fetch_array($view)) {
  $nama_pakets = $view['nama_paket'];
  $deskripsis = $view['deskripsi'];
  $jumlahs = $view['jumlah'];
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
                              if (isset($id_paket)) {?>
                                Rubah Data Paket Sewa
                                <?php
                              } else {?>
                                Tambah Data Paket Sewa
                                <?php
                              }
                              ?>
                              </h5>

                              <!-- jika id_makam is kosong -->
                              <?php
                              if (!isset($id_paket)) {
                              ?>
                              <form action="../../../../assets/paket_sewa-proses/index.php" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_paket" value="<?=$id_paket?>">
                              <table border="0">
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Nama Paket</label>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Jumlah</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nama_paket" class="form-control" id="labelsewatanah" placeholder="Nama Paket" required=""></td>
                                  <td><input type="number" name="jumlah" class="form-control" id="labelsewatanah" placeholder="Jumlah" required=""></td>
                                </tr>
                                <tr>
                                  <td colspan="2"><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span>Deskripsi</label></td>
                                </tr>
                                <tr>
                                  <td colspan="2"><input type="text" name="deskripsi" class="form-control" id="labelsewatanah" placeholder="Deskripsi" required=""></td>
                                </tr>
                                <tr><td><input type="submit" name="submit" class="form-control" id="labelsewatanah" style="margin-left: 50%;background-color: rgb(45, 209, 39);color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;" value="TAMBAH"></td></tr>
                              </table>
                              </form>

                              <!-- jika id_makam is ada -->
                              <?php
                              } elseif(isset($id_paket)) {
                              ?> 
                              <form action="../../../../assets/paket_sewa-proses/index.php" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_paket" value="<?=$id_paket?>">
                              <table border="0">
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Nama Paket</label>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Jumlah</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nama_paket" class="form-control" id="labelsewatanah" placeholder="Nama Paket" required="" value="<?=$nama_pakets?>"></td>
                                  <td><input type="number" name="jumlah" class="form-control" id="labelsewatanah" placeholder="Jumlah" required="" value="<?=$jumlahs?>"></td>
                                </tr>
                                <tr>
                                  <td colspan="2"><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span>Deskripsi</label></td>
                                </tr>
                                <tr>
                                  <td colspan="2"><input type="text" name="deskripsi" class="form-control" id="labelsewatanah" placeholder="Deskripsi" required="" value="<?=$deskripsis?>"></td>
                                </tr>
                                <tr><td><input type="submit" name="update" class="form-control" id="labelsewatanah" style="margin-left: 50%;background-color: rgb(45, 209, 39);color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;" value="SIMPAN"></td></tr>
                              </table>
                              </form>
                              <?php
                              }
                              ?>

                              <!-- POPUP -->
                              <div id="popup">
                                  <div class="window">
                                      <h1 class="berhasils"><?php if ($verifs="wait") {echo "Data Berhasil Terinput!";} else {echo "Data Gagal Terinput!";}?></h1>
                                     <a href="../" class="close-button" title="Close"><span class="ok">OK</span></a>
                                  </div>
                              </div>
                      </div>
                </div>
            </div>
        </div>
    </div>


     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="../../../.../bs5/dist/js/bootstrap.bundle.js"></script>
     <script src="../../../../js/onscroll.js"></script>
     <script src="../../../../js/main.js"></script>
    <?php
    
    ?>
 
   </body>
 </html>










