-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022-07-06 18:04:38
-- 伺服器版本： 5.7.26
-- PHP 版本： 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `yii2`
--

-- --------------------------------------------------------

--
-- 資料表結構 `supplier`
--

CREATE TABLE `supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `code` char(3) CHARACTER SET ascii DEFAULT NULL,
  `t_status` enum('ok','hold') CHARACTER SET ascii NOT NULL DEFAULT 'ok'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `code`, `t_status`) VALUES
(1, 'user1', '111', 'ok'),
(2, 'test2', '222', 'ok'),
(3, 'user3', '333', 'ok'),
(4, 'test4', '444', 'ok'),
(5, 'user5', '555', 'ok'),
(6, 'test6', '666', 'hold'),
(7, 'user7', '777', 'ok'),
(8, 'user8', '888', 'hold'),
(9, 'user9', '999', 'ok'),
(10, 'user10', '000', 'ok'),
(11, 'user11', '001', 'ok'),
(12, 'test12', '002', 'hold'),
(13, 'user13', '003', 'hold'),
(14, 'user14', '004', 'ok'),
(15, 'user15', '005', 'ok'),
(16, 'user16', '006', 'ok'),
(17, 'user17', '007', 'ok'),
(18, 'user18', '008', 'ok'),
(19, 'user19', '009', 'hold'),
(20, 'user20', '010', 'ok'),
(21, 'user21', '021', 'ok'),
(22, 'user22', '022', 'ok'),
(23, 'user23', '023', 'hold'),
(24, 'user24', '024', 'ok'),
(25, 'user25', '025', 'ok');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_code` (`code`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
