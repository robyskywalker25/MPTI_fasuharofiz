-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2021 pada 08.27
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoribj`
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
(8, 'Baju Kemeja'),
(12, 'Jaket'),
(14, 'Celana Wanita'),
(15, 'Sajadah');

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
(1, 'Jambi-BatangHari', 22000),
(2, 'Jambi-Bungo', 22000),
(3, 'Jambi-Kerinci', 22000),
(4, 'Jambi-Merangin', 16000),
(5, 'Jambi-Sarolangun', 28000),
(6, 'Jambi-Tebo', 16000),
(7, 'Jambi-SungaiPenuh', 22000);

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
(5, 6, 'lancelot', 'bri', 222000, '2021-07-25', '20210725155423afaf890e0e3c51e2c81cb212f6e9243b.jpg');

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
(7, 3, 1, '2021-07-26', 127000, 'Jambi-BatangHari', 22000, 'Kambang', 'pending', '');

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
(8, 7, 104, 1, 'Celana Karet', 105000, 700, 700, 105000);

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
(94, 'jaket maroon ALL SIZE ', '12', 100000, 3, 500, '1.jpeg', ' Jaket Polos berbahan tebal ukuran all size cocok dipakai saat musim hujan maupun olahraga dengan bahan yang tebal tapi tidak bikin gerah '),
(95, 'Jaket HIjau', '12', 100000, 4, 500, '5.jpeg', 'Jaket Wanita Polos Berbahan tebal ukuran XL '),
(96, 'Tunik Grey ALL SIZE', '8', 145000, 1, 500, '3.jpeg', ' Kemeja tunik abu-abu dengan full kancing dan lengan panjang. Bahan adem dan jatuh dengan detail kancing di pergelangan tangan.\r\n					\r\n					\r\n		'),
(97, 'Celana Levis Kancing Timbul ', '14', 225000, 0, 600, '2.jpeg', 'Celana Panjang wanita good quality tebal dan halus enak nyaman dipakai		\r\n		'),
(98, 'Sajadah Travel', '15', 35000, 2, 500, 'sa1.jpg', 'Sajadah Travel cocok dibawa saat berpergian kemana saja  \r\n		'),
(99, 'Knit Top Import ALL SIZE', '8', 125000, 3, 500, 'ba1.jpg', ' Knit import tebal kombinasi cotton premium, dengan tunik putih di bagian dalam.			\r\n		'),
(100, 'Midi Dress Rawis ALL SIZE', '8', 120000, 3, 500, 'ba2.jpg', ' Dress Midi dengan detail rawis di tangan. Bahan kantun import yang jatuh.			\r\n		'),
(101, 'Dress Daisy ALL SIZE', '8', 120000, 3, 500, 'ba3.jpg', 'Dress panjang dengan motif bunga daisy full kancing.	\r\ncocok untuk meet up bareng teman\r\n					\r\n		'),
(102, 'Kaos Cartun Uk M', '8', 120000, 3, 500, 'ba4.jpg', ' Kaos lengan pendek dengan gambar kartun. Bahan lembut dan jatuh		\r\n					\r\n		'),
(103, 'Switter rawis Fit to XL', '8', 65000, 2, 500, 'ba5.jpg', ' bahan tebal dan nyaman dipakai langsung berkualitas dan jahitan rapih \r\ntidak panas dipakai cocok untuk hangout 			\r\n		'),
(104, 'Celana Karet', '14', 105000, 1, 700, 'cel1.jpg', 'bahan premium nyaman dipakai,tidak kaku,tebal,halus jaminan mutu \r\nbagian karet bisa di addjust sehingga tidak begah dipakai	\r\n		'),
(105, 'Celana Kulot ALL SIZE Fit XL', '14', 110000, 2, 700, 'cel2.jpg', 'celana kulot panjang bahan sangat adem dan berkualitas sangat nyaman digunakan saat pergi bersantai\r\npanjang 90cm \r\n \r\n		'),
(106, 'Sajadah Travel hijau', '15', 30000, 2, 200, 'sa2.jpg', 'Sajadah Travel cocok untuk dibawa bepergian mudah dibawa kemana saja		\r\n		');

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
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
