<?php 
session_start();
include 'koneksi.php';
?>  
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bakpia</title>
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

      <div class="container mt-5">
        <div class="row">
            <div class="col-md-2 bg-light">
                <ul class="list-group list-group-flush p-2 pt-5">
                    <li class="list-group-item bg-success text-white"><i class="fas fa-list"></i> KATEGORI PRODUK</li>
                    <?php 
                    $ambil = $koneksi->query("SELECT * FROM kategori"); 
                    while($pecah = $ambil->fetch_assoc()) { ?>
                        <li class="list-group-item bg-secondary"><i class="fas fa-angle-double-right"></i>
                            <a class="text-white" href="kategori.php?category=<?php echo $pecah['id_kategori']; ?>"><?php echo $pecah['kategori']; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="col-md-10 mt-4">
                <h3 class="text-center mb-4" style="color: white;">KATEGORI PRODUK</h3>
                <div class="row">
                    <?php 
                    $category = $_GET["category"];
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori='$category' ORDER BY id_produk DESC"); 
                    while($perproduk = $ambil->fetch_assoc()) { ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="card h-100">
                                <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $perproduk['nama_produk']; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Rp. <?php echo number_format($perproduk['harga']); ?></h6>
                                    <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
                                    <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-secondary">Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
      </div>

      <?php include 'template/footer.php'; ?>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
