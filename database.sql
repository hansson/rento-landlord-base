CREATE TABLE `apartments` (
  `address` varchar(64) DEFAULT NULL,
  `rent` varchar(16) DEFAULT NULL,
  `size` varchar(16) DEFAULT NULL,
  `rooms` varchar(16) DEFAULT NULL,
  `floor` varchar(16) DEFAULT NULL,
  `elevator` varchar(3) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `area` varchar(64) DEFAULT NULL,
  `freeFrom` varchar(32) DEFAULT NULL,
  `summary` text,
  `imageName` varchar(64) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;