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
        <!-- Brand/logo -->
            <nav class="navbar navbar-expand-lg bg-light navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="images/logo makam.png" alt="logo" style="width:50px;">
                            Makam.in
                     </a>
            
                <!-- Links -->
                    <ul class="navbar-nav">
                        <div class="col-sm">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">Home</a>
                            </li>
                        </div>
                        <div class="col-sm">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">Sewa</a>
                            </li>
                        </div>
                        <div class="col-sm">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">Perpanjang</a>
                            </li>
                        </div>
                        <div class="col-sm">
                            <li class="nav-item">
                                <a class="nav-link text-success" href="#">Bayar</a>
                            </li>
                        </div>
                        <div class="col-sm">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">Tracking</a>
                            </li>
                        </div>
                        
                        <a class="nav-link text-dark" href="#">Selamat datang, </a>

                    </ul>
                </div>                        
            </nav>
            
            <br>
            <div class="container">
                <h2>Informasi Tagihan</h2>
                <p><b>Data Pemohon Tagihan</b></p>

                <form>

            <div class="row mt-2">

                <div class="col-md-6">
                    <label class="form-label">Nama</label>
                        <input type="text" class="form-control">
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                        <input type="text" class="form-control">
                </div>
                
                <div class="col-md-6 mt-2">
                    <label class="form-label">ID Transaksi</label>
                        <input type="text" class="form-control">
                </div>

                <div class="col-md-6 mt-2">
                    <label class="form-label">Metode Pembayaran</label><br>
                    <button class="btn btn-outline-success dropdown-toggle" type="button" id="metodePembayaran" data-bs-toggle="dropdown" aria-expanded="false">
                        Transfer Bank
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">BCA Virtual Account</a></li>
                        <li><a class="dropdown-item" href="#">Mandiri Virtual Account</a></li>
                        <li><a class="dropdown-item" href="#">DANA</a></li>
                    </ul>
                </div>

                <div class="col-12 mt-2">
                    <label class="form-label">Ringkasan Tagihan</label>
                </div>

                <div class="col-12 mt-4">
                    <label class="form-label"><b>Instruksi Pembayaran</label>
                        <p>Silakan transfer pembayaran ke rekening di bawah ini :<br>
                        Nama Pemilik Rekening : Makamin ID<br>
                        Nomor Rekening        : 77118887<br>
                        Nama Bank             : Bank BCA</p>
                </div>

                <div class="d-grid gap-2 mt-2">
                <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
                </div>
            
            </div>
            </div>
            <form>
            

    </body>

    </html>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>