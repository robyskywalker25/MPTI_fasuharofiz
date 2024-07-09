<?php 
session_start();
include 'koneksi.php';
if(!isset($_SESSION['pelanggan'])){
    header("Location: login.php");
}

// Ambil data pengguna dari database
$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan']; // Mengakses id_pelanggan dari array sesi
$query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$data_pelanggan = mysqli_fetch_assoc($query);

if (!$data_pelanggan) {
    echo "Data tidak ditemukan.";
    exit();
}

// Proses update data
if (isset($_POST['update'])) {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $alamat = trim($_POST['alamat']);
    $telepon = trim($_POST['telepon']);

    // Update hanya data yang lain selain password
    $update_query = mysqli_query($koneksi, "UPDATE pelanggan SET nama_pelanggan='$nama', email='$email', alamat='$alamat', telepon='$telepon' WHERE id_pelanggan=$id_pelanggan");

    if ($update_query) {
        echo "<script>alert('Profil berhasil diupdate.');</script>";
        echo "<script>location='index.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengupdate profil.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Profil</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <style>
        body {
            padding-top: 60px; /* Jarak dari atas ke form */
            padding-bottom: 60px; /* Jarak dari bawah ke footer */
        }
        .navbar {
            margin-bottom: 20px;
        }
        .card {
            width: 90%;
            max-width: 400px;
            margin: 0 auto; /* Center the card horizontally */
            margin-top: 10%;
        }
        @media (min-width: 768px) {
            .card {
                margin-top: 5%;
            }
        }
    </style>
</head>
<body>

<?php include 'template/navbar.php'; ?>

<section>
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Edit Profil</h3>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_pelanggan['nama_pelanggan']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $data_pelanggan['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="telepon">No. Hp:</label>
                    <input type="tel" class="form-control" id="telepon" name="telepon" value="<?php echo $data_pelanggan['telepon']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $data_pelanggan['alamat']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="update">Update</button>
            </form>
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
