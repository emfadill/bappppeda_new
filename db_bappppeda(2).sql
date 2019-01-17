-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Jan 2019 pada 10.39
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
(12, '2018_12_26_135919_create_surat_keluars_table', 2),
(13, '2019_01_12_160736_create_post_table', 3);

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
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

--
-- Dumping data untuk tabel `surat_keluars`
--

INSERT INTO `surat_keluars` (`id`, `indeks`, `dari`, `tujuan`, `perihal`, `tgl_no_suratkeluar`, `tgl_suratkeluar`, `jenis_surat`, `instruksi`, `kepada`, `status`, `user_id`, `cek`, `dokumen`, `url_dokumen`, `dokumen_ttd`, `url_dokumen_ttd`, `disposisi`, `url_disposisi`, `created_at`, `updated_at`) VALUES
(1, '1233', 'Dinas Bina Marga', 'Kepala Bappppeda', 'Surat Edaran', '12jan2019/2129/taspem122', '2019-01-06', 'Express', NULL, NULL, NULL, NULL, NULL, 'jurnal_penerapan_hadoop_framework_pada-125709.pdf', 'storage/surat_keluar/jurnal_penerapan_hadoop_framework_pada-125709.pdf', NULL, NULL, NULL, NULL, '2019-01-06 05:57:09', '2019-01-06 05:57:09'),
(2, '1122', 'Dinas Bina Marga', 'Kepala Bappppeda', 'Surat Pemberitahuan', '22jan2019/2129/taspem122', '2019-01-11', 'Standar', NULL, NULL, NULL, NULL, NULL, 'bab-2-125806.pdf', 'storage/surat_keluar/bab-2-125806.pdf', NULL, NULL, NULL, NULL, '2019-01-06 05:58:07', '2019-01-06 05:58:07'),
(3, '1221', 'Dinas Bina Marga', 'Kepala Bappppeda', 'Surat 1', '15jan2019/2129/taspem121', '2019-01-07', 'Express', NULL, NULL, NULL, NULL, NULL, 'ramkumar2016-125934.pdf', 'storage/surat_keluar/ramkumar2016-125934.pdf', NULL, NULL, NULL, NULL, '2019-01-06 05:59:34', '2019-01-06 05:59:34'),
(4, '0122', 'Dinas Perpu', 'Kepala Bappppeda', 'Surat Edaran revisi', '17jan2019/2129/taspem121', '2019-01-10', 'Standar', NULL, NULL, NULL, NULL, NULL, 'singh2016-130014.pdf', 'storage/surat_keluar/singh2016-130014.pdf', NULL, NULL, NULL, NULL, '2019-01-06 06:00:14', '2019-01-06 06:00:14');

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
(4, '133', NULL, 'Dinas PU', 'surat edaran', '29des2018/2112/taspem', '2019-01-03', 'Standar', NULL, NULL, NULL, NULL, NULL, 'chapter-ii-104653.pdf', 'storage/surat_masuk/chapter-ii-104653.pdf', NULL, NULL, '2019-01-03 03:46:53', '2019-01-03 03:46:53'),
(5, '1228', NULL, 'Dinas Bina Marga', 'Surat Edaran', '21des2018/12229/taspem', '2019-01-06', 'Express', NULL, NULL, NULL, NULL, NULL, '113051056_resume-120608.pdf', 'storage/surat_masuk/113051056_resume-120608.pdf', NULL, NULL, '2019-01-06 05:06:08', '2019-01-06 05:06:08'),
(6, '2122', NULL, 'Dinas Perpu', 'Surat 2', '02jan2019/2129/taspem122', '2019-01-07', 'Express', NULL, NULL, NULL, NULL, NULL, 'jadwal-perkuliahan-reguler-b2-semester-ganjil-2018-2019-revisi-3-125503.pdf', 'storage/surat_masuk/jadwal-perkuliahan-reguler-b2-semester-ganjil-2018-2019-revisi-3-125503.pdf', NULL, NULL, '2019-01-06 05:55:03', '2019-01-06 05:55:03'),
(7, '2123', NULL, 'Dinas Bina Marga', 'Surat Edaran', '13jan2019/2129/taspem121', '2019-01-05', 'Standar', NULL, NULL, NULL, NULL, NULL, 'pembukaan-rekening-125603.pdf', 'storage/surat_masuk/pembukaan-rekening-125603.pdf', NULL, NULL, '2019-01-06 05:56:03', '2019-01-06 05:56:03'),
(8, '012223', NULL, 'dinas PU', 'Surat edaran', '11okt2018/2200/28818', '2019-01-11', 'Express', NULL, NULL, NULL, NULL, NULL, '19-67-1-pb-085453.pdf', 'storage/surat_masuk/19-67-1-pb-085453.pdf', NULL, NULL, '2019-01-11 01:54:54', '2019-01-11 01:54:54');

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
(4, '01223332', 'Kepala Bappppeda', 'kebab', '$2y$10$mzCDl0BuCOxS.KIFrSL9qeWVO/tKtXM8lp2p1ajddiumryr1ACcTq', 'Kepala Bappppeda', '1', NULL, '2019-01-05 23:37:31', '2019-01-05 23:37:31'),
(6, '01233229', 'sekretaris bappppeda', 'sekretaris', '$2y$10$6CKuYnr0krwqnDqmEV8CU..Twssd0c90IVjvgazeHIXH.WPtY29HG', 'Sekretaris Bappppeda', '2', NULL, '2019-01-05 23:40:44', '2019-01-05 23:40:44'),
(7, '01233221', 'Kepala Bidang', 'kabid', '$2y$10$Ewm.eJcIRqM8tKsbpgD1uO3NgV7hTBcA8pye29HcvAhyDKe6PtJcW', 'Kepala Bidang Pengembangan', '2', NULL, '2019-01-05 23:42:16', '2019-01-05 23:42:16'),
(8, '02199222', 'Sub Bidang Pengembangan', 'subid', '$2y$10$5QcLH2wplF9BLpS27.mFFOMwcG5kGsQVilE3bYAexikhUnBINhdhW', 'Sub Bidang Pengembangan', '3', NULL, '2019-01-05 23:43:40', '2019-01-05 23:43:40');

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
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_keluars`
--
ALTER TABLE `surat_keluars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_masuks`
--
ALTER TABLE `surat_masuks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
