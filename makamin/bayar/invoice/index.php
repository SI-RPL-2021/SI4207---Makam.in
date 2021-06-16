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
if ($_SESSION['verif']=="yes") {

}elseif ($_SESSION['verif']=="no") {

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
  $passwords = $view['password'];
}
$bank = mysqli_query($mysqli, "SELECT * FROM bank");
$id_transaksi = $_GET['transaksi'];
$bayar = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi' AND id_user='$id_user'");
function rupiah($angka){
    $hasil_rupiah = "Rp ".number_format($angka,0,',','.');
    return $hasil_rupiah;
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
    <link rel="stylesheet" href="../../css/sewa.css">
    <link rel="stylesheet" href="../../css/tagihan.css">
    <link rel="stylesheet" href="../../css/masuk_admin.css">
    
    <link rel="icon" href="../../assets/logonisan.png">
    <title>Makam.in</title>
  </head>
  <body>
      <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-3 fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../../assets/logo.png" height="40px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang " href="../../">Home &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="../../sewa/">Sewa &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../../renew/">Perpanjang &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="#">Bayar &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang" href="../../track/">Tracking &nbsp;&nbsp;</a>
                    </li>
                    <div class="dropdown">
                        <button class="dropbtn">Selamat Datang, <span method="post" name="user" class="users"><?php if ($verifs=="yes"){echo($namas);}else{echo($_SESSION['email']);} ?></span>
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                          <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16" id="logout">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                          </svg>
                          <a href="../../user/e-identitas/"><span class="lgt">Rubah Profile</span></a>
                          <a href="../../assets/logout-proses/"><span class="lgt">Logout</span></a>
                        </div>
                    </div> 
                </ul>

            </div>
        </div>
    </nav>
    <!-- konten -->
    <div class="container">
      <a href="../" style="margin-left: 3%;"><button type="button" style="color: white;margin-top: 12%;background-color: rgb(45, 209, 39);width: 150px;height: 30px;border-radius: 10px;border: none;font-weight: bold;font-family: 'Quicksand', sans-serif;"><p class="back">Back</p></button></a>
      <form action="../../assets/cek-bank-proses/index.php" method="post">
      <input type="hidden" name="id_transaksi" value="<?=$id_transaksi?>"> 
      <table border="0" width="100%">
        <?php
          while ($invoice = mysqli_fetch_array($bayar)) {
            $total_bayar = $invoice['total']+$invoice['pajak'];
          ?>
        <tr>
          <td colspan="2"><h1 class="tagihan" style="margin-bottom: 0;margin-top: 0;">Informasi Tagihan</h1></td>
        </tr>
        <tr>
          <td><h2 class="datapemohon1">DATA PEMOHON TAGIHAN</h2></td>
          <td><h2 class="datapemohon1" style="margin: 0;float: right;">Metode Pembayaran</h2></td>
        </tr>
        <tr>
          <td><h2 class="namapemohons">Nama</h2></td>
          <td>
            <?php
            if ($invoice['paid']=="yes") {
              if ($invoice['verif']=="yes") {?>
                <select name="metode_bayar" class="form-control" style="border-radius: 15px; border-color: rgb(45, 209, 39);" readonly>
                <?php
              } elseif ($invoice['verif']=="wait") {?>
                <select name="metode_bayar" class="form-control" style="border-radius: 15px; border-color: rgb(45, 209, 39);" readonly>
                <?php
              } else {?>
                <select name="metode_bayar" class="form-control" style="border-radius: 15px; border-color: rgb(45, 209, 39);">
                <?php
              }
            } else {?>
              <select name="metode_bayar" class="form-control" style="border-radius: 15px; border-color: rgb(45, 209, 39);">
              <?php
            }
            while ($ba = mysqli_fetch_array($bank)) {
            ?>
            <option value="<?=$ba['merek']?>" <?php if($invoice['paid']!="yes"){}else{if($invoice['verif']=="yes"){?>disabled <?php }elseif($invoice['verif']=="wait"){?>disabled <?php }else{}}?>><?=$ba['merek']?></option>
            <?php
            }
            if($invoice['paid']=="yes") {?>
              <option value="<?=$invoice['metode_bayar']?>" selected hidden><?=$invoice['metode_bayar']?></option>
              <?php
            }
            ?>
          </select>
          </td>
        </tr>
        <tr>
          <td colspan="2"><h2 class="datapemohon" style="margin-top: 0;text-transform: uppercase;"><?=$invoice['nama']?></h2></td>
        </tr>
        <tr>
          <td colspan="2"><h2 class="namapemohons" style="margin-top: 0;">Email</h2></td>
        </tr>
        <tr>
          <td colspan="2"><h2 class="datapemohon" style="margin-top: 0;padding-bottom: 1%;"><?=$invoice['email']?></h2></td>
        </tr>
        <tr>
          <td><h2 class="namapemohons" style="margin-top: 0;">ID Transaksi</h2></td>
          <td>
            <?php if ($invoice['paid']=="yes") {?>
              <h2 class="datapemohon1" style="margin: 0;float: right;">Status Pembayaran</h2></td>
              <?php
            } else {
              ?>
              <h2 class="datapemohon" style="margin-top: 0;padding-bottom: 1%; float: right;"></h2></td>
              <?php
            }
            ?>
          </td>
        </tr>
        <tr>
          <td><h2 class="datapemohon" style="margin-top: 0;padding-bottom: 1%;"><?php if(isset($invoice['id_transaksi'])){echo $invoice['id_transaksi'];}else{echo $invoice['id_renew'];}?></h2></td>
          <td>
            <?php 
            if($invoice['paid']=="yes"){?>
              <p style='color: rgb(45, 209, 39);margin: 0;float: right;'>[Lunas]</p>
              <?php
              if($invoice['verif']=="yes"){?>
                <p style='color: rgb(45, 209, 39);margin: 0;float: right;'>[Terverifikasi]</p>
                <?php
              } elseif ($invoice['verif']=="no"){?>
                <p style='color: red;margin: 0;float: right;'>[Mohon Ajukan Ulang Resi Pembayaran]</p>
                <?php
              }
            }else{?>
              <p style='color:#a8a8a9;margin: 0;float: right;'></p>
              <?php
            }
            ?>
          </td>
        </tr>
        <tr>
          <td colspan="2"><h2 class="tagihanpemohon" style="margin-top: 0;margin-bottom: 0;padding-bottom: 0.5%;">Ringkasan Tagihan</h2></td>
        </tr>
        <tr>
          <td colspan="2"><h2 class="perpanjangtanah"><?php if($invoice['tipe']=="perpanjang_lahan"){echo "Perpanjangan ";}elseif($invoice['tipe']=="perpanjang_jasa"){echo "Perpanjangan ";}else{echo "Penyewaan ";} if($invoice['tipe']=="perpanjang_lahan"){echo "Lahan";}elseif($invoice['tipe']=="perpanjang_jasa"){echo "Jasa";}else{echo $invoice['tipe'];}?><span class="angkasewa" style="margin: 0;float: right;"><?=rupiah($invoice['total'])?></span></h2></td>
        </tr>
        <tr>
          <td colspan="2"><h2 class="perpanjangtanah">Pajak (PPN) <span class="angkasewa0" style="margin: 0;float: right;"><?=$invoice['pajak']?></span></h2></td>
        </tr>
        <tr>
          <td colspan="2"><h2 class="totalharga">Total <span class="angkasewatotal" style="margin: 0;float: right;">Rp <?=$total_bayar?></span></h2></td>
        </tr>
        <tr>
          <td>
            <?php if($invoice['paid'] == "yes"){
              if ($invoice['verif']=="wait") {?>
                <input type="hidden" name="status"  value="cetak">
                <input type="submit" name="cek" id="buttonbayar" style=" margin: 0;right: 0;left: 57.5%;bottom: 1%;width: 35%;" value="Cetak Nota">
                <?php
              } elseif ($invoice['verif']=="yes") {?>
                <input type="hidden" name="status"  value="cetak">
                <input type="submit" name="cek" id="buttonbayar" style=" margin: 0;right: 0;left: 57.5%;bottom: 1%;width: 35%;" value="Cetak Nota">
                <?php
              } else {?>
                <input type="hidden" name="status"  value="bayar">
                <input type="submit" name="cek" id="buttonbayar" style=" margin: 0;right: 0;left: 57.5%;bottom: 1%;width: 35%;" value="Konfirmasi Pembayaran">
                <?php
              }
            }else {?>
              <input type="hidden" name="status"  value="bayar">
              <input type="submit" name="cek" id="buttonbayar" style=" margin: 0;right: 0;left: 57.5%;bottom: 1%;width: 35%;" value="Konfirmasi Pembayaran">
            <?php 
            }
            ?>  
          </td>
        </tr>
        <?php
        }
        ?>
      </table>
      </form>
    </div>
          
<!-- POPUP -->
<div id="popup">
  <?php 
  $id_transaksi = $_GET['transaksi'];
  $id_user = $_SESSION['id_user'];
  $bayar = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi' AND id_user='$id_user'");
  $invoice = mysqli_fetch_assoc($bayar);

  ?>
    <div class="window" style="padding-top: 2%; font-family: 'Quicksand', sans-serif;height: 80%;bottom: 17%">
      <center>
      <table border="0">
        <tr>
          <h1 class="berhasils" style="position: sticky;top: 0;right: 0;">Upload Bukti Pembayaran</h1>
        </tr>
        <tr>
          <p>- Tanggal dan waktu transfer</p>
        </tr>
        <tr>
          <p>- Detail penerima transfer</p>
        </tr>
        <tr>
          <p>- Jumlah tagihan transfer</p>
        </tr>
        <tr>
          <p>- Status (berhasil)</p>
        </tr>
        <tr></tr>
        <tr>
          <p>INSTRUKSI PEMBAYARAN</p>
        </tr>
        <tr>
          <td colspan="2"><p>Silahkan transfer pembayaran ke rekening di bawah ini :</p></td>
        </tr>
        <tr>
          <td><p>Nama Pemilik Rekening</p></td>
          <?php
          $metode_bayar = $_GET['bayar'];
          $info_bank = mysqli_query($mysqli, "SELECT * FROM bank WHERE merek='$metode_bayar'");
          while ($info = mysqli_fetch_array($info_bank)) {
          ?>
          <td>: <?=$info['pemilik']?></td>
        </tr>
        <tr>
          <td><p>Nomor Rekening</p></td>
          <td><p>: <?=$info['nomor']?></p></td>
        </tr>
        <tr>
          <td><p>Nama Bank</p></td>
          <td><p>: <?=$info['merek']?></p></td>
          <?php
          }
          ?>
        </tr>
        <tr>
          <form action="../../assets/bayar-proses/index.php" method="post" enctype="multipart/form-data">
          <?php
          $metode_bayar = $_GET['bayar'];
          $info_bank = mysqli_query($mysqli, "SELECT * FROM bank WHERE merek='$metode_bayar'");
          while ($info = mysqli_fetch_array($info_bank)) {
          ?>  
          <input type="hidden" name="metode_bayar" value="<?=$info['merek']?>">
          <?php
          }
          ?>
          <input type="hidden" name="id_transaksi" value="<?=$id_transaksi?>">  
          <input type="hidden" name="paid" value="yes">
          <?php
          while ($info = mysqli_fetch_array($info_bank)) {
          ?>
          <input type="hidden" name="metode_bayar" value="<?=$info['pemilik']?>">
          <?php
          }
          ?>
          <td colspan="2">
            <center>
              <?php 
              if($invoice['paid'] != "yes"){?>
                <input type="file" name="resis_transfer[]" multiple  accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" class="input-group" id="pilih" style="position: static;top: 0;left: 0;" required="">
                <?php 
              } else {
                if ($invoice['verif']=="no") {?>
                  <input type="file" name="resis_transfer[]" multiple  accept=".jpg,.JPG,.jpeg,.JPEG,.png,.PNG" class="input-group" id="pilih" style="position: static;top: 0;left: 0;" required="">
                  <?php
                }
              }
              ?>
            </center>
          </td>
        </tr>
        <tr>
          <td colspan="2">
          <center>
            <?php 
            if($invoice['paid'] == "yes"){
              if ($invoice['verif']=="yes") {?>
                <a href="../../bayar/cetak/?transaksi=<?=$id_transaksi?>" target="_blank" class="close-button">Cetak</a>
                <td colspan="2"><a href="../../bayar/invoice/?transaksi=<?=$id_transaksi?>" class="close-button" style="top: 90%;">Selesai</a></td>
                <?php
              } elseif ($invoice['verif']=="wait") {?>
                <a href="../../bayar/cetak/?transaksi=<?=$id_transaksi?>" target="_blank" class="close-button">Cetak</a>
                <td colspan="2"><a href="../../bayar/invoice/?transaksi=<?=$id_transaksi?>" class="close-button" style="top: 90%;">Selesai</a></td>
                <?php
              } else {?>
                <input type="submit" name="submit" class="close-button" title="Close" style="top: 0;position: static;left: 0;" value="Upload">
                <?php
              }
            } else {?>
              <input type="submit" name="submit" class="close-button" title="Close" style="top: 0;position: static;left: 0;" value="Upload">
            <?php 
          }
          ?>
          </center> 
          </td>          
        </tr>
        </form>
      </table>
      </center>
</div>



          
        
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../../bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../../js/onscroll.js"></script>
    <script src="../../js/main.js"></script>
  </body>
</html>