SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Création de la BD projdevWeb si la DB n'existe pas

CREATE DATABASE IF NOT EXISTS `projdevWebtest` DEFAULT CHARACTER SET utf8;
USE `projdevWebtest`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- Remplissage de la table profiles
-- --------------------------------
INSERT INTO profiles (nom,prenom,adresse,cp,motpasse,typeutilisateur,horodatage,indesirable) values
		('Verstichel','Patrice','Broekstraat 98',1700,'engine',0,'2021-05-11 20:30:23',0),
    ('Julien','Anne-Gaëlle','rue de la montagne 18',1160,'engine',0,'2021-05-12 12:15:10',0),
    ('Brunet','Harmonie','rue de la station 486',1082,'client',1,'2021-05-20 10:10:10',0),
    ('Nicollier','Patricia','place du mirroir 87',1090,'client',1,'2021-05-20 10:10:10',0),
    ('Gallois','Hélène','rue longue 192',1040,'client',1,'2021-05-20 10:10:10',0);
    
-- --------------------------------------------------------

INSERT INTO blog (id_membre,titre,corps,horodatage) values
    (1,'Mon premier post','Ceci est mon premier post','2021-05-13 18:00:40'),
    (1,'Mon deuxième post','Ceci est mon deuxième post','2021-05-13 18:05:40'),
    (2,'Enfin le blog fonctionne','pas si évident que ca','2021-05-25 20:22:20'),
    (2,'On garde le cap','Notre peuple vaincra','2021-05-25 21:00:00');

INSERT INTO commentaires (id_blog,id_membre,commentaire) values
    (1,2,'Nice'),
    (1,2,'Hé ben dis donc'),
    (2,1,'ça marche !');

INSERT INTO articles (nom,categorie,prix,dispo,stock) values
    ('ordinateur lowcost','informatique',350,1,2),
    ('ordinateur gaming','informatique',700,1,2),
    ('ordinateur portable','informatique',1200,1,2),
    ('Le monde merveilleux de PHP','livre',25,1,2),
    ('PDO pour les null','livre',35,1,2),
    ('Informatique quand tu nous plait','livre',12,1,2),
    ('Walkman','hi-fi',57,1,2),
    ('MP3 a gogo','hi-fi',58,1,2),
    ('soundbar','hi-fi',120,1,2);
