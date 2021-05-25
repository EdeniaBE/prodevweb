<?php

/* definit les fonctions appelées par "index.php".
Chaque fonction appelle une vue différente etet appelle également 1 ou +sieurs fonctions définies dans "model.php" = requête(s)
SQL nécessaires pour générer la vue demandée.*/

require('login_modele.php');
function listemembres()
{
    $requete = GetMembres();
    require('VueAffichageMembres.php');
}

function unmembre()
{
    $art = GetUnMembre($_GET['profile_id']);

    require('VueUnMembre.php');
}