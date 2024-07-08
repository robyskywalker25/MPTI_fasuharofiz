<?php
session_start();
include 'koneksi.php';

if (isset($_POST['verifikasi_identitas'])) {
    $email = $_POST['email'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    // Query untuk memeriksa apakah data yang dimasukkan cocok dengan database
    $query = "SELECT * FROM pelanggan WHERE email='$email' AND nama_pelanggan='$nama_pelanggan' AND telepon='$telepon' AND alamat='$alamat'";
    $result = $koneksi->query($query);

    if ($result && $result->num_rows > 0) {
        // Jika data cocok, arahkan ke halaman reset_password.php dengan menyertakan email pengguna
        $_SESSION['reset_email'] = $email;
        header("Location: reset_password.php");
        exit;
    } else {
        echo "<script>alert('Data yang Anda masukkan tidak cocok.'); location='lupa_password.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - Verifikasi Identitas</title>
    <!-- Tambahkan CSS dan JavaScript yang diperlukan -->
    <!-- Contoh: Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            margin-top: 100px; /* Jarak dari atas ke form */
            margin-bottom: 100px; /* Jarak dari bawah ke footer */
        }
    </style>
</head>
<body>

<?php include 'template/navbar.php'; ?>

<div class="container mt-5">
    <div class="card mx-auto" style="width: 40%;">
        <div class="card-header">
            <h3 class="text-center">Lupa Password - Verifikasi Identitas</h3>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="number" class="form-control" id="telepon" name="telepon" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="verifikasi_identitas">Verifikasi Identitas</button>
            </form>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
