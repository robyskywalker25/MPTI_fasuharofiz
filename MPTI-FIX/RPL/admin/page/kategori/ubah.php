<h2>Ubah Kategori</h2>
<hr>

<?php 

$id_kategori = $_GET['id'];
$ambil= $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]' ");
$pecah= $ambil->fetch_assoc();




 ?>
 <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Nama Kategori</label>
    <input type="text" name="kategori" class="form-control" value="<?php echo $pecah ['kategori']; ?>">  
  </div>

  

  
<div>
<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
</div>

</form>


<?php 

    $namakat = @$_POST['kategori'];
    
    $simpan = @$_POST['simpan'];

  if ($simpan) 
  if ($namakat=="" ) 
  {
   
    ?>
    <script type="text/javascript">
      alert("Inputan Tidak Boleh Ada yang Kosong");
    </script>
    <?php

   } 
   else 
   {
        $ambil = $koneksi->query("UPDATE kategori SET
        kategori='$namakat'  WHERE id_kategori='$id_kategori'");


        if ($ambil) {
           ?>
            <script type="text/javascript">
            alert (" Ubah Data Berhasil Disimpan");
            window.location.href="?page=kategori";
            </script>
           <?php
        }
      }

       ?>

