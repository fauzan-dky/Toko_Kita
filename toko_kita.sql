-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2021 pada 15.07
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_kita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_produk`
--

CREATE TABLE `daftar_produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(30) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `foto_produk` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_produk`
--

INSERT INTO `daftar_produk` (`id`, `nama_produk`, `harga_satuan`, `stok`, `kategori`, `foto_produk`, `deskripsi`, `created_at`, `update_at`) VALUES
(1, 'Buku', 3000, 490, 'Alat Tulis', 'buku.jpg.jpg', 'Buku tulis dengan isi 100 lembar.', '2021-03-18 01:08:13', '2021-03-18 01:08:13'),
(2, 'Buku Gambar A3', 5000, 40, 'Alat Tulis', 'buku gambar.jpg.jpg', 'Buku gambar dengan ukuran A3 (297 x 420 mm) dan berisi 10 lembar.', '2021-03-18 01:09:49', '2021-03-18 01:09:49'),
(3, 'Penggaris Kecil', 2500, 30, 'Alat Tulis', 'penggaris.jpg.jpg', 'Penggaris kecil dengan ukuran 30cm, berbahan alumunium.\r\nNOTE: dilarang untuk digunakan sebagai alat kekerasan!', '2021-03-18 01:10:33', '2021-03-18 01:10:33'),
(4, 'Penggaris Besar', 7000, 30, 'Alat Tulis', 'penggaris besar.jpg.jpg', 'Penggaris dengan ukuran 60cm, berbahan alumunium. Note: dilarang untuk digunakan sebagai alat kekerasan!', '2021-03-18 01:11:14', '2021-03-18 01:11:14'),
(5, 'Bolpoin Basah', 4000, 80, 'Alat Tulis', 'bolpoin basah.jpg.jpg', 'Bolpoin basah dengan kualitas terbaik, cepat kering dan tidak menganggu anda saat menulis.', '2021-03-18 01:11:54', '2021-03-18 01:11:54'),
(6, 'Bolpoin Standard', 2500, 30, 'Alat Tulis', 'bolpoin standard.jpg.jpg', 'Bolpoin merk standard cocok buat kamu yang suka menulis. Tekstur yang lunak dan mudah untuk digunakan saat menulis sangat membantu belajar/pekerjaan anda.', '2021-03-18 01:12:28', '2021-03-18 01:12:28'),
(7, 'Pensil 2B', 3000, 60, 'Alat Tulis', 'pensil 2b.jpg.jpg', 'Pensil 2B dengan kualitas terbaik, hasil tebal, dan tidak mudah patah.', '2021-03-18 01:13:12', '2021-03-18 01:13:12'),
(8, 'Pensil 2H', 3000, 50, 'Alat Tulis', 'pensil 2h.jpg.jpg', 'Pensil 2H dengan kualitas terbaik, bagus untuk digunakan untuk membuat sketsa gambar, dan tidak mudah patah.', '2021-03-18 01:13:52', '2021-03-18 01:13:52'),
(9, 'Pensil HB', 5000, 50, 'Alat Tulis', 'pensil hb.jpg.jpg', 'Pensil HB dengan kualitas terbaik, hasil tebal, dan tidak mudah patah.', '2021-03-18 01:14:31', '2021-03-18 01:14:31'),
(10, 'Isi Staples', 5000, 90, 'Alat Tulis', 'isi staples.jpg.jpg', 'Isi staples, tersedia dalam beberapa ukuran: kecil, sedang, dan besar. Kualitas terbaik dan kuat', '2021-03-18 01:17:27', '2021-03-18 01:17:27'),
(11, 'Samsung Smart TV 32\"', 1355000, 14, 'Elektronik', 'Samsung Smart TV 32in.jpg.jpg', 'Smart TV berukuran 32in dengan resolusi 1366x768', '2021-03-18 01:20:00', '2021-03-18 01:20:00'),
(12, 'Realme Smart TV', 3390000, 20, 'Elektronik', 'Realme Smart TV 43in.jpg.jpg', 'Realme Smart TV berukuran layar FHD 43 inci, rasio layar 16:9, teknologi layar Chroma Boost, prosesoor gambar ARM Cortex A53 Quad-core, GPU Mali-470 MP3, Quad speaker, Port HDMI 3x, Mendukung WiFi dan Bluetooth 5.0.', '2021-03-18 01:21:03', '2021-03-18 01:21:03'),
(13, 'Mi TV 55\'', 4999000, 25, 'Elektronik', 'Mi TV 55in.jpg.jpg', 'Smart TV Mi TV 4 dengan layar 4K UHD HDR 55 inci, berbekal dual speaker masing-masing 10W teknologi DOLBY AUDIO + DTS-HD, sistem operasi Android Pie 9.0 dengan UI PatchWall 3.0.RAM 2GB CPU quad-core.', '2021-03-18 01:21:52', '2021-03-18 01:21:52'),
(14, 'Samsung HW-Q67CT Soundbar', 5775000, 7, 'Elektronik', 'Samsung Sound Bar.jpg.jpg', 'Dolby Audio & DTS Virtual:X, Smart Sound Mode, HDMI', '2021-03-18 01:30:17', '2021-03-18 01:30:17'),
(15, 'Sony HT-S20R Soundbar', 3199000, 11, 'Elektronik', 'Sony HT-S20R Soundbar.jpg.jpg', 'Nikmati Sony\'s HT-S20R Soundbar home theater dengan lima speaker satu subwoofer, koneksi Bluetooth® dan nirkabel. Ciptakan suasana bioskop di rumah.\r\nEnjoy dramatic, high-quality surround sound from 5.1 separate audio channels with Dolby® Digital.', '2021-03-18 01:32:24', '2021-03-18 01:32:24'),
(16, 'Xiaomi Mi Soundbar', 999000, 20, 'Elektronik', 'Xiaomi Mi Soundbar.jpg.jpg', 'Driver. 2 x Treble / 4 x Bass / 2 x Medium Bass.\r\nFrekuensi Respon. 50Hz - 25000Hz ( -10dB )\r\nImpedance. 6 ohm.\r\nKoneksi. AUX Cable/Optical/SPDIF/Line-In/Bluetooth.\r\n83.00 x 7.20 x 8.70 cm / 32.68 x 2.83 x 3.43 inches.', '2021-03-18 01:35:15', '2021-03-18 01:35:15'),
(17, 'Kulkas LG', 6259000, 15, 'Elektronik', 'kulkas 2 pintu.jpg.jpg', 'Kulkas 2 Pintu 416L gross/ 384L nett Inverter Smart Compressor dengan Door Cooling+™ dan Moving Ice Maker - Black Steel\r\nDimensi: 700 x 1680 x 700mm', '2021-03-18 01:40:48', '2021-03-18 01:40:48'),
(18, 'Kulkas Sanken', 1699000, 25, 'Elektronik', 'Kulkas 1 pintu.jpg.jpg', 'Sanken SK-G186AH-MR Refrigerator memiliki teknologi dinding HD yang tebal dan padat. Dilengkapi dengan karet pintu berkualitas , suhu dan kesegaran makanan lebih stabil dan terjaga, kompressor bekerja lebih singkat dan paling hemat energi.', '2021-03-18 01:42:07', '2021-03-18 01:42:07'),
(19, 'Bawang Merah', 70000, 50, 'Makanan', 'bawang merah.jpg.jpg', 'Bawang merah dengan kualitas terbaik, dirawat dengan metode canggih sehingga menghasilkan bawang merah yang berkualias dan harga yang terjangkau.\r\n(NB: harga per/kg)', '2021-03-18 01:49:18', '2021-03-18 01:49:18'),
(20, 'Beras', 10000, 100, 'Makanan', 'beras.jpg.jpg', 'Beras putih tanpa pemutih, aman  untuk dikonsumsi, dan kualitas terbaik.\r\n(NB: harga per/kg)', '2021-03-18 01:50:18', '2021-03-18 01:50:18'),
(21, 'Cabe Rawit', 65000, 70, 'Makanan', 'cabe rawit.jpg.jpg', 'Cabe rawit kualitas terbaik, ditanam di daerah subur sehingga menghasilkan bibit cabe yang bagus dan berkualitas. \r\n(NB: harga per/kg)', '2021-03-18 01:51:59', '2021-03-18 01:51:59'),
(22, 'Daging Ayam', 35000, 45, 'Makanan', 'daging ayam.jpg.jpg', 'Daging ayam berkualitas, higenis, dan tidak berpenyakit. Diperoleh dari ayam yang dirawat dengan sebaik mungkin dengan teknologi canggih sehingga mencegah terjadinya cacat/penyakit dalam ayam tersebut.\r\n(NB: harga per/kg)', '2021-03-18 02:21:30', '2021-03-18 02:21:30'),
(23, 'Daging Sapi', 50000, 20, 'Makanan', 'daging sapi.jpg.jpg', 'Daging sapi berkualitas, higenis, dan tidak berpenyakit. Diperoleh dari sapi yang dirawat dengan sebaik mungkin dengan teknologi canggih sehingga mencegah terjadinya cacat/penyakit dalam sapi tersebut. (NB: harga per/kg)', '2021-03-18 02:22:15', '2021-03-18 02:22:15'),
(24, 'Ikan Nila', 25000, 40, 'Makanan', 'ikan nila.jpg.jpg', 'Ikan Nila segar langsung dari tempat penampungan.\r\n(NB: harga per/kg)', '2021-03-18 02:23:08', '2021-03-18 02:23:08'),
(25, 'Kentang', 5000, 50, 'Makanan', 'kentang.jpg.jpg', 'Kentang kualitas terbaik, dipanen diusia yang pas dan dirawat dengan baik sehingga menghasilkan kentang dengan kualitas tinggi.\r\n(NB: harga per/kg)', '2021-03-18 02:25:37', '2021-03-18 02:25:37'),
(26, 'Kue Kering', 25000, 50, 'Makanan', 'kue kering.jpg.jpg', 'Kue kering dengan berbagai varian dan rasa.\r\nRasa dan varian bisa request sesuai minat.\r\n(NB: harga per 2 toples)', '2021-03-18 02:34:45', '2021-03-18 02:34:45'),
(27, 'Pisang', 7000, 25, 'Makanan', 'pisang.jpg.jpg', 'Buah pisang dengan kualitas terbaik, rasa manis dan tidak masam.\r\n(NB: harga/kg)', '2021-03-18 02:44:43', '2021-03-18 02:44:43'),
(28, 'Semangka', 20000, 30, 'Makanan', 'semangka.jpg.jpg', 'Buah semangka dengan kualitas terbaik, rasa manis dan buah besar.\r\n(NB: harga per buah)', '2021-03-18 02:45:31', '2021-03-18 02:45:31'),
(29, 'Mangga', 15000, 50, 'Makanan', 'mangga.jpg.jpg', 'Buah mangga dengan kualitas terbaik, rasa manis dan tidak asam.\r\n(NB: harga per/kg)', '2021-03-18 02:46:22', '2021-03-18 02:46:22'),
(30, 'Wortel', 5000, 40, 'Makanan', 'wortel.jpg.jpg', 'Wortel dengan kualitas terbaik, buah besar, dan dirawat dengan teknologi canggih sehingga menghasilkan wortel yang bagus dan berkualitas.\r\n(NB: harga per/kg)', '2021-03-18 02:48:01', '2021-03-18 02:48:01'),
(31, 'Kubis', 10000, 30, 'Makanan', 'kubis.jpg.jpg', 'Kubis dengan kualitas terbaik dan dirawat dengan baik serta dengan teknologi maju hingga menghasilkan buah kubis yang bagus, sehat, dan berkualitas tinggi.\r\n(NB: harga per/kg)', '2021-03-18 02:49:18', '2021-03-18 02:49:18'),
(32, 'Mie Instan Indomie', 30000, 200, 'Makanan', 'mie instan.jpg.jpg', 'Indomie dengan berbagai varian rasa.\r\n(NB: harga perkardu berisi 30 bungkus)', '2021-03-18 02:51:43', '2021-03-18 02:51:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_03_27_060457_profil', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user1@gmail.com', '$2y$10$cVDp5reMZs1x9/wBp835muXFCpRUCDIzBtUPOgquOAZjRQRLfUUjK', '2021-03-28 23:04:39'),
('admin1@gmail.com', '$2y$10$y9Yp8W02w5XqMxEbFCMhweFLN5Ls.AOTT1568FyphWsp3.Tuseavu', '2021-03-29 01:30:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_hp` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `alamat`, `nomor_hp`, `jenis_kelamin`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin 1', 'Admin', 'Wonogiri', '085781063419', 'Laki-Laki', 'admin1@gmail.com', '2021-03-28 23:18:25', '$2y$10$uQthjL5o2rKkk7e6a3PxnOCGC9vfUzLb.XRFaOmyRACGboPAxCpte', '0TyEnTx5knuFoxFsADVheoDiizM1QvHUOYd9EME5BOsnQbe2rWFrvtBKaa0L', '2021-03-26 23:08:54', '2021-03-28 23:18:25'),
(2, 'Fauzan Dicky', 'User', 'Jl. Blimbing 2 Rt 02 Rw 07 Gerdu, Giripurwo, Kec.  Wonogiri, Kab. Wonogiri, Jawa Tengah', '0862381248128', NULL, 'user1@gmail.com', '2021-03-28 23:52:49', '$2y$10$u6JvHgSH3lDsxs7I6Cy7ruZB7QH/N2xUELQNtoEChEJpeErCkXn1m', NULL, '2021-03-26 23:12:16', '2021-03-28 23:52:49'),
(3, 'Admin 2', 'Admin', 'Wonogiri', '0823712377127', 'Laki-Laki', 'admin2@gmail.com', '2021-03-30 21:06:10', '$2y$10$TqdsCPrXFn6S.AHEwdfvWObjuPte2ditaXNqmevFBSuUQ5n5y6OCK', NULL, '2021-03-27 08:51:34', '2021-03-30 21:06:10'),
(4, 'Admin 3', 'Admin', NULL, NULL, NULL, 'admin3@gmail.com', NULL, '$2y$10$/U9DwFSavRh7k2Umy0jisu7cApvPkK4LlMoKFX8g7DKumizjkxyJq', NULL, '2021-03-27 08:52:32', '2021-03-27 08:52:32'),
(5, 'User 2', 'User', 'Wonogiri, Jawa Tengah', '082433784012', 'Perempuan', 'user2@gmail.com', '2021-03-28 23:30:53', '$2y$10$0/0MqF0u07i88y886vpnHu6Bk.lPLQNuaN3Wdt0yaoffPtrfWmjnS', NULL, '2021-03-27 08:53:26', '2021-03-28 23:30:53'),
(6, 'User 3', 'User', NULL, NULL, NULL, 'user3@gmail.com', NULL, '$2y$10$YrejIN9E2O5JRSMRHP7/x.JdxD0Nk9MtHniUcxstOjzZ/EobV4Uf2', NULL, '2021-03-27 08:53:44', '2021-03-27 08:53:44'),
(7, 'Fauzan', 'Admin', 'Wonogiri', '08632839238', 'Laki-Laki', 'fauzan@gmail.com', NULL, '$2y$10$FXPsE3rySTZOxFGI0W2bguLEK5WOQns80JKeW6fyBJ5Y6MEN6YB3G', NULL, '2021-03-27 02:02:19', '2021-03-27 02:02:19'),
(8, 'Hero57', 'Admin', NULL, NULL, NULL, 'hero57@gmail.com', NULL, '$2y$10$EhOB14CaYVikEUMzEO7K0Ov.BBlT/zCaMYRwhw8RyuMkKyW0GK4iC', NULL, '2021-03-27 02:10:52', '2021-03-27 02:10:52'),
(9, 'Kanna Hashimoto', 'User', NULL, NULL, NULL, 'kanna_hashimoto@gmail.com', NULL, '$2y$10$pNxDxH9Oo/TaSrcaxGpUNe5CeFRGhaW1d7O00LNJaTnR6a0hZBk4a', NULL, '2021-03-28 23:12:18', '2021-03-28 23:12:18'),
(10, 'User 5', 'User', NULL, NULL, NULL, 'user5@gmail.com', '2021-03-30 05:54:13', '$2y$10$yx7Shhm863MXLQp0nwP7ieYk2GEusFh2DVrZda0ohAYnXBu3ADRO.', NULL, '2021-03-30 05:53:12', '2021-03-30 05:54:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_produk`
--
ALTER TABLE `daftar_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_produk`
--
ALTER TABLE `daftar_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
