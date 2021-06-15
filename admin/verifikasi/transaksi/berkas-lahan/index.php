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
$id_sewa = $_GET['id'];
$id_user = $_GET['user'];
$view = mysqli_query($mysqli, "SELECT * FROM penyewa_makam WHERE id_sewa = '$id_sewa' AND id_user='$id_user'");
while ($view = mysqli_fetch_array($view)) {
  $verifs = $view['verif'];
  $id_makam = $view['id_makam'];
  $blok = $view['blok'];
  $jumlah = $view['jumlah'];
  $jam = $view['jam'];
  $nama = $view['nama'];
  $telp = $view['telp'];
  $email = $view['email'];
  $alamat = $view['alamat'];
  $catatan = $view['catatan'];
  $gbr_smb = $view['gbr_smb'];
  $gbr1    = explode('|', $gbr_smb);
  $cgbr1   = count($gbr1);

  $gbr_kk_ktp = $view['gbr_kk_ktp'];
  $gbr2    = explode('|', $gbr_kk_ktp);
  $cgbr2   = count($gbr2);

  $gbr_sk = $view['gbr_sk'];
  $gbr3    = explode('|', $gbr_sk);
  $cgbr3   = count($gbr3);

  $gbr_kk_ktp_jenazah = $view['gbr_kk_ktp_jenazah'];
  $gbr4    = explode('|', $gbr_kk_ktp_jenazah);
  $cgbr4   = count($gbr4);

  $gbr_sk_instansi = $view['gbr_sk_instansi'];
  $gbr5    = explode('|', $gbr_sk_instansi);
  $cgbr5   = count($gbr5);

  $gbr_sk_lokal = $view['gbr_sk_lokal'];
  $gbr6    = explode('|', $gbr_sk_lokal);
  $cgbr6   = count($gbr6);

  $gbr_sp = $view['gbr_sp']; 
  $gbr7    = explode('|', $gbr_sp);
  $cgbr7   = count($gbr7);

  $gbr_semua = $gbr_smb."|".$gbr_kk_ktp."|".$gbr_sk."|".$gbr_kk_ktp_jenazah."|".$gbr_sk_instansi."|".$gbr_sk_lokal."|".$gbr_sp;
  $gbr = explode("|", $gbr_semua);
  $cgbr = count($gbr);
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
				echo "Verifikasi Berkas & Dokumen <p style='color:rgb(45, 209, 39);'>[Terverifikasi]</p>";
			}elseif ($verifs=="no") {
				echo "Verifikasi Berkas & Dokumen <p style='color:red;'>[Ditolak]</p>";
           	} else {
				echo "Verifikasi Berkas & Dokumen";
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
							<a href='../../../../source/berkas/<?=$gbr[$i]?>' target="_blank">
								<img src="../../../../source/berkas/<?=$gbr[$i]?>" alt="<?=$gbr_semua?>" style="height:480px;max-width: 600px;">
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
						<td colspan="2"><h6 class="card-titlesewaktp" style="text-decoration: underline; color: black;">Info</h6></td>
					</tr>
					<tr>
						<td><p>Nama </p></td>
						<td><p>: <?=$nama?></p></td>
					</tr>
					<tr>
						<td><p>Email </p></td>
						<td><p>: <?=$email?></p></td>
					</tr>
					<tr>
						<td><p>Telp </p></td>
						<td><p>: <?=$telp?></p></td>
					</tr>
					<tr>
						<td><p>Alamat </p></td>
						<td><p>: <?=$alamat?></p></td>
					</tr>
					<tr>
					<?php
					$makam = mysqli_query($mysqli, "SELECT * FROM makam WHERE id_makam='$id_makam'");
					while ($m = mysqli_fetch_array($makam)) {
                	?>
						<td><p>Makam </p></td>
						<td><p>: <?=$m['nama']?></p></td>
					</tr>
					<?php
					}
					?>
					<tr>
						<td><p>Blok </p></td>
						<td><p>: <?=$blok?></p></td>
					</tr>
					<tr>
						<td><p>Jam </p></td>
						<td><p>: <?=$jam?></p></td>
					</tr>
					<tr>
						<td><p>Jumlah </p></td>
						<td><p>: <?=$jumlah?></p></td>
					</tr>
					<tr>
						<td><p>Catatan </p></td>
						<td><p>: <?=$catatan?></p></td>
					</tr>
					<form action="../../../../assets/lahan-verifikasi-proses/index.php" method="post">
					<tr>
						<input type="hidden" name="id_sewa" value="<?=$id_sewa?>">
						<input type="hidden" name="id_user" value="<?=$id_user?>">
						<?php ?>
						<td colspan="2"><center><input type="submit" name="tolak" class="form-control" id="labelsewatanah" style="background-color: red;color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;width: 95%;" value="TOLAK"></center></td>
					</tr>
					<tr>
						<td colspan="2"><center><input type="submit" name="verif" class="form-control" id="labelsewatanah" style="background-color: rgb(45, 209, 39);color: white; font-weight: bold; font-family: 'Quicksand', sans-serif; text-decoration: none;width: 95%;" value="VERIFIKASI"></center></td>
					</tr>
					</form>
				</table>
			</div>
		</div>
		<center>
		<?php
		if ($gbr_semua=="") {
			
		} else {
			for ($i=0; $i <$cgbr ; $i++) { ?>
			<a href='../../../../source/berkas/<?=$gbr[$i]?>' target="_blank">
			<img src="../../../../source/berkas/<?=$gbr[$i]?>" alt="<?=$gbr_semua?>" style="height:50px;width: 50px;">
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
    <h1 class="berhasils" style="position: static;top: 0;margin-top: 40px;right: 0;text-align: center;"><?php if ($verifs=="yes") {echo "Berhasil Terverifikasi!";} elseif($verifs=="no") {echo "Permohonan Telah Ditolak!";} else {echo "Data Gagal Terinput!";}?></h1>
    <a href="../" class="close-button" title="Close"><span class="ok">OK</span></a>
  </div>
</div>
</body>
</html>