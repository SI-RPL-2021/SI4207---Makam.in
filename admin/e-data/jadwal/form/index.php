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
$id_jadwal = $_GET['id'];
$view = mysqli_query($mysqli, "SELECT * FROM jadwal_pemakaman WHERE id_jadwal = '$id_jadwal'");
while ($view = mysqli_fetch_array($view)) {
  $id_makams = $view['id_makam'];
  $bloks = $view['blok'];
  $jams = $view['jam'];
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
                              if (isset($id_jadwal)) {?>
                                Rubah Data Jadwal Pemakaman
                                <?php
                              } else {?>
                                Tambah Data Jadwal Pemakaman
                                <?php
                              }
                              ?>
                              </h5>

                              <!-- jika id_jadwal is kosong -->
                              <?php
                              if (!isset($id_jadwal)) {
                              ?>
                              <form action="../../../../assets/jadwal-proses/index.php" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_jadwal" value="<?=$id_jadwal?>">
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
                                  <td><select type="text" name="blok" class="form-control" id="labelsewatanah" placeholder="Blok" required="">
                                    <?php
                                    $makam_stok = mysqli_query($mysqli, "SELECT * FROM makam_stok");
                                    while ($mm = mysqli_fetch_array($makam_stok)) {
                                    ?>  
                                    <option value="<?=$mm['blok']?>"><?=$mm['blok']?></option>
                                    <?php
                                    }
                                    ?>
                                  </select></td>
                                </tr>
                                <tr>
                                  <td colspan="2"><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span>Jam Pemakaman [Durasi Jam]</label></td>
                                  <!-- <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span>Stok</label></td> -->
                                </tr>
                                <tr>
                                  <td><input type="time" name="jampertama" class="form-control" id="labelsewatanah" placeholder="Jam Pemakaman" required=""></td>
                                  <td><input type="time" name="jamkedua" class="form-control" id="labelsewatanah" placeholder="Jam Pemakaman" required=""></td>
                                </tr>
                                <tr><td><input type="submit" name="submit" class="form-control" id="labelsewatanah" style="margin-left: 50%;background-color: rgb(45, 209, 39);color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;" value="TAMBAH"></td></tr>
                              </table>
                              </form>

                              <!-- jika id_jadwal is ada -->
                              <?php
                              } elseif(isset($id_jadwal)) {
                              ?> 
                              <form action="../../../../assets/jadwal-proses/index.php" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_jadwal" value="<?=$id_jadwal?>">
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
                                    $makams = mysqli_query($mysqli, "SELECT * FROM makam WHERE id_makam='$id_makams'");
                                    while ($mm = mysqli_fetch_array($makams)) {
                                    ?>
                                    <option value="<?=$mm['id_makam']?>" selected hidden><?=$mm['nama']?></option>
                                    <?php
                                    }
                                    ?>
                                  </select></td>
                                  <td><select type="text" name="blok" class="form-control" id="labelsewatanah" placeholder="Blok" required="">
                                    <?php
                                    $makam_stok = mysqli_query($mysqli, "SELECT * FROM makam_stok");
                                    while ($s = mysqli_fetch_array($makam_stok)) {
                                    ?>  
                                    <option value="<?=$s['blok']?>"><?=$s['blok']?></option>
                                    <?php
                                    }
                                    $makam_stoks = mysqli_query($mysqli, "SELECT * FROM makam_stok WHERE blok='$bloks'");
                                    while ($ss = mysqli_fetch_array($makam_stoks)) {
                                    ?>  
                                    <option value="<?=$ss['blok']?>" selected hidden><?=$ss['blok']?></option>
                                    <?php
                                    }
                                    ?>
                                  </select></td>
                                </tr>
                                <tr>
                                  <td colspan="2"><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span>Jam Pemakaman [Durasi Jam]</label></td>
                                  <!-- <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span>Stok</label></td> -->
                                </tr>
                                <tr>
                                  <td><input type="time" name="jampertama" class="form-control" id="labelsewatanah" placeholder="Jam Pemakaman" required=""></td>
                                  <td><input type="time" name="jamkedua" class="form-control" id="labelsewatanah" placeholder="Jam Pemakaman" required=""></td>
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
                                     <a href="#" class="close-button" title="Close"><span class="ok">OK</span></a>
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










