<?php


$link = mysqli_connect("localhost", "root", "");



// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}



// Attempt create database query execution

$sql = "
-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Lip 2018, 15:30
-- Wersja serwera: 10.1.34-MariaDB
-- Wersja PHP: 7.1.19

SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = \"+00:00\";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mailing_new`
--
CREATE DATABASE IF NOT EXISTS `mailing_new` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mailing_new`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin_log`
--

DROP TABLE IF EXISTS `admin_log`;
CREATE TABLE IF NOT EXISTS `admin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `admin_log`
--

INSERT INTO `admin_log` (`id`, `login`, `pass`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `msg`
--

DROP TABLE IF EXISTS `msg`;
CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_projekt` varchar(250) NOT NULL,
  `title_msg` varchar(250) NOT NULL,
  `content_msg` text NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_grup_id` int(11) NOT NULL,
  `send_status` int(11) NOT NULL,
  `start_at` datetime NOT NULL,
  `stop_at` datetime NOT NULL,
  `part_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `data_create` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `sub_grup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sub_grup`
--

DROP TABLE IF EXISTS `sub_grup`;
CREATE TABLE IF NOT EXISTS `sub_grup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(250) NOT NULL,
  `data_create` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sub_send_info`
--

DROP TABLE IF EXISTS `sub_send_info`;
CREATE TABLE IF NOT EXISTS `sub_send_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `group_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `send` int(11) NOT NULL,
  `data_create` datetime NOT NULL,
  `error` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `data_wys` datetime NOT NULL,
  `data_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


";

if(mysqli_query($link, $sql)){

    echo "Database created successfully";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}




// Close connection

mysqli_close($link);

?>

