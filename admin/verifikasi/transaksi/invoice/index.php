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
$id_transaksi = $_GET['id'];
$id_user = $_GET['user'];
$view = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi' AND id_user='$id_user'");
while ($view = mysqli_fetch_array($view)) {
  $metode_bayar = $view['metode_bayar'];
  $verifs = $view['verif'];
  $resi_transfer = $view['resi_transfer']; 
  $gbr    = explode('|', $resi_transfer);
  $cgbr   = count($gbr);
}
?>
<html>
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
    <link rel="stylesheet" href="../../../../assets/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../assets/img_css.css">   
    <link rel="icon" href="../../../../assets/logonisan.png">
	<script src="../../../../assets/jquery.min.js"></script>
	<script src="../../../../assets/bootstrap.min.js"></script>
	<title>Makam.in</title>
</head>
<body>

	<!-- BODY-->
	<a href="../" style="margin-left: 9%;"><button type="button" id="btn-primaryktp" class="btn btn-primary"><p class="back">Back</p></button></a>
	<div class="container">
		<h5 class="card-titlesewaktp">
            <?php 
			if ($verifs=="yes") {
				echo "Resi Pembayaran <p style='color:rgb(45, 209, 39);'>[Terverifikasi]</p>";
           	} elseif ($verifs=="no") {
           		echo "Resi Pembayaran <p style='color:red;'>[Ditolak]</p>";
           	} else {
				echo "Verifikasi Resi Pembayaran";
            }
            ?>
        </h5>
		<div class="left-display-side-container">
			<div class="img-display-big-panel" style="background-color: rgb(45, 209, 39);">
				<div class="img-display-big">
					<div id="myCarousel" class="carousel slide" data-ride="carousel" style="max-width: 100%;">
    				<!-- Indicators -->
					<ol class="carousel-indicators">
						<?php for ($i=0; $i <$cgbr ; $i++) { ?>
					  	<li data-target="#myCarousel" data-slide-to="$i" <?php if($i == 0){echo'class="active"';}?> ></li>
					  	<?php }?>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<?php for ($i=0; $i <$cgbr ; $i++) { ?>
						<div class="item <?php if($i == 0){echo 'active';}?>">
							<a href='../../../../source/resi_transfer/<?=$gbr[$i]?>' target="_blank">
								<img src="../../../../source/resi_transfer/<?=$gbr[$i]?>" alt="<?=$resi_transfer?>" style="height:480px;max-width: 600px;">
							</a>
						</div>
						<?php }?>
					</div>

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					  <span class="glyphicon glyphicon-chevron-left"></span>
					  <span class="sr-only">Gambar Sebelumnya</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
					  <span class="glyphicon glyphicon-chevron-right"></span>
					  <span class="sr-only">Gambar Selanjutnya</span>
					</a>
					</div>
				</div>
			</div>
		</div>
		<div class="right-display-side-container" style="border-color: rgb(45, 209, 39);">
			<div class="panel-samping-display">
				<table width="100%" style="text-align: left;margin-left: 1%;">
					<tr>
						<td colspan="2"><h6 class="card-titlesewaktp" style="text-decoration: underline; color: black;">Metode Pembayaran</h6></td>
					</tr>
					<?php
						$bank = mysqli_query($mysqli, "SELECT * FROM bank WHERE merek='$metode_bayar'");
						while ($info = mysqli_fetch_array($bank)) {
							$pemilik = $info['pemilik'];
						}
                	?>
					<tr>
						<?php
						if (!isset($pemilik)) {
							?>
							<td colspan="2"><h6 class="card-titlesewaktp" style="color: red;">Belum Melakukan Pembayaran</h6></td>
							<?php
						} else {
							$banks = mysqli_query($mysqli, "SELECT * FROM bank WHERE merek='$metode_bayar'");
							while ($infos = mysqli_fetch_array($banks)) {
						?>
						<td><p>Nama </p></td>
						<td><p>: <?=$infos['pemilik']?></p></td>
					</tr>
					<tr>
						<td><p>Nomor REK </p></td>
						<td><p>: <?=$infos['nomor']?></p></td>
					</tr>
					<tr>
						<td><p>Jenis </p></td>
						<td><p>: <?=$infos['merek']?></p></td>
					</tr>
					<form action="../../../../assets/invoice-verifikasi-proses/index.php" method="post">
					<tr>
						<input type="hidden" name="id_transaksi" value="<?=$id_transaksi?>">
						<input type="hidden" name="id_user" value="<?=$id_user?>">
						<?php ?>
						<td colspan="2"><center><input type="submit" name="tolak" class="form-control" id="labelsewatanah" style="background-color: red;color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;width: 95%;" value="TOLAK"></center></td>
					</tr>
					<tr>
						<td colspan="2"><center><input type="submit" name="verif" class="form-control" id="labelsewatanah" style="background-color: rgb(45, 209, 39);color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;width: 95%;" value="VERIFIKASI"></center></td>
					</tr>
					</form>
					<?php
						}
						}
					?>
				</table>
			</div>
		</div>
		<center>
		<?php 
		if ($resi_transfer=="") {
			
		} else {
			for ($i=0; $i <$cgbr ; $i++) { ?>
			<a href='../../../../source/resi_transfer/<?=$gbr[$i]?>' target="_blank">
			<img src="../../../../source/resi_transfer/<?=$gbr[$i]?>" alt="<?=$resi_transfer?>" style="height:50px;width: 50px;">
			</a>
			<?php
			} 
		}?>
		</center>
	</div>
<br><br>

 <!-- popup -->
<div id="popup">
  <div class="window">
    <h1 class="berhasils"><?php if ($verifs="yes") {echo "Data Berhasil Terinput!";} elseif($verifs="no") {echo "Data Berhasil Terinput!";} else {echo "Data Gagal Terinput!";}?></h1>
    <a href="../" class="close-button" title="Close"><span class="ok">OK</span></a>
  </div>
</div>
</body>
</html>