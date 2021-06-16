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
$tahun = $_GET['tahun'];

$bu1 = mysqli_query($mysqli, "SELECT COUNT(bulan_count) AS b1 FROM transaksi WHERE bulan_count=1 AND tahun_count='$tahun'");
$bu2 = mysqli_query($mysqli, "SELECT COUNT(bulan_count) AS b2 FROM transaksi WHERE bulan_count=2 AND tahun_count='$tahun'");
$bu3 = mysqli_query($mysqli, "SELECT COUNT(bulan_count) AS b3 FROM transaksi WHERE bulan_count=3 AND tahun_count='$tahun'");
$bu4 = mysqli_query($mysqli, "SELECT COUNT(bulan_count) AS b4 FROM transaksi WHERE bulan_count=4 AND tahun_count='$tahun'");
$bu5 = mysqli_query($mysqli, "SELECT COUNT(bulan_count) AS b5 FROM transaksi WHERE bulan_count=5 AND tahun_count='$tahun'");
$bu6 = mysqli_query($mysqli, "SELECT COUNT(bulan_count) AS b6 FROM transaksi WHERE bulan_count=6 AND tahun_count='$tahun'");
$bu7 = mysqli_query($mysqli, "SELECT COUNT(bulan_count) AS b7 FROM transaksi WHERE bulan_count=7 AND tahun_count='$tahun'");
$bu8 = mysqli_query($mysqli, "SELECT COUNT(bulan_count) AS b8 FROM transaksi WHERE bulan_count=8 AND tahun_count='$tahun'");
$bu9 = mysqli_query($mysqli, "SELECT COUNT(bulan_count) AS b9 FROM transaksi WHERE bulan_count=9 AND tahun_count='$tahun'");
$bu10 = mysqli_query($mysqli, "SELECT COUNT(bulan_count) AS b10 FROM transaksi WHERE bulan_count=10 AND tahun_count='$tahun'");
$bu11 = mysqli_query($mysqli, "SELECT COUNT(bulan_count) AS b11 FROM transaksi WHERE bulan_count=11 AND tahun_count='$tahun'");
$bu12 = mysqli_query($mysqli, "SELECT COUNT(bulan_count) AS b11 FROM transaksi WHERE bulan_count=12 AND tahun_count='$tahun'");
while ($bua1 = mysqli_fetch_array($bu1)) {
  $b1= $bua1['b1'];
}
while ($bua2 = mysqli_fetch_array($bu2)) {
  $b2= $bua2['b2'];
}
while ($bua3 = mysqli_fetch_array($bu3)) {
  $b3= $bua3['b3'];
}
while ($bua4 = mysqli_fetch_array($bu4)) {
  $b4= $bua4['b4'];
}
while ($bua5 = mysqli_fetch_array($bu5)) {
  $b5= $bua5['b5'];
}
while ($bua6 = mysqli_fetch_array($bu6)) {
  $b6= $bua6['b6'];
}
while ($bua7 = mysqli_fetch_array($bu7)) {
  $b7= $bua7['b7'];
}
while ($bua8 = mysqli_fetch_array($bu8)) {
  $b8= $bua8['b8'];
}
while ($bua9 = mysqli_fetch_array($bu9)) {
  $b9= $bua9['b9'];
}
while ($bua10 = mysqli_fetch_array($bu10)) {
  $b10= $bua10['b10'];
}
while ($bua11 = mysqli_fetch_array($bu11)) {
  $b11= $bua11['b11'];
}
while ($bua12 = mysqli_fetch_array($bu12)) {
  $b12= $bua12['b12'];
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
    <link rel="stylesheet" href="../../../../css/responsive.css">
    <link rel="stylesheet" href="../../../../css/styleform.css">
    <link rel="stylesheet" href="../../../../css/verifikasi.css">
    <link rel="stylesheet" href="../../../../css/masuk_admin.css">
    <link rel="stylesheet" href="../../../../css/grafik.css">
    <link rel="stylesheet" href="../../../../css/identitasktp.css">
    <link rel="icon" href="../../../../assets/logonisan.png">
    <title>Makam.in</title>
  </head>
  <body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-3 fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../../../../assets/logo.png" height="40px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link activepage link-navbar tebel-sedang " href="../../../../">Home &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="#">Verifikasi &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  activepage link-navbar tebel-sedang" href="../../../e-data/">Data Manager &nbsp;&nbsp;</a>
                    </li>
                    <div class="dropdown">
                        <button class="dropbtn" style="position: static;transform: none;padding: 0;color: black;width: 100%;height: auto;text-transform: none;margin-top: 15px;left: 0;">Selamat Datang <span method="post" name="user" class="users"><?=$_SESSION['nama']?></span>
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16" id="logout">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                            </svg>
                            <a href="../../../e-data/user/form/?id=<?=$_SESSION['id_user']?>"><span class="lgt">Rubah Profile</span></a>
                            <a href="../../../../assets/logout-proses/"><span class="lgt">Logout</span></a>
                        </div>
                    </div>
                </ul>

            </div>
        </div>
    </nav>

    <!-- konten -->
    <div class="container">
      <center>
      <table border="0">
        <tr>
          <td><a href="../" style="margin-left: 0;padding-right: 10px;"><button id="btn-primaryktp" class="btn btn-primary" style="margin-top: 0;width: 110px;"><p class="back">Back</p></button></a></td>
          <form action="../../../../assets/cek-tahun/index.php" method="post">
          <input type="hidden" name="tipe" value="transaksi">
          <td><center><select name="tahun" class="form-control" id="labelsewatanah" style="width: 495px;">
            <?php for($i = 2000; $i <= 3000; $i+=1){?>
            <option value="<?=$i?>"><?=$i?></option>
          <?php 
          } if (isset($tahun)) {?>
            <option value="<?=$tahun?>" selected><?=$tahun?></option>
            <?php
          } ?>
          </select></center></td>
          <td><input type="submit" name="submit" value="Lihat" id="btn-primaryktp" class="btn btn-primary" style="margin-top: 0;width: 110px;height: 35px;"></td>
          </form>
        </tr>
        <?php
        if (isset($tahun)) {?>
          <tr>
            <td colspan="3"><center><canvas id="myChart" style="width:100%;max-width:1200px"></canvas></center></td>
          </tr>
          <?php
        }
        ?>
      </table> 
      </center>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../../../../bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../../../../js/onscroll.js"></script>
    <script src="../../../../js/Chart.min.js"></script>
    <script>
    var xValues = ["January", "Februari", "Maret", "April", "Mei", "Juni", "July", "Agustus", "September", "Oktober", "November", "Desember"];
    var yValues = [<?=$b1?>, <?=$b2?>, <?=$b3?>, <?=$b4?>, <?=$b5?>, <?=$b6?>, <?=$b7?>, <?=$b8?>, <?=$b9?>, <?=$b10?>, <?=$b11?>, <?=$b12?>];
    var barColors = ["red", "green","blue","orange","brown", "red", "green","blue","orange","brown", "red", "green"];

    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
          text: "<?php if(isset($tahun)){echo "Laporan Bulanan Pertambahan Transaksi Tahun ".$tahun;}else{echo "Laporan Bulanan Pertambahan Pengguna";}?>"
        }
      }
    });
    </script>
  </body>
</html>