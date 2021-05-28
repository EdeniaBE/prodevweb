
<?php $title = 'Mes Articles'; // contenu de la variable $title initialisé  ?> 


<?php ob_start(); /* fonction qui mémorise le contenu HTML qui suit jusqu'à appel de la fonction ob_get_clean() 
et qui stocke ce contenu dans la variable $content  voir ligne 55 */  ?>
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <style>
            body{font-family: 'Roboto', sans-serif;font-size:14px;background-color: #f3f3f3;}
            .face{background-color: #ffffff;border: 1px solid #CCCCCC;padding: 20px;text-shadow: 0 1px 1px #f3f3f3;width: 780px;text-align: left;box-shadow: 1px 3px 3px #8D8D8D;}
            .proximedia{background-color: #CCCCCC;border: 1px solid #CCCCCC;padding:10px;text-shadow: 0 1px 1px #f3f3f3;width: 800px;text-align: left;box-shadow: 1px 3px 3px #8D8D8D;text-align:right;font-weight:bold;}
            h3{text-decoration: underline;}
        </style>
        <center><div class="face">
        <center><h2>LES ARTICLES DU BLOG DE DZONE</h2></center>
        <h3>Les 3 derniers articles parus :</h3>
<?php
while ($donnees = $requete->fetch())
{
?>
    <div class="news">
        <h3>
            <?=($donnees['titre']) ?>
            <em>le <?= $donnees['date_creation_fr'] ?></em>
        </h3>
        <p>
            <?= nl2br($donnees['corps']) ?>
            <br />
            <em><a href="index.php?blog_id=<?= $donnees['blog_id'];?>&amp;action=unarticle&amp;uc=news">Commentaires</a></em>
			<!-- c'est dans ce lien hypertexte appelant la page "index.php" que sont transmises les variables $_GET['art_id']
			     et $_GET['action'] à cette même page ce qui débouchera sur l'affichage de la vue présentant un article et ses commentaires-->
        </p>
    </div>
<?php
}

?>
<?php $content = ob_get_clean(); ?>

<?php require('views\news\blog_template.php'); ?>