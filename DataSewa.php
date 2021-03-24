<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>MAKAM.IN!</title>
</head>

<body>
    <!-- Container Website -->
    <div class="container-md-10">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>Bootstrap Example</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </head>

        <body>
            <div class="container-fluid">
                <!-- Brand/logo -->
                <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="#"></a>
    <a class="navbar-brand" href="#">
     <img src="logo makam.png" alt="logo" style="width:50px;"> Makam.in </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"> Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">  Sewa </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> Perpanjang </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> Bayar </a>
        </li>
          <a class="nav-link" href="#"> Tracking </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> Selamat Datang, Anita!</a>
        </li>
         </ul>
    </div>
  </nav>

  <body>
<div class="container - rm mt-5">
    <div class="row">
     <div class="col-md-6" >
      <h4>Data Sewa Tanah Makam</h4>
      <p>Data Pemohon </p>
       
        <div class="form-group">
            <label for="nama" class="col-sm-4 col-form-label"> * Nama Pemohon</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" id="nama" name="nama" placeholder="" value="">
            </div>
          </div>
    
        <div class="form-group">
            <label for="alamat " class="col-sm-4 col-form-label"> * Alamat Pemohon</label>
            <div class="col-sm-10">
               <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="noHp" class="col-sm-4 col-form-label"> * No.Telp / HP</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="noHP" name="noHP" placeholder="" value="">
            </div>
        </div>
      
        <div class="form-group">
            <label for="email" class="col-sm-4 col-form-label"> * Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="" value="">
            </div>
        </div>

        <div class="form-group">
            <label for="catatan " class="col-sm-4 col-form-label">Catatan</label>
            <div class="col-sm-10">
               <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
            </div>
        </div>
     </div>

     <div class="col-md-6" >
      <h4>Berkas Persyaratan</h4>
      <small>Pemohon wajib mengupload dokumen persyaratan sesuai dengan persyaratan yang berlaku </small>
      <br>
      <br>

        <div class="form-group">
            <label for="formFileMultiple" class="form-label"> * Surat Permohonan Bermaterai</label>
            <div class="col-sm-10">
            <input class="form-control" type="file" id="formFileMultiple" multiple >
            </div>
          </div>

          <div class="form-group">
            <label for="formFileMultiple" class="form-label"> * Identitas Pemohon/Penangung Jawab [KK/KTP] (fotokopi) </label>
            <div class="col-sm-10">
            <input class="form-control" type="file" id="formFileMultiple" multiple>
            </div>
          </div>
          
          <div class="form-group">
            <label for="formFileMultiple" class="form-label"> * Surat Kuasa </label>
            <div class="col-sm-10">
            <input class="form-control" type="file" id="formFileMultiple" multiple>
            </div>
          </div>

          <div class="form-group">
            <label for="formFileMultiple" class="form-label"> * KTP dan Kartu Keluarga (KK) Jenazah (Fotokopi)  </label>
            <div class="col-sm-10">
            <input class="form-control" type="file" id="formFileMultiple" multiple>
            </div>
          </div>

          <div class="form-group">
            <label for="formFileMultiple" class="form-label"> * Surat Keterangan Kematian [Puskesmas/Rumah Sakit] (Fotokopi)  </label>
            <div class="col-sm-10">
            <input class="form-control" type="file" id="formFileMultiple" multiple>
            </div>
          </div>

          <div class="form-group">
            <label for="formFileMultiple" class="form-label"> * Surat Keterangan Kematian dari Kelurahan Setempat (Fotokopi) </label>
            <div class="col-sm-10">
            <input class="form-control" type="file" id="formFileMultiple" multiple>
            </div>
          </div>

          <div class="form-group">
            <label for="formFileMultiple" class="form-label"> * Surat Pengantar dari TPU (Asli)  </label>
            <div class="col-sm-10">
            <input class="form-control" type="file" id="formFileMultiple" multiple>
            </div>
          </div>

          <div class="form-group">
            <label for="inputAlamat" class="col-sm-4 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" value="Book" class="alert alert-success mb-2" style= "width: 400px"> Kirim </button>
            </div>
        </div>

          </div>
          </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>