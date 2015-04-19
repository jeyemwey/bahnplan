-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Apr 2015 um 19:58
-- Server Version: 5.6.20
-- PHP-Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `bahnplan`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fellows`
--

CREATE TABLE IF NOT EXISTS `fellows` (
`id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `twittername` varchar(50) NOT NULL,
  `avatar_url` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Daten für Tabelle `fellows`
--

INSERT INTO `fellows` (`id`, `trip_id`, `twittername`, `avatar_url`) VALUES
(1, 1, 'prtyengopls', 'http://pbs.twimg.com/profile_images/587729315451789312/utJqObRq_normal.jpg'),
(2, 1, 'itobi_yt', 'http://pbs.twimg.com/profile_images/587689069750181888/adQN1J-F_normal.jpg'),
(45, 1, 'woelfch3n', 'http://pbs.twimg.com/profile_images/587280650903797760/0IuWTK_x_normal.jpg'),
(54, 1, 'ard', 'http://pbs.twimg.com/profile_images/1282069722/eightbit-a84b401b-0e66-40d5-bae5-949d5eddd3b9_normal.png'),
(55, 2, 'matekind', 'http://pbs.twimg.com/profile_images/550633384691924992/J7pwBRIh_normal.jpeg'),
(56, 2, 'nzudemadine', 'http://pbs.twimg.com/profile_images/582958050249719808/F4MNx2tx_normal.jpg'),
(58, 4, 'huui_buu', 'http://pbs.twimg.com/profile_images/530074052460023810/D4iyuhVr_normal.jpeg'),
(59, 5, 'gronkh', 'http://pbs.twimg.com/profile_images/586460159876018176/5Wd0-VWE_normal.jpg'),
(60, 5, 'dnertv', 'http://pbs.twimg.com/profile_images/2400025727/6cxwu485g7s54p9iyn17_normal.jpeg'),
(61, 5, 'janboehmermann', 'http://pbs.twimg.com/profile_images/533256704713302016/yBXp08ll_normal.jpeg'),
(62, 1, 'jessisadancer', 'http://pbs.twimg.com/profile_images/586655753299173376/QQ6U-aXJ_normal.jpg'),
(63, 4, 'jessisadancer', 'http://pbs.twimg.com/profile_images/586655753299173376/QQ6U-aXJ_normal.jpg'),
(64, 5, 'zdf', 'http://pbs.twimg.com/profile_images/558300642641342464/qBT9XFt1_normal.png'),
(65, 5, 'ard', 'http://pbs.twimg.com/profile_images/1282069722/eightbit-a84b401b-0e66-40d5-bae5-949d5eddd3b9_normal.png'),
(66, 5, 'prosieben', 'http://pbs.twimg.com/profile_images/563479641386930176/wezbbzpj_normal.jpeg'),
(71, 5, 'sat1', 'http://pbs.twimg.com/profile_images/1497994582/SAT1_3D_BM_CMYK_Voransicht_normal.jpg'),
(72, 5, 'newtopia', 'http://pbs.twimg.com/profile_images/378800000825469422/71a58a9786f378050ad6c4f2dcd4f995_normal.png'),
(73, 5, 'ie', 'http://pbs.twimg.com/profile_images/378800000859413957/H7zBWwEm_normal.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `trips`
--

CREATE TABLE IF NOT EXISTS `trips` (
`id` int(11) NOT NULL,
  `checked` tinyint(1) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `marker_address` varchar(100) NOT NULL,
  `marker_coords` varchar(100) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `trips`
--

INSERT INTO `trips` (`id`, `checked`, `Title`, `date_start`, `date_end`, `marker_address`, `marker_coords`, `Description`) VALUES
(1, 1, 'Berlin', '2015-07-11', '2015-07-11', 'Potsdamer Platz, Berlin', '52.5093519, 13.3757392', '[#twerlin](http://vite.io/twerlin5)'),
(2, 1, 'Hamburg', '2015-07-16', '2015-07-18', 'Jungfernstieg, Hamburg', '53.5536475, 9.9919413', 'Wir besuchen die sch&ouml;ne Hafenstadt!'),
(4, 1, 'Kempen', '2015-03-16', '2015-03-16', 'Buttermarkt, Kemepn', '51.3641811, 6.4182632', '*Home!*'),
(5, 1, 'K&ouml;ln', '2015-04-09', '2015-04-20', 'K&ouml;lner Dom', '50.9412784, 6.9582814', 'Cologne, Cologne!');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hash` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `hash`) VALUES
(1, 'Jannik', 'jannik', 'e10adc3949ba59abbe56e057f20f883e', '$1$be..Ih/.$9AauXRreShNPCbqxg1/lC1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fellows`
--
ALTER TABLE `fellows`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
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
-- AUTO_INCREMENT for table `fellows`
--
ALTER TABLE `fellows`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
