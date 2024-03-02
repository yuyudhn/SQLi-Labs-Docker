-- Create the database
CREATE DATABASE IF NOT EXISTS evangelion_sqli;

-- Switch to the created database
USE evangelion_sqli;

-- Drop existing tables if they exist
DROP TABLE IF EXISTS `Users`;
DROP TABLE IF EXISTS `Info`;

-- Create Users table
CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Rank` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into Users table
INSERT INTO `Users` (`id`, `Name`, `Age`, `Rank`, `Email`, `Password`) VALUES
(1, 'Rei Ayanami', 14, 'First Child', 'rei@eva.nerv', 'Rei@Pssword'),
(2, 'Asuka Soryu', 14, 'Second Child', 'asuka@eva.nerv', 'SuperSecureP@ssword'),
(3, 'Ikari Shinji', 14, 'Third Child', 'shinji@eva.nerv', 'ShinjiTheEdgyL0rd');

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
