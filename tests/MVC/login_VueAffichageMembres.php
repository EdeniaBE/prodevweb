
<?php $title = 'Mes Profiles'; // contenu de la variable $title initialisé  ?> 


<?php ob_start(); /* fonction qui mémorise le contenu HTML qui suit jusqu'à appel de la fonction ob_get_clean() 
et qui stocke ce contenu dans la variable $content  voir ligne 55 */  ?>
        <h1>Mes super profiles !</h1>
        
<?php
while ($donnees = $requete->fetch())
{
?>
    <div class="profiles">
        <h3>
            <?=($donnees['profiles']) ?>
            <em>le <?= $donnees['horodatage'] ?></em>
        </h3>
        <p>
            <?= nl2br($donnees['corps']) ?>
            <br />
            <em><a href="index.php?art_id=<?= $donnees['profile_id'];?>&amp;action=unarticle">Commentaires</a></em>
			<!-- c'est dans ce lien hypertexte appelant la page "index.php" que sont transmises les variables $_GET['art_id']
			     et $_GET['action'] à cette même page ce qui débouchera sur l'affichage de la vue présentant un article et ses commentaires-->
        </p>
    </div>
<?php
}

?>
<?php $content = ob_get_clean(); ?>

<?php require('login_template.php'); ?>