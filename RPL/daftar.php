<?php 
session_start();
include 'koneksi.php'; 
?>

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
  
  <title>Daftar Pelanggan</title>
</head>
<body>

<?php include 'template/navbar.php'; ?>

<section class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
  <div class="card" style="width: 100%; max-width: 500px;">
    <div class="card-header">
      <h3 class="text-center">Daftar Pelanggan</h3>
    </div>
    <div class="card-body">
      <form method="post">
        <div class="form-group">
          <label>Nama:</label>
          <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="form-group">
          <label>Email:</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
          <label>Password:</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
          <label>No. Hp:</label>
          <input type="number" class="form-control" name="telepon" required>
        </div>
        <div class="form-group">
          <label>Alamat:</label>
          <textarea class="form-control" name="alamat" required></textarea>
        </div>
        <button class="btn btn-primary btn-block" name="daftar" type="submit">Daftar</button>
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
