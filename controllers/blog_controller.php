<?php

/* definit les fonctions appelées par "index.php".
Chaque fonction appelle une vue différente etet appelle également 1 ou +sieurs fonctions définies dans "model.php" = requête(s)
SQL nécessaires pour générer la vue demandée.*/

require('models\blog_modele.php');
function listederniersarticles()
{
    $requete = GetArticles();
    require('views\news\blog_VueAffichageDerniersArticles.php');
}

function unarticle()
{
    $art = GetUnArticle($_GET['blog_id']);
    $commentaires = GetCommentaires($_GET['blog_id']);

    require('views\news\blog_VueUnArticle.php');
}