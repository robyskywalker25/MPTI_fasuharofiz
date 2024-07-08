<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['reset_email'])) {
    header("Location: lupa_password.php");
    exit;
}

$email = $_SESSION['reset_email'];

if (isset($_POST['reset_password'])) {
    $password_baru = $_POST['password_baru'];

    // Query untuk mengupdate password baru
    $query_update = "UPDATE pelanggan SET password='$password_baru' WHERE email='$email'";
    $result_update = $koneksi->query($query_update);

    if ($result_update) {
        echo "<script>alert('Password berhasil direset. Silakan login dengan password baru Anda.'); location='login.php';</script>";
        unset($_SESSION['reset_email']);
    } else {
        echo "<script>alert('Gagal mengatur ulang password. Silakan coba lagi.'); location='reset_password.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
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
    <div class="container">
        <h3>Reset Password</h3>
        <form method="post">
            <div class="form-group">
                <label for="password_baru">Password Baru</label>
                <input type="password" class="form-control" id="password_baru" name="password_baru" required>
            </div>
            <button type="submit" class="btn btn-primary" name="reset_password">Reset Password</button>
        </form>
    </div>

    <?php include 'template/footer.php'; ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
