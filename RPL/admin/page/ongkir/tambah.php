<h2>Tambah Ongkir</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kota</label>
		<input type="text" name="nama" class="form-control">
		
	</div>
	<div class="form-group">
		<label>Tarif</label>
		<input type="number" name="tarif" class="form-control">
		
	</div> 
	

	<div>
	<input type="submit" name="simpan" value="simpan" class="btn btn-primary">
    </div>

</form>

<?php 

$nm_kota= @$_POST['nama'];
$tarif = @$_POST['tarif'];


 $simpan = @$_POST['simpan'];

if ($simpan) 
if($nm_kota=="" || $tarif=="") {
?>

<script type="text/javascript">
alert("Inputan Tidak Boleh Ada yang Kosong")
</script>

<?php
} 
else{
$ambil =$koneksi->query("INSERT INTO ongkir SET
  nama_kota='$nm_kota',tarif='$tarif' ");

if ($ambil) {
     ?>
      <script type="text/javascript">
      alert ("Data Berhasil Disimpan");
      window.location.href="?page=ongkir";
      </script>
     <?php
  }

}

?>

