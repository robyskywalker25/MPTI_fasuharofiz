<?php 
    $koneksi = new mysqli("localhost","root","","tokompti");

    $filename= "pembelian_exel-(".date('d-m-Y').").xls";

    header("content-disposition: attachment; filename= $filename ");
    header("content-type: application/vdn.ms-excel");

 ?>
<h2 align="center">Toko Ladies Store</h2>
 <h3 align="center">Laporan Penjualan</h>


 <table border="1">
    <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Tanggal</th>
        <th>Jumlah</th>
        <th>Status</th>
    </tr>
    <?php $nomor=1 ?>
    <?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
    <?php while($pecah = $ambil->fetch_assoc()) {?>
    <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $pecah['nama_pelanggan']; ?></td>
        <td><?php echo $pecah['tgl_pembelian']; ?></td>
        <td><?php echo $pecah['total_pembelian']; ?></td>
        <td><?php echo $pecah['status_pembelian'] ?></td>        
    </tr>
    <?php $nomor++; ?> 
<?php } ?>

 </table>
