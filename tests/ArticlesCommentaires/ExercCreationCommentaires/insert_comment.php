<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>connexion</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" title="monstyle" href="style.css" />
    </head>
    <body>

<?php 
    
if ((empty($_POST['pseudo'])) or (empty($_POST['mdp'])))

	  {
		echo '<h2>Mot de passe et Pseudo obligatoires !</h2> ';
		echo '<p><a href="consult_insert_comment.php">Retour vers la page consultation des commentaires</a></p>';

	  }
else

	  
	  {
	    try 
		{
			$pdo = new PDO('mysql:host=localhost;dbname=ArtCom', 'root', '');
			//Connexion au serveur et à une BD en particulier
		} 
		catch (PDOException $e) 
		{
			die( "Erreur !: " . $e->getMessage() );
		}
	    $req = "SELECT aut_id, nom, mot_passe FROM Auteurs WHERE nom = :pseudo and mot_passe = :mdp";
		$reqpreparee = $pdo ->prepare($req);
		$reqpreparee ->execute(array(':pseudo' => $_POST['pseudo'], ':mdp' => $_POST['mdp']));
		if($reqpreparee === FALSE)
		 	  {
			echo 'Il y a une erreur dans votre requête sélection : ';
			echo $req;
			die();
			  }
		$resultatreqprep = $reqpreparee->fetchall();
		if(count($resultatreqprep) == 0)
			  {
				echo'<h2> Vous ne possédez pas les droits pour éditer un commentaire .</h2>';
				echo '<p><a href="consult_insert_comment.php">Retour vers la page consultation des commentaires</a></p>';
			  }	
		else
		   {
				$auteurid = $resultatreqprep[0]['aut_id'];
		    	if ( empty($_POST['comment']))
					{
						echo '<h2>Commentaire obligatoire !</h2> ';
						echo '<p><a href="consult_insert_comment.php">Retour vers la page consultation des commentaires</a></p>';
					}
				else	
					{
						echo '<p>Bienvenue sur votre espace personnel '.$_POST['pseudo'].'</p>';
						echo '<p> $_POST[\'comment\'] vaut : ' .$_POST['comment'].'</p>';
						$requete = "INSERT INTO Commentaires (id_art,id_aut,texte_com,date_com) values 
									(?,?,?,NOW())";
						$requeteprepa = $pdo->prepare($requete);
						$requeteprepa ->execute(array($_SESSION['art_id'],$auteurid, $_POST['comment']));
		
						if($requeteprepa === FALSE)
							{
								echo 'Il y a une erreur dans votre requête d\'insertion dans la table Commentaires .';
								echo $requete;
								exit();
							}
						echo'Insertions effectuées dans la table Commentaires <br/>';
					}
		   }	
	  }
?>	  
	  