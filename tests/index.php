<?php session_start();?>
 <!DOCTYPE html >
 <html >
 	<head >
 		<meta charset ="utf-8" />
        <title>Bienvenue sur la page accueil</title>

    </head>
    <body>


<?php
if ( (empty($_POST['prenom'])) || (empty($_POST['age'])) )
	{?>
    <p>Bievenue inconnu sur la page d'accueil<br/><br/> 

	Il faut absolument entrer un prénom et un âge!<br />
	<a href="session1.php">Retour vers la page précédente</a>
	
	
<?php }
else 
   {?>
    <p>Bievenue <?php echo htmlentities($_POST['prenom']); ?>  sur la page d'accueil<br/><br/> 
    <p><a href="session1.php">Accueil</a></p>
    <p><a href="session1.php">Chat</a></p>
    <p><a href="session1.php">Blog</a></p>
    <p><a href="session1.php">Achat</a></p>
    <p><a href="session1.php">Déconnexion</a></p>
    <p><a href="session1.php">Admin</a></p>
    
    <p>Profile: <?php echo htmlentities($_POST['prenom']);  ?> !
    </p>

    <p>Consultation du profil: <a href="session1.php">clique ici</a> pour revenir à la page précédente </p>
    /* <p>Si tu veux voir la page suivante <a href="suivante_session.php?couleurfetiche=rouge&amp;boisson=cafe au lait">clique ici</a> */
    </p>
    <?php 
    $_SESSION['valpage2']='Tralalalalere est la deuxieme valeur retenue de page en page grace a la session PHP';
    $_SESSION['prenom'] = htmlentities($_POST['prenom']);
    $_SESSION['age'] = htmlentities($_POST['age']);
   }
?>

</body>
</html>