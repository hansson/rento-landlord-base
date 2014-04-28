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
  `yearlyIncome` varchar(16) DEFAULT NULL,
  `singleApplicant` varchar(3) DEFAULT NULL,
  `apartmentId` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `error_report` (
  `name` varchar(64) DEFAULT NULL,
  `socialSecurity` varchar(11) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `apartmentNumber` varchar(16) DEFAULT NULL,
  `masterKeyAllowed` varchar(3) DEFAULT NULL,
  `summary` text,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `contacts` (
  `name` varchar(64) DEFAULT NULL,
  `position` varchar(64) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `imageName` varchar(64) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `areas` (
  `name` varchar(64) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image1` varchar(16) DEFAULT NULL,
  `image2` varchar(64) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE `info` (
  `name` varchar(32) NOT NULL,
  `value` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `info` (name, value) VALUES ('contact','');
INSERT INTO `info` (name, value) VALUES ('rules','');
INSERT INTO `info` (name, value) VALUES ('move_in','');
INSERT INTO `info` (name, value) VALUES ('move_out','');