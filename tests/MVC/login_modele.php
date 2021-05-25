<?php
function GetMembres()
{
    $db = DbConnect();
    $requete = $db->query('SELECT profile_id, nom, prenom, adresse, cp, motpasse,typeutilisateur, DATE_FORMAT(date_art, \'%d/%m/%Y à %Hh%imin%ss\') AS horodatage, indesirable FROM profiles ORDER BY profile_id');
    return $requete;
}

function GetUnMembre($membrenum)
{
    $db = DbConnect();
    $req = $db->prepare('SELECT profile_id, nom, prenom, adresse, cp, motpasse,typeutilisateur, DATE_FORMAT(date_art, \'%d/%m/%Y à %Hh%imin%ss\') AS horodatage, indesirable FROM profiles WHERE art_id = ?');
    $req->execute(array($profilenum));
    $profile = $req->fetch();
    return $profile;
}


// Nouvelle fonction qui nous permet d'éviter de répéter du code
function DbConnect()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projwebdev', 'root', 'root');
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}