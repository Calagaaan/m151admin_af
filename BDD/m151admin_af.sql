-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 04 Novembre 2015 à 12:54
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `m151admin_af`
--
CREATE DATABASE IF NOT EXISTS `m151admin_af` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `m151admin_af`;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dateNaissance` date NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `email`, `dateNaissance`, `pseudo`, `password`, `description`) VALUES
(20, 'Favre', 'Alan', 'favre.alan@gmail.com', '1995-10-07', 'Calagaaan', 'a0b6bf60beef61e6fd2dc95363d267b65bb98e13', 'Salut.'),
(21, 'Muraro', 'Jeff', 'jeff.muraro@gmail.com', '1997-03-01', 'MrZukXx', 'f6889fc97e14b42dec11a8c183ea791c5465b658', 'Homme swag.'),
(22, 'Leroy', 'Sacha', 'sachaleroy95@hotmail.fr', '1995-12-20', 'eXtraspe6men', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Je suppose...'),
(24, 'Hello', 'CMoi', 'moi@moi.yolo', '1986-06-27', 'Declerq', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Salut c&#39;est moi.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
