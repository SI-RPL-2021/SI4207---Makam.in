<?php
  include '../connection.php';
  if (isset($_POST['submit'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $paid = $_POST['paid'];
    $metode_bayar = $_POST['metode_bayar'];
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

    $write = mysqli_query($mysqli, "UPDATE `transaksi` SET `paid` = '$paid', `metode_bayar` = '$metode_bayar', `resi_transfer` = '$sresi_transfer' WHERE `id_transaksi` = '$id_transaksi'");
    header("Location: ../../bayar/invoice/?transaksi=".$id_transaksi."&bayar=".$metode_bayar."&#popup");
  }
?>