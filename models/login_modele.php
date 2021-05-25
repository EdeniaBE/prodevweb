<?php
function GetProfiles()
{
    $db = DbConnect();
    $requete = $db->query('SELECT profile_id, nom, prenom, adresse,cp, motpasse, typeutilisateur,indesirable, DATE_FORMAT(horodatage, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM profiles ORDER BY horodatage');
    return $requete;
}

function GetMonProfile($profilenum)
{
    $db = DbConnect();
    $req = $db->prepare('SELECT profile_id, nom, prenom, adresse,cp, motpasse, typeutilisateur,indesirable, DATE_FORMAT(horodatage, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM profiles WHERE profile_id = ?');
    $req->execute(array($profilenum));
    $profile = $req->fetch();
    return $profile;
}

function GetProfiles2($profilenum)
{
    $db = DbConnect();
    $profiles = $db->prepare('SELECT profile_id, nom, prenom, DATE_FORMAT(horodatage, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr 
					  FROM profiles 
					  WHERE profiles.profile_id = commentaires.id_membre AND commentaires.id_blog = ? ORDER BY horodatage');
    $commentaires->execute(array($profilenum));
    $nbresultats = 0;
    return $commentaires;
}


// Nouvelle fonction qui nous permet d'éviter de répéter du code
function DbConnect()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projdevweb', 'root', 'root');
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}