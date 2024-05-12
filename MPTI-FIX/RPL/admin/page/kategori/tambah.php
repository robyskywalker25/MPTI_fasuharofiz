<h2>Tambah Kategori</h2>
<hr>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" name="nama" class="form-control">
		
	</div>
	
	

	<div>
	<input type="submit" name="simpan" value="simpan" class="btn btn-primary">
    </div>

</form>

<?php 

$nm_kat= @$_POST['nama'];

 $simpan = @$_POST['simpan'];

if ($simpan) 
if($nm_kat=="") {
?>

<script type="text/javascript">
alert("Inputan Tidak Boleh Ada yang Kosong")
</script>

<?php
} 
else{
$ambil =$koneksi->query("INSERT INTO kategori SET
  kategori='$nm_kat' ");

if ($ambil) {
     ?>
      <script type="text/javascript">
      alert ("Data Berhasil Disimpan");
      window.location.href="?page=kategori";
      </script>
     <?php
  }

}

?>

