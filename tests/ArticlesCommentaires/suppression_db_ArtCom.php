<?php


try 
{
$pdo = new PDO('mysql:host=localhost;dbname=ArtCom', 'root', '');
} 
catch (PDOException $e) {
die( "Erreur !: " . $e->getMessage() );
}
$requete = 'Drop Database ArtCom';
if($pdo->exec($requete) === FALSE)
{
    echo 'Il y a une erreur dans votre requ�te de suppression de la BD ArtCom.';
    echo $requete;
	exit();
}
echo'Base de donn�es ArtCom supprim�e'; 
if ($pdo) {
$pdo = NULL ;
// Fermeture de la connexion
}
?>