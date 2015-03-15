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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

INSERT INTO `fellows` (`id`, `trip_id`, `twittername`, `avatar_url`) VALUES
(1, 1, 'prtyengopls', 'https://pbs.twimg.com/profile_images/551009297615052800/cQvManJj_bigger.jpeg'),
(2, 1, 'itobi_yt', 'https://pbs.twimg.com/profile_images/536629347785121793/DYb9DjWa_bigger.jpeg'),
(3, 1, 'jessisadancer', 'https://pbs.twimg.com/profile_images/531402007769522176/Qgm4v-Ts_normal.jpeg'),
(4, 2, 'jessisadancer', 'https://pbs.twimg.com/profile_images/531402007769522176/Qgm4v-Ts_normal.jpeg'),
(5, 2, 'woelfch3n', 'https://pbs.twimg.com/profile_images/572073709751689216/xCaw-HOT_bigger.jpeg');

CREATE TABLE IF NOT EXISTS `infos` (
`id` int(11) NOT NULL,
  `property` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `infos` (`id`, `property`, `content`) VALUES
(1, 'title', 'Janniks Bahnplan'),
(2, 'footer', 'Created with &hearts; in Germany. Checkout the source on [<i class="fa fa-github"></i> Github](https://github.com/jeyemwey/bahnplan).');

CREATE TABLE IF NOT EXISTS `trips` (
`id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `marker_address` varchar(100) NOT NULL,
  `marker_coords` varchar(100) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `trips` (`id`, `Title`, `date_start`, `date_end`, `marker_address`, `marker_coords`, `Description`) VALUES
(1, 'Berlin', '2015-07-11', '2015-07-11', 'Potsdamer Platz, Berlin', '52.5093520, 13.3757390', '[#twerlin](http://vite.io/twerlin5)'),
(2, 'Hamburg', '2015-07-16', '2015-07-18', 'Jungfernstieg, Hamburg', '53.5537365, 9.9927808', 'Wir besuchen die Hafenstadt!');


ALTER TABLE `fellows`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `infos`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `trips`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `fellows`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
ALTER TABLE `infos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
ALTER TABLE `trips`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
