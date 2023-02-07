-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2023 pada 10.16
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensidesa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absenharians`
--

CREATE TABLE `absenharians` (
  `id_absenharian` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasiharian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotofasdes` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotokegiatanharian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absenkegiatans`
--

CREATE TABLE `absenkegiatans` (
  `id_absenkegiatan` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalabsen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktuabsen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasiabsen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jeniskegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsikegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelatihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selfiekegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotokegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotopelatihan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judulpelatihan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `durasipelatihan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempatpelatihan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absenkegiatans`
--

INSERT INTO `absenkegiatans` (`id_absenkegiatan`, `id_user`, `tanggalabsen`, `waktuabsen`, `lokasiabsen`, `jeniskegiatan`, `deskripsikegiatan`, `pelatihan`, `selfiekegiatan`, `fotokegiatan`, `fotopelatihan`, `judulpelatihan`, `durasipelatihan`, `tempatpelatihan`, `created_at`, `updated_at`) VALUES
(5, '2', '2023-02-07', '15:14', '-6.9451822,106.876853', 'kantor', 'Absen kegiatan', 'pelatihan', 'fasdes_2023-02-07.png', 'kegiatan_2023-02-07.png', 'pelatihan_2023-02-07.png', 'Pelatihan Penanaman Cabai', '600', 'Subang', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `desas`
--

CREATE TABLE `desas` (
  `id_desa` bigint(20) UNSIGNED NOT NULL,
  `id_kecamatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id_kecamatan` bigint(20) UNSIGNED NOT NULL,
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasis`
--

CREATE TABLE `lokasis` (
  `id_lokasi` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_desa` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lokasis`
--

INSERT INTO `lokasis` (`id_lokasi`, `id_user`, `id_desa`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, '2', NULL, '-6.945171416070561,106.87683463096619', NULL, NULL);

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
(5, '2023_02_01_033449_create_poktans_table', 1),
(6, '2023_02_01_054946_create_desas_table', 1),
(7, '2023_02_01_055222_create_kecamatans_table', 1),
(8, '2023_02_01_071859_create_lokasis_table', 1),
(9, '2023_02_03_033218_create_absenharians_table', 1),
(10, '2023_02_03_033218_create_absenkegiatans_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `poktans`
--

CREATE TABLE `poktans` (
  `id_poktan` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namapoktan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luastanah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahproduksi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemeliharaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pasar` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasipoktan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahpetani` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jeniskelamin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `alamat`, `no_telp`, `jeniskelamin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adminbaru', 'admin@admin.com', '2023-02-07 00:07:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NULL, NULL, NULL, 'gmg0wwxIt1Czo9ajSlXRsMiE7Deowc99dlJmWhwBEvBnCd6fC2QQjheNZtR1', '2023-02-07 00:07:34', '2023-02-07 00:07:34'),
(2, 'Cibogo', 'user@gmail.com', NULL, '$2y$10$bNeBprLJcR7QezqgM791LeLWajudPKL/fOCEc0Z/l010YWCBns68.', 'fasdes', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absenharians`
--
ALTER TABLE `absenharians`
  ADD PRIMARY KEY (`id_absenharian`);

--
-- Indeks untuk tabel `absenkegiatans`
--
ALTER TABLE `absenkegiatans`
  ADD PRIMARY KEY (`id_absenkegiatan`);

--
-- Indeks untuk tabel `desas`
--
ALTER TABLE `desas`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `lokasis`
--
ALTER TABLE `lokasis`
  ADD PRIMARY KEY (`id_lokasi`);

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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `poktans`
--
ALTER TABLE `poktans`
  ADD PRIMARY KEY (`id_poktan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absenharians`
--
ALTER TABLE `absenharians`
  MODIFY `id_absenharian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `absenkegiatans`
--
ALTER TABLE `absenkegiatans`
  MODIFY `id_absenkegiatan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `desas`
--
ALTER TABLE `desas`
  MODIFY `id_desa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  MODIFY `id_kecamatan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lokasis`
--
ALTER TABLE `lokasis`
  MODIFY `id_lokasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `poktans`
--
ALTER TABLE `poktans`
  MODIFY `id_poktan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
