<?php 
session_start();
include 'koneksi.php';

//jika tidak ada pelanggan (blm login)
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
    echo "<script>alert('silahkan login dulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

// Proses perubahan status oleh pelanggan
if (isset($_POST['update_status'])) {
    $id_pembelian = $_POST['id_pembelian'];
    $update_query = $koneksi->query("UPDATE pembelian SET status_pembelian='barang sudah sampai' WHERE id_pembelian='$id_pembelian'");

    if ($update_query) {
        echo "<script>alert('Status pembelian berhasil diupdate.');</script>";
        echo "<script>location='riwayat.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengupdate status pembelian.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Toko Rio Indah Berkah Jaya</title>
 
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <!-- navbar -->
  <?php include 'template/navbar.php'; ?>

  <section class="riwayat" style="margin-top: 10%;">
    <div class="container">
        <h3>Riwayat Belanja Kamu, <?php echo $_SESSION ["pelanggan"]["nama_pelanggan"]  ?></h3>

        <table class="table table-bordered">    
            <thead>
                <tr>        
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>    
                <?php $nomor = 1; ?>
                <?php     
                    //mendapat id_pelanggan yg login dari session
                    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                    $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan' ORDER BY id_pembelian DESC");

                    while ($pecah = $ambil->fetch_assoc()){ 
                 ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["tgl_pembelian"];  ?></td>
                        <td>
                            <?php echo $pecah ["status_pembelian"]; ?><br>
                            <?php if (!empty($pecah['resi_pengiriman'])): ?>
                              Resi : <?php echo $pecah['resi_pengiriman']; ?>
                            <?php endif ?>
                        </td>
                        <td><?php echo number_format( $pecah ["total_pembelian"]); ?></td>
                        <td>
                            <a href="nota.php?id=<?php echo $pecah ["id_pembelian"]; ?>" class="btn btn-info">Nota</a>

                            <?php   if ($pecah['status_pembelian']=="pending"): ?>
                                <a href="pembayaran.php?id=<?php echo $pecah ["id_pembelian"]; ?>" class="btn btn-success">Konfirmasi Pembayaran</a>
                            <?php else: ?>  
                                <a href="lihat_pembayaran.php?id=<?php echo $pecah ["id_pembelian"]; ?>" class="btn btn-warning">Lihat Pembayaran</a>
                            <?php endif ?>

                            <?php if ($pecah['status_pembelian'] == "barang dikirim"): ?>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="id_pembelian" value="<?php echo $pecah['id_pembelian']; ?>">
                                    <button type="submit" class="btn btn-primary" name="update_status">Barang Sudah Sampai</button>
                                </form>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php   } ?>
            </tbody>
        </table>
    </div>
  </section>

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
