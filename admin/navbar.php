<!DOCTYPE html>
<html>
<head>
	<title>Makam.in</title>
	<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/jquery/jquery-3.6.0.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <style type="text/css">
    	.navbar-nav li{
		  margin-left:30px;
		  margin-right:30px;
    	}
    	.modal-content  {
		    -webkit-border-radius: 16px !important;
		    -moz-border-radius: 16px !important;
		    border-radius: 16px !important; 
		}
		.modal-body {
		    height: 70vh
		}
    </style>
</head>
<body>
	<div class="container" style="font-family: 'Quicksand';font-weight: bold">
		<nav class="navbar navbar-expand-lg navbar-light">
		  <div class="container-fluid">
		  	<img src="../assets/img/icon.png" style="width: 30px">
		    <a class="navbar-brand" href="#">Makam.in</a>
		    <div class="collapse navbar-collapse">

		    </div>
		    <div class="collaps navbar-collapse ">
		    	<ul class="navbar-nav me-auto">
			        <li class="nav-item">
			          <a class="nav-link" href="#">Home</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="#">Sewa</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link " href="#" >Perpanjang</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link " href="#" >Bayar</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link " href="#" >Tracking</a>
			        </li>
				</ul>
				<div class="grup1">
			    	<button type="button" class="btn btn-outline-success rounded-pill" 
			    	> Daftar </button>
			    	<button type="button" class="btn btn-success rounded-pill" data-toggle="modal" data-target="#exampleModal"> Masuk </button>
		    	</div>
		    </div>
		  </div>
		</nav>
	</div>

	<!-- Modal Masuk -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	      	<div class="modal-title" style="display: flex">
	      		<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display: flex;color: black">
		          <span aria-hidden="true"><img src="../assets/icon/arrow-left.svg"></span>
		          <h4 >Kembali</h4>
		        </button>
		        
	        </div>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="row justify-content-center my-auto">
                    <div class="col-md-8">
                        <h3 class="text-center heading">Masuk</h3>
                        <h6 class="text-center sub" style="color: grey">Semoga sehat selalu,<span style="color: #4CB051"> Min</span></h6>
                        <div class="form-group"> 
                        	<label class="form-control-label text-muted">Username</label> 
                        	<input type="text" id="username" name="username" class="form-control" style="border-radius: 16px"> 
                        </div>
                        <div class="form-group"> 
                        	<label class="form-control-label text-muted">Kata sandi</label> 
                        	<input type="password" id="password" name="password" class="form-control" style="border-radius: 16px"> 
                        </div>
                        <div class="row justify-content-center my-2"> 
                        	<!-- <a href="#"><small class="text-muted">Forgot Password?</small></a>  -->
                        	<label style="width: 50%;float: left;">
                        		<input class="form-control-label" type="checkbox" value="lsRememberMe" id="rememberMe" > 
                        		<for class="rememberMe" >Ingat saya</for>
                        	</label>
                        	<label style="width: 50%;text-align: right;">
                        		<a href="#" style="color: #4CB051;">Lupa kata sandi</a>
                        	</label>
                        </div>
                        <div class="row justify-content-center my-3 px-3"> 
                        	<button class="btn btn-success rounded-pill" onclick="window.location='homeadmin.php'" >Masuk</button> 
                        </div>
                    </div>
                </div>
	      </div>
	    </div>
	  </div>
	</div>
</body>
</html>