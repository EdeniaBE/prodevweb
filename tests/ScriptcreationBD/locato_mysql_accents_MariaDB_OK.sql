

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `locationbien` DEFAULT CHARACTER SET utf8;
USE `locationbien`;
-- --------------------------------------------------------
DROP TABLE IF EXISTS `Biens`;
CREATE TABLE IF NOT EXISTS `Biens` (
bien_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nom_bien VARCHAR(30) NOT NULL,
commune VARCHAR(30) NOT NULL,
prix SMALLINT NOT NULL,
superficie SMALLINT(30)  NULL,
genre VARCHAR(30) NOT NULL,
deleted BOOLEAN
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO Biens (nom_bien,commune,prix,superficie,genre,deleted) values
		('Beaulieu','Audergem',500,110,'Appartement',FALSE),
		('Repos','Uccle',260,105,'Appartement',FALSE),
		('Palace','Woluwe Saint Lambert',450,80,'Appartement',FALSE),
		('Crocus','Laeken',90,60,'Appartement',FALSE),
		('Milkyway','Zaventem',150,95,'Maison',FALSE),
		('Joli regard','Evere',120,60,'Appartement',FALSE),
		('Ma campagne','Dilbeek',250,140,'Maison',FALSE),
		('Margueritte','Saint Gilles',180,90,'Maison',FALSE),
		('Rose','Schaerbeek',160,90,'Appartement',FALSE),
		('Fougères','Saint Joos Ten Node',80,150,'Maison',FALSE),
		('Coquelicots','Forest',230,120,'Maison',FALSE);

-- --------------------------------------------------------

DROP TABLE IF EXISTS `Locataires`;
CREATE TABLE IF NOT EXISTS `Locataires` (
locataire_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_bien INT UNSIGNED NOT NULL,
nom VARCHAR(80) NOT NULL,
prénom VARCHAR(50) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO Locataires (id_bien,nom,prénom) values
		(1,'Dubois','Mickael'),
                (2,'Thibodeau','Max'),
                (3,'Dior','Baptiste'),
                (4,'Emilien','Poussin'),
                (5,'Brunet','Ariane'),
                (6,'Abadie','Roselyne'),
                (7,'Carpentier','Anita'),
                (8,'Sharpe','Eloïse'),
                (9,'Laurens','Colette'),
                (10,'Lopez','Dolorès'),
                (11,'Fouché','Mégane');

-- --------------------------------------------------------

DROP TABLE IF EXISTS `Proprietaires`;
CREATE TABLE IF NOT EXISTS `Proprietaires` (
proprioetaire_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_bien INT UNSIGNED NOT NULL,
nom VARCHAR(80) NOT NULL,
prénom VARCHAR(50) NULL,
domicile VARCHAR (50) NOT NULL,
annee_naissance SMALLINT NOT NULL,
deleted BOOLEAN
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO proprietaires (id_bien,nom,prenom,domicile,annee_naissance,deleted) values
                (10,'Brunet','Harmonie','Berchem-Sainte-Agathe',1952,FALSE),
                (2,'Nicollier','Patricia','Jette',1959,FALSE),
                (7,'Charrier','Bérénice','Etterbeek',1950,FALSE),
                (8,'Gallois','Héléne','Ganshoren',1945,FALSE),
                (6,'Rodier','Rebecca','Koekelberg',1931,FALSE),
                (9,'Duval','Eve','Ixelles',1980,FALSE),
                (1,'Chabert','Alexandre','Bruxelles',1979,FALSE),
                (3,'Simon','Nathanaël','Watermael-Boitsfort',1986,FALSE),
                (4,'Benett','Isaïe','Molenbeek-Saint-Jean',1987,FALSE),
                (5,'Bechard','Jean-Marc','Woluwe-Saint-Pierre',1977,FALSE),
                (11,'Brosseau','Grégory','Anderlecht',1964,FALSE),
                (12,'Couturier','Yvon','Uccle',1978,FALSE);

