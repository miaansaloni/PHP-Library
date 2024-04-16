-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 05:41 PM
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
-- Database: `gestione_libreria`
--

-- --------------------------------------------------------

--
-- Table structure for table `libri`
--

CREATE TABLE `libri` (
  `id` int(11) NOT NULL,
  `titolo` varchar(50) NOT NULL,
  `autore` varchar(30) NOT NULL,
  `anno_pubblicazione` int(11) NOT NULL,
  `genere` varchar(20) NOT NULL,
  `copertina` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libri`
--

INSERT INTO `libri` (`id`, `titolo`, `autore`, `anno_pubblicazione`, `genere`, `copertina`) VALUES
(1, ' One Hundred Years of Solitude', 'Gabriel Garcia Marquez', 1967, 'Fiction', 'https://images.thegreatestbooks.org/3jx639wkwk8xq18chslnzx4vd0pi'),
(2, ' The Great Gatsby', 'F. Scott Fitzgerald', 1925, 'Fiction', 'https://images.thegreatestbooks.org/7pmjakmyeky9c4gb0eh6nrbgg5dv'),
(4, 'Nineteen Eighty Four', 'George Orwell', 1949, ' Fiction', 'https://images.thegreatestbooks.org/sfuxzj53yealhtgfsxzehpncqk5q'),
(6, 'Lolita', 'Vladimir Nabokov', 1955, ' Fiction', 'https://images.thegreatestbooks.org/79sx13ontweq98p0epct3dqzxtg8'),
(7, 'Don Quixote', 'Miguel de Cervantes', 1605, 'Fiction', 'https://images.thegreatestbooks.org/vtdpfrooutaw0mseaer2rlnzuxe2'),
(8, 'Wuthering Heights', 'Emily Brontë', 1847, ' Fiction', 'https://images.thegreatestbooks.org/6vxxzjylg5hieuwbq4d567qeu5e4'),
(9, 'Madame Bovary', 'Gustave Flaubert', 1857, ' Fiction', 'https://images.thegreatestbooks.org/py4yb3z71t57y0jqmc9mph1ud2h6'),
(10, 'The Divine Comedy', 'Dante Alighieri', 1301, ' Fiction', 'https://images.thegreatestbooks.org/a6mt6a2926cmpd1d501ingjh4b14'),
(11, 'The Odyssey', 'Homer', -700, 'Fiction', 'https://images.thegreatestbooks.org/gg04b1vvbgpfaxyjtjutcap2ud83');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libri`
--
ALTER TABLE `libri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `libri`
--
ALTER TABLE `libri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
