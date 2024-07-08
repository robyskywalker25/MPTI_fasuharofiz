<?php 
$koneksi = new mysqli("localhost", "root", "", "tokompti");

$tgl_mulai = $_POST['tglm'];
$tgl_selesai = $_POST['tgls'];

$filename = "Laporan_Pembelian_".$tgl_mulai."_sampai_".$tgl_selesai.".xls";

header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/vnd.ms-excel");

$ambil = $koneksi->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON 
pembelian.id_pelanggan = pelanggan.id_pelanggan 
WHERE tgl_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");

echo "<h2 align='center'>Toko Bakpia</h2>";
echo "<h4 align='center'>Laporan dari <strong>".date('d-m-Y', strtotime($tgl_mulai))."</strong> Sampai <strong>".date('d-m-Y', strtotime($tgl_selesai))."</strong></h4>";
echo "<table border='1'>";
echo "<tr>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Tanggal</th>
        <th>Jumlah</th>
        <th>Status</th>
      </tr>";

$nomor = 1;
$total = 0;
while ($pecah = $ambil->fetch_assoc()) {
    echo "<tr>
            <td>".$nomor."</td>
            <td>".$pecah['nama_pelanggan']."</td>
            <td>".date('d-m-Y', strtotime($pecah['tgl_pembelian']))."</td>
            <td>".number_format($pecah['total_pembelian'])."</td>
            <td>".$pecah['status_pembelian']."</td>
          </tr>";
    $total += $pecah['total_pembelian'];
    $nomor++;
}

echo "<tr>
        <th colspan='3'>Total</th>
        <th>Rp. ".number_format($total)."</th>
      </tr>";

echo "</table>";
?>
