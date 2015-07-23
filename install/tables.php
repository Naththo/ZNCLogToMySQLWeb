<?PHP

if (!defined("IN_INSTALL"))
{
  die("No access.");
}

$tables[] = "CREATE TABLE IF NOT EXISTS `chatlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `znc_user` varchar(50) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `target` varchar(50) DEFAULT NULL,
  `nick` varchar(50) DEFAULT NULL,
  `identhost` varchar(70) DEFAULT NULL,
  `timestamp` varchar(50) DEFAULT NULL,
  `message` text,
  KEY `Index 1` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$tables[] = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL DEFAULT '0',
  `user_key` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

?>