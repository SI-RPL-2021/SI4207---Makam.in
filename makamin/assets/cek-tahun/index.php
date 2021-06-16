  <?php
  include '../connection.php';
  // CEK BANK
  if (isset($_POST['submit'])) {
      $tahun = $_POST['tahun'];
      $tipe = $_POST['tipe'];
      if ($tipe=="user") {
      	header("Location: ../../admin/verifikasi/laporan/user/?tahun=".$tahun);
      } elseif ($tipe=="transaksi") {
      	header("Location: ../../admin/verifikasi/laporan/transaksi/?tahun=".$tahun);
      } elseif ($tipe=="makam") {
      	header("Location: ../../admin/verifikasi/laporan/makam/?tahun=".$tahun);
      } elseif ($tipe=="lahan") {
      	header("Location: ../../admin/verifikasi/laporan/lahan/?tahun=".$tahun);
      } elseif ($tipe=="jasa") {
      	header("Location: ../../admin/verifikasi/laporan/jasa/?tahun=".$tahun);
      } elseif ($tipe=="blok") {
      	header("Location: ../../admin/verifikasi/laporan/blok/?tahun=".$tahun);
      }
 
  }
  ?>