<h2>Ubah Produk</h2>

<?php 
$ambil= $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah= $ambil->fetch_assoc();


 ?>
 <form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah ['nama_produk']; ?>">	
	</div>




	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" name="harga" class="form-control" value="<?php echo $pecah ['harga']; ?>" >
	</div>

	<div class="form-group">
		<label>Stok</label>
		<input type="number" name="stok" class="form-control" value="<?php echo $pecah ['stok_produk']; ?>">
	</div>

	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" name="berat" class="form-control" value="<?php echo $pecah ['berat']; ?>">
	</div>


	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"> <?php echo $pecah['deskripsi'];?>
			
		</textarea>
	</div>

	

	<div class="form-group">
		<img src="../../foto_produk/ <?php echo $pecah['foto_produk']?>" width="100">
	</div>

	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>

	

<div>
<input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
</div>
	
</form>

<?php 
	if(isset($_POST['ubah']))
{
	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	//jika foto dirubah 
	if (!empty($lokasifoto)) 
	{
		move_uploaded_file($lokasifoto,"../foto_produk/$namafoto");

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga='$_POST[harga]',stok_produk='$_POST[stok]', berat='$_POST[berat]',foto_produk='$namafoto',deskripsi='$_POST[deskripsi]'
			WHERE id_produk='$_GET[id]'"); 
	}
	else
	{
		 $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga='$_POST[harga]',stok_produk='$_POST[stok]', berat='$_POST[berat]',deskripsi='$_POST[deskripsi]'
			WHERE id_produk='$_GET[id]'");
	}

	echo"<script> alert('Data Produk Sudah DIRUBAHH!!')</script>";
 	echo "<script> location='index.php?page=produk';</script>";
}


 ?>