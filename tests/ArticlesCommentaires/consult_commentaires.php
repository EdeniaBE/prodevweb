<?php session_start();?>
 <!DOCTYPE html >
 <html >
 	<head >
 		 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Commentaires</title>
	   <link href="style.css" rel="stylesheet" type="text/css" /> 
    </head>
        
    <body>

        <p><a href="liste_derniers_art.php">Retour à la liste des derniers articles</a></p>
		
 
<?php
// Connexion à la base de données
echo 'valeur de $_GET[\'article\'] : '.$_GET['article'];'<br />';

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
$req->execute(array($_GET['article']));
$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo $donnees['titre'].' - Posté le '; ?>
        <em> <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    <p>
    <?php
    echo nl2br($donnees['corps']);
    ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires

$req = $bdd->prepare('SELECT nom, texte_com, DATE_FORMAT(date_com, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr 
					  FROM commentaires,auteurs 
					  WHERE auteurs.aut_id = commentaires.id_aut AND commentaires.id_art = ? ORDER BY date_com');
$req->execute(array($_GET['article']));
$nbresultats = 0;
while ($donnees = $req->fetch())
{ 
?>

<p><strong><?php echo $donnees['nom']; ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
<p><?php echo nl2br($donnees['texte_com']);
    $nbresultats++; ?>
</p>

<?php
} // Fin de la boucle des commentaires
if ($nbresultats == 0)
  echo '<h3>Cet article n\'est pas commenté pour l\'instant</h3>';
$req->closeCursor();
?>
</body>
</html>
