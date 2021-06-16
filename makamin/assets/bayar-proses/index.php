<?php
  include '../connection.php';
  date_default_timezone_set('Asia/Jakarta');
  if (isset($_POST['submit'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $verif = "wait";
    $paid = $_POST['paid'];
    $metode_bayar = $_POST['metode_bayar'];
    $paid_tgl = date("d M Y");
    $paid_waktu = date("h:i:s a");
    $jumlah = count($_FILES['resis_transfer']['name']);
    $resis_transfer = '';
    if ($jumlah > 0) {
      for ($i=0; $i < $jumlah; $i++) { 
        $file_name = $_FILES['resis_transfer']['name'][$i];
        $tmp_name = $_FILES['resis_transfer']['tmp_name'][$i];
        $resis_transfer  =  $resis_transfer.$file_name.'|';       
        move_uploaded_file($tmp_name, "../../source/resi_transfer/".$file_name);               
      }

      $sresi_transfer = substr($resis_transfer,0,-1);
    }

    $write = mysqli_query($mysqli, "UPDATE `transaksi` SET `verif` = '$verif', `paid` = '$paid', `metode_bayar` = '$metode_bayar', `paid_tgl` = '$paid_tgl', `paid_waktu` = '$paid_waktu', `resi_transfer` = '$sresi_transfer' WHERE `id_transaksi` = '$id_transaksi'");
    header("Location: ../../bayar/invoice/?transaksi=".$id_transaksi."&bayar=".$metode_bayar."&#popup");
  }
?>