-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 09:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cafe_terdekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `cafes`
--

CREATE TABLE `cafes` (
  `id_cafe` int(11) NOT NULL,
  `nama_cafe` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `foto` varchar(128) NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cafes`
--

INSERT INTO `cafes` (`id_cafe`, `nama_cafe`, `alamat`, `lat`, `lng`, `jam_buka`, `jam_tutup`, `foto`, `aktif`) VALUES
(1, 'Aegis', 'jalan apel mundu CT XV No. 232.c Tempel, CaturTunggal, Kec. Depok, Kabupaten sleman', -7.774433, 110.404846, '08:00:00', '22:00:00', 'gb3.jpg', 1),
(2, 'Seventhy Four Coffee', 'Jl..Agro No.3, Kocoran, Caturtunggl, Kec.Depok, Kabupaten Sleman', -7.766167, 110.379929, '15:00:00', '23:00:00', 'gb2.jpg', 1),
(3, 'Carney', 'Kledokkan, Jl.. Sembada, Kledokan,Caturtunggal, Kec.Depok, Kabupaten, Sleman', -7.775692, 110.40995, '10:00:00', '23:00:00', 'foto.jpg', 1),
(4, 'Teduh Kopi', 'Kledokkan, Jl.. Sembada, Kledokan,Caturtunggal, Kec.Depok, Kabupaten, Sleman', -7.775697, 110.409935, '10:00:00', '23:00:00', '20220708143524648800A.jpg', 1),
(5, 'Petty Pots By Moon', 'Jl. Perumnas 245-249, nologaten, CaturTunggal, kec Depok, Kabupaten Sleman', -7.774372, 110.404716, '11:00:00', '00:00:00', '20220709092322790700A.jpg', 1),
(6, 'Matta Coffee', 'Gang kapuas catur tunggal  kec depok kabupaten sleman daerah istimewa yogyakarta', -7.764295, 110.404121, '08:00:00', '23:00:00', 'gb10.jpg', 1),
(7, 'Jaga Tempo Koffie', 'Jl..Gambir Karangasem Baru No.7, Karang Gayam, CaturTunggal, Kec.Depok', -7.767064, 110.386215, '16:00:00', '22:00:00', 'gb10.jpg', 1),
(8, 'Konkrite Coffee & Place', 'Jl. elada, Nologaten, Caturtunggal, kec. Depok, Kabupaten Sleman', -7.778553, 110.399651, '10:00:00', '23:00:00', 'gb10.jpg', 1),
(9, 'Signatura Coffee', 'Jl. Agro, Kocoran, Caturtunggal, Kec. Depok, Kabupaten Sleman', -7.766417, 110.38102, '08:00:00', '23:30:00', 'gb10.jpg', 1),
(10, 'JRNY Coffee & Records', 'Jl. Seturan raya no 9a, Kledokan, Caturtunggal, Depok, Kec Depok, Kabupaten Sleman', -7.7743506, 110.4092764, '10:00:00', '22:00:00', 'gb10.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id_rating` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `id_cafe` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id_rating`, `rating`, `id_cafe`, `id_user`) VALUES
(1, 3, 2, 2),
(2, 4, 2, 1),
(3, 1, 1, 1),
(4, 2, 1, 2),
(5, 3, 1, 1),
(6, 4, 1, 2),
(7, 3, 1, 2),
(8, 4, 4, 1),
(9, 4, 3, 2),
(10, 5, 3, 3),
(11, 4, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int(11) NOT NULL,
  `review` text NOT NULL,
  `id_cafe` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id_review`, `review`, `id_cafe`, `id_user`) VALUES
(1, 'Review A', 2, 1),
(2, 'Review B', 2, 2),
(3, 'Review C', 1, 1),
(4, 'Review D', 1, 2),
(8, 'Tambahubah ulasan', 1, 2),
(9, 'asdsad', 1, 2),
(10, 'rating 4', 4, 1),
(11, 'Ulasan', 3, 2),
(12, 'Ulasan 2', 3, 3),
(13, 'Ulasan JRNY', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `role` enum('user','admin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `password`, `foto`, `role`) VALUES
(1, 'Pengguna Satu', 'user_1', '123', 'gb4.jpg', 'user'),
(2, 'Pengguna Dua', 'user_2', '123', 'gb5.jpg', 'user'),
(3, 'Admin Satu', 'admin_1', '123', 'gb10.jpg', 'admin'),
(4, 'Admin Dua', 'admin_2', '123', 'gb4.jpg', 'admin'),
(6, 'Tambah 1', 'tambah_1', '123', 'gb10.jpg', 'user'),
(7, 'Nama Daftar', 'daftar_1', '123', 'gb4.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cafes`
--
ALTER TABLE `cafes`
  ADD PRIMARY KEY (`id_cafe`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `fk_id_cafe` (`id_cafe`),
  ADD KEY `fk_id_user_rating` (`id_user`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `fk_id_cafe_reviews` (`id_cafe`),
  ADD KEY `fk_id_user_reviews` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cafes`
--
ALTER TABLE `cafes`
  MODIFY `id_cafe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_id_cafe` FOREIGN KEY (`id_cafe`) REFERENCES `cafes` (`id_cafe`),
  ADD CONSTRAINT `fk_id_user_rating` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_id_cafe_reviews` FOREIGN KEY (`id_cafe`) REFERENCES `cafes` (`id_cafe`),
  ADD CONSTRAINT `fk_id_user_reviews` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
