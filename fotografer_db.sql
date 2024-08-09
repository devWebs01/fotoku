-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2023 at 03:27 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `fotografer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
    `id` int(10) UNSIGNED NOT NULL,
    `no_rek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `atas_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `fotografer_id` int(10) UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO
    `bank` (
        `id`,
        `no_rek`,
        `atas_nama`,
        `fotografer_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        '12345',
        'fotografer',
        2,
        '2023-06-02 02:24:34',
        '2023-06-02 02:24:34'
    );

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
    `id` int(10) UNSIGNED NOT NULL,
    `pelanggan_id` int(10) UNSIGNED NOT NULL,
    `produk_id` int(10) UNSIGNED NOT NULL,
    `jadwal_id` int(10) UNSIGNED NOT NULL,
    `total_bayar` double(11, 1) DEFAULT NULL,
    `total_booking` double(11, 1) DEFAULT NULL,
    `bukti_booking` text COLLATE utf8mb4_unicode_ci,
    `bukti_bayar` text COLLATE utf8mb4_unicode_ci,
    `status_booking` enum(
        'Booking',
        'Cancel',
        'DP',
        'Lunas',
        'Selesai'
    ) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DP',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO
    `booking` (
        `id`,
        `pelanggan_id`,
        `produk_id`,
        `jadwal_id`,
        `total_bayar`,
        `total_booking`,
        `bukti_booking`,
        `bukti_bayar`,
        `status_booking`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        3,
        1,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        'Booking',
        '2023-06-02 15:04:00',
        '2023-06-02 15:04:00'
    );

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
    `id` int(10) UNSIGNED NOT NULL,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `fotografer_id` int(10) UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO
    `galeri` (
        `id`,
        `name`,
        `judul`,
        `deskripsi`,
        `fotografer_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        '1685673359_brytny-com-C4rXIFSzEXk-unsplash.jpg',
        'Balita  Lucu',
        'Pure joy captured in every frame, as this adorable toddler explores the world with wide-eyed wonder',
        2,
        '2023-06-02 02:35:59',
        '2023-06-02 02:43:35'
    );

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
    `id` int(10) UNSIGNED NOT NULL,
    `tgl_acara` date NOT NULL,
    `jam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `deskripsi_acara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status` enum(
        'Booking',
        'Cancel',
        'Selesai'
    ) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Booking',
    `link_foto` text COLLATE utf8mb4_unicode_ci,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO
    `jadwal` (
        `id`,
        `tgl_acara`,
        `jam`,
        `deskripsi_acara`,
        `status`,
        `link_foto`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        '2023-06-30',
        '19:00',
        'Acara malam sampai jam 10.00 di aula',
        'Booking',
        NULL,
        '2023-06-02 15:04:00',
        '2023-06-02 15:04:00'
    );

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
    `id` int(10) UNSIGNED NOT NULL,
    `nama_kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `keterangan` text COLLATE utf8mb4_unicode_ci,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO
    `kecamatan` (
        `id`,
        `nama_kecamatan`,
        `keterangan`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Alam Barajo',
        NULL,
        '2023-06-02 01:10:22',
        '2023-06-02 01:10:22'
    ),
    (
        2,
        'Danau Sipin',
        NULL,
        '2023-06-02 01:10:54',
        '2023-06-02 01:10:54'
    ),
    (
        3,
        'Danau Teluk',
        NULL,
        '2023-06-02 01:11:01',
        '2023-06-02 01:11:01'
    ),
    (
        4,
        'Jambi Selatan',
        NULL,
        '2023-06-02 01:11:10',
        '2023-06-02 01:11:10'
    ),
    (
        5,
        'Jambi Timur',
        NULL,
        '2023-06-02 01:11:18',
        '2023-06-02 01:11:18'
    ),
    (
        6,
        'Jelutung',
        NULL,
        '2023-06-02 01:11:27',
        '2023-06-02 01:11:27'
    ),
    (
        7,
        'Kota Baru',
        NULL,
        '2023-06-02 01:11:35',
        '2023-06-02 01:11:35'
    ),
    (
        8,
        'Paal Merah',
        NULL,
        '2023-06-02 01:11:42',
        '2023-06-02 01:11:42'
    ),
    (
        9,
        'Pasar Jambi',
        NULL,
        '2023-06-02 01:11:50',
        '2023-06-02 01:11:50'
    ),
    (
        10,
        'Pelayangan',
        NULL,
        '2023-06-02 01:11:57',
        '2023-06-02 01:11:57'
    ),
    (
        11,
        'Telanaipura',
        NULL,
        '2023-06-02 01:12:04',
        '2023-06-02 01:12:04'
    );

-- --------------------------------------------------------

--
-- Table structure for table `komunitas`
--

CREATE TABLE `komunitas` (
    `id` int(10) UNSIGNED NOT NULL,
    `nama_komunitas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `komunitas`
--

INSERT INTO
    `komunitas` (
        `id`,
        `nama_komunitas`,
        `alamat`,
        `created_at`,
        `updated_at`
    )
VALUES (
        9,
        'Forum Kecamatan Jambi Timur',
        'bbbcc',
        '2023-05-17 07:50:25',
        '2023-05-19 05:02:04'
    ),
    (
        10,
        'forum 2',
        'adasda asda',
        '2023-05-21 04:37:27',
        '2023-05-21 04:37:27'
    );

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
    `id` int(10) UNSIGNED NOT NULL,
    `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `batch` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO
    `migrations` (`id`, `migration`, `batch`)
VALUES (
        3,
        '2023_05_16_143559_create_komunitas_table',
        1
    ),
    (
        11,
        '2019_12_14_000001_create_personal_access_tokens_table',
        2
    ),
    (
        12,
        '2023_05_16_00000_create_roles_table',
        2
    ),
    (
        13,
        '2023_05_16_143559_create_kecamatan_table',
        2
    ),
    (
        14,
        '2023_05_16_143627_create_users_table',
        2
    ),
    (
        15,
        '2023_05_16_143742_create_bank_table',
        2
    ),
    (
        16,
        '2023_05_16_143957_create_galeri_table',
        2
    ),
    (
        17,
        '2023_05_16_144123_create_produk_table',
        2
    ),
    (
        18,
        '2023_05_16_144559_create_jadwal_table',
        2
    ),
    (
        19,
        '2023_05_16_144746_create_booking_table',
        2
    ),
    (
        20,
        '2023_05_17_083844_create_settings_table',
        2
    );

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `tokenable_id` bigint(20) UNSIGNED NOT NULL,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `abilities` text COLLATE utf8mb4_unicode_ci,
    `last_used_at` timestamp NULL DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
    `id` int(10) UNSIGNED NOT NULL,
    `fotografer_id` int(10) UNSIGNED NOT NULL,
    `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `harga` double(11, 1) NOT NULL,
    `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `gambar_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `gambar_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO
    `produk` (
        `id`,
        `fotografer_id`,
        `nama_produk`,
        `harga`,
        `info`,
        `gambar_1`,
        `gambar_2`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        2,
        'PREWEDDING STUDIO INDOOR',
        1000000.0,
        '1 Konsep Studio, 30 edit foto, dikirim via drive, cetak foto 22r+frame',
        '1685675900_Screenshot_1.png',
        '1685675900_Screenshot_1.png',
        '2023-06-02 03:18:20',
        '2023-06-02 03:19:43'
    );

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
    `id` int(10) UNSIGNED NOT NULL,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO
    `roles` (
        `id`,
        `name`,
        `guard_name`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'admin',
        'web',
        '2023-06-02 00:14:02',
        '2023-06-02 00:14:02'
    ),
    (
        2,
        'fotografer',
        'web',
        '2023-06-02 00:14:02',
        '2023-06-02 00:14:02'
    ),
    (
        3,
        'pelanggan',
        'web',
        '2023-06-02 00:14:02',
        '2023-06-02 00:14:02'
    );

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
    `id` int(10) UNSIGNED NOT NULL,
    `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `ext` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `category` enum(
        'information',
        'contact',
        'payment',
        'email',
        'api'
    ) COLLATE utf8mb4_unicode_ci DEFAULT 'information',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO
    `settings` (
        `id`,
        `key`,
        `value`,
        `name`,
        `type`,
        `ext`,
        `category`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'app_name',
        'E-Market Freelance Photografer ',
        'eFotografer',
        'text',
        NULL,
        'information',
        '2023-06-02 00:14:02',
        '2023-06-02 15:08:10'
    ),
    (
        2,
        'app_short_name',
        'E-Market Freelance Photografer ',
        'Application Name',
        'text',
        NULL,
        'information',
        '2023-06-02 00:14:02',
        '2023-06-02 15:08:10'
    ),
    (
        3,
        'app_logo',
        'storage/logo.jpg',
        'Application Logo',
        'file',
        'png',
        'information',
        '2023-06-02 00:14:02',
        '2023-06-02 15:08:10'
    ),
    (
        4,
        'app_favicon',
        'storage/logo.jpg',
        'Application Favicon',
        'file',
        'png',
        'information',
        '2023-06-02 00:14:02',
        '2023-06-02 15:08:10'
    ),
    (
        5,
        'app_loading_gif',
        'storage/loading3.svg',
        'Application Loading Image',
        'file',
        'gif',
        'information',
        '2023-06-02 00:14:02',
        '2023-06-02 15:08:10'
    ),
    (
        6,
        'app_map_loaction',
        'https://www.google.com/maps/place/Kajen,+Kec.+Kajen,+Kabupaten+Pekalongan,+Jawa+Tengah/@-7.0319606,109.5291791,13z/data=!3m1!4b1!4m5!3m4!1s0x2e6fe01fab873f61:0xc109484cee38731e!8m2!3d-7.0269252!4d109.5811772',
        'Application Map Location',
        'textarea',
        NULL,
        'contact',
        '2023-06-02 00:14:02',
        '2023-06-02 00:14:02'
    );

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
    `id` int(10) UNSIGNED NOT NULL,
    `kecamatan_id` int(10) UNSIGNED DEFAULT NULL,
    `role_id` int(10) UNSIGNED NOT NULL,
    `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `spesialisasi` enum(
        'Photography Wedding',
        'Photography Birthday',
        'Photography Food',
        'Photography Fashion',
        'Photography Street',
        'Photography Outdoor'
    ) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `alamat` text COLLATE utf8mb4_unicode_ci,
    `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `status` enum('Aktif', 'Non Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
    `tgl_lahir` date DEFAULT NULL,
    `foto_profile` text COLLATE utf8mb4_unicode_ci,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO
    `users` (
        `id`,
        `kecamatan_id`,
        `role_id`,
        `nama`,
        `spesialisasi`,
        `no_telp`,
        `alamat`,
        `email`,
        `password`,
        `status`,
        `tgl_lahir`,
        `foto_profile`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        NULL,
        1,
        'admin',
        NULL,
        NULL,
        NULL,
        'admin@admin.com',
        '$2y$10$WHmyuDys1paODGiuQXheq.EjoJW6A2VmxbEL5MAkNzJC8FBIhkhXC',
        'Aktif',
        NULL,
        NULL,
        '2023-06-02 00:14:02',
        '2023-06-02 00:14:02'
    ),
    (
        2,
        1,
        2,
        'fotografer',
        'Photography Wedding',
        '082284462826',
        'Perum Bougenville Lestari',
        'fotografer@fotografer.com',
        '$2y$10$zUouD9JvKUuYWoz6WUVJmuFyuWszpAcl4qCzwao84/QH3InMKWEqq',
        'Aktif',
        '2015-06-01',
        '1685671915_images.jpg',
        '2023-06-02 00:14:02',
        '2023-06-02 02:11:55'
    ),
    (
        3,
        NULL,
        3,
        'pelanggan',
        NULL,
        NULL,
        NULL,
        'pelanggan@pelanggan.com',
        '$2y$10$mxGd0tp2ogKx/lbFNu2N4uw0fS40XQ5I1EEWMAnaMPE1O5MJHVVxK',
        'Aktif',
        NULL,
        NULL,
        '2023-06-02 00:14:02',
        '2023-06-02 00:14:02'
    ),
    (
        4,
        1,
        2,
        'fotografer 2',
        NULL,
        '0822123456',
        'tes',
        'fotografer2@fotografer.com',
        '$2y$10$O0YtdRkXvnY7cVaoZLLWEuhBG9iRww8J6pC/nV0TImg/kCuPaajaq',
        'Aktif',
        NULL,
        NULL,
        '2023-06-02 14:27:01',
        '2023-06-02 14:27:01'
    );

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
ADD PRIMARY KEY (`id`),
ADD KEY `fk_bank_fotografer_0` (`fotografer_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
ADD PRIMARY KEY (`id`),
ADD KEY `fk_galeri_fotografer_0` (`fotografer_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komunitas`
--
ALTER TABLE `komunitas` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (
    `tokenable_type`,
    `tokenable_id`
);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
ADD PRIMARY KEY (`id`),
ADD KEY `fk_produk_fotografer_0` (`fotografer_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `users_email_unique` (`email`),
ADD KEY `fk_users_kecamatan_0` (`kecamatan_id`),
ADD KEY `fk_users_role_1` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 12;

--
-- AUTO_INCREMENT for table `komunitas`
--
ALTER TABLE `komunitas`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
ADD CONSTRAINT `fk_bank_fotografer_0` FOREIGN KEY (`fotografer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
ADD CONSTRAINT `fk_galeri_fotografer_0` FOREIGN KEY (`fotografer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
ADD CONSTRAINT `fk_produk_fotografer_0` FOREIGN KEY (`fotografer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `fk_users_kecamatan_0` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_users_role_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;