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

   <section style="margin-top:10%; margin-bottom: 10%; margin-left: 25%">
  <div class="card" style="width: 30rem; ">
  <div class="card-header">
   Login Pelanggan
  </div>
  <div class="card-body">
    
      <form method="post">
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password">
      </div>
      <button class="btn btn-primary" name="login">Login</button>
    </form>
            
            <?php  
  //jika ada tombol logoin ditekan
  if (isset($_POST['login'])) 
  {

    $email = $_POST["email"];
    $password = $_POST["password"];
    // lakukan query mengecek akun di tabel pelanggan db
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email='$email' AND password='$password'");

    //yang diambil
    $akunyangcocok = $ambil->num_rows;

    //jika 1 akun yang cocok makan login
    if ($akunyangcocok==1) 
    {
      // anda sudah login
      //dapat akun dlm bentuk array
      $akun = $ambil->fetch_assoc();
      // simpan di session pelanggan
      $_SESSION["pelanggan"] = $akun;
      echo "<script>alert ('anda  suskes login');</script>";


      //jk sdh belanja
      if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) 
      {
        echo "<script>location='checkout.php';</script>";
      }
      else 
      {
        echo "<script>location='index.php';</script>";
      }

      
    }
    else
    {
      //gagal login
      echo "<script>alert ('anda gagal login periksa akun anda');</script>";
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