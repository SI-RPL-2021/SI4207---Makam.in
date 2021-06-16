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
$id_stok = $_GET['id'];
$view = mysqli_query($mysqli, "SELECT * FROM makam_stok WHERE id_stok = '$id_stok'");
while ($view = mysqli_fetch_array($view)) {
  $id_makam = $view['id_makam'];
  $bloks = $view['blok'];
  $hargas = $view['harga'];
  $stoks = $view['stok'];
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
                              if (isset($id_stok)) {?>
                                Rubah Data Blok & Harga Makam
                                <?php
                              } else {?>
                                Tambah Data Blok & Harga Makam
                                <?php
                              }
                              ?>
                              </h5>

                              <!-- jika id_stok is kosong -->
                              <?php
                              if (!isset($id_stok)) {
                              ?>
                              <form action="../../../../assets/blok-proses/index.php" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_stok" value="">
                              <table border="0">
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Makam</label>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Blok</label></td>
                                </tr>
                                <tr>
                                  <td><select name="id_makam" class="form-control" id="labelsewatanah" placeholder="Makam" required="">
                                    <?php
                                    $makam = mysqli_query($mysqli, "SELECT * FROM makam");
                                    while ($m = mysqli_fetch_array($makam)) {
                                    ?>  
                                    <option value="<?=$m['id_makam']?>"><?=$m['nama']?></option>
                                    <?php
                                    }
                                    ?>
                                  </select></td>
                                  <td><input type="text" name="blok" class="form-control" id="labelsewatanah" placeholder="Blok" required=""></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span>Harga</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span>Stok</label></td>
                                </tr>
                                <tr>
                                  <td><input type="number" name="harga" class="form-control" id="labelsewatanah" placeholder="Harga" required=""></td>
                                  <td><input type="number" name="stok" class="form-control" id="labelsewatanah" placeholder="Stok" required=""></td>
                                </tr>
                                <tr><td><input type="submit" name="submit" class="form-control" id="labelsewatanah" style="margin-left: 50%;background-color: rgb(45, 209, 39);color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;" value="TAMBAH"></td></tr>
                              </table>
                              </form>

                              <!-- jika id_stok is ada -->
                              <?php
                              } elseif(isset($id_stok)) {
                              ?> 
                              <form action="../../../../assets/blok-proses/index.php" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_stok" value="<?=$id_stok?>">
                              <table border="0">
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Makam</label>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Blok</label></td>
                                </tr>
                                <tr>
                                  <td><select name="id_makam" class="form-control" id="labelsewatanah" placeholder="Makam" required="">
                                    <?php
                                    $makam = mysqli_query($mysqli, "SELECT * FROM makam");
                                    while ($m = mysqli_fetch_array($makam)) {
                                    ?>  
                                    <option value="<?=$m['id_makam']?>"><?=$m['nama']?></option>
                                    <?php
                                    }
                                    $makams = mysqli_query($mysqli, "SELECT * FROM makam WHERE id_makam='$id_makam'");
                                    while ($ms = mysqli_fetch_array($makams)) {
                                    ?>
                                    <option value="<?=$ms['id_makam']?>" selected hidden><?=$ms['nama']?></option>
                                    <?php
                                    }
                                    ?>
                                  </select></td>
                                  <td><input type="text" name="blok" class="form-control" id="labelsewatanah" placeholder="Blok" required="" value="<?=$bloks?>"></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span>Harga</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span>Stok</label></td>
                                </tr>
                                <tr>
                                  <td><input type="number" name="harga" class="form-control" id="labelsewatanah" placeholder="Harga" required="" value="<?=$hargas?>"></td>
                                  <td><input type="number" name="stok" class="form-control" id="labelsewatanah" placeholder="Stok" required="" value="<?=$stoks?>"></td>
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










