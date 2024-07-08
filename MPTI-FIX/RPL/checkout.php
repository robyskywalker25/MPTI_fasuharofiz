<?php 
session_start();
include 'koneksi.php';

//jk tidak ada session pelanggan(belum login) mk dilarikan ke login.php
if (!isset($_SESSION["pelanggan"]))
{
	echo "<script>alert ('silahkan login dulu');</script>";
	echo "<script>location='login.php';</script>";
}
//
if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) 

{
  echo "<script>alert(Silahkan belanja dulu');</script>";

echo "<script>location='index.php';</script>";
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
	
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

<section class="konten" style="margin-top: 10%; margin-bottom: 5%;">
  	<div class="container">
  		<h2>Keranjang Belanja</h2>
  		<hr>
  		<table class="table table-bordered">
  			<thead>
  				<tr>
  					<th>No</th>
  					<th>Produk</th>
  					<th>Harga</th>
  					<th>Jumlah</th>
  					<th>SubHarga</th>
            
  				</tr>
  			</thead>
  			<tbody>
				<?php $nomor=1; ?>
				<?php $totalbelanja =0; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
				<!--menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->	
				<?php 
				
					$ambil = $koneksi->query("SELECT * FROM produk
						WHERE id_produk='$id_produk'");

					$pecah= $ambil-> fetch_assoc();
					$subharga= $pecah["harga"]*$jumlah;
				 ?>
  					<tr>
  						<td><?php echo $nomor; ?></td>
  						<td><?php echo $pecah['nama_produk']; ?></td>
  						<td><?php echo number_format($pecah['harga']); ?></td>
  						<td><?php echo $jumlah; ?></td>
  						<td>Rp. <?php echo number_format($subharga); ?></td>
             
  					</tr>
  					<?php $nomor++; ?>
  					<?php $totalbelanja+=$subharga; ?>
  					<?php endforeach ?>
  				</tbody>
  				<tfoot>
  					<tr>
  						<th colspan="4">Total Belanja</th>
  						<th>RP. <?php echo number_format($totalbelanja) ?> </th>
  						
  					</tr>
  				</tfoot>
  			
  		</table>

  		<form method="post">
  			
  			<div class="row">
  				<div class="col-md-4">
  					<div class="form-group">
  						<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control" >
  					</div>
  				</div>
  				<div class="col-md-4">
  					<div class="form-group">
  						<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon'] ?>" class="form-control" >
  					</div>
  				</div>
  				<div class="col-md-4">
  				<select class="form-control" name="id_ongkir">
  					<option value="">Pilih ongkos kirim</option>
  					<?php 
  					$ambil =$koneksi->query("SELECT * FROM ongkir");
  					while($perongkir= $ambil->fetch_assoc()) {
  					 ?>
  					
  					<option value="<?php echo $perongkir ["id_ongkir"] ?>">
  					 <?php echo $perongkir ['nama_kota'] ?>
  					Rp.	<?php echo number_format($perongkir ['tarif'] ) ?>
  					</option>
  					<?php } ?>
  				</select>	
  				</div>
  			</div>
        <div class="form-group">
          <label>Alamat Lengkap Pengiriman</label>
          <textarea class="form-control" name="alamat pengiriman"></textarea>
        </div>
  			<button class="btn btn-primary" name="checkout">Checkout</button>
  		</form>

  		<?php 
  		if (isset($_POST["checkout"])) 
  		{
  			$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
  			$id_ongkir= $_POST["id_ongkir"];
  			$tanggal_pembelian=date("Y-m-d");
        $alamat = $_POST['alamat_pengiriman'];

  			$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
  			$arrayongkir= $ambil->fetch_assoc();
        $namakot = $arrayongkir['nama_kota'];
        

  			$tarif= $arrayongkir['tarif'];

  			$total_pembelian= $totalbelanja + $tarif;

  			//1. menyimpan data ketabel pembelian
  			$koneksi->query("INSERT INTO pembelian(id_pelanggan,id_ongkir,tgl_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman)
  				VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$namakot','$tarif','$alamat')");

  			//2. mendapatkan id_pembelian yang barusan terjai
  			$id_pembelian_barusan= $koneksi->insert_id;

  			foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
  			{

          // mendapatkan data produk berdasarkan id_produk
          $ambil= $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
          $perproduk=$ambil->fetch_assoc();

          $nama = $perproduk['nama_produk'];
          $harga =  $perproduk['harga'];
          $berat = $perproduk['berat'];

          $subberat = $perproduk['berat']*$jumlah;
          $subharga= $perproduk['harga']*$jumlah;


  				$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah)
  					VALUES('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah') ");


          //skrip update stok
          $koneksi->query("UPDATE produk SET stok_produk= stok_produk -$jumlah
            WHERE id_produk='$id_produk' ");


  			}
  			//menggkosongkan keranjang belanja
  			unset($_SESSION['keranjang']);

  			//tampilan diarahkan kenota pembelian
  			echo "<script>alert ('Pembelian Sukses');</script>";
  			echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
  		}

  		 ?>

  		
  		
  		
  	</div>
  </section>

   <?php include 'template/footer.php'; ?>

  <!-- <pre><?php //print_r($_SESSION['pelanggan']) ?></pre>
<pre><?php //print_r($_SESSION['keranjang']) ?></pre> -->


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>