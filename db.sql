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
(1, 'Rei Ayanami', 14, 'First Child', 'rei@eva.nerv', 'Rei@Pssword', 'EVA-00', 'Ayanami Rei is the First Child and pilot of Evangelion Unit-00. She is quiet, enigmatic, and emotionally distant, often appearing indifferent to her own well-being and to the world around her. Rei follows orders without question and maintains a close, almost inexplicable connection to Commander Ikari, showing a rare sense of loyalty that others find difficult to understand. Despite her cold exterior, there are moments where she displays unexpected warmth and curiosity, particularly in her evolving interactions with Ikari Shinji. She seems to struggle with understanding emotions and her own identity, as if she\'s observing humanity from a distance rather than truly being part of it. Beneath her calm surface lies a deep complexity that few truly grasp, making her presence both unsettling and quietly compelling.', '/img/rei.jpeg'),
(2, 'Asuka Soryu', 14, 'Second Child', 'asuka@eva.nerv', 'SuperSecureP@ssword', 'EVA-02', 'Asuka Langley Soryu is one of the central characters in Neon Genesis Evangelion, serving as the designated pilot of Evangelion Unit-02. A fiery and headstrong teenage girl of mixed German and Japanese heritage, Asuka is renowned for her intelligence, pride, and combative nature. She graduated from university at an early age and views herself as a prodigy, often masking her emotional vulnerabilities with arrogance and aggression.', '/img/asuka.jpg'),
(3, 'Ikari Shinji', 14, 'Third Child', 'shinji@eva.nerv', 'ShinjiTheEdgyL0rd', 'EVA-01', 'Ikari Shinji is the designated pilot of Evangelion Unit-01 and the son of Commander Ikari. He is quiet, reserved, and often avoids confrontation, preferring to keep his feelings to himself. Though not naturally inclined toward leadership or combat, Shinji consistently answers the call to pilot under extreme pressure, showing a surprising level of resilience despite his hesitations. He tends to internalize guilt and blame, especially when others are hurt, which makes him emotionally fragile but also deeply empathetic. Shinji struggles with a profound need for acceptance and a place to belong, often finding himself torn between the fear of rejection and the pain of human connection. His relationships with fellow pilots and NERV staff—especially Ayanami, Asuka, and his father—are complicated and often strained, but they reveal his underlying desire to be seen and understood.', '/img/shinji.jpg');

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
