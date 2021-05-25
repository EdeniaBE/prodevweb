<?php

/* definit les fonctions appelées par "index.php".
Chaque fonction appelle une vue différente etet appelle également 1 ou +sieurs fonctions définies dans "model.php" = requête(s)
SQL nécessaires pour générer la vue demandée.*/

require('models\login_modele.php');
function ListeProfiles()
{
    $requete = GetProfiles();
    require('views\login\login_VueAffichageProfiles.php');
    echo ('vueAffichageProfiles');
}

function MonProfile()
{
    $profile = GetMonProfile($_GET['profile_id']);
    require('views\login\login_VueUnProfile.php');
}

function LoginProfile()
{
    require ('views\login\Login_Profile.php');
}