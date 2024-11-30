-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2024 pada 21.32
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll_web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(125) DEFAULT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `tgl_buat`, `tgl_update`) VALUES
(1, 'admin', '$2y$10$YAs1D0ZYl5Fo7RJZrEU4Y.Ym2hidYFrH4m5v8QSbOszsBD4MEmqEG', '2024-11-18 07:46:37', '2024-11-18 09:16:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_payroll`
--

CREATE TABLE `admin_payroll` (
  `id_adminpayroll` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(125) DEFAULT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_payroll`
--

INSERT INTO `admin_payroll` (`id_adminpayroll`, `username`, `password`, `tgl_buat`, `tgl_update`) VALUES
(121, 'adminpayroll', '$2y$10$XjKCxidQv9w5jBxIsdKkCu/lWs1d04Xy4aM8NN0jwfBefIp.YrHnO', '2024-11-21 10:31:11', '2024-11-21 10:32:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_gaji`
--

CREATE TABLE `jadwal_gaji` (
  `id_jadwal` int(11) NOT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `tgl_gaji` date DEFAULT NULL,
  `time` time NOT NULL,
  `max_transaksi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_admin` int(11) DEFAULT NULL,
  `id_superadmin` int(11) DEFAULT NULL,
  `id_adminpayroll` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_gaji2`
--

CREATE TABLE `jadwal_gaji2` (
  `id_jadwal` int(11) NOT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tgl_gaji` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_payroll`
--

CREATE TABLE `log_payroll` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL,
  `status` enum('SUCCESS','FAILED') DEFAULT 'SUCCESS',
  `transfer_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_superadmin` int(11) DEFAULT NULL,
  `id_adminpayroll` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_payroll`
--

INSERT INTO `log_payroll` (`id_log`, `id_user`, `id_perusahaan`, `amount`, `status`, `transfer_date`, `id_superadmin`, `id_adminpayroll`) VALUES
(1, 4, 6, 50000000.00, 'SUCCESS', '2024-11-30 10:08:24', NULL, NULL),
(2, 7, 6, 5000.00, 'SUCCESS', '2024-11-30 10:08:24', NULL, NULL),
(3, 10, 6, 500000.00, 'SUCCESS', '2024-11-30 10:08:24', NULL, NULL),
(4, 11, 6, 1000000.00, 'SUCCESS', '2024-11-30 10:08:24', NULL, NULL),
(5, 15, 6, 80000000.00, 'SUCCESS', '2024-11-30 10:08:24', NULL, NULL),
(6, 20, 6, 700.00, 'SUCCESS', '2024-11-30 10:08:24', NULL, NULL),
(7, 25, 6, 90000000.00, 'SUCCESS', '2024-11-30 10:08:24', NULL, NULL),
(8, 26, 6, 20000000.00, 'SUCCESS', '2024-11-30 10:08:24', NULL, NULL),
(9, 4, 6, 50000000.00, 'SUCCESS', '2024-11-30 14:36:10', NULL, NULL),
(10, 7, 6, 5000.00, 'SUCCESS', '2024-11-30 14:36:10', NULL, NULL),
(11, 10, 6, 500000.00, 'SUCCESS', '2024-11-30 14:36:10', NULL, NULL),
(12, 11, 6, 1000000.00, 'SUCCESS', '2024-11-30 14:36:10', NULL, NULL),
(13, 15, 6, 80000000.00, 'SUCCESS', '2024-11-30 14:36:10', NULL, NULL),
(14, 20, 6, 700.00, 'SUCCESS', '2024-11-30 14:36:10', NULL, NULL),
(15, 25, 6, 90000000.00, 'SUCCESS', '2024-11-30 14:36:10', NULL, NULL),
(16, 26, 6, 20000000.00, 'SUCCESS', '2024-11-30 14:36:10', NULL, NULL),
(17, 27, 6, 100000000.00, 'SUCCESS', '2024-11-30 14:57:31', NULL, NULL),
(18, 28, 6, 80000000.00, 'SUCCESS', '2024-11-30 15:15:40', NULL, NULL),
(19, 30, 6, 10000.00, 'SUCCESS', '2024-11-30 17:08:50', NULL, NULL),
(20, 31, 6, 150000000.00, 'SUCCESS', '2024-11-30 18:01:30', NULL, NULL),
(21, 29, 6, 90000000.00, 'SUCCESS', '2024-11-30 18:01:44', NULL, NULL),
(22, 32, 6, 90000.00, 'SUCCESS', '2024-11-30 18:11:43', NULL, NULL),
(23, 33, 6, 50000.00, 'SUCCESS', '2024-11-30 18:14:59', NULL, NULL),
(24, 34, 6, 800000.00, 'SUCCESS', '2024-11-30 18:19:15', NULL, NULL),
(25, 35, 6, 800000.00, 'SUCCESS', '2024-11-30 18:28:23', NULL, NULL),
(26, 36, 6, 80000000.00, 'SUCCESS', '2024-11-30 18:31:53', NULL, NULL),
(27, 37, 6, 500000000.00, 'SUCCESS', '2024-11-30 18:33:20', NULL, NULL),
(28, 38, 6, 80000000.00, 'SUCCESS', '2024-11-30 19:19:01', NULL, NULL),
(29, 39, 6, 300000000.00, 'SUCCESS', '2024-11-30 19:21:07', NULL, NULL),
(31, 42, 6, 100000.00, 'SUCCESS', '2024-11-30 19:55:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_30_155655_add_jadwal_gaji_to_user_perusahaan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat` varchar(125) DEFAULT NULL,
  `nohp_perusahaan` varchar(20) DEFAULT NULL,
  `norek_perusahaan` varchar(50) DEFAULT NULL,
  `saldo` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_admin` int(11) DEFAULT NULL,
  `id_superadmin` int(11) DEFAULT NULL,
  `id_adminpayroll` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `nohp_perusahaan`, `norek_perusahaan`, `saldo`, `created_at`, `updated_at`, `id_admin`, `id_superadmin`, `id_adminpayroll`) VALUES
(6, 'UKDW', 'jogja', '08310802803', '081321', 39900000.00, '2024-11-29 08:10:16', '2024-11-30 12:55:57', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `super_admin`
--

CREATE TABLE `super_admin` (
  `id_superadmin` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(125) DEFAULT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `super_admin`
--

INSERT INTO `super_admin` (`id_superadmin`, `username`, `password`, `tgl_buat`, `tgl_update`) VALUES
(111, 'superadmin', '$2y$10$g.Z.BlqKlwMjMF/dTydvbOryBoYAZaql5f0nFTdo7zhM6OOgP5rUm', '2024-11-20 12:03:51', '2024-11-20 12:49:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_perusahaan`
--

CREATE TABLE `user_perusahaan` (
  `id_user` int(11) NOT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `nama_user` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `alamat` varchar(125) DEFAULT NULL,
  `gaji` decimal(15,2) NOT NULL,
  `norek_user` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_admin` int(11) DEFAULT NULL,
  `id_superadmin` int(11) DEFAULT NULL,
  `id_adminpayroll` int(11) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE','PENDING','PAID') DEFAULT 'ACTIVE',
  `jadwal_gaji_tanggal` date DEFAULT NULL,
  `jadwal_gaji_jam` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_perusahaan`
--

INSERT INTO `user_perusahaan` (`id_user`, `id_perusahaan`, `nama_user`, `jabatan`, `alamat`, `gaji`, `norek_user`, `created_at`, `updated_at`, `id_admin`, `id_superadmin`, `id_adminpayroll`, `status`, `jadwal_gaji_tanggal`, `jadwal_gaji_jam`) VALUES
(4, NULL, 'Olivia Rodrigo0', 'apa kek', 'BNI', 50000000.00, '1234567', '2024-11-16 02:00:26', '2024-11-30 13:12:18', NULL, NULL, NULL, 'PAID', NULL, NULL),
(7, NULL, 'Andika Cakrabirawa', 'Front-end', 'BCA', 5000.00, '1234567', '2024-11-16 09:05:34', '2024-11-30 03:08:24', NULL, NULL, NULL, 'PAID', NULL, NULL),
(10, NULL, 'Riko', 'BPH', 'BCA', 500000.00, '12345', '2024-11-20 02:08:06', '2024-11-30 03:08:24', NULL, NULL, NULL, 'PAID', NULL, NULL),
(11, NULL, 'Albert', 'miba', 'BCA', 1000000.00, '346367', '2024-11-20 02:47:19', '2024-11-30 03:08:24', NULL, NULL, NULL, 'PAID', NULL, NULL),
(15, NULL, 'Yohanes', 'kdnkas', 'BCA', 80000000.00, '8048324', '2024-11-20 02:58:37', '2024-11-30 03:08:24', NULL, NULL, NULL, 'PAID', NULL, NULL),
(20, NULL, 'rikoars', 'hsdbhas', 'BCA', 700.00, '88787', '2024-11-20 06:18:11', '2024-11-30 03:08:24', NULL, NULL, NULL, 'PAID', NULL, NULL),
(25, NULL, 'Cristiano Ronaldo', 'Project Manager', 'Mandiri', 90000000.00, '1234567', '2024-11-29 10:53:05', '2024-11-30 03:08:24', NULL, NULL, NULL, 'PAID', NULL, NULL),
(26, NULL, 'Joepablohh', 'sadasd', 'CIMB Niaga', 20000000.00, '213123', '2024-11-30 01:59:04', '2024-11-30 03:08:24', NULL, NULL, NULL, 'PAID', NULL, NULL),
(27, NULL, 'Eminem', 'BOS', 'BCA', 100000000.00, '8080909', '2024-11-30 07:54:45', '2024-11-30 07:57:31', NULL, NULL, NULL, 'PAID', NULL, NULL),
(28, NULL, 'sadasd', 'sadasd', 'BNI', 80000000.00, '8009', '2024-11-30 08:14:40', '2024-11-30 08:15:40', NULL, NULL, NULL, 'PAID', NULL, NULL),
(29, NULL, 'kendrick lamar', 'KING', 'BCA', 90000000.00, '899898', '2024-11-30 08:21:02', '2024-11-30 11:01:44', NULL, NULL, NULL, 'PAID', '2024-12-01', '23:22:00'),
(30, NULL, 'tes', 'sad', 'Mandiri', 10000.00, '89800', '2024-11-30 09:27:18', '2024-11-30 10:08:49', NULL, NULL, NULL, 'PAID', '2024-12-01', '12:56:00'),
(31, NULL, 'The Weekend', 'PM', 'BNI', 150000000.00, '1231324', '2024-11-30 10:13:31', '2024-11-30 11:01:30', NULL, NULL, NULL, 'PAID', '2024-12-01', '00:17:00'),
(32, NULL, 'jsasa', 'njsnja', 'Mandiri', 90000.00, '981812', '2024-11-30 11:03:30', '2024-11-30 11:11:43', NULL, NULL, NULL, 'PAID', '2024-12-01', '01:11:00'),
(33, NULL, 'asuuuuu', 'bdsksakdbkas', 'BCA', 50000.00, '271372170', '2024-11-30 11:14:39', '2024-11-30 11:14:59', NULL, NULL, NULL, 'PAID', NULL, NULL),
(34, NULL, 'hiaihdsasiiii', 'abdjasbd', 'BCA', 800000.00, '000000', '2024-11-30 11:18:57', '2024-11-30 11:19:15', NULL, NULL, NULL, 'PAID', NULL, NULL),
(35, NULL, 'HHHHHHHHHHHHHHHH', 'NNNNNNNNNNN', 'Mandiri', 800000.00, '88989', '2024-11-30 11:22:28', '2024-11-30 11:28:23', NULL, NULL, NULL, 'PAID', '2024-12-01', '01:28:00'),
(36, NULL, 'nangis', 'njsnakda', 'BNI', 80000000.00, '08080', '2024-11-30 11:30:00', '2024-11-30 11:31:53', NULL, NULL, NULL, 'PAID', '2024-12-01', '02:31:00'),
(37, NULL, 'jjjjjjjjjjj', 'sada', 'CIMB Niaga', 500000000.00, '21312', '2024-11-30 11:30:27', '2024-11-30 11:33:20', NULL, NULL, NULL, 'PAID', '2024-12-02', '02:33:00'),
(38, NULL, 'Bimbing aku', 'Full stack Programmer', 'BCA', 80000000.00, '89899', '2024-11-30 12:15:07', '2024-11-30 12:19:01', NULL, NULL, NULL, 'PAID', '2024-12-02', '03:15:00'),
(39, NULL, 'God is Good', 'KING', 'BCA', 300000000.00, '98080980', '2024-11-30 12:20:01', '2024-11-30 12:21:07', NULL, NULL, NULL, 'PAID', '2024-12-01', '16:19:00'),
(42, NULL, 'sadas', 'sadasd', 'BCA', 100000.00, '214554', '2024-11-30 12:54:51', '2024-11-30 12:55:56', NULL, NULL, NULL, 'PAID', '2024-12-01', '03:55:00'),
(43, NULL, 'Joe Junior', 'h', 'Mandiri', 100000.00, '123456799', '2024-11-30 13:01:30', '2024-11-30 13:03:05', NULL, NULL, NULL, 'ACTIVE', NULL, NULL),
(44, NULL, 'haduh', 'haha', 'BNI', 80000000.00, '123456777', '2024-11-30 13:13:04', '2024-11-30 13:13:04', NULL, NULL, NULL, 'ACTIVE', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `admin_payroll`
--
ALTER TABLE `admin_payroll`
  ADD PRIMARY KEY (`id_adminpayroll`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwal_gaji`
--
ALTER TABLE `jadwal_gaji`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_perusahaan` (`id_perusahaan`),
  ADD KEY `fk_jadwal_gaji_admin` (`id_admin`),
  ADD KEY `fk_jadwal_gaji_superadmin` (`id_superadmin`),
  ADD KEY `fk_jadwal_gaji_adminpayroll` (`id_adminpayroll`);

--
-- Indeks untuk tabel `jadwal_gaji2`
--
ALTER TABLE `jadwal_gaji2`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indeks untuk tabel `log_payroll`
--
ALTER TABLE `log_payroll`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_perusahaan` (`id_perusahaan`),
  ADD KEY `fk_log_gaji_superadmin` (`id_superadmin`),
  ADD KEY `fk_log_payroll_adminpayroll` (`id_adminpayroll`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD KEY `fk_perusahaan_admin` (`id_admin`),
  ADD KEY `fk_perusahaan_superadmin` (`id_superadmin`),
  ADD KEY `fk_perusahaan_adminpayroll` (`id_adminpayroll`);

--
-- Indeks untuk tabel `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id_superadmin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_perusahaan`
--
ALTER TABLE `user_perusahaan`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_perusahaan` (`id_perusahaan`),
  ADD KEY `fk_user_perusahaan_admin` (`id_admin`),
  ADD KEY `fk_user_perusahaan_superadmin` (`id_superadmin`),
  ADD KEY `fk_user_perusahaan_adminpayroll` (`id_adminpayroll`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_gaji`
--
ALTER TABLE `jadwal_gaji`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_gaji2`
--
ALTER TABLE `jadwal_gaji2`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_payroll`
--
ALTER TABLE `log_payroll`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_perusahaan`
--
ALTER TABLE `user_perusahaan`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_gaji`
--
ALTER TABLE `jadwal_gaji`
  ADD CONSTRAINT `fk_jadwal_gaji_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_jadwal_gaji_adminpayroll` FOREIGN KEY (`id_adminpayroll`) REFERENCES `admin_payroll` (`id_adminpayroll`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_jadwal_gaji_superadmin` FOREIGN KEY (`id_superadmin`) REFERENCES `super_admin` (`id_superadmin`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_gaji_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_gaji2`
--
ALTER TABLE `jadwal_gaji2`
  ADD CONSTRAINT `jadwal_gaji2_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log_payroll`
--
ALTER TABLE `log_payroll`
  ADD CONSTRAINT `fk_log_gaji_superadmin` FOREIGN KEY (`id_superadmin`) REFERENCES `super_admin` (`id_superadmin`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_log_payroll_adminpayroll` FOREIGN KEY (`id_adminpayroll`) REFERENCES `admin_payroll` (`id_adminpayroll`) ON DELETE CASCADE,
  ADD CONSTRAINT `log_payroll_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_perusahaan` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `log_payroll_ibfk_2` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `fk_perusahaan_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_perusahaan_adminpayroll` FOREIGN KEY (`id_adminpayroll`) REFERENCES `admin_payroll` (`id_adminpayroll`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_perusahaan_superadmin` FOREIGN KEY (`id_superadmin`) REFERENCES `super_admin` (`id_superadmin`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_perusahaan`
--
ALTER TABLE `user_perusahaan`
  ADD CONSTRAINT `fk_user_perusahaan_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_perusahaan_adminpayroll` FOREIGN KEY (`id_adminpayroll`) REFERENCES `admin_payroll` (`id_adminpayroll`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_perusahaan_superadmin` FOREIGN KEY (`id_superadmin`) REFERENCES `super_admin` (`id_superadmin`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_perusahaan_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
