<?php 
$koneksi = new mysqli("localhost", "root", "", "tokompti");

$semuadata = array();
$tgl_mulai = "-";
$tgl_selesai = "-";
if (isset($_POST["lihat"])) 
{
    $tgl_mulai = $_POST["tglm"];
    $tgl_selesai = $_POST["tgls"];
    $ambil = $koneksi->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON 
    pembelian.id_pelanggan=pelanggan.id_pelanggan 
    WHERE tgl_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");

    while($pecah = $ambil->fetch_assoc())
    {
        $semuadata[] = $pecah;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pembelian</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            position: relative;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        h2, h4 {
            text-align: center;
        }
        .table {
            margin-top: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="../../index.php?page=laporan" class="btn btn-secondary btn-sm back-button">Kembali</a>
        <h2>Toko Bakpia</h2>
        <h4>Laporan dari <strong><?php echo $tgl_mulai ?></strong> Sampai <strong><?php echo $tgl_selesai ?></strong></h4>
        <hr>

        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="tglm">Tanggal Mulai</label>
                    <input type="date" name="tglm" id="tglm" class="form-control" value="<?php echo $tgl_mulai ?>">
                </div>
                <div class="form-group col-md-5">
                    <label for="tgls">Tanggal Selesai</label>
                    <input type="date" name="tgls" id="tgls" class="form-control" value="<?php echo $tgl_selesai ?>">
                </div>
                <div class="form-group col-md-2 align-self-end">
                    <button class="btn btn-success btn-block" name="lihat">Lihat</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($semuadata as $key => $value): ?>
                <?php $total += $value['total_pembelian'] ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $value["nama_pelanggan"]; ?></td>
                    <td><?php echo $value["tgl_pembelian"]; ?></td>
                    <td>Rp. <?php echo number_format($value["total_pembelian"]); ?></td>
                    <td><?php echo $value["status_pembelian"]; ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th>Rp. <?php echo number_format($total) ?></th>
                </tr>
            </tfoot>
        </table>

        <form method="post" action="cetak_laporanpembelian.php">
            <input type="hidden" name="tglm" value="<?php echo $tgl_mulai; ?>">
            <input type="hidden" name="tgls" value="<?php echo $tgl_selesai; ?>">
            <button class="btn btn-primary" name="cetak">Cetak Laporan</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
