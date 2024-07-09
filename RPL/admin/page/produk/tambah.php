<h2>Tambah Produk</h2> <hr>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control">
		
	</div>
	<div class="form-group">
    	<label>Kategori Produk</label>
    		<select class="form-control" name="kategori">
          		<option value="bb">Pilih Kategori</option>
          		<?php 
  					$ambil =$koneksi->query("SELECT * FROM kategori");
  					while($perkategori= $ambil->fetch_assoc()) {
  					 ?>
  					
  					<option value="<?php echo $perkategori ["id_kategori"] ?>">
  					 <?php echo $perkategori ['kategori'] ?>
  					</option>
  					<?php } ?>
          		
    		</select>
	</div>

	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" name="harga" class="form-control">
		
	</div> 
	<div class="form-group">
		<label>Stok Produk</label>
		<input type="number" name="stok" class="form-control">
		
	</div> 
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" name="berat" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
		
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php  

if (isset($_POST['save'])) 

{

 $nama = $_FILES['foto']['name'];

 $lokasi = $_FILES['foto']['tmp_name'];

 move_uploaded_file($lokasi, "../foto_produk/".$nama);

 $koneksi->query("INSERT INTO produk

  (nama_produk,id_kategori,harga,stok_produk,berat,foto_produk,deskripsi)

  VALUES('$_POST[nama]','$_POST[kategori]','$_POST[harga]','$_POST[stok]','$_POST[berat]','$nama','$_POST[deskripsi]')");

?>
<script type="text/javascript">
alert ("Data Berhasil Disimpan");
window.location.href="index.php?page=produk";
</script>
<?php

}

?>


