-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 09 Septembre 2015 à 13:57
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `email`, `dateNaissance`, `pseudo`, `password`, `description`) VALUES
(1, 'Salut', 'Ca', 'va@bien.ettoi', '2015-09-01', 'Bien', 'Merci', 'Kthxbye.'),
(3, 'Mais', 'Pourquoi', 'Ca@marche.plus', '2015-09-01', 'stp', 'soisgentil', ':('),
(7, 'Carvalho', 'Ruben', 'theking@swag.com', '2015-09-01', 'YankeeZ_', 'ruben', 'Y&#39;en a pas.'),
(8, 'Raeven', 'Venedict', 'salut@salut.com', '2015-09-03', 'VeneRavenDict', 'bfjhdwsgvxkjfhgeqahbfs ', 'gfdgfdgfd'),
(9, 'Leroy', 'Sacha', 'sacha@bonjour.ch', '2015-09-01', 'Sachaaaaaaaaaaaaaaa', 'nana', 'HJHJ'),
(10, 'gfdgfd', 'gfdgdfg', 'gfdgdfg@gmail.com', '2015-09-01', 'fdsf', 'd5e7cd8260640250accc1074bed4a64570124a03', 'fdfdf'),
(11, 'Ruben', 'fdsfs', 'fdsfsd@gmAIL.com', '2015-09-02', 'fdf', '74d101856d26f2db17b39bd22d3204021eb0bf7d', 'fdfd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
