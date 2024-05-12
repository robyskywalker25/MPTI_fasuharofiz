-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Bulan Mei 2024 pada 16.14
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokompti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(16, 'Bakpia'),
(17, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(6) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Yogyakarta - Magelang', 5000),
(2, 'Yogyakarta-Semarang', 15000),
(3, 'Yogyakarta-Surakarta', 10000),
(4, 'Yogyakarta-Wonosobo', 16000),
(5, 'Yogyakarta-Purworejo', 5000),
(6, 'Yogyakarta-Klaten', 5000),
(7, 'Yogyakarta-Kebumen', 17000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email`, `password`, `nama_pelanggan`, `telepon`, `alamat`) VALUES
(1, 'lancelot@gmail.com', 'lancelot', 'Lancelot', '097654', 'jl. baru'),
(2, 'jonson@gmail.com', 'jonson', 'jonson', '09876543', 'jln kota baru'),
(3, 'anggi@gmail.com', 'anggi', 'anggi', '098765', 'jambi'),
(4, 'sony@gmail.com', 'sony', 'sony', '082179761220', 'jjjzsh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 1, 'Lancelot', 'bri', 247000, '2021-07-17', '20210717062455FB_IMG_1437282787040.jpg'),
(2, 2, 'anggi', 'bri', 386000, '2021-07-24', '20210724051557afaf890e0e3c51e2c81cb212f6e9243b.jpg'),
(3, 3, 'anggi', 'bni', 167000, '2021-07-24', '20210724061501afaf890e0e3c51e2c81cb212f6e9243b.jpg'),
(4, 4, 'khan', 'bri', 145000, '2021-07-24', '20210724080257afaf890e0e3c51e2c81cb212f6e9243b.jpg'),
(5, 6, 'lancelot', 'bri', 222000, '2021-07-25', '20210725155423afaf890e0e3c51e2c81cb212f6e9243b.jpg'),
(6, 8, 'pak bakpia', 'bri', 125000, '2024-05-11', '20240511042703Japan Map.jpeg'),
(7, 9, 'lancelot', 'bca', 35000, '2024-05-11', '20240511043319Japan Map.jpeg'),
(8, 10, 'Mufti', 'bca', 67000, '2024-05-11', '20240511050701Screenshot 2023-09-01 100752.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(6) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tgl_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(1, 1, 1, '2021-07-17', 247000, 'Jambi-BatangHari', 22000, 'jln yuuk, rt 01 batanghari city', 'barang dikirim', '987654'),
(2, 3, 4, '2021-07-24', 386000, 'Jambi-Merangin', 16000, 'hiuhwhiihkwkwj', 'barang dikirim', '09876547888'),
(3, 3, 3, '2021-07-24', 167000, 'Jambi-Kerinci', 22000, 'jambi', 'barang dikirim', '124'),
(6, 1, 1, '2021-07-25', 222000, 'Jambi-BatangHari', 22000, 'jlnjln', 'barang dikirim', '0987111'),
(7, 3, 1, '2021-07-26', 127000, 'Jambi-BatangHari', 22000, 'Kambang', 'pending', ''),
(8, 1, 1, '2024-05-11', 125000, 'Yogyakarta - Magelang', 5000, 'magelang', 'sudah kirim pembayaran', ''),
(9, 1, 2, '2024-05-11', 35000, 'Yogyakarta-Semarang', 15000, 'semarang', 'lunas', ''),
(10, 1, 7, '2024-05-11', 67000, 'Yogyakarta-Kebumen', 17000, 'kota kebumen', 'lunas', ''),
(11, 1, 3, '2024-05-11', 32000, 'Yogyakarta-Surakarta', 10000, 'surakarta', 'pending', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 97, 1, 'Celana Levis', 225000, 600, 600, 225000),
(2, 2, 96, 1, 'Baju Wanita', 145000, 500, 500, 145000),
(3, 2, 97, 1, 'Celana Levis', 225000, 600, 600, 225000),
(4, 3, 96, 1, 'Baju Wanita', 145000, 500, 500, 145000),
(5, 4, 96, 1, 'Baju Wanita', 145000, 500, 500, 145000),
(6, 5, 97, 1, 'Celana Levis', 225000, 600, 600, 225000),
(7, 6, 94, 2, 'jaket maroon', 100000, 500, 1000, 200000),
(8, 7, 104, 1, 'Celana Karet', 105000, 700, 700, 105000),
(9, 8, 108, 6, 'Bakpia Kacang Hijau', 20000, 250, 1500, 120000),
(10, 9, 108, 1, 'Bakpia Kacang Hijau', 20000, 250, 250, 20000),
(11, 10, 116, 10, 'Wedhang Uwuh Kemasan', 5000, 25, 250, 50000),
(12, 11, 113, 1, 'Bakpia Keju', 22000, 250, 250, 22000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `id_kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok_produk` int(10) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `harga`, `stok_produk`, `berat`, `foto_produk`, `deskripsi`) VALUES
(107, 'Bakpia Kumbu Hitam', '16', 20000, 10, 240, 'bakpiakumbuhitamFIX.png', ' Bakpia Kumbu Hitam dari Bakpiaku terbuat dari bahan dasar Kacang Tholo atau sering disebut kacang merah. Warna Hitam alami berasal dari warna yang dihasilkan oleh Kacang Tholo itu sendiri. Tekstur khas dari kulit Bakpiaku sendiri yaitu tipis dan berlapis, dengan isian yang padat.			\r\n		'),
(108, 'Bakpia Kacang Hijau', '16', 20000, 10, 250, 'bakpiakacanghijauFIX.png', 'Bakpia kacang hijau adalah camilan tradisional yang terbuat dari kacang hijau, gula, dan tepung terigu. Memiliki bentuk bulat pipih dengan kulit luar renyah dan bagian dalam lembut, bakpia ini menawarkan rasa manis legit dari kacang hijau dan sedikit gurih dari tepung terigu.'),
(109, 'Bakpia Cappucino', '16', 25000, 15, 225, 'bakpiacappucinoFIX.png', 'Bakpia Cappucino adalah varian rasa unik dan populer dari bakpia Yogyakarta, yaitu kue kering isi khas Indonesia, yang memiliki isian rasa cappuccino. Perpaduan rasa kopi dan susu yang nikmat dengan tekstur lembut dan creamy menjadikannya camilan lezat dan memuaskan, cocok untuk pecinta kopi dan mereka yang menyukai makanan penutup ringan.'),
(110, 'Bakpia Coklat', '16', 23000, 20, 250, 'bakpiacoklatFIX.png', 'Bakpia Cokelat, varian bakpia legendaris dari Yogyakarta, memanjakan lidah dengan isian cokelat yang kaya dan nikmat. Lapisan luar yang tipis dan kecokelatan dengan tekstur sedikit renyah berpadu sempurna dengan isian cokelat yang lembut dan creamy. Cokelatnya yang terbuat dari bubuk kakao berkualitas tinggi menghasilkan rasa cokelat yang dalam dan intens, perpaduan manis dan sedikit pahit yang menggoda. Ada juga varian dengan tambahan kacang cincang atau choco chips untuk menambah sensasi tekstur dan rasa. Nikmati Bakpia Cokelat sendiri atau bersama kopi atau teh hangat, dan jadikan ini sebagai oleh-oleh atau bingkisan yang tak terlupakan.'),
(111, 'Bakpia Durian', '16', 26000, 13, 250, 'bakpiadurianFIX.png', 'Bakpia Durian adalah perpaduan istimewa antara kelembutan bakpia khas Yogyakarta dan kelezatan durian yang menggoda. Kulit luarnya yang tipis dan keemasan membungkus isian durian yang berwarna kuning cerah dan beraroma semerbak. Teksturnya yang lembut dan lumer di mulut berpadu sempurna dengan rasa durian yang manis, legit, dan sedikit pahit, menghadirkan sensasi rasa yang tak terlupakan.'),
(116, 'Wedhang Uwuh Kemasan', '17', 5000, 40, 25, 'wedhanguwuhkemasanFIX.jpg', 'Wedang Uwuh, minuman tradisional Indonesia yang menghangatkan tubuh, berasal dari Yogyakarta. Nama uniknya, \"uwuh\" yang berarti sampah dalam Bahasa Jawa, merujuk pada rempah-rempah dan dedaunan kering yang terlihat seperti mengambang bebas. Rempah ini, seperti jahe, kayu secang, dan cengkeh, diseduh dalam air panas menghasilkan minuman berwarna merah cerah dengan aroma harum rempah.'),
(117, 'Bakpia Green Tea', '16', 22000, 20, 225, 'bakpiagreenteaFIX.png', 'Bakpia Green Tea hadir sebagai perpaduan unik antara kue kering isi khas Yogyakarta dengan cita rasa teh hijau yang menyegarkan. Lapisan luarnya yang tipis dan berwarna cokelat keemasan membungkus isian berwarna hijau cerah dengan aroma teh hijau yang lembut. Teksturnya yang lembut dan lumer di mulut berpadu dengan rasa teh hijau yang manis, sedikit pahit, dan menyegarkan, menciptakan sensasi rasa yang tak terlupakan. Digemari pecinta teh hijau dan penikmat bakpia, Bakpia Green Tea ini menjadi camilan lezat yang wajib dicoba.  Nikmati sendiri, bersama keluarga dan teman, atau jadikan oleh-oleh yang istimewa.'),
(118, 'Bakpia Keju', '16', 22000, 14, 250, 'bakpiakejuFIX.png', 'Bakpia Keju, varian legendaris bakpia asal Yogyakarta,  menggoda selera dengan isian keju yang gurih dan nikmat. Lapisan luar yang tipis kecokelatan dengan tekstur sedikit renyah, berpadu sempurna dengan isian keju yang lembut dan lumer di mulut.  Kejunya biasanya perpaduan cheddar dan mozzarella berkualitas tinggi, menghadirkan rasa gurih asin yang memuaskan.  Beberapa varian mungkin ditambah rempah-rempah untuk menambah kompleksitas rasa.  Bakpia Keju bisa dinikmati sendiri atau dengan kopi atau teh hangat.  Ini juga pilihan favorit untuk oleh-oleh,  sebagai representasi rasa bakpia klasik yang disukai banyak orang.'),
(119, 'Bakpia Susu', '16', 24000, 15, 250, 'bakpiasusuFIX.jpg', 'Bakpia Susu memanjakan lidah dengan perpaduan istimewa antara kelembutan bakpia khas Yogyakarta dan kelezatan susu yang manis. Kulit luarnya yang tipis dan keemasan membungkus isian susu berwarna putih susu yang lembut dan beraroma harum. Teksturnya yang lumer di mulut berpadu sempurna dengan rasa manis susu yang creamy dan sedikit gurih, menghadirkan sensasi rasa yang tak terlupakan. Digemari pecinta rasa manis dan penikmat bakpia, Bakpia Susu ini menjadi camilan lezat yang wajib dicoba. Nikmati sendiri, bersama keluarga dan teman, atau jadikan oleh-oleh yang istimewa.'),
(120, 'Bakpia Tiramissu', '16', 23000, 11, 225, 'bakpiatiramissuFIX.png', 'Bakpia Tiramisu menghadirkan perpaduan unik antara kelembutan bakpia khas Yogyakarta dan cita rasa klasik tiramisu yang kaya. Kulit luarnya yang tipis dan keemasan membungkus isian berwarna coklat kehitaman dengan aroma kopi yang menggoda. Teksturnya yang lembut dan lumer di mulut berpadu sempurna dengan rasa manis kopi yang diseimbangkan dengan sedikit pahitnya coklat dan keju mascarpone, menghadirkan sensasi rasa yang tak terlupakan. Digemari pecinta tiramisu dan penikmat bakpia, Bakpia Tiramisu ini menjadi camilan lezat yang wajib dicoba. Nikmati sendiri, bersama keluarga dan teman, atau jadikan oleh-oleh yang istimewa.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
