<?php 
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nota Pembelian</title>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        body {
            padding-top: 60px; /* Jarak dari atas ke form */
            padding-bottom: 60px; /* Jarak dari bawah ke footer */
        }
        .navbar {
            margin-bottom: 20px;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .table th, .table td {
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <?php include 'template/navbar.php'; ?>

    <section class="konten" style="margin-top: 10%;">
        <div class="container">
            <h2 style="color: red">Nota Pembelian</h2>

            <?php 
            $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            ?>

            <?php 
            $idpelangganyangbeli = $detail["id_pelanggan"];
            $idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

            if ($idpelangganyangbeli !== $idpelangganyanglogin) {
                echo "<script>alert('Jangan nakal');</script>";
                echo "<script>location='riwayat.php';</script>";
                exit();
            }
            ?>

            <div class="row">
                <div class="col-md-4">
                    <h3>Pelanggan</h3>
                    <strong><?php echo $detail['nama_pelanggan']; ?></strong>
                    <p>
                        <?php echo $detail['telepon']; ?><br>
                        <?php echo $detail['email']; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
                    Tanggal : <?php echo $detail['tgl_pembelian']; ?><br>
                    Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    <strong><?php echo $detail['nama_kota']; ?></strong><br>
                    Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?><br>
                    Alamat Pengiriman : <?php echo $detail['alamat_pengiriman']; ?>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Berat (Gr)</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor=1; ?>
                        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
                        <?php while($pecah = $ambil->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['nama']; ?></td>
                            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                            <td><?php echo $pecah['berat']; ?></td>
                            <td><?php echo $pecah['jumlah']; ?></td>
                            <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-info">
                        <p>
                            Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
                            <strong>Bank BCA 7870533452 A/n Muhammad Sulthon</strong><br>
                            <strong>Bank BRI 563501040078462 A/n Sulthon Mufti</strong>
                        </p>
                    </div>
                </div>
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
