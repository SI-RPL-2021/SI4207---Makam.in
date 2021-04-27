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
    <style type="text/css">
        @media print {
            @page {margin: 0;}
            body {margin-top: 8%;}
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row clearfix">
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12" >
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12" >
                        <img src="../../assets/logo.png" height="40px" style="float:right;">
                    </div>
                </div>
                <div class="row clearfix" style="padding-top:30px;">
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12" >
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12" >
                        <p style="float:right;">Nomor Invoice :</p>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12" >
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12" >
                        <p style="float:right;"><?=$id_transaksi?></p>
                    </div>
                </div>
                <div class="row clearfix" style="padding-top:10px;">
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12" >
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12" >
                        <p style="float:right;">Tanggal Invoice :</p>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12" >
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12" >
                        <p style="float:right;"><?php echo "".date("l/d/m/Y"); ?></p>
                    </div>
                </div>
                <div class="row clearfix" style="padding-top:50px;">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
                        <p>Hallo, <?=$namas?></p>
                        <p>Terimakasih, Anda telah melakukan transaksi sebagai berikut:</p>
                        <table style="border:1px solid black; width:100%; border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th style="width:5%; text-align: center; border-bottom: 1px solid black;border-right: 1px solid black;">No</th>
                                    <th style="width:30%;border-bottom: 1px solid black;border-right: 1px solid black;">Nama Produk</th>
                                    <th style="width:10%; text-align: center;border-bottom: 1px solid black;border-right: 1px solid black;">Jumlah</th>
                                    <th style="width:25%; text-align: right;border-bottom: 1px solid black;border-right: 1px solid black;">Harga</th>
                                    <th style="text-align: right;padding-right: 5%;border-bottom: 1px solid black;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($b = mysqli_fetch_array($bayar)) {
                                    $id_sewa = $b['id_sewa'];
                                    $pajak = $b['pajak'];
                                    $penyewa_makam = mysqli_query($mysqli, "SELECT * FROM penyewa_makam WHERE id_sewa='$id_sewa'");
                                    while ($s = mysqli_fetch_array($penyewa_makam)) {
                                        $jumlah = $s['jumlah'];
                                        $id_makam = $s['id_makam'];
                                        $blok = $s['blok'];
                                        $makam = mysqli_query($mysqli, "SELECT * FROM makam WHERE id_makam='$id_makam'");
                                        $no = 1;
                                        while ($m = mysqli_fetch_array($makam)) {
                                            $paket = mysqli_query($mysqli, "SELECT * FROM paket_sewa WHERE jumlah='$jumlah'");
                                            while ($p = mysqli_fetch_array($paket)) {
                                                $nama_paket = $p['nama_paket'];
                                                $total_harga = mysqli_query($mysqli, "SELECT * FROM makam_stok WHERE blok = '$blok' AND id_makam = '$id_makam'");
                                                while ($t = mysqli_fetch_array($total_harga)) {
                                                    $harga_makam = $t['harga'];
                                                    $tiga_tahun = 1095;
                                                    $totalin_harga = $harga_makam*$jumlah*$tiga_tahun;
                                                    $pembayaran = $totalin_harga+$pajak;
                                ?>
                                <tr>
                                    <td style="text-align: center;border-right: 1px solid black;"><?=$no++?></td>
                                    <td style="border-right: 1px solid black;"><?=$m['nama']?></td>
                                    <td style="text-align: center;border-right: 1px solid black;"><?=$b['unit']?></td>
                                    <td style="text-align: right;"><?=$harga_makam?></td>
                                    <td style="text-align: right;border-left: 1px solid black;"><?=$totalin_harga?></td>
                                </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="4" style="text-align: right;border-top: 1px solid black;">Pajak</th>
                                <td style="text-align: right;border-left: 1px solid black;"><?=$pajak?></td>
                            </tr>
                            <tr>
                                <th colspan="4" style="border-top: 1px solid black; border-right: 1px solid black;">Total Pembayaran</th>
                                <th style="text-align: right;border-top: 1px solid black;">Rp. <?=$pembayaran?></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="row clearfix" style="padding-top:50px;">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
                            <p style="text-decoration: underline;">Detail Pembelian</p>
                            <p>Nama Pemohon : <?=$b['nama']?></p>
                            <p>Nama Makam : <?=$m['nama']?></p>
                            <p>Alama :</p>
                            <p><?=$m['kecamatan']?>, <?=$m['kota']?>, <?=$m['kode_pos']?></p>
                            <p>Blok : <?=$t['blok']?></p>
                            <p>Jumlah Unit : <?=$b['unit']?></p>
                        </div>
                    </div>
                    <?php
                       }}}}}
                    ?>

                    <div class="row clearfix" style="padding-top:20px;">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="text-align:center;">
                            <p>Terimakasih dan Semoga Sehat Selalu ^_^</p>

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

    <script>
        window.print();
    </script>

  </body>
</html>