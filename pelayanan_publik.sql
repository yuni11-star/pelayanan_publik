-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2026 at 03:53 AM
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
-- Database: `pelayanan_publik`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `harga_pangan`
--

CREATE TABLE `harga_pangan` (
  `id` int(11) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `keterangan` varchar(512) NOT NULL,
  `waktu` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kos`
--

CREATE TABLE `kategori_kos` (
  `id_kategori` int(11) NOT NULL,
  `id_kos` int(11) DEFAULT NULL,
  `kategori_kos` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_kos`
--

INSERT INTO `kategori_kos` (`id_kategori`, `id_kos`, `kategori_kos`) VALUES
(1, 1, 'Minyak bayi (baby oil) Iden Asam Borat'),
(2, 1, 'Minyak bayi (baby oil) Iden Heksaklorofen'),
(3, 1, 'Losion bayi (baby lotion) Iden Asam Borat'),
(4, 1, 'Losion bayi (baby lotion) Iden Heksaklorofen'),
(5, 1, 'Krim bayi (baby cream) Iden Asam Borat'),
(6, 1, 'Krim bayi (baby cream) Iden Heksaklorofen'),
(7, 1, 'Sediaan bayi lainnya (non bilas) Iden Asam Borat'),
(8, 1, 'Sediaan bayi lainnya (non bilas) Iden Heksaklorofen'),
(9, 1, 'Perawatan kaki Iden Triklosan'),
(10, 1, 'Perawatan kaki PK Cemaran As'),
(11, 1, 'Penyegar kulit Iden Hidrokinon'),
(12, 1, 'Penyegar kulit Iden Asam Retinoat'),
(13, 1, 'Penyegar kulit Iden Merkuri'),
(14, 1, 'Penyegar kulit PK Cemaran Hg'),
(15, 1, 'Krim malam (night cream)  Iden Hidrokinon'),
(16, 1, 'Krim malam (night cream) Iden Merkuri'),
(17, 1, 'Krim malam (night cream) Iden Asam Retinoat'),
(18, 1, 'Krim malam (night cream) Iden Steroid'),
(19, 1, 'Krim malam (night cream) PK Cemaran Hg'),
(20, 1, 'Penyejuk kulit (skin soothing product) Iden Hidrokinon'),
(21, 1, 'Penyejuk kulit (skin soothing product) Iden Merkuri'),
(22, 1, 'Penyejuk kulit (skin soothing product) Iden Asam Retinoat'),
(23, 1, 'Penyejuk kulit (skin soothing product) PK Cemaran Hg'),
(24, 1, 'Krim siang (day cream) Iden Hidrokinon'),
(25, 1, 'Krim siang (day cream) Iden Merkuri'),
(26, 1, 'Krim siang (day cream) Iden Asam Retinoat'),
(27, 1, 'Krim siang (day cream) Iden Steroid'),
(28, 1, 'Krim siang (day cream) PK Cemaran Hg'),
(29, 1, 'Pelembab (Moisturizer) Iden Hidrokinon'),
(30, 1, 'Pelembab (Moisturizer) Pelembab (Moisturizer)');

-- --------------------------------------------------------

--
-- Table structure for table `kosmetiks`
--

CREATE TABLE `kosmetiks` (
  `id_kos` int(11) NOT NULL,
  `tipe_produk` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kosmetiks`
--

INSERT INTO `kosmetiks` (`id_kos`, `tipe_produk`) VALUES
(1, 'Krim, emulsi, cair, cairan kental, gel, minyak untuk kulit (wajah, tangan, kaki, dan lain-lain)'),
(2, 'Masker wajah (kecuali produk chemical peeling/ pengelupasan kulit secara kimiawi)'),
(3, 'Alas bedak (cairan kental, pasta, serbuk)'),
(4, 'Bedak untuk rias wajah, bedak badan, bedak antiseptik dan lain lain'),
(5, 'Sabun mandi, sabun mandi antiseptik, dan lain-lain'),
(6, 'Sediaan wangi- wangian'),
(7, 'Sediaan mandi (garam mandi, busa mandi, minyak, gel dan lain-lain)'),
(8, 'Sediaan Depilatori'),
(9, 'Deodoran dan antiperspiran'),
(10, 'Sediaan Rambut'),
(11, 'Sediaan cukur (krim, busa, cair, cairan kental, dan lain- lain)'),
(12, 'Sediaan rias mata, rias wajah, sediaan pembersih rias wajah dan mata'),
(13, 'Sediaan perawatan dan rias bibir'),
(14, 'Sediaan perawatan gigi dan mulut'),
(15, 'Sediaan untuk perawatan dan rias kuku'),
(17, 'Sediaan mandi surya dan tabir surya'),
(18, 'Sediaan untuk menggelapkan kulit tanpa berjemur'),
(19, 'Sediaan pencerah kulit'),
(20, 'Sediaan anti- wrinkle');

-- --------------------------------------------------------

--
-- Table structure for table `metode_uji_otsk`
--

CREATE TABLE `metode_uji_otsk` (
  `id_sediaan` bigint(20) UNSIGNED NOT NULL,
  `id_uji` bigint(20) UNSIGNED NOT NULL,
  `sediaan` enum('Padat','Cair','Padat dan Cair') NOT NULL,
  `pustaka` varchar(255) NOT NULL,
  `teknik_analisis` enum('KLT-Spektrofotodensitometri-KCKT','KCKT','KLT-Densitometri','KG','KLT-KCKT','SPE-KCKT','KLT-Spektrofotodensitometri','GC','AAS-HVG','AAS-GF','GC-MS') NOT NULL,
  `metode_uji` varchar(255) NOT NULL,
  `jumlah_sampel` int(11) NOT NULL,
  `satuan_sampel` enum('gram','mL','dosis','mg') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metode_uji_otsk`
--

INSERT INTO `metode_uji_otsk` (`id_sediaan`, `id_uji`, `sediaan`, `pustaka`, `teknik_analisis`, `metode_uji`, `jumlah_sampel`, `satuan_sampel`, `created_at`, `updated_at`) VALUES
(1, 1, 'Padat dan Cair', '31/OTPK/17', 'KLT-Spektrofotodensitometri', 'Ekstraksi cair-cair 2 komponen dan Uji Kromatografi lapis tipis dengan densitometer', 6, 'gram', NULL, NULL),
(2, 1, 'Cair', '29/OTPK/17', 'KLT-Spektrofotodensitometri-KCKT', 'Ekstraksi cair-cair 2 komponen; Uji Kromatografi lapis tipis dengan densitometer; Uji kromatografi cair kinerja tinggi', 90, 'mL', NULL, NULL),
(3, 2, 'Padat dan Cair', '31/OTPK/17', 'KLT-Spektrofotodensitometri', 'Ekstraksi cair-cair 2 komponen dan Uji Kromatografi lapis tipis dengan densitometer', 6, 'gram', NULL, NULL),
(5, 2, 'Cair', '29/OTPK/17', 'KLT-Spektrofotodensitometri-KCKT', 'Ekstraksi cair-cair 2 komponen;\r\nUji Kromatografi lapis tipis dengan densitometer; Uji kromatografi cair kinerja tinggi', 90, 'mL', NULL, NULL),
(6, 3, 'Padat dan Cair', '31/OTPK/17', 'KLT-Spektrofotodensitometri', 'Ekstraksi cair-cair 2 komponen dan\r\nUji Kromatografi lapis tipis dengan densitometer', 6, 'gram', NULL, NULL),
(7, 3, 'Cair', '29/OTPK/17', 'KLT-Spektrofotodensitometri-KCKT', 'Ekstraksi cair-cair 2 komponen;\r\nUji Kromatografi lapis tipis dengan densitometer; Uji kromatografi cair kinerja tinggi', 90, 'mL', NULL, NULL),
(8, 4, 'Padat dan Cair', '31/OTPK/17', 'KLT-Spektrofotodensitometri', 'Ekstraksi cair-cair 2 komponen dan\r\nUji Kromatografi lapis tipis dengan densitometer', 6, 'gram', NULL, NULL),
(9, 5, 'Padat dan Cair', '31/OTPK/17', 'KLT-Spektrofotodensitometri', '\"Ekstraksi cair-cair 2 komponen dan\r\nUji Kromatografi lapis tipis dengan densitometer\"', 6, 'gram', NULL, NULL),
(10, 6, 'Padat', '12/OT/12', 'KLT-Spektrofotodensitometri', '\"Ekstraksi cair-cair 2 komponen dan\r\nUji Kromatografi lapis tipis dengan densitometer\"', 6, 'gram', NULL, NULL),
(11, 6, 'Padat', '24/OT /11', 'SPE-KCKT', 'Ekstraksi padat-cair dan Uji kromatografi cair kinerja tinggi', 300, 'mg', NULL, NULL),
(12, 6, 'Cair', '25/OT /11', 'SPE-KCKT', 'Ekstraksi padat-cair dan Uji kromatografi cair kinerja tinggi', 12, 'mL', NULL, NULL),
(13, 7, 'Padat', '01/OT/12', 'KLT-Spektrofotodensitometri', '\"Ekstraksi cair-cair 2 komponen dan\r\nUji Kromatografi lapis tipis dengan densitometer\"', 12, 'dosis', NULL, NULL),
(14, 7, 'Cair', '13/OTSK/MA-PPPOMN/19', 'KLT-Spektrofotodensitometri', '\"Ekstraksi cair-cair 2 komponen dan\r\nUji Kromatografi lapis tipis dengan densitometer\"', 12, 'dosis', NULL, NULL),
(15, 7, 'Padat', '24/OT /11', 'SPE-KCKT', 'Ekstraksi padat-cair dan Uji kromatografi cair kinerja tinggi', 300, 'mg', NULL, NULL),
(16, 7, 'Cair', '25/OT /11', 'SPE-KCKT', 'Ekstraksi padat-cair dan Uji kromatografi cair kinerja tinggi', 12, 'mL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `metode_uji_pangan`
--

CREATE TABLE `metode_uji_pangan` (
  `id_uji` int(11) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `metode` varchar(512) NOT NULL,
  `sampel_minimal` int(11) NOT NULL,
  `satuan` varchar(11) NOT NULL,
  `keterangan` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metode_uji_pangan`
--

INSERT INTO `metode_uji_pangan` (`id_uji`, `id_metode`, `metode`, `sampel_minimal`, `satuan`, `keterangan`) VALUES
(3, 2, '\"Gravimetri (termasuk penetapan\r\n susut pengeringan)\"', 20, 'gram', '---'),
(4, 3, 'a. Destruksi kering (kadar abu, sisa pemijaran, atau kadar sari) dengan furnace\r\nb. Gravimetri', 20, 'gram', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_06_000002_add_tipe_produk_to_otsk', 1),
(5, '2026_01_20_071951_create_services_table', 1),
(6, '2026_01_23_064004_create_tarif_pengujian_bbpom_table', 1),
(7, '2026_01_26_065115_create_master_obat_table', 1),
(8, '2026_01_26_065119_create_parameter_obat_table', 1),
(9, '2026_01_28_023536_create_zat_aktifs_table', 1),
(10, '2026_01_28_023547_create_parameter_ujis_table', 1),
(11, '2026_01_28_030316_create_product_tests_table', 2),
(12, '2026_01_28_031322_alter_tarif_pengujian_bbpom_table_increase_jenis_penerimaan_length', 2),
(13, '2026_01_28_032921_add_satuan_column_to_tarif_pengujian_bbpom_table', 2),
(14, '2026_01_30_062309_add_columns_to_master_obat_table', 2),
(15, '2026_02_09_020714_create_kategori_indikasi_table', 2),
(16, '2026_02_09_020734_create_analit_table', 2),
(18, '2026_02_09_040857_create_produk_klaim_table', 3),
(20, '2026_02_09_020831_create_metode_analisis_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` bigint(20) UNSIGNED NOT NULL,
  `zat_aktif` varchar(255) NOT NULL,
  `jenis_sediaan` varchar(255) NOT NULL,
  `bentuk_sediaan` varchar(255) NOT NULL,
  `harga_total` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `zat_aktif`, `jenis_sediaan`, `bentuk_sediaan`, `harga_total`, `created_at`, `updated_at`) VALUES
(1, 'AMBROXOL', 'Oral', 'Tablet', 3000000.00, NULL, NULL),
(2, 'AMLODIPIN BESILAT', 'Oral', 'Tablet', NULL, NULL, NULL),
(3, 'ASAM MEFENAMAT', 'Oral', 'Tablet', NULL, NULL, NULL),
(4, 'AMOXICILLIN', 'Oral', 'Tablet', NULL, NULL, NULL),
(5, 'ALLOPURINOL', 'Oral', 'Tablet', NULL, NULL, NULL),
(6, 'ACYCLOVIR', 'Oral', 'Tablet', NULL, NULL, NULL),
(7, 'BETAHISTINE MESILATE', 'Oral', 'Tablet', NULL, NULL, NULL),
(8, 'CAFFEINE; PARACETAMOL', 'Oral', 'Tablet', NULL, NULL, NULL),
(9, 'CARBAMAZEPINE', 'Oral', 'Tablet', NULL, NULL, NULL),
(10, 'CHLORPROMAZINE HYDROCHLORIDE', 'Oral', 'Tablet', NULL, NULL, NULL),
(11, 'CLOBAZAM', 'Oral', 'Tablet', NULL, NULL, NULL),
(12, 'CLONAZEPAM', 'Oral', 'Tablet', NULL, NULL, NULL),
(13, 'CLOZAPINE', 'Oral', 'Tablet', NULL, NULL, NULL),
(14, 'DIAZEPAM', 'Steril', 'Injeksi', NULL, NULL, NULL),
(15, 'DIAZEPAM', 'Oral', 'Tablet', NULL, NULL, NULL),
(16, 'ESTAZOLAM', 'Oral', 'Tablet', NULL, NULL, NULL),
(17, 'FLUNARIZINE HYDROCHLORIDE', 'Oral', 'Tablet', NULL, NULL, NULL),
(18, 'FLUOXETINE', 'Oral', 'Kapsul', NULL, NULL, NULL),
(19, 'GABAPENTIN', 'Oral', 'Kapsul', NULL, NULL, NULL),
(20, 'HALOPERIDOL', 'Oral', 'Tablet', NULL, NULL, NULL),
(21, 'LIDOCAINE HYDROCHLORIDE', 'Steril', 'Injeksi', NULL, NULL, NULL),
(22, 'LORAZEPAM', 'Oral', 'Tablet', NULL, NULL, NULL),
(23, 'METAMIZOLE SODIUM', 'Oral', 'Tablet', NULL, NULL, NULL),
(24, 'OLANZAPINE', 'Oral', 'Tablet', NULL, NULL, NULL),
(25, 'PARACETAMOL', 'Oral', 'Larutan Oral', NULL, NULL, NULL),
(26, 'PARACETAMOL', 'Oral', 'Suspensi Oral', NULL, NULL, NULL),
(27, 'PARACETAMOL', 'Oral', 'Tablet', NULL, NULL, NULL),
(28, 'PARACETAMOL; TRAMADOL HYDROCHLORIDE', 'Oral', 'Tablet', NULL, NULL, NULL),
(29, 'PHENOBARBITAL', 'Oral', 'Tablet', NULL, NULL, NULL),
(30, 'PHENYTOIN SODIUM', 'Steril', 'Injeksi', NULL, NULL, NULL),
(31, 'PHENYTOIN SODIUM', 'Oral', 'Kapsul', NULL, NULL, NULL),
(32, 'PHENYTOIN SODIUM', 'Oral', 'Kapsul Lepas Lambat', NULL, NULL, NULL),
(33, 'PIRACETAM', 'Steril', 'Injeksi', NULL, NULL, NULL),
(34, 'PIRACETAM', 'Oral', 'Kapsul', NULL, NULL, NULL),
(35, 'PIRACETAM', 'Oral', 'Sirup', NULL, NULL, NULL),
(36, 'PIRACETAM', 'Oral', 'Tablet', NULL, NULL, NULL),
(37, 'RISPERIDONE', 'Oral', 'Tablet', NULL, NULL, NULL),
(38, 'TRAMADOL HYDROCHLORIDE', 'Steril', 'Injeksi', NULL, NULL, NULL),
(39, 'TRAMADOL HYDROCHLORIDE', 'Oral', 'Kapsul', NULL, NULL, NULL),
(40, 'TRAMADOL HYDROCHLORIDE', 'Oral', 'Tablet', NULL, NULL, NULL),
(41, 'TRIFLUOPERAZINE HYDROCHLORIDE', 'Oral', 'Tablet', NULL, NULL, NULL),
(42, 'TRIHEXYPHENIDYL HYDROCHLORIDE', 'Oral', 'Tablet', NULL, NULL, NULL),
(44, 'DICLOFENAC POTASSIUM', 'Oral', 'Tablet', NULL, NULL, NULL),
(45, 'DICLOFENAC SODIUM', 'Oral', 'Tablet Lepas Tunda', NULL, NULL, NULL),
(46, 'IBUPROFEN', 'Oral', 'Drops', NULL, NULL, NULL),
(47, 'IBUPROFEN', 'Oral', 'Suspensi Oral', NULL, NULL, NULL),
(48, 'IBUPROFEN', 'Oral', 'Tablet', NULL, NULL, NULL),
(49, 'KETOPROFEN', 'Topikal', 'Gel', NULL, NULL, NULL),
(50, 'KETOROLAC TROMETHAMINE', 'Steril', 'Injeksi', NULL, NULL, NULL),
(51, 'KETOROLAC TROMETHAMINE', 'Oral', 'Tablet', NULL, NULL, NULL),
(52, 'PIROXICAM', 'Oral', 'Tablet', NULL, NULL, NULL),
(53, 'PIROXICAM', 'Oral', 'Kapsul', NULL, NULL, NULL),
(54, 'DEXAMETHASONE', 'Oral', 'Tablet', NULL, NULL, NULL),
(55, 'DEXAMETHASONE SODIUM PHOSPHATE', 'Steril', 'Injeksi', NULL, NULL, NULL),
(56, 'METHYLPREDNISOLONE', 'Oral', 'Tablet', NULL, NULL, NULL),
(57, 'OXYTOCIN', 'Steril', 'Injeksi', NULL, NULL, NULL),
(58, 'PROPYLTHIOURACIL', 'Oral', 'Tablet', NULL, NULL, NULL),
(59, 'TRIAMCINOLONE', 'Oral', 'Tablet', NULL, NULL, NULL),
(60, 'TRIAMCINOLONE ACETONIDE', 'Steril', 'Suspensi Injeksi', NULL, NULL, NULL),
(61, 'ALBENDAZOLE', 'Oral', 'Suspensi Oral', NULL, NULL, NULL),
(63, 'ARTESUNATE', 'Steril', 'Untuk Injeksi', NULL, NULL, NULL),
(64, 'ALBENDAZOLE', 'Oral', 'Tablet Kunyah', NULL, NULL, NULL),
(65, 'DIETHYLCARBAMAZINE CITRATE', 'Oral', 'Tablet', NULL, NULL, NULL),
(67, 'MEBENDAZOLE', 'Oral', 'Tablet Kunyah', NULL, NULL, NULL),
(68, 'METRONIDAZOLE', 'Steril', 'Injeksi', NULL, NULL, NULL),
(69, 'METRONIDAZOLE', 'Oral', 'Tablet', NULL, NULL, NULL),
(70, 'PIRANTEL PAMOAT', 'Oral', 'Tablet', NULL, NULL, NULL),
(71, 'PYRANTEL PAMOATE', 'Oral', 'Suspensi', NULL, NULL, NULL),
(72, 'QUININE SULFATE', 'Oral', 'Tablet', NULL, NULL, NULL),
(75, 'DIETHYLCARBAMAZINE CITRATE', 'Oral', 'Tablet', NULL, NULL, NULL),
(76, 'MEBENDAZOLE', 'Oral', 'Tablet Kunyah', NULL, NULL, NULL),
(77, 'METRONIDAZOLE', 'Steril', 'Injeksi', NULL, NULL, NULL),
(78, 'METRONIDAZOLE', 'Oral', 'Tablet', NULL, NULL, NULL),
(79, 'METAMFETAMINA', '-', 'Serbuk/ kristal', NULL, NULL, NULL),
(80, 'MDMA', '-', 'Tablet', NULL, NULL, NULL),
(81, 'GANJA', '-', 'Simplisia', NULL, NULL, NULL),
(82, 'ETORICOXIB', 'Oral', 'Tablet', NULL, NULL, NULL),
(83, 'SIMVASTATIN', 'Oral', 'Tablet', NULL, NULL, NULL),
(84, 'KETOCONAZOLE', 'Oral', 'Tablet', NULL, NULL, NULL),
(85, 'GUAIAFENESIN', 'Oral', 'Tablet', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pangan`
--

CREATE TABLE `pangan` (
  `id_pangan` int(11) NOT NULL,
  `bahan_produk` varchar(512) NOT NULL,
  `waktu` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pangan`
--

INSERT INTO `pangan` (`id_pangan`, `bahan_produk`, `waktu`) VALUES
(1, 'Pangan Olahan', ''),
(2, 'Tepung Terigu', ''),
(3, 'Lemak, Minyak dan Emulsi Minyak, Margarin', '');

-- --------------------------------------------------------

--
-- Table structure for table `parameter_kos`
--

CREATE TABLE `parameter_kos` (
  `id_parameter` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `puk` varchar(512) NOT NULL,
  `pustaka` varchar(512) NOT NULL,
  `teknik_analisis` varchar(512) NOT NULL,
  `metode` varchar(512) NOT NULL,
  `sampel_min` int(12) NOT NULL,
  `satuan` varchar(12) NOT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `waktu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parameter_kos`
--

INSERT INTO `parameter_kos` (`id_parameter`, `id_kategori`, `puk`, `pustaka`, `teknik_analisis`, `metode`, `sampel_min`, `satuan`, `harga`, `waktu`) VALUES
(1, 1, 'Iden Asam Borat', 'MA PPPOMN 56/KO/17', 'KLT-Spektrofotodensitometri', '\"Uji kromatografi lapis tipis dengan\r\ndensitometer\"', 17, 'gram', 0, '17 HK'),
(2, 2, 'Iden Heksaklorofen', 'MA PPPOMN 37/KO/19', 'KCKT-PDA', '\"Uji kromatografi cair kinerja\r\ntinggi/UPLC/Kromatografi Ion (1-3\r\nsenyawa)\"', 17, 'gram', NULL, '17 HK'),
(3, 3, 'Iden Asam Borat', 'MA PPPOMN 56/KO/17', 'KLT-Spektrofotodensitometri', '\"Uji kromatografi lapis tipis dengan\r\ndensitometer\"', 17, 'gram', NULL, '17 HK'),
(4, 4, 'Iden Heksaklorofen', 'MA PPPOMN 37/KO/19', 'KCKT-PDA', '\"Uji kromatografi cair kinerja\r\ntinggi/UPLC/Kromatografi Ion (1-3\r\nsenyawa)\"', 17, 'gram', NULL, '17 HK'),
(5, 29, 'Iden Hidrokinon', 'MA PPPOMN 46/KO/17', 'KCKT PDA', '\"Uji kromatografi cair kinerja tinggi/UPLC/Kromatografi Ion (1-3 senyawa)\"', 17, 'gram', 0, '17');

-- --------------------------------------------------------

--
-- Table structure for table `parameter_uji`
--

CREATE TABLE `parameter_uji` (
  `id_parameter` bigint(20) UNSIGNED NOT NULL,
  `id_obat` bigint(20) UNSIGNED NOT NULL,
  `parameter_uji` varchar(255) NOT NULL,
  `metode_uji` varchar(255) NOT NULL,
  `jumlah_minimal` decimal(10,2) DEFAULT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_parameter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parameter_uji`
--

INSERT INTO `parameter_uji` (`id_parameter`, `id_obat`, `parameter_uji`, `metode_uji`, `jumlah_minimal`, `satuan`, `harga`, `created_at`, `updated_at`, `nama_parameter`) VALUES
(1, 1, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(2, 1, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(3, 1, 'Penetapan kadar', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(4, 1, 'Keseragaman Kandungan', 'KCKT', 10.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(5, 1, 'Disolusi', 'Spektrofotometri UV-Vis', 12.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(6, 2, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(7, 2, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 851297.00, NULL, NULL, ''),
(8, 2, 'Penetapan kadar', 'Null', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(9, 2, 'Keseragaman Kandungan', '', 10.00, 'Tablet', 0.00, NULL, NULL, ''),
(10, 2, 'Disolusi', 'Spektrofotometri UV-Vis', 12.00, 'Tablet', 851297.00, NULL, NULL, ''),
(11, 3, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(12, 3, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(13, 3, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(14, 3, 'Keseragaman Bobot', 'Penimbangan', 10.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(15, 3, 'Disolusi', 'Spektrofotometri UV-Vis', 12.00, 'Tablet', 851297.00, NULL, NULL, ''),
(16, 4, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(17, 4, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(18, 4, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(19, 4, 'Keseragaman Bobot', 'Penimbangan', 10.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(20, 4, 'Disolusi', 'Spektrofotometri UV-Vis', 12.00, 'Tablet', 851297.00, NULL, NULL, ''),
(21, 5, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(22, 5, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(23, 5, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(24, 5, 'Keseragaman Bobot', 'Penimbangan', 10.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(25, 5, 'Disolusi', 'Spektrofotometri UV-Vis', 12.00, 'Tablet', 851297.00, NULL, NULL, ''),
(26, 6, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(27, 6, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(28, 6, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(29, 6, 'Keseragaman Bobot', 'Penimbangan', 10.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(30, 6, 'Disolusi', 'Spektrofotometri UV-Vis', 12.00, 'Tablet', 851297.00, NULL, NULL, ''),
(31, 7, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(32, 7, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(33, 7, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(34, 7, 'Keseragaman Kandungan', 'Penimbangan', 10.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(35, 7, 'Disolusi', 'Spektrofotometri UV-Vis', 12.00, 'Tablet', 851297.00, NULL, NULL, ''),
(36, 8, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(37, 8, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(38, 8, 'Disolusi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(39, 8, 'Keseragaman Sediaan', 'Penimbangan', 10.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(40, 8, 'Penetapan Kadar', 'Spektrofotometri UV-Vis', 12.00, 'Tablet', 851297.00, NULL, NULL, ''),
(41, 9, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(42, 9, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(43, 9, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(44, 9, 'Keseragaman Bobot', 'Penimbangan', 10.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(45, 9, 'Disolusi', 'Spektrofotometri UV-Vis', 12.00, 'Tablet', 851297.00, NULL, NULL, ''),
(46, 10, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(47, 10, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(48, 10, 'Disolusi', 'KCKT', 12.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(49, 10, 'Keseragaman Sediaan', 'Penimbangan /  Spektrofotometri UV-Vis', 10.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(50, 10, 'Penetapan Kadar', 'Spektrofotometri UV-Vis', 20.00, 'Tablet', 851297.00, NULL, NULL, ''),
(51, 11, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(52, 11, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(53, 11, 'Disolusi', 'KCKT', 12.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(54, 11, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 851297.00, NULL, NULL, ''),
(55, 12, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(56, 12, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(57, 12, 'Disolusi', 'KCKT', 12.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(58, 12, 'Keseragaman Sediaan', 'KCKT', 10.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(59, 12, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 851297.00, NULL, NULL, ''),
(60, 13, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(61, 13, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(62, 13, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 851297.00, NULL, NULL, ''),
(63, 13, 'Keseragaman Kandungan', 'KCKT', 10.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(64, 13, 'Disolusi', 'Spektrofotometri UV-Vis', 12.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(65, 14, 'Pemerian', 'Organoleptik', 3.00, 'Vial', 31257.00, NULL, NULL, ''),
(66, 14, 'Identifikasi', 'KCKT', 20.00, 'Vial', 0.00, NULL, NULL, ''),
(67, 14, 'Penetapan Kadar', 'KCKT', 20.00, 'Vial', 851297.00, NULL, NULL, ''),
(68, 14, 'pH', 'pH meter', 3.00, 'Vial', 1342353.00, NULL, NULL, ''),
(69, 15, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(70, 15, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(71, 15, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(72, 15, 'Keseragaman Kandungan', 'KCKT', 10.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(73, 15, 'Disolusi', 'Spektrofotometri UV-Vis', 12.00, 'Tablet', 851297.00, NULL, NULL, ''),
(74, 16, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(75, 16, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(76, 16, 'Disolusi', 'KCKT', 12.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(77, 16, 'Keseragaman Sediaan', 'KCKT', 10.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(78, 16, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 851297.00, NULL, NULL, ''),
(79, 17, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(80, 17, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(81, 17, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 851297.00, NULL, NULL, ''),
(82, 17, 'Keseragaman Sediaan', 'KCKT', 10.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(83, 17, 'Disolusi', 'Spektrofotometri UV-Vis', 12.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(84, 18, 'Pemerian', 'Organoleptik', 3.00, 'Kapsul', 31257.00, NULL, NULL, ''),
(85, 18, 'Identifikasi', 'KCKT', 20.00, 'Kapsul', 0.00, NULL, NULL, ''),
(86, 18, 'Penetapan Kadar', 'KCKT', 20.00, 'Kapsul', 1550055.00, NULL, NULL, ''),
(87, 18, 'Keseragaman Sediaan', 'KCKT', 10.00, 'Kapsul', 1342353.00, NULL, NULL, ''),
(88, 18, 'Disolusi', 'KCKT', 12.00, 'Kapsul', 851297.00, NULL, NULL, ''),
(89, 19, 'Pemerian', 'Organoleptik', 3.00, 'Kapsul', 31257.00, NULL, NULL, ''),
(90, 19, 'Identifikasi', 'KCKT', 20.00, 'Kapsul', 0.00, NULL, NULL, ''),
(91, 19, 'Penetapan Kadar', 'KCKT', 20.00, 'Kapsul', 1550055.00, NULL, NULL, ''),
(92, 19, 'Disolusi', 'KCKT', 12.00, 'Kapsul', 1342353.00, NULL, NULL, ''),
(93, 19, 'Keseragaman Bobot', 'Penimbangan', 10.00, 'Kapsul', 851297.00, NULL, NULL, ''),
(94, 20, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(95, 20, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(96, 20, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(97, 20, 'Keseragaman Sediaan', 'KCKT', 12.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(98, 20, 'Disolusi', 'KCKT', 12.00, 'Tablet', 851297.00, NULL, NULL, ''),
(99, 21, 'Pemerian', 'Organoleptik', 3.00, 'Vial', 31257.00, NULL, NULL, ''),
(100, 21, 'Identifikasi', 'KCKT', 20.00, 'Vial', 0.00, NULL, NULL, ''),
(101, 21, 'Penetapan Kadar', 'KCKT', 20.00, 'Vial', 9775089.00, NULL, NULL, ''),
(102, 21, 'pH', 'pH Meter', 3.00, 'Vial', 113278.00, NULL, NULL, ''),
(103, 22, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(104, 22, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(105, 22, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(106, 22, 'Keseragaman Kandungan', 'KCKT', 10.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(107, 22, 'Disolusi', 'Spektrofotometri UV-Vis', 12.00, 'Tablet', 851297.00, NULL, NULL, ''),
(108, 23, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(109, 23, 'Identifikasi', 'Reaksi Warna', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(110, 23, 'Penetapan Kadar', 'Trimetri', 20.00, 'Tablet', 851297.00, NULL, NULL, ''),
(111, 24, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(112, 24, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(113, 24, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 851297.00, NULL, NULL, ''),
(114, 24, 'Keseragaman Sediaan', 'KCKT', 10.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(115, 24, 'Disolusi', 'KCKT', 12.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(116, 25, 'Pemerian', 'Organoleptik', 3.00, 'Botol', 31257.00, NULL, NULL, ''),
(117, 25, 'Identifikasi', 'KCKT', 20.00, 'Botol', 0.00, NULL, NULL, ''),
(118, 25, 'Penetapan Kadar', 'KCKT', 20.00, 'Botol', 851297.00, NULL, NULL, ''),
(119, 25, 'Keseragaman Sediaan', 'Penimbangan', 10.00, 'Botol', 1550055.00, NULL, NULL, ''),
(120, 25, 'pH', 'pH Meter', 3.00, 'Botol', 1342353.00, NULL, NULL, ''),
(121, 26, 'Pemerian', 'Organoleptik', 3.00, 'Botol', 31257.00, NULL, NULL, ''),
(122, 26, 'Identifikasi', 'KCKT', 20.00, 'Botol', 0.00, NULL, NULL, ''),
(123, 26, 'Penetapan Kadar', 'KCKT', 20.00, 'Botol', 851297.00, NULL, NULL, ''),
(124, 26, 'Keseragaman Sediaan', 'Penimbangan', 10.00, 'Botol', 1550055.00, NULL, NULL, ''),
(125, 26, 'pH', 'pH Meter', 3.00, 'Botol', 1342353.00, NULL, NULL, ''),
(126, 27, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(127, 27, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(128, 27, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(129, 27, 'Keseragaman Bobot', 'Penimbangan', 10.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(130, 27, 'Disolusi', 'Spektrofotometri UV-Vis ', 12.00, 'Tablet', 0.00, NULL, NULL, ''),
(131, 28, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(132, 28, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(133, 28, 'Penetapan Kadar Tramadol HCL', 'KCKT', 20.00, 'Tablet', 851297.00, NULL, NULL, ''),
(134, 28, 'Penetapan Kadar Acetaminophen', 'KCKT', 20.00, 'Tablet', 851297.00, NULL, NULL, ''),
(135, 28, 'Disolusi - Tes 1', 'KCKT', 12.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(136, 28, 'Disolusi - Tes 2', 'KCKT', 12.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(137, 28, 'Keseragaman Sediaan', 'KCKT', 10.00, 'Tablet', 1342353.00, NULL, NULL, ''),
(138, 29, 'Pemerian', 'Organoleptik', 3.00, 'Tablet', 31257.00, NULL, NULL, ''),
(139, 29, 'Identifikasi', 'KCKT', 20.00, 'Tablet', 0.00, NULL, NULL, ''),
(140, 29, 'Penetapan Kadar', 'KCKT', 20.00, 'Tablet', 1550055.00, NULL, NULL, ''),
(141, 29, 'Keseragaman Kandungan', 'KCKT', 10.00, 'Tablet', 0.00, NULL, NULL, ''),
(142, 29, 'Disolusi', 'Spektrofotometri UV-Vis', 12.00, 'Tablet', 851297.00, NULL, NULL, ''),
(143, 30, 'Pemerian', 'Organoleptik', 3.00, 'Vial', 31257.00, NULL, NULL, ''),
(144, 30, 'Identifikasi', 'KCKT', 20.00, 'Vial', 0.00, NULL, NULL, ''),
(145, 30, 'Penetapan Kadar', 'KCKT', 20.00, 'Vial', 0.00, NULL, NULL, ''),
(146, 30, 'pH', 'pH Meter', 3.00, 'Vial', 0.00, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `parameter_uji_otsk`
--

CREATE TABLE `parameter_uji_otsk` (
  `id_uji` bigint(20) UNSIGNED NOT NULL,
  `id_klaim` bigint(20) UNSIGNED NOT NULL,
  `parameter_uji` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parameter_uji_otsk`
--

INSERT INTO `parameter_uji_otsk` (`id_uji`, `id_klaim`, `parameter_uji`, `created_at`, `updated_at`) VALUES
(1, 1, 'Identifikasi Sildenafil Sitrat', NULL, NULL),
(2, 1, 'Identifikasi Tadalafil', NULL, NULL),
(3, 1, 'Identifikasi Vardenafil HCl', NULL, NULL),
(4, 1, 'Identifikasi Metil Testosteron', NULL, NULL),
(5, 1, 'Identifikasi Yohimbin HCl', NULL, NULL),
(6, 1, 'Identifikasi Kofein', NULL, NULL),
(7, 1, 'Parasetamol', NULL, NULL),
(8, 2, 'Sibutramin HCl', NULL, NULL),
(9, 2, 'Bisakodil', NULL, NULL),
(10, 2, 'Furosemid', NULL, NULL),
(11, 2, 'Hidroklorotiazida (HCT)', NULL, NULL),
(12, 2, 'Fenolftalein', NULL, NULL),
(13, 2, 'Fenfluramin HCl\r\n', NULL, NULL),
(14, 2, 'Amfetamin sulfat ', NULL, NULL),
(15, 4, 'Fenilbutazon', NULL, NULL),
(16, 4, 'Natrium diklofenak', NULL, NULL),
(17, 4, 'Deksametason', NULL, NULL),
(18, 4, 'Piroksikam', NULL, NULL),
(19, 4, 'Asam mefenamat ', NULL, NULL),
(20, 4, 'Indometasin', NULL, NULL),
(21, 4, 'Ibuprofen', NULL, NULL),
(22, 4, 'Prednison', NULL, NULL),
(23, 4, 'Allopurinol', NULL, NULL),
(24, 4, 'Antalgin', NULL, NULL),
(25, 4, 'Prednisolon', NULL, NULL),
(26, 4, 'Betametason', NULL, NULL),
(27, 4, 'Naproxen sodium', NULL, NULL),
(28, 4, 'Ketoprofen', NULL, NULL),
(29, 5, 'Siproheptadin HCl', NULL, NULL),
(30, 6, 'Tramadol', NULL, NULL),
(31, 7, 'Metronidazol', NULL, NULL),
(32, 8, 'Glibenklamida ', NULL, NULL),
(33, 8, 'Glipizid', NULL, NULL),
(34, 8, 'Glikazid', NULL, NULL),
(35, 8, 'Tolbutamid', NULL, NULL),
(36, 8, 'Metformin HCl', NULL, NULL),
(37, 8, 'Glimepirid', NULL, NULL),
(38, 8, 'Klorpropamid', NULL, NULL),
(39, 9, 'Dekstrometorfan HBr', NULL, NULL),
(40, 9, 'Gliseril guaiakolat', NULL, NULL),
(41, 9, 'Kodein', NULL, NULL),
(42, 9, 'Efedrin HCl dan Pseudoefedrin', NULL, NULL),
(43, 9, 'Isoniazid', NULL, NULL),
(44, 9, 'Pirazinamid', NULL, NULL),
(45, 9, 'Rifampisin', NULL, NULL),
(46, 9, 'Bromheksin HCl', NULL, NULL),
(47, 10, 'Teofilin', NULL, NULL),
(48, 10, 'Salbutamol', NULL, NULL),
(49, 11, 'Barbital', NULL, NULL),
(50, 11, 'Fenobarbital', NULL, NULL),
(51, 11, 'Diazepam', NULL, NULL),
(52, 11, 'Bromazepam', NULL, NULL),
(53, 11, 'Flurazepam', NULL, NULL),
(54, 11, 'Nitrazepam', NULL, NULL),
(55, 11, 'Klordiazepoksid', NULL, NULL),
(56, 11, 'Klonazepam', NULL, NULL),
(57, 11, 'Alprazolam', NULL, NULL),
(58, 11, 'Fluoxetin HCl', NULL, NULL),
(59, 11, 'Amitriptilin HCl', NULL, NULL),
(60, 11, 'Imipramin HCl', NULL, NULL),
(61, 12, 'Ranitidin', NULL, NULL),
(62, 12, 'Simetidin', NULL, NULL),
(63, 12, 'Famotidin', NULL, NULL),
(64, 12, 'Sulfametoksazol', NULL, NULL),
(65, 12, 'Trimetoprim', NULL, NULL),
(66, 12, 'Papaverin HCl', NULL, NULL),
(67, 13, 'Pirantel pamoat', NULL, NULL),
(68, 14, 'Griseofulvin', NULL, NULL),
(69, 14, 'Flukonazol', NULL, NULL),
(70, 14, 'Ketokonazol', NULL, NULL),
(71, 15, 'Vitamin C', NULL, NULL),
(72, 16, 'Hidroklorotiazid,  Furosemid, Parasetamol', NULL, NULL),
(73, 17, 'Kaptopril', NULL, NULL),
(74, 17, 'Enalapril maleat', NULL, NULL),
(75, 17, 'Spironolakton', NULL, NULL),
(76, 18, 'Simvastatin', NULL, NULL),
(77, 18, 'Lovastatin', NULL, NULL),
(78, 18, 'Atorvastatin Kalsium', NULL, NULL),
(79, 18, 'Rosuvastatin', NULL, NULL),
(80, 19, 'Vitamin B1', NULL, NULL),
(81, 19, 'Vitamin B6', NULL, NULL),
(82, 19, 'Vitamin C', NULL, NULL),
(83, 20, 'Vitamin A Asetat', NULL, NULL),
(84, 20, 'Vitamin A Palmitat', NULL, NULL),
(85, 20, 'Vitamin D', NULL, NULL),
(86, 20, 'Vitamin K', NULL, NULL),
(87, 21, 'Kofein', NULL, NULL),
(88, 22, 'Glukosamin', NULL, NULL),
(89, 22, 'Metilsulfonilmetan', NULL, NULL),
(90, 23, 'PK Lovastatin', NULL, NULL),
(91, 24, 'PK Kofein', NULL, NULL),
(92, 25, 'PK Asam Sorbat, Metil, Etil, Propil, dan Butil Paraben', NULL, NULL),
(93, 26, 'PK Asam Sorbat, Metil, Etil, Propil, dan Butil Paraben', NULL, NULL),
(94, 27, 'PK Asam Sorbat, Metil, Etil, Propil, dan Butil Paraben', NULL, NULL),
(95, 27, 'PK Asam Benzoat, asam Sorbat, Metil, Etil, Propil, dan Butil Paraben', NULL, NULL),
(96, 25, 'PK Asam Benzoat, asam Sorbat, Metil, Etil, Propil, dan Butil Paraben', NULL, NULL),
(97, 26, 'PK Asam Benzoat, asam Sorbat, Metil, Etil, Propil, dan Butil Paraben', NULL, NULL),
(98, 25, 'Asam Benzoat, Asam Sorbat, Metil Paraben dan Etil Paraben', NULL, NULL),
(99, 26, 'Asam Benzoat, Asam Sorbat, Metil Paraben dan Etil Paraben', NULL, NULL),
(100, 27, 'Asam Benzoat, Asam Sorbat, Metil Paraben dan Etil Paraben', NULL, NULL),
(101, 25, 'Asam Benzoat, Asam Sorbat , Metil Paraben, Etil Paraben, Propil Paraben dan Butil Paraben', NULL, NULL),
(102, 26, 'Asam Benzoat, Asam Sorbat , Metil Paraben, Etil Paraben, Propil Paraben dan Butil Paraben', NULL, NULL),
(103, 27, 'Asam Benzoat, Asam Sorbat , Metil Paraben, Etil Paraben, Propil Paraben dan Butil Paraben', NULL, NULL),
(104, 28, 'Natrium Sakarin', NULL, NULL),
(105, 29, 'Merkuri (Hg)', NULL, NULL),
(106, 29, 'Arsen (As), Timbal (Pb) dan Kadmium (Cd)', NULL, NULL),
(107, 30, 'PK Metanol', NULL, NULL),
(108, 30, 'PK Metanol dan Etanol', NULL, NULL),
(109, 32, 'ini coba parameter uji dari klaim coba', '2026-02-22 23:14:50', '2026-02-22 23:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `parameter_uji_pangan`
--

CREATE TABLE `parameter_uji_pangan` (
  `id_pangan` int(11) NOT NULL,
  `id_uji` int(11) NOT NULL,
  `parameter_uji` varchar(512) NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parameter_uji_pangan`
--

INSERT INTO `parameter_uji_pangan` (`id_pangan`, `id_uji`, `parameter_uji`, `total`) VALUES
(1, 3, 'Kadar Air', 0),
(1, 4, 'Kadar Abu', 0),
(1, 5, 'Kadar Protein', 0),
(1, 6, 'Kadar Karbohidrat', 0),
(1, 7, 'Kadar Lemak', 0),
(1, 8, 'Gula sebagai sakarosa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_tests`
--

CREATE TABLE `product_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zat_aktif` varchar(255) NOT NULL,
  `jenis_sediaan` varchar(255) NOT NULL,
  `bentuk_sediaan` varchar(255) NOT NULL,
  `parameter_uji` varchar(255) NOT NULL,
  `metode_uji` varchar(255) NOT NULL,
  `jumlah_minimal` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk_klaim`
--

CREATE TABLE `produk_klaim` (
  `id_klaim` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `nama_klaim` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk_klaim`
--

INSERT INTO `produk_klaim` (`id_klaim`, `id_produk`, `nama_klaim`, `created_at`, `updated_at`) VALUES
(1, 1, 'Stamina pria / sehat pria / seks', NULL, NULL),
(2, 1, 'Pelangsing / penurun kadar lemak/ singset / diet', NULL, NULL),
(4, 1, 'Pegal linu/encok/rematik /sakit pinggang/asam urat', NULL, NULL),
(5, 1, 'Nafsu makan / gemuk', NULL, NULL),
(6, 1, 'Demam/Sakit Kepala', NULL, NULL),
(7, 1, 'Sehat wanita', NULL, NULL),
(8, 1, 'Kencing manis', NULL, NULL),
(9, 1, 'Batuk', NULL, NULL),
(10, 1, 'Anti asma/sesak nafas', NULL, NULL),
(11, 1, 'Gangguan Tidur/ penenang', NULL, NULL),
(12, 1, 'Gangguan saluran pencernaan/ maag', NULL, NULL),
(13, 1, 'Cacingan', NULL, NULL),
(14, 1, 'Jerawat/ bersih darah/ gatal-gatal', NULL, NULL),
(15, 1, 'Penambah daya tahan tubuh', NULL, NULL),
(16, 1, 'Batu Ginjal', NULL, NULL),
(17, 1, 'Tekanan Darah Tinggi', NULL, NULL),
(18, 1, 'Lemak Darah', NULL, NULL),
(19, 4, 'Sediaan mengandung vitamin larut dalam air', NULL, NULL),
(20, 4, 'Sediaan mengandung vitamin larut dalam lemak', NULL, NULL),
(21, 4, 'Sediaan mengandung Kofein', NULL, NULL),
(22, 4, 'Sediaan mengandung Glukosamin atau Metilsulfonilmetan', NULL, NULL),
(23, 4, 'Sediaan mengandung Ekstrak Red Yeast  Rice', NULL, NULL),
(24, 2, 'Sediaan berisi tanaman sumber kofein alami', NULL, NULL),
(25, 2, 'Bahan Pengawet OT', NULL, NULL),
(26, 3, 'Bahan Pengawet OT-SK', NULL, NULL),
(27, 5, 'Bahan Pengawet OT-SK Mengandung Madu', NULL, NULL),
(28, 4, 'Bahan Pemanis', NULL, NULL),
(29, 2, 'Logam Berat', NULL, NULL),
(30, 3, 'Pelarut Sisa /Residual Solvent', NULL, NULL),
(31, 1, 'Test Claim', NULL, NULL),
(32, 11, 'ini coba klaim otsk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AE83avRhB2z6MfQAfKSntfTwmgBUkfcW8QjvQLLN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaTUwcDBmSkt2Zmp3OFM5RmJ6Y3BwMFZLRTNHQ1I0Z1FweDlLWng3ciI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sYXlhbmFuL3Blbmd1amlhbiI7czo1OiJyb3V0ZSI7czoxNzoibGF5YW5hbi5wZW5ndWppYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1771919280),
('rJfJVn1wjtygBSpMVdF0w4WBF9oCogI0zARuBDNr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaExTcDE4cUszWEpYWll5SGRDN1NLYldDdTlwNVdUSWlSUWdlcWNUayI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sYXlhbmFuL3Blbmd1amlhbiI7czo1OiJyb3V0ZSI7czoxNzoibGF5YW5hbi5wZW5ndWppYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1771981219);

-- --------------------------------------------------------

--
-- Table structure for table `tarif_pengujian_bbpom`
--

CREATE TABLE `tarif_pengujian_bbpom` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_penerimaan` varchar(1000) NOT NULL,
  `tarif` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `satuan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tarif_pengujian_bbpom`
--

INSERT INTO `tarif_pengujian_bbpom` (`id`, `jenis_penerimaan`, `tarif`, `created_at`, `updated_at`, `satuan`) VALUES
(1, 'Uji reaksi warna', 90190.00, NULL, NULL, 'Per Senyawa'),
(2, 'Reaksi hidrolisis dengan enzimatik/asam/basa', 170691.00, NULL, NULL, 'Per Pengujian'),
(3, 'Uji batas logam berat', 195627.00, NULL, NULL, 'Per Pengujian'),
(4, 'Titrimetri, kecuali argentometri', 301265.00, NULL, NULL, 'Per Pengujian'),
(5, 'Titrasi argentometri', 1220325.00, NULL, NULL, 'Per Pengujian'),
(6, 'Titrimetri dengan potensiometer (kecuali argentometri)', 472360.00, NULL, NULL, 'Per Pengujian'),
(7, 'Titrasi argentometri dengan potensiometer', 1472360.00, NULL, NULL, 'Per Pengujian'),
(8, 'Uji spektrofotometri Serapan Atom Flame/Flameless (1-3 senyawa/elemen)', 682236.00, NULL, NULL, 'Per Pengujian'),
(9, 'Uji spektrofotometri Serapan Atom Flame/Flameless (4 senyawa/elemen atau lebih)', 940875.00, NULL, NULL, 'Per Pengujian'),
(10, 'Uji spektrofotometri Serapan Atom dengan Hydride Vapor Generator', 1193917.00, NULL, NULL, 'Per Pengujian'),
(11, 'Uji spektrofotometri UV-Vis/Infra merah', 731992.00, NULL, NULL, 'Per Pengujian'),
(12, 'Uji Inductively Coupled Plasma - Optical Emission Spectrometry (ICPOES)/ Inductively Coupled Plasma Mass Spectrometry (ICP-MS) (1-3 elemen)', 1776900.00, NULL, NULL, 'Per Pengujian'),
(13, 'Uji Inductively Coupled Plasma - Optical Emission Spectrometry (ICPOES)/ Inductively Coupled Plasma Mass Spectrometry (ICP-MS) (4 senyawa/elemen atau lebih)', 2217219.00, NULL, NULL, 'Per Pengujian'),
(14, 'Uji raksa dengan merkuri analyzer', 421202.00, NULL, NULL, 'Per Senyawa'),
(15, 'Uji kadar air secara titrasi', 354008.00, NULL, NULL, 'Per Pengujian'),
(16, 'Uji potensi antibiotik', 732518.00, NULL, NULL, 'Per Pengujian'),
(17, 'Uji sterilitas', 1763243.00, NULL, NULL, 'Per Pengujian'),
(18, 'Uji cemaran mikroba metode kualitatif produk non pangan (obat, suplemen, OBA, kuasi, kosmetik)', 694576.00, NULL, NULL, 'Per Pengujian'),
(19, 'Uji cemaran mikroba metode kuantitatif/semi kuantitatif produk non pangan', 518980.00, NULL, NULL, 'Per Pengujian'),
(20, 'Uji cemaran mikroba metode kualitatif produk pangan (1-3x pengujian)', 728741.00, NULL, NULL, 'Per Pengujian'),
(21, 'Uji cemaran mikroba metode kualitatif produk pangan (4x pengujian atau lebih)', 1642350.00, NULL, NULL, '1-4 Sampel per Parameter Uji'),
(22, 'Uji cemaran mikroba metode kuantitatif/semi kuantitatif produk pangan (1-3x pengujian)', 669480.00, NULL, NULL, '5-10 Sampel per Parameter Uji'),
(23, 'Uji cemaran mikroba metode kuantitatif/semi kuantitatif produk pangan (4x pengujian atau lebih)', 1154627.00, NULL, NULL, '1-4 Sampel per Parameter Uji');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_produk`
--

CREATE TABLE `tipe_produk` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `nama_tipe` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipe_produk`
--

INSERT INTO `tipe_produk` (`id_produk`, `nama_tipe`, `created_at`, `updated_at`) VALUES
(1, 'Serbuk / Kapsul/ Tablet/ Pil/ COD/ Rajangan', '2026-02-08 19:44:09', '2026-02-08 19:44:09'),
(2, 'Obat Tradisional', '2026-02-08 19:44:09', '2026-02-08 19:44:09'),
(3, 'OT dan Suplemen Kesehatan', '2026-02-08 19:44:09', '2026-02-08 19:44:09'),
(4, 'Suplemen Kesehatan', '2026-02-08 19:44:09', '2026-02-08 19:44:09'),
(5, 'OT dan Suplemen Kesehatan mengandung madu', '2026-02-08 21:07:49', '2026-02-08 21:07:49'),
(11, 'tes tambah tipe produk', '2026-02-22 21:46:05', '2026-02-22 21:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2026-02-08 19:44:23', '$2y$12$Oxai4QjuqWHUE3deL/gGw.vfPyJuXV5QM9arMR8eT3DTx/Tivsqo2', 'r0umqbYLNm', '2026-02-08 19:44:24', '2026-02-08 19:44:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `harga_pangan`
--
ALTER TABLE `harga_pangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_metode` (`id_metode`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_kos`
--
ALTER TABLE `kategori_kos`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_kos` (`id_kos`);

--
-- Indexes for table `kosmetiks`
--
ALTER TABLE `kosmetiks`
  ADD PRIMARY KEY (`id_kos`);

--
-- Indexes for table `metode_uji_otsk`
--
ALTER TABLE `metode_uji_otsk`
  ADD PRIMARY KEY (`id_sediaan`),
  ADD KEY `id_uji` (`id_uji`);

--
-- Indexes for table `metode_uji_pangan`
--
ALTER TABLE `metode_uji_pangan`
  ADD PRIMARY KEY (`id_metode`),
  ADD KEY `id_uji` (`id_uji`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pangan`
--
ALTER TABLE `pangan`
  ADD PRIMARY KEY (`id_pangan`);

--
-- Indexes for table `parameter_kos`
--
ALTER TABLE `parameter_kos`
  ADD PRIMARY KEY (`id_parameter`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `parameter_uji`
--
ALTER TABLE `parameter_uji`
  ADD PRIMARY KEY (`id_parameter`),
  ADD KEY `parameter_uji_id_obat_foreign` (`id_obat`);

--
-- Indexes for table `parameter_uji_otsk`
--
ALTER TABLE `parameter_uji_otsk`
  ADD PRIMARY KEY (`id_uji`),
  ADD KEY `id_klaim` (`id_klaim`);

--
-- Indexes for table `parameter_uji_pangan`
--
ALTER TABLE `parameter_uji_pangan`
  ADD PRIMARY KEY (`id_uji`),
  ADD KEY `id_pangan` (`id_pangan`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `product_tests`
--
ALTER TABLE `product_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_klaim`
--
ALTER TABLE `produk_klaim`
  ADD PRIMARY KEY (`id_klaim`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tarif_pengujian_bbpom`
--
ALTER TABLE `tarif_pengujian_bbpom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_produk`
--
ALTER TABLE `tipe_produk`
  ADD PRIMARY KEY (`id_produk`);

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
-- AUTO_INCREMENT for table `harga_pangan`
--
ALTER TABLE `harga_pangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_kos`
--
ALTER TABLE `kategori_kos`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `metode_uji_otsk`
--
ALTER TABLE `metode_uji_otsk`
  MODIFY `id_sediaan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `metode_uji_pangan`
--
ALTER TABLE `metode_uji_pangan`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `pangan`
--
ALTER TABLE `pangan`
  MODIFY `id_pangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parameter_kos`
--
ALTER TABLE `parameter_kos`
  MODIFY `id_parameter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parameter_uji`
--
ALTER TABLE `parameter_uji`
  MODIFY `id_parameter` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `parameter_uji_otsk`
--
ALTER TABLE `parameter_uji_otsk`
  MODIFY `id_uji` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `parameter_uji_pangan`
--
ALTER TABLE `parameter_uji_pangan`
  MODIFY `id_uji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_tests`
--
ALTER TABLE `product_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk_klaim`
--
ALTER TABLE `produk_klaim`
  MODIFY `id_klaim` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tarif_pengujian_bbpom`
--
ALTER TABLE `tarif_pengujian_bbpom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tipe_produk`
--
ALTER TABLE `tipe_produk`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `harga_pangan`
--
ALTER TABLE `harga_pangan`
  ADD CONSTRAINT `harga_pangan_ibfk_1` FOREIGN KEY (`id_metode`) REFERENCES `metode_uji_pangan` (`id_metode`);

--
-- Constraints for table `kategori_kos`
--
ALTER TABLE `kategori_kos`
  ADD CONSTRAINT `kategori_kos_ibfk_1` FOREIGN KEY (`id_kos`) REFERENCES `kosmetiks` (`id_kos`);

--
-- Constraints for table `metode_uji_otsk`
--
ALTER TABLE `metode_uji_otsk`
  ADD CONSTRAINT `metode_analisis_analit_id_foreign` FOREIGN KEY (`id_uji`) REFERENCES `parameter_uji_otsk` (`id_uji`);

--
-- Constraints for table `metode_uji_pangan`
--
ALTER TABLE `metode_uji_pangan`
  ADD CONSTRAINT `metode_uji_pangan_ibfk_1` FOREIGN KEY (`id_uji`) REFERENCES `parameter_uji_pangan` (`id_uji`);

--
-- Constraints for table `parameter_kos`
--
ALTER TABLE `parameter_kos`
  ADD CONSTRAINT `parameter_kos_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_kos` (`id_kategori`);

--
-- Constraints for table `parameter_uji`
--
ALTER TABLE `parameter_uji`
  ADD CONSTRAINT `parameter_uji_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE;

--
-- Constraints for table `parameter_uji_otsk`
--
ALTER TABLE `parameter_uji_otsk`
  ADD CONSTRAINT `parameter_uji_otsk_ibfk_1` FOREIGN KEY (`id_klaim`) REFERENCES `produk_klaim` (`id_klaim`);

--
-- Constraints for table `parameter_uji_pangan`
--
ALTER TABLE `parameter_uji_pangan`
  ADD CONSTRAINT `parameter_uji_pangan_ibfk_1` FOREIGN KEY (`id_pangan`) REFERENCES `pangan` (`id_pangan`);

--
-- Constraints for table `produk_klaim`
--
ALTER TABLE `produk_klaim`
  ADD CONSTRAINT `produk_klaim_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tipe_produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
