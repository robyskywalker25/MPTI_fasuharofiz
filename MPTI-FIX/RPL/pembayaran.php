<?php 
session_start();
include 'koneksi.php';

//jik tidak ada pelanggan(blm login)
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
	echo "<script>alert('silahkan login dulu');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

//mendapatkan id_pembelian diurl

$idpem = $_GET["id"];

$ambil =$koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");

$detpem= $ambil->fetch_assoc();




//mendapatkan id_pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
//mendapatkan id_pelanggan yg login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !== $id_pelanggan_beli) 
{
	echo "<script>alert('Konfirmasi pembayaran di riwayat belanja kamu');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Konfirmasi Pembayaran</title>
	
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

	<div class="container" style="margin-top: 10%;">
		<h2>Konfirmasi Pembayaran</h2>
		<p>Kirim bukti</p>
		<div class="alert alert-info">total tagihan anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Penyetor</label>
				<input type="text" class="form-control" name="nama">
			</div>

			<div class="form-group">
				<label>bank</label>
				<select class="form-control" name="bank">
          		<option value="bb">Pilih Bank</option>
  					<option value="BRI" ?>BRI
  					</option>
  					<option value="BCA" ?>BCA
  					</option>
  					
          		
    		</select>
			</div>

			<div class="form-group">
				<label>Jumlah</label>
				<input type="number" class="form-control" name="jumlah" min="1">
			</div>

			<div class="form-group">
				<label>Foto Bukti</label>
				<input type="file" class="form-control" name="bukti">
				<p class="text-danger">foto bukti harus JPG maks 2mb</p>				
			</div>

			<button class="btn btn-primary" name="kirim">kirim</button>

		</form>

	</div>

	<?php 

	
	if (isset($_POST["kirim"])) 
	{
		//upload foto bukti
		$namabukti = $_FILES["bukti"]["name"];
		$lokasibukti = $_FILES["bukti"]["tmp_name"];
		$namafix = date("YmdHis").$namabukti;
		move_uploaded_file($lokasibukti, "admin/buktipbyrn/$namafix");

		$nama = $_POST["nama"];
		$bank = $_POST["bank"];
		$jumlah = $_POST["jumlah"];
		$tanggal = date("Y-m-d");


		$koneksi->query("INSERT INTO pembayaran(id_pembelian, nama, bank, jumlah, tanggal, bukti)
			VALUES ('$idpem','$nama', '$bank', '$jumlah', '$tanggal', '$namafix')");

		// update dta pmbelian dari pending menjadi sudah kirim pembayaran
		$koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran'
			WHERE id_pembelian='$idpem'");

		echo "<script>alert('terima kasih sudah mengirim bukti pembayaran');</script>";
		echo "<script>location='riwayat.php';</script>";

	}


	 ?>

 <?php include 'template/footer.php'; ?>

</body>
</html> 