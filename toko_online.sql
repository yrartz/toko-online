-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Jan 2021 pada 00.56
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-24-080640', 'App\\Database\\Migrations\\User', 'default', 'App', 1608804884, 1),
(2, '2020-12-24-080654', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1608804884, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `stok`, `berat`, `harga`, `deskripsi`, `slug`, `gambar`, `created_at`, `updated_at`) VALUES
(11, 'Ucing kampung', 142, 700, 100000, 'Ucing kampung asli tanpa bahan kimia, pakannya alami, selalu dijemur di bawah sinar matahari siang', 'ucing-kampung', '1608962791_9d76887c6a372541034e.jpg', '2020-12-25 21:35:26', '2020-12-31 00:00:03'),
(13, 'Sarden', 0, 0, 15000, 'Sarden asli ikan laut segar tanpa bahan pengawet, tanpa bahan kimia. ', 'sarden', '1609334807_58f4c062db97b2e82c7b.jpg', '2020-12-30 07:26:47', '2020-12-30 07:32:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `total_harga` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kurir` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `username`, `produk`, `nama`, `email`, `telepon`, `jumlah`, `berat`, `total_harga`, `alamat`, `provinsi`, `kota`, `kurir`, `ongkir`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(8, 'userbiasa', 'Ucing kampung', 'Emeh Suremeh', 'editfotobgr@gmail.com', '087770294135', 2, 700, '218000', ' Kebun raya Bogor\r\n            ', 'Jawa Barat', 'Bogor', 'JNE City Courier', 18000, '1609394403_033e55d6b002bd68165c.jpg', 1, '2020-12-31 00:00:03', '2020-12-31 00:04:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `role`, `created_at`, `updated_at`) VALUES
(1, 'yrartz', '6d7d5cc6653b96fb0526f19c6638e033', '5fe4791a0b3095.79180337', 'admin', '2020-12-24 05:18:50', '2020-12-24 05:18:50'),
(4, 'userbiasa', 'd009967bc7758445be26cdcf631343d9', '5fe97de091c482.34632729', 'user', '2020-12-28 00:40:32', '2020-12-28 00:40:32'),
(5, 'userbiasa2', '75f5221276abae9a33c6f21dbe5374a4', '5fed2d1a1fd847.80712741', 'user', '2020-12-30 19:44:58', '2020-12-30 19:44:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
