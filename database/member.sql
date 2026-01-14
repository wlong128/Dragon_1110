-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-01-14 13:05:10
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `dragon1101`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `member_id` varchar(20) NOT NULL,
  `member_pw` varchar(255) NOT NULL,
  `member_name` varchar(20) NOT NULL,
  `member_tel` varchar(20) NOT NULL,
  `member_address` varchar(255) NOT NULL,
  `member_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`member_id`, `member_pw`, `member_name`, `member_tel`, `member_address`, `member_created`) VALUES
('amy', '$2y$10$UymrtneF76Tx9pgo3Dug6u9aCIkWmvawSsJWUjMf4BiyUjH.KBD5G', 'Amy Lin', '0987456321', '台北市', '2026-01-05 21:55:25'),
('dragon', '$2y$10$tzKcs02tzmOZ0CPeovlEjuni35oMpg/prFFDc3e5UzoR6bMMvmqd.', 'Dragon Wu', '0963214587', '新北市三重區', '2026-01-05 21:28:14'),
('tom', '$2y$10$Nkvp4HMqyk2hcUgEp/OzMegNMniPFR8b1HHHnFiy/ji/k7xhIpgHG', 'Tom', '123465789', 'test', '2026-01-05 22:12:48'),
('wlong', '$2y$10$T7QrHZ/TQQdG/p0vhSWDfOzQvb3RKLx8WqDIs3Fu3hLIMIeJicLVq', 'test', 'asertwaet', 'qweygwehg', '2026-01-05 21:02:39');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
