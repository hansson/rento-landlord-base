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
  `object` varchar(64) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `interest` (
  `name` varchar(64) DEFAULT NULL,
  `socialSecurity` varchar(11) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `postalNumber` varchar(10) DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `company` varchar(64) DEFAULT NULL,
  `trade` varchar(64) DEFAULT NULL,
  `smoker` varchar(3) DEFAULT NULL,
  `animals` varchar(3) DEFAULT NULL,
  `yearlyIncome` varchar(10) DEFAULT NULL,
  `singleApplicant` varchar(3) DEFAULT NULL,
  `apartmentId` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;