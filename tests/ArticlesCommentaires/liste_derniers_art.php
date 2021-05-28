 <!DOCTYPE html >
 <html >
 	<head >
 	 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Mes Articles</title>

		<link href="style.css" rel="stylesheet" type="text/css" /> 
    </head>
        
    <body>
        <h1>Mes super articles !</h1>
        <p>Les 3 derniers articles parus :</p>
 
<?php
// Connexion � la base de donn�es
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ArtCom', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On r�cup�re les 3 derniers articles
$req = $bdd->query('SELECT art_id, titre, corps, DATE_FORMAT(date_art, \'%d/%m/%Y � %Hh%imin%ss\') AS date_creation_fr FROM Articles ORDER BY date_art DESC LIMIT 0, 3');

while ($donnees = $req->fetch())
{
?>
<div class="news">
    <h3>
       
		<?php echo $donnees['titre'].' - Post� le '; ?>
        <em> <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    // On affiche le contenu des articles
	echo nl2br($donnees['corps']);
	/*
	La fonction nl2br() permet de convertir les retours � la ligne en balises HTML <br />. Elle permet de conserver les retours � la ligne
	saisis dans les champs d'un formulaire.
    */
    ?>
    <br />
    <em><a href="consult_commentaires.php?article=<?php echo $donnees['art_id']; ?>">Commentaires</a></em>
    </p>
</div>
<?php
} // Fin de la boucle des articles
$req->closeCursor();
?>
</body>
</html>
