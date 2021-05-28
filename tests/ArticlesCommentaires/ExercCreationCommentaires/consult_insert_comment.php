<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
    <head>
        <title>Commentaires</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="style.css" rel="stylesheet" type="text/css" /> 
    </head>
        
    <body>

        <p><a href="liste_derniers_art.php">Retour à la liste des derniers articles</a></p>
		
 
<?php
// Connexion à la base de données
if (isset($_GET['article']))
	{
		echo 'valeur de $_GET[\'article\'] : '.$_GET['article'];'<br />';
		$_SESSION['art_id'] = $_GET['article'];
	}
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ArtCom', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération de l'ID de l'article dont la valeur provient de l'URL et est stockée dans $_GET['article']
$req = $bdd->prepare('SELECT art_id, titre, corps, DATE_FORMAT(date_art, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles WHERE art_id = ?');
$req->execute(array($_SESSION['art_id']));
$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']).'. Posté le '; ?>
        <em> <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['corps']));
    ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
/*
$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_com, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
*/
$req = $bdd->prepare('SELECT nom, texte_com, DATE_FORMAT(date_com, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr 
					  FROM commentaires,auteurs 
					  WHERE auteurs.aut_id = commentaires.id_aut AND commentaires.id_art = ? ORDER BY date_com');
$req->execute(array($_SESSION['art_id']));
$nbresultats = 0;
while ($donnees = $req->fetch())
{ 
?>

<p><strong><?php echo htmlspecialchars($donnees['nom']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['texte_com']));
    $nbresultats++; ?>
</p>

<?php
} // Fin de la boucle des commentaires
if ($nbresultats == 0)
  echo '<h3>Cet article n\'est pas commenté pour l\'instant</h3>';
$req->closeCursor();

?>
<form method="POST" action="insert_comment.php">
	<h3>Editez ici votre commentaire à propos de cet article :</h3>
	<p>
	Pseudo : <br /><input type="text" name="pseudo" />
	</p>	
	<p>
	Mot de passe :<br /> <input type="text" name="mdp" />
	</p>
	<p>
	Commentaire :<br />
	<textarea name="comment"></textarea>
	</p>
	<p>
	<input type="submit" value ="enregistrer le commentaire" name="connexion"/>
	</p>
</form>
</body>
</html>
