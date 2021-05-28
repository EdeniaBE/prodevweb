<?php


try 
{
$pdo = new PDO('mysql:host=localhost', 'root', '');
/* $pdo est une instance de la classe PDO qui correspond au lien � la BD.
  Le 1er parametre du constructeur correspond au DSN (Data Source Name) qui d�crit l' adresse du serveur de BD auquel on d�sire acc�der
  compl�t� du nom de la BD � laquelle on d�sire acc�der sur le serveur (voir plus bas, nouvel appel � la m�thode new).
  Le 2�me parametre est le nom d'utilisateur et le 3�me est le mot de passe */
} 
catch (PDOException $e) {
die( "Erreur !: " . $e->getMessage() );
/* appel � la classe PDOexception charg�e de g�rer les messages d'erreur s'il y en a */
}


$req= 'CREATE DATABASE ArtCom';

/* La m�thode exec() de l'objet $pdo est employ�e pour ex�cuter des requ�tes SQL qui ne renvoient pas � proprement parler un r�sultat
   (INSERT, DELETE, UPDATE, DROP) mais qui modifient les donn�es contenues dans la BD.
   Cette m�thode renvoie le nombre de lignes (enregistrements) affect�es par la requ�te (donc un nombre qui peut �tre 0 !).
   Par contre la valeur renvoy�e en cas d'�chec de la requ�te est la valeur bool�enne false.
   Pour ne pas confondre les 2 cas il est n�cessaire d'utiliser l'op�rateur de comparaison de type === qui compare 
   en plus de la valeur renvoy�e, son type ! Il permet donc de ne pas assimiler une valeur nulle(nombre ou cha�ne) � la valeur bool�enne false  */
if($pdo->exec($req) === FALSE)
{
    echo 'Il y a une erreur dans votre requ�te de creation de la BD ArtCom�:';
	exit("Impossible de creer la Base de donn�es ArtCom !");
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
    echo 'Il y a une erreur dans votre requ�te de cr�ation de la table Auteurs : ';
    echo $requete;
	exit();
}
echo'Table Auteurs cr��e <br/>';

$requete = "INSERT INTO Auteurs (aut_id,nom,mot_passe) values 
		('','Admin','coucou'),
		('','Jean','truc'),
		('','michel','brol'),
		('','Imane','bazar'),
		('','Carine','machin')
		";
/* OU en ne mentionnant pas le champ aut_id (cl� primaire) dont les valeurs sont g�n�r�es automatiquement	
$requete = "INSERT INTO Auteurs (nom,mot_passe) values 
		('Admin','coucou'),
		('Jean','truc'),
		('michel','brol'),
		('Imane','bazar'),
		('Carine','machin')
		";   */
		
if($pdo->exec($requete) === FALSE)
{
    echo 'Il y a une erreur dans votre requ�te d\'insertion dans la table Auteurs�:';
    echo $requete;
	exit();
}
echo'Insertions effectu�es dans la table Auteurs <br/>';		
													
$requete = 'CREATE TABLE Articles (
art_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
titre VARCHAR(255) NOT NULL,
corps MEDIUMTEXT NOT NULL,
date_art datetime NOT NULL )';

	
if($pdo->exec($requete) === FALSE)
{
    echo 'Il y a une erreur dans votre requ�te de cr�ation de la table Articles�';
    echo $requete;
    exit();
}
echo'Table Articles cr��e <br/>';		
		
$requete = "INSERT INTO Articles (titre,corps,date_art) values 
		('Mon tout premier article','Salut les gars, c\'est la f�te.\nEn effet voici le texte de mon tout premier article post� sur le site.
		\nJ\'attends vos commentaires avec impatience.','2010-06-15 12:00:00'),
		('Et voil� le deuxi�me','Salut les gars, c\'est le pied.\nEn effet voici le texte de mon deuxi�me article post� sur le site.
		\nJ\'esp�re que vous en profiterez.\nAllez une cha�ne pour la recherche...azertyuiop.','2010-07-15 12:00:00'),
		('Un coup d\'oeil sur le dernier NOKIA','Il est en vente dans le commerce : le nouveau Nokia 9876 est disponible aujourd\'hui en Belgique.\n
		Ruez-vous dans les magasins il n\'y en aura pas pour tout le monde !','2011-02-15 12:00:00'),
		('Voil� d�j� le quatri�me on n\'arr�te pas le progr�s','Il n\'y a pas � dire je suis g�n�reux avec mes lecteurs.\n
		Un nouvel article � peine un jour apr�s le pr�c�dent.','2011-02-16 12:00:00'),
		('Cin�ma : Le cinqui�me �l�ment','Un film culte qui ressort sur nos �crans quel plaisir.\n\n\n
		Vite une semaine seulement pour aller le voir','2011-03-30 12:00:00'),
		('Num�ro 6','Salut les gars, c\'est toujours un bonheur de poster mes articles vu vos r�actions positives.\nA bient�t.',Now())
		";
if($pdo->exec($requete) === FALSE)
{
    echo 'Il y a une erreur dans votre requ�te d\'insertion dans la table Articles .';
    echo $requete;
	exit();
}
echo'Insertions effectu�es dans la table Articles <br/>';


$requete = 'CREATE TABLE Commentaires (
com_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_art INT UNSIGNED NOT NULL,
id_aut INT UNSIGNED NOT NULL,
texte_com TEXT NOT NULL,
date_com datetime NOT NULL )';

if($pdo->exec($requete) === FALSE)
{
    echo 'Il y a une erreur dans votre requ�te de cr�ation de la table Commentaires�';
    echo $requete;
    exit();
}
echo'Table Commentaires cr��e <br/>';

$requete = "INSERT INTO Commentaires (id_art,id_aut,texte_com,date_com) values 
		(1,4,'Bravo vraiment super !','2010-06-15 14:00:00'),
		(1,2,'Terrible ce truc !','2010-06-15 14:40:00'),
		(2,3,'Continue tu es sur la bonne voie','2010-07-15 12:10:00'),
		(2,2,'Tu t\'am�liores sans cesse','2010-09-08 13:00:00'),
		(2,4,'Un tr�s bon article','2010-09-08 13:00:00'),
		(3,4,'Encore meilleur que l\'article pr�c�dent','2011-02-15 18:00:00'),
		(3,1,'Terrifique ce nouveau Nokia','2011-02-15 19:32:56'),
		(3,5,'Celui-l� je me l\'offre, trop g�nial','2011-02-15 22:00:00'),
		(5,4,'Un des meilleurs films de l\'histoire du Cin�ma','2011-03-31 18:00:00'),
		(5,3,'Je cours le revoir','2011-04-07 19:00:00'),
		(6,2,'Ca va pas durer...','2011-05-10 14:00:00')";
		
if($pdo->exec($requete) === FALSE)
{
    echo 'Il y a une erreur dans votre requ�te d\'insertion dans la table Commentaires .';
    echo $requete;
	exit();
}
echo'Insertions effectu�es dans la table Commentaires <br/>';


		


if ($pdo) {
$pdo = NULL ;
// Fermeture de la connexion
}


