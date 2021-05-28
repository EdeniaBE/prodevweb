<?php session_start();
if (!isset($_REQUEST['uc']))
    $uc = 'accueil';
else
    $uc = $_REQUEST['uc'];

if (!isset($_SESSION['usertype']))
    $_SESSION['usertype'] = 'unm';
else
    $usertype = $_SESSION['usertype'];

//unset($_SESSION['usertype']);
$_SESSION['usertype'] ='unm';

// Affichage du Bandeau + Menu
require ('views\accueil\banner.html');
require ('views\menu\index.php');

switch($uc)
{
// Affichage de l'espace Accueil
    case 'accueil':{require('views\accueil\accueil.html');break;}

// Affichage de l'espace Login/Enrollement
    case 'login':{
        require ('controllers\login_controller.php');
        var_dump ($_SESSION);
        var_dump ($usertype);
        // appel à la vue présentant la liste des profiles enregistrés
        if (isset($_SESSION['member_id'])) {
            switch($usertype){
                case 'admin':{
                    ListeProfiles();  
                }
                case 'un':{
                    //appel à la vue présentant le profile 
                    MonProfile();
                }

            }
        }
        else {
            echo('log oooo in ') ;
            LoginProfile();
        };
    };        
    break;

    case 'logout':{
        //unset ($_SESSION);
        //unset ($_REQUEST);
        //unset ($usertype);
        //$uc = 'accueil';
        session_destroy();
        header ("Refresh:0; url=index.php");
        //require('index.php?uc=accueil');
        break;
    }

// Affichage de l'espace Shop
    case 'contenu':{require('views\shop\index.php');break;}

// Affichage de l'espace Blog/News    
    case 'news':{
        require ('controllers\blog_controller.php');
// appel à la vue présentant la liste des articles demandés
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'listederniersarticles') {
                listederniersarticles();  
            }
            elseif ($_GET['action'] == 'unarticle') {
//appel à la vue présentant un article et ses commentaires
                if (isset($_GET['blog_id']) && $_GET['blog_id'] > 0) {
                    unarticle();  
                }
                else {
                    echo 'Erreur : aucun identifiant de billet envoyé';
                }
            }
        }
        else {
            listederniersarticles();
        };        
        break;}

// Affichage de l'espace de Chat
    case 'chat':{require('views\chat\index.php');break;}

// Affichage de l'espace Admin
    case 'admin':{require('views\admin\index.php');break;}

// Affichage de l'espace Close de confidentialité
    case 'confidentialité':{require('views\footer\confidentialite.html');break;}
}


// Affichage du Footer
if (!($uc == 'confidentialité') AND !($uc=='logout'))
    include ('views\footer\footer.html');

    var_dump ($_REQUEST);
    var_dump ($_SESSION);
    var_dump ($_GET);
?>