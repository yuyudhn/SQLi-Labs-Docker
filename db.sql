-- Create the database
CREATE DATABASE IF NOT EXISTS evangelion_sqli;

-- Switch to the created database
USE evangelion_sqli;

-- Drop existing tables if they exist
DROP TABLE IF EXISTS `Users`;
DROP TABLE IF EXISTS `Info`;

CREATE TABLE IF NOT EXISTS `Users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(100) DEFAULT NULL,
  `Age` INT(11) DEFAULT NULL,
  `Rank` VARCHAR(50) DEFAULT NULL,
  `Email` VARCHAR(100) DEFAULT NULL,
  `Password` VARCHAR(100) DEFAULT NULL,
  `Unit` VARCHAR(100) DEFAULT NULL,
  `Bio` TEXT DEFAULT NULL,  
  `Img` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into Users table
INSERT INTO `Users` (`id`, `Name`, `Age`, `Rank`, `Email`, `Password`, `Unit`, `Bio`, `Img`) VALUES
(1, 'Rei Ayanami', 14, 'First Child', 'rei@eva.nerv', 'Rei@Pssword', 'EVA-00', 'Rei Ayanami was the product of Gendo Ikari and Kozo Fuyutsuki attempt to retrieve Yui Ikari from Eva-01 using her salvaged remains. This attempt failed. On some level, Rei Ayanami may incorporate DNA from the Second Angel, Lilith, because she is the vessel for Lilith\'s soul. Rei Ayanami was created sometime between 2004 and 2010, as suggested by her appearance in Episode 21. Seen in 2010, she has the physical appearance of a small child, perhaps around four or five years old.', '/img/rei.jpeg'),
(2, 'Asuka Soryu', 14, 'Second Child', 'asuka@eva.nerv', 'SuperSecureP@ssword', 'EVA-02', 'Asuka is named after two warships, one Japanese, the Aircraft Carrier Soryu, the other U.S., the USS Langley. For more information on how Asuka and the other characters were named, see Character Name Origins. Asuka\'s surname is spelled differently from the name of the warship Soryu(蒼龍). The warship\'s name literally means "Green Dragon", but Asuka\'s name contains characters for "All" and "flow/flux/current/stream". No explanation has been given for the difference in name.', '/img/asuka.jpg'),
(3, 'Ikari Shinji', 14, 'Third Child', 'shinji@eva.nerv', 'ShinjiTheEdgyL0rd', 'EVA-01', 'Shinji Ikari is the main protagonist of Neon Genesis Evangelion and the designated pilot of Evangelion Unit-01. Much of the story of Evangelion centers around Shinji\'s personal struggles, both with piloting Eva and with his relationships with others.', '/img/shinji.jpg');

-- Create Info table
CREATE TABLE IF NOT EXISTS `Info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `InfoText` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into Info table
INSERT INTO `Info` (`InfoText`) VALUES ('SQL Injection Practice by LinuxSec');

-- Create user 'eva' with password 'eva12345'
CREATE USER IF NOT EXISTS 'eva'@'localhost' IDENTIFIED BY 'eva12345';

-- Grant privileges to the user on the database
GRANT ALL ON *.* TO 'eva'@'localhost';

-- Flush privileges
FLUSH PRIVILEGES;
