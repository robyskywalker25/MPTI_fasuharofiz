<h2>Data Pembayaran</h2>

<?php 
// mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];

// mengambil data pembayaran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

// mengambil data pembelian berdasarkan id_pembelian
$ambilPembelian = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian'");
$detailPembelian = $ambilPembelian->fetch_assoc();
?>

<div class="row">
    <div class="col-md-6">
        <table class="table ">
            <tr>
                <th>Nama</th>
                <td><?php echo $detail['nama'] ?></td>
            </tr>
            <tr>
                <th>Bank</th>
                <td><?php echo $detail['bank'] ?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td><?php echo $detail['jumlah'] ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?php echo $detail['tanggal'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="buktipbyrn/<?php echo $detail['bukti']; ?>" class="img-responsive" width="100">
    </div>
</div>

<form method="post">
    <div class="form-group">
        <label>No. Resi Pengirimian</label>
        <input type="text" class="form-control" name="resi" value="<?php echo $detailPembelian['resi_pengiriman']; ?>">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="">Pilih Status</option>
            <option value="lunas" <?php if ($detailPembelian['status_pembelian'] == 'lunas') echo 'selected'; ?>>Lunas</option>
            <option value="barang dikirim" <?php if ($detailPembelian['status_pembelian'] == 'barang dikirim') echo 'selected'; ?>>Barang Dikirim</option>
        </select>
    </div>
    <button class="btn btn-danger" name="proses">Proses</button>
</form>

<?php 
if (isset($_POST["proses"])) 
{
    // Ambil data dari form
    $resi = $_POST["resi"];
    $status = $_POST["status"];

    // Hanya update resi_pengiriman jika tidak kosong
    if (!empty($resi)) {
        $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi' WHERE id_pembelian='$id_pembelian'");
    }

    // Hanya update status_pembelian jika tidak kosong
    if (!empty($status)) {
        $koneksi->query("UPDATE pembelian SET status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");
    }

    echo "<script>alert('Data pembelian terupdate');</script>";
    echo "<script>location='?page=pembelian';</script>";
}
?>
