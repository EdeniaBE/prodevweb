<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
    <head>
        <title>Mes Articles</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 
    </head>
        
    <body>
        <h1>Mes super articles !</h1>
        <p>Les 5 derniers articles parus :</p>
 
<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ArtCom', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On récupère les 3 derniers articles
//$req = $bdd->query('SELECT art_id, titre, corps, DATE_FORMAT(date_art, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM Articles ORDER BY date_art DESC LIMIT 0, 5');
$req = $bdd->query('SELECT art_id, titre, corps, DATE_FORMAT(date_art, \'%d/%m/%Y %Hh%imin%ss\') AS date_creation_fr FROM Articles ORDER BY date_art DESC LIMIT 0,5'); 

while ($donnees = $req->fetch())
{
?>
<div class="news">
    <h3>
        <?php echo $donnees['titre']; ?>
        <em> <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    // On affiche le contenu des articles
    echo nl2br($donnees['corps']);
	/*
	Tous les textes édités par echo en provenance de la BD sont protégés de la faille XSS par la fonction htmlspecialchars().
	La fonction nl2br() permet de convertir les retours à la ligne en balises HTML <br />. Elle permet de conserver les retours à la ligne
	saisis dans les champs d'un formulaire.
*/
    ?>
    <br />
    <em><a href="consult_insert_comment.php?article=<?php echo $donnees['art_id']; ?>">Commentaires</a></em>
    </p>
</div>
<?php
} // Fin de la boucle des articles
$req->closeCursor();
?>
</body>
</html>
