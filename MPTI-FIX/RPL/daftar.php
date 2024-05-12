<?php 
session_start();
include 'koneksi.php'; ?>



<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">
    
	<title>Daftar pelanggan</title>
    
      
 </head>
 <body>
</head>
<body>

<?php include 'template/navbar.php'; ?>

<section style="margin-top:10%; margin-bottom: 10%; margin-left: 25%">
	<div class="card" style="width: 40rem; ">
  <div class="card-header">
   <h3 class="	text-center">	Daftar Pelanggan</h3>
  </div>
  <div class="card-body">
    <form method="post" class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-md-3"> Nama :</label>
								<div class="col-md-12">
									<input type="text" class="form-control" name="nama">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"> Email :</label>
								<div class="col-md-12">
									<input type="email" class="form-control" name="email">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"> Password :</label>
								<div class="col-md-12">
									<input type="text" class="form-control" name="password">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"> No.Hp :</label>
								<div class="col-md-12">
									<input type="number" class="form-control" name="telepon">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"> Alamat :</label>
								<div class="col-md-12">
									<textarea class="form-control" name="alamat" ></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12 ">
									<button class="btn btn-primary" name="daftar">Daftar</button>
								</div>
							</div>

						</div>
						</form>

						<?php 

							//jk ditekan tmbol daftar 
						if (isset($_POST["daftar"])) 
						{
							//mengambil isian
							$nama = $_POST["nama"];
							$email = $_POST["email"];
							$password = $_POST["password"];
							$alamat = $_POST["alamat"];
							$telepon = $_POST["telepon"];

							//cek email apakah sudah digunakan
							$ambil=$koneksi->query("SELECT * FROM pelanggan
								WHERE email='$email'");
							$yangcocok = $ambil->num_rows;

							if ($yangcocok==1) 
							{
								echo "<script>alert('pendaftaran Gagal, email sudah digunakan');</script>";
								echo "<script>location='daftar.php';</script>";
							}
							else
							{

							// queryinsert ke tabel pelanggan
								$koneksi->query("INSERT INTO pelanggan
									(email,password,nama_pelanggan,alamat,telepon)
									VALUES ('$email','$password','$nama','$alamat','$telepon')");


								echo "<script>alert('pendaftaran SUKSES, silahkan Login');</script>";
								echo "<script>location='login.php';</script>";
							}

							}

						 ?>



					
  </div>
</div>

</section>


	 <?php include 'template/footer.php'; ?>

</body>
</html>