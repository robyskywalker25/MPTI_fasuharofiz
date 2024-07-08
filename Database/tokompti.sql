-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2024 pada 16.19
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
(19, 'Minuman');

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
(1, 'lancelot@gmail.com', 'lancelot', 'Lancelot', '085678643564', 'jl. awanbiru no 32 kota kebumenn'),
(2, 'boby@gmail.com', 'boby', 'Boby', '0856837453', 'jl. cendrawasih no 1 kota surakarta'),
(3, 'ronald@gmail.com', 'ronald', 'Ronald', '0816357826', 'jl. bukajaya no 32 Yogyakartaaaa'),
(4, 'ridwan@gmail.com', 'ridwan', 'Ridwan', '08278378462', 'jl. mahabaru no 44 semarang'),
(6, 'renisetya@gmail.com', 'renysetya', 'Reni', '08178468264', 'jl. Jogja magelang '),
(11, 'frontend@gmail.com', 'frontend', 'Frontend', '085764836743', 'jl code no 1 Kota Magelang');

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
(6, 8, 'pak bakpia', 'bri', 125000, '2024-05-11', '20240511042703Japan Map.jpeg'),
(7, 9, 'lancelot', 'bca', 35000, '2024-05-11', '20240511043319Japan Map.jpeg'),
(8, 10, 'Mufti', 'bca', 67000, '2024-05-11', '20240511050701Screenshot 2023-09-01 100752.png'),
(9, 12, 'saya', 'bri', 30000, '2024-06-20', '2024062007561730-1.jpg'),
(10, 13, 'Saya', 'bri', 141000, '2024-07-01', '20240701061909'),
(11, 14, 'si penyetor', 'bca', 106000, '2024-07-01', '20240701062225ilustrasi-struk-atm_169.jpg'),
(12, 15, 'saya', 'bca', 30000, '2024-07-01', '20240701091010ilustrasi-struk-atm_169.jpg'),
(13, 16, 'penyetor', 'bca', 79000, '2024-07-01', '20240701091717ilustrasi-struk-atm_169.jpg'),
(14, 17, 'saya ', 'bri', 107000, '2024-07-01', '20240701092507ilustrasi-struk-atm_169.jpg'),
(15, 18, 'si penyetor', 'bri', 85000, '2024-07-01', '20240701151638ilustrasi-struk-atm_169.jpg'),
(16, 19, 'saya', 'bri', 99000, '2024-07-02', '20240702044057ilustrasi-struk-atm_169.jpg'),
(17, 22, 'Ronald', 'bri', 10000, '2024-07-07', '20240707114737contoh-kwitansi-pembayaran.jpg'),
(18, 23, 'Boby', 'BRI', 10000, '2024-07-07', '20240707115504ilustrasi-struk-atm_169.jpg'),
(19, 24, 'si ronald', 'BCA', 21000, '2024-07-07', '20240707115938contoh-kwitansi-pembayaran.jpg'),
(20, 25, 'odette', 'BCA', 55000, '2024-07-07', '20240707163457contoh-kwitansi-pembayaran.jpg'),
(21, 26, 'pak ridwan', 'BCA', 27000, '2024-07-07', '20240707164431ilustrasi-struk-atm_169.jpg'),
(22, 27, 'si ridwan', 'BRI', 55000, '2024-07-07', '20240707165207contoh-kwitansi-pembayaran.jpg'),
(23, 28, 'renisetya', 'BCA', 67000, '2024-07-08', '20240708131639contoh-kwitansi-pembayaran.jpg'),
(24, 29, 'saya', 'BRI', 45000, '2024-07-08', '20240708134633ilustrasi-struk-atm_169.jpg'),
(25, 30, 'Si Frontend', 'BRI', 130000, '2024-07-08', '20240708151230contoh-kwitansi-pembayaran.jpg');

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
(12, 6, 1, '2024-06-20', 30000, 'Yogyakarta - Magelang', 5000, 'semarang', 'lunas', '123123213'),
(16, 1, 3, '2024-07-01', 79000, 'Yogyakarta-Surakarta', 10000, 'jl. juara no 34 kota surakarta', 'lunas', '32234325325'),
(17, 1, 2, '2024-07-01', 107000, 'Yogyakarta-Semarang', 15000, 'jl imam bonjol no 23 kota semarang', 'lunas', '4565645646'),
(18, 1, 4, '2024-07-01', 85000, 'Yogyakarta-Wonosobo', 16000, 'Jl sejahtera no.12 Kota Wonosobo', 'lunas', '3242351351'),
(19, 1, 3, '2024-07-02', 99000, 'Yogyakarta-Surakarta', 10000, 'jl imam bomjol no 23 kota surakata', 'lunas', '563556356'),
(21, 3, 1, '2024-07-07', 28000, 'Yogyakarta - Magelang', 5000, 'magelang', 'pending', ''),
(22, 3, 6, '2024-07-07', 10000, 'Yogyakarta-Klaten', 5000, 'klaten', 'barang dikirim', '12314314'),
(23, 2, 5, '2024-07-07', 10000, 'Yogyakarta-Purworejo', 5000, 'Purworejo', 'sudah kirim pembayaran', ''),
(24, 3, 4, '2024-07-07', 21000, 'Yogyakarta-Wonosobo', 16000, 'wonosobo', 'sudah kirim pembayaran', ''),
(25, 1, 2, '2024-07-07', 55000, 'Yogyakarta-Semarang', 15000, 'jl merpati no 23 kota semarang', 'lunas', '3242432'),
(26, 4, 7, '2024-07-07', 27000, 'Yogyakarta-Kebumen', 17000, 'jl gajahmada no12 kota kebumen', 'lunas', '8678686'),
(27, 4, 5, '2024-07-07', 55000, 'Yogyakarta-Purworejo', 5000, 'jl sudirman no 8 kota purworejo', 'lunas', '565655544'),
(28, 6, 2, '2024-07-08', 67000, 'Yogyakarta-Semarang', 15000, 'jl segiempat no 12 kota semarang', 'lunas', '98342434'),
(29, 6, 5, '2024-07-08', 45000, 'Yogyakarta-Purworejo', 5000, 'jl. mawar no 3 kota purworejo', 'lunas', '2343242343'),
(30, 11, 1, '2024-07-08', 130000, 'Yogyakarta - Magelang', 5000, 'jl. hateemel no 1 Kota Magelang', 'lunas', '45645634232');

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
(9, 8, 108, 6, 'Bakpia Kacang Hijau', 20000, 250, 1500, 120000),
(10, 9, 108, 1, 'Bakpia Kacang Hijau', 20000, 250, 250, 20000),
(11, 10, 116, 10, 'Wedhang Uwuh Kemasan', 5000, 25, 250, 50000),
(12, 11, 113, 1, 'Bakpia Keju', 22000, 250, 250, 22000),
(13, 12, 121, 1, 'Bakpia Kumbu Hitam', 25000, 250, 250, 25000),
(14, 13, 108, 5, 'Bakpia Kacang Hijau', 20000, 250, 1250, 100000),
(15, 13, 119, 1, 'Bakpia Susu', 24000, 250, 250, 24000),
(16, 14, 119, 4, 'Bakpia Susu', 24000, 250, 1000, 96000),
(17, 15, 121, 1, 'Bakpia Kumbu Hitam', 25000, 250, 250, 25000),
(18, 16, 120, 3, 'Bakpia Tiramissu', 23000, 225, 675, 69000),
(19, 17, 110, 4, 'Bakpia Coklat', 23000, 250, 1000, 92000),
(20, 18, 110, 3, 'Bakpia Coklat', 23000, 250, 750, 69000),
(21, 19, 117, 3, 'Bakpia Green Tea', 22000, 225, 675, 66000),
(22, 19, 120, 1, 'Bakpia Tiramissu', 23000, 225, 225, 23000),
(23, 20, 121, 2, 'Bakpia Kumbu Hitam', 25000, 250, 500, 50000),
(24, 21, 120, 1, 'Bakpia Tiramissu', 23000, 225, 225, 23000),
(25, 22, 123, 2, 'Wedhang Uwuh Kemasan', 2500, 100, 200, 5000),
(26, 23, 123, 2, 'Wedhang Uwuh Kemasan', 2500, 100, 200, 5000),
(27, 24, 123, 2, 'Wedhang Uwuh Kemasan', 2500, 100, 200, 5000),
(28, 25, 108, 2, 'Bakpia Kacang Hijau', 20000, 250, 500, 40000),
(29, 26, 123, 4, 'Wedhang Uwuh Kemasan', 2500, 100, 400, 10000),
(30, 27, 109, 2, 'Bakpia Cappucino', 25000, 225, 450, 50000),
(31, 28, 111, 2, 'Bakpia Durian', 26000, 250, 500, 52000),
(32, 29, 108, 2, 'Bakpia Kacang Hijau', 20000, 250, 500, 40000),
(33, 30, 121, 5, 'Bakpia Kumbu Hitam', 25000, 250, 1250, 125000);

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
(108, 'Bakpia Kacang Hijau', '16', 20000, 41, 250, 'bakpiakacanghijauFIX.png', ' Bakpia kacang hijau adalah camilan tradisional yang terbuat dari kacang hijau, gula, dan tepung terigu. Memiliki bentuk bulat pipih dengan kulit luar renyah dan bagian dalam lembut, bakpia ini menawarkan rasa manis legit dari kacang hijau dan sedikit gurih dari tepung terigu.			\r\n		'),
(109, 'Bakpia Cappucino', '16', 25000, 13, 225, 'bakpiacappicinoFIX.png', ' Bakpia Cappucino adalah varian rasa unik dan populer dari bakpia Yogyakarta, yaitu kue kering isi khas Indonesia, yang memiliki isian rasa cappuccino. Perpaduan rasa kopi dan susu yang nikmat dengan tekstur lembut dan creamy menjadikannya camilan lezat dan memuaskan, cocok untuk pecinta kopi dan mereka yang menyukai makanan penutup ringan.			\r\n		'),
(110, 'Bakpia Coklat', '16', 23000, 13, 250, 'bakpiacoklatFIX.png', 'Bakpia Cokelat, varian bakpia legendaris dari Yogyakarta, memanjakan lidah dengan isian cokelat yang kaya dan nikmat. Lapisan luar yang tipis dan kecokelatan dengan tekstur sedikit renyah berpadu sempurna dengan isian cokelat yang lembut dan creamy. Cokelatnya yang terbuat dari bubuk kakao berkualitas tinggi menghasilkan rasa cokelat yang dalam dan intens, perpaduan manis dan sedikit pahit yang menggoda. Ada juga varian dengan tambahan kacang cincang atau choco chips untuk menambah sensasi tekstur dan rasa. Nikmati Bakpia Cokelat sendiri atau bersama kopi atau teh hangat, dan jadikan ini sebagai oleh-oleh atau bingkisan yang tak terlupakan.'),
(111, 'Bakpia Durian', '16', 26000, 11, 250, 'bakpiadurianFIX.png', 'Bakpia Durian adalah perpaduan istimewa antara kelembutan bakpia khas Yogyakarta dan kelezatan durian yang menggoda. Kulit luarnya yang tipis dan keemasan membungkus isian durian yang berwarna kuning cerah dan beraroma semerbak. Teksturnya yang lembut dan lumer di mulut berpadu sempurna dengan rasa durian yang manis, legit, dan sedikit pahit, menghadirkan sensasi rasa yang tak terlupakan.'),
(116, 'Wedhang Uwuh Kemasan', '17', 5000, 40, 25, 'wedhanguwuhkemasanFIX.jpg', 'Wedang Uwuh, minuman tradisional Indonesia yang menghangatkan tubuh, berasal dari Yogyakarta. Nama uniknya, \"uwuh\" yang berarti sampah dalam Bahasa Jawa, merujuk pada rempah-rempah dan dedaunan kering yang terlihat seperti mengambang bebas. Rempah ini, seperti jahe, kayu secang, dan cengkeh, diseduh dalam air panas menghasilkan minuman berwarna merah cerah dengan aroma harum rempah.'),
(117, 'Bakpia Green Tea', '16', 22000, 17, 225, 'bakpiagreenteaFIX.png', 'Bakpia Green Tea hadir sebagai perpaduan unik antara kue kering isi khas Yogyakarta dengan cita rasa teh hijau yang menyegarkan. Lapisan luarnya yang tipis dan berwarna cokelat keemasan membungkus isian berwarna hijau cerah dengan aroma teh hijau yang lembut. Teksturnya yang lembut dan lumer di mulut berpadu dengan rasa teh hijau yang manis, sedikit pahit, dan menyegarkan, menciptakan sensasi rasa yang tak terlupakan. Digemari pecinta teh hijau dan penikmat bakpia, Bakpia Green Tea ini menjadi camilan lezat yang wajib dicoba.  Nikmati sendiri, bersama keluarga dan teman, atau jadikan oleh-oleh yang istimewa.'),
(118, 'Bakpia Keju', '16', 22000, 14, 250, 'bakpiakejuFIX.png', 'Bakpia Keju, varian legendaris bakpia asal Yogyakarta,  menggoda selera dengan isian keju yang gurih dan nikmat. Lapisan luar yang tipis kecokelatan dengan tekstur sedikit renyah, berpadu sempurna dengan isian keju yang lembut dan lumer di mulut.  Kejunya biasanya perpaduan cheddar dan mozzarella berkualitas tinggi, menghadirkan rasa gurih asin yang memuaskan.  Beberapa varian mungkin ditambah rempah-rempah untuk menambah kompleksitas rasa.  Bakpia Keju bisa dinikmati sendiri atau dengan kopi atau teh hangat.  Ini juga pilihan favorit untuk oleh-oleh,  sebagai representasi rasa bakpia klasik yang disukai banyak orang.'),
(119, 'Bakpia Susu', '16', 24000, 10, 250, 'bakpiasusuFIX.jpg', 'Bakpia Susu memanjakan lidah dengan perpaduan istimewa antara kelembutan bakpia khas Yogyakarta dan kelezatan susu yang manis. Kulit luarnya yang tipis dan keemasan membungkus isian susu berwarna putih susu yang lembut dan beraroma harum. Teksturnya yang lumer di mulut berpadu sempurna dengan rasa manis susu yang creamy dan sedikit gurih, menghadirkan sensasi rasa yang tak terlupakan. Digemari pecinta rasa manis dan penikmat bakpia, Bakpia Susu ini menjadi camilan lezat yang wajib dicoba. Nikmati sendiri, bersama keluarga dan teman, atau jadikan oleh-oleh yang istimewa.'),
(120, 'Bakpia Tiramissu', '16', 23000, 6, 225, 'bakpiatiramissuFIX.png', 'Bakpia Tiramisu menghadirkan perpaduan unik antara kelembutan bakpia khas Yogyakarta dan cita rasa klasik tiramisu yang kaya. Kulit luarnya yang tipis dan keemasan membungkus isian berwarna coklat kehitaman dengan aroma kopi yang menggoda. Teksturnya yang lembut dan lumer di mulut berpadu sempurna dengan rasa manis kopi yang diseimbangkan dengan sedikit pahitnya coklat dan keju mascarpone, menghadirkan sensasi rasa yang tak terlupakan. Digemari pecinta tiramisu dan penikmat bakpia, Bakpia Tiramisu ini menjadi camilan lezat yang wajib dicoba. Nikmati sendiri, bersama keluarga dan teman, atau jadikan oleh-oleh yang istimewa.'),
(121, 'Bakpia Kumbu Hitam', '16', 25000, 21, 250, 'bakpiakumbuhitamFIX.jpg', ' Bakpia Kumbu Hitam merupakan varian bakpia yang menghadirkan sensasi rasa unik dan berbeda dari bakpia tradisional. Perpaduan istimewa antara kelembutan bakpia khas Yogyakarta dan kelezatan kacang merah yang manis legit, menghasilkan camilan lezat yang disukai banyak orang.		\r\n					\r\n		'),
(123, 'Wedhang Uwuh Kemasan', '19', 2500, 40, 100, 'wedhanguwuhkemasanFIX.jpg', ' Wedang uwuh adalah minuman dengan bahan-bahan yang berupa dedaunan mirip dengan rempah. Dalam bahasa Jawa, Wedang berarti minuman yang diseduh, sedangkan uwuh berarti sampah. Wedang uwuh disajikan panas atau hangat memiliki rasa manis dan pedas dengan warna merah cerah dan aroma harum.			\r\n		');

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
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
