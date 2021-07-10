-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2021 年 7 朁E10 日 10:05
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arsenal_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `player_master`
--

CREATE TABLE IF NOT EXISTS `player_master` (
`p_id` int(11) NOT NULL,
  `number` tinyint(12) DEFAULT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `age` tinyint(2) DEFAULT NULL,
  `country` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` int(16) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `p_status` tinyint(2) NOT NULL,
  `p_img` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `player_master`
--

INSERT INTO `player_master` (`p_id`, `number`, `name`, `birth`, `age`, `country`, `position`, `value`, `comment`, `p_status`, `p_img`, `indate`) VALUES
(1, 1, 'B.Leno', '1992-05-04', 29, 'DEU', 'GK', 2200, 'アーセナルの正守護神', 0, NULL, NULL),
(2, 13, 'R.Runarsson', '1995-02-18', 26, 'NOR', 'GK', 150, '得になし', 0, NULL, NULL),
(3, 33, 'M.Ryan', '1992-08-08', 29, 'AUS', 'GK', 600, '特になし', 0, NULL, NULL),
(8, 6, 'Gabriel', '1997-02-18', 24, 'BRA', 'DF', 2500, '', 0, NULL, NULL),
(9, 16, 'R.Holding', '1995-09-20', 25, 'ENG', 'DF', 1800, '', 0, NULL, NULL),
(24, 21, 'C.Chambers', '1995-01-20', 26, 'ENG', 'DF', 1200, '', 0, NULL, NULL),
(25, 22, 'P.Mari', '1993-08-31', 27, 'SPN', 'DF', 700, '特になし', 0, NULL, NULL),
(27, 3, 'K.Tierney', '1997-06-05', 24, 'SCT', 'DF', 3200, '', 0, NULL, NULL),
(28, 31, 'S.kolasinac', '1993-06-20', 28, 'GER', 'DF', 650, '', 0, NULL, NULL),
(29, 2, 'H.Bellerin', '1995-05-19', 26, 'SPN', 'DF', 2500, '', 0, NULL, NULL),
(30, 17, 'C.Soares', '1991-08-31', 29, 'POR', 'DF', 600, '', 0, NULL, NULL),
(31, 5, 'T.Partey', '1993-06-13', 28, 'GNA', 'MF', 4000, '', 0, NULL, NULL),
(32, 34, 'G.Xhaka', '1992-09-27', 28, 'CHE', 'MF', 2200, '', 0, NULL, NULL),
(33, 25, 'M.Elneny', '1992-06-11', 29, 'EPT', 'MF', 1000, '', 0, NULL, NULL),
(34, 28, 'J.Willock', '1999-08-20', 21, 'ENG', 'MF', 1600, '', 0, NULL, NULL),
(35, 15, 'A.Maitland-niles', '1997-08-29', 23, 'ENG', 'MF', 1600, '', 0, NULL, NULL),
(36, 7, 'B.saka', '2001-09-05', 19, 'ENG', 'MF', 6500, '', 0, NULL, NULL),
(37, 32, 'E.Smith rowe', '2000-07-28', 20, 'ENG', 'MF', 1800, '', 0, NULL, NULL),
(38, 35, 'G.Martinelli', '2001-06-18', 20, 'BRA', 'FW', 2200, '', 0, NULL, NULL),
(39, 19, 'N.Pepe', '1995-05-29', 26, 'CIV', 'FW', 3500, '', 0, NULL, NULL),
(40, 12, 'Willian', '1988-08-09', 32, 'BRA', 'FW', 900, '', 0, NULL, NULL),
(41, 14, 'P.E.Aubameyang', '1989-06-18', 32, 'GBN', 'FW', 2500, '', 0, NULL, NULL),
(42, 44, 'B.White', '1997-10-08', 23, 'ENG', 'DF', 4500, 'ユーロ2021　イングランド代表', 1, 'white.png', '2021-06-25'),
(43, 55, 'A.S.Lokonga', '1999-10-22', 21, 'BER', 'MF', 1200, '', 1, 'loconga.png', '2021-07-09'),
(44, 66, 'M.Locatelli', '1998-01-08', 23, 'ITA', 'MF', 3500, '', 1, 'locatelli.png', '2021-07-09'),
(45, 0, 'N.tavares', '2000-01-26', 21, 'POR', 'DF', 850, '', 1, NULL, '2021-07-10');

-- --------------------------------------------------------

--
-- テーブルの構造 `transfer_table`
--

CREATE TABLE IF NOT EXISTS `transfer_table` (
`tr_id` int(10) unsigned NOT NULL,
  `p_id` int(11) NOT NULL,
  `tr_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
`id` int(12) NOT NULL,
  `u_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `u_pw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `u_birth` date DEFAULT NULL,
  `u_age` tinyint(3) DEFAULT NULL,
  `u_player` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `life_flg` int(1) NOT NULL,
  `indate` datetime NOT NULL,
  `u_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `u_img` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user_master`
--

INSERT INTO `user_master` (`id`, `u_name`, `u_pw`, `email`, `u_birth`, `u_age`, `u_player`, `life_flg`, `indate`, `u_comment`, `u_img`) VALUES
(4, 'ジーズ太郎', '$2y$10$1HdkwGrx51zabVhVEqB7uODPDP5hXBnQfNCpxH2i8EFIdf4nN475S', 'test@g-s.jp', NULL, NULL, '', 0, '0000-00-00 00:00:00', '', NULL),
(6, '山田太郎', '$2y$10$tuUSasbBBBWi7U9y/RRwwO.kctB7xiOis0q0i.wpqtSGemBsBC3n6', 'test@test.jp', '1999-12-12', 21, 'アンリ', 0, '2021-07-06 13:40:38', 'よろしくお願いいたします！', 'profphoto2.jpg'),
(7, 'ジーズ二郎', '$2y$10$XWSGELV43BpXDBUN139hp.gawx9ljMGlOUZLSONximCa9RzD9FjHi', 'test3@test.jp', NULL, NULL, '', 0, '2021-07-10 06:54:34', '', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `value_table`
--

CREATE TABLE IF NOT EXISTS `value_table` (
`v_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `v_date` date NOT NULL,
  `p_value` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `value_table`
--

INSERT INTO `value_table` (`v_id`, `p_id`, `v_date`, `p_value`) VALUES
(1, 42, '2020-11-17', 2200),
(2, 42, '2021-05-18', 2500),
(3, 42, '2021-05-28', 2800),
(4, 43, '2020-10-16', 1000),
(5, 43, '2021-05-17', 1200),
(6, 43, '2021-06-07', 1200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player_master`
--
ALTER TABLE `player_master`
 ADD PRIMARY KEY (`p_id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `transfer_table`
--
ALTER TABLE `transfer_table`
 ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `value_table`
--
ALTER TABLE `value_table`
 ADD PRIMARY KEY (`v_id`), ADD KEY `p_id` (`p_id`), ADD KEY `p_id_2` (`p_id`), ADD KEY `p_id_3` (`p_id`), ADD KEY `p_name` (`p_id`), ADD KEY `p_id_4` (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `player_master`
--
ALTER TABLE `player_master`
MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `transfer_table`
--
ALTER TABLE `transfer_table`
MODIFY `tr_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `value_table`
--
ALTER TABLE `value_table`
MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `value_table`
--
ALTER TABLE `value_table`
ADD CONSTRAINT `value_table_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `player_master` (`p_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
