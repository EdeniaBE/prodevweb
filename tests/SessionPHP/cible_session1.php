<?php session_start();?>
 <!DOCTYPE html >
 <html >
 	<head >
 		<meta charset ="utf-8" />
        <title>Page cible_session1</title>

    </head>
    <body>

<p>Bonjour !<br/><br/> 
<?php
if ( (empty($_POST['prenom'])) || (empty($_POST['age'])) )
	{?>
	Il faut absolument entrer un prénom et un âge!<br />
	<a href="session1.php">Retour vers la page précédente</a>
	
	
<?php }
  else 
   {?>

Je sais comment tu t'appelles, hé hé. Tu t'appelles <?php echo htmlentities($_POST['prenom']);  ?> !
</p>

<p>
Si tu veux changer de prénom et/ou ton âge, <a href="session1.php">clique ici</a> pour revenir à la page précédente
</p>
<p>
 
Si tu veux voir la page suivante <a href="suivante_session.php?couleurfetiche=rouge&amp;boisson=cafe au lait">clique ici</a> 
</p>
<?php
$_SESSION['valpage2']='Tralalalalere est la deuxieme valeur retenue de page en page grace a la session PHP';
$_SESSION['prenom'] = htmlentities($_POST['prenom']);
	}
?>

</body>
</html>