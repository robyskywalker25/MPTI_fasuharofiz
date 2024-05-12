
<?php 
$semuadata=array();
$tgl_mulai="-";
$tgl_selesai="-";
if (isset($_POST["lihat"])) 
{
	$tgl_mulai = $_POST["tglm"];
	$tgl_selesai = $_POST["tgls"];
	$ambil = $koneksi->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON 
	pembelian.id_pelanggan=pelanggan.id_pelanggan 
	WHERE tgl_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");

	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}

	// echo "<pre>";
	// print_r($semuadata);
	// echo "</pre>";

}
 ?>



<h2>Ladies Store</h2>
<h4>Laporan dari <strong><?php echo $tgl_mulai ?></strong> Sampai <?php echo $tgl_selesai ?></h4>
<hr>

<form method="post">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Mualai</label>
				<input type="date" name="tglm" class="form-control" value="<?php echo $tgl_mulai ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" name="tgls" class="form-control" value="<?php echo $tgl_selesai ?>">
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-success" name="lihat">Lihat</button>
		</div>
	</div>
</form>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+= $value['total_pembelian'] ?>
		<tr>
			<td><?php echo $key=1; ?></td>
			<td><?php echo $value["nama_pelanggan"]; ?></td>
			<td><?php echo $value["tgl_pembelian"]; ?></td>
			<td><?php echo number_format($value["total_pembelian"]); ?></td>
			<td><?php echo $value ["status_pembelian"]; ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>Rp.<?php echo number_format($total) ?></th>
		</tr>
	</tfoot>
</table>