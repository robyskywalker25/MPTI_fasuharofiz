<?php 
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Pelanggan</title> 

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

  <?php include 'template/navbar.php'; ?>

  <section class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="card" style="width: 100%; max-width: 400px;">
      <div class="card-header">
        Login Pelanggan
      </div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
            <a href="lupa_password.php" class="btn btn-link">Lupa Password?</a>
          </div>
          <button class="btn btn-primary btn-block" name="login">Login</button>
        </form>

        <?php  
        if (isset($_POST['login'])) {
          $email = $_POST["email"];
          $password = $_POST["password"];
          $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email='$email' AND password='$password'");
          $akunyangcocok = $ambil->num_rows;

          if ($akunyangcocok==1) {
            $akun = $ambil->fetch_assoc();
            $_SESSION["pelanggan"] = $akun;
            echo "<script>alert ('Anda sukses login');</script>";

            if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) {
              echo "<script>location='checkout.php';</script>";
            } else {
              echo "<script>location='index.php';</script>";
            }
          } else {
            echo "<script>alert ('Anda gagal login, periksa akun anda!');</script>";
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
