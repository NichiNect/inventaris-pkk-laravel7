-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 12:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_project_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `peminjaman_id` bigint(20) NOT NULL,
  `inventaris_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id`, `jumlah`, `peminjaman_id`, `inventaris_id`, `created_at`, `updated_at`) VALUES
(1, 5, 5, 1, '2020-11-28 02:25:37', NULL),
(2, 1, 5, 7, '2020-11-28 02:22:27', '2020-11-28 02:22:27'),
(9, 30, 7, 5, '2020-11-28 03:09:57', '2020-11-28 03:09:57'),
(10, 20, 1, 5, '2020-11-28 07:06:49', '2020-11-28 07:06:49'),
(14, 5, 8, 6, '2020-11-28 08:06:51', '2020-11-28 08:06:51'),
(15, 5, 9, 3, '2020-12-03 06:00:58', '2020-12-03 06:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_register` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kode_inventaris` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_id` bigint(20) NOT NULL,
  `ruang_id` bigint(20) NOT NULL,
  `petugas_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `nama`, `kondisi`, `keterangan`, `jumlah`, `tanggal_register`, `kode_inventaris`, `jenis_id`, `ruang_id`, `petugas_id`, `created_at`, `updated_at`) VALUES
(1, 'Meja Guru', 'Baik', '-', 10, '2020-11-28 09:18:05', '22112020-J3986052479-R6493720626-P1-76', 1, 1, 1, '2020-11-22 00:41:34', '2020-11-28 09:18:05'),
(3, 'kursi murid', 'Baik', 'kursi untuk murid', 20, '2020-11-22 01:27:15', '22112020-J6186321286-R2792971259-P1-76', 2, 1, 1, '2020-11-22 01:27:15', '2020-11-22 01:27:15'),
(5, 'Meja Murid', 'Baik', '-', 140, '2020-11-28 09:44:03', '22112020-J3986052479-R3341961217-P1-92', 1, 3, 1, '2020-11-22 01:31:52', '2020-11-28 09:44:03'),
(6, 'Papan Tulis', 'Cukup Baik', '-', 2, '2020-11-24 02:36:29', '24112020-J5529908298-R2792971259-P1-77', 4, 1, 1, '2020-11-24 02:36:29', '2020-11-24 02:36:29'),
(7, 'spidol', 'Baik', '-', 4, '2020-11-28 09:18:05', '24112020-J5529908298-R2792971259-P1-64', 4, 1, 1, '2020-11-24 02:38:53', '2020-11-28 09:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jenis` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama_jenis`, `kode_jenis`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Meja', '3986052479', 'Jenis Meja', '2020-11-22 00:33:55', '2020-11-22 00:33:55'),
(2, 'Kursi', '6186321286', 'Semua Jenis Kursi', '2020-11-22 00:34:20', '2020-11-22 00:34:20'),
(4, 'Alat Tulis Menulis', '5529908298', 'Untuk KBM', '2020-11-24 02:35:32', '2020-11-24 02:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama_level`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2020-11-22 00:28:25', NULL),
(2, 'Operator', '2020-11-22 00:28:25', NULL),
(3, 'Pegawai', '2020-11-22 00:28:25', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_16_134310_create_level_table', 2),
(5, '2020_11_16_141911_create_pegawai_table', 2),
(6, '2020_11_17_003909_create_petugas_table', 2),
(7, '2020_11_18_155135_create_jenis_table', 2),
(8, '2020_11_18_155158_create_ruang_table', 2),
(9, '2020_11_18_155229_create_inventaris_table', 2),
(14, '2020_11_22_102937_create_peminjaman_table', 3),
(15, '2020_11_23_192646_create_detail_pinjam_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `user_id`, `nama_pegawai`, `nip`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'User2', '1231412312', 'Jalan Santuy', 0, '2020-11-22 00:33:16', '2020-11-22 00:33:16'),
(2, 4, 'User3', '1982719206', 'Alamat ini', 0, '2020-11-23 13:10:46', '2020-11-23 13:10:46'),
(3, 5, 'User4', '1241236928', 'alamat gw', 0, '2020-12-01 15:40:28', '2020-12-01 15:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status_peminjaman` int(11) DEFAULT NULL,
  `pegawai_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `tanggal_pinjam`, `tanggal_kembali`, `status_peminjaman`, `pegawai_id`, `created_at`, `updated_at`) VALUES
(1, '2020-11-24', NULL, 1, 1, '2020-11-24 10:10:09', '2020-11-28 08:27:02'),
(5, '2020-11-27', NULL, 1, 2, '2020-11-27 09:41:41', '2020-12-03 06:03:02'),
(7, '2020-11-28', '2020-11-29', 3, 2, '2020-11-28 03:07:56', '2020-11-28 09:43:26'),
(8, '2020-11-28', NULL, 0, 2, '2020-11-28 08:06:39', '2020-11-28 08:06:39'),
(9, '2020-12-03', NULL, 0, 2, '2020-12-03 06:00:04', '2020-12-03 06:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `user_id`, `nama_petugas`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yoni Widhi', '2020-11-22 00:30:47', NULL),
(2, 2, 'User1', '2020-11-22 00:31:47', '2020-11-22 00:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_ruang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `nama_ruang`, `kode_ruang`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'RUANG 01', '2792971259', 'ruang kelas', '2020-11-22 00:34:52', '2020-11-22 00:35:36'),
(2, 'RUANG 02', '6493720626', 'Ruang Kelas', '2020-11-22 00:35:08', '2020-11-22 00:35:08'),
(3, 'RUANG 03', '3341961217', 'ruang kelas', '2020-11-22 00:35:27', '2020-11-22 00:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` int(11) NOT NULL DEFAULT 3,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level_id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yoni Widhi', 'yoniwidhi', 'admin@admin.com', NULL, '$2y$10$jFp99r8wRV4sSXN6oB1M/O0NoKx9i/vODvpfbOUZ7f1sRpbga4Uze', NULL, '2020-11-22 00:29:06', '2020-11-28 00:53:04'),
(2, 2, 'User1', 'user1', 'user1@user.com', NULL, '$2y$10$qh7psuidd3vEqVwx8mUob.N24A6AoWYl8pDyWO96RRrr8kOo6wE1.', NULL, '2020-11-22 00:31:47', '2020-11-22 00:31:47'),
(3, 3, 'User2', 'user2', 'user2@user.com', NULL, '$2y$10$dUo4WovQ776vHzYnlJujLOniE5YA1DkqmRgyg4vwVNhyYTBHV2fVa', NULL, '2020-11-22 00:33:16', '2020-11-22 00:33:16'),
(4, 3, 'User3', 'user3', 'user3@user.com', NULL, '$2y$10$OSHb0wPo1DrwXSmKUoXf6.z6XU1bPdPcwFWCWm6Zye/vSE9GTliLK', NULL, '2020-11-23 13:10:46', '2020-11-23 13:10:46'),
(5, 3, 'User4', 'user4', 'user4@user.com', NULL, '$2y$10$GAZNCTs/aKuNHRhKa4/f6OuAv/Zi2iekzTSTFxT90EzGWUdSeJDRO', NULL, '2020-12-01 15:40:27', '2020-12-01 15:40:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
