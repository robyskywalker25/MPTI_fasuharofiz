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
      <h3 class="  text-center">   Daftar Pelanggan</h3>
    </div>
    <div class="card-body">
      <form method="post" class="form-horizontal">
        <div class="form-group">
          <label class="control-label col-md-3"> Nama :</label>
          <div class="col-md-12">
            <input type="text" class="form-control" name="nama" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3"> Email :</label>
          <div class="col-md-12">
            <input type="email" class="form-control" name="email" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3"> Password :</label>
          <div class="col-md-12">
            <input type="password" class="form-control" name="password" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3"> No.Hp :</label>
          <div class="col-md-12">
            <input type="number" class="form-control" name="telepon" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3"> Alamat :</label>
          <div class="col-md-12">
            <textarea class="form-control" name="alamat" required></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12 ">
            <button class="btn btn-primary" name="daftar" type="submit">Daftar</button>
          </div>
        </div>
      </form>

      <?php
        // Proses formulir
        if (isset($_POST["daftar"])) {
          $nama = trim($_POST["nama"]);
          $email = trim($_POST["email"]);
          $password = trim($_POST["password"]);
          $alamat = trim($_POST["alamat"]);
          $telepon = trim($_POST["telepon"]);

          // Cek email yang sudah terdaftar
          $cek_email = $koneksi->query("SELECT * FROM pelanggan WHERE email = '$email'");
          $jumlah_data = $cek_email->num_rows;

          if ($jumlah_data > 0) {
            echo "<script>alert('Pendaftaran gagal, email sudah digunakan.');</script>";
            echo "<script>location='daftar.php';</script>";
          } else {
            // Insert data ke database
            $koneksi->query("INSERT INTO pelanggan (email, password, nama_pelanggan, alamat, telepon) VALUES ('$email', '$password', '$nama', '$alamat', '$telepon')");

            echo "<script>alert('Pendaftaran sukses, silahkan login.');</script>";
            echo "<script>location='login.php';</script>";
          }
        }
      ?>

    </div>
  </div>
</section>


<?php include 'template/footer.php'; ?>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>