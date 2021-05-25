

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO Biens (nom_bien,commune,prix,superficie) values
		('Beaulieu','Audergem',500,110),
		('Repos','Uccle',260,105),
		('Palace','Woluwe Saint Lambert',450,80),
		('Crocus','Laeken',90,60);
		('Milkyway','Zaventem',150,95);
		('Joli regard','Evere',120,60);

-- --------------------------------------------------------

DROP TABLE IF EXISTS `Locataires`;
CREATE TABLE IF NOT EXISTS `Locataires` (
livre_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_bien INT UNSIGNED NOT NULL,
nom VARCHAR(80) NOT NULL,
éditeur VARCHAR(50) NULL,
prix DECIMAL(7,2) NOT NULL,
emprunté TINYINT NOT NULL,
critique ENUM('Nul','Trés mauvais','Mauvais','Bon','Très bon','Excellent','La bible')NULL,
genre ENUM('Essai','Traité','Scolaire','Roman','Sexe'),
année_edit INT NULL DEFAULT NULL,
nb_pg  SMALLINT UNSIGNED NOT NULL,
nb_exempl TINYINT UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO Livres (id_auteur,titre,éditeur,prix,emprunté,critique,genre,
								année_edit,nb_pg,nb_exempl) values 
		(5,'Patience dans l\'azur','Le seuil',770,0,'Bon','Essai',1996,625,2),
		(1,'Mécanique1','Gallimard',550,1,'Excellent','Traité',1978,451,3),
		(1,'Mécanique2','Lombard',385,1,'Très bon','Traité',1991,325,10),
		(6,'dBase III','Point',440,0,'Mauvais','Scolaire',1967,458,15),
		(2,'Access 2','Savoir',770,1,'Très mauvais','Scolaire',1986,1256,6),
		(4,'Access 2','Essentiel',968,0,'La bible','Scolaire',1998,321,8),
		(5,'Poussière d\'étoile','Lombard',825,0,'Bon','Essai',1967,569,15),
		(7,'Germinal','France',122.10,0,'Très bon','Roman',1954,874,21),
		(3,'Erasme','Labor',1098.90,1,'Nul','Roman',1897,224,10),
		(5,'L\'heure de s\'enivrer','Le seuil',1098.90,0,'Excellent','Sexe',1994,358,9),
		(3,'Sans éditeur et sans année d\'édition',NULL,35,0,'Bon','Essai',NULL,6132,1)
		;

		


ALTER TABLE `Livres`
  ADD CONSTRAINT `Livres` FOREIGN KEY (`id_auteur`) REFERENCES `Auteurs` (`auteur_id`);
-- --------------------------------------------------------



DROP TABLE IF EXISTS `Emprunteurs`;
CREATE TABLE IF NOT EXISTS `Emprunteurs` (
emprunteur_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(30) NOT NULL,
prénom VARCHAR(30) NOT NULL,
adresse TINYTEXT NOT NULL,
cp MEDIUMINT UNSIGNED NOT NULL,
ville VARCHAR(50) NOT NULL,
tél DECIMAL(10,0) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO Emprunteurs (nom,prénom,adresse,cp,ville,tél) values 
		('Durand','Pierre','rue de l\'arche, 25',1020,'Bruxelles','022198711'),
		('Depere','Marie','avenue des eaux, 25',1030,'Bruxelles', '023216598'),
		('Dupond','Eric','rue de l\'angle, 312',4210,'Namur', '032986524'),
		('Lierre','Carine','avenue du parc, 23',7210,'Tournai', '0658754126'),
		('Devrant','Charles','rue artan, 25',1090,'Bruxelles', '025486932'),
		('Servaes','Paul','rue du marteau, 65',4020,'Namur', '0325412369'),
		('Bichon','Marc','avenue des croix, 12',5021,'Liège', '0355896988'),
		('Dufils','Françoise','rue du pont, 25',5021,'Liège', '0356543215'),
		('Jacques','Elyane','avenue du gland, 32',1020,'Bruxelles', '029876521'),
		('Galand','Eric','rue du pieu, 65',1030,'Bruxelles', '026549827');

-- --------------------------------------------------------



DROP TABLE IF EXISTS `Livres_empruntés`;
CREATE TABLE IF NOT EXISTS `Livres_empruntés` (
emprunt_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_livre INT UNSIGNED NOT NULL,
id_emprunteur INT UNSIGNED NOT NULL,
date_emprunt DATE NOT NULL,
retard TINYINT UNSIGNED
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO Livres_empruntés (id_livre,id_emprunteur,date_emprunt,retard) values 
		(3,6,'2001-11-12',0),
		(3,9,'2001-01-01',0),
		(5,3,'2001-03-22',0),
		(5,4,'2001-12-14',1),
		(9,1,'2000-01-25',1),
		(2,8,'2000-12-24',1),
		(2,2,'2001-12-24',0);



ALTER TABLE `Livres_empruntés`
  ADD CONSTRAINT FOREIGN KEY (`id_livre`) REFERENCES `Livres` (`livre_id`),
  ADD CONSTRAINT FOREIGN KEY (`id_emprunteur`) REFERENCES `Emprunteurs` (`emprunteur_id`);

