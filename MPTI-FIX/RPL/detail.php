<?php session_start(); ?>
<?php include 'koneksi.php' ?>

<?php 
// mendapatkan id_produk dari url
$id_produk=$_GET["id"];

//query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail</title>
	
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>

<?php include 'template/navbar.php'; ?>

<section class="kontent" style="margin-top:10%; ">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="foto_produk/<?php echo $detail["foto_produk"]; ?> " class="img-responsive" width="500">
			</div>
			<div class="col-md-6">
				<h2> <?php echo $detail["nama_produk"]; ?></h2>
				<h4>Rp. <?php echo number_format($detail ["harga"]) ; ?></h4>

				<h5>Stok : <?php echo $detail["stok_produk"]; ?></h5>

				<form method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail["stok_produk"]; ?> ">

							<div class="input-group-btn">
								<button class="btn btn-primary" name="beli">Beli</button>
							</div>
						</div>
					</div>		
				</form>

				<?php 
					if (isset($_POST["beli"])) 
					{
						//jk stok kosong
						if($detail["stok_produk"] > 0){
						$jumlah = $_POST["jumlah"];

						//msukanke keranjang belanja
						$_SESSION["keranjang"][$id_produk]+= $jumlah;

						echo "<script>alert ('produk telah ditambahkan ke keranjang belanja');</script>";
						echo "<script>location='keranjang.php';</script>";
						
						}else{
	

						echo "<script>alert ('Stok Produk Kosong');</script>";
						echo "<script>location='index.php';</script>";
					  }
					}

				 ?>

				 <h4>Deskripsi Produk</h4>
				<p><?php echo $detail ["deskripsi"]; ?></p>
			</div>
			
		</div>
	</div>
</section>
<br>
<?php include 'template/footer.php'; ?>
</body>
</html>