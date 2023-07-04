-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 06:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(64) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Kristijan', 'Jagunec', 'kjagunec', '$2y$10$pVaJzAiNmbDIetyNlyQoeu36E15TzailD1Z9kNeERYzN0no5FAJrS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `naslov` varchar(150) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(2, '2023-06-19', 'Guerre en Ukraine : la Russie a déjà transféré les premières armes nucléaires tactiques promises à la Biélorussie, confirme Vladimir Poutine', 'Duis erat est, sollicitudin in.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum eu nibh rhoncus consequat. Nulla eget commodo ante, eget viverra arcu. Vivamus sed ornare enim. Aliquam erat volutpat. Sed bibendum, ex vitae maximus ornare, sapien quam varius dolor, in feugiat mi massa quis purus. Aliquam sed vestibulum felis. Curabitur ultricies dapibus ipsum, non volutpat erat. In et diam magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In leo turpis, consequat nec consequat vel, convallis non lectus. Nam auctor, risus in cursus aliquet, libero eros tempus felis, a congue ligula purus vitae quam.\r\n\r\nQuisque et est eros. Fusce quis rhoncus lacus, sit amet aliquet tellus. Proin fringilla eros sed neque fringilla pretium. Donec non finibus augue. Quisque pretium lectus tristique enim faucibus fermentum. Curabitur posuere nibh libero, sit amet molestie dolor consequat et. Etiam imperdiet sollicitudin augue ac feugiat. Proin id dignissim erat. Praesent dapibus, nisi vel lobortis accumsan, odio elit maximus sem, in ultrices metus lorem eu arcu. Aliquam pellentesque, nunc non rutrum mattis, sem purus lacinia felis, sit amet vestibulum est augue vitae nunc. Cras non elit turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\n', 'putinj.avif', 'elections', 0),
(3, '2023-06-19', 'Affaires Daval et Esquivillon : pourquoi les suspects ont longtemps menti avec assurance avant de passer aux aveux', 'Duis erat est, sollicitudin in.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum eu nibh rhoncus consequat. Nulla eget commodo ante, eget viverra arcu. Vivamus sed ornare enim. Aliquam erat volutpat. Sed bibendum, ex vitae maximus ornare, sapien quam varius dolor, in feugiat mi massa quis purus. Aliquam sed vestibulum felis. Curabitur ultricies dapibus ipsum, non volutpat erat. In et diam magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In leo turpis, consequat nec consequat vel, convallis non lectus. Nam auctor, risus in cursus aliquet, libero eros tempus felis, a congue ligula purus vitae quam.\r\n\r\nQuisque et est eros. Fusce quis rhoncus lacus, sit amet aliquet tellus. Proin fringilla eros sed neque fringilla pretium. Donec non finibus augue. Quisque pretium lectus tristique enim faucibus fermentum. Curabitur posuere nibh libero, sit amet molestie dolor consequat et. Etiam imperdiet sollicitudin augue ac feugiat. Proin id dignissim erat. Praesent dapibus, nisi vel lobortis accumsan, odio elit maximus sem, in ultrices metus lorem eu arcu. Aliquam pellentesque, nunc non rutrum mattis, sem purus lacinia felis, sit amet vestibulum est augue vitae nunc. Cras non elit turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'palais.avif', 'elections', 0),
(4, '2023-06-19', 'Plus de 25 000 migrants sont morts ou portés disparus Plus de 25 000 migrants sont morts ou portés disparus lors dun naufrage en mer Méditerranée depu', 'Duis erat est, sollicitudin in.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum eu nibh rhoncus consequat. Nulla eget commodo ante, eget viverra arcu. Vivamus sed ornare enim. Aliquam erat volutpat. Sed bibendum, ex vitae maximus ornare, sapien quam varius dolor, in feugiat mi massa quis purus. Aliquam sed vestibulum felis. Curabitur ultricies dapibus ipsum, non volutpat erat. In et diam magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In leo turpis, consequat nec consequat vel, convallis non lectus. Nam auctor, risus in cursus aliquet, libero eros tempus felis, a congue ligula purus vitae quam.\r\n\r\nQuisque et est eros. Fusce quis rhoncus lacus, sit amet aliquet tellus. Proin fringilla eros sed neque fringilla pretium. Donec non finibus augue. Quisque pretium lectus tristique enim faucibus fermentum. Curabitur posuere nibh libero, sit amet molestie dolor consequat et. Etiam imperdiet sollicitudin augue ac feugiat. Proin id dignissim erat. Praesent dapibus, nisi vel lobortis accumsan, odio elit maximus sem, in ultrices metus lorem eu arcu. Aliquam pellentesque, nunc non rutrum mattis, sem purus lacinia felis, sit amet vestibulum est augue vitae nunc. Cras non elit turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'brodic.avif', 'elections', 0),
(5, '2023-06-19', 'Mort de Gino Mäder : ce que lon sait de laccident mortel du cour', 'Duis erat est, sollicitudin in.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum eu nibh rhoncus consequat. Nulla eget commodo ante, eget viverra arcu. Vivamus sed ornare enim. Aliquam erat volutpat. Sed bibendum, ex vitae maximus ornare, sapien quam varius dolor, in feugiat mi massa quis purus. Aliquam sed vestibulum felis. Curabitur ultricies dapibus ipsum, non volutpat erat. In et diam magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In leo turpis, consequat nec consequat vel, convallis non lectus. Nam auctor, risus in cursus aliquet, libero eros tempus felis, a congue ligula purus vitae quam.\r\n\r\nQuisque et est eros. Fusce quis rhoncus lacus, sit amet aliquet tellus. Proin fringilla eros sed neque fringilla pretium. Donec non finibus augue. Quisque pretium lectus tristique enim faucibus fermentum. Curabitur posuere nibh libero, sit amet molestie dolor consequat et. Etiam imperdiet sollicitudin augue ac feugiat. Proin id dignissim erat. Praesent dapibus, nisi vel lobortis accumsan, odio elit maximus sem, in ultrices metus lorem eu arcu. Aliquam pellentesque, nunc non rutrum mattis, sem purus lacinia felis, sit amet vestibulum est augue vitae nunc. Cras non elit turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'accident.avif', 'elections', 0),
(6, '2023-06-19', 'Nice : des prières musulmanes dans des écoles primaires', 'Duis erat est, sollicitudin in.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum eu nibh rhoncus consequat. Nulla eget commodo ante, eget viverra arcu. Vivamus sed ornare enim. Aliquam erat volutpat. Sed bibendum, ex vitae maximus ornare, sapien quam varius dolor, in feugiat mi massa quis purus. Aliquam sed vestibulum felis. Curabitur ultricies dapibus ipsum, non volutpat erat. In et diam magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In leo turpis, consequat nec consequat vel, convallis non lectus. Nam auctor, risus in cursus aliquet, libero eros tempus felis, a congue ligula purus vitae quam.\r\n\r\nQuisque et est eros. Fusce quis rhoncus lacus, sit amet aliquet tellus. Proin fringilla eros sed neque fringilla pretium. Donec non finibus augue. Quisque pretium lectus tristique enim faucibus fermentum. Curabitur posuere nibh libero, sit amet molestie dolor consequat et. Etiam imperdiet sollicitudin augue ac feugiat. Proin id dignissim erat. Praesent dapibus, nisi vel lobortis accumsan, odio elit maximus sem, in ultrices metus lorem eu arcu. Aliquam pellentesque, nunc non rutrum mattis, sem purus lacinia felis, sit amet vestibulum est augue vitae nunc. Cras non elit turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'zgrada.avif', 'elections', 0),
(7, '2023-06-19', 'JT de 13h du vendredi 16 juin 2023', 'Duis erat est, sollicitudin in.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum eu nibh rhoncus consequat. Nulla eget commodo ante, eget viverra arcu. Vivamus sed ornare enim. Aliquam erat volutpat. Sed bibendum, ex vitae maximus ornare, sapien quam varius dolor, in feugiat mi massa quis purus. Aliquam sed vestibulum felis. Curabitur ultricies dapibus ipsum, non volutpat erat. In et diam magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In leo turpis, consequat nec consequat vel, convallis non lectus. Nam auctor, risus in cursus aliquet, libero eros tempus felis, a congue ligula purus vitae quam.\r\n\r\nQuisque et est eros. Fusce quis rhoncus lacus, sit amet aliquet tellus. Proin fringilla eros sed neque fringilla pretium. Donec non finibus augue. Quisque pretium lectus tristique enim faucibus fermentum. Curabitur posuere nibh libero, sit amet molestie dolor consequat et. Etiam imperdiet sollicitudin augue ac feugiat. Proin id dignissim erat. Praesent dapibus, nisi vel lobortis accumsan, odio elit maximus sem, in ultrices metus lorem eu arcu. Aliquam pellentesque, nunc non rutrum mattis, sem purus lacinia felis, sit amet vestibulum est augue vitae nunc. Cras non elit turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'julian.jpg', 'lesjt', 0),
(8, '2023-06-19', 'JT de 12/13 du vendredi 16 juin 2023', 'Duis erat est, sollicitudin in.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum eu nibh rhoncus consequat. Nulla eget commodo ante, eget viverra arcu. Vivamus sed ornare enim. Aliquam erat volutpat. Sed bibendum, ex vitae maximus ornare, sapien quam varius dolor, in feugiat mi massa quis purus. Aliquam sed vestibulum felis. Curabitur ultricies dapibus ipsum, non volutpat erat. In et diam magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In leo turpis, consequat nec consequat vel, convallis non lectus. Nam auctor, risus in cursus aliquet, libero eros tempus felis, a congue ligula purus vitae quam.\r\n\r\nQuisque et est eros. Fusce quis rhoncus lacus, sit amet aliquet tellus. Proin fringilla eros sed neque fringilla pretium. Donec non finibus augue. Quisque pretium lectus tristique enim faucibus fermentum. Curabitur posuere nibh libero, sit amet molestie dolor consequat et. Etiam imperdiet sollicitudin augue ac feugiat. Proin id dignissim erat. Praesent dapibus, nisi vel lobortis accumsan, odio elit maximus sem, in ultrices metus lorem eu arcu. Aliquam pellentesque, nunc non rutrum mattis, sem purus lacinia felis, sit amet vestibulum est augue vitae nunc. Cras non elit turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'emilie.jpg', 'lesjt', 0),
(9, '2023-06-19', ':midi politique du vendredi 16 juin 2023', 'Duis erat est, sollicitudin in.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum eu nibh rhoncus consequat. Nulla eget commodo ante, eget viverra arcu. Vivamus sed ornare enim. Aliquam erat volutpat. Sed bibendum, ex vitae maximus ornare, sapien quam varius dolor, in feugiat mi massa quis purus. Aliquam sed vestibulum felis. Curabitur ultricies dapibus ipsum, non volutpat erat. In et diam magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In leo turpis, consequat nec consequat vel, convallis non lectus. Nam auctor, risus in cursus aliquet, libero eros tempus felis, a congue ligula purus vitae quam.\r\n\r\nQuisque et est eros. Fusce quis rhoncus lacus, sit amet aliquet tellus. Proin fringilla eros sed neque fringilla pretium. Donec non finibus augue. Quisque pretium lectus tristique enim faucibus fermentum. Curabitur posuere nibh libero, sit amet molestie dolor consequat et. Etiam imperdiet sollicitudin augue ac feugiat. Proin id dignissim erat. Praesent dapibus, nisi vel lobortis accumsan, odio elit maximus sem, in ultrices metus lorem eu arcu. Aliquam pellentesque, nunc non rutrum mattis, sem purus lacinia felis, sit amet vestibulum est augue vitae nunc. Cras non elit turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'marianne.jpg', 'lesjt', 0),
(10, '2023-06-19', 'Le fil info 10h30 du vendredi 16 juin 2023', 'Duis erat est, sollicitudin in.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum eu nibh rhoncus consequat. Nulla eget commodo ante, eget viverra arcu. Vivamus sed ornare enim. Aliquam erat volutpat. Sed bibendum, ex vitae maximus ornare, sapien quam varius dolor, in feugiat mi massa quis purus. Aliquam sed vestibulum felis. Curabitur ultricies dapibus ipsum, non volutpat erat. In et diam magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In leo turpis, consequat nec consequat vel, convallis non lectus. Nam auctor, risus in cursus aliquet, libero eros tempus felis, a congue ligula purus vitae quam.\r\n\r\nQuisque et est eros. Fusce quis rhoncus lacus, sit amet aliquet tellus. Proin fringilla eros sed neque fringilla pretium. Donec non finibus augue. Quisque pretium lectus tristique enim faucibus fermentum. Curabitur posuere nibh libero, sit amet molestie dolor consequat et. Etiam imperdiet sollicitudin augue ac feugiat. Proin id dignissim erat. Praesent dapibus, nisi vel lobortis accumsan, odio elit maximus sem, in ultrices metus lorem eu arcu. Aliquam pellentesque, nunc non rutrum mattis, sem purus lacinia felis, sit amet vestibulum est augue vitae nunc. Cras non elit turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'flore.jpg', 'lesjt', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
