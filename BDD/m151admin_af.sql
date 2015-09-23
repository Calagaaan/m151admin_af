-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 23 Septembre 2015 à 15:52
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `email`, `dateNaissance`, `pseudo`, `password`, `description`) VALUES
(15, 'Favreo', 'Alano', 'favre.alan@gmail.como', '1995-10-07', 'Calagaaano', 'a0b6bf60beef61e6fd2dc95363d267b65bb98e13', 'I like trainso.'),
(16, 'Leroy', 'Sacha', 'sacha.leroy@gmail.com', '1995-12-20', 'eXtraspe6men', 'bb0446b9e918a5cf8a31b4caf9ba99122ddbd498', 'J&#39;aime bien Ruben.'),
(17, 'CARVALHO', 'Ruben', 'theking@gmail.como', '1996-09-13', 'TheKiing', '2e4ee22a1ec3f9c182a37b90566a76a27735b98a', 'J&#39;aime plus bien Sacha.'),
(18, 'RAEVEN', 'MARCELA', 'what@what.com', '1996-07-26', 'Raelo', '5ed25af7b1ed23fb00122e13d7f74c4d8262acd8', 'Salut c&#39;est MOI.'),
(19, 'Bertrand', 'Nico', 'nicoBERTRAND@yolo.com', '1997-07-18', 'Orion24_', 'a518defe4470f463153dbaa8f10c4a5ccd5a4b31', 'J&#39;aimerai comprendre.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
