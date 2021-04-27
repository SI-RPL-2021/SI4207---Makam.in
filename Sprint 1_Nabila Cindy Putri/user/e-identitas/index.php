<?php
error_reporting(0);
include_once("../../assets/connection.php");
session_start();
if ($_SESSION['status']=="admin") {
header("Location: ../../admin/");
}elseif ($_SESSION['status']=="user") {

}else{
header("Location: ../../login/"); 
}
if ($_SESSION['verif']=="no") {

}elseif ($_SESSION['verif']=="yes") {

}elseif ($_SESSION['verif']=="wait") {

}else{
header("Location: ../../login/"); 
}
$id_user = $_SESSION['id_user'];
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
  $passwords = md5($view['password']);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../../bs5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/body.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <link rel="stylesheet" href="../../css/sewajasa.css">   
    <link rel="stylesheet" href="../../css/identitasktp.css"> 
    <link rel="icon" href="../../assets/logonisan.png">
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
                                echo "Rubah Data Identitas Diri Pengguna";
                              } elseif ($verifs=="no") {
                                echo "Data Identitas Diri Pengguna (Sesuai KTP)";
                              } elseif ($verifs=="wait") {
                                echo "Data Identitas Diri Pengguna (Sesuai KTP) <p style='color:#a8a8a9;'>[Menunggu Konfirmasi Admin]</p>";
                              } else {
                                echo "Data Identitas Diri Pengguna (Sesuai KTP)";
                              }
                              ?>
                              </h5>

                              <!-- jika status verif is no -->
                              <?php
                              if ($verifs=="no") {
                              ?>
                              <form action="../../assets/e-identitas-proses/index.php" method="post">
                              <table border="0">
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> NIK</label>
                                  <input type="hidden" name="id_user" value="<?=$id_user?>">
                                  <input type="hidden" name="verif" value="wait"></td>
                                  <input type="hidden" name="email" value="<?=$emails?>">
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Kewarganegaraan</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nik" class="form-control" id="labelsewatanah" placeholder="317XXXXXXXXXXXXX" required=""></td>
                                  <td><input type="text" name="negara" name="negara" class="form-control" id="labelsewatanah" placeholder="Kewarganegaraan" required=""></td>
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
                                  <td><input type="text" class="form-control" name="email" id="labelsewatanah" placeholder="Email" required="" value="<?=$emails?>"></td>
                                  <td><input type="number" class="form-control" name="telp" id="labelsewatanah" placeholder="Telepon" required="" value="<?=$telps?>"></td>
                                </tr>
                                <tr hidden="">
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Ganti Password Baru</label></td>
                                  <!-- <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Telepon</label></td> -->
                                </tr>
                                <tr hidden="">
                                  <td><input type="password" class="form-control" name="password" id="labelsewatanah" placeholder="Password" required="" disabled=""></td>
                                  <!-- <td><input type="number" class="form-control" name="telp" id="labelsewatanah" placeholder="Telepon" required="" disabled value="<?=$telps?>"></td> -->
                                </tr>
                                <tr><td><input type="submit" name="submit" class="form-control" id="labelsewatanah" style="margin-left: 50%;background-color: rgb(45, 209, 39);color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;" value="SIMPAN"></td></tr>
                              </table>
                              </form>

                              <!-- jika status verif is wait -->
                              <?php
                              } elseif($verifs=="wait") {
                              ?> 
                              <form action="../../assets/e-identitas-proses/index.php" method="post">
                              <table border="0">
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> NIK</label>
                                  <input type="hidden" name="id_user" value="<?=$id_user?>" disabled>
                                  <input type="hidden" name="verif" value="wait" disabled></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Kewarganegaraan</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nik" class="form-control" id="labelsewatanah" placeholder="317XXXXXXXXXXXXX" required="" value="<?=$niks?>" disabled></td>
                                  <td><input type="text" name="negara" list="negara" name="negara" class="form-control" id="labelsewatanah" placeholder="Kewarganegaraan" required="" value="<?=$negaras?>" disabled></td>
                                  <datalist id="negara">
                                    <option value="Indonesia"></option>
                                    <option value="USA"></option>
                                    <option value="Malaysia"></option>
                                  </datalist>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Nama Lengkap</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Jenis Kelamin</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" name="nama" class="form-control" id="labelsewatanah" placeholder="Nama Lengkap" required="" value="<?=$namas?>" disabled></td>
                                  <td><input type="text" name="gender" list="gender" name="gender" class="form-control" id="labelsewatanah" placeholder="Jenis Kelamin" required="" value="<?=$genders?>" disabled></td>
                                  <datalist id="gender">
                                    <option value="Pria"></option>
                                    <option value="Wanita"></option>
                                  </datalist>
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
                                  <td><input type="text" name="agama" list="agama" name="agama" class="form-control" id="labelsewatanah" placeholder="Agama" required="" value="<?=$agamas?>" disabled></td>
                                  <datalist id="agama">
                                    <option value="Islam"></option>
                                    <option value="Kristen"></option>
                                    <option value="Budha"></option>
                                    <option value="Hindu"></option>
                                    <option value="Tionghoa"></option>
                                  </datalist>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span>Alamat Lengkap</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Status Perkawinan</label></td>
                                </tr>
                                <tr>
                                  <td><textarea class="form-control" name="alamat" id="labelsewatanah" rows="3" placeholder="Alamat" required="" disabled><?=$alamats?></textarea></td>
                                  <td><input type="text" list="kawin" name="kawin" class="form-control" id="labelsewatanah" placeholder="Status Kawin" style="text-align: center;" required="" value="<?=$kawins?>" disabled></td>
                                  <datalist id="kawin">
                                    <option value="Kawin"></option>
                                    <option value="Belum Kawin"></option>
                                    <option value="Cerai Hidup"></option>
                                    <option value="Cerai Mati"></option>
                                  </datalist>
                                </tr>
                                <tr hidden="">
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Email</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Telepon</label></td>
                                </tr>
                                <tr hidden="">
                                  <td><input type="text" class="form-control" name="email" id="labelsewatanah" placeholder="Email" required="" disabled value="<?=$emails?>"></td>
                                  <td><input type="number" class="form-control" name="telp" id="labelsewatanah" placeholder="Telepon" required="" disabled value="<?=$telps?>"></td>
                                </tr>
                                <tr hidden="">
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Password</label></td>
                                  <!-- <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Telepon</label></td> -->
                                </tr>
                                <tr hidden="">
                                  <td><input type="password" class="form-control" name="password" id="labelsewatanah" placeholder="Password" required="" disabled="" value=""></td>
                                  <!-- <td><input type="number" class="form-control" name="telp" id="labelsewatanah" placeholder="Telepon" required="" disabled value="<?=$telps?>"></td> -->
                                </tr>
                                <tr><td><input type="submit" name="submit" class="form-control" id="labelsewatanah" style="margin-left: 50%;background-color: #e9ecef;color: black; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;" value="SIMPAN" disabled></td></tr>
                              </table>
                              </form>

                              <!-- jika status verif is yes -->
                              <?php
                              } elseif($verifs=="yes") {
                              ?> 
                              <form action="../../assets/e-identitas-proses/index.php" method="post">
                              <table border="0">
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Email</label></td>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Telepon</label></td>
                                </tr>
                                <tr>
                                  <td><input type="text" class="form-control" name="email" id="labelsewatanah" placeholder="Email" required="" value="<?=$emails?>"></td>
                                  <td><input type="number" class="form-control" name="telp" id="labelsewatanah" placeholder="Telepon" required="" value="<?=$telps?>"></td>
                                </tr>
                                <tr>
                                  <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> NIK</label>
                                  <input type="hidden" name="id_user" value="<?=$id_user?>">
                                  <input type="hidden" name="verif" value="wait"></td>
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
                                  <td><select name="gender" name="gender" class="form-control" id="labelsewatanah" placeholder="Jenis Kelamin" required="" value="<?=$genders?>">
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
                                  </select></td>
                                </tr>
                                <tr>
                                  <!-- <td><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Telepon</label></td> -->
                                  <td colspan="2"><label for="formGroupExampleInput" class="namapemohon"><span class="mat">*</span> Password Baru</label></td>
                                </tr>
                                <tr>
                                  <!-- <td><input type="number" class="form-control" name="telp" id="labelsewatanah" placeholder="Telepon" required="" value="<?=$telps?>"></td> -->
                                  <td colspan="2"><input type="password" class="form-control" name="password" id="labelsewatanah" placeholder="Password" required="" value=""></td>
                                </tr>
                                <tr><td><input type="submit" name="submit" class="form-control" id="labelsewatanah" style="margin-left: 50%;background-color: rgb(45, 209, 39);color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;" value="SIMPAN"></td></tr>
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
     <script src="../../bs5/dist/js/bootstrap.bundle.js"></script>
     <script src="../../js/onscroll.js"></script>
     <script src="../../js/main.js"></script>
    <?php
    
    ?>
 
   </body>
 </html>










