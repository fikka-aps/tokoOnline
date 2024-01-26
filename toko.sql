-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2022 pada 12.47
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(60) NOT NULL,
  `total` int(100) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `resi` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_user`, `id_produk`, `jumlah`, `total`, `tanggal_pembelian`, `status`, `bukti`, `resi`) VALUES
(1, 1, 1, 3, 105000, '2022-06-06', 'Pesanan Selesai', 'Frame 1.png', 0),
(2, 1, 3, 6, 210000, '2022-06-06', 'Pesanan Selesai', 'Frame_13.png', 0),
(3, 1, 3, 2, 70000, '2022-06-06', 'Pesanan Selesai', 'Frame_14.png', 71653714),
(4, 2, 5, 3, 120000, '2022-06-06', 'belum dibayar', '', 0),
(5, 1, 1, 4, 140000, '2022-06-06', 'Menunggu Konfirmasi Pembayaran', 'kuis2.PNG', 0),
(6, 1, 1, 3, 105000, '2022-06-07', 'Pesanan Selesai', 'kuis1.PNG', 0),
(7, 1, 5, 3, 60000, '2022-06-07', 'belum dibayar', '', 0);

--
-- Trigger `penjualan`
--
DELIMITER $$
CREATE TRIGGER `penjualan_produk` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
	UPDATE produk SET stok=stok-NEW.jumlah
    WHERE id_produk=NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(90) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi`, `harga`, `stok`, `foto`) VALUES
(1, 'Makaroni Kering Pedas', 'Makaroni ini terbuat dengan cabai asli yang membakar mulut.', 35000, 61, 'Instagram_post_-_8.png'),
(2, 'Mie Kribo', 'Mie ini digoreng kemudian diberi bumbu yang membuat lidah bergoyang.', 30000, 45, 'Instagram_post_-_5.png'),
(3, 'Kripik Kaca', 'Bukan kaca asli melainkan produk olahan singkong yang membuatmu tidak bisa berhenti mengunyah.', 35000, 72, 'Instagram_post_-_7.png'),
(5, 'Usus Kering', 'Usus boleh kering tapi kantong jangan.', 40000, 34, 'Instagram_post_-_9.png'),
(7, 'Kripik Kaca Tidak Pedas', 'Keripik Kaca ini lebih nyaman untuk lidah dan tidak menimbulkan celekit-celekit.', 20000, 4, 'Instagram_post_-_1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `role`) VALUES
(1, 'Fikka Ayu Pamirtha Sary', 'fikka21', '12345', 'User'),
(2, 'Admin1', 'admin1', '12345', 'Admin'),
(4, 'Byun Baekhyun', 'bbhundred', '2121', 'User'),
(5, 'Hong Jisoo', 'joshuji', '12345', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `fk_produk` (`id_produk`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
