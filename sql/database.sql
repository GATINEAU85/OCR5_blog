-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 10 avr. 2020 à 12:43
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  projet5blog
--

-- --------------------------------------------------------

--
-- Structure de la table comment
--

DROP TABLE IF EXISTS comment;
CREATE TABLE IF NOT EXISTS comment (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  comment varchar(256) NOT NULL,
  date datetime NOT NULL,
  post_id int(11) NOT NULL,
  user_id int(11) NOT NULL,
  title text NOT NULL,
  validate tinyint(1) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY id (id)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table comment
--

INSERT INTO comment (id, comment, date, post_id, user_id, title, validate) VALUES
(28, 'fsd', '2020-04-04 14:43:17', 1, 6, 'gds', 1),
(39, 'test', '2020-04-10 11:29:38', 1, 7, 'test', 1),
(40, 'testgegege', '2020-04-10 11:57:48', 1, 6, 'gege', 1);

-- --------------------------------------------------------

--
-- Structure de la table post
--

DROP TABLE IF EXISTS post;
CREATE TABLE IF NOT EXISTS post (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  title longtext NOT NULL,
  chapo longtext NOT NULL,
  content longtext NOT NULL,
  date date NOT NULL,
  user_id int(11) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY id (id)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table post
--

INSERT INTO post (id, title, chapo, content, date, user_id) VALUES
(1, 'SIG Libre VS Propriétaire : quels choix ?  ', 'La comparaison entre les logiciels des SIG ...', 'La comparaison entre les logiciels des Systèmes d’Informations Géographiques (SIG) libres et Open Sources et les logiciels SIG payants fait débat. Cette question divise souvent la communauté des professionnels de la Géomatique. Certains avancent que les logiciels payants sont plus robustes. A l’opposé, les partisans du SIG Open Source insistent sur la gratuité des technologies géospatiales à disposition. Gratuité vs Robustesse, les avantages et les inconvénients du SIG libre et propriétaire (le terme commercial étant inapproprié, merci à Vincent P pour son commentaire) ne se limitent pas à cette opposition. En effet, de nombreux facteurs poussent certains géomaticiens à adopter un logiciel SIG plutôt qu’un autre. Mais l’utilisation de technologies et logiciels SIG est-elle réellement choisie?\r\n\r\nDans cet article, on aborde quelques pistes de réflexions sur les choix des utilisateurs. Le post ne traite pas d’une comparaison technique entre les fonctionnalités des technologies de chaque catégorie présentée ici. Tous simplement, car il est impossible de connaître l’ensemble des fonctionnalités SIG des logiciels existants. Ainsi, on discute dans un premier temps des mécanismes qui impactent les choix des géomaticiens. L’approche s’appuie sur les rapports d’une personne face à la possibilité d’acquérir, d’utiliser et de faire évoluer ses informations jusqu’à l’obtention de résultats. Et dans un second temps, l’évaluation des résultats positifs obtenus par les expériences de nombreux géomaticiens grâce au SIG libre m’amène logiquement à la présentation d’une liste de technologies SIG Open Sources.\r\n\r\nPour rappel, on définit l’ensemble des composants d’une architecture SIG par les serveurs, les Systèmes de Gestion de Bases de Données, les logiciels bureautiques, les API de WebMapping et les langages de programmation utilisés en SIG.', '2020-04-04', 6),
(58, 'Géomatique et Micro-entreprise : Avantages, Inconvénients et Bilans ', 'Un article passionnant qui vous apprendra tout sur le marché actuel de la géomatique...', 'De manière générale, l’une des principales motivations de l’entrepreneur dans la création d’une société est la volonté d’indépendance et de liberté. Ici, la liberté signifie être maître de mener ses propres projets selon ses idées et ses philosophies de vie. Ainsi, on ne dépend pas d’ordres hiérarchiques et on doit pouvoir réaliser ce qui nous « tient à cœur ».\r\n\r\nOn peut évoquer également le fait de choisir son lieu de résidence puisqu’en géomatique, l’information et les contenus de projets circulent de manière dématérialisée dans la plupart des cas.\r\n\r\nLa liberté de choisir ses partenaires est aussi très importante pour mener à bien les projets et services en Systèmes d’Informations Géographiques (SIG) et télédétection.\r\n\r\nSi vous partez de rien et que vous n’avez pas de parents ou de proches chefs d’entreprise, il est plutôt rare de se destiner à la création d’une société en tant que géomaticien dès la fin du cursus scolaire. Après la formation en SIG et l’obtention d’un diplôme, il est classique de commencer sa carrière en tant que salarié ou fonctionnaire. Quitter le salariat intervient généralement après la perte d’un emploi, après la rupture d’un contrat suite à des points de vue différents avec des supérieurs ou collaborateurs ou tout simplement l’envie forte de mettre en œuvre un projet.\r\n\r\nTous ces déclencheurs sont subjectifs mais ils sont souvent à la base d’une motivation forte où l’on ressent le besoin de créer par soi-même, de tracer ses propres directives et de mener ses propres projets. Une bonne idée, de bonnes compétences, une envie forte, un marché des SIG porteur, tout cela conforte la création d’une entreprise en Géomatique.\r\n\r\nCertes on est tous pleins de bonnes volontés mais passer à l’action n’est pas si simple et le choix de l’entrepreneuriat en Géomatique est comme dans tout domaine semé d’obstacles.', '2020-04-02', 6);

-- --------------------------------------------------------

--
-- Structure de la table role
--

DROP TABLE IF EXISTS role;
CREATE TABLE IF NOT EXISTS role (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(256) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY id (id)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table role
--

INSERT INTO role (id, name) VALUES
(1, 'administrator'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table user
--

DROP TABLE IF EXISTS user;
CREATE TABLE IF NOT EXISTS user (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  surname varchar(256) NOT NULL,
  name varchar(256) NOT NULL,
  mail varchar(256) NOT NULL,
  pwd varchar(256) NOT NULL,
  pseudo varchar(256) NOT NULL,
  role_id int(11) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY id (id)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table user
--

INSERT INTO user (id, surname, name, mail, pwd, pseudo, role_id) VALUES
(7, 'user', 'user', 'pseudo.user@gmail.com', '$2y$10$E34lLE6ndl4p1jMMI8EUieqtJ9DHIpOlFeSfxT5sb.91.VZItam5y', 'user', 2),
(6, 'admin', 'admin', 'admin@gmail.fr', '$2y$10$brFeiQtRycJo.VOgHprgLOKPK13TXGF00uJdN2zrBI2LSvbQg7WU.', 'admin', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
