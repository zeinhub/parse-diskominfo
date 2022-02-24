-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2022 pada 07.20
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parse`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dinas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`uuid`, `username`, `nama_admin`, `judul`, `link`, `kategori`, `tahun`, `wilayah`, `dinas`, `created_at`, `updated_at`) VALUES
('22f463228bc611ec8c2300fff77bfb78', 'admin', 'Muhammad Sigit Tri P', 'Bupati Zaki Keluarkan Kebijakan terkait Pemberlakuan PPKM Level 3 Kabupaten Tangerang', 'https://tangerangkab.go.id/detail-konten/show-berita/5375', 'Pemerintahan', 2020, 'Tangerang', 'kominfo', '2022-02-12 05:39:26', '2022-02-12 05:43:03'),
('3e92bb608bc611ec823600fff77bfb78', 'admin', 'Muhammad Sigit Tri P', 'Aturan Baru PPKM, Perangkat Daerah Diminta Atur WFO 50 Persen dari Jumlah ASN', 'https://tangerangkab.go.id/detail-konten/show-berita/5368', 'Pengumuman', 2022, 'Tangerang', 'kominfo', '2022-02-12 05:40:11', '2022-02-12 05:40:11'),
('651ef1688bc611ecadef00fff77bfb78', 'admin', 'Muhammad Sigit Tri P', 'Camat Mekar Baru Minta Bappeda Prioritaskan Pembangunan Jalan Bendung', 'https://tangerangkab.go.id/detail-konten/show-berita/5371', 'Pembangunan', 2022, 'Tangerang', 'kominfo', '2022-02-12 05:41:16', '2022-02-12 05:41:16'),
('8ccb9b768bc611ec9b6300fff77bfb78', 'admin', 'Muhammad Sigit Tri P', 'Bapenda Targetkan Pendapatan Daerah Lebih Rp1 Triliun dari PBB BPHTB', 'https://tangerangkab.go.id/detail-konten/show-berita/5367', 'Umum', 2022, 'Tangerang', 'kominfo', '2022-02-12 05:42:22', '2022-02-12 05:42:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `artikel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_file` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id`, `artikel_id`, `nama_file`, `jenis_file`, `created_at`, `updated_at`) VALUES
(25, '22f463228bc611ec8c2300fff77bfb78', '1644644365770-kilarov-zaneit-ZRFztIxiy3M-unsplash.jpg', 'foto', '2022-02-12 05:39:25', '2022-02-12 05:39:25'),
(26, '22f463228bc611ec8c2300fff77bfb78', '1644644366029-Aboriginal-Dance-1.mp4', 'video', '2022-02-12 05:39:26', '2022-02-12 05:39:26'),
(27, '22f463228bc611ec8c2300fff77bfb78', '1644644366031-LINE_MOVIE_1531321645543.mp4', 'video', '2022-02-12 05:39:26', '2022-02-12 05:39:26'),
(28, '3e92bb608bc611ec823600fff77bfb78', '1644644411193-jordan-wozniak-xP_AGmeEa6s-unsplash.jpg', 'foto', '2022-02-12 05:40:11', '2022-02-12 05:40:11'),
(29, '3e92bb608bc611ec823600fff77bfb78', '1644644411361-timothy-eberly-VgvMDrPoCN4-unsplash.jpg', 'foto', '2022-02-12 05:40:11', '2022-02-12 05:40:11'),
(30, '651ef1688bc611ecadef00fff77bfb78', '1644644475839-kilarov-zaneit-ZRFztIxiy3M-unsplash.jpg', 'foto', '2022-02-12 05:41:15', '2022-02-12 05:41:15'),
(31, '651ef1688bc611ecadef00fff77bfb78', '1644644475964-Aboriginal-Dance-1.mp4', 'video', '2022-02-12 05:41:15', '2022-02-12 05:41:15'),
(32, '8ccb9b768bc611ec9b6300fff77bfb78', '1644644542436-Aboriginal-Dance-1.mp4', 'video', '2022-02-12 05:42:22', '2022-02-12 05:42:22'),
(33, '8ccb9b768bc611ec9b6300fff77bfb78', '1644644542438-LINE_MOVIE_1531321645543.mp4', 'video', '2022-02-12 05:42:22', '2022-02-12 05:42:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_02_020624_create_artikel_table', 1),
(6, '2022_02_02_020742_create_file_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'Muhammad Sigit Tri P', 'admin', 'sigittri2602@gmail.com', NULL, '$2y$10$6htQp6Obuo65wKFuTmu4Lu36NPFO6jdsQ61VlGTW8fS.xyLL.wneu', 'admin', NULL, '2022-02-09 15:46:05', '2022-02-09 15:46:05'),
(14, 'Muhammad Sigit', 'user', 'sigit.tri19@mhs.uinjkt.ac.id', NULL, '$2y$10$op2o0uaIBDnxqPTguwCDg.jdCCy0fVOZQ.8fCFWxHLqHsOXkl0EPq', 'user', NULL, '2022-02-09 15:46:33', '2022-02-09 15:46:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `link_unique` (`link`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
