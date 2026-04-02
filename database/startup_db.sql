-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2026 at 05:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `startup_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2026-03-31-072333', 'App\\Database\\Migrations\\CreateStartupTable', 'default', 'App', 1774942025, 1),
(2, '2026-03-31-081948', 'App\\Database\\Migrations\\CreateTbKlasterTable', 'default', 'App', 1774945896, 2),
(3, '2026-03-31-082354', 'App\\Database\\Migrations\\CreateTbKlasterTable', 'default', 'App', 1774945908, 3),
(4, '2026-03-31-083632', 'App\\Database\\Migrations\\CreateStartupKlasterTable', 'default', 'App', 1774946792, 4),
(5, '2026-03-31-083633', 'App\\Database\\Migrations\\DropKlasterColumnFromStartup', 'default', 'App', 1774946792, 4),
(6, '2026-04-01-000001', 'App\\Database\\Migrations\\CreateStartupTimTable', 'default', 'App', 1775031496, 5),
(7, '2026-04-01-130238', 'App\\Database\\Migrations\\AddUuidToStartup', 'default', 'App', 1775048605, 6);

-- --------------------------------------------------------

--
-- Table structure for table `startup`
--

CREATE TABLE `startup` (
  `id` int(11) NOT NULL,
  `uuid` varchar(36) DEFAULT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `deskripsi_bidang_usaha` text DEFAULT NULL,
  `tahun_berdiri` year(4) DEFAULT NULL,
  `target_pemasaran` varchar(255) DEFAULT NULL,
  `fokus_pelanggan` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nomor_whatsapp` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `tahun_daftar` year(4) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `startup`
--

INSERT INTO `startup` (`id`, `uuid`, `nama_perusahaan`, `deskripsi_bidang_usaha`, `tahun_berdiri`, `target_pemasaran`, `fokus_pelanggan`, `alamat`, `nomor_whatsapp`, `email`, `website`, `linkedin`, `instagram`, `logo`, `tahun_daftar`, `status`, `created_at`, `updated_at`) VALUES
(7, '4ffd4e77-90ba-4534-aae5-8c71eda61be4', 'DKST', 'kreatif', '2024', 'Orang', 'orang', '', '', '', '', '', '', '1775054425_1fc5eebabd34c3d348b7.jpeg', '2025', 'Aktif', '2026-04-01 14:40:25', '2026-04-01 15:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `startup_klaster`
--

CREATE TABLE `startup_klaster` (
  `id` int(11) NOT NULL,
  `startup_id` int(11) NOT NULL,
  `klaster_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `startup_klaster`
--

INSERT INTO `startup_klaster` (`id`, `startup_id`, `klaster_id`) VALUES
(31, 7, 1),
(32, 7, 2),
(33, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `startup_tim`
--

CREATE TABLE `startup_tim` (
  `id` int(11) NOT NULL,
  `startup_id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `nomor_whatsapp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `nama_perguruan_tinggi` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_klaster`
--

CREATE TABLE `tb_klaster` (
  `id` int(11) NOT NULL,
  `nama_klaster` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_klaster`
--

INSERT INTO `tb_klaster` (`id`, `nama_klaster`) VALUES
(1, 'Industri Kreatif'),
(2, 'Infrastruktur dan Kebencanaan'),
(3, 'Teknologi Pertahanan dan Keamanan'),
(4, 'Smart City'),
(5, 'Teknologi Informasi dan Komunikasi'),
(6, 'Pangan dan Kesehatan'),
(7, 'Rekayasa Transportasi dan Energi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `startup`
--
ALTER TABLE `startup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `startup_klaster`
--
ALTER TABLE `startup_klaster`
  ADD PRIMARY KEY (`id`),
  ADD KEY `startup_klaster_startup_id_foreign` (`startup_id`),
  ADD KEY `startup_klaster_klaster_id_foreign` (`klaster_id`);

--
-- Indexes for table `startup_tim`
--
ALTER TABLE `startup_tim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `startup_tim_startup_id_foreign` (`startup_id`);

--
-- Indexes for table `tb_klaster`
--
ALTER TABLE `tb_klaster`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `startup`
--
ALTER TABLE `startup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `startup_klaster`
--
ALTER TABLE `startup_klaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `startup_tim`
--
ALTER TABLE `startup_tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_klaster`
--
ALTER TABLE `tb_klaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `startup_klaster`
--
ALTER TABLE `startup_klaster`
  ADD CONSTRAINT `startup_klaster_klaster_id_foreign` FOREIGN KEY (`klaster_id`) REFERENCES `tb_klaster` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `startup_klaster_startup_id_foreign` FOREIGN KEY (`startup_id`) REFERENCES `startup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `startup_tim`
--
ALTER TABLE `startup_tim`
  ADD CONSTRAINT `startup_tim_startup_id_foreign` FOREIGN KEY (`startup_id`) REFERENCES `startup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
