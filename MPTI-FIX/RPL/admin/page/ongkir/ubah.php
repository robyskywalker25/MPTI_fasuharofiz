<h2>Ubah data ongkir</h2>

<?php 

$id_ongkir = $_GET['id'];
$ambil= $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$_GET[id]'");
$pecah= $ambil-> fetch_assoc();


 ?>
 <form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kota</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah ['nama_kota']; ?>">	
	</div>

	<div class="form-group">
		<label>Tarif </label>
		<input type="number" name="tarif" class="form-control" value="<?php echo $pecah ['tarif']; ?>" >
	</div>

	
<div>
<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
</div>

</form>


<?php 

    $nama_kota = @$_POST['nama'];
    $tarif = @$_POST['tarif'];
      
    $simpan = @$_POST['simpan'];

  if ($simpan) 
  if ($nama_kota=="" || $tarif=="") 
  {
   
    ?>
    <script type="text/javascript">
      alert("Inputan Tidak Boleh Ada yang Kosong")
    </script>
    <?php

   } 
   else 
   {
        $ambil = $koneksi->query("UPDATE ongkir SET
        nama_kota='$nama_kota',tarif='$tarif'  WHERE id_ongkir='$id_ongkir' ");


        if ($ambil) {
           ?>
            <script type="text/javascript">
            alert (" Ubah Data Berhasil Disimpan");
            window.location.href="?page=ongkir";
            </script>
           <?php
        }
      }

       ?>

