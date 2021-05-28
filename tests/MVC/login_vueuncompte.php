

<?php $title = 'Mon Article'; ?>

<?php ob_start(); ?>
        <h1>Mon super blog !</h1>
        <p><a href="index.php?action=listederniersarticles">Retour a la liste des articles</a></p>
         <!-- c'est dans ce lien hypertexte appelant la page "index.php" qu'est transmise la variable
			    $_GET['action'] à cette même page ce qui débouchera sur l'affichage de la vue présentant 
				  la liste des articles -->
        <div class="news">
   <h3>
                <?= $art['titre'] ?>
                <em>le <?= $art['date_creation_fr'] ?></em>
            </h3>
            <p>
                <?= $art['corps'] ?>
            </p>
        </div>

        <h2>Commentaires</h2>
        <?php
		$nbresultats = 0;
        while ($comment = $commentaires->fetch())
        {
           $nbresultats ++;
        ?>
            <p><strong><?= $comment['nom'] ?></strong> le <?= $comment['date_commentaire_fr'] ?></p>
            <p><?= nl2br($comment['texte_com']) ?></p>
			<p><?= $nbresultats ?></p>
        <?php
        }
        ?>
		<?php
		If($nbresultats == 0)
		{
		?>	
		<p><strong>Aucun commentaire pour cet article.</strong></p>
		<?php
		}
		?>
		<?php
		$commentaires->closeCursor();
		?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>