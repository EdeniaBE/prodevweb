<?php


try 
{
$pdo = new PDO('mysql:host=localhost', 'root', '');
/* $pdo est une instance de la classe PDO qui correspond au lien à la BD.
  Le 1er parametre du constructeur correspond au DSN (Data Source Name) qui décrit l' adresse du serveur de BD auquel on désire accéder
  complèté du nom de la BD à laquelle on désire accéder sur le serveur (voir plus bas, nouvel appel à la méthode new).
  Le 2ème parametre est le nom d'utilisateur et le 3ème est le mot de passe */
} 
catch (PDOException $e) {
die( "Erreur !: " . $e->getMessage() );
/* appel à la classe PDOexception chargée de gérer les messages d'erreur s'il y en a */
}


$req= 'CREATE DATABASE ArtCom';

/* La méthode exec() de l'objet $pdo est employée pour exécuter des requêtes SQL qui ne renvoient pas à proprement parler un résultat
   (INSERT, DELETE, UPDATE, DROP) mais qui modifient les données contenues dans la BD.
   Cette méthode renvoie le nombre de lignes (enregistrements) affectées par la requête (donc un nombre qui peut être 0 !).
   Par contre la valeur renvoyée en cas d'échec de la requête est la valeur booléenne false.
   Pour ne pas confondre les 2 cas il est nécessaire d'utiliser l'opérateur de comparaison de type === qui compare 
   en plus de la valeur renvoyée, son type ! Il permet donc de ne pas assimiler une valeur nulle(nombre ou chaîne) à la valeur booléenne false  */
if($pdo->exec($req) === FALSE)
{
    echo 'Il y a une erreur dans votre requête de creation de la BD ArtCom :';
	exit("Impossible de creer la Base de données ArtCom !");
} 

try 
{
$pdo = new PDO('mysql:host=localhost;dbname=ArtCom', 'root', '');
} 
catch (PDOException $e) {
die( "Erreur !: " . $e->getMessage() );
}

$requete = 'CREATE TABLE Auteurs (
aut_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(30) NOT NULL,
mot_passe varchar(30)
)';
if($pdo->exec($requete) === FALSE)
{
    echo 'Il y a une erreur dans votre requête de création de la table Auteurs : ';
    echo $requete;
	exit();
}
echo'Table Auteurs créée <br/>';

$requete = "INSERT INTO Auteurs (aut_id,nom,mot_passe) values 
		('','Admin','coucou'),
		('','Jean','truc'),
		('','michel','brol'),
		('','Imane','bazar'),
		('','Carine','machin')
		";
/* OU en ne mentionnant pas le champ aut_id (clé primaire) dont les valeurs sont générées automatiquement	
$requete = "INSERT INTO Auteurs (nom,mot_passe) values 
		('Admin','coucou'),
		('Jean','truc'),
		('michel','brol'),
		('Imane','bazar'),
		('Carine','machin')
		";   */
		
if($pdo->exec($requete) === FALSE)
{
    echo 'Il y a une erreur dans votre requête d\'insertion dans la table Auteurs :';
    echo $requete;
	exit();
}
echo'Insertions effectuées dans la table Auteurs <br/>';		
													
$requete = 'CREATE TABLE Articles (
art_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
titre VARCHAR(255) NOT NULL,
corps MEDIUMTEXT NOT NULL,
date_art datetime NOT NULL )';

	
if($pdo->exec($requete) === FALSE)
{
    echo 'Il y a une erreur dans votre requête de création de la table Articles ';
    echo $requete;
    exit();
}
echo'Table Articles créée <br/>';		
		
$requete = "INSERT INTO Articles (titre,corps,date_art) values 
		('Mon tout premier article','Salut les gars, c\'est la fête.\nEn effet voici le texte de mon tout premier article posté sur le site.
		\nJ\'attends vos commentaires avec impatience.','2010-06-15 12:00:00'),
		('Et voilà le deuxième','Salut les gars, c\'est le pied.\nEn effet voici le texte de mon deuxième article posté sur le site.
		\nJ\'espère que vous en profiterez.\nAllez une chaîne pour la recherche...azertyuiop.','2010-07-15 12:00:00'),
		('Un coup d\'oeil sur le dernier NOKIA','Il est en vente dans le commerce : le nouveau Nokia 9876 est disponible aujourd\'hui en Belgique.\n
		Ruez-vous dans les magasins il n\'y en aura pas pour tout le monde !','2011-02-15 12:00:00'),
		('Voilà déjà le quatrième on n\'arrête pas le progrès','Il n\'y a pas à dire je suis généreux avec mes lecteurs.\n
		Un nouvel article à peine un jour après le précédent.','2011-02-16 12:00:00'),
		('Cinéma : Le cinquième élément','Un film culte qui ressort sur nos écrans quel plaisir.\n\n\n
		Vite une semaine seulement pour aller le voir','2011-03-30 12:00:00'),
		('Numéro 6','Salut les gars, c\'est toujours un bonheur de poster mes articles vu vos réactions positives.\nA bientôt.',Now())
		";
if($pdo->exec($requete) === FALSE)
{
    echo 'Il y a une erreur dans votre requête d\'insertion dans la table Articles .';
    echo $requete;
	exit();
}
echo'Insertions effectuées dans la table Articles <br/>';


$requete = 'CREATE TABLE Commentaires (
com_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_art INT UNSIGNED NOT NULL,
id_aut INT UNSIGNED NOT NULL,
texte_com TEXT NOT NULL,
date_com datetime NOT NULL )';

if($pdo->exec($requete) === FALSE)
{
    echo 'Il y a une erreur dans votre requête de création de la table Commentaires ';
    echo $requete;
    exit();
}
echo'Table Commentaires créée <br/>';

$requete = "INSERT INTO Commentaires (id_art,id_aut,texte_com,date_com) values 
		(1,4,'Bravo vraiment super !','2010-06-15 14:00:00'),
		(1,2,'Terrible ce truc !','2010-06-15 14:40:00'),
		(2,3,'Continue tu es sur la bonne voie','2010-07-15 12:10:00'),
		(2,2,'Tu t\'améliores sans cesse','2010-09-08 13:00:00'),
		(2,4,'Un très bon article','2010-09-08 13:00:00'),
		(3,4,'Encore meilleur que l\'article précédent','2011-02-15 18:00:00'),
		(3,1,'Terrifique ce nouveau Nokia','2011-02-15 19:32:56'),
		(3,5,'Celui-là je me l\'offre, trop génial','2011-02-15 22:00:00'),
		(5,4,'Un des meilleurs films de l\'histoire du Cinéma','2011-03-31 18:00:00'),
		(5,3,'Je cours le revoir','2011-04-07 19:00:00'),
		(6,2,'Ca va pas durer...','2011-05-10 14:00:00')";
		
if($pdo->exec($requete) === FALSE)
{
    echo 'Il y a une erreur dans votre requête d\'insertion dans la table Commentaires .';
    echo $requete;
	exit();
}
echo'Insertions effectuées dans la table Commentaires <br/>';


		


if ($pdo) {
$pdo = NULL ;
// Fermeture de la connexion
}


