-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2023 pada 23.24
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pacipnuippnu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_event` bigint(20) UNSIGNED NOT NULL,
  `id_pengurus` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `id_event`, `id_pengurus`, `status`, `created_at`, `updated_at`) VALUES
(23, 4, 14, 'Hadir', '2023-03-18 01:10:20', '2023-03-18 01:10:20'),
(24, 4, 13, 'Hadir', '2023-03-18 01:10:51', '2023-03-18 01:10:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`id`, `nama_dept`) VALUES
(1, 'Badan Pengurus Harian'),
(2, 'Organisasi'),
(3, 'Kaderisasi'),
(4, 'Dakwah'),
(5, 'Jaringan Sekolah & Pesantren'),
(6, 'CBP-KPP'),
(7, 'Publikasi & Pers'),
(8, 'Lembaga Pemberdayaan Ekonomi dan Kewirausahaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `lokasi_event` varchar(255) NOT NULL,
  `tgl_event` date NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `nama_event`, `lokasi_event`, `tgl_event`, `deskripsi`, `created_at`, `updated_at`) VALUES
(4, 'Rutinan Selapanan', 'Gedung MWC Nusawungu', '2023-03-18', 'Menyambut Ramadhan', '2023-03-18 01:09:59', '2023-03-18 01:09:59');

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
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`) VALUES
(1, 'Ketua'),
(2, 'Sekretaris'),
(3, 'Bendahara'),
(4, 'Koordinator'),
(5, 'Anggota');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2023_03_08_103508_pengurus', 2),
(14, '2023_03_08_174557_struktur', 3),
(19, '2023_03_11_112439_pengurus', 4),
(20, '2023_03_13_091546_kegiatan', 5),
(21, '2023_03_13_092112_absensi', 6),
(22, '2023_03_15_081853_add_on_delete_to_foreign_key_in_posts_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` bigint(20) UNSIGNED NOT NULL,
  `id_jabatan` bigint(20) UNSIGNED NOT NULL,
  `id_ranting` bigint(20) UNSIGNED NOT NULL,
  `id_departemen` bigint(20) UNSIGNED NOT NULL,
  `nama_pengurus` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `id_jabatan`, `id_ranting`, `id_departemen`, `nama_pengurus`, `created_at`, `updated_at`) VALUES
(2, 4, 3, 2, 'Naufal Firmansyah', '2023-03-12 04:24:06', '2023-03-12 04:24:06'),
(3, 2, 1, 1, 'Eland Vaskita Nugraha', '2023-03-12 04:24:36', '2023-03-12 04:24:36'),
(4, 1, 4, 1, 'Rifqi Wahyu Hidayat', '2023-03-12 04:25:30', '2023-03-12 04:25:30'),
(5, 2, 5, 1, 'Fauzan Nur Imaduddin', '2023-03-12 04:26:11', '2023-03-12 04:26:11'),
(6, 4, 1, 4, 'Ryan Akbar Prastianto', '2023-03-12 04:55:43', '2023-03-12 04:55:43'),
(7, 4, 9, 3, 'Irfan Nur Hidayat', '2023-03-14 03:17:15', '2023-03-14 03:17:15'),
(8, 3, 7, 1, 'Samaizar Hawari', '2023-03-14 03:18:06', '2023-03-14 03:18:06'),
(9, 3, 5, 1, 'Kunedi', '2023-03-14 03:19:04', '2023-03-14 03:19:04'),
(10, 5, 12, 2, 'Alif Munazat', '2023-03-14 03:19:42', '2023-03-14 03:19:42'),
(11, 2, 3, 2, 'Adi Novrianto Rachmat Dhani', '2023-03-14 03:20:39', '2023-03-14 03:20:39'),
(12, 2, 7, 3, 'Subur Lutfiandi', '2023-03-14 03:22:10', '2023-03-14 03:22:10'),
(13, 2, 11, 4, 'Bagas Bayu Juliawan', '2023-03-14 03:23:19', '2023-03-14 03:23:19'),
(14, 5, 3, 3, 'Tes Aja', '2023-03-18 01:09:23', '2023-03-18 02:26:00');

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
-- Struktur dari tabel `ranting`
--

CREATE TABLE `ranting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ranting` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ranting`
--

INSERT INTO `ranting` (`id`, `nama_ranting`) VALUES
(1, 'Nusawungu'),
(2, 'Klumprit'),
(3, 'Kedungbenda'),
(4, 'BanjarSari'),
(5, 'Banjareja'),
(6, 'BanjarWaru'),
(7, 'Karang Pakis'),
(8, 'Karang Tawang'),
(9, 'Karang Putat'),
(10, 'Karang Sambung'),
(11, 'Nusawangkal'),
(12, 'Purwodadi'),
(13, 'Danasri'),
(14, 'Danasri Lor'),
(15, 'Danasri Kidul'),
(16, 'Sikanco'),
(17, 'Jetis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `level` varchar(5) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aaa@gmail.com', 'admin1', '1', NULL, '$2y$10$uAG0acgSiv2Kw/7Ln664h.msRTp9BcAGcGatn1V89JSuSkVdqoGgm', NULL, NULL, NULL),
(2, 'yCtAJ@gmail.com', 'Naufal', '2', NULL, '$2y$10$7dPYhKnZu6QgtP9wDPr7lejl/OExgNBRviLLRbT4G/X/rjQO207sW', NULL, '2023-03-12 04:24:06', '2023-03-12 04:24:06'),
(3, 'fDOQv@gmail.com', 'Eland', '2', NULL, '$2y$10$63q9FTyG.3svtuBzvfiuXOa2lInblEDbwtkdpa62GuD3/Xja9p2nm', NULL, '2023-03-12 04:24:36', '2023-03-12 04:24:36'),
(4, 'gxkb4@gmail.com', 'Rifqi', '2', NULL, '$2y$10$M4K0pSgTFMg78Db43wdF/.kJ/GKhNRiLBWO2SmpMNCqoQoSPuTeKi', NULL, '2023-03-12 04:25:30', '2023-03-12 04:25:30'),
(5, '7vp33@gmail.com', 'Fauzan', '2', NULL, '$2y$10$kle1I7I51r50NDIk.D792u3VkMIUTHL8RPdiF/gM8QlX7DKHnb8YW', NULL, '2023-03-12 04:26:11', '2023-03-12 04:26:11'),
(6, 'aGgtI@gmail.com', 'Ryan', '2', NULL, '$2y$10$hapmFR19b2fe9/vDfaey0eV1Hr9pppru7nnlHmh/0MLBzFrbForPq', NULL, '2023-03-12 04:55:43', '2023-03-12 04:55:43'),
(7, 'k3pUA@gmail.com', 'Irfan', '2', NULL, '$2y$10$9ojTEgDBtC/ZhZ7/YJI5h.bJG.g6Fr7P2/0hrvIeb3xFozAAyKVrO', NULL, '2023-03-14 03:17:15', '2023-03-14 03:17:15'),
(8, 'dqxKI@gmail.com', 'Samaizar', '2', NULL, '$2y$10$XCL0s3Z4bNzmLgpTvLmPC.4EnnMzAK6hRUyVYOhhWlswPSmH7gytq', NULL, '2023-03-14 03:18:06', '2023-03-14 03:18:06'),
(9, 'cj12R@gmail.com', 'Kunedi', '2', NULL, '$2y$10$FmUK.Ls2vl.jr8D4DqTREu7IlkoXdS5DPq44i7rXMIukAEDKlOdta', NULL, '2023-03-14 03:19:04', '2023-03-14 03:19:04'),
(10, 'EDGze@gmail.com', 'Alif', '2', NULL, '$2y$10$iX2/0WRL/fE/WtGbgYoxTOrT38wnJodxLB0KPk2fophEXrzFS.hAq', NULL, '2023-03-14 03:19:42', '2023-03-14 03:19:42'),
(11, '7lUzr@gmail.com', 'Adi', '2', NULL, '$2y$10$RiLNUW0VdT5IJCHU6qviY.kyshr2NbyjyI71T4VORaJlWxOOZx8q.', NULL, '2023-03-14 03:20:39', '2023-03-14 03:20:39'),
(12, '9eriW@gmail.com', 'Subur', '2', NULL, '$2y$10$ieraQ093nDDYhFN6hnibzuknzzsedSULxYaeKKk54uDeqKyvQF9Q6', NULL, '2023-03-14 03:22:10', '2023-03-14 03:22:10'),
(13, 'ofVan@gmail.com', 'Bagas', '2', NULL, '$2y$10$pBmitu1tMywl5fdzehp6f.Wa7Rmzp/VSwybV.kwhwRDRlMMKzTnGG', NULL, '2023-03-14 03:23:19', '2023-03-14 03:23:19'),
(14, 'kDWcx@gmail.com', 'Fauza', '2', NULL, '$2y$10$r00F0uiMFEXMqWFagulzWeXW45/5eeVvJyQ9i8mC9usLjN9i0NVHm', NULL, '2023-03-18 01:09:23', '2023-03-18 01:09:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengurus_absen_fk` (`id_pengurus`),
  ADD KEY `absensi_id_event_foreign` (`id_event`);

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD KEY `jabatan_pengurus_fk` (`id_jabatan`),
  ADD KEY `ranting_pengurus_fk` (`id_ranting`),
  ADD KEY `departemen_pengurus_fk` (`id_departemen`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `ranting`
--
ALTER TABLE `ranting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ranting`
--
ALTER TABLE `ranting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_id_event_foreign` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_absen_fk` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `pengurus_absen_fk` FOREIGN KEY (`id_pengurus`) REFERENCES `pengurus` (`id_pengurus`);

--
-- Ketidakleluasaan untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `departemen_pengurus_fk` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`id`),
  ADD CONSTRAINT `jabatan_pengurus_fk` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`),
  ADD CONSTRAINT `ranting_pengurus_fk` FOREIGN KEY (`id_ranting`) REFERENCES `ranting` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
