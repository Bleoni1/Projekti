-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 02:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `publication_date` date NOT NULL,
  `title` text NOT NULL,
  `summary` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`publication_date`, `title`, `summary`, `id`) VALUES
('0000-00-00', 'Wave in Japan', 'Scared a lot of people\r\n', 0),
('0000-00-00', 'Wave in Japan', 'Scared a lot of people\r\n', 0),
('0000-00-00', 'News from Japan', 'A great wave crashed into Japan today.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `Sold_since` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Name`, `Description`, `Sold_since`, `Price`, `id`) VALUES
('Pakoja 1-7 Vjec', 'Deshiorni blllballblalblalb', 0, 800, 5),
('1`32113', '1230912903', 2024, 200, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, '1234', '1234@gmail.com', '$2y$10$XomLVtSscbik4NMYEITIW.90Iy2p/kct8VMcdURYagsBQyiI5G7z.', 'super admin'),
(2, 'Super Admin', 'superadmin@example.com', '1234567', 'super_admin'),
(3, 'Product Manager', 'productmanager@example.com', '1234', 'product_manager'),
(4, '12902190', 'eueu@gmail.com', '$2y$10$.QGJLWYI5/tE13F/qVutse9wL/Nv.To03JJmHK1yuHvUMbl/.pVU6', 'user'),
(5, '12902190', 'eueu@gmail.com', '$2y$10$QBpKbqOlF4PKlcOvaNBmc.rNhAIr/jX7Gq7eID2VePELkdf8VpkPi', 'user'),
(6, '12721782', 'eueu@gmail.com', '$2y$10$uEnApw3tzV9XPGaw9DxBZeINtt.7vXSeBmedHSw9u.45mJqkt1N5a', 'user'),
(7, '1221982189', '12892819@gmail.com', '$2y$10$mQju68dh6Q4TfQFhWqA86efaN309cfoxidNASnRriLVTGlY4bxhMi', 'user'),
(8, '1221982189', '12892819@gmail.com', '$2y$10$XlWn4YHfWlvTk0iI8o/k7uNTkn16UtVtKSg8ufOVwxVEJRK04r6ZG', 'user'),
(9, '1221982189', '12892819@gmail.com', '$2y$10$Ml9vFt8dYV0OuQWmCBqOaOi8NJss8oF97HYVH/cEFmV0N1w0rC9Xm', 'user'),
(10, '1221', '272178@gmail.com', '$2y$10$H9Wbxg0yvFiOFKkRsaXGXOKFZ.Aq5xmnSJSWfcAlQ4sQOYzJHMvLC', 'user'),
(11, '1221', '272178@gmail.com', '$2y$10$cb2WK7my6Wf/EWJ842uR0u/jrcDxyHX8HjLquYAjCLY58tfoZFCvO', 'user'),
(12, '1221', '272178@gmail.com', '$2y$10$jW/aGbNY3AWPdB5q1Yc64edUFmjSCcchXrenN6GiJXk3xILA6PT2G', 'user'),
(13, '1221', '272178@gmail.com', '$2y$10$6/5MM3Lly2MXD.HCCZ4aguPOrZp.I7RGRknlSX/ZGBDFLePE/uDju', 'user'),
(14, '1221', '272178@gmail.com', '$2y$10$IRt4i9RpzDMlqQKMTRmisuyT1RzBrIiAnOh4bIjM4yh14ZeX41lQ6', 'user'),
(15, '12312', '2772@gmail.com', '$2y$10$C.rNlgXTAZegHBKDe0yI1eefwU3D/NDMiA1XOsypKEepMUIkCKgBW', 'user'),
(16, '12312', '2772@gmail.com', '$2y$10$HbbIjpAPEap5a112AXEDiOrfa9kc6Mu1lBFVAFsaQ1iL3w31mCG7G', 'user'),
(17, '12321', '2772@gmail.com', '$2y$10$xO0P8RsSD4zgq58CiRm/O.CZaK4ccurRK4vwU2rMQk8F9wVyj4M8O', 'user'),
(18, '12321', '2772@gmail.com', '$2y$10$Jk1UtpiSWSuhckbg.iavh.2DNXFsBzG5QX1cgjYxAXI9tLgacv8ju', 'user'),
(19, '123123', '12@gmail.com', '$2y$10$AlYlhZWS7orrYPFMc01uHup4uui44FYDeLO.YYLDAQ7x567e1YgM6', 'user'),
(20, '8484', 'iru@gmail.com', '$2y$10$fJhovbjaVt3IFaGe2d8mLe49em1FJuF4K56D7Uumt2dEMnv97YHYy', 'user'),
(21, '112899821', '125521@gmail.com', '$2y$10$sXfVBAJCGx3xEfMyq6QmyOagDaYg1Lwq9VwVZQNgP880tGLi0kNde', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
