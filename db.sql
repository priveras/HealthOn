-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 20, 2015 at 08:55 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ci_healthon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
`id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `username`, `password`, `image`, `permission`, `created_at`) VALUES
(1, 'Pablo Rivera', 'priveras', '38371fef7d829c7f8b0e2fedf7a04334', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xap1/v/t1.0-1/c2.229.716.716/s320x320/10001354_10152260221726210_1260063200_n.jpg?oh=d5f10f27965726f5ec65259f50b2563a&oe=557CE83E&__gda__=1435417146_88d97d5433bc5c3ba0f751ad2f766b28', 0, '2015-03-03 04:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
`id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  `delivery_date` datetime NOT NULL,
  `therapist` varchar(255) NOT NULL,
  `days` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `category`, `client_id`, `datetime`, `address`, `delivery_date`, `therapist`, `days`, `type`, `comments`, `created_at`) VALUES
(1, 'intolerance', 3, '2015-03-11 14:45:00', '1', '2015-03-12 00:00:00', 'Daniela Fernandez', 1, '1', '1', '2015-03-11 20:45:58'),
(2, 'juices', 6, '2015-03-11 14:46:00', 'Alpes 700A', '0000-00-00 00:00:00', '1', 3, '1', 'Sin aguacate', '2015-03-11 20:46:13'),
(3, 'consultation', 4, '2015-03-11 14:46:00', '1', '0000-00-00 00:00:00', '1', 1, 'Primera Vez', '1', '2015-03-11 20:46:24'),
(4, 'intolerance', 3, '2015-03-13 21:37:00', 'Dirección 7', '2015-03-11 00:00:00', 'Daniela Fernandez', 1, '1', '1', '2015-03-12 03:38:12'),
(5, 'cavitation', 12, '2015-03-12 12:50:00', '1', '0000-00-00 00:00:00', '1', 1, 'Zona 3', '1', '2015-03-12 18:50:49'),
(6, 'consultation', 17, '2015-03-13 13:23:00', '1', '0000-00-00 00:00:00', '1', 1, 'Seguimiento', '1', '2015-03-13 19:23:47'),
(7, 'consultation', 17, '2015-03-13 13:23:00', '1', '0000-00-00 00:00:00', '1', 1, 'Primera Vez', '1', '2015-03-13 19:23:59'),
(8, 'consultation', 17, '2015-03-13 13:24:00', '1', '0000-00-00 00:00:00', '1', 1, 'Seguimiento', '1', '2015-03-13 19:24:05'),
(9, 'consultation', 17, '2015-03-13 13:24:00', '1', '0000-00-00 00:00:00', '1', 1, 'Seguimiento', '1', '2015-03-13 19:24:17'),
(10, 'intolerance', 3, '2015-03-13 13:24:00', 'Alpes 700A', '2015-03-13 00:00:00', 'Daniela Fernandez', 1, '1', '1', '2015-03-13 19:24:40'),
(11, 'intolerance', 15, '2015-03-18 13:46:00', '1', '2015-03-18 00:00:00', 'a', 1, '1', '1', '2015-03-18 19:46:55'),
(12, 'intolerance', 3, '2015-03-18 19:00:00', '1', '2015-03-18 00:00:00', 'Daniela Fernandez', 1, '1', '1', '2015-03-19 01:00:16'),
(13, 'juices', 15, '2015-03-18 20:27:00', 'Alpes 700A', '0000-00-00 00:00:00', '1', 3, '1', 'sin', '2015-03-19 02:27:19'),
(14, 'consultation', 14, '2015-03-18 20:38:00', '1', '0000-00-00 00:00:00', '1', 1, 'Seguimiento', '1', '2015-03-19 02:38:30'),
(15, 'intolerance', 3, '2015-03-25 20:52:00', '1', '2015-03-26 00:00:00', 'Daniela Fernandez', 1, '1', '1', '2015-03-19 02:52:19'),
(16, 'juices', 6, '2015-03-18 20:57:00', 'a', '0000-00-00 00:00:00', '1', 3, '1', 'aa', '2015-03-19 02:57:43'),
(17, 'cavitation', 9, '2015-03-19 14:59:00', '1', '0000-00-00 00:00:00', '1', 1, 'Zona 1', '1', '2015-03-19 20:59:36'),
(18, 'intolerance', 3, '2015-03-19 15:10:00', '1', '2015-03-19 00:00:00', 'a', 1, '1', '1', '2015-03-19 21:10:09'),
(19, 'cavitation', 12, '2015-03-22 15:13:00', '1', '0000-00-00 00:00:00', '1', 1, 'Zona 1', '1', '2015-03-22 21:18:56'),
(20, 'cavitation', 12, '2015-03-22 15:20:00', '1', '0000-00-00 00:00:00', '1', 1, 'Zona 1', '1', '2015-03-22 21:20:39'),
(21, 'cavitation', 12, '2015-03-22 15:21:00', '1', '0000-00-00 00:00:00', '1', 1, 'Zona 1', '1', '2015-03-22 21:21:19'),
(22, 'cavitation', 12, '2015-03-22 15:42:00', '1', '0000-00-00 00:00:00', '1', 1, 'Zona 1', '1', '2015-03-22 21:42:09'),
(23, 'cavitation', 9, '2015-03-22 15:42:00', '1', '0000-00-00 00:00:00', '1', 1, 'Zona 1', '1', '2015-03-22 21:42:23'),
(24, 'cavitation', 9, '2015-03-22 15:44:00', '1', '0000-00-00 00:00:00', '1', 1, 'Zona 1', '1', '2015-03-22 21:44:56'),
(25, 'intolerance', 3, '2015-03-22 15:50:00', '1', '2015-03-22 00:00:00', 'Daniela Fernandez', 1, '1', '1', '2015-03-22 21:50:23'),
(26, 'intolerance', 3, '2015-03-22 15:50:00', '1', '2015-03-22 00:00:00', 'Daniela Fernandez', 1, '1', '1', '2015-03-22 21:55:37'),
(27, 'intolerance', 3, '2015-03-22 15:55:00', '1', '2015-03-22 00:00:00', 'Hola', 1, '1', '1', '2015-03-22 21:55:52'),
(28, 'cavitation', 3, '2015-04-05 14:55:00', '1', '0000-00-00 00:00:00', '1', 1, 'Zona 1', '1', '2015-04-05 19:55:12'),
(29, 'juices', 3, '2015-04-05 14:55:00', 'as', '0000-00-00 00:00:00', '1', 3, '1', 'sin agu', '2015-04-05 19:55:38'),
(30, 'consultation', 3, '2015-04-05 14:56:00', '1', '0000-00-00 00:00:00', 'Daniela Fernandez', 1, 'Primera Vez', '1', '2015-04-05 19:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
`id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `cellphone` varchar(11) NOT NULL,
  `name_invoice` varchar(255) NOT NULL,
  `address_invoice` varchar(255) NOT NULL,
  `rfc` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `full_name`, `address`, `email`, `phone`, `cellphone`, `name_invoice`, `address_invoice`, `rfc`, `created_at`) VALUES
(1, 'Pablo Rivera', 'Golf 203 3A Country Club', 'priveras@gmail.com', 55678987, '5530093608', '', '', 'RISP890619HH9', '2015-03-11 20:08:15'),
(2, 'Patricio Quiroz', 'Lagasca 95 3C Barrio de Salamanca', 'pato_quiroz@hotmail.com', 54678909, '55467802398', '', '', 'PQR890456HH7', '2015-03-11 20:09:26'),
(3, 'Andres Teran', 'Club de Golf Bosques 222', 'andres@gmail.com', 54678909, '5567876456', '', '', 'ATM890715UU9', '2015-03-11 20:10:22'),
(4, 'Maria Escobar', 'Santísimo 11 San Angel', 'mer.es33@gmail.com', 54678909, '5567890987', '', '', 'MVSD789238', '2015-03-11 20:16:27'),
(5, 'Miguel Velasco', 'Zampapano 117 Pedregal', 'miguel@gmail.com', 54678909, '5567890987', '', '', 'MVSD789238', '2015-03-11 20:31:02'),
(6, 'Cliente 1', 'Dirección 1', '1@email.com', 1234567, '123456789', '', '', 'ABCD12345', '2015-03-11 20:33:18'),
(7, 'Cliente 2', 'Dirección 2', '2@email.com', 1234567, '123456789', '', '', 'ABCD12345', '2015-03-11 20:36:43'),
(8, 'Cliente 3', 'Dirección 3', '3@gmail.com', 1234567, '123456789', '', '', 'ABCD12345', '2015-03-11 20:50:32'),
(9, 'Cliente 4', 'Dirección 4', '4@email.com', 1234567, '123456789', '', '', 'ABCD12345', '2015-03-11 20:52:28'),
(10, 'Cliente 5', 'Dirección 5', '5@email.com', 1234567, '123456789', '', '', 'ABCD12345', '2015-03-11 21:42:58'),
(11, 'Cliente 6', 'Dirección 6', '6@email.com', 1234567, '123456789', '', '', 'ABCD12345', '2015-03-11 21:43:20'),
(12, 'Cliente 7', 'Dirección 7', '7@email.com', 1234567, '123456789', '', '', 'ABCD12345', '2015-03-11 21:43:47'),
(13, 'Cliente 7', 'Dirección 7', '8@email.com', 1234567, '123456789', '', '', 'ABCD12345', '2015-03-11 21:44:40'),
(14, 'Cliente 9', 'Dirección 9', '9@email.com', 1234567, '123456789', '', '', 'ABCD12345', '2015-03-11 21:45:11'),
(15, 'Cliente 10', 'Dirección 10', '10@email.com', 1234567, '123456789', '', '', 'ABCD12345', '2015-03-11 21:45:35'),
(16, 'Cliente 11', 'Dirección 11', '11@email.com', 1, '2', '', '', 'ABCD12345', '2015-03-11 21:45:55'),
(17, 'Fernanda Martinez', 'Lagasca 95', 'fer@gmail.com', 56567898, '55', '', '', 'r', '2015-03-13 19:20:24'),
(18, 'Pablo Rivera Sierra', 'Fujiyma 115', 'pablo@bipme.co', 55678987, '5530093608', '', '', 'RISP890619HH9', '2015-03-18 18:02:32'),
(19, 'Pablo Rivera Sierra', '37 W 24th Street', 'priveras@address.com', 1871927, '918271927', 'alshasas', 'alshasas', 'alshasas', '2015-04-05 19:37:38'),
(20, 'Pablo Rivera lakjsa', '9879', 'priveras@address.com2', 92372, '9879', 'pered', 'pered', 'pered', '2015-04-05 19:39:17'),
(21, 'Pablo Rivera lakjsa', '987', 'lkjl@gmail.com', 3349, '9879', '987', '987', '987', '2015-04-21 00:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `clients_program`
--

CREATE TABLE `clients_program` (
`id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `clients_program`
--

INSERT INTO `clients_program` (`id`, `client_id`, `program`, `created_at`) VALUES
(1, 1, 'OnDetox', '2015-03-11 20:08:15'),
(2, 2, 'MiniOnDetox', '2015-03-11 20:09:26'),
(3, 3, 'Intolerancia', '2015-03-11 20:10:22'),
(4, 4, 'Consulta', '2015-03-11 20:16:27'),
(5, 5, 'OnDetox', '2015-03-11 20:31:02'),
(6, 6, 'MiniOnDetox', '2015-03-11 20:33:18'),
(7, 7, 'Intolerancia', '2015-03-11 20:36:43'),
(8, 8, 'MiniOnDetox', '2015-03-11 20:50:32'),
(9, 9, 'Cavitacion', '2015-03-11 20:52:28'),
(10, 10, 'Intolerancia', '2015-03-11 21:42:58'),
(11, 11, 'Intolerancia', '2015-03-11 21:43:20'),
(12, 12, 'Cavitacion', '2015-03-11 21:43:47'),
(13, 13, 'MiniOnDetox', '2015-03-11 21:44:40'),
(14, 14, 'Consulta', '2015-03-11 21:45:11'),
(15, 15, 'OnDetox', '2015-03-11 21:45:35'),
(16, 16, 'MiniOnDetox', '2015-03-11 21:45:55'),
(17, 17, 'Consulta', '2015-03-13 19:20:24'),
(18, 18, 'OnDetox', '2015-03-18 18:02:32'),
(19, 20, 'MiniOnDetox', '2015-04-05 19:39:17'),
(20, 21, '0', '2015-04-21 00:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
`id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `category` varchar(255) NOT NULL,
  `payment` int(11) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `client_id`, `appointment_id`, `datetime`, `category`, `payment`, `payment_status`, `payment_type`) VALUES
(1, 3, 1, '2015-03-11 14:45:00', 'intolerance', 300, 'Pagado', 'Efectivo'),
(2, 6, 2, '2015-03-11 14:46:00', 'juices', 0, 'Pagado', 'Efectivo'),
(3, 4, 3, '2015-03-11 14:46:00', 'consultation', 0, 'Pagado', 'Efectivo'),
(4, 3, 4, '2015-03-13 21:37:00', 'intolerance', 500, 'Pagado', 'Efectivo'),
(5, 12, 5, '2015-03-12 12:50:00', 'cavitation', 800, 'Pagado', 'Efectivo'),
(6, 17, 6, '2015-03-13 13:23:00', 'consultation', 0, 'Pagado', 'Efectivo'),
(7, 17, 7, '2015-03-13 13:23:00', 'consultation', 800, 'Pagado', 'Efectivo'),
(8, 17, 8, '2015-03-13 13:24:00', 'consultation', 800, 'Pagado', 'Efectivo'),
(9, 17, 9, '2015-03-13 13:24:00', 'consultation', 600, 'Pagado', 'Efectivo'),
(10, 3, 10, '2015-03-13 13:24:00', 'intolerance', 1500, 'Pagado', 'Efectivo'),
(11, 15, 11, '2015-03-18 13:46:00', 'intolerance', 2, 'Pagado', 'Efectivo'),
(12, 3, 12, '2015-03-18 19:00:00', 'intolerance', 200, 'Pagado', 'Efectivo'),
(13, 15, 13, '2015-03-18 20:27:00', 'juices', 200, 'Pagado', 'Efectivo'),
(14, 14, 14, '2015-03-18 20:38:00', 'consultation', 200, 'Pagado', 'Efectivo'),
(15, 3, 15, '2015-03-25 20:52:00', 'intolerance', 200, 'Pagado', 'Efectivo'),
(16, 6, 16, '2015-03-18 20:57:00', 'juices', 2, 'Pagado', 'Efectivo'),
(17, 9, 17, '2015-03-19 14:59:00', 'cavitation', 0, 'Pagado', 'Efectivo'),
(18, 3, 18, '2015-03-19 15:10:00', 'intolerance', 1, 'Pagado', 'Efectivo'),
(19, 12, 19, '2015-03-22 15:13:00', 'cavitation', 1, '1', '1'),
(20, 12, 20, '2015-03-22 15:20:00', 'cavitation', 1, '1', '1'),
(21, 12, 21, '2015-03-22 15:21:00', 'cavitation', 1, '1', '1'),
(22, 12, 22, '2015-03-22 15:42:00', 'cavitation', 0, '1', '1'),
(23, 9, 23, '2015-03-22 15:42:00', 'cavitation', 0, '1', '1'),
(24, 9, 24, '2015-03-22 15:44:00', 'cavitation', 0, '1', '1'),
(25, 3, 25, '2015-03-22 15:50:00', 'intolerance', 0, 'Pagado', 'Efectivo'),
(26, 3, 26, '2015-03-22 15:50:00', 'intolerance', 0, 'Pagado', 'Efectivo'),
(27, 3, 27, '2015-03-22 15:55:00', 'intolerance', 200, 'Pagado', 'Efectivo'),
(28, 3, 28, '2015-04-05 14:55:00', 'cavitation', 900, 'Pagado', 'Efectivo'),
(29, 3, 29, '2015-04-05 14:55:00', 'juices', 300, 'Pagado', 'Efectivo'),
(30, 3, 30, '2015-04-05 14:56:00', 'consultation', 200, 'Pagado', 'Efectivo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_program`
--
ALTER TABLE `clients_program`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `clients_program`
--
ALTER TABLE `clients_program`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;