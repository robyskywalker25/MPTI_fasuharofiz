<h2>Detail Pembelian</h2>

<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
	ON pembelian.id_pelanggan=pelanggan.id_pelanggan
	WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();

 ?>


 <div class="row">
   <div class="col-md-4">
     <h3>pembelian</h3>
     <strong>No. Pembelian : <?php echo $detail ['id_pembelian'] ?></strong><br>
     Tanggal : <?php echo $detail['tgl_pembelian']; ?><br>
     Total   : <?php echo $detail['total_pembelian']; ?><br>	
     Status : <?php echo $detail['status_pembelian']; ?>

   </div>
   <div class="col-md-4">
     <h3>Pelanggan</h3>
     <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
    
      <?php echo $detail['telepon']; ?><br>
      <?php echo $detail['email']; ?>
     
   </div>
   <div class="col-md-4">
     <h3>Pengiriman</h3>
     <strong><?php echo $detail ['nama_kota']; ?></strong><br>
     Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?> <br>
     Alamat Pengiriman : <?php echo $detail ['alamat_pengiriman']; ?>

   </div>
 </div>
<br>	
 	

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
		<tbody>
			<?php $nomor=1; ?>
			<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk 
			JOIN produk ON pembelian_produk.id_produk=produk.id_produk
			WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
			<?php while($pecah =$ambil->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama_produk']; ?></td>
				<td><?php echo $pecah['harga']; ?></td>
				<td><?php echo $pecah['jumlah'] ?></td>
				<td>
					<?php echo $pecah['harga'] * $pecah['jumlah']; ?>
				</td>
			</tr>
			<?php $nomor++; ?>
			<?php } ?>
		</tbody>

	</thead>
</table>