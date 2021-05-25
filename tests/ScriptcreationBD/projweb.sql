SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Création de la BD projdevWeb si la DB n'existe pas

CREATE DATABASE IF NOT EXISTS `projdevWeb` DEFAULT CHARACTER SET utf8;
USE `projdevWeb`;
-- --------------------------------------------------------
-- Création de la table articles
DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
article_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(30) NOT NULL,
categorie VARCHAR(30) NOT NULL,
prix SMALLINT NOT NULL,
dispo SMALLINT(30)  NULL,
stock VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Création de la table factures
DROP TABLE IF EXISTS `factures`;
CREATE TABLE IF NOT EXISTS `factures` (
facture_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_membre INT UNSIGNED NOT NULL,
horodatage DATETIME,
prixtotal SMALLINT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Création de la table lignefacture
DROP TABLE IF EXISTS `lignefactures`;
CREATE TABLE IF NOT EXISTS `lignefactures` (
ligne_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_facture INT UNSIGNED NOT NULL,
id_article INT UNSIGNED NOT NULL,
quantite SMALLINT NOT NULL,
prixligne SMALLINT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- création de la table profiles
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
profile_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(80) NOT NULL,
prenom VARCHAR(80) NOT NULL,
adresse VARCHAR(160) NOT NULL,
cp VARCHAR(6) NOT NULL,
motpasse VARCHAR (80) NOT NULL,
typeutilisateur BOOLEAN NOT NULL,
horodatage DATETIME,
indesirable BOOLEAN NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- création de la table blog
DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
blog_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_membre INT UNSIGNED NOT NULL,
titre VARCHAR(80) NOT NULL,
corps VARCHAR(255) NOT NULL,
horodatage DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- création de la table commentaires
DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
commentaire_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_blog INT UNSIGNED NOT NULL,
id_membre INT UNSIGNED NOT NULL,
commentaire VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- création de la table chat
DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
chat_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_membre INT UNSIGNED NOT NULL,
lignes VARCHAR(255) NOT NULL
) ENGINE-InnoDB DEFAULT CHARSET-utf8;

-- création de la table logs
DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
log_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_membre INT UNSIGNED NOT NULL,
horodatage DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `lignefactures`
  ADD CONSTRAINT FOREIGN KEY (`id_facture`) REFERENCES `factures` (`facture_id`),
  ADD CONSTRAINT FOREIGN KEY (`id_article`) REFERENCES `articles` (`article_id`);

ALTER TABLE `factures`
  ADD CONSTRAINT FOREIGN KEY (`id_membre`) REFERENCES `profiles` (`profile_id`);

ALTER TABLE `blog`
  ADD CONSTRAINT FOREIGN KEY (`id_membre`) REFERENCES `profiles` (`profile_id`);

ALTER TABLE `logs`
  ADD CONSTRAINT FOREIGN KEY (`id_membre`) REFERENCES `profiles` (`profile_id`);

ALTER TABLE `chat`
  ADD CONSTRAINT FOREIGN KEY (`id_membre`) REFERENCES `profiles` (`profile_id`);

ALTER TABLE `commentaires`
  ADD CONSTRAINT FOREIGN KEY (`id_blog`) REFERENCES `blog` (`blog_id`),
  ADD CONSTRAINT FOREIGN KEY (`id_membre`) REFERENCES `profiles` (`profile_id`);


-- INSERT INTO Biens (nom_bien,commune,prix,superficie,genre,deleted) values
--		('Beaulieu','Audergem',500,110,'Appartement',FALSE),
--		('Repos','Uccle',260,105,'Appartement',FALSE),
--		('Palace','Woluwe Saint Lambert',450,80,'Appartement',FALSE),
--		('Crocus','Laeken',90,60,'Appartement',FALSE),
--		('Milkyway','Zaventem',150,95,'Maison',FALSE),
--		('Joli regard','Evere',120,60,'Appartement',FALSE),
--		('Ma campagne','Dilbeek',250,140,'Maison',FALSE),
--		('Margueritte','Saint Gilles',180,90,'Maison',FALSE),
--		('Rose','Schaerbeek',160,90,'Appartement',FALSE),
--		('Fougères','Saint Joos Ten Node',80,150,'Maison',FALSE),
--		('Coquelicots','Forest',230,120,'Maison',FALSE);
--
-- --------------------------------------------------------


-- INSERT INTO Locataires (id_bien,nom,prénom) values
--		(1,'Dubois','Mickael'),
--                (2,'Thibodeau','Max'),
--                (3,'Dior','Baptiste'),
--                (4,'Emilien','Poussin'),
--                (5,'Brunet','Ariane'),
--                (6,'Abadie','Roselyne'),
--                (7,'Carpentier','Anita'),
--               (8,'Sharpe','Eloïse'),
--                (9,'Laurens','Colette'),
--                (10,'Lopez','Dolorès'),
--                (11,'Fouché','Mégane');
--
-- --------------------------------------------------------

-- INSERT INTO proprietaires (id_bien,nom,prenom,domicile,annee_naissance,deleted) values
--                (10,'Brunet','Harmonie','Berchem-Sainte-Agathe',1952,FALSE),
--                (2,'Nicollier','Patricia','Jette',1959,FALSE),
--                (7,'Charrier','Bérénice','Etterbeek',1950,FALSE),
--                (8,'Gallois','Héléne','Ganshoren',1945,FALSE),
--                (6,'Rodier','Rebecca','Koekelberg',1931,FALSE),
--                (9,'Duval','Eve','Ixelles',1980,FALSE),
--                (1,'Chabert','Alexandre','Bruxelles',1979,FALSE),
--                (3,'Simon','Nathanaël','Watermael-Boitsfort',1986,FALSE),
--                (4,'Benett','Isaïe','Molenbeek-Saint-Jean',1987,FALSE),
--                (5,'Bechard','Jean-Marc','Woluwe-Saint-Pierre',1977,FALSE),
--                (11,'Brosseau','Grégory','Anderlecht',1964,FALSE),
--                (12,'Couturier','Yvon','Uccle',1978,FALSE);