-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-01-14 13:03:01
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
-- 資料表結構 `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(20) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_subject` varchar(100) NOT NULL,
  `contact_message` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_phone`, `contact_email`, `contact_subject`, `contact_message`, `created`) VALUES
(1, '1111', '22222222', '333@yahoo.com', 'subject', 'message', '2026-01-12 20:16:11'),
(2, 'Dragon', '0986321456', 'wlong@yahoo.com.tw', '我要買電腦', '我需要有GPU功能的電腦', '2026-01-12 20:16:33'),
(3, '巫大龍', '0932147896', 'dragon@gmail.com', '幫我規劃網路', '我們公司需要做整體網路的規劃，請連絡我， 謝謝', '2026-01-12 20:45:52');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
