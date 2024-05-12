<h2> Data Pembayaran</h2>

<?php 
// mendapatkan id_pembelian dri url
$id_pembelian = $_GET['id'];

//mengambil data pembayaran berdasarkan id_pembelian

$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";

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
 		<img src="buktipbyrn/<?php echo $detail ['bukti']; ?>" class="img-responsive" width="100">
 	</div>
 </div>

 <form method="post">
 	 <div class="form-group">
 	 	<label>No. Resi Pengirimian</label>
 	 	<input type="text" class="form-control" name="resi">
 	 </div>
 	 <div class="form-group">
 	 	<label>status</label>
 	 	<select class="form-control" name="status">
 	 		<option value="">Pilih Status</option>
 	 		<option value="lunas">Lunas</option>
 	 		<option value="barang dikirim">Barang Dikirim</option>
 	 		
 	 	</select>
 	 </div>
 	 <button class="btn btn-danger" name="proses">Proses</button>
 </form>


 <?php 
 if (isset($_POST["proses"])) 
 {
 	$resi = $_POST["resi"];
 	$status = $_POST["status"];

 	$koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi',status_pembelian='$status' 
 		WHERE id_pembelian='$id_pembelian'");

 	echo "<script>alert('data pembelian terupdate');</script>";
 	echo "<script>location='?page=pembelian';</script>";
 }

?>