<?php 
session_start();
$koneksi = new mysqli ("localhost","root","","tokompti");

if(!isset($_SESSION['admin']))
{
  echo"<script>alert('Anda harus login');</script>";
  echo"<script>location='login.php'</script>";
  header('location:login.php');
  exit();
}

 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Toko Bakpia</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<!-- TABLE STYLES-->
  <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

   <!--CHART-->
  <!-- Include Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin Bakpia</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?php echo date('d-M-Y'); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/logobakpia.png" class="user-image img-responsive"/>
					</li>
				
                    <li><a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Home</a></li>
                    <li><a href="index.php?page=pelanggan"><i class="fa fa-dashboard "></i>Data Pelanggan</a></li>
                    <li><a href="index.php?page=kategori" ><i class="fa fa-dashboard "></i>Data Kategori</a></li>
                    <li><a href="index.php?page=produk"><i class="fa fa-cube "></i>Data Produk</a></li>
                    <li><a href="index.php?page=ongkir" ><i class="fa fa-dashboard "></i>Data Ongkir</a></li>
                    <li><a href="index.php?page=pembelian"><i class="fa fa-file "></i>Data Pembelian</a></li>
                    <li><a href="index.php?page=laporan" ><i class="fa fa-file "></i>Cetak Laporan</a></li>
                    
                    
                  	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                
                <?php 

                $page=@$_GET['page'];
                $aksi=@$_GET['aksi'];



                if($page == "produk"){
                  if ($aksi == ""){
                    include "page/produk/produk.php";
                  }
                  elseif ($aksi == "tambah") {
                   include"page/produk/tambah.php";
                  }
                  elseif ($aksi == "hapus"){
                    include"page/produk/hapus.php";
                  }
                  elseif ($aksi == "ubah") {
                    include"page/produk/ubah.php";
                  }
                }
                elseif ($page == "pelanggan") 
                {
                  if ($aksi =="") 
                  {
                    include"page/pelanggan/pelanggan.php";
                  }
                  elseif ($aksi == "hapus"){
                    include"page/pelanggan/hapus.php";
                  }
                }
                elseif ($page == "pembelian") {
                  if ($aksi =="") {
                    include"page/pembelian/pembelian.php";
                  }
                  elseif ($aksi=="detail") {
                    include"page/pembelian/detail.php";
                  }
                  elseif ($aksi=="pembayaran") {
                    include"page/pembelian/pembayaran.php";
                  }
                }
                elseif ($page == "pembelian") {
                  if ($aksi =="") {
                    include"page/pembelian/detail.php";
                  }
                }
                elseif ($page =="laporan") 
                {
                  if ($aksi =="") 
                  {
                    include "page/laporan/halamanlaporan.php";
                  }
                  elseif ($aksi == "cetak.php") {
                    include"page/laporan/cetak.php.php";
                  }
                  elseif ($aksi == "laporan.php"){
                    include"page/laporan/laporan.php";
                  }
                }
                elseif ($page == "ongkir") 
                {
                  if ($aksi =="") {
                    include"page/ongkir/ongkir.php";
                  }
                  elseif ($aksi=="tambah") {
                    include"page/ongkir/tambah.php";
                  }
                  elseif ($aksi=="ubah") {
                    include"page/ongkir/ubah.php";
                  }
                  elseif ($aksi=="hapus"){
                    include "page/ongkir/hapus.php";
                  }

                } 
                elseif ($page == "kategori") 
                {
                  if ($aksi =="") {
                    include"page/kategori/kategori.php";
                  }
                  elseif ($aksi=="tambah") {
                    include"page/kategori/tambah.php";
                  }
                  elseif ($aksi=="ubah") {
                    include"page/kategori/ubah.php";
                  }
                  elseif ($aksi=="hapus"){
                    include "page/kategori/hapus.php";
                  }
                
                }
                



              else

              {
                include 'home.php';
              }


                 ?>


            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
