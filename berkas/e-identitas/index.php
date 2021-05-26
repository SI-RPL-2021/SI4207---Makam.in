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
$id_user = $_GET['id'];
$view = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user = '$id_user'");
while ($view = mysqli_fetch_array($view)) {
  $namas = $view['nama'];
  $niks = $view['nik'];
  $tempat_lahirs = $view['tempat_lahir'];
  $tanggal_lahirs = $view['tanggal_lahir'];
  $kawins = $view['kawin'];
  $alamats = $view['alamat'];
  $negaras = $view['negara'];
  $genders = $view['gender'];
  $agamas = $view['agama'];
  $pekerjaans = $view['pekerjaan'];
  $verifs = $view['verif'];
  $emails = $view['email'];
  $telps = $view['telp'];
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
                                echo "Data Identitas Diri Pengguna <p style='color:rgb(45, 209, 39);'>[Terverifikasi]</p>";
                              } elseif($verifs=="no") {
                                echo "Verifikasi Identitas Diri Pengguna <p style='color:red;'>[Ditolak]</p>";
                              } else {
                                echo "Verifikasi Identitas Diri Pengguna";
                              }
                              ?>
                              </h5>

                              <form action="../../../../assets/e-identitas-verifikasi-proses/index.php" method="post">
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
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> NIK</label>
                                  <input type="hidden" name="id_user" value="<?=$id_user?>">
                                  <input type="hidden" name="verif" value="wait"></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Kewarganegaraan</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nik" class="form-control" id="labelsewatanah" placeholder="317XXXXXXXXXXXXX" required="" value="<?=$niks?>" disabled></td>
                                  <td><input type="text" name="negara" list="negara" name="negara" class="form-control" id="labelsewatanah" placeholder="Kewarganegaraan" required="" value="<?=$negaras?>" disabled></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Nama Lengkap</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Jenis Kelamin</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nama" class="form-control" id="labelsewatanah" placeholder="Nama Lengkap" required="" value="<?=$namas?>" disabled></td>
                                  <td><select name="gender" name="gender" class="form-control" id="labelsewatanah" placeholder="Jenis Kelamin" required="" disabled>
                                  <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                    <option value="<?=$genders?>"><?=$genders?></option>
                                  </select></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Tempat Lahir</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Tanggal Lahir</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="tempat_lahir" class="form-control" id="labelsewatanah" placeholder="Tempat Lahir" required="" value="<?=$tempat_lahirs?>" disabled></td>
                                  <td><input type="date" name="tanggal_lahir" class="form-control" id="labelsewatanah" required="" value="<?=$tanggal_lahirs?>" disabled></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Pekerjaan</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Agama</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="pekerjaan" class="form-control" id="labelsewatanah" placeholder="Pekerjaan" required="" value="<?=$pekerjaans?>" disabled></td>
                                  <td><select name="agama" class="form-control" id="labelsewatanah" placeholder="Agama" required="" value="<?=$agamas?>" disabled>
                                  <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Tionghoa">Tionghoa</option>
                                    <option value="<?=$agamas?>" selected><?=$agamas?></option>
                                  </select></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Alamat Lengkap</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Status Perkawinan</label></td>
                                </tr>
                                <tr>
                                  <td><textarea class="form-control" name="alamat" id="labelsewatanah" rows="3" placeholder="Alamat" required="" disabled=""><?=$alamats?></textarea></td>
                                  <td><select name="kawin" class="form-control" id="labelsewatanah" placeholder="Status Kawin" style="text-align: center;" required="" value="<?=$kawins?>" disabled>
                                  <option value="Kawin">Kawin</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                    <option value="<?=$kawins?>" selected><?=$kawins?></option>
                                  </select></td>
                                </tr>
                                <tr>
                                  <td><input type="submit" name="tolak" class="form-control" id="labelsewatanah" style="background-color: red;color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;" value="TOLAK"></td>
                                  <td><input type="submit" name="verif" class="form-control" id="labelsewatanah" style="background-color: rgb(45, 209, 39);color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;" value="VERIFIKASI"></td>
                                </tr>
                              </table>
                              </form>

                              <!-- POPUP -->
                              <div id="popup">
                                  <div class="window">
                                      <h1 class="berhasils" style="position: static;top: 0;margin-top: 40px;right: 0;text-align: center;"><?php if ($verifs=="yes") {echo "Berhasil Terverifikasi!";} elseif ($verifs=="no") {echo "Verifikasi Telah Ditolak!";}else{echo "Verifikasi Telah Ditolak!";}?></h1>
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










