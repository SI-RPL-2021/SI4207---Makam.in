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
  $status = $view['status'];
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
                              if (isset($id_user)) {
                                echo "Rubah Data Identitas Diri Pengguna";
                              } else {
                                echo "Tambah Data Identitas Diri Pengguna";
                              }
                              ?>
                              </h5>

                              <!-- jika id_user is kosong -->
                              <?php
                              if (!isset($id_user)) {
                              ?>
                              <form action="../../../../assets/user-proses/index.php" method="post">
                              <input type="hidden" name="id_user" value="<?=generatekode();?>">
                              <input type="hidden" name="verif" value="yes"></td>
                              <table border="0">
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> NIK</label>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Kewarganegaraan</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nik" class="form-control" id="labelsewatanah" placeholder="317XXXXXXXXXXXXX" required=""></td>
                                  <td><input type="text" name="negara" class="form-control" id="labelsewatanah" placeholder="Kewarganegaraan" required=""></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Nama Lengkap</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Jenis Kelamin</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nama" class="form-control" id="labelsewatanah" placeholder="Nama Lengkap" required=""></td>
                                  <td><select name="gender" class="form-control" id="labelsewatanah" placeholder="Jenis Kelamin" required="">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                  </select></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Tempat Lahir</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Tanggal Lahir</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="tempat_lahir" class="form-control" id="labelsewatanah" placeholder="Tempat Lahir" required=""></td>
                                  <td><input type="date" name="tanggal_lahir" class="form-control" id="labelsewatanah" required=""></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Pekerjaan</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Agama</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="pekerjaan" class="form-control" id="labelsewatanah" placeholder="Pekerjaan" required=""></td>
                                  <td><select type="text" name="agama" class="form-control" id="labelsewatanah" placeholder="Agama" required="">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Tionghoa">Tionghoa</option>
                                  </select></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span>Alamat Lengkap</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Status Perkawinan</label></td>
                                </tr>
                                <tr>
                                  <td><textarea class="form-control" name="alamat" id="labelsewatanah" rows="3" placeholder="Alamat" required=""></textarea></td>
                                  <td><select name="kawin" class="form-control" id="labelsewatanah" placeholder="Status Kawin" style="text-align: center;" required="">
                                    <option value="Kawin">Kawin</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                  </select></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Email</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Telepon</label></td>
                                </tr>
                                <tr>
                                  <td><input type="email" class="form-control" name="email" id="labelsewatanah" placeholder="Email" required="" value="<?=$emails?>"></td>
                                  <td><input type="number" class="form-control" name="telp" id="labelsewatanah" placeholder="Telepon" required="" value="<?=$telps?>"></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Password</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Status</label></td>
                                </tr>
                                <tr>
                                  <td><input type="password" class="form-control" name="password" id="labelsewatanah" placeholder="Password" required=""></td>
                                  <td><select name="status" class="form-control" id="labelsewatanah" placeholder="Status Pengguna" required="">
                                    <option value="admin">admin</option>
                                    <option value="user">user</option>
                                  </select></td>
                                </tr>
                                <tr><td><input type="submit" name="submit" class="form-control" id="labelsewatanah" style="margin-left: 50%;background-color: rgb(45, 209, 39);color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;" value="TAMBAH"></td></tr>
                              </table>
                              </form>

                              <!-- jika id_user is ada -->
                              <?php
                              } elseif(isset($id_user)) {
                              ?> 
                              <form action="../../../../assets/user-proses/index.php" method="post">
                              <input type="hidden" name="id_user" value="<?=$id_user?>">
                              <input type="hidden" name="verif" value="yes"></td>
                              <table border="0">
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Email</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Telepon</label></td>
                                </tr>
                                <tr>
                                  <td><input type="email" class="form-control" name="email" id="labelsewatanah" placeholder="Email" required="" value="<?=$emails?>"></td>
                                  <td><input type="number" class="form-control" name="telp" id="labelsewatanah" placeholder="Telepon" required="" value="<?=$telps?>"></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> NIK</label>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Kewarganegaraan</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nik" class="form-control" id="labelsewatanah" placeholder="317XXXXXXXXXXXXX" required="" value="<?=$niks?>"></td>
                                  <td><input type="text" name="negara" list="negara" name="negara" class="form-control" id="labelsewatanah" placeholder="Kewarganegaraan" required="" value="<?=$negaras?>"></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Nama Lengkap</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Jenis Kelamin</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nama" class="form-control" id="labelsewatanah" placeholder="Nama Lengkap" required="" value="<?=$namas?>"></td>
                                  <td><select name="gender" class="form-control" id="labelsewatanah" placeholder="Jenis Kelamin" required="" value="<?=$genders?>">
                                  <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                  </select></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Tempat Lahir</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Tanggal Lahir</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="tempat_lahir" class="form-control" id="labelsewatanah" placeholder="Tempat Lahir" required="" value="<?=$tempat_lahirs?>"></td>
                                  <td><input type="date" name="tanggal_lahir" class="form-control" id="labelsewatanah" required="" value="<?=$tanggal_lahirs?>"></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Pekerjaan</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Agama</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="pekerjaan" class="form-control" id="labelsewatanah" placeholder="Pekerjaan" required="" value="<?=$pekerjaans?>"></td>
                                  <td><select name="agama" class="form-control" id="labelsewatanah" placeholder="Agama" required="" value="<?=$agamas?>">
                                  <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Tionghoa">Tionghoa</option>
                                    <option value="<?=$agamas?>" selected hidden><?=$agamas?></option>
                                  </select></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Alamat Lengkap</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Status Perkawinan</label></td>
                                </tr>
                                <tr>
                                  <td><textarea class="form-control" name="alamat" id="labelsewatanah" rows="3" placeholder="Alamat" required=""><?=$alamats?></textarea></td>
                                  <td><select name="kawin" class="form-control" id="labelsewatanah" placeholder="Status Kawin" style="text-align: center;" required="" value="<?=$kawins?>">
                                  <option value="Kawin">Kawin</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                    <option value="<?=$kawins?>" selected hidden><?=$kawins?></option>
                                  </select></td>
                                </tr>
                                <tr>
                                  <!-- <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Password Baru</label></td> -->
                                  <td colspan="2"><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Status</label></td>
                                </tr>
                                <tr>
                                  <!-- <td><input type="password" class="form-control" name="password" id="labelsewatanah" placeholder="Password"></td> -->
                                  <td colspan="2"><select name="status" class="form-control" id="labelsewatanah" placeholder="Status Pengguna" required="">
                                    <option value="admin">admin</option>
                                    <option value="user">user</option>
                                    <option value="<?=$status?>" selected hidden><?=$status?></option>
                                  </select></td>
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










