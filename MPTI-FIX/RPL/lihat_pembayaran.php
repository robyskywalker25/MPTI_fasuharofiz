<?php 	
session_start();
include	'koneksi.php';

$id_pembelian = $_GET['id'];

$ambil= $koneksi->query("SELECT * FROM pembayaran
LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian
WHERE pembelian.id_pembelian='$id_pembelian'");

$detbay = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detbay);
// echo "</pre>";

if (empty($detbay)) 
{
	echo "<script>alert('belum ada data pembayaran');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit(); 
}
//jika data pelanggan yang bayar tidak sesuai dengan yang login
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

if ($_SESSION["pelanggan"]['id_pelanggan']!==$detbay["id_pelanggan"]) 
{
	echo "<script>alert('anda tidak berhak melihat pembayaran orang lain');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit(); 
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Lihat Pembayaran</title>
	
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<!-- nav -->
	<?php include 'template/navbar.php' ?>

	<div class="container" style="margin-top: 10%;">
		<h3>Lihat Pembayaran </h3>
		<div class="row">	
			<div class="col-md-6">
				<table class="table">	
					<tr>
						<th>Nama</th>
						<td><?php echo $detbay ['nama']; ?></td>
					</tr>
					<tr>
						<th>Bank</th>
						<td><?php echo $detbay ['bank']; ?></td>
					</tr>
					<tr>
 						<th>Tanggal</th>
						<td><?php echo $detbay ['tanggal']; ?></td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td>Rp. <?php echo number_format($detbay ['jumlah']); ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				<img src="admin/buktipbyrn/<?php echo $detbay ['bukti']; ?>" class="img-responsive" width="200">
			</div>
		</div>
		
	</div>

</body>
</html>