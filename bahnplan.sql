SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `fellows` (
`id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `twittername` varchar(50) NOT NULL,
  `avatar_url` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Daten für Tabelle `fellows`
--

INSERT INTO `fellows` (`id`, `trip_id`, `twittername`, `avatar_url`) VALUES
(1, 1, 'prtyengopls', 'https://pbs.twimg.com/profile_images/551009297615052800/cQvManJj_normal.jpeg'),
(2, 1, 'itobi_yt', 'https://pbs.twimg.com/profile_images/536629347785121793/DYb9DjWa_normal.jpeg'),
(3, 1, 'jessisadancer', 'https://pbs.twimg.com/profile_images/531402007769522176/Qgm4v-Ts_normal.jpeg'),
(38, 1, 'ie', 'http://pbs.twimg.com/profile_images/378800000859413957/H7zBWwEm_normal.png'),
(40, 4, 'anredo', 'http://pbs.twimg.com/profile_images/491636512128503808/LvgA0O01_normal.jpeg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `infos`
--

CREATE TABLE IF NOT EXISTS `infos` (
`id` int(11) NOT NULL,
  `property` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `infos`
--

INSERT INTO `infos` (`id`, `property`, `content`) VALUES
(1, 'title', 'Janniks Bahnplan'),
(2, 'footer', 'Created with &hearts; in Germany. Checkout the source on [<i class="fa fa-github"></i> Github](https://github.com/jeyemwey/bahnplan). [Admin](admin)');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `trips`
--

CREATE TABLE IF NOT EXISTS `trips` (
`id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `marker_address` varchar(100) NOT NULL,
  `marker_coords` varchar(100) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `trips`
--

INSERT INTO `trips` (`id`, `Title`, `date_start`, `date_end`, `marker_address`, `marker_coords`, `Description`) VALUES
(1, 'Berlin', '2015-07-11', '2015-07-11', 'Potsdamer Platz, Berlin', '52.5093520, 13.3757390', '[#twerlin](http://vite.io/twerlin5)'),
(2, 'Hamburg', '2015-07-16', '2015-07-18', 'Jungfernstieg, Hamburg', '53.5536475, 9.9919413', 'Wir besuchen die sch&ouml;ne Hafenstadt!'),
(4, 'Kempen', '2015-03-16', '2015-03-16', 'Buttermarkt, Kemepn', '51.3641811, 6.4182632', '*Home!*'),
(5, 'K&ouml;lle', '2015-04-09', '2015-04-20', 'K&ouml;lner Dom', '50.9412784, 6.9582814', 'Cologne, Cologne, die schei&szlig;e vom Dom!');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hash` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `hash`) VALUES
(1, 'jannik', 'e10adc3949ba59abbe56e057f20f883e', 'HASH');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fellows`
--
ALTER TABLE `fellows`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
