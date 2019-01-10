-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Jan 2019 pada 17.47
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bappppeda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2018_12_24_053709_create_surat_masuks_table', 2),
(12, '2018_12_26_135919_create_surat_keluars_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluars`
--

CREATE TABLE `surat_keluars` (
  `id` int(10) UNSIGNED NOT NULL,
  `indeks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dari` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_no_suratkeluar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_suratkeluar` date NOT NULL,
  `jenis_surat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruksi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepada` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `cek` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_dokumen` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen_ttd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_dokumen_ttd` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disposisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_disposisi` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuks`
--

CREATE TABLE `surat_masuks` (
  `id` int(10) UNSIGNED NOT NULL,
  `indeks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_penyelesaian` date DEFAULT NULL,
  `dari` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_no_suratmasuk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_suratmasuk` date NOT NULL,
  `jenis_surat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruksi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepada` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `cek` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_dokumen` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_disposisi` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat_masuks`
--

INSERT INTO `surat_masuks` (`id`, `indeks`, `tgl_penyelesaian`, `dari`, `perihal`, `tgl_no_suratmasuk`, `tgl_suratmasuk`, `jenis_surat`, `instruksi`, `kepada`, `status`, `user_id`, `cek`, `dokumen`, `url_dokumen`, `disposisi`, `url_disposisi`, `created_at`, `updated_at`) VALUES
(1, '202', '2019-01-02', 'Dinas PU', 'surat edaran', '10des2018/005/5463/Tapem', '2019-01-03', 'Express', NULL, 'kabid', 'disposisi', 2, 'sudah', '109476-id-implementasi-hadoop-studi-kasus-pengolah-100606.pdf', 'storage/surat_masuk/109476-id-implementasi-hadoop-studi-kasus-pengolah-100606.pdf', 'vaishali2016-101208.pdf', 'storage/surat_masuk/disposisi/vaishali2016-101208.pdf', '2019-01-03 03:06:06', '2019-01-03 03:12:08'),
(2, '122', '2019-01-03', 'Kepala Cabang', 'surat pengumuman', '9okt2018/005/5463/Tapem', '2019-01-04', 'Standar', NULL, 'subid', 'disposisi', 3, 'sudah', '1172043_references-104455.pdf', 'storage/surat_masuk/1172043_references-104455.pdf', 'shabariram2017-105028.pdf', 'storage/surat_masuk/disposisi/shabariram2017-105028.pdf', '2019-01-03 03:44:55', '2019-01-03 03:50:28'),
(3, '015', '2019-01-11', 'Pusat Pengembangan', 'Surat pemberitahuan', '10des2018/005/5463/Tapem', '2019-01-04', 'Express', NULL, 'Kabid', 'disposisi', 3, 'sudah', 'bab-2-104602.pdf', 'storage/surat_masuk/bab-2-104602.pdf', 'mpdf-105239.pdf', 'storage/surat_masuk/disposisi/mpdf-105239.pdf', '2019-01-03 03:46:02', '2019-01-03 03:52:39'),
(4, '133', NULL, 'Dinas PU', 'surat edaran', '29des2018/2112/taspem', '2019-01-03', 'Standar', NULL, NULL, NULL, NULL, NULL, 'chapter-ii-104653.pdf', 'storage/surat_masuk/chapter-ii-104653.pdf', NULL, NULL, '2019-01-03 03:46:53', '2019-01-03 03:46:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `username`, `password`, `jabatan`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '0122551', 'admin', 'admin', '$2y$10$.fuq/Jb23tCKiizesJu.I.eC.zlJ3DWZ32jWkRRARXZ8fNcOA2i1y', 'Admin', 'Admin', 'igaD4erqiIrsEIFUYeIpRJZPS1wgVFfrIJhlAxf0Vo1wEwoqbdk0hGu7BiWh', NULL, NULL),
(2, '01223322', 'indra', 'indra123', '$2y$10$rg06o0Jb.JazFtaT/MCPW.YfaoEUlIKnQb9M6bV5bslIF0FqOvq16', 'Kepala Bidang Humas', 'Kepala Bappppeda', NULL, '2018-12-23 07:14:59', '2018-12-28 09:23:16'),
(3, '02211122', 'fadil', 'fadil', '$2y$10$In8j5Vl2.ZoigJvmy6UHyur03DZyHZTVrxiRzazqgW.aStm.BroLy', 'Sekretaris', 'Sekretaris', NULL, '2018-12-26 18:26:15', '2018-12-26 18:26:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `surat_keluars`
--
ALTER TABLE `surat_keluars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_keluars_user_id_foreign` (`user_id`);

--
-- Indexes for table `surat_masuks`
--
ALTER TABLE `surat_masuks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_masuks_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `surat_keluars`
--
ALTER TABLE `surat_keluars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_masuks`
--
ALTER TABLE `surat_masuks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `surat_keluars`
--
ALTER TABLE `surat_keluars`
  ADD CONSTRAINT `surat_keluars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat_masuks`
--
ALTER TABLE `surat_masuks`
  ADD CONSTRAINT `surat_masuks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
