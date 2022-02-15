-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2021 pada 11.16
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_codeigniter_simtotis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_orders`
--

CREATE TABLE `tb_detail_orders` (
  `kode_tenant` int(11) NOT NULL,
  `tanggal_mulai` varchar(25) NOT NULL,
  `tanggal_akhir` varchar(25) NOT NULL,
  `harga_tenant` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `no_invoice` int(11) NOT NULL,
  `kode_pembayaran` int(11) NOT NULL,
  `status_order` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_orders`
--

INSERT INTO `tb_detail_orders` (`kode_tenant`, `tanggal_mulai`, `tanggal_akhir`, `harga_tenant`, `grand_total`, `no_invoice`, `kode_pembayaran`, `status_order`) VALUES
(18, '10-Feb-2021', '10-Feb-2021', 1700000, 1700000, 43, 255, 'Accept'),
(23, '11-Feb-2021', '11-Feb-2021', 500000, 500000, 43, 255, ''),
(24, '11-Feb-2021', '11-Feb-2021', 1700000, 1700000, 43, 255, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_orders`
--

CREATE TABLE `tb_orders` (
  `no_invoice` int(11) NOT NULL,
  `kode_pembayaran` int(11) NOT NULL,
  `tanggal_pesanan` varchar(25) NOT NULL,
  `tanggal_invoice` varchar(25) NOT NULL,
  `status_pesanan` varchar(25) NOT NULL,
  `nama_pemesan` varchar(225) NOT NULL,
  `alamat_pemesan` text NOT NULL,
  `telepon_pemesan` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_orders`
--

INSERT INTO `tb_orders` (`no_invoice`, `kode_pembayaran`, `tanggal_pesanan`, `tanggal_invoice`, `status_pesanan`, `nama_pemesan`, `alamat_pemesan`, `telepon_pemesan`, `id_user`) VALUES
(43, 255, '08-Feb-2021', '08-Feb-2021', 'Menunggu Pembayaran', 'Pieter Allan Cornelis Serowero', 'Asrama TNI Yang Batu Denpasar', '089681812325', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_payments`
--

CREATE TABLE `tb_payments` (
  `kode_pembayaran` int(11) NOT NULL,
  `tanggal_pembayaran` varchar(25) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `bukti_pelunasan` varchar(255) NOT NULL,
  `bukti_dp` varchar(255) NOT NULL,
  `batas_pembayaran` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_payments`
--

INSERT INTO `tb_payments` (`kode_pembayaran`, `tanggal_pembayaran`, `metode_pembayaran`, `status_pembayaran`, `total_pembayaran`, `total_bayar`, `bukti_pelunasan`, `bukti_dp`, `batas_pembayaran`, `bank`) VALUES
(255, '', 'Down Payment', 'Belum Bayar', 3900000, 0, '', '', '08-Feb-2021 18:50:26', 'BNI - XXXXXXX');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_photos`
--

CREATE TABLE `tb_photos` (
  `kode_photo` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kode_tenant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_photos`
--

INSERT INTO `tb_photos` (`kode_photo`, `foto`, `kode_tenant`) VALUES
(54, 'wedding_4.jpg', 17),
(55, 'makeup1.JPG', 18),
(57, 'makeup3.JPG', 19),
(58, 'wedding_2.jpg', 20),
(59, 'makeup2.JPG', 22),
(60, 'mitha2.JPG', 24),
(61, 'wedding_5.jpg', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tenants`
--

CREATE TABLE `tb_tenants` (
  `kode_tenant` int(11) NOT NULL,
  `nama_tenant` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga_tenant` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `logo` varchar(255) NOT NULL,
  `alamat_tenant` text NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tenants`
--

INSERT INTO `tb_tenants` (`kode_tenant`, `nama_tenant`, `keterangan`, `status`, `kategori`, `harga_tenant`, `qty`, `tanggal_masuk`, `tanggal_keluar`, `logo`, `alamat_tenant`, `kecamatan`, `kabupaten`, `provinsi`, `id_user`) VALUES
(17, 'Dua Pixel', 'Aktif', 'Available', 'Photographer', 2800000, 1, '2021-01-07', '2021-02-07', 'dua_pixel.JPG', 'Jl. I Wayan Tarunga, Br. Senapahan Kelod, Kelurahan, Banjar Anyar', 'Kediri', 'Tabanan', 'Bali', 9),
(18, 'Jik Oka Photographer', 'Aktif', 'Available', 'Photographer', 1700000, 1, '2021-01-09', '2021-02-09', 'jikoka_photographer.JPG', 'Jl. I Wayan Tarunga, Br. Senapahan Kelod, Kelurahan, Banjar Anyar', 'Kediri', 'Tabanan', 'Bali', 10),
(19, 'BM Studio Bali', 'Aktif', 'Available', 'Photographer', 1700000, 1, '2021-01-10', '2021-02-10', 'bm_studio.JPG', 'Jl. Tukad Irawadi Gg. 19X No.10, Panjer', 'Denpasar Selatan', 'Denpasar', 'Bali', 10),
(20, 'Anita Photo Bali', 'Aktif', 'Available', 'Photographer', 1800000, 1, '2021-01-15', '2021-02-15', 'Anita_Photo.JPG', 'Jl. Ahmad Yani Utara No.415, Peguyangan', 'Denpasar Utara', 'Denpasar', 'Bali', 9),
(22, 'Rhini Natural Klasi Team', 'Aktif', 'Available', 'Makeup Artist', 500000, 1, '2021-01-23', '2021-01-23', 'Rhini_Natural.JPG', 'Jl. I Wayan Tarunga, Br. Senapahan Kelod, Kelurahan, Banjar Anyar', 'Denpasar Timur', 'Denpasar', 'Bali', 11),
(23, 'Day In Beauty Salon', 'Aktif', 'Available', 'Makeup Artist', 500000, 1, '2021-01-25', '2021-01-25', 'day_inbeautysalon.JPG', 'Jl. Gadung, Belakang SMA Negeri 1 Denpasar', 'Denpasar Timur', 'Denpasar', 'Bali', 12),
(24, 'Mita Rahayu Dewi', 'Aktif', 'Available', 'Endorse', 1700000, 1, '2021-01-31', '2021-01-31', 'mitha2.JPG', 'Jl. I Wayan Tarunga, Br. Senapahan Kelod, Kelurahan, Banjar Anyar', 'Denpasar Selatan', 'Denpasar', 'Bali', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `nama_panggilan` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon_pengguna` varchar(255) NOT NULL,
  `alamat_pengguna` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama_pengguna`, `nama_panggilan`, `email`, `password`, `telepon_pengguna`, `alamat_pengguna`, `foto`, `role_id`) VALUES
(1, 'Marcello Imanuel Mariano Serowero', 'Marcell', 'marcelloimanuel25@gmail.com', 'admin', '089660909030', 'BTN. Taman Sari Br. Sibang Jagapati', 'marcell.jpg', 1),
(9, 'Dede Wijata', 'Dede', 'dede@gmail.com', '1234', '14045', 'Kediri - Tabanan - Bali', 'dede.JPG', 3),
(10, 'I Gusti Nyoman Oka Wiryadana', 'Jik Oka', 'jikoka@gmail.com', '1234', '14045', 'Kediri - Tabanan - Bali', 'jikoka2.jpg', 3),
(11, 'Ida Ayu Ritra', 'Ita', 'ritra@gmail.com', '1234', '14045', 'Denpasar Timur - Denpasar - Bali', 'ritra2.jpg', 3),
(12, 'Mitha Rahayu', 'Mitha', 'mitha@gmail.com', '1234', '14045', 'Denpasar Timur - Denpasar', 'mitha.JPG', 3),
(13, 'Anak Agung Hendra', 'Hendra', 'hendra@gmail.com', '1234', '14045', 'Denpasar Timur - Denpasar - Bali', 'gunk_hendra.JPG', 3),
(14, 'Pieter Allan Cornelis Serowero', 'Allan', 'pieter@gmail.com', '1234', '089681812325', '', 'avatar5.png', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_videos`
--

CREATE TABLE `tb_videos` (
  `kode_video` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `kode_tenant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_videos`
--

INSERT INTO `tb_videos` (`kode_video`, `video`, `kode_tenant`) VALUES
(15, '2021-02-03_videoplayback.mp4', 17),
(16, '2021-02-03_videoplayback1.mp4', 18),
(18, '2021-02-03_makeup1.mp4', 19),
(19, '2021-02-03_makeup11.mp4', 20),
(20, '2021-02-03_makeup12.mp4', 22),
(21, '2021-02-03_videoplayback2.mp4', 24),
(22, '2021-02-03_makeup13.mp4', 20);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`no_invoice`);

--
-- Indeks untuk tabel `tb_payments`
--
ALTER TABLE `tb_payments`
  ADD PRIMARY KEY (`kode_pembayaran`);

--
-- Indeks untuk tabel `tb_photos`
--
ALTER TABLE `tb_photos`
  ADD PRIMARY KEY (`kode_photo`);

--
-- Indeks untuk tabel `tb_tenants`
--
ALTER TABLE `tb_tenants`
  ADD PRIMARY KEY (`kode_tenant`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_videos`
--
ALTER TABLE `tb_videos`
  ADD PRIMARY KEY (`kode_video`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `no_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tb_payments`
--
ALTER TABLE `tb_payments`
  MODIFY `kode_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT untuk tabel `tb_photos`
--
ALTER TABLE `tb_photos`
  MODIFY `kode_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `tb_tenants`
--
ALTER TABLE `tb_tenants`
  MODIFY `kode_tenant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_videos`
--
ALTER TABLE `tb_videos`
  MODIFY `kode_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
