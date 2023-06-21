-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 04:19 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hallynime_retreat`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pemesan` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `nama_kamar` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `img_dir` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `status_bayar` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_pemesan`, `nama_pemesan`, `email`, `no_hp`, `nama_kamar`, `harga`, `img_dir`, `start_date`, `end_date`, `status_bayar`, `created_at`) VALUES
('15b672fd-0fd4-11ee-8aa2-1831bf80d5a1', '28213ac8-0fcc-11ee-8aa2-1831bf80d5a1', 'Pengguna Coba 3', 'pengguna_3@gmail.com', '081', 'Family Room', '150000', 'img2.jpg', '2023-06-22', '2023-06-22', 0, '2023-06-21 01:36:46'),
('243e5bab-0fd4-11ee-8aa2-1831bf80d5a1', '28213ac8-0fcc-11ee-8aa2-1831bf80d5a1', 'Pengguna Coba 3', 'pengguna_3@gmail.com', '08901379813', 'Family Room', '400000', 'img4.jpg', '2023-06-28', '2023-06-30', 1, '2023-06-21 01:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `img_dir` varchar(255) NOT NULL,
  `status_tersedia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `nama`, `harga`, `img_dir`, `status_tersedia`) VALUES
('2b647e8a-0f6e-11ee-8ad1-1831bf80d5a1', 'Superior Room', '150000', 'img2.jpg', 1),
('3eaab330-0f6e-11ee-8ad1-1831bf80d5a1', 'Deluxe Room', '200000', 'img3.jpg', 1),
('64132afe-0f6e-11ee-8ad1-1831bf80d5a1', 'Family Room', '400000', 'img4.jpg', 1),
('a0617a5e-0f6c-11ee-8ad1-1831bf80d5a1', 'Standard Room', '100000', 'img1.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `role`, `email`, `password`, `created_at`) VALUES
('28213ac8-0fcc-11ee-8aa2-1831bf80d5a1', 'Pengguna Coba 3', 'pengguna', 'pengguna_3@gmail.com', '$2y$10$j7ecTefA9Wwqnh.WlVlo1OIeRnnhDzwwgAPxBkSZh33GkoWWEI8ym', '2023-06-21 00:40:01'),
('733a0693-0f3d-11ee-acec-1831bf80d5a1', 'Administrator', 'admin', 'admin@gmail.com', '$2y$10$cEvIpdsDXaX1W1rbJlaimu62hx/xfSFB4kVQDIe7TM5g8votbbmKK', '2023-06-20 07:38:29'),
('921b6a13-0f4b-11ee-acec-1831bf80d5a1', 'Pengguna Coba 1', 'pengguna', 'pengguna@gmail.com', '$2y$10$cEvIpdsDXaX1W1rbJlaimu62hx/xfSFB4kVQDIe7TM5g8votbbmKK', '2023-06-20 09:19:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
