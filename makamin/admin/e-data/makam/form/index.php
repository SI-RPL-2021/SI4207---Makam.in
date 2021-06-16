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
$id_makam = $_GET['id'];
$view = mysqli_query($mysqli, "SELECT * FROM makam WHERE id_makam = '$id_makam'");
while ($view = mysqli_fetch_array($view)) {
  $namas = $view['nama'];
  $alamats = $view['alamat'];
  $kotas = $view['kota'];
  $kecamatans = $view['kecamatan'];
  $kode_poss = $view['kode_pos'];
  $gbr_nama = $view['gbr_nama'];
  $gbr    = explode('|', $gbr_nama);
  $cgbr   = count($gbr);
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
                              if (isset($id_makam)) {?>
                                Rubah Data Makam <br><p style="color: red;text-transform: uppercase;font-size: 14px;">[ Minimal 2 Gambar Yang Di input ]</p>
                                <?php
                              } else {?>
                                Tambah Data Makam <br><p style="color: red;text-transform: uppercase;font-size: 14px;">[ Minimal 2 Gambar Yang Di input ]</p>
                                <?php
                              }
                              ?>
                              </h5>

                              <!-- jika id_makam is kosong -->
                              <?php
                              if (!isset($id_makam)) {
                              ?>
                              <form action="../../../../assets/makam-proses/index.php" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_makam" value="<?=generatekode();?>">
                              <table border="0">
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Nama Makam</label>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Kota</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nama" class="form-control" id="labelsewatanah" placeholder="Nama Makam" required=""></td>
                                  <td><input type="text" name="kota" class="form-control" id="labelsewatanah" placeholder="Kota" required=""></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span>Alamat</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Kecamatan</label></td>
                                </tr>
                                <tr>
                                  <td><textarea class="form-control" name="alamat" id="labelsewatanah" rows="3" placeholder="Alamat" required=""></textarea></td>
                                  <td><input type="text" name="kecamatan" class="form-control" id="labelsewatanah" placeholder="Kecamatan" required=""></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Kode Pos</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Gambar Makam</label></td>
                                </tr>
                                <tr>
                                  <td><input type="number" class="form-control" name="kode_pos" id="labelsewatanah" placeholder="XXXXX" required=""></td>
                                  <td><input type="file" name="gbr_nama[]" multiple value="Upload" class="form-control" id="labelsewatanah" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" required=""></td>
                                </tr>
                                <tr><td><input type="submit" name="submit" class="form-control" id="labelsewatanah" style="margin-left: 50%;background-color: rgb(45, 209, 39);color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;" value="TAMBAH"></td></tr>
                              </table>
                              </form>

                              <!-- jika id_makam is ada -->
                              <?php
                              } elseif(isset($id_makam)) {
                              ?> 
                              <form action="../../../../assets/makam-proses/index.php" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_makam" value="<?=$id_makam?>">
                              <table border="0">
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Nama Makam</label>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Kota</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nama" class="form-control" id="labelsewatanah" placeholder="Nama Makam" required="" value="<?=$namas?>"></td>
                                  <td><input type="text" name="kota" class="form-control" id="labelsewatanah" placeholder="Kota" required="" value="<?=$kotas?>"></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span>Alamat</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Kecamatan</label></td>
                                </tr>
                                <tr>
                                  <td><textarea class="form-control" name="alamat" id="labelsewatanah" rows="3" placeholder="Alamat" required=""><?=$alamats?></textarea></td>
                                  <td><input type="text" name="kecamatan" class="form-control" id="labelsewatanah" placeholder="Kecamatan" required="" value="<?=$kecamatans?>"></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Kode Pos</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Gambar Makam</label></td>
                                </tr>
                                <tr>
                                  <td><input type="number" class="form-control" name="kode_pos" id="labelsewatanah" placeholder="XXXXX" required="" value="<?=$kode_poss?>"></td>
                                  <td><input type="file" name="gbr_nama[]" multiple value="Upload" class="form-control" id="labelsewatanah" accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG"></td>
                                </tr>
                                <tr>
                                  <td colspan="2"><center>
                                  <?php
                                  if ($gbr_nama=="") {
                                  
                                  } else {
                                    for ($i=0; $i <$cgbr ; $i++) { ?>
                                    <a href="../../../../source/makam/<?=$gbr[$i]?>" target="_blank">
                                    <img src="../../../../source/makam/<?=$gbr[$i]?>" alt="<?=$gbr_nama?>" style="height:50px;width: 50px;">
                                    </a>
                                    <?php 
                                    }
                                  }
                                  ?>
                                  </center></td>
                                </tr>
                                <tr><td><input type="submit" name="update" class="form-control" id="labelsewatanah" style="margin-left: 50%;background-color: rgb(45, 209, 39);color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;" value="SIMPAN"></td></tr>
                              </table>
                              </form>
                              <center>
                              <?php
                              }
                              ?>
                              </center>

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










