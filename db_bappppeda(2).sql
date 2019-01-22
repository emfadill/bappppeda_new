-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jan 2019 pada 10.30
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
-- Struktur dari tabel `disposisi_keluar_kabids`
--

CREATE TABLE `disposisi_keluar_kabids` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `surat_keluar_id` int(10) UNSIGNED NOT NULL,
  `kepada` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disposisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_disposisi` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi_keluar_subids`
--

CREATE TABLE `disposisi_keluar_subids` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `diposisi_keluar_id` int(10) UNSIGNED NOT NULL,
  `disposisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_disposisi` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi_masuk_kabids`
--

CREATE TABLE `disposisi_masuk_kabids` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `surat_masuk_id` int(10) UNSIGNED NOT NULL,
  `kepada` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disposisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_disposisi` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `disposisi_masuk_kabids`
--

INSERT INTO `disposisi_masuk_kabids` (`id`, `user_id`, `surat_masuk_id`, `kepada`, `disposisi`, `url_disposisi`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 'Subid A1,Subid A2', '113051056_resume-090003.pdf', 'storage/surat_masuk/disposisi/113051056_resume-090003.pdf', '2019-01-22 02:00:03', '2019-01-22 02:11:46'),
(2, 7, 4, NULL, '113051056_resume-090003.pdf', 'storage/surat_masuk/disposisi/113051056_resume-090003.pdf', '2019-01-22 02:00:03', '2019-01-22 02:00:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi_masuk_subids`
--

CREATE TABLE `disposisi_masuk_subids` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `diposisi_masuk_id` int(10) UNSIGNED NOT NULL,
  `disposisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_disposisi` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `disposisi_masuk_subids`
--

INSERT INTO `disposisi_masuk_subids` (`id`, `user_id`, `diposisi_masuk_id`, `disposisi`, `url_disposisi`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'bab-2-091146.pdf', 'storage/surat_masuk/disposisi/bab-2-091146.pdf', '2019-01-22 02:11:46', '2019-01-22 02:11:46'),
(2, 6, 1, 'bab-2-091146.pdf', 'storage/surat_masuk/disposisi/bab-2-091146.pdf', '2019-01-22 02:11:46', '2019-01-22 02:11:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatans`
--

INSERT INTO `jabatans` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(2, 'Kepala Bappppeda', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(3, 'Sekretaris', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(4, 'Kepala Bidang', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(5, 'Sub Bidang', '2019-01-21 21:49:52', '2019-01-21 21:49:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepala_bidangs`
--

CREATE TABLE `kepala_bidangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `jabatan_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kepala_bidangs`
--

INSERT INTO `kepala_bidangs` (`id`, `jabatan_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 4, 'Kabid A', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(2, 4, 'Kabid B', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(3, 4, 'Kabid C', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(4, 4, 'Kabid D', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(5, 4, 'Kabid E', '2019-01-21 21:49:52', '2019-01-21 21:49:52');

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
(1, '2012_01_17_054324_create_jabatans_table', 1),
(2, '2012_01_17_054625_create_kepala_bidangs_table', 1),
(3, '2012_01_17_054659_create_sub_bidangs_table', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2018_12_24_053709_create_surat_masuks_table', 1),
(7, '2018_12_26_135919_create_surat_keluars_table', 1),
(8, '2019_01_12_160736_create_post_table', 1),
(9, '2019_01_18_113802_create_disposisi_masuk_kabids_table', 1),
(10, '2019_01_18_114525_create_disposisi_masuk_subids_table', 1),
(11, '2019_01_18_1147001_create_disposisi_keluar_kabids_table', 1),
(12, '2019_01_18_114702_create_disposisi_keluar_subids_table', 1);

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
-- Struktur dari tabel `sub_bidangs`
--

CREATE TABLE `sub_bidangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `jabatan_id` int(10) UNSIGNED NOT NULL,
  `kabid_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_bidangs`
--

INSERT INTO `sub_bidangs` (`id`, `jabatan_id`, `kabid_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'Subid A1', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(2, 5, 1, 'Subid A2', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(3, 5, 1, 'Subid A3', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(4, 5, 2, 'Subid B1', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(5, 5, 2, 'Subid B2', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(6, 5, 2, 'Subid B3', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(7, 5, 3, 'Subid C1', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(8, 5, 3, 'Subid C2', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(9, 5, 3, 'Subid C3', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(10, 5, 4, 'Subid D1', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(11, 5, 4, 'Subid D2', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(12, 5, 4, 'Subid D3', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(13, 5, 5, 'Subid E1', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(14, 5, 5, 'Subid E2', '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(15, 5, 5, 'Subid E3', '2019-01-21 21:49:52', '2019-01-21 21:49:52');

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

INSERT INTO `surat_keluars` (`id`, `indeks`, `dari`, `tujuan`, `perihal`, `tgl_no_suratkeluar`, `tgl_suratkeluar`, `jenis_surat`, `instruksi`, `kepada`, `status`, `dokumen`, `url_dokumen`, `dokumen_ttd`, `url_dokumen_ttd`, `disposisi`, `url_disposisi`, `created_at`, `updated_at`) VALUES
(1, '01322', 'Dinas PU', 'Kepala Bappppeda', 'Surat Pemberitahuan', '21jan2019/2012/2112', '2019-01-21', 'Express', NULL, NULL, 'Terkirim', 'chapter-ii-084951.pdf', 'storage/surat_keluar/chapter-ii-084951.pdf', NULL, NULL, NULL, NULL, '2019-01-22 01:49:51', '2019-01-22 01:49:51'),
(2, '013226', 'Dinas Bina Marga', 'Kepala Bappppeda', 'Surat Edaran', '21des2019/2012/221', '2019-01-22', 'Standar', NULL, NULL, 'Terkirim', 'kasus-03-looping-085110.pdf', 'storage/surat_keluar/kasus-03-looping-085110.pdf', NULL, NULL, NULL, NULL, '2019-01-22 01:51:10', '2019-01-22 01:51:10'),
(3, '0132215', 'Dinas Kebersihan', 'Kepala Bappppeda', 'Surat Edaran Baru', '24jan2019/2012/2112', '2019-01-23', 'Standar', NULL, NULL, 'Terkirim', '49-104-1-sm-085225.pdf', 'storage/surat_keluar/49-104-1-sm-085225.pdf', NULL, NULL, NULL, NULL, '2019-01-22 01:52:25', '2019-01-22 01:52:25');

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

INSERT INTO `surat_masuks` (`id`, `indeks`, `tgl_penyelesaian`, `dari`, `perihal`, `tgl_no_suratmasuk`, `tgl_suratmasuk`, `jenis_surat`, `instruksi`, `kepada`, `status`, `dokumen`, `url_dokumen`, `disposisi`, `url_disposisi`, `created_at`, `updated_at`) VALUES
(1, '0211', NULL, 'Dinas PU', 'Surat Edaran', '21des2019/2002/2112', '2019-01-22', 'Express', NULL, NULL, 'Terkirim', '3-8-1-pb-084533.pdf', 'storage/surat_masuk/3-8-1-pb-084533.pdf', NULL, NULL, '2019-01-22 01:45:33', '2019-01-22 01:45:33'),
(2, '012442', NULL, 'Dinas Kebersihan', 'Surat Edaran Baru', '21jan2019/2012/2112', '2019-01-23', 'Standar', NULL, NULL, 'Terkirim', '2007_02_01b-janecek-perceptron-084622.pdf', 'storage/surat_masuk/2007_02_01b-janecek-perceptron-084622.pdf', NULL, NULL, '2019-01-22 01:46:22', '2019-01-22 01:46:22'),
(3, '0124411', NULL, 'Dinas Bina Marga', 'Surat Pemberitahuan', '23jan2019/2012/2112', '2019-01-23', 'Standar', NULL, NULL, 'Terkirim', '1172043_references-084723.pdf', 'storage/surat_masuk/1172043_references-084723.pdf', NULL, NULL, '2019-01-22 01:47:23', '2019-01-22 01:47:23'),
(4, '0124421', '2019-01-20', 'Dinas Kebersihan', 'Surat Pengumuman', '26jan2019/2012/2112', '2019-01-25', 'Express', 'coba', 'Kabid A,Kabid B', 'Sudah Disposisi', 'kasus-01-sequence1-084807.pdf', 'storage/surat_masuk/kasus-01-sequence1-084807.pdf', '113051056_resume-090003.pdf', 'storage/surat_masuk/disposisi/113051056_resume-090003.pdf', '2019-01-22 01:48:07', '2019-01-22 02:00:03');

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
  `jabatan_id` int(10) UNSIGNED NOT NULL,
  `kabid_id` int(10) UNSIGNED DEFAULT NULL,
  `subid_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `username`, `password`, `jabatan_id`, `kabid_id`, `subid_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '00001', 'Admin Bapppeda', 'Admin', '$2y$10$mmc6XudWoJFe0Q1bl59LAOw49ruUmVuDyBMG8ipnxRVudyyAkSY.C', 1, NULL, NULL, NULL, '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(2, '00002', 'Kepala Bapppeda', 'Kepalabpd', '$2y$10$q/16K.Wxtez8PcVvovQcx.qRh7ttU51obr2raeSU/zyxxrQIhaf6u', 2, NULL, NULL, NULL, '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(3, '00005', 'Bapak Sekretaris', 'sekretaris', '$2y$10$jOC1ODL74fPA0oMaKt5raOkCSavACYzeRKGJZ6MWxA/Rp.g1CuoDO', 3, NULL, NULL, NULL, '2019-01-21 21:49:52', '2019-01-21 21:49:52'),
(4, '0221122', 'Kepala Bidang A', 'kabida', '$2y$10$KivdkDczYC80sOp1d9piYOihrZByPGsbHKbtjjL.kH6bhLIoKBxoG', 4, 1, NULL, NULL, '2019-01-21 21:52:44', '2019-01-21 21:52:44'),
(5, '02211223', 'Sub Bidang A 1', 'subida1', '$2y$10$PryyidxBShsngDAhdWH0FuHHkQ0m7JPFTzT47lXSdKfsLYXVrP33K', 5, 1, 1, NULL, '2019-01-21 21:55:17', '2019-01-21 21:55:17'),
(6, '0123322', 'Sub Bidang A 2', 'subida2', '$2y$10$qhx49HaYkGEHYhSoroKEXODr0X9tdULpcZ0m/sIzQO3EMCdqVHr2i', 5, 1, 2, NULL, '2019-01-21 21:56:09', '2019-01-21 21:56:09'),
(7, '0122332', 'Kepala Bidang B', 'kabidb', '$2y$10$jXmtUkTSWDgSplxLELyMDOmj813BTz5E8JTY0yVWJDBWA1B2jmKwK', 4, 2, NULL, NULL, '2019-01-21 21:58:37', '2019-01-21 21:58:37'),
(8, '01223322', 'Sub Bidang B 1', 'subidb1', '$2y$10$D8Xl3aLsnfL5u6KPJN44TuSY4er/xpJIQJqQBJAMQlKjK6wX390c.', 5, 2, 4, NULL, '2019-01-21 21:59:48', '2019-01-21 21:59:48'),
(9, '012322', 'Sub Bidang B 2', 'subidb2', '$2y$10$Yvb4DHRT2UhliqyyqJad0ewEtwu3YjlOZ/1slzrqelHMHSB7eQhwG', 5, 2, 5, NULL, '2019-01-21 22:00:59', '2019-01-21 22:00:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi_keluar_kabids`
--
ALTER TABLE `disposisi_keluar_kabids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disposisi_keluar_kabids_surat_keluar_id_foreign` (`surat_keluar_id`),
  ADD KEY `disposisi_keluar_kabids_user_id_foreign` (`user_id`);

--
-- Indexes for table `disposisi_keluar_subids`
--
ALTER TABLE `disposisi_keluar_subids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disposisi_keluar_subids_diposisi_keluar_id_foreign` (`diposisi_keluar_id`),
  ADD KEY `disposisi_keluar_subids_user_id_foreign` (`user_id`);

--
-- Indexes for table `disposisi_masuk_kabids`
--
ALTER TABLE `disposisi_masuk_kabids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disposisi_masuk_kabids_surat_masuk_id_foreign` (`surat_masuk_id`),
  ADD KEY `disposisi_masuk_kabids_user_id_foreign` (`user_id`);

--
-- Indexes for table `disposisi_masuk_subids`
--
ALTER TABLE `disposisi_masuk_subids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disposisi_masuk_subids_diposisi_masuk_id_foreign` (`diposisi_masuk_id`),
  ADD KEY `disposisi_masuk_subids_user_id_foreign` (`user_id`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kepala_bidangs`
--
ALTER TABLE `kepala_bidangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kepala_bidangs_jabatan_id_foreign` (`jabatan_id`);

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
-- Indexes for table `sub_bidangs`
--
ALTER TABLE `sub_bidangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_bidangs_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `sub_bidangs_kabid_id_foreign` (`kabid_id`);

--
-- Indexes for table `surat_keluars`
--
ALTER TABLE `surat_keluars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuks`
--
ALTER TABLE `surat_masuks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `users_kabid_id_foreign` (`kabid_id`),
  ADD KEY `users_subid_id_foreign` (`subid_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi_keluar_kabids`
--
ALTER TABLE `disposisi_keluar_kabids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disposisi_keluar_subids`
--
ALTER TABLE `disposisi_keluar_subids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disposisi_masuk_kabids`
--
ALTER TABLE `disposisi_masuk_kabids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `disposisi_masuk_subids`
--
ALTER TABLE `disposisi_masuk_subids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kepala_bidangs`
--
ALTER TABLE `kepala_bidangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_bidangs`
--
ALTER TABLE `sub_bidangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `surat_keluars`
--
ALTER TABLE `surat_keluars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_masuks`
--
ALTER TABLE `surat_masuks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `disposisi_keluar_kabids`
--
ALTER TABLE `disposisi_keluar_kabids`
  ADD CONSTRAINT `disposisi_keluar_kabids_surat_keluar_id_foreign` FOREIGN KEY (`surat_keluar_id`) REFERENCES `surat_keluars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disposisi_keluar_kabids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `disposisi_keluar_subids`
--
ALTER TABLE `disposisi_keluar_subids`
  ADD CONSTRAINT `disposisi_keluar_subids_diposisi_keluar_id_foreign` FOREIGN KEY (`diposisi_keluar_id`) REFERENCES `disposisi_keluar_kabids` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disposisi_keluar_subids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `disposisi_masuk_kabids`
--
ALTER TABLE `disposisi_masuk_kabids`
  ADD CONSTRAINT `disposisi_masuk_kabids_surat_masuk_id_foreign` FOREIGN KEY (`surat_masuk_id`) REFERENCES `surat_masuks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disposisi_masuk_kabids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `disposisi_masuk_subids`
--
ALTER TABLE `disposisi_masuk_subids`
  ADD CONSTRAINT `disposisi_masuk_subids_diposisi_masuk_id_foreign` FOREIGN KEY (`diposisi_masuk_id`) REFERENCES `disposisi_masuk_kabids` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disposisi_masuk_subids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kepala_bidangs`
--
ALTER TABLE `kepala_bidangs`
  ADD CONSTRAINT `kepala_bidangs_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_bidangs`
--
ALTER TABLE `sub_bidangs`
  ADD CONSTRAINT `sub_bidangs_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_bidangs_kabid_id_foreign` FOREIGN KEY (`kabid_id`) REFERENCES `kepala_bidangs` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_kabid_id_foreign` FOREIGN KEY (`kabid_id`) REFERENCES `kepala_bidangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_subid_id_foreign` FOREIGN KEY (`subid_id`) REFERENCES `sub_bidangs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
