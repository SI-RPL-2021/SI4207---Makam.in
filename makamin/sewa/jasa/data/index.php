<?php
error_reporting(0);
include_once("../../../assets/connection.php");
session_start();
$id_user = $_SESSION['id_user'];
$view = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user = '$id_user'");
while ($view = mysqli_fetch_array($view)) {
  $namas = $view['nama'];
  $verifs = $view['verif'];
  $emails = $view['email'];
}
$id_makam = $_GET['id_makam'];
$blok = $_GET['blok'];
$jumlah = $_GET['jumlah'];
$id_sewa = $_GET['sewa'];
$satu_bulan = 30;
$tiga_tahun = 1095;
if (isset($id_sewa)) {
  $penyewa_jasa = mysqli_query($mysqli, "SELECT * FROM penyewa_jasa WHERE id_sewa='$id_sewa' AND id_user='$id_user'");
  $transaksi = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_sewa='$id_sewa' AND id_user='$id_user'");
}
while ($j = mysqli_fetch_array($penyewa_jasa)) {
  $sid_sewa = $j['id_sewa'];
  $sverif = $j['verif'];
  $snama_makam = $j['nama_makam'];
  $snama_nisan = $j['nama_nisan'];
  $snama = $j['nama'];
  $stelp = $j['telp'];
  $semail = $j['email'];
  $sjumlah = $j['jumlah'];
  $sblok = $j['blok'];
}

while ($transaksi = mysqli_fetch_array($transaksi)) {
  $id_transaksi = $transaksi['id_transaksi'];
}


$makam = mysqli_query($mysqli, "SELECT * FROM makam");
$total_harga = mysqli_query($mysqli, "SELECT * FROM makam_stok");
$paket_sewa = mysqli_query($mysqli, "SELECT * FROM paket_sewa");
$paket_sewas = mysqli_query($mysqli, "SELECT * FROM paket_sewa WHERE jumlah=$sjumlah");
$SqlQuery = mysqli_query($mysqli, "SELECT * FROM penyewa_makam");
while ($pkt = mysqli_fetch_array($paket_sewas)) {
    $snama_paket = $pkt['nama_paket'];
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
    <link href="../../../bs5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/navbar.css">
    <link rel="stylesheet" href="../../../css/body.css">
    <link rel="stylesheet" href="../../../css/responsive.css">
    <link rel="stylesheet" href="../../../css/sewajasa.css"> 
    <link rel="stylesheet" href="../../../css/lanjutansewajasa.css"> 
    <link rel="stylesheet" href="../../../css/masuk_admin.css">
    <link rel="stylesheet" href="../../../css/styleadmin.css">
    <link rel="stylesheet" href="../../../css/identitasktp.css">     
    <link rel="icon" href="../../../assets/logonisan.png">
    <title>Makam.in</title>
  </head>
  <body>
      <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-3 fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../../../assets/logo.png" height="40px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang " href="../../../">Home &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="#">Sewa &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../../../renew/">Perpanjang &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../../../bayar/">Bayar &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../../../track/">Tracking &nbsp;&nbsp;</a>
                    </li>
                    <div class="dropdown">
                        <button class="dropbtn">Selamat Datang, <span method="post" name="user" class="users" style="color: rgb(45, 209, 39);"><?php if ($verifs=="yes"){echo($namas);}else{echo($_SESSION['email']);} ?></span>
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16" id="logout">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                              </svg>
                          <a href="../../../user/e-identitas/"><span class="lgt">Rubah Profile</span></a>
                          <a href="../../../assets/logout-proses/"><span class="lgt">Logout</span></a>
                        </div>
                    </div> 
                </ul>

            </div>
        </div>
    </nav>
    <!-- konten -->
    <div class="container"><br><br>
        <div class="auth">
          <br><br>
             <div class="container">
                <a href="../"><button class="btn btn-primary" id="btnback2" style="margin-top: 6%;margin-left: 5%;">Back</button></a>
                <div class="row">

                <!-- jika status penyewa jasa verif is yes -->
                <?php
                if ($sverif=="yes") {
                ?>
                <form action="../../../assets/jasa-proses/index.php" method="post" enctype="multipart/form-data">
                  <table border="0" width="100%" style="margin-top: 5%;margin-left: 5%;">
                    <input type="hidden" name="id_sewa" value="<?=$id_sewa?>">
                    <input type="hidden" name="id_transaksi" value="<?=$id_transaksi?>">
                    <input type="hidden" name="paid" value="wait">
                    <input type="hidden" name="tipe" value="jasa">
                    <input type="hidden" name="id_user" value="<?=$id_user?>">
                    <input type="hidden" name="verif" value="wait">
                    <tr>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Nama Batu Nisan</label></td>
                      <td><h6 style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Unit Sewa</h6></td>
                    </tr>
                    <tr>
                      <td><input type="text" name="nama_nisan" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" value="<?=$snama_nisan?>"></td>
                      <td><select name="jumlahs" class="form-control" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;margin-left: 0;" placeholder="" required="" disabled="">
                        <?php
                        while ($p = mysqli_fetch_array($paket_sewa)) {
                        ?>
                        <option value="<?=$p['nama_paket']?>"><?=$p['nama_paket']?></option>
                        <option value="<?=$snama_paket?>" selected hidden><?=$snama_paket?></option>
                      <?php
                      }
                      ?>
                      </select>
                      <input type="hidden" name="jumlah" value="<?=$snama_paket?>"></td>
                    </tr>
                    <tr>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Nama Pemohon</label></td>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>No. Telp / HP</label></td>
                    </tr>
                    <tr>
                      <td><input type="text" name="nama" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" value="<?=$snama?>"></td>
                      <td><input type="number" name="telp" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" value="<?=$stelp?>"></td>
                    </tr>
                    <tr>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Block Makam</label></td>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Nama Makam</label></td>
                    </tr>
                    <tr>
                      <td><select name="bloks" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" disabled="">
                        <?php
                        while ($b = mysqli_fetch_array($total_harga)) {
                        ?>
                        <option value="<?=$b['blok']?>"><?=$b['blok']?></option>
                        <option value="<?=$sblok?>" selected hidden><?=$sblok?></option>
                      <?php
                      }
                      ?>
                      </select>
                      <input type="hidden" name="blok" value="<?=$sblok?>"></td>
                      <td><select name="nama_makams" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" disabled="">
                        <?php
                        while ($m = mysqli_fetch_array($makam)) {
                        ?>
                        <option value="<?=$m['nama']?>"><?=$m['nama']?></option>
                        <option value="<?=$snama_makam?>" selected hidden><?=$snama_makam?></option>                      
                      <?php
                      }
                      ?>
                      </select>
                      <input type="hidden" name="nama_makam" value="<?=$snama_makam?>"></td>
                    </tr>
                    <tr>
                      <td colspan="2"><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Email</label></td>
                    </tr>
                    <tr>
                      <td><input type="email" name="email" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" value="<?=$semail?>"></td>
                    </tr>
                    <tr>
                      <td colspan="2"><center><img src="../../../assets/sewajasa2.png" style="margin-top: 0;width: 200px; height: 200px; position: sticky; left: 0;right: 0;z-index: -1;float: right;margin-right: 15%;"></center></td>
                    </tr>
                    <tr>
                      <td colspan="2"><center><input type="submit" name="update" class="btn btn-primary" id="buttonslanjutan" style="left:0;position: static;margin-left: 50%;margin-bottom: 0;" value="Update"></center></td>
                    </tr>
                  </table>
                </form>

                <!-- jika status penyewa jasa verif is no -->
                <?php
                } elseif ($sverif=="no") {
                ?>
                <form action="../../../assets/jasa-proses/index.php" method="post" enctype="multipart/form-data">
                  <table border="0" width="100%" style="margin-top: 5%;margin-left: 5%;">
                    <input type="hidden" name="id_sewa" value="<?=$id_sewa?>">
                    <input type="hidden" name="id_transaksi" value="<?=$id_transaksi?>">
                    <input type="hidden" name="paid" value="wait">
                    <input type="hidden" name="tipe" value="jasa">
                    <input type="hidden" name="id_user" value="<?=$id_user?>">
                    <input type="hidden" name="verif" value="wait">
                    <tr>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Nama Batu Nisan</label></td>
                      <td><h6 style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Unit Sewa</h6></td>
                    </tr>
                    <tr>
                      <td><input type="text" name="nama_nisan" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" value="<?=$snama_nisan?>"></td>
                      <td><select name="jumlahs" class="form-control" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;margin-left: 0;" placeholder="" required="" disabled="">
                        <?php
                        while ($p = mysqli_fetch_array($paket_sewa)) {
                        ?>
                        <option value="<?=$p['nama_paket']?>"><?=$p['nama_paket']?></option>
                        <option value="<?=$snama_paket?>" selected hidden><?=$snama_paket?></option>
                      <?php
                      }
                      ?>
                      </select>
                      <input type="hidden" name="jumlah" value="<?=$snama_paket?>"></td>
                    </tr>
                    <tr>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Nama Pemohon</label></td>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>No. Telp / HP</label></td>
                    </tr>
                    <tr>
                      <td><input type="text" name="nama" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" value="<?=$snama?>"></td>
                      <td><input type="number" name="telp" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" value="<?=$stelp?>"></td>
                    </tr>
                    <tr>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Block Makam</label></td>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Nama Makam</label></td>
                    </tr>
                    <tr>
                      <td><select name="bloks" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" disabled="">
                        <?php
                        while ($b = mysqli_fetch_array($total_harga)) {
                        ?>
                        <option value="<?=$b['blok']?>"><?=$b['blok']?></option>
                        <option value="<?=$sblok?>" selected hidden><?=$sblok?></option>
                      <?php
                      }
                      ?>
                      </select>
                      <input type="hidden" name="blok" value="<?=$sblok?>"></td>
                      <td><select name="nama_makams" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" disabled="">
                        <?php
                        while ($m = mysqli_fetch_array($makam)) {
                        ?>
                        <option value="<?=$m['nama']?>"><?=$m['nama']?></option>
                        <option value="<?=$snama_makam?>" selected hidden><?=$snama_makam?></option>                      
                      <?php
                      }
                      ?>
                      </select>
                      <input type="hidden" name="nama_makam" value="<?=$snama_makam?>"></td>
                    </tr>
                    <tr>
                      <td colspan="2"><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Email</label></td>
                    </tr>
                    <tr>
                      <td><input type="email" name="email" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" value="<?=$semail?>"></td>
                    </tr>
                    <tr>
                      <td colspan="2"><center><img src="../../../assets/sewajasa2.png" style="margin-top: 0;width: 200px; height: 200px; position: sticky; left: 0;right: 0;z-index: -1;float: right;margin-right: 15%;"></center></td>
                    </tr>
                    <tr>
                      <td colspan="2"><center><input type="submit" name="update" class="btn btn-primary" id="buttonslanjutan" style="left:0;position: static;margin-left: 50%;margin-bottom: 0;" value="Update"></center></td>
                    </tr>
                  </table>
                </form>

                <!-- jika status penyewa jasa verif is wait -->
                <?php
                } elseif($sverif=="wait") {
                ?>
                <form action="../../../assets/jasa-proses/index.php" method="post" enctype="multipart/form-data">
                  <table border="0" width="100%" style="margin-top: 5%;margin-left: 5%;">
                    <input type="hidden" name="id_sewa" value="<?=$id_sewa?>">
                    <input type="hidden" name="id_transaksi" value="<?=$id_transaksi?>">
                    <input type="hidden" name="paid" value="wait">
                    <input type="hidden" name="tipe" value="jasa">
                    <input type="hidden" name="id_user" value="<?=$id_user?>">
                    <input type="hidden" name="verif" value="wait">
                    <tr>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Nama Batu Nisan</label></td>
                      <td><h6 style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Unit Sewa</h6></td>
                    </tr>
                    <tr>
                      <td><input type="text" name="nama_nisan" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" value="<?=$snama_nisan?>" disabled=""></td>
                      <td><select name="jumlah" class="form-control" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;margin-left: 0;" placeholder="" required="" disabled="">
                        <?php
                        while ($p = mysqli_fetch_array($paket_sewa)) {
                        ?>
                        <option value="<?=$p['nama_paket']?>"><?=$p['nama_paket']?></option>
                        <option value="<?=$snama_paket?>" selected hidden><?=$snama_paket?></option>
                      <?php
                      }
                      ?>
                      </select></td>
                    </tr>
                    <tr>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Nama Pemohon</label></td>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>No. Telp / HP</label></td>
                    </tr>
                    <tr>
                      <td><input type="text" name="nama" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" value="<?=$snama?>" disabled=""></td>
                      <td><input type="number" name="telp" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" value="<?=$stelp?>" disabled=""></td>
                    </tr>
                    <tr>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Block Makam</label></td>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Nama Makam</label></td>
                    </tr>
                    <tr>
                      <td><select name="blok" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" disabled="">
                        <?php
                        while ($b = mysqli_fetch_array($total_harga)) {
                        ?>
                        <option value="<?=$b['blok']?>"><?=$b['blok']?></option>
                        <option value="<?=$sblok?>" selected hidden><?=$sblok?></option>
                      <?php
                      }
                      ?>
                      </select></td>
                      <td><select name="nama_makam" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" disabled="">
                        <?php
                        while ($m = mysqli_fetch_array($makam)) {
                        ?>
                        <option value="<?=$m['nama']?>"><?=$m['nama']?></option>
                        <option value="<?=$snama_makam?>" selected hidden><?=$snama_makam?></option>                      
                      <?php
                      }
                      ?>
                      </select></td>
                    </tr>
                    <tr>
                      <td colspan="2"><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Email</label></td>
                    </tr>
                    <tr>
                      <td><input type="email" name="email" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="" value="<?=$semail?>" disabled=""></td>
                    </tr>
                    <tr>
                      <td colspan="2"><center><img src="../../../assets/sewajasa2.png" style="margin-top: 0;width: 200px; height: 200px; position: sticky; left: 0;right: 0;z-index: -1;float: right;margin-right: 15%;"></center></td>
                    </tr>
                    <tr>
                      <td colspan="2"><center><input type="submit" name="update" class="btn btn-primary" id="buttonslanjutan" style="left:0;position: static;margin-left: 50%;margin-bottom: 0;" value="Menunggu Konfirmasi" disabled=""></center></td>
                    </tr>
                  </table>
                </form>

                <?php
                } else {
                ?>  
                  <form action="../../../assets/jasa-proses/index.php" method="post" enctype="multipart/form-data">
                  <table border="0" width="100%" style="margin-top: 5%;margin-left: 5%;">
                    <input type="hidden" name="id_sewa" value="<?php echo generatekode();?>">
                    <input type="hidden" name="id_transaksi" value="<?php echo generatekode();?>">
                    <input type="hidden" name="paid" value="wait">
                    <input type="hidden" name="tipe" value="jasa">
                    <input type="hidden" name="id_user" value="<?=$id_user?>">
                    <input type="hidden" name="verif" value="wait">
                    <tr>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Nama Batu Nisan</label></td>
                      <td><h6 style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Unit Sewa</h6></td>
                    </tr>
                    <tr>
                      <td><input type="text" name="nama_nisan" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required=""></td>
                      <td><select name="jumlah" class="form-control" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;margin-left: 0;" placeholder="" required="">
                        <?php
                        while ($p = mysqli_fetch_array($paket_sewa)) {
                        ?>
                        <option value="<?=$p['nama_paket']?>"><?=$p['nama_paket']?></option>
                      <?php
                      }
                      ?>
                      </select></td>
                    </tr>
                    <tr>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Nama Pemohon</label></td>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>No. Telp / HP</label></td>
                    </tr>
                    <tr>
                      <td><input type="text" name="nama" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required=""></td>
                      <td><input type="number" name="telp" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required=""></td>
                    </tr>
                    <tr>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Block Makam</label></td>
                      <td><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Nama Makam</label></td>
                    </tr>
                    <tr>
                      <td><select name="blok" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="">
                        <?php
                        while ($b = mysqli_fetch_array($total_harga)) {
                        ?>
                        <option value="<?=$b['blok']?>"><?=$b['blok']?></option>
                      <?php
                      }
                      ?>
                      </select></td>
                      <td><select name="nama_makam" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 80%;" placeholder="" required="">
                        <?php
                        while ($m = mysqli_fetch_array($makam)) {
                        ?>
                        <option value="<?=$m['nama']?>"><?=$m['nama']?></option>                      
                      <?php
                      }
                      ?>
                      </select></td>
                    </tr>
                    <tr>
                      <td colspan="2"><label style="color: rgb(45, 209, 39);"><span class="bintang">*</span>Email</label></td>
                    </tr>
                    <tr>
                      <td colspan="2"><input type="email" name="email" style="border-radius: 10px;border-color: rgb(45, 209, 39);width: 42%;" placeholder="" required=""></td>
                    </tr>
                    <tr>
                      <td colspan="2"><center><img src="../../../assets/sewajasa2.png" style="margin-top: 0;width: 200px; height: 200px; position: sticky; left: 0;right: 0;z-index: -1;float: right;margin-right: 15%;"></center></td>
                    </tr>
                    <tr>
                      <td colspan="2"><center><input type="submit" name="submit" class="btn btn-primary" id="buttonslanjutan" style="left:0;position: static;margin-left: 50%;margin-bottom: 0;" value="Sewa"></center></td>
                    </tr>
                  </table>
                </form>

                <?php
                }
                ?>
        </div>
        </div>
        </div>
        <!-- POPUP -->
        <div id="popup">
          <div class="window">
              <h1 class="berhasils" style="position: static;top: 0;margin-top: 40px;right: 0;text-align: center;"><?php if ($sverif=="wait") {echo "Data Berhasil Terinput!";} else {echo "Data Gagal Terinput!";}?></h1>
              <a href="../../../bayar/" class="close-button" title="Close"><span class="ok">OK</span></a>
          </div>
        </div>
      </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../../../bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../../../js/onscroll.js"></script>
    <script src="../../../js/main.js"></script>


  </body>
</html>