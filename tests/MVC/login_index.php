


<?php

/*Page "routeur". Chaque appel au sein d'une des vues (liens hypertextes) débouche sur l'exécution 
de cette page "index.php"
Elle permet de déterminer quelles fonctions seront appelées dans la page "controller.php".
Lors de la 1ère exécution de cette page "index.php". c'est la vue présentant la liste des derniers articles qui est appelées
en vertu de l'exécution de la dernière structure else à la ligne 46 car les variables $_GET n'existent pas encore...
*/

require('login_controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listederniersarticles') {
		echo 'tralala';
        listederniersarticles();  // appel à la vue présentant la liste des article demandés
    }
    elseif ($_GET['action'] == 'unarticle') {
        if (isset($_GET['art_id']) && $_GET['art_id'] > 0) {
            unarticle();  //appel à la vue présentant un article et sses commentaires
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    listederniersarticles();
}