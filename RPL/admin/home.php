
<?php
$koneksi = new mysqli ("localhost","root","","tokompti");

// Check koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk menghitung jumlah pelanggan
$query = "SELECT COUNT(*) as jumlah_pelanggan FROM pelanggan";
$result = $koneksi->query($query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
    // Ambil jumlah pelanggan dari hasil query
    $data = $result->fetch_assoc();
    $jumlah_pelanggan = $data['jumlah_pelanggan'];
} else {
    $jumlah_pelanggan = 0; // Jika query gagal, jumlah defaultnya adalah 0
}

//===============================================================
// Query untuk menghitung jumlah kategori
$querykategori = "SELECT COUNT(*) as jumlah_kategori FROM kategori";
$resultkategori = $koneksi->query($querykategori);

//Periksa apakah query berhasil dieksekusi
if($resultkategori){
    //Ambil jumlah kategori dari hasil query
    $datakategori = $resultkategori->fetch_assoc();
    $jumlah_kategori = $datakategori['jumlah_kategori'];
}else{
    $jumlah_kategori = 0; //jika query gagal, jumla defaultnya adalah 0;
}

//===============================================================
// Query untuk menghitung jumlah produk
$queryproduk = "SELECT COUNT(*) as jumlah_produk FROM produk";
$resultproduk = $koneksi->query($queryproduk);

//Periksa apakah query berhasil dieksekusi
if($resultproduk){
    //Ambil jumlah produk dari hasil query
    $dataproduk = $resultproduk->fetch_assoc();
    $jumlah_produk = $dataproduk['jumlah_produk'];
}else{
    $jumlah_produk = 0; //jika query gagal, jumla defaultnya adalah 0;
}


//===============================================================
// Query untuk menghitung pembelian produk
$querypembelian= "SELECT COUNT(*) as jumlah_pembelian FROM pembelian";
$resultpembelian = $koneksi->query($querypembelian);

//Periksa apakah query berhasil dieksekusi
if($resultpembelian){
    //Ambil jumlah pembelian dari hasil query
    $datapembelian = $resultpembelian->fetch_assoc();
    $jumlah_pembelian = $datapembelian['jumlah_pembelian'];
}else{
    $jumlah_pembelian = 0; //jika query gagal, jumla defaultnya adalah 0;
}


//===============================================================
// Query untuk mengambil data pembelian
$querytanggal = "SELECT tgl_pembelian, SUM(total_pembelian) AS total FROM pembelian GROUP BY tgl_pembelian";
$resulttanggal = $koneksi->query($querytanggal);

// Format data untuk Chart.js
$data_tanggal = [];
$data_totaltanggal = [];

while ($rowtanggal = $resulttanggal->fetch_assoc()) {
    $data_tanggal[] = $rowtanggal['tgl_pembelian'];
    $data_totaltanggal[] = $rowtanggal['total'];
}

//===============================================================
// Fungsi untuk mendapatkan profit bulan ini
function getMonthlyProfit($koneksi) {
    $currentYear = date('Y');
    $currentMonth = date('m');
    $sql = "SELECT SUM(total_pembelian) AS total_profit FROM pembelian 
            WHERE YEAR(tgl_pembelian) = $currentYear AND MONTH(tgl_pembelian) = $currentMonth";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total_profit'];
    } else {
        return 0;
    }
}

$profit_bulan_ini = getMonthlyProfit($koneksi);


$koneksi->close(); // Tutup koneksi database

// Ubah format tanggal ke format yang sesuai dengan Chart.js
$data_tanggal_chartjs = json_encode($data_tanggal);
$data_total_chartjs = json_encode($data_totaltanggal);

?>

<h3>
    <marquee>Selamat Datang Admin Toko Bakpia</marquee>
</h3>

<div class="small-box bg-primary" style="background-color: #337ab7;">
<div class="inner" style="padding: 5px;">
<h3 style="color: white; font-weight: bold; text-align: center">Profit bulan ini : Rp <?php echo number_format($profit_bulan_ini, 0, ',', '.'); ?> ,-</h3>
            </div>
            <div class="icon" style="position: relative; top: -20px; left: 20px;">
                <i class="ion ion-bag" style="font-size: 40px; color: white;"></i>
            </div>
</div>
<br>

<div class="container-fluid">

<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-primary" style="background-color: #337ab7;">
            <div class="inner" style="padding: 10px;">
                <h3 style="color: white; font-weight: bold;"><?php echo $jumlah_pelanggan; ?></h3>
                <p style="color: white;">Jumlah Pelanggan</p>
            </div>
            <div class="icon" style="position: relative; top: -20px; left: 20px;">
                <i class="ion ion-bag" style="font-size: 40px; color: white;"></i>
            </div>
            <a href="index.php?page=pelanggan" class="small-box-footer" style="background-color: #286090; padding: 10px 20px; display: block; text-align: center; border-radius: 4px;">
                More info <i class="fa fa-arrow-circle-right" style="color: white;"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box" style="background-color: #00C716;">  
            <div class="inner" style="padding: 10px;">
                <h3 style="color: white; font-weight: bold;"><?php echo $jumlah_kategori; ?></h3>
                <p style="color: white;">Jumlah Kategori</p>
            </div>
            <div class="icon" style="position: relative; top: -20px; left: 20px;">
                <i class="ion ion-bag" style="font-size: 40px; color: white;"></i>
            </div>
            <a href="index.php?page=kategori" class="small-box-footer" style="background-color: #008f00; padding: 10px 20px; display: block; text-align: center; border-radius: 4px;">
                More info <i class="fa fa-arrow-circle-right" style="color: white;"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box" style="background-color: #EAC000;">
            <div class="inner" style="padding: 10px;">
                <h3 style="color: white; font-weight: bold;"><?php echo $jumlah_produk; ?></h3>
                <p style="color: white;">Jumlah Produk</p>
            </div>
            <div class="icon" style="position: relative; top: -20px; left: 20px;">
                <i class="ion ion-bag" style="font-size: 40px; color: white;"></i>
            </div>
            <a href="index.php?page=produk" class="small-box-footer" style="background-color: #caa000; padding: 10px 20px; display: block; text-align: center; border-radius: 4px;">
                More info <i class="fa fa-arrow-circle-right" style="color: white;"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box" style="background-color: #C70039;">
            <div class="inner" style="padding: 10px;">
                <h3 style="color: white; font-weight: bold;"><?php echo $jumlah_pembelian; ?></h3>
                <p style="color: white;">Jumlah Pembelian</p>
            </div>
            <div class="icon" style="position: relative; top: -20px; left: 20px;">
                <i class="ion ion-bag" style="font-size: 40px; color: white;"></i>
            </div>
            <a href="index.php?page=pembelian" class="small-box-footer" style="background-color: #af0021; padding: 10px 20px; display: block; text-align: center; border-radius: 4px;">
                More info <i class="fa fa-arrow-circle-right" style="color: white;"></i>
            </a>
        </div>
    </div>
</div>

<div>
        <!-- Elemen canvas untuk grafik -->
    <canvas id="grafikPembelian"></canvas>

    <script>
    // Ambil data dari PHP dan konversi ke JavaScript
    var dataTanggal = <?php echo $data_tanggal_chartjs; ?>;
    var dataTotal = <?php echo $data_total_chartjs; ?>;

    // Inisialisasi Chart.js untuk membuat grafik
    var ctx = document.getElementById('grafikPembelian').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line', // Jenis grafik (bisa diganti dengan 'bar' untuk bar chart, dst)
        data: {
            labels: dataTanggal, // Label sumbu X (tanggal pembelian)
            datasets: [{
                label: 'Total Pembelian',
                data: dataTotal, // Data sumbu Y (total pembelian)
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna area grafik
                borderColor: 'rgba(54, 162, 235, 1)', // Warna garis grafik
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Mulai sumbu Y dari nilai 0
                }
            },
            zoom:{
                enable: false //menonaktifkan perilaku zoom
            }
        }
    });
    </script>
</div>





        <!-- <div class="col-lg-3 col-6">

            <div class="small-box" style="background-color: #00C716;">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box" style="background-color: #EAC000;">
                <div class="inner">
                    <h3>44</h3>
                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box" style="background-color: #C70039;">
                <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div> -->


    <!-- <div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <tr>
                <td bgcolor="#FFFFFF">
                    <h5><img src="assets/img/adminhome.jpg" width="900" height="400" border="3" align="center" />. </h5>
                    <h5>
                    </h5>
                </td>
            </tr>

        </div>
    </div> -->