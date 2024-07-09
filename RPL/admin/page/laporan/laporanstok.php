<?php 
    $koneksi = new mysqli("localhost","root","","tokompti");

    $filename= "Laporan Stok-(".date('d-m-Y').").xls";

    header("content-disposition: attachment; filename= $filename ");
    header("content-type: application/vdn.ms-excel");

 ?>
<h2 align="center">Toko Bakpia</h2>
 <h3 align="center">Laporan Stok Produk</h>


 <table border="1">
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga Produk</th>
        <th>Stok Produk</th>
        
    </tr>
    <?php $nomor=1 ?>
    <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
    <?php while($pecah = $ambil->fetch_assoc()) {?>
    <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $pecah['nama_produk']; ?></td>
        <td><?php echo $pecah['harga']; ?></td>
        <td><?php echo $pecah['stok_produk']; ?></td>       
    </tr>
    <?php $nomor++; ?> 
<?php } ?>

 </table>