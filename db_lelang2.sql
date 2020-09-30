-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2020 at 02:35 PM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lelang2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_petugas` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_barang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_awal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `id_petugas`, `nama`, `deskripsi_barang`, `harga_awal`, `tanggal`, `photo`, `created_at`, `updated_at`) VALUES
(1, 2, 'Barang 1', 'Barang ini adalah barang langka', 16000, '2020-01-01', '1583036658_gpaxlseAx8jYPYje1ORSiiDf1M4ny5If.png', '2020-02-23 07:59:48', '2020-02-29 21:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `history_lelangs`
--

CREATE TABLE `history_lelangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `id_lelang` bigint(20) UNSIGNED NOT NULL,
  `id_masyarakat` bigint(20) UNSIGNED NOT NULL,
  `penawaran_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_lelangs`
--

INSERT INTO `history_lelangs` (`id`, `id_barang`, `id_lelang`, `id_masyarakat`, `penawaran_harga`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 18000, '2020-02-29 21:22:14', '2020-02-29 21:22:14'),
(2, 1, 4, 1, 29000, '2020-07-18 04:38:44', '2020-07-18 04:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `lelangs`
--

CREATE TABLE `lelangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_masyarakat` bigint(20) UNSIGNED DEFAULT NULL,
  `id_petugas` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `harga_akhir` int(11) NOT NULL,
  `status` enum('dibuka','ditutup') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lelangs`
--

INSERT INTO `lelangs` (`id`, `id_masyarakat`, `id_petugas`, `id_barang`, `harga_akhir`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 1, 18000, 'ditutup', '2020-02-29 21:19:33', '2020-02-29 21:28:51'),
(4, 1, 2, 1, 29000, 'dibuka', '2020-07-18 04:37:13', '2020-07-18 04:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2020-02-23 07:59:47', '2020-02-23 07:59:47'),
(2, 'Operator', '2020-02-23 07:59:47', '2020-02-23 07:59:47'),
(3, 'Masyarakat', '2020-02-23 07:59:47', '2020-02-23 07:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakats`
--

CREATE TABLE `masyarakats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masyarakats`
--

INSERT INTO `masyarakats` (`id`, `nama`, `alamat`, `telp`, `photo`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'masyarakat', 'Jl. manggalima No.5', '08560412340', 'defrindr.png', 3, '2020-02-23 07:59:48', '2020-02-23 07:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_02_11_145557_create_levels_table', 1),
(2, '2020_02_11_145717_create_barangs_table', 1),
(3, '2020_02_11_145734_create_lelangs_table', 1),
(4, '2020_02_11_145813_create_masyarakats_table', 1),
(5, '2020_02_11_145823_create_petugas_table', 1),
(6, '2020_02_11_145846_create_history_lelangs_table', 1),
(7, '2020_02_11_150048_create_users_table', 1),
(8, '2020_02_11_150832_create_relation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nip`, `nama`, `alamat`, `photo`, `id_user`, `created_at`, `updated_at`) VALUES
(1, '0948545132054754', 'operator', 'Jl. manggalima No.5', 'defrindr.png', 1, '2020-02-23 07:59:48', '2020-02-23 07:59:48'),
(2, '1805335584290845', 'administrator', 'Jl. manggalima No.5', 'defrindr.png', 2, '2020-02-23 07:59:48', '2020-02-23 07:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_level` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `id_level`, `created_at`, `updated_at`) VALUES
(1, 'operator', '$2y$10$dIByxAEmXc5MZskM0QiIpe00xtCyGucTxJaq5D9zDNCSA.7AAzRdO', 2, '2020-02-23 07:59:47', '2020-02-23 07:59:47'),
(2, 'administrator', '$2y$10$82MbVCLEIEEnfsHG7PM2FumqaGIm9BuHhkTVkH51hfTYJyPc1NKv6', 1, '2020-02-23 07:59:48', '2020-02-23 07:59:48'),
(3, 'masyarakat', '$2y$10$IjJZ.5wrr2lnI3uXeDXrSeVmBFJRZoIUr4d8YQasg0q1C0aJJN9zG', 3, '2020-02-23 07:59:48', '2020-02-23 07:59:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_id_petugas_foreign` (`id_petugas`);

--
-- Indexes for table `history_lelangs`
--
ALTER TABLE `history_lelangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_lelangs_id_masyarakat_foreign` (`id_masyarakat`),
  ADD KEY `history_lelangs_id_lelang_foreign` (`id_lelang`),
  ADD KEY `history_lelangs_id_barang_foreign` (`id_barang`);

--
-- Indexes for table `lelangs`
--
ALTER TABLE `lelangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lelangs_id_masyarakat_foreign` (`id_masyarakat`),
  ADD KEY `lelangs_id_petugas_foreign` (`id_petugas`),
  ADD KEY `lelangs_id_barang_foreign` (`id_barang`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masyarakats`
--
ALTER TABLE `masyarakats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masyarakats_id_user_foreign` (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petugas_id_user_foreign` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id_level_foreign` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history_lelangs`
--
ALTER TABLE `history_lelangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lelangs`
--
ALTER TABLE `lelangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masyarakats`
--
ALTER TABLE `masyarakats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`);

--
-- Constraints for table `history_lelangs`
--
ALTER TABLE `history_lelangs`
  ADD CONSTRAINT `history_lelangs_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `history_lelangs_id_lelang_foreign` FOREIGN KEY (`id_lelang`) REFERENCES `lelangs` (`id`),
  ADD CONSTRAINT `history_lelangs_id_masyarakat_foreign` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakats` (`id`);

--
-- Constraints for table `lelangs`
--
ALTER TABLE `lelangs`
  ADD CONSTRAINT `lelangs_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `lelangs_id_masyarakat_foreign` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakats` (`id`),
  ADD CONSTRAINT `lelangs_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`);

--
-- Constraints for table `masyarakats`
--
ALTER TABLE `masyarakats`
  ADD CONSTRAINT `masyarakats_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_level_foreign` FOREIGN KEY (`id_level`) REFERENCES `levels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
