-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Apr 2023 pada 11.24
-- Versi server: 5.7.33
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mami_clean`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `brands`
--

INSERT INTO `brands` (`id`, `nama`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Cleaning Service', '643212025bb66-230409.png', '2023-04-08 18:16:50', '2023-04-08 18:16:50'),
(2, 'Carpet Cleaning', '643212132d1ad-230409.png', '2023-04-08 18:17:07', '2023-04-08 18:17:07'),
(3, 'Cleaning Service', '64321234c5a0e-230409.png', '2023-04-08 18:17:40', '2023-04-08 18:17:40'),
(4, 'Cleaning Service', '6432123f11275-230409.png', '2023-04-08 18:17:51', '2023-04-08 18:17:51'),
(5, 'Cleaning Service', '6432124909ccc-230409.png', '2023-04-08 18:18:01', '2023-04-08 18:18:01'),
(6, 'Cleaning Service', '64321251b52fd-230409.png', '2023-04-08 18:18:09', '2023-04-08 18:18:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `brosurs`
--

CREATE TABLE `brosurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `layanan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_brosur` enum('layanan','perusahaan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berkas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `brosurs`
--

INSERT INTO `brosurs` (`id`, `layanan_id`, `status_brosur`, `nama`, `berkas`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'layanan', 'Kitchen Cleaning', '6433a5ff5e772-230410.pdf', '2023-04-09 23:00:31', '2023-04-09 23:00:31', '1'),
(2, NULL, 'perusahaan', 'Brosur Perusahaan', '6433e0a047a07-230410.pdf', '2023-04-10 03:10:40', '2023-04-10 03:10:40', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_page_berandas`
--

CREATE TABLE `landing_page_berandas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_1` json DEFAULT NULL,
  `section_2` json DEFAULT NULL,
  `section_3` json DEFAULT NULL,
  `section_4` json DEFAULT NULL,
  `section_5` json DEFAULT NULL,
  `section_6` json DEFAULT NULL,
  `section_7` json DEFAULT NULL,
  `section_8` json DEFAULT NULL,
  `section_9` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `landing_page_berandas`
--

INSERT INTO `landing_page_berandas` (`id`, `section_1`, `section_2`, `section_3`, `section_4`, `section_5`, `section_6`, `section_7`, `section_8`, `section_9`, `created_at`, `updated_at`) VALUES
(1, '{\"judul\": \"Best Cleaning Service in Home\", \"gambar\": \"642cf8a42949e-230405.png\", \"deskripsi\": \"lorem ipsum dolor sit amet consectetur. ut tellus suspendisse nulla aliquam. risus rutrum tellus eget ultrices pretium nisi amet facilisis.\", \"sub_judul\": \"Cleaning Services\"}', '[{\"id\": \"642d5a7fab4c0\", \"ikon\": \"<svg viewBox=\\\"0 0 56 57\\\" fill=\\\"none\\\" xmlns=\\\"http://www.w3.org/2000/svg\\\">\\r\\n                                    <path d=\\\"M15.6062 10.7502L0.834883 25.5123C0.30005 26.0521 0 26.7813 0 27.5412C0 28.3011 0.30005 29.0303 0.834883 29.5701C1.38142 30.092 2.10805 30.3832 2.86376 30.3832C3.61946 30.3832 4.34609 30.092 4.89263 29.5701L5.50772 28.955V35.5833L2.85458 40.8987C2.78415 41.0385 2.75062 41.1939 2.75717 41.3503C2.76372 41.5066 2.81013 41.6587 2.892 41.7921C2.97386 41.9255 3.08846 42.0357 3.22491 42.1123C3.36137 42.1889 3.51514 42.2294 3.67163 42.2299H5.50772V55.0825C5.50772 55.5694 5.70116 56.0364 6.04549 56.3808C6.38983 56.7251 6.85684 56.9185 7.3438 56.9185H27.5407C28.0277 56.9185 28.4947 56.7251 28.839 56.3808C29.1834 56.0364 29.3768 55.5694 29.3768 55.0825V42.2299H31.2129C31.3694 42.2294 31.5232 42.1889 31.6596 42.1123C31.7961 42.0357 31.9107 41.9255 31.9925 41.7921C32.0744 41.6587 32.1208 41.5066 32.1273 41.3503C32.1339 41.1939 32.1004 41.0385 32.0299 40.8987L29.3768 35.5833V28.7255L30.2122 29.5701C30.752 30.1049 31.4812 30.405 32.2411 30.405C33.001 30.405 33.7302 30.1049 34.27 29.5701C34.8048 29.0303 35.1049 28.3011 35.1049 27.5412C35.1049 26.7813 34.8048 26.0521 34.27 25.5123L19.4987 10.7502C18.9823 10.2345 18.2823 9.94476 17.5524 9.94476C16.8226 9.94476 16.1226 10.2345 15.6062 10.7502ZM15.6062 55.0825H11.016V47.7381H15.6062V55.0825ZM27.5407 55.0825H17.4423V46.8201C17.4423 46.5766 17.3455 46.3431 17.1734 46.1709C17.0012 45.9988 16.7677 45.902 16.5242 45.902H10.0979C9.85445 45.902 9.62094 45.9988 9.44877 46.1709C9.27661 46.3431 9.17988 46.5766 9.17988 46.8201V55.0825H7.3438V42.2299H27.5407V55.0825ZM29.7257 40.3938H5.15886L6.99494 36.7216H27.8896L29.7257 40.3938ZM7.3438 34.8855V27.1189L17.5524 16.9011L27.5407 26.8894V34.8855H7.3438ZM32.9664 28.2665C32.7725 28.456 32.5122 28.5621 32.2411 28.5621C31.97 28.5621 31.7097 28.456 31.5158 28.2665L18.856 15.6067C18.6845 15.4365 18.481 15.3019 18.2573 15.2105C18.0336 15.1191 17.7941 15.0728 17.5524 15.0742C17.0676 15.0738 16.6022 15.2652 16.258 15.6067L3.58901 28.2665C3.39517 28.456 3.13485 28.5621 2.86376 28.5621C2.59266 28.5621 2.33234 28.456 2.1385 28.2665C2.04246 28.1717 1.96621 28.0587 1.91416 27.9342C1.86211 27.8097 1.83531 27.6761 1.83531 27.5412C1.83531 27.4063 1.86211 27.2727 1.91416 27.1482C1.96621 27.0237 2.04246 26.9107 2.1385 26.816L16.9006 12.0447C16.986 11.9586 17.0875 11.8903 17.1994 11.8437C17.3112 11.7971 17.4312 11.7731 17.5524 11.7731C17.6736 11.7731 17.7936 11.7971 17.9055 11.8437C18.0174 11.8903 18.1189 11.9586 18.2042 12.0447L32.9664 26.816C33.0624 26.9107 33.1386 27.0237 33.1907 27.1482C33.2427 27.2727 33.2695 27.4063 33.2695 27.5412C33.2695 27.6761 33.2427 27.8097 33.1907 27.9342C33.1386 28.0587 33.0624 28.1717 32.9664 28.2665Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M17.4421 26.6232C17.8697 26.6232 18.2914 26.5236 18.6738 26.3324C19.0562 26.1412 19.3889 25.8636 19.6454 25.5215C19.902 25.1795 20.0753 24.7824 20.1518 24.3617C20.2283 23.9411 20.2058 23.5084 20.0861 23.0979L18.3602 23.612C18.3742 23.6971 18.3742 23.784 18.3602 23.8691C18.3602 24.1125 18.2634 24.3461 18.0913 24.5182C17.9191 24.6904 17.6856 24.7871 17.4421 24.7871C17.1986 24.7871 16.9651 24.6904 16.793 24.5182C16.6208 24.3461 16.5241 24.1125 16.5241 23.8691C16.5182 23.7235 16.5471 23.5786 16.6083 23.4464C16.6695 23.3141 16.7614 23.1984 16.8762 23.1087C16.991 23.019 17.1255 22.9579 17.2686 22.9305C17.4117 22.9031 17.5593 22.9101 17.6992 22.951L18.2133 21.1884C17.9611 21.127 17.7014 21.1022 17.4421 21.1149C16.7117 21.1149 16.0112 21.4051 15.4947 21.9216C14.9782 22.4381 14.688 23.1386 14.688 23.8691C14.688 24.5995 14.9782 25.3 15.4947 25.8165C16.0112 26.333 16.7117 26.6232 17.4421 26.6232Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M20.1964 52.3284H24.7866C25.0301 52.3284 25.2636 52.2317 25.4357 52.0595C25.6079 51.8873 25.7046 51.6538 25.7046 51.4104V46.8201C25.7046 46.5767 25.6079 46.3432 25.4357 46.171C25.2636 45.9988 25.0301 45.9021 24.7866 45.9021H20.1964C19.9529 45.9021 19.7194 45.9988 19.5472 46.171C19.375 46.3432 19.2783 46.5767 19.2783 46.8201V51.4104C19.2783 51.6538 19.375 51.8873 19.5472 52.0595C19.7194 52.2317 19.9529 52.3284 20.1964 52.3284ZM21.1144 47.7382H23.8685V50.4923H21.1144V47.7382Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M47.7376 54.1645V30.6718C49.0929 30.1235 50.2538 29.1832 51.0715 27.9713C51.8893 26.7594 52.3267 25.3311 52.3278 23.8691V16.5247C52.3278 16.2813 52.2311 16.0477 52.0589 15.8756C51.8868 15.7034 51.6533 15.6067 51.4098 15.6067H38.5572C38.3137 15.6067 38.0802 15.7034 37.908 15.8756C37.7359 16.0477 37.6392 16.2813 37.6392 16.5247V23.8691C37.6403 25.3311 38.0777 26.7594 38.8955 27.9713C39.7132 29.1832 40.8741 30.1235 42.2294 30.6718V54.1645C42.2294 54.8949 42.5195 55.5954 43.036 56.1119C43.5525 56.6284 44.2531 56.9186 44.9835 56.9186C45.7139 56.9186 46.4145 56.6284 46.931 56.1119C47.4475 55.5954 47.7376 54.8949 47.7376 54.1645ZM39.5579 24.7871C39.5072 24.4836 39.4796 24.1767 39.4752 23.8691V17.4428H41.3113V22.951H43.1474V17.4428H44.9835V22.951H46.8196V17.4428H47.7376V20.1969H49.5737V17.4428H50.4917V23.8691C50.4874 24.1767 50.4598 24.4836 50.4091 24.7871H39.5579ZM40.2189 26.6232H49.7481C49.2639 27.4579 48.5689 28.1508 47.7327 28.6324C46.8965 29.1141 45.9485 29.3676 44.9835 29.3676C44.0185 29.3676 43.0705 29.1141 42.2343 28.6324C41.3981 28.1508 40.7031 27.4579 40.2189 26.6232ZM45.9015 54.1645C45.9015 54.4079 45.8048 54.6414 45.6327 54.8136C45.4605 54.9858 45.227 55.0825 44.9835 55.0825C44.74 55.0825 44.5065 54.9858 44.3343 54.8136C44.1622 54.6414 44.0655 54.4079 44.0655 54.1645V34.8856H45.9015V54.1645ZM45.9015 33.0495H44.0655V31.1491C44.6745 31.2348 45.2925 31.2348 45.9015 31.1491V33.0495Z\\\"\\r\\n                                    fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M34.8849 0H31.2127C30.9692 0 30.7357 0.096722 30.5635 0.268888C30.3914 0.441054 30.2947 0.674562 30.2947 0.918042V2.75413H28.4586C28.2151 2.75413 27.9816 2.85085 27.8094 3.02301C27.6372 3.19518 27.5405 3.42869 27.5405 3.67217V7.34434C27.5405 7.58782 27.6372 7.82132 27.8094 7.99349C27.9816 8.16566 28.2151 8.26238 28.4586 8.26238H30.2947V10.0985C30.2947 10.3419 30.3914 10.5754 30.5635 10.7476C30.7357 10.9198 30.9692 11.0165 31.2127 11.0165H34.8849C35.1283 11.0165 35.3619 10.9198 35.534 10.7476C35.7062 10.5754 35.8029 10.3419 35.8029 10.0985V8.26238H37.639C37.8825 8.26238 38.116 8.16566 38.2881 7.99349C38.4603 7.82132 38.557 7.58782 38.557 7.34434V3.67217C38.557 3.42869 38.4603 3.19518 38.2881 3.02301C38.116 2.85085 37.8825 2.75413 37.639 2.75413H35.8029V0.918042C35.8029 0.674562 35.7062 0.441054 35.534 0.268888C35.3619 0.096722 35.1283 0 34.8849 0ZM36.7209 4.59021V6.42629H34.8849C34.6414 6.42629 34.4079 6.52302 34.2357 6.69518C34.0635 6.86735 33.9668 7.10086 33.9668 7.34434V9.18042H32.1307V7.34434C32.1307 7.10086 32.034 6.86735 31.8618 6.69518C31.6897 6.52302 31.4562 6.42629 31.2127 6.42629H29.3766V4.59021H31.2127C31.4562 4.59021 31.6897 4.49349 31.8618 4.32132C32.034 4.14916 32.1307 3.91565 32.1307 3.67217V1.83608H33.9668V3.67217C33.9668 3.91565 34.0635 4.14916 34.2357 4.32132C34.4079 4.49349 34.6414 4.59021 34.8849 4.59021H36.7209Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M49.5736 2.75415V4.59023H47.7375V6.42632H49.5736V8.2624H51.4097V6.42632H53.2458V4.59023H51.4097V2.75415H49.5736Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M52.3278 37.6398V39.4759H50.4917V41.3119H52.3278V43.148H54.1639V41.3119H56V39.4759H54.1639V37.6398H52.3278Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M21.1144 28.4594C20.435 28.4634 19.7811 28.7184 19.2783 29.1754C18.7734 28.7238 18.1197 28.4741 17.4422 28.4741C16.7648 28.4741 16.1111 28.7238 15.6062 29.1754C15.1034 28.7184 14.4495 28.4634 13.7701 28.4594C13.0396 28.4594 12.3391 28.7495 11.8226 29.266C11.3061 29.7825 11.0159 30.483 11.0159 31.2135H10.0979V33.0496H25.7046V31.2135H23.8685C23.8685 30.483 23.5784 29.7825 23.0619 29.266C22.5454 28.7495 21.8448 28.4594 21.1144 28.4594ZM12.852 31.2135C12.852 30.97 12.9487 30.7365 13.1209 30.5643C13.2931 30.3922 13.5266 30.2954 13.7701 30.2954C14.0135 30.2954 14.2471 30.3922 14.4192 30.5643C14.5914 30.7365 14.6881 30.97 14.6881 31.2135H12.852ZM16.5242 31.2135C16.5242 30.97 16.6209 30.7365 16.7931 30.5643C16.9652 30.3922 17.1988 30.2954 17.4422 30.2954C17.6857 30.2954 17.9192 30.3922 18.0914 30.5643C18.2636 30.7365 18.3603 30.97 18.3603 31.2135H16.5242ZM20.1964 31.2135C20.1964 30.97 20.2931 30.7365 20.4653 30.5643C20.6374 30.3922 20.8709 30.2954 21.1144 30.2954C21.3579 30.2954 21.5914 30.3922 21.7636 30.5643C21.9357 30.7365 22.0324 30.97 22.0324 31.2135H20.1964Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                </svg>\", \"judul\": \"Outdoor Service\", \"deskripsi\": \"Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus pretium nisi amet facilisis.\"}, {\"id\": \"642d5a7fab4c3\", \"ikon\": \"<svg viewBox=\\\"0 0 55 56\\\" fill=\\\"none\\\" xmlns=\\\"http://www.w3.org/2000/svg\\\">\\r\\n                                    <path d=\\\"M1.82888 22.918H2.70888V53.168C2.70888 54.1806 3.52969 55.0014 4.54221 55.0014H35.7089C36.7214 55.0014 37.5422 54.1806 37.5422 53.168V37.0805C37.5422 36.5743 37.1318 36.1639 36.6255 36.1639C36.1193 36.1639 35.7089 36.5743 35.7089 37.0805V53.168H32.9543V44.918C32.9543 41.8805 30.4919 39.418 27.4543 39.418C24.4167 39.418 21.9543 41.8805 21.9543 44.918V53.168H4.54221V22.918H17.8247C18.331 22.918 18.7414 22.5076 18.7414 22.0014C18.7414 21.4951 18.331 21.0847 17.8247 21.0847H3.64296C3.63654 21.0847 3.63196 21.0847 3.62554 21.0847C3.61913 21.0847 3.61454 21.0847 3.60813 21.0847H1.82429L20.121 7.55471L26.1985 12.0555C26.6055 12.3568 27.1797 12.271 27.4809 11.864C27.7821 11.4569 27.6963 10.8828 27.2893 10.5815L21.2127 6.08529C20.5633 5.60861 19.6796 5.60861 19.0301 6.08529L0.733459 19.618C0.10283 20.091 -0.154867 20.9142 0.0934746 21.6623C0.341816 22.4104 1.0406 22.9161 1.82888 22.918ZM23.7876 44.918C23.7876 43.6081 24.4865 42.3976 25.621 41.7426C26.7554 41.0876 28.1532 41.0876 29.2876 41.7426C30.4221 42.3976 31.121 43.6081 31.121 44.918V53.168H23.7876V44.918Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M8.20426 50.418H17.3709C17.8772 50.418 18.2876 50.0076 18.2876 49.5013V40.3346C18.2876 39.8284 17.8772 39.418 17.3709 39.418H8.20426C7.698 39.418 7.2876 39.8284 7.2876 40.3346V49.5013C7.2876 50.0076 7.698 50.418 8.20426 50.418ZM9.12093 45.8346H11.8709V48.5846H9.12093V45.8346ZM13.7043 48.5846V45.8346H16.4543V48.5846H13.7043ZM16.4543 44.0013H13.7043V41.2513H16.4543V44.0013ZM11.8709 41.2513V44.0013H9.12093V41.2513H11.8709Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M18.2876 26.5848C18.2876 26.0785 17.8772 25.6681 17.3709 25.6681H8.20426C7.698 25.6681 7.2876 26.0785 7.2876 26.5848V35.7514C7.2876 36.2577 7.698 36.6681 8.20426 36.6681H17.3709C17.8772 36.6681 18.2876 36.2577 18.2876 35.7514V26.5848ZM16.4543 30.2514H13.7043V27.5014H16.4543V30.2514ZM11.8709 27.5014V30.2514H9.12093V27.5014H11.8709ZM9.12093 32.0848H11.8709V34.8348H9.12093V32.0848ZM13.7043 34.8348V32.0848H16.4543V34.8348H13.7043Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M28.371 49.5014C28.8773 49.5014 29.2877 49.091 29.2877 48.5847V46.7514C29.2877 46.2451 28.8773 45.8347 28.371 45.8347C27.8648 45.8347 27.4543 46.2451 27.4543 46.7514V48.5847C27.4543 48.8278 27.5509 49.061 27.7228 49.2329C27.8947 49.4048 28.1279 49.5014 28.371 49.5014Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M28.7432 13.2169L28.0942 13.8659C27.8531 14.1084 27.6856 14.4141 27.6112 14.7478L22.0296 16.219C21.872 16.2601 21.7283 16.3428 21.6134 16.4583C20.474 17.5968 20.1339 19.8609 20.7022 22.5156C20.7857 22.9024 20.8856 23.2874 21.0057 23.6697V23.6926C21.0057 23.6999 21.0231 23.7247 21.0286 23.7421C22.5393 28.5938 26.3405 32.3915 31.1935 33.8979C31.2072 33.8979 31.2164 33.9125 31.2311 33.9171C31.2457 33.9217 31.2512 33.9171 31.2622 33.9171C31.6417 34.0326 32.024 34.1353 32.4081 34.2178C33.1958 34.3909 33.9995 34.4812 34.8061 34.4873C36.1328 34.5834 37.445 34.1601 38.4654 33.3066C38.5809 33.1918 38.6635 33.0481 38.7047 32.8904L40.1713 27.3089C40.505 27.2336 40.8108 27.0663 41.0541 26.8258L41.7022 26.1768C43.6985 24.1793 44.1567 21.1126 42.8315 18.6189L53.1898 9.20011C54.8226 7.71613 55.3623 5.37425 54.5435 3.32536C53.7248 1.27648 51.7198 -0.0485846 49.514 0.00136479C48.0674 0.0307014 46.6973 0.656713 45.7282 1.73111L36.3048 12.0922C33.8111 10.764 30.7424 11.2204 28.7432 13.2169ZM37.0033 32.1525C36.3397 32.6209 34.851 32.8684 32.7922 32.4275C32.7344 32.4147 32.6611 32.3954 32.5987 32.3808L33.5154 29.0129C33.6014 28.6969 33.5122 28.359 33.2815 28.1266C33.0508 27.8941 32.7136 27.8024 32.3969 27.8859C32.0802 27.9695 31.8322 28.2157 31.7462 28.5317L30.8461 31.8317C29.3751 31.255 28.0154 30.4275 26.8274 29.386L29.9028 26.3106C30.2502 25.9509 30.2452 25.3792 29.8917 25.0256C29.5381 24.672 28.9663 24.6671 28.6067 25.0144L25.5312 28.0899C24.4897 26.9018 23.6622 25.5421 23.0856 24.0712L26.3902 23.171C26.8787 23.0381 27.167 22.5344 27.0341 22.0458C26.9012 21.5573 26.3974 21.269 25.9089 21.4019L22.5411 22.3185C22.5264 22.2562 22.5072 22.1829 22.4943 22.1251C22.0534 20.0654 22.3018 18.5776 22.7693 17.9139L28.141 16.5014L38.4223 26.7827L37.0033 32.1525ZM40.4097 24.8843L39.7625 25.5333L29.3904 15.1621L30.0394 14.514C31.8293 12.7242 34.7313 12.7242 36.5212 14.514L40.4097 18.4025C42.1995 20.1924 42.1995 23.0944 40.4097 24.8843ZM47.0793 2.96495C47.9362 2.02445 49.2408 1.63118 50.4747 1.9414C51.7086 2.25162 52.6721 3.21508 52.9823 4.449C53.2925 5.68292 52.8992 6.98748 51.9587 7.84436L41.737 17.1366L37.7871 13.1867L47.0793 2.96495Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M41.1721 35.2931C41.1721 37.065 42.6085 38.5014 44.3805 38.5014C46.1524 38.5014 47.5888 37.065 47.5888 35.2931C47.5888 33.5211 46.1524 32.0847 44.3805 32.0847C42.6085 32.0847 41.1721 33.5211 41.1721 35.2931ZM45.7555 35.2931C45.7555 36.0524 45.1398 36.6681 44.3805 36.6681C43.6211 36.6681 43.0055 36.0524 43.0055 35.2931C43.0055 34.5337 43.6211 33.9181 44.3805 33.9181C45.1398 33.9181 45.7555 34.5337 45.7555 35.2931Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M28.7972 7.3347C30.5691 7.3347 32.0055 5.89828 32.0055 4.12636C32.0055 2.35445 30.5691 0.91803 28.7972 0.91803C27.0253 0.91803 25.5889 2.35445 25.5889 4.12636C25.5889 5.89828 27.0253 7.3347 28.7972 7.3347ZM28.7972 2.75136C29.5566 2.75136 30.1722 3.36697 30.1722 4.12636C30.1722 4.88575 29.5566 5.50136 28.7972 5.50136C28.0378 5.50136 27.4222 4.88575 27.4222 4.12636C27.4222 3.36697 28.0378 2.75136 28.7972 2.75136Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M49.4223 22.0013C48.916 22.0013 48.5056 22.4117 48.5056 22.918V24.7513C48.5056 25.2576 48.916 25.668 49.4223 25.668C49.9285 25.668 50.3389 25.2576 50.3389 24.7513V22.918C50.3389 22.4117 49.9285 22.0013 49.4223 22.0013Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M48.5056 28.418V30.2513C48.5056 30.7576 48.916 31.168 49.4223 31.168C49.9285 31.168 50.3389 30.7576 50.3389 30.2513V28.418C50.3389 27.9117 49.9285 27.5013 49.4223 27.5013C48.916 27.5013 48.5056 27.9117 48.5056 28.418Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M53.0889 25.6681H51.2555C50.7493 25.6681 50.3389 26.0785 50.3389 26.5848C50.3389 27.091 50.7493 27.5014 51.2555 27.5014H53.0889C53.5951 27.5014 54.0055 27.091 54.0055 26.5848C54.0055 26.0785 53.5951 25.6681 53.0889 25.6681Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M48.5055 26.5848C48.5055 26.0785 48.0951 25.6681 47.5889 25.6681H45.7555C45.2493 25.6681 44.8389 26.0785 44.8389 26.5848C44.8389 27.091 45.2493 27.5014 45.7555 27.5014H47.5889C48.0951 27.5014 48.5055 27.091 48.5055 26.5848Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M12.1074 7.98281C12.4671 8.3302 13.0388 8.32523 13.3924 7.97164C13.746 7.61805 13.751 7.04632 13.4036 6.68664L12.0286 5.31164C11.6689 4.96425 11.0972 4.96922 10.7436 5.32281C10.39 5.6764 10.385 6.24813 10.7324 6.60781L12.1074 7.98281Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M7.98242 3.85781C8.3421 4.2052 8.91383 4.20023 9.26742 3.84664C9.62101 3.49305 9.62597 2.92132 9.27858 2.56164L7.90358 1.18664C7.5439 0.839249 6.97217 0.844218 6.61858 1.19781C6.26499 1.5514 6.26003 2.12313 6.60742 2.48281L7.98242 3.85781Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M7.25561 8.25136C7.4987 8.25131 7.73182 8.1547 7.90369 7.98278L9.27869 6.60778C9.51699 6.37762 9.61255 6.0368 9.52866 5.71631C9.44478 5.39582 9.19448 5.14553 8.87399 5.06164C8.5535 4.97775 8.21268 5.07332 7.98253 5.31161L6.60753 6.68661C6.34544 6.94877 6.26706 7.34298 6.4089 7.68546C6.55075 8.02794 6.88491 8.25128 7.25561 8.25136Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M11.3806 4.12639C11.6237 4.12634 11.8568 4.02973 12.0287 3.85781L13.4037 2.48281C13.7511 2.12313 13.7461 1.5514 13.3925 1.19781C13.0389 0.844218 12.4672 0.839249 12.1075 1.18664L10.7325 2.56164C10.4704 2.8238 10.3921 3.21801 10.5339 3.56049C10.6758 3.90297 11.0099 4.12631 11.3806 4.12639Z\\\"\\r\\n                                    fill=\\\"currentcolor\\\" />\\r\\n                                </svg>\", \"judul\": \"House Cleaning\", \"deskripsi\": \"Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus pretium nisi amet facilisis.\"}, {\"id\": \"642d6659007e1\", \"ikon\": \"<svg viewBox=\\\"0 0 37 53\\\" fill=\\\"none\\\" xmlns=\\\"http://www.w3.org/2000/svg\\\">\\r\\n                                    <path d=\\\"M35.8899 4.13457H35.1997V1.02873C35.1488 -0.343428 33.1797 -0.342393 33.1292 1.02873V4.13457H24.1567V1.02873C24.1058 -0.343428 22.1367 -0.342393 22.0861 1.02873V4.13457H21.396C20.8243 4.13457 20.3607 4.59817 20.3607 5.16985V12.4168C20.3607 12.9885 20.8243 13.4521 21.396 13.4521H22.0861V17.6967C21.8598 23.6417 13.3379 23.6372 13.1138 17.6967V1.02873C13.0628 -0.343428 11.0937 -0.342393 11.0432 1.02873V17.6967C11.3739 26.3855 23.8291 26.3789 24.1567 17.6967V13.4521H33.1292V17.6967C33.1292 25.9543 26.6504 32.7273 18.509 33.1996L18.2825 31.4107L20.9329 28.7145C21.3338 28.3068 21.3282 27.6512 20.9205 27.2504C20.5127 26.8493 19.8572 26.8551 19.4564 27.2628L17.2101 29.5479L15.6182 27.8499C15.2272 27.4329 14.572 27.4117 14.1548 27.8027C13.7377 28.1938 13.7166 28.849 14.1075 29.2662L16.2073 31.506L16.4194 33.1815C8.40585 32.5765 2.07056 25.8625 2.07056 17.6967V1.02873C2.01962 -0.343428 0.0505216 -0.342393 0 1.02873V17.6967C0.887649 41.0191 34.3202 41.0013 35.1995 17.6967V13.4521H35.8897C36.4614 13.4521 36.925 12.9885 36.925 12.4168V5.16985C36.9252 4.59806 36.4616 4.13457 35.8899 4.13457ZM22.4313 11.3815V6.20513H25.0195V7.75805C25.0704 9.13021 27.0395 9.12917 27.0901 7.75805V6.20513H30.1958V7.75805C30.2467 9.13021 32.2158 9.12917 32.2664 7.75805V6.20513H34.8547V11.3815H22.4313Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M18.3803 37.5976C17.9902 37.1287 17.2095 37.1288 16.8195 37.5976C16.6759 37.7623 16.5219 37.937 16.3603 38.1204C14.3803 40.3671 11.3882 43.7624 11.3882 46.7883C11.3882 50.2134 14.1747 53 17.5999 53C21.025 53 23.8115 50.2134 23.8115 46.7883C23.8115 43.7622 20.8192 40.3668 18.839 38.12C18.6775 37.9366 18.5237 37.7621 18.3803 37.5976ZM17.5999 50.9294C15.3164 50.9294 13.4587 49.0717 13.4587 46.7883C13.4587 44.6804 15.9202 41.7596 17.5999 39.846C19.2796 41.7596 21.741 44.6801 21.741 46.7883C21.741 49.0716 19.8832 50.9294 17.5999 50.9294Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M8.77437 39.6666L6.0638 41.726C5.60858 42.072 5.51986 42.7214 5.86575 43.1767C6.2136 43.6345 6.8651 43.7187 7.31648 43.3748L10.0271 41.3154C10.4823 40.9694 10.571 40.32 10.2251 39.8646C9.87922 39.4096 9.22979 39.3207 8.77437 39.6666Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M8.35051 36.4779C8.21727 35.9221 7.65915 35.5792 7.10237 35.7124L4.26053 36.3936C3.70459 36.5268 3.3618 37.0856 3.49505 37.6417C3.62611 38.2019 4.20173 38.5414 4.74318 38.4072L7.58502 37.7261C8.14107 37.5927 8.48375 37.034 8.35051 36.4779Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M29.1361 41.726L26.4256 39.6667C25.9703 39.3207 25.3208 39.4096 24.9749 39.8647C24.629 40.3199 24.7177 40.9695 25.1729 41.3155L27.8834 43.3748C28.3347 43.7188 28.9863 43.6346 29.3341 43.1768C29.68 42.7215 29.5914 42.072 29.1361 41.726Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                    <path d=\\\"M30.9393 36.3936L28.0974 35.7125C27.5405 35.5791 26.9825 35.9221 26.8493 36.478C26.7161 37.0341 27.0587 37.5929 27.6148 37.7261L30.4566 38.4073C30.9981 38.5414 31.5737 38.2021 31.7048 37.6418C31.838 37.0857 31.4953 36.5269 30.9393 36.3936Z\\\" fill=\\\"currentcolor\\\" />\\r\\n                                </svg>\", \"judul\": \"Outdoor Service\", \"deskripsi\": \"Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus pretium nisi amet facilisis.\"}]', '{\"judul\": \"Welcome to Best Cleaning Company\", \"konten\": [{\"id\": \"642e035908e8a\", \"item\": \"We are Committed\"}, {\"id\": \"642e0677f3c03\", \"item\": \"Insured & Bonded\"}, {\"id\": \"642e06ad35beb\", \"item\": \"Residential Cleaning\"}, {\"id\": \"642e06ad35bed\", \"item\": \"Highly Rated Cleaning\"}, {\"id\": \"642e06ad35bee\", \"item\": \"Trusted Professionals\"}, {\"id\": \"642e06ad35bef\", \"item\": \"Commercial Cleaning\"}], \"tautan\": \"https://www.youtube.com/watch?v=XMWYZ-uZjnQ\", \"deskripsi\": \"<p>Commodo dictum iaculis eget mas phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa the sed massa ultrices amet a egetristique maecenas condimentum dolor. dictum iaculis eget more amet tincidunt urna massa done.</p>\", \"sub_judul\": \"Our Introduction\", \"gambar_besar\": \"642dfd3fa08b3-230405.png\", \"gambar_kecil\": \"642dfd3f9ea67-230405.png\", \"deskripsi_judul\": \"<p>Lorem ipsum dolor sit amet consectetur suspendisse nulla aliquam. Risus rutrum tellus ultrices amet facilisis.</p>\"}', '{\"judul\": \"Providing the Best Services for Our Customers\", \"sub_judul\": \"What We’re Offering\"}', '{\"judul\": \"Frequently Asked Question from Our Clients\", \"gambar\": \"642e0c719d88e-230406.png\", \"sub_judul\": \"Our Company FAQs\"}', '{\"judul\": \"Providing the Best Services for Our Customers\", \"sub_judul\": \"What We’re Offering\"}', '{\"judul\": \"Keep Eye on Our New Projects\", \"sub_judul\": \"Complete Projects\"}', '{\"gambar\": \"642e0ec28ec0f-230406.png\"}', '{\"judul\": \"Learn More from Our Blog Posts\", \"sub_judul\": \"Latest News & Articles\"}', '2023-04-04 21:27:16', '2023-04-05 17:17:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_page_kontaks`
--

CREATE TABLE `landing_page_kontaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_1` json DEFAULT NULL,
  `section_2` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `landing_page_kontaks`
--

INSERT INTO `landing_page_kontaks` (`id`, `section_1`, `section_2`, `created_at`, `updated_at`) VALUES
(1, '{\"gambar\": \"642ef8cbd581b-230406.png\"}', '{\"gambar\": \"642ef9894865d-230406.png\"}', '2023-04-06 09:52:27', '2023-04-06 09:55:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_page_layanans`
--

CREATE TABLE `landing_page_layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_1` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `landing_page_layanans`
--

INSERT INTO `landing_page_layanans` (`id`, `section_1`, `created_at`, `updated_at`) VALUES
(1, '{\"gambar\": \"642e7dd22a9fd-230406.png\"}', '2023-04-06 01:07:46', '2023-04-06 01:07:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_page_perusahaans`
--

CREATE TABLE `landing_page_perusahaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_1` json DEFAULT NULL,
  `section_2` json DEFAULT NULL,
  `section_3` json DEFAULT NULL,
  `section_4` json DEFAULT NULL,
  `section_5` json DEFAULT NULL,
  `section_6` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `landing_page_perusahaans`
--

INSERT INTO `landing_page_perusahaans` (`id`, `section_1`, `section_2`, `section_3`, `section_4`, `section_5`, `section_6`, `created_at`, `updated_at`) VALUES
(1, '{\"gambar\": \"642e725fc63df-230406.png\"}', '{\"judul\": \"One Stop Commercial Cleaning Company\", \"deskripsi\": \"<p>Lorem ipsum dolor sit amet consectetur suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. Commodo dictum iaculis eget massa phasellus ultrices as nunc dignissim. Id nulla amet tincidunt urna sed massa the sed massa ultrices amet eget.</p>\\r\\n\\r\\n<p>Tristique sed purus et maecenas condimentum massa the dolor. Lacus purus lectus diam diam tellus libero id dummy at any more sapien justo.</p>\", \"sub_judul\": \"About Our Company\", \"gambar_besar\": \"642e75f8b04ef-230406.png\", \"gambar_kecil\": \"642e75f8ac10c-230406.png\"}', '{\"judul\": \"Providing the Best Services for Our Customers\", \"sub_judul\": \"Our Best Services\"}', '{\"judul\": \"Your Happiness Is Our Frist Priority\", \"tautan\": \"https://www.youtube.com/embed/XMWYZ-uZjnQ\", \"deskripsi\": \"<p>Commodo dictum iaculis eget mas phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa the sed massa ultrices amet a dictum amet tincidunt massa done.</p>\", \"sub_judul\": \"Best Experts in Cleaning\", \"gambar_besar\": \"642e789317cc4-230406.png\", \"gambar_kecil\": \"642e789314afb-230406.png\"}', '{\"judul\": \"You can Check our Company Timeline.\", \"sub_judul\": \"Our History\"}', '{\"judul\": \"Meet Our Experienced & Professional Team\", \"sub_judul\": \"We’ve Team Members\"}', '2023-04-06 00:18:55', '2023-04-06 00:50:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_page_proyeks`
--

CREATE TABLE `landing_page_proyeks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_1` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `landing_page_proyeks`
--

INSERT INTO `landing_page_proyeks` (`id`, `section_1`, `created_at`, `updated_at`) VALUES
(1, '{\"gambar\": \"642e810f67386-230406.png\"}', '2023-04-06 01:21:35', '2023-04-06 01:21:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanans`
--

CREATE TABLE `layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_kecil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_besar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deskripsi_mini` text COLLATE utf8mb4_unicode_ci,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci,
  `ikon` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `layanans`
--

INSERT INTO `layanans` (`id`, `judul`, `gambar_kecil`, `gambar_besar`, `created_at`, `updated_at`, `deskripsi_mini`, `deskripsi`, `ikon`) VALUES
(1, 'Kitchen Cleaning', '6433e3d720eb7-230410.png', '6433e3d725bc2-230410.png', '2023-04-08 23:15:49', '2023-04-10 03:24:23', '<p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse nulla aliquam. Risus any rutrum eget time of ultrices.</p>', '<h2>We give the best Services</h2>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. that any Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla. In donec massa ultrices amet eget. Tristique sed purus et maecenas condimentum massa dolor. Lacus purus lectus diam diam tellus libero id sapien dummy at justo.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices vivamus. tha massa nunc dignissim.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. that any Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla.</p>', '<svg viewBox=\"0 0 20 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n                                                <path d=\"M18.7379 18.7498C18.7379 17.8794 17.2221 15.4468 17.2221 15.4468C17.2221 15.4468 15.6833 17.8794 15.6833 18.7498C15.6833 19.6184 16.3675 20.3229 17.2108 20.3229C18.0537 20.3229 18.7379 19.6184 18.7379 18.7498ZM7.7775 5.12022H4.72292V1.96567H5.55583V0.244141H0V1.96567H0.833333V6.84132C0.833333 8.1089 1.82833 9.13597 3.05542 9.13597H7.7775V9.99673H9.44458V4.26032H7.7775V5.12022ZM19.1658 12.2909V7.41531C19.1658 6.14816 18.1712 5.12066 16.9454 5.12066H12.2225V4.26076H10.5554V9.99761H12.2225V9.1364H15.2775V12.2909H14.4454V14.0125H20V12.2909H19.1658Z\" fill=\"currentcolor\" />\r\n                                            </svg>'),
(2, 'Office Cleaning', '6433e3c572f04-230410.png', '6433e3c57869a-230410.png', '2023-04-08 23:18:28', '2023-04-10 03:24:05', '<p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse nulla aliquam. Risus any rutrum eget time of ultrices.</p>', '<h2>We give the best Services</h2>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. that any Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla. In donec massa ultrices amet eget. Tristique sed purus et maecenas condimentum massa dolor. Lacus purus lectus diam diam tellus libero id sapien dummy at justo.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices vivamus. tha massa nunc dignissim.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. that any Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla.</p>', '<svg viewBox=\"0 0 29 27\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n                                                <path d=\"M14.383 14.6886C14.383 15.2897 13.8961 15.7766 13.2949 15.7766H6.76664C6.16549 15.7766 5.67859 15.2897 5.67859 14.6886V9.24833C5.67859 6.84484 7.62728 4.89615 10.0308 4.89615C10.8234 4.89615 11.5666 5.10831 12.2069 5.47825C13.5076 6.23118 14.383 7.63748 14.383 9.24833V14.6886Z\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M10.0308 17.9526H13.2949C13.8961 17.9526 14.383 18.4395 14.383 19.0406C14.383 19.6418 13.8961 20.1287 13.2949 20.1287H6.76664C6.16549 20.1287 5.67859 19.6418 5.67859 19.0406C5.67859 18.4395 6.16549 17.9526 6.76664 17.9526H10.0308Z\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M5.6786 14.6887H1V12.5126H5.6786\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M14.383 12.5126H27.766V14.6887H14.383\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M2.08807 25.5691V14.6886\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M16.5591 14.6886V25.5691H26.6779V14.6886\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M5.67859 25.5691C5.67859 24.9679 6.16549 24.481 6.76664 24.481H13.2949C13.8961 24.481 14.383 24.9679 14.383 25.5691\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M10.0308 25.5691V22.305\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M10.0308 17.9526V15.7765\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M8.94275 20.1288V22.3049H11.1188V20.1288\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M26.6779 20.1287H16.5591\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M19.9865 16.8647H23.2506\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M19.9865 22.3049H23.2506\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M19.9865 10.3366V12.5127\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M6.76661 2.72015C5.56486 2.72015 4.59052 3.69449 4.59052 4.89624\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                                <path d=\"M2.41449 2.72015C3.61624 2.72015 4.59058 3.69449 4.59058 4.89624\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M6.76661 2.71997C5.56486 2.71997 4.59052 1.74562 4.59052 0.543877\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M2.41449 2.71997C3.61624 2.71997 4.59058 1.74562 4.59058 0.543877\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M17.8103 8.1604V5.98431\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M18.8984 7.07227H16.7223\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M23.2505 4.89624V2.72015\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M24.3386 3.80811H22.1625\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M20.5304 0.544111C20.5304 0.844521 20.2868 1.08813 19.9864 1.08813C19.686 1.08813 19.4424 0.844521 19.4424 0.544111C19.4424 0.243702 19.686 8.80957e-05 19.9864 8.80957e-05C20.2868 8.80957e-05 20.5304 0.243702 20.5304 0.544111Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M12.2069 5.47827V0.54398H17.5383\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M22.4345 0.544007H27.766V10.3364H14.383\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                            </svg>'),
(3, 'Laundry Service', '6433e3bc14d5d-230410.png', '6433e3bc19a3b-230410.png', '2023-04-08 23:19:24', '2023-04-10 03:23:56', '<p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse nulla aliquam. Risus any rutrum eget time of ultrices.</p>', '<h2>We give the best Services</h2>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. that any Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla. In donec massa ultrices amet eget. Tristique sed purus et maecenas condimentum massa dolor. Lacus purus lectus diam diam tellus libero id sapien dummy at justo.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices vivamus. tha massa nunc dignissim.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. that any Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla.</p>', '<svg viewBox=\"0 0 22 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n                                                <path d=\"M17.2975 17.5312C17.1077 17.5312 16.9537 17.6849 16.9537 17.875C16.9537 18.2542 16.6454 18.5625 16.2662 18.5625C16.0765 18.5625 15.9225 18.7162 15.9225 18.9063C15.9225 19.0963 16.0765 19.25 16.2662 19.25C17.0246 19.25 17.6412 18.6333 17.6412 17.875C17.6412 17.6849 17.4872 17.5312 17.2975 17.5312Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M17.5347 14.1936C17.7241 14.1936 17.8784 14.3476 17.8784 14.5374C17.8784 14.7275 18.0324 14.8811 18.2222 14.8811C18.4119 14.8811 18.5659 14.7275 18.5659 14.5374C18.5659 13.9688 18.1032 13.5061 17.5347 13.5061C17.3449 13.5061 17.1909 13.6598 17.1909 13.8499C17.1909 14.0399 17.3449 14.1936 17.5347 14.1936Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M12.925 19.1746C12.7356 19.1746 12.5812 19.0206 12.5812 18.8308C12.5812 18.6407 12.4272 18.4871 12.2375 18.4871C12.0477 18.4871 11.8937 18.6407 11.8937 18.8308C11.8937 19.3994 12.3564 19.8621 12.925 19.8621C13.1147 19.8621 13.2687 19.7084 13.2687 19.5183C13.2687 19.3282 13.1147 19.1746 12.925 19.1746Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M4.12494 13.176C4.12494 13.3661 4.27894 13.5198 4.46869 13.5198C4.65844 13.5198 4.81244 13.3661 4.81244 13.176C4.81244 12.6075 4.34975 12.1448 3.78119 12.1448C3.59144 12.1448 3.43744 12.2984 3.43744 12.4885C3.43744 12.6786 3.59144 12.8323 3.78119 12.8323C3.9706 12.8323 4.12494 12.9863 4.12494 13.176Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M10.8556 14.1936C11.0453 14.1936 11.1993 14.04 11.1993 13.8499C11.1993 13.6601 11.3537 13.5061 11.5431 13.5061C11.7328 13.5061 11.8868 13.3524 11.8868 13.1624C11.8868 12.9723 11.7328 12.8186 11.5431 12.8186C10.9745 12.8186 10.5118 13.2813 10.5118 13.8499C10.5118 14.04 10.6658 14.1936 10.8556 14.1936Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M11.3437 15.8125C12.4812 15.8125 13.4062 14.8874 13.4062 13.75C13.4062 13.5571 13.3808 13.3708 13.3306 13.1927C13.444 13.1257 13.5478 13.0446 13.6382 12.9525C13.9315 12.6613 14.093 12.2732 14.093 11.8593C14.093 11.4454 13.9315 11.0574 13.64 10.7683C13.3488 10.4747 12.9607 10.3135 12.5468 10.3135C12.1329 10.3135 11.7449 10.475 11.4547 10.7672C11.1952 11.0268 11.0405 11.3599 11.0078 11.7146C10.0299 11.8758 9.28119 12.727 9.28119 13.75C9.28119 14.8874 10.2062 15.8125 11.3437 15.8125ZM11.3437 12.375H11.3574C11.4571 12.375 11.5517 12.3316 11.617 12.2564C11.6823 12.1814 11.7119 12.0814 11.6978 11.9831C11.6593 11.7119 11.7479 11.4458 11.9415 11.2523C12.2639 10.9281 12.828 10.926 13.1535 11.2543C13.3158 11.4152 13.4052 11.63 13.4052 11.8593C13.4052 12.0886 13.3158 12.3035 13.1498 12.4681C13.0532 12.5668 12.9304 12.6407 12.7947 12.6812C12.6977 12.7105 12.6187 12.7806 12.5784 12.8734C12.5382 12.9662 12.5406 13.0717 12.5853 13.1625C12.674 13.3419 12.7187 13.5396 12.7187 13.75C12.7187 14.5083 12.102 15.125 11.3437 15.125C10.5854 15.125 9.96869 14.5083 9.96869 13.75C9.96869 12.9916 10.5854 12.375 11.3437 12.375Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M20.9687 16.1563C20.9687 15.2505 20.3954 14.4606 19.5755 14.177C19.4611 13.276 18.7646 12.5562 17.875 12.406V8.34627L20.1977 8.92687C20.2259 8.93409 20.2537 8.93752 20.2816 8.93752C20.4356 8.93752 20.5755 8.83337 20.6147 8.67696L21.9897 3.17695C22.0278 3.02432 21.957 2.86482 21.8178 2.79057L17.8743 0.686127C17.0273 0.237188 16.0765 0 15.125 0C15.037 0 14.9562 0.0440001 14.9486 0.0488126C14.9321 0.0584376 13.2742 1.03125 11 1.03125C8.72571 1.03125 7.0678 0.0584376 7.0513 0.0488126C7.04374 0.0440001 6.96777 0 6.87496 0C5.92345 0 4.97264 0.237188 4.12495 0.686814L0.182125 2.79057C0.042906 2.86482 -0.0279067 3.02432 0.0102496 3.17695L1.38525 8.67696C1.43166 8.86155 1.619 8.97327 1.80222 8.92721L4.12495 8.34627V9.2909C4.06857 9.28471 4.01117 9.28127 3.95307 9.28127C3.10023 9.28127 2.40619 9.97531 2.40619 10.8282C2.40619 11.0375 2.44744 11.2396 2.52651 11.4259C2.02119 11.8113 1.71869 12.4111 1.71869 13.0625C1.71869 13.6888 1.99575 14.2663 2.47151 14.6562C2.42854 14.8067 2.40619 14.9652 2.40619 15.125C2.40619 16.0728 3.17723 16.8438 4.12495 16.8438V18.9063C4.12495 19.0964 4.27895 19.25 4.4687 19.25H10.6872C10.8515 20.2239 11.6985 20.9688 12.7187 20.9688C13.4303 20.9688 14.0728 20.601 14.4468 20.0225C14.9273 20.4078 15.5275 20.6251 16.1562 20.6251C17.556 20.6251 18.7124 19.5732 18.8825 18.2188H18.9062C20.0437 18.2188 20.9687 17.2938 20.9687 16.1563ZM14.6657 0.953909C14.5781 1.31244 14.4282 1.77925 14.1762 2.24297C13.5018 3.49182 12.4331 4.12501 11 4.12501C8.41943 4.12501 7.58721 2.0381 7.32836 0.951159C8.05952 1.27085 9.37231 1.71875 11 1.71875C12.6235 1.71875 13.9335 1.27291 14.6657 0.953909ZM3.0937 15.125C3.0937 14.969 3.12876 14.8167 3.19476 14.6844C3.27451 14.5245 3.21882 14.3306 3.06654 14.2371C2.65301 13.9845 2.40619 13.5448 2.40619 13.0625C2.40619 12.5479 2.68944 12.0815 3.14526 11.845C3.23532 11.7982 3.29995 11.7143 3.32229 11.6153C3.34463 11.5167 3.32229 11.4129 3.26076 11.3321C3.15145 11.1877 3.0937 11.0134 3.0937 10.8282C3.0937 10.3541 3.47938 9.96878 3.95307 9.96878C4.01289 9.96878 4.0696 9.97634 4.12495 9.98768V11.4847C4.12495 11.6208 4.20504 11.7439 4.32948 11.7989C4.8317 12.022 5.1562 12.5177 5.1562 13.0625C5.1562 13.607 4.83204 14.1024 4.33498 14.3234C4.33498 14.3234 4.33498 14.3234 4.33464 14.3234C4.33429 14.3234 4.33395 14.3238 4.33361 14.3238C4.24423 14.3616 4.15107 14.3904 4.05654 14.4097C3.87023 14.4472 3.74992 14.6287 3.78738 14.8146C3.82038 14.9783 3.96373 15.0907 4.12392 15.0907H4.12426V16.1563C3.55638 16.1563 3.0937 15.6936 3.0937 15.125ZM4.81245 14.8456C5.44426 14.4767 5.8437 13.8013 5.8437 13.0625C5.8437 12.3228 5.44564 11.6435 4.81245 11.275V6.87502C4.81245 6.68492 4.65845 6.53127 4.4687 6.53127C4.27895 6.53127 4.12495 6.68492 4.12495 6.87502V7.63814L1.96894 8.17715L0.742439 3.27079L4.44773 1.29388C5.10808 0.943596 5.83958 0.739408 6.57967 0.696439C6.76358 1.7191 7.60199 4.81251 11 4.81251C13.124 4.81251 14.2288 3.59288 14.7809 2.57057C15.181 1.83357 15.3529 1.10241 15.423 0.696439C16.1621 0.740096 16.8925 0.944284 17.5515 1.29319L21.2575 3.27079L20.031 8.1768L17.875 7.63814V6.87502C17.875 6.68492 17.721 6.53127 17.5312 6.53127C17.3415 6.53127 17.1875 6.68492 17.1875 6.87502V12.406C16.2136 12.5703 15.4687 13.4173 15.4687 14.4375C15.4687 14.6964 15.5151 14.947 15.6055 15.1807C14.6434 15.378 13.8507 16.0824 13.5448 17.0157C13.2876 16.9022 13.0085 16.8438 12.7187 16.8438C11.6988 16.8438 10.8518 17.5887 10.6872 18.5625H4.81245V14.8456ZM16.1562 19.9376C15.5598 19.9376 14.9957 19.6801 14.6052 19.2281C14.4787 19.0857 14.3735 18.9276 14.2924 18.7581C14.2103 18.5866 14.005 18.5148 13.8338 18.5962C13.6627 18.6784 13.5905 18.8836 13.6723 19.0548C13.7493 19.2157 13.8473 19.3645 13.9535 19.5065C13.7256 19.975 13.2502 20.2813 12.7187 20.2813C11.9604 20.2813 11.3437 19.6646 11.3437 18.9063C11.3437 18.148 11.9604 17.5313 12.7187 17.5313C13.0288 17.5313 13.3203 17.6317 13.5613 17.8218C13.6582 17.8984 13.7892 17.9163 13.9036 17.8706C14.0181 17.8238 14.0989 17.7197 14.115 17.597C14.2488 16.5795 15.1264 15.8125 16.1562 15.8125C16.2869 15.8125 16.4061 15.7386 16.4642 15.6214C16.5223 15.5045 16.5093 15.365 16.4302 15.2608C16.2508 15.025 16.1562 14.74 16.1562 14.4375C16.1562 13.6792 16.7729 13.0625 17.5312 13.0625C18.2895 13.0625 18.9062 13.6792 18.9062 14.4375C18.8935 14.762 19.1706 14.7724 19.1823 14.7744C19.8086 14.9006 20.2812 15.4942 20.2812 16.1563C20.2812 16.9146 19.6646 17.5313 18.9062 17.5313H18.8805C18.8261 17.0916 18.6728 16.6771 18.4229 16.3168C18.6395 16.2223 18.8306 16.0979 18.9939 15.9449C19.1324 15.8149 19.1393 15.5974 19.0094 15.4588C18.8794 15.3206 18.6615 15.3138 18.5233 15.4434C18.3329 15.6221 18.0754 15.7438 17.7578 15.8053C17.6316 15.8294 17.5295 15.9225 17.4931 16.0456C17.457 16.169 17.4924 16.3024 17.5855 16.3911C17.9939 16.7805 18.2187 17.3079 18.2187 17.875C18.2187 19.0125 17.2937 19.9376 16.1562 19.9376Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M2.48663 18.2652C2.32163 18.1693 2.11194 18.226 2.01672 18.3903C1.95519 18.4965 1.84107 18.5625 1.71869 18.5625C1.52928 18.5625 1.37494 18.4085 1.37494 18.2188C1.37494 18.029 1.52928 17.875 1.71869 17.875C1.90844 17.875 2.06244 17.7213 2.06244 17.5313C2.06244 17.3412 1.90844 17.1875 1.71869 17.1875C1.15013 17.1875 0.687439 17.6502 0.687439 18.2188C0.687439 18.7873 1.15013 19.25 1.71869 19.25C2.08547 19.25 2.42751 19.0527 2.61176 18.7347C2.70698 18.5704 2.6506 18.36 2.48663 18.2652Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M20.4531 11.8704C20.4273 11.8319 20.4005 11.7941 20.372 11.7576C20.0781 11.3798 19.6797 11.1719 19.25 11.1719C19.0603 11.1719 18.9062 11.3255 18.9062 11.5156C18.9062 11.7057 19.0603 11.8594 19.25 11.8594C19.4628 11.8594 19.6687 11.9732 19.8296 12.1801C20.01 12.4118 20.1094 12.7256 20.1094 13.0625C20.1094 13.2526 20.2634 13.4063 20.4531 13.4063C20.6429 13.4063 20.7969 13.2526 20.7969 13.0625C20.7969 12.7256 20.8962 12.4118 21.0767 12.1801C21.2376 11.9732 21.4435 11.8594 21.6563 11.8594C21.846 11.8594 22 11.7057 22 11.5156C22 11.3255 21.846 11.1719 21.6563 11.1719C21.1905 11.1719 20.7969 10.6208 20.7969 9.96875C20.7969 9.77866 20.6429 9.625 20.4531 9.625C20.2634 9.625 20.1094 9.77866 20.1094 9.96875C20.1094 10.6061 20.3686 11.1708 20.7653 11.5136C20.6828 11.5844 20.6054 11.6662 20.5339 11.7576C20.5057 11.7944 20.4789 11.8319 20.4531 11.8704Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M10.3124 7.90626C10.5335 7.90626 10.7435 8.00766 10.9047 8.19157C11.0769 8.38854 11.1718 8.65357 11.1718 8.93751C11.1718 9.1276 11.3258 9.28126 11.5156 9.28126C11.7053 9.28126 11.8593 9.1276 11.8593 8.93751C11.8593 8.65357 11.9542 8.38854 12.1268 8.19157C12.2876 8.00766 12.4977 7.90626 12.7187 7.90626C12.9084 7.90626 13.0624 7.7526 13.0624 7.5625C13.0624 7.37241 12.9084 7.21875 12.7187 7.21875C12.2966 7.21875 11.9023 7.40335 11.6091 7.73919C11.5761 7.77666 11.5448 7.81585 11.5156 7.85607C11.4863 7.81585 11.4551 7.777 11.4221 7.73919C11.3653 7.67457 11.3048 7.6151 11.2409 7.56147C11.6163 7.24763 11.8593 6.7485 11.8593 6.1875C11.8593 5.99741 11.7053 5.84375 11.5156 5.84375C11.3258 5.84375 11.1718 5.99741 11.1718 6.1875C11.1718 6.75606 10.7861 7.21875 10.3124 7.21875C10.1227 7.21875 9.96869 7.37241 9.96869 7.5625C9.96869 7.7526 10.1227 7.90626 10.3124 7.90626Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M10.3124 10.3125C10.5022 10.3125 10.6562 10.1589 10.6562 9.96876C10.6562 9.77866 10.5022 9.62501 10.3124 9.62501C9.55413 9.62501 8.93745 8.85397 8.93745 7.90625C8.93745 7.71616 8.78345 7.5625 8.59369 7.5625C8.40394 7.5625 8.24994 7.71616 8.24994 7.90625C8.24994 8.37685 8.09938 8.81685 7.82644 9.14479C7.56794 9.45451 7.23003 9.62501 6.87494 9.62501C6.68519 9.62501 6.53119 9.77866 6.53119 9.96876C6.53119 10.1589 6.68519 10.3125 6.87494 10.3125C7.23003 10.3125 7.56794 10.483 7.82644 10.7924C8.09938 11.1207 8.24994 11.5607 8.24994 12.0313C8.24994 12.2214 8.40394 12.375 8.59369 12.375C8.78345 12.375 8.93745 12.2214 8.93745 12.0313C8.93745 11.5607 9.08801 11.1207 9.36095 10.7927C9.61945 10.483 9.95735 10.3125 10.3124 10.3125ZM8.83294 10.3527C8.74323 10.4603 8.66348 10.5755 8.59369 10.6982C8.52391 10.5758 8.44382 10.46 8.35444 10.3524C8.22932 10.2022 8.09044 10.0739 7.94125 9.96876C8.09079 9.86322 8.22932 9.73466 8.35444 9.58479C8.44451 9.47719 8.52494 9.36066 8.59507 9.23725C8.76419 9.53288 8.98763 9.78279 9.24888 9.96704C9.09832 10.0729 8.95876 10.2018 8.83294 10.3527Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M20.7969 18.5625C20.6071 18.5625 20.4531 18.7162 20.4531 18.9063C20.4531 19.0963 20.6071 19.25 20.7969 19.25C21.0812 19.25 21.3125 19.4813 21.3125 19.7656C21.3125 20.0499 21.0812 20.2813 20.7969 20.2813C20.5126 20.2813 20.2813 20.0499 20.2813 19.7656C20.2813 19.5755 20.1273 19.4219 19.9375 19.4219C19.7478 19.4219 19.5938 19.5755 19.5938 19.7656C19.5938 20.4291 20.1334 20.9688 20.7969 20.9688C21.4603 20.9688 22 20.4291 22 19.7656C22 19.1022 21.4603 18.5625 20.7969 18.5625Z\" fill=\"currentcolor\" />\r\n                                            </svg>'),
(4, 'Plumbing Service', '6433e3ad01b10-230410.png', '6433e3ad06380-230410.png', '2023-04-08 23:21:33', '2023-04-10 03:23:41', '<p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse nulla aliquam. Risus any rutrum eget time of ultrices.</p>', '<h2>We give the best Services</h2>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. that any Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla. In donec massa ultrices amet eget. Tristique sed purus et maecenas condimentum massa dolor. Lacus purus lectus diam diam tellus libero id sapien dummy at justo.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices vivamus. tha massa nunc dignissim.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. that any Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla.</p>', '<svg viewBox=\"0 0 27 27\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n                                                <path d=\"M26 9.43506H15.5325V7.40254H26V9.43506Z\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M15.5325 7.40234L18.7337 5.36983H22.7988L26 7.40234\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M18.7337 5.36987V0.999959H22.7988V5.36987\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M7.25002 1.00011H13.5V9.43506H1.00003V1.00011H7.25002Z\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M7.25002 9.43506V1.00011\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M5.2175 4.04883V6.38623\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M9.28254 4.04883V6.38623\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M23.9675 23.9675H15.5325V19.9025H23.9675V23.9675Z\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M13.5 26V17.8699\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M18.7338 15.8376H17.7175V17.8701\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M22.9512 15.8376H23.9675V17.8701\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M1.00003 21.9351H13.5\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M6.23376 19.9026H8.26628\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M6.23376 23.9675H8.26628\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M13.5 13.5C12.3776 13.5 11.4675 14.41 11.4675 15.5325\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M9.43497 13.5C10.5574 13.5 11.4675 14.41 11.4675 15.5325\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M13.5 13.5C12.3776 13.5 11.4675 12.5899 11.4675 11.4675\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M9.43497 13.5C10.5574 13.5 11.4675 12.5899 11.4675 11.4675\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M19.75 13.5V11.4675\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M20.7663 12.4836H18.7337\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M5.36994 15.5325V13.5\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M6.3862 14.5161H4.35368\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M7.75815 26.0002C7.75815 26.2808 7.53066 26.5083 7.25002 26.5083C6.96938 26.5083 6.74189 26.2808 6.74189 26.0002C6.74189 25.7196 6.96938 25.492 7.25002 25.492C7.53066 25.492 7.75815 25.7196 7.75815 26.0002Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M4.96341 26H1V17.8699H26V26H9.53663\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                            </svg>'),
(5, 'Office Cleaning', '6433e39e73ae1-230410.png', '6433e39e78565-230410.png', '2023-04-08 23:22:40', '2023-04-10 03:23:26', '<p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse nulla aliquam. Risus any rutrum eget time of ultrices.</p>', '<h2>We give the best Services</h2>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. that any Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla. In donec massa ultrices amet eget. Tristique sed purus et maecenas condimentum massa dolor. Lacus purus lectus diam diam tellus libero id sapien dummy at justo.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices vivamus. tha massa nunc dignissim.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. that any Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla.</p>', '<svg viewBox=\"0 0 22 22\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n                                                <path d=\"M5.85102 18.5502L3.61443 16.3148L1.69825 18.231C1.08292 18.8464 1.08292 19.8523 1.69825 20.4676C2.3124 21.0818 3.31833 21.0818 3.93366 20.4676L5.85102 18.5502Z\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M5.54113 18.2402L10.0097 13.7717M8.393 12.1551L3.9245 16.6236\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M14.7789 9.96709L18.3394 13.5276L17.4187 14.4483C16.755 15.112 15.6696 15.112 15.0059 14.4483L7.71662 7.16013C7.05288 6.49643 7.05288 5.40985 7.71662 4.74611L8.63727 3.8255L12.1978 7.38599\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M9.03479 4.22305L10.2308 3.02699L19.1391 11.934L17.9418 13.1301\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M14.3987 13.8408L11.3613 10.8034L8.32391 7.76606C8.75021 9.74334 8.87928 10.7147 8.39302 12.155L9.20078 12.9639L10.0096 13.7717C11.45 13.2854 12.4214 13.4145 14.3987 13.8408Z\"\r\n                                                stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M19.5665 2.59838L16.1178 6.04712\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M20.1404 5.46392L17.837 7.76733\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M16.7021 2.02564L14.3987 4.32788\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M21 8.04275L19.5562 9.48657\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M14.1232 1.16482L12.6794 2.60864\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M3.56033 1.00015L4.44411 2.6767L6.12066 3.56052L4.44411 4.4443L3.56033 6.12085L2.67655 4.4443L1 3.56052L2.67655 2.6767L3.56033 1.00015Z\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M17.8543 16.3298L18.6597 17.8589L20.1888 18.6643L18.6597 19.4698L17.8543 21L17.0477 19.4698L15.5186 18.6643L17.0477 17.8589L17.8543 16.3298Z\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M4.77368 7.78574L5.47311 9.11431L6.80169 9.81375L5.47311 10.5132L4.77368 11.8406L4.07424 10.5132L2.74567 9.81375L4.07424 9.11431L4.77368 7.78574Z\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                                <path d=\"M13.4872 8.67479L13.4889 8.67651\" stroke=\"currentcolor\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />\r\n                                            </svg>'),
(6, 'Toilet Cleaning', '6433e34b2f938-230410.png', '6433e34b33d86-230410.png', '2023-04-08 23:23:10', '2023-04-10 03:22:03', '<p>Lorem ipsum dolor sit consectetur. Ut tellus suspendisse nulla aliquam. Risus any rutrum eget time of ultrices.</p>', '<h2>We give the best Services</h2>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. that any Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla. In donec massa ultrices amet eget. Tristique sed purus et maecenas condimentum massa dolor. Lacus purus lectus diam diam tellus libero id sapien dummy at justo.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices vivamus. tha massa nunc dignissim.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. that any Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla.</p>', '<svg viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n                                                <path d=\"M19 9.66669H8.96729L8.05979 0.893939C8.0326 0.63106 7.90209 0.389751 7.69697 0.223097C7.49186 0.056444 7.22894 -0.0219025 6.96606 0.00529323C6.70318 0.032489 6.46187 0.162999 6.29522 0.368113C6.12857 0.573227 6.05022 0.836143 6.07742 1.09902L6.10167 1.33336H0.333333C0.244928 1.33336 0.160143 1.36847 0.0976311 1.43099C0.0351189 1.4935 0 1.57828 0 1.66669V3.00002C0 3.08843 0.0351189 3.17321 0.0976311 3.23572C0.160143 3.29824 0.244928 3.33336 0.333333 3.33336V10.6667C0.333642 10.9318 0.439098 11.186 0.626568 11.3735C0.814037 11.5609 1.06821 11.6664 1.33333 11.6667V15C1.33434 15.8838 1.68585 16.731 2.31075 17.3559C2.93566 17.9808 3.78292 18.3324 4.66667 18.3334H6.81192C6.66176 18.4622 6.54125 18.622 6.45864 18.8018C6.37604 18.9816 6.33329 19.1772 6.33333 19.375V19.6667C6.33333 19.7551 6.36845 19.8399 6.43096 19.9024C6.49348 19.9649 6.57826 20 6.66667 20H16C16.0884 20 16.1732 19.9649 16.2357 19.9024C16.2982 19.8399 16.3333 19.7551 16.3333 19.6667V19.375C16.333 19.056 16.2218 18.747 16.0189 18.5007C15.816 18.2545 15.5339 18.0864 15.2208 18.025L14.7145 16.1346C15.5301 15.9383 16.297 15.5774 16.9681 15.0741C18.0446 14.2674 18.9431 13.0539 19.6386 11.4672C19.645 11.4525 19.6502 11.4374 19.6544 11.4219C19.8086 11.2885 19.9183 11.1112 19.9688 10.9137C20.0194 10.7162 20.0083 10.5079 19.9371 10.3169C19.8658 10.1259 19.7379 9.96122 19.5704 9.845C19.4029 9.72877 19.2039 9.66655 19 9.66669ZM19.3333 10.6667C19.3332 10.7551 19.2981 10.8398 19.2356 10.9023C19.1731 10.9648 19.0884 10.9999 19 11H7.66667V10.3334H19C19.0884 10.3335 19.1731 10.3686 19.2356 10.4311C19.2981 10.4936 19.3332 10.5783 19.3333 10.6667ZM6.33333 3.57273L7 10.0172V11H6.276C6.31399 10.893 6.33338 10.7803 6.33333 10.6667V3.57273ZM6.82371 0.775606C6.86642 0.728239 6.92195 0.694274 6.98358 0.677826C7.0452 0.661378 7.11027 0.663152 7.17091 0.682933C7.23155 0.702715 7.28514 0.739654 7.32521 0.789278C7.36528 0.838902 7.3901 0.89908 7.39667 0.962522L8.29708 9.66669H7.63396L6.74054 1.0304C6.73556 0.98446 6.7404 0.937989 6.75474 0.894063C6.76908 0.850137 6.79259 0.80976 6.82371 0.775606ZM0.666667 2.00002H6V2.66669H0.666667V2.00002ZM1 10.6667V3.33336H5.66667V10.6667C5.66657 10.7551 5.63142 10.8398 5.56893 10.9023C5.50644 10.9648 5.42171 10.9999 5.33333 11H1.33333C1.24496 10.9999 1.16023 10.9648 1.09774 10.9023C1.03525 10.8398 1.0001 10.7551 1 10.6667ZM4 12.8677C4.32796 13.6084 4.89167 14.3017 5.66321 14.8971C6.05307 15.1966 6.47318 15.4545 6.91667 15.6667H5C4.73488 15.6664 4.4807 15.5609 4.29323 15.3735C4.10576 15.186 4.00031 14.9318 4 14.6667V12.8677ZM2 15V11.6667H3.33333V14.6667C3.33383 15.1086 3.50958 15.5322 3.82204 15.8447C4.13449 16.1571 4.55813 16.3329 5 16.3334H7.89896L7.54167 17.6667H4.66667C3.95967 17.6659 3.28185 17.3847 2.78193 16.8848C2.282 16.3848 2.00079 15.707 2 15ZM14.6363 18.4196C14.6553 18.4905 14.6972 18.5531 14.7554 18.5978C14.8136 18.6425 14.8849 18.6667 14.9583 18.6667C15.1389 18.6669 15.3126 18.736 15.444 18.8599C15.5754 18.9838 15.6546 19.1531 15.6655 19.3334H7.00121C7.01206 19.1531 7.09126 18.9838 7.22266 18.8599C7.35405 18.736 7.52775 18.6669 7.70833 18.6667C7.78172 18.6667 7.85305 18.6425 7.91127 18.5978C7.96949 18.5531 8.01134 18.4905 8.03033 18.4196L8.61667 16.231C8.96272 16.2977 9.31424 16.332 9.66667 16.3334H13C13.3539 16.3339 13.7075 16.3095 14.058 16.2604L14.6363 18.4196ZM13 15.6667H9.66667C8.46775 15.6667 7.12333 15.1817 6.07046 14.3693C5.06429 13.5929 4.46417 12.6443 4.35242 11.6667H18.8119C17.4982 14.3568 15.5927 15.6667 13 15.6667Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M3.33335 5.99991C3.56441 5.99961 3.78827 5.91942 3.96697 5.77294C4.14568 5.62647 4.26824 5.42271 4.31389 5.1962L4.5176 5.29803C4.59657 5.33675 4.68765 5.3427 4.77098 5.31456C4.85431 5.28643 4.92315 5.2265 4.96249 5.14783C5.00183 5.06916 5.00848 4.97814 4.981 4.89458C4.95352 4.81103 4.89412 4.74173 4.81576 4.70178C4.81576 4.70178 4.10889 4.35086 4.08826 4.3452C3.97857 4.21872 3.83887 4.12181 3.68199 4.06337C3.5251 4.00493 3.35605 3.98683 3.19034 4.01072C3.02464 4.03462 2.86759 4.09974 2.7336 4.20013C2.59962 4.30051 2.49299 4.43293 2.4235 4.58525C2.35401 4.73757 2.32388 4.90489 2.33589 5.07188C2.34789 5.23887 2.40164 5.40017 2.4922 5.54098C2.58277 5.68179 2.70724 5.7976 2.85421 5.87778C3.00118 5.95797 3.16593 5.99996 3.33335 5.99991ZM3.33335 4.66657C3.39927 4.66657 3.46372 4.68612 3.51854 4.72275C3.57335 4.75938 3.61608 4.81144 3.64131 4.87234C3.66654 4.93325 3.67314 5.00028 3.66028 5.06494C3.64741 5.1296 3.61567 5.18899 3.56905 5.23561C3.52243 5.28223 3.46304 5.31397 3.39838 5.32683C3.33372 5.3397 3.2667 5.33309 3.20579 5.30787C3.14488 5.28264 3.09282 5.23991 3.05619 5.1851C3.01956 5.13028 3.00001 5.06583 3.00001 4.99991C3.00011 4.91153 3.03526 4.8268 3.09776 4.76431C3.16025 4.70182 3.24497 4.66667 3.33335 4.66657Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M13.0808 3.32358C13.153 3.30555 13.217 3.26393 13.2627 3.20534C13.3085 3.14674 13.3333 3.07454 13.3333 3.00021C13.3333 2.92587 13.3085 2.85367 13.2627 2.79508C13.217 2.73649 13.153 2.69487 13.0808 2.67683C12.7365 2.59114 12.422 2.4133 12.1711 2.16241C11.9202 1.91151 11.7424 1.59703 11.6567 1.25271C11.6387 1.1806 11.5971 1.11658 11.5385 1.07083C11.4799 1.02509 11.4077 1.00024 11.3333 1.00024C11.259 1.00024 11.1868 1.02509 11.1282 1.07083C11.0696 1.11658 11.028 1.1806 11.01 1.25271C10.9243 1.59703 10.7464 1.91151 10.4955 2.16241C10.2446 2.4133 9.93016 2.59114 9.58584 2.67683C9.51373 2.69487 9.44971 2.73649 9.40396 2.79508C9.35822 2.85367 9.33337 2.92587 9.33337 3.00021C9.33337 3.07454 9.35822 3.14674 9.40396 3.20534C9.44971 3.26393 9.51373 3.30555 9.58584 3.32358C9.93016 3.40928 10.2446 3.58712 10.4955 3.83801C10.7464 4.08891 10.9243 4.40339 11.01 4.74771C11.028 4.81982 11.0696 4.88384 11.1282 4.92958C11.1868 4.97533 11.259 5.00017 11.3333 5.00017C11.4077 5.00017 11.4799 4.97533 11.5385 4.92958C11.5971 4.88384 11.6387 4.81982 11.6567 4.74771C11.7424 4.40339 11.9202 4.08891 12.1711 3.83801C12.422 3.58712 12.7365 3.40928 13.0808 3.32358ZM11.3333 3.826C11.1238 3.49206 10.8415 3.20977 10.5075 3.00021C10.8415 2.79065 11.1238 2.50836 11.3333 2.17442C11.5429 2.50836 11.8252 2.79065 12.1591 3.00021C11.8252 3.20977 11.5429 3.49206 11.3333 3.826Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M15.1054 7.01704C14.8443 6.92931 14.6071 6.78231 14.4124 6.58756C14.2176 6.3928 14.0706 6.15558 13.9829 5.89449C13.9608 5.82811 13.9184 5.77036 13.8616 5.72944C13.8048 5.68852 13.7366 5.6665 13.6667 5.6665C13.5967 5.6665 13.5285 5.68852 13.4717 5.72944C13.415 5.77036 13.3725 5.82811 13.3504 5.89449C13.2627 6.15558 13.1157 6.3928 12.921 6.58756C12.7262 6.78231 12.489 6.92931 12.2279 7.01704C12.1616 7.03917 12.1039 7.08162 12.063 7.13837C12.0221 7.19512 12.0001 7.26329 12.0001 7.33324C12.0001 7.4032 12.0221 7.47137 12.063 7.52812C12.1039 7.58487 12.1616 7.62732 12.2279 7.64945C12.489 7.73717 12.7262 7.88418 12.921 8.07893C13.1157 8.27369 13.2627 8.51091 13.3504 8.77199C13.3725 8.83838 13.415 8.89613 13.4717 8.93705C13.5285 8.97797 13.5967 8.99999 13.6667 8.99999C13.7366 8.99999 13.8048 8.97797 13.8616 8.93705C13.9184 8.89613 13.9608 8.83838 13.9829 8.77199C14.0706 8.51091 14.2176 8.27369 14.4124 8.07893C14.6071 7.88418 14.8443 7.73717 15.1054 7.64945C15.1718 7.62732 15.2295 7.58487 15.2704 7.52812C15.3113 7.47137 15.3333 7.4032 15.3333 7.33324C15.3333 7.26329 15.3113 7.19512 15.2704 7.13837C15.2295 7.08162 15.1718 7.03917 15.1054 7.01704ZM13.6667 7.93458C13.5025 7.70083 13.2991 7.49736 13.0653 7.33324C13.2991 7.16913 13.5025 6.96566 13.6667 6.73191C13.8308 6.96566 14.0343 7.16913 14.2681 7.33324C14.0343 7.49736 13.8308 7.70083 13.6667 7.93458Z\" fill=\"currentcolor\" />\r\n                                                <path d=\"M18.3333 4.66667H18V4.33333C18 4.24493 17.9648 4.16014 17.9023 4.09763C17.8398 4.03512 17.755 4 17.6666 4C17.5782 4 17.4934 4.03512 17.4309 4.09763C17.3684 4.16014 17.3333 4.24493 17.3333 4.33333V4.66667H17C16.9116 4.66667 16.8268 4.70179 16.7643 4.7643C16.7017 4.82681 16.6666 4.91159 16.6666 5C16.6666 5.08841 16.7017 5.17319 16.7643 5.2357C16.8268 5.29821 16.9116 5.33333 17 5.33333H17.3333V5.66667C17.3333 5.75507 17.3684 5.83986 17.4309 5.90237C17.4934 5.96488 17.5782 6 17.6666 6C17.755 6 17.8398 5.96488 17.9023 5.90237C17.9648 5.83986 18 5.75507 18 5.66667V5.33333H18.3333C18.4217 5.33333 18.5065 5.29821 18.569 5.2357C18.6315 5.17319 18.6666 5.08841 18.6666 5C18.6666 4.91159 18.6315 4.82681 18.569 4.7643C18.5065 4.70179 18.4217 4.66667 18.3333 4.66667Z\" fill=\"currentcolor\" />\r\n                                            </svg>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_media_sosials`
--

CREATE TABLE `master_media_sosials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_ikon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_media_sosials`
--

INSERT INTO `master_media_sosials` (`id`, `nama`, `kode_ikon`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'fab fa-facebook-f', '2023-04-03 20:56:28', '2023-04-03 20:56:28'),
(2, 'Twitter', 'fab fa-twitter', '2023-04-03 20:57:51', '2023-04-03 20:57:51'),
(3, 'LinkedIn', 'fab fa-linkedin-in', '2023-04-03 20:58:01', '2023-04-03 20:58:01'),
(4, 'Instagram', 'fab fa-instagram', '2023-04-03 20:58:09', '2023-04-03 20:58:09'),
(5, 'Youtube', 'fab fa-youtube', '2023-04-03 20:58:16', '2023-04-03 20:58:16');

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
(4, '2023_04_04_023449_create_profils_table', 2),
(5, '2023_04_04_023644_create_pivot_profil_media_sosials_table', 2),
(6, '2023_04_04_024222_create_master_media_sosials_table', 2),
(7, '2023_04_04_120826_add_column_kerja_dari_jam_to_profils', 3),
(8, '2023_04_04_205648_add_column_kerja_dari_hari_to_profils', 4),
(9, '2023_04_05_025118_create_landing_page_berandas_table', 5),
(10, '2023_04_05_040152_add_column_section_10_to_landing_page_berandas', 6),
(11, '2023_04_06_001836_drop_column_section_10_to_landing_page_berandas', 7),
(12, '2023_04_06_065134_add_column_tanggal_mulai_usaha_to_profils', 8),
(13, '2023_04_06_065842_create_landing_page_perusahaans_table', 9),
(14, '2023_04_06_080011_create_landing_page_layanans_table', 10),
(15, '2023_04_06_081251_create_landing_page_proyeks_table', 11),
(16, '2023_04_06_164820_create_landing_page_kontaks_table', 12),
(17, '2023_04_06_172233_create_testimonials_table', 13),
(18, '2023_04_08_070233_create_brands_table', 14),
(24, '2023_04_09_015421_create_layanans_table', 15),
(25, '2023_04_09_022220_drop_column_deskripsi_to_layanans', 15),
(26, '2023_04_09_022315_add_column_deskripsi_mini_to_layanans', 15),
(27, '2023_04_09_023117_drop_column_ikon_to_layanans', 15),
(28, '2023_04_09_023155_add_column_ikon_to_layanans', 15),
(29, '2023_04_09_062504_create_brosurs_table', 16),
(30, '2023_04_09_120726_add_column_status_to_brosurs', 17),
(31, '2023_04_10_060635_create_service_qualities_table', 18),
(32, '2023_04_10_064737_create_pivot_faq_service_qualities_table', 19);

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
-- Struktur dari tabel `pivot_faq_service_qualities`
--

CREATE TABLE `pivot_faq_service_qualities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_quality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pertanyaan` text COLLATE utf8mb4_unicode_ci,
  `jawaban` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pivot_faq_service_qualities`
--

INSERT INTO `pivot_faq_service_qualities` (`id`, `service_quality_id`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, 1, 'How stay calm from the first time.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now. Risus rutrum amet facilisis dummy text now.', '2023-04-10 01:25:44', '2023-04-10 01:25:44'),
(2, 1, 'Our proprietary enables Quality.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now. Risus rutrum amet facilisis dummy text now.', '2023-04-10 01:25:44', '2023-04-10 01:25:44'),
(3, 1, 'Locate Clean USA Office Near You.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now. Risus rutrum amet facilisis dummy text now.', '2023-04-10 01:25:44', '2023-04-10 01:25:44'),
(5, 1, 'Visit our office and see services.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now. Risus rutrum amet facilisis dummy text now.', '2023-04-10 01:26:29', '2023-04-10 01:26:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pivot_profil_media_sosials`
--

CREATE TABLE `pivot_profil_media_sosials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_media_sosial_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profil_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tautan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pivot_profil_media_sosials`
--

INSERT INTO `pivot_profil_media_sosials` (`id`, `master_media_sosial_id`, `profil_id`, `tautan`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'https://www.facebook.com/razenteknologiindonesia?_rdc=1&_rdr', '2023-04-03 21:09:21', '2023-04-03 21:09:21'),
(3, 2, 1, 'https://twitter.com/RazenTeknologi', '2023-04-03 21:10:57', '2023-04-03 21:10:57'),
(4, 3, 1, 'https://www.linkedin.com/company/razen/about/', '2023-04-03 21:13:05', '2023-04-03 21:13:05'),
(5, 4, 1, 'https://www.instagram.com/razen_teknologi/', '2023-04-03 21:13:05', '2023-04-03 21:13:05'),
(6, 5, 1, 'https://www.youtube.com/@razenteknologiindonesia1653', '2023-04-03 21:13:05', '2023-04-03 21:13:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profils`
--

CREATE TABLE `profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kerja_dari_jam` time DEFAULT NULL,
  `kerja_sampai_jam` time DEFAULT NULL,
  `kerja_dari_hari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kerja_sampai_hari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_mulai_usaha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profils`
--

INSERT INTO `profils` (`id`, `nama`, `pt`, `no_hp`, `email`, `logo`, `alamat`, `created_at`, `updated_at`, `kerja_dari_jam`, `kerja_sampai_jam`, `kerja_dari_hari`, `kerja_sampai_hari`, `tanggal_mulai_usaha`) VALUES
(1, 'Mami Clean', 'PT Razen Teknologi Indonesia', '082299449494', 'hello@razen.co.id', '642b9aa063e73-230404.png', 'Yogyakarta', NULL, '2023-04-05 23:53:51', '08:00:00', '16:00:00', 'Senin', 'Sabtu', '2020-01-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service_qualities`
--

CREATE TABLE `service_qualities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci,
  `after_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `before_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `service_qualities`
--

INSERT INTO `service_qualities` (`id`, `judul`, `deskripsi`, `after_img`, `before_img`, `created_at`, `updated_at`) VALUES
(1, 'Kualitas Layanan', '<p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus is eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. that any Commodo iaculis eget massa phasellus ultrices nunc dignissim.</p>', '6433ad8cc1462-230410.png', '6433ad8cb84db-230410.png', '2023-04-09 23:32:44', '2023-04-09 23:32:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `testimonials`
--

INSERT INTO `testimonials` (`id`, `nama`, `jabatan`, `foto`, `testimonial`, `created_at`, `updated_at`) VALUES
(1, 'Dan Cliford', 'CEO Clef Inc', '642f02555bc74-230406.png', 'Lorem ipsum dolor amet consectetur. Ut tellus suspen disse nulla aliquam. The ultrices pretium facilisis', '2023-04-06 10:33:09', '2023-04-06 10:33:09'),
(2, 'Samuel Peters', 'CEO Clef Inc', '642f0277bb6ae-230406.png', 'Lorem ipsum dolor amet consectetur. Ut tellus suspen disse nulla aliquam. The ultrices pretium facilisis', '2023-04-06 10:33:43', '2023-04-06 10:33:43'),
(3, 'Dan Cliford', 'CEO Clef Inc', '642f02980f414-230406.png', 'Lorem ipsum dolor amet consectetur. Ut tellus suspen disse nulla aliquam. The ultrices pretium facilisis', '2023-04-06 10:34:16', '2023-04-06 10:34:16'),
(4, 'Samuel Peters', 'CEO Clef Inc', '642f02b53a562-230406.png', 'Lorem ipsum dolor amet consectetur. Ut tellus suspen disse nulla aliquam. The ultrices pretium facilisis', '2023-04-06 10:34:45', '2023-04-06 10:34:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_layout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nav_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behaviour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `radius` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `color_layout`, `nav_color`, `placement`, `behaviour`, `layout`, `radius`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mami Clean', 'mami_clean@razen.co.id', NULL, '$2y$10$vUlaHLsUBySNV17OB4bA0OgYjwnU1ThdLwFcLlbghO900K8Jz.1f.', 'light-pink', 'default', 'vertical', 'pinned', 'fluid', 'rounded', NULL, NULL, '2023-04-08 23:03:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `brosurs`
--
ALTER TABLE `brosurs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `landing_page_berandas`
--
ALTER TABLE `landing_page_berandas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `landing_page_kontaks`
--
ALTER TABLE `landing_page_kontaks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `landing_page_layanans`
--
ALTER TABLE `landing_page_layanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `landing_page_perusahaans`
--
ALTER TABLE `landing_page_perusahaans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `landing_page_proyeks`
--
ALTER TABLE `landing_page_proyeks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanans`
--
ALTER TABLE `layanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_media_sosials`
--
ALTER TABLE `master_media_sosials`
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
-- Indeks untuk tabel `pivot_faq_service_qualities`
--
ALTER TABLE `pivot_faq_service_qualities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pivot_profil_media_sosials`
--
ALTER TABLE `pivot_profil_media_sosials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `service_qualities`
--
ALTER TABLE `service_qualities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `brosurs`
--
ALTER TABLE `brosurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `landing_page_berandas`
--
ALTER TABLE `landing_page_berandas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `landing_page_kontaks`
--
ALTER TABLE `landing_page_kontaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `landing_page_layanans`
--
ALTER TABLE `landing_page_layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `landing_page_perusahaans`
--
ALTER TABLE `landing_page_perusahaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `landing_page_proyeks`
--
ALTER TABLE `landing_page_proyeks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `layanans`
--
ALTER TABLE `layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `master_media_sosials`
--
ALTER TABLE `master_media_sosials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `pivot_faq_service_qualities`
--
ALTER TABLE `pivot_faq_service_qualities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pivot_profil_media_sosials`
--
ALTER TABLE `pivot_profil_media_sosials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `profils`
--
ALTER TABLE `profils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `service_qualities`
--
ALTER TABLE `service_qualities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
