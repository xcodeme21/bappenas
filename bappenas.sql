-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 02:00 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bappenas`
--

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `file_pdf` varchar(255) NOT NULL,
  `tgl_undangan` date NOT NULL,
  `jam_undangan` time NOT NULL,
  `tempat_undangan` text NOT NULL,
  `tujuan_surat` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2019-12-04 04:54:09', NULL),
(2, 'Pegawai TU', '2019-12-04 05:08:22', NULL),
(3, 'Kepala TU', '2019-12-04 05:08:22', NULL),
(4, 'Sekretaris', '2019-12-04 05:08:22', NULL),
(5, 'Deputi', '2019-12-04 05:08:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `nip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` bigint(20) NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_level` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `nip`, `no_hp`, `alamat`, `password`, `remember_token`, `id_level`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@bappenas.com', NULL, '37061019', 81292532673, 'Rawasari, Jakarta', '$2y$10$YnJsSuqRYmCuijnzED/sGOpDPW1AGc5rloAw29QeN4Z0/hisuKhHy', NULL, 1, NULL, NULL),
(2, 'Rico Bagascoro', 'petugas@bappenas.com', NULL, '1570004', 81292532673, 'Jl. Rawa Bambu raya, Komp. Batan No. B3  RT.7/RW.7\r\nPasar Minggu', '$2y$10$/NbA94bhYF2YH4eyBKuynOqYVmnJij4aIzngVKm4Psdqyf4t8mmLO', NULL, 2, '2019-12-03 22:30:32', '2019-12-03 22:30:32'),
(3, 'Haris Wahidin', 'kepala@bappenas.com', NULL, '152865152', 81292538954, 'Kelapa Gading, Jakpus', '$2y$10$G67pgXo2tHV3Mp4po8E.kev8WtVgzaehL8o2M0s4Zj6/xR0G79S4q', NULL, 3, '2019-12-03 22:32:24', '2019-12-03 22:32:24'),
(4, 'Agus Siswanto', 'sekretaris@bappenas.com', NULL, '89852122', 8789658526, 'Cipedak, Lenteng Agusng', '$2y$10$8UoRyIJv4k6kzBTL80TTzu9uQ2G2d7tb9PxgJydf48y1SmOrYQQpS', NULL, 4, '2019-12-03 22:33:35', '2019-12-03 22:33:35'),
(5, 'Ega Ramadhan', 'deputi@bappenas.com', NULL, '269796262', 879658521232, 'Bogor, Jawa Barat', '$2y$10$rJyfhORMnWkxWfHGvrGIPemuFlGlmmhqfY22Y1MymjoUEbrhpf9Kq', NULL, 5, '2019-12-03 22:34:30', '2019-12-03 22:34:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
