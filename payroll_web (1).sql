-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2024 pada 10.01
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
(1, NULL, 'Yohanes', 'Project Manager', 'London', 50000000.00, '123456788', '2024-11-16 00:38:24', '2024-11-16 01:43:37', NULL, NULL, NULL),
(2, NULL, 'Ronaldo', 'HRD', 'Lisbon', 100000000.00, '25321535712638', '2024-11-16 00:40:05', '2024-11-16 00:40:05', NULL, NULL, NULL),
(4, NULL, 'Olivia Rodrigo', 'apa kek', 'mana ya', 50000000.00, '2969126312', '2024-11-16 02:00:26', '2024-11-16 02:00:26', NULL, NULL, NULL);

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
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_perusahaan`
--
ALTER TABLE `user_perusahaan`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
