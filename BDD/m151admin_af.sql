-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 30 Septembre 2015 à 14:38
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `email`, `dateNaissance`, `pseudo`, `password`, `description`) VALUES
(20, 'Favre', 'Alan', 'favre.alan@gmail.com', '1995-10-07', 'Calagaaan', 'a0b6bf60beef61e6fd2dc95363d267b65bb98e13', 'Salut.'),
(21, 'Muraro', 'Jeff', 'jeff.muraro@gmail.com', '1997-03-01', 'MrZukXx', 'f6889fc97e14b42dec11a8c183ea791c5465b658', 'Homme swag.'),
(22, 'Leroy', 'Sacha', 'sachaleroy95@hotmail.fr', '1995-12-20', 'eXtraspe6men', '49b3d0d369b66b67148f4e610e06eed7362fe517', 'Je suppose...'),
(23, 'Marcelo', 'Rae Vennedict', 'rae.mrcl@eduge.ch', '1996-07-26', 'baecone', '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', 'Everyday i&#39;m stalkiling');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
