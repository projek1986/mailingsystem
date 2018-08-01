-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Sie 2018, 15:30
-- Wersja serwera: 10.1.34-MariaDB
-- Wersja PHP: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mailing_new`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin_log`
--

CREATE TABLE `admin_log` (
  `id` int(11) NOT NULL,
  `login` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `admin_log`
--

INSERT INTO `admin_log` (`id`, `login`, `pass`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `title_projekt` varchar(250) NOT NULL,
  `title_msg` varchar(250) NOT NULL,
  `content_msg` text NOT NULL,
  `file_content` varchar(250) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `msg`
--

INSERT INTO `msg` (`id`, `title_projekt`, `title_msg`, `content_msg`, `file_content`, `create_date`, `status`) VALUES
(1, 'Test', 'test msg', '<p>test</p>', 'index.html', '2018-08-01 00:00:00', 1),
(2, '', 'test dodawania', '<p><strong>test dodawania</strong></p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: center;\"><strong>test dodawania</strong></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center; padding-left: 30px;\"><span style=\"text-decoration: underline;\"><strong>test dodawania</strong></span></p>\r\n<p style=\"text-align: center; padding-left: 30px;\"><span style=\"text-decoration: underline;\"><strong>test dodawania</strong></span></p>\r\n<p style=\"text-align: center; padding-left: 30px;\"><span style=\"text-decoration: underline;\"><strong>test dodawania</strong></span></p>', '', '2018-08-01 00:00:00', 1),
(3, 'test dodawania', 'test dodawania', '<p><strong>test dodawania</strong></p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: center;\"><strong>test dodawania</strong></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center; padding-left: 30px;\"><span style=\"text-decoration: underline;\"><strong>test dodawania</strong></span></p>\r\n<p style=\"text-align: center; padding-left: 30px;\"><span style=\"text-decoration: underline;\"><strong>test dodawania</strong></span></p>\r\n<p style=\"text-align: center; padding-left: 30px;\"><span style=\"text-decoration: underline;\"><strong>test dodawania</strong></span></p>', '', '2018-08-01 10:54:00', 1),
(4, 'test dodawania', 'test dodawania', '', 'mailing.html', '2018-08-01 11:53:00', 1),
(5, 'test dodawania22', 'test dodawania2222', '', 'mailing.html', '2018-08-01 11:59:00', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `msgfile`
--

CREATE TABLE `msgfile` (
  `id` int(11) NOT NULL,
  `namefile` varchar(250) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `msgfile`
--

INSERT INTO `msgfile` (`id`, `namefile`, `msg_id`, `status`) VALUES
(1, 'Chrysanthemum.jpg', 1, 1),
(2, 'Hydrangeas.jpg', 1, 1),
(3, 'F:xampp	mpphpE7E6.tmp', 2, 1),
(4, 'F:xampp	mpphpE7F7.tmp', 2, 1),
(5, 'Desert.jpg', 3, 1),
(6, 'Tulips.jpg', 3, 1),
(7, '', 4, 1),
(8, 'POIR_235 prezentacja AG.pdf', 5, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `msgimages`
--

CREATE TABLE `msgimages` (
  `id` int(11) NOT NULL,
  `namefile` varchar(250) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `msgimages`
--

INSERT INTO `msgimages` (`id`, `namefile`, `msg_id`, `status`) VALUES
(1, '19_marca.png', 1, 1),
(2, 'fb.png', 1, 1),
(3, 'visa_header.png', 1, 1),
(4, '1-01.jpg', 4, 1),
(5, '2-01.jpg', 4, 1),
(6, '3-01.jpg', 4, 1),
(7, '4-06.jpg', 4, 1),
(8, 'bottom-1.jpg', 4, 1),
(9, 'bottom-2.jpg', 4, 1),
(10, 'bottom-3.jpg', 4, 1),
(11, 'publikacje.jpg', 4, 1),
(12, 'read-1.jpg', 4, 1),
(13, 'read-2.jpg', 4, 1),
(14, 'top.jpg', 4, 1),
(15, 'wiecej.jpg', 4, 1),
(16, 'wyklady.jpg', 4, 1),
(17, '1-01.jpg', 5, 1),
(18, '2-01.jpg', 5, 1),
(19, '3-01.jpg', 5, 1),
(20, '4-06.jpg', 5, 1),
(21, 'bottom-1.jpg', 5, 1),
(22, 'bottom-2.jpg', 5, 1),
(23, 'bottom-3.jpg', 5, 1),
(24, 'publikacje.jpg', 5, 1),
(25, 'read-1.jpg', 5, 1),
(26, 'read-2.jpg', 5, 1),
(27, 'top.jpg', 5, 1),
(28, 'wiecej.jpg', 5, 1),
(29, 'wyklady.jpg', 5, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `sub_grup_id` int(11) NOT NULL,
  `send_status` int(11) NOT NULL,
  `start_at` datetime NOT NULL,
  `stop_at` datetime NOT NULL,
  `part_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `data_create` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `sub_grup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `email`, `data_create`, `status`, `sub_grup`) VALUES
(1, 'asvav', 'rojek.przemek@gmail.com', '0000-00-00 00:00:00', 1, 1),
(2, 'asvav', 'rojek.przemek2@gmail.com', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sub_grup`
--

CREATE TABLE `sub_grup` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(250) NOT NULL,
  `data_create` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `sub_grup`
--

INSERT INTO `sub_grup` (`id`, `nazwa`, `data_create`, `status`) VALUES
(1, 'test', '2018-08-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sub_send_info`
--

CREATE TABLE `sub_send_info` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `group_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `send` int(11) NOT NULL,
  `data_create` datetime NOT NULL,
  `error` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `data_wys` datetime NOT NULL,
  `data_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `sub_send_info`
--

INSERT INTO `sub_send_info` (`id`, `email`, `group_id`, `msg_id`, `send`, `data_create`, `error`, `status`, `data_wys`, `data_update`) VALUES
(1, 'rojek.przemek2@gmail.com', 1, 5, 1, '2018-08-01 15:05:00', '', 1, '2018-08-01 15:05:26', '0000-00-00 00:00:00'),
(2, 'rojek.przemek@gmail.com', 1, 5, 1, '2018-08-01 15:05:00', '', 1, '2018-08-01 15:05:40', '0000-00-00 00:00:00'),
(3, 'rojek.przemek2@gmail.com', 1, 5, 1, '2018-08-01 15:11:00', '', 1, '2018-08-01 15:11:39', '0000-00-00 00:00:00'),
(4, 'rojek.przemek@gmail.com', 1, 5, 1, '2018-08-01 15:11:00', '', 1, '2018-08-01 15:11:53', '0000-00-00 00:00:00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `msgfile`
--
ALTER TABLE `msgfile`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `msgimages`
--
ALTER TABLE `msgimages`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sub_grup`
--
ALTER TABLE `sub_grup`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sub_send_info`
--
ALTER TABLE `sub_send_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `msgfile`
--
ALTER TABLE `msgfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `msgimages`
--
ALTER TABLE `msgimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT dla tabeli `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `sub_grup`
--
ALTER TABLE `sub_grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `sub_send_info`
--
ALTER TABLE `sub_send_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
