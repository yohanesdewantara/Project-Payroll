-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2024 pada 20.03
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_admin` int(11) DEFAULT NULL,
  `id_superadmin` int(11) DEFAULT NULL,
  `id_adminpayroll` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `nohp_perusahaan`, `norek_perusahaan`, `created_at`, `updated_at`, `id_admin`, `id_superadmin`, `id_adminpayroll`) VALUES
(2, 'UKDW Yogya', 'Gondokusuman yogyakarta', '08098908', '267136721', '2024-11-16 09:23:22', '2024-11-18 19:32:16', NULL, NULL, NULL),
(3, 'Atma Jayaa', 'gondokusuman', '090909', '88988998', '2024-11-20 03:22:50', '2024-11-20 03:22:59', NULL, NULL, NULL);

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
  `id_adminpayroll` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_perusahaan`
--

INSERT INTO `user_perusahaan` (`id_user`, `id_perusahaan`, `nama_user`, `jabatan`, `alamat`, `gaji`, `norek_user`, `created_at`, `updated_at`, `id_admin`, `id_superadmin`, `id_adminpayroll`) VALUES
(4, NULL, 'Olivia Rodrigo', 'apa kek', 'BNI', 50000000.00, '1234567', '2024-11-16 02:00:26', '2024-11-18 19:31:21', NULL, NULL, NULL),
(7, NULL, 'Andika Cakrabirawa', 'Front-end', 'BCA', 5000.00, '1234567', '2024-11-16 09:05:34', '2024-11-18 05:41:03', NULL, NULL, NULL),
(10, NULL, 'Riko', 'BPH', 'BCA', 500000.00, '12345', '2024-11-20 02:08:06', '2024-11-20 02:08:06', NULL, NULL, NULL),
(11, NULL, 'Albert', 'miba', 'BCA', 1000000.00, '346367', '2024-11-20 02:47:19', '2024-11-20 02:47:19', NULL, NULL, NULL),
(12, NULL, 'tania', 'anggota bpm', 'BCA', 10000000.00, '67677', '2024-11-20 02:49:31', '2024-11-20 02:51:21', NULL, NULL, NULL),
(13, NULL, 'aya', 'auditor', 'BNI', 20000000.00, '89989', '2024-11-20 02:53:50', '2024-11-20 02:53:50', NULL, NULL, NULL),
(14, NULL, 'Grace', 'ketua bem fk', 'BCA', 70000000.00, '2874984', '2024-11-20 02:56:14', '2024-11-20 02:56:14', NULL, NULL, NULL),
(15, NULL, 'Yohanes', 'kdnkas', 'BCA', 80000000.00, '8048324', '2024-11-20 02:58:37', '2024-11-20 02:58:37', NULL, NULL, NULL),
(19, NULL, 'Angel', 'BPH', 'BCA', 900000000.00, '676767', '2024-11-20 04:38:18', '2024-11-20 04:38:18', NULL, NULL, NULL),
(20, NULL, 'rikoars', 'hsdbhas', 'BCA', 700.00, '88787', '2024-11-20 06:18:11', '2024-11-20 06:18:11', NULL, NULL, NULL);

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
-- AUTO_INCREMENT untuk tabel `log_payroll`
--
ALTER TABLE `log_payroll`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_perusahaan`
--
ALTER TABLE `user_perusahaan`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
