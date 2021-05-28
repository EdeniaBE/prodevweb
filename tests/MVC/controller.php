<?php

/* definit les fonctions appelées par "index.php".
Chaque fonction appelle une vue différente etet appelle également 1 ou +sieurs fonctions définies dans "model.php" = requête(s)
SQL nécessaires pour générer la vue demandée.*/

require('modele.php');
function listederniersarticles()
{
	$truc = 'coucou';	
    echo $truc;

    $requete = GetArticles();
    require('VueAffichageDerniersArticles.php');
}

function unarticle()
{
    $art = GetUnArticle($_GET['art_id']);
    $commentaires = GetCommentaires($_GET['art_id']);

    require('VueUnArtCom.php');
}