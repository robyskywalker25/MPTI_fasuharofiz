<?php 
session_start();
include 'koneksi.php';
 ?>
 
<!DOCTYPE html>
<html>
<head>
  <title>NotaPembelian</title>
  
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <!-- navbar -->
  <?php include 'template/navbar.php'; ?>


  <section class="konten" style="margin-top: 10%;">
    <div class="container">
      <!-- copy detail admin-->
      <h2 style="color: red">Nota Pembelian</h2>

<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
  ON pembelian.id_pelanggan=pelanggan.id_pelanggan
  WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();

 ?>
 
 <!-- <pre><?php //print_r($detail); ?></pre> -->
 
 <!-- <pre><?php  // print_r($_SESSION) ;?></pre> -->

<!-- jika pelanggan yg beli tidak sama dengan pelanggan yg login, maka dilarikan ke riwayat.php karena tidak berhak melihat nota orang lain -->
<!-- pelanggan yg beli harus pelanggan yg login -->

 <?php 
//mendaoatkan id_pelanggan yg beli
 $idpelangganyangbeli = $detail ["id_pelanggan"];
 //mendapatkan id_pelanggan yg login
 $idpelangganyanglogin = $_SESSION ["pelanggan"]["id_pelanggan"];

if ($idpelangganyangbeli!== $idpelangganyanglogin ) 
{
  echo "<script>alert('jangan nakal')</script>";
  echo "<script>location='riwayat.php';</script>";
  exit();
}

  ?>

 <div class="row">
   
   <div class="col-md-4">
     <h3>Pelanggan</h3>
     <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
     <p>
       <?php echo $detail['telepon']; ?><br>
      <?php echo $detail['email']; ?>
     </p>
   </div>
   <div class="col-md-4">
     <h3>pembelian</h3>
     <strong>No. Pembelian : <?php echo $detail ['id_pembelian'] ?></strong><br>
     Tanggal : <?php echo $detail['tgl_pembelian']; ?><br>
     Total : <?php echo $detail['total_pembelian']; ?>

   </div>
   <div class="col-md-4">
     <h3>Pengiriman</h3>
     <strong><?php echo $detail ['nama_kota']; ?></strong><br>
     Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?> <br>
     Alamat Pengiriman : <?php echo $detail ['alamat_pengiriman']; ?>

   </div>
 </div>


<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Produk</th>
      <th>Harga</th>
      <th>Berat(Gr)</th>
      <th>Jumlah</th>
      
      <th>Subtotal</th>
    </tr>
    <tbody>
      <?php $nomor=1; ?>
      <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk 
      WHERE id_pembelian='$_GET[id]'"); ?>
      <?php while($pecah =$ambil->fetch_assoc()){ ?>
      <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $pecah['nama']; ?></td>
        <td>Rp .<?php echo number_format($pecah['harga']); ?></td>
        <td><?php echo $pecah['berat']; ?></td>
        <td><?php echo $pecah['jumlah']; ?></td>
        
        <td>Rp.<?php echo number_format($pecah['subharga']); ?></td>
      </tr>
      <?php $nomor++; ?>
      <?php } ?>
    </tbody>

  </thead>
</table>


<div class="row">
  <div class="col-md-7">
    <div class="alert alert-info">
      <p>
        Silahkan melakukan Pembayaran Rp. <?php echo number_format($detail['total_pembelian']);  ?> Ke <br>
        <strong>Bank BCA 7870536687 A/n riza anggi wulandari</strong><br>
        <strong>Bank  BRI 563501040006535 A/n Riza Anggi Wulandari</strong>
      </p>
    </div>
  </div>
</div>
      
    </div>
    
  </section>
 <?php include 'template/footer.php'; ?>
</body>
</html>