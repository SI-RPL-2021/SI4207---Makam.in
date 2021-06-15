  <?php
  include '../connection.php';
  // CEK BANK
  if (isset($_POST['cek'])) {
      $id_transaksi = $_POST['id_transaksi'];
      $metode_bayar = $_POST['metode_bayar'];
   	  $data = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi' AND id_user='$id_user'");
      header("Location: ../../bayar/invoice/?transaksi=".$id_transaksi."&bayar=".$metode_bayar."&#popup");
 
  }
  ?>