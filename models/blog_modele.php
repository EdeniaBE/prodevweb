<?php
function GetArticles()
{
    $db = DbConnect();
    $requete = $db->query('SELECT blog_id, titre, corps, DATE_FORMAT(horodatage, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM blog ORDER BY horodatage DESC LIMIT 0, 3');
    return $requete;
}

function GetUnArticle($artnum)
{
    $db = DbConnect();
    $req = $db->prepare('SELECT blog_id, titre, corps, DATE_FORMAT(horodatage, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM blog WHERE blog_id = ?');
    $req->execute(array($artnum));
    $art = $req->fetch();
    return $art;
}

function GetCommentaires($artnum)
{
    $db = DbConnect();
    $commentaires = $db->prepare('SELECT nom, commentaire, DATE_FORMAT(horodatage, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr 
					  FROM commentaires,profiles 
					  WHERE profiles.profile_id = commentaires.id_membre AND commentaires.id_blog = ? ORDER BY horodatage');
    $commentaires->execute(array($artnum));
    $nbresultats = 0;
    return $commentaires;
}


// Nouvelle fonction qui nous permet d'éviter de répéter du code
function DbConnect()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projdevwebtest', 'root', 'root');
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}