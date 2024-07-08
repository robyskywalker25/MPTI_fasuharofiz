<?php 
session_start();
include 'koneksi.php';


?>  

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Bakpia</title>
    <style type="text/css">

    </style>

  </head>
  <body>
     
     
 <?php include 'template/navbar.php'; ?>


    <div class="row mt-5 ml-2 no-gutters">
        <div class="col-md-2" bg-light>
          <ul class="list-group list-group-flush p-2 pt-5  ">

             <li class="list-group-item bg-success text-white"><i class="fas fa-list "></i> KATEGORI PRODUK</li>

             
            <?php $ambil = $koneksi->query("SELECT * FROM kategori "); ?>
            <?php while($pecah=$ambil->fetch_assoc()){?>
             <li class="list-group-item bg-secondary text-white " ><i class="fas fa-angle-double-right "></i>
             <a href="kategori.php?category=<?php echo $pecah ['id_kategori']; ?>" class="text-white"><?php echo $pecah ["kategori"]; ?></a>
             </li>
             <?php }  ?>
                
        </ul>
        </div>

    

        <!--carousel-->

        <div class="col-md-10 mt-4">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="img/BakpiaBanner01.png" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="img/BakpiaBanner03.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="img/BakpiaBanner04.png" class="d-block w-100" alt="...">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

            <h4 class="text-center font-weight-bold m-4" style="color: black;">PRODUK TERBARU</h4>
                <div class="row">
              <?php $ambil = $koneksi->query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 0,4 "); ?>
      <?php while($perproduk =$ambil->fetch_assoc()){ ?>
            <div class="card mr-2 ml-2 mb-2" style="width: 16rem; ">
              <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" class="card-img-top" width="200" alt="...">
              <div class="card-body">
                <h3><?php echo $perproduk ['nama_produk']; ?></h3>
              <h5> Rp. <?php echo number_format($perproduk['harga']); ?></h5>
            <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
            <a href="detail.php?id=<?php echo $perproduk ["id_produk"]; ?>" class="btn btn-primary">Detail</a>
              </div>
            </div> 
            <?php } ?>
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