<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>cara pembelian</title>
    
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

	<div class="container" style="margin-top: 5%;">
		<div class="row ">
			<div class="col-md-9 col-md-offset-2 mt-5">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">Cara Pembelian Produk</h4>
					</div>
					<h3>Cara Pembelian</h3>
					<p>1. Silahkan Daftar sebagai pelanggan terlebih dahulu dihalaman Daftar Pelanggan <br>
					2. Setelah Anda Daftar, login terlebih dahulu <br> 
					3. Ketika sudah masuk dalam pelanggan, maka pilih produk yang akan dibeli <br>
					4. Jika Produk Sudah masuk ke keranjang belanja, klik checkout <br> 
					5. Pilih tujuan ongkir dan isi alamat pengiriman <br>
					6. klik tombol checout untuk membuat nota </p>

					<h3>Cara Konfirmasi Pembelian</h3>
					<p>
						1. Klik Riwayat pada menu <br>
						2. pilih yang ingin di konformasi pembayaran <br>
						3. isi form dengan lengkap <br>
						4. klik tombol kirim <br>

					</p>


					
				</div>
			</div>
		</div>
		
	</div>

	<?php include 'template/footer.php'; ?>

</body>
</html>