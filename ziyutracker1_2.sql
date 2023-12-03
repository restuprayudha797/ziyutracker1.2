-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2023 pada 10.04
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ziyutracker1.2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activation_token`
--

CREATE TABLE `activation_token` (
  `email` varchar(100) NOT NULL,
  `token` text NOT NULL,
  `date_created` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `devices_active`
--

CREATE TABLE `devices_active` (
  `id_active` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `device_name` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `proof_of_payment` varchar(255) NOT NULL,
  `payment_date` varchar(30) NOT NULL,
  `role_payment` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id_payment`, `email`, `proof_of_payment`, `payment_date`, `role_payment`) VALUES
(1, 'ziyutechno@gmail.com', 'default.jpg', '1701593475', 2),
(2, 'ziyutechno@gmail.com', 'default.jpg', '1701593669', 2),
(3, 'ziyutechno@gmail.com', 'default.jpg', '1701593734', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_login`
--

CREATE TABLE `report_login` (
  `log_email` varchar(100) NOT NULL,
  `log_user` int(11) NOT NULL,
  `log_ip` varchar(20) NOT NULL,
  `log_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `profile` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`email`, `password`, `name`, `phone`, `alamat`, `profile`, `is_active`, `date_created`) VALUES
('admingps@gmail.com', '$2y$10$NpBHRzidNbGPD/4x2SMB3OA46xnrfUgvZZp2GjWmAGb1fpSaA1I.m', 'Administrator', '081224974571', '', '', 5, '123454'),
('rtyuakatsuki@gmail.com', '$2y$10$f9OScbrOI/mpoxkHfop1x.jREughoppzLJ81Kx3l/zwXO5oPjchni', 'Zidan rafif pratama', '081270787806', '', '', 3, '1699204952'),
('ziyutechno@gmail.com', '$2y$10$NjGzqMKN1AH4rdv2PDJMcuXxCiins2C/5VlfsYAA4ssTv9D0va5mu', 'Ziyu Techno', '081224974582', '-', 'default.jpg', 3, '1701530209');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activation_token`
--
ALTER TABLE `activation_token`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `devices_active`
--
ALTER TABLE `devices_active`
  ADD PRIMARY KEY (`id_active`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `devices_active`
--
ALTER TABLE `devices_active`
  MODIFY `id_active` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
