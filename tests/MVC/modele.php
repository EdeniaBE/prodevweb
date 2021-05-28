<?php
function GetArticles()
{
    $db = DbConnect();
    $requete = $db->query('SELECT art_id, titre, corps, DATE_FORMAT(date_art, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM Articles ORDER BY date_art DESC LIMIT 0, 3');
    return $requete;
}

function GetUnArticle($artnum)
{
    $db = DbConnect();
    $req = $db->prepare('SELECT art_id, titre, corps, DATE_FORMAT(date_art, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM Articles WHERE art_id = ?');
    $req->execute(array($artnum));
    $art = $req->fetch();
    return $art;
}

function GetCommentaires($artnum)
{
    $db = DbConnect();
    $commentaires = $db->prepare('SELECT nom, texte_com, DATE_FORMAT(date_com, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr 
					  FROM commentaires,auteurs 
					  WHERE auteurs.aut_id = commentaires.id_aut AND commentaires.id_art = ? ORDER BY date_com');
    $commentaires->execute(array($artnum));
    $nbresultats = 0;
    return $commentaires;
}


// Nouvelle fonction qui nous permet d'éviter de répéter du code
function DbConnect()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=ArtCom', 'root', '');
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}