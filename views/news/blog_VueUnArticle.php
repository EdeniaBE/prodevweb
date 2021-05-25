<?php $title = 'Mon Article'; ?>
<?php ob_start(); ?>
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <style>
            body{font-family: 'Roboto', sans-serif;font-size:14px;background-color: #f3f3f3;}
            .face{background-color: #ffffff;border: 1px solid #CCCCCC;padding: 20px;text-shadow: 0 1px 1px #f3f3f3;width: 780px;text-align: left;box-shadow: 1px 3px 3px #8D8D8D;}
            .proximedia{background-color: #CCCCCC;border: 1px solid #CCCCCC;padding:10px;text-shadow: 0 1px 1px #f3f3f3;width: 800px;text-align: left;box-shadow: 1px 3px 3px #8D8D8D;text-align:right;font-weight:bold;}
            h3{text-decoration: underline;}
        </style>
        <center><div class="face">
        <center><h2>LE SUPER BLOG de DZone !</h2></center>
        <div class="news">
        <h3>
            <?= $art['titre'] ?>
            <em>le <?= $art['date_creation_fr'] ?></em>
        </h3>
        <p>
           <?= $art['corps'] ?>
        </p>
        </div>

        <h3>Commentaires</h3>
        <?php
		$nbresultats = 0;
        while ($comment = $commentaires->fetch())
        {
           $nbresultats ++;
        ?>
            <p><strong><?= $comment['nom'] ?></strong> le <?= $comment['date_commentaire_fr'] ?></p>
            <p><?= nl2br($comment['commentaire']) ?></p>
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
        <p><a href="index.php?action=listederniersarticles&amp;uc=news">Retour a la liste des articles</a></p>
<?php $content = ob_get_clean(); ?>

<?php require('views\news\blog_template.php'); ?>