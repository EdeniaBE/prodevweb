<?php session_start();?>
 <!DOCTYPE html >
 <html >
 	<head >
 		<meta charset ="utf-8" />
        <title>Page suivante_session</title>

    </head>
<body>
<p>Bonjour !<br/><br/> 

J'ai tout retenu, tu t'appelles <?php echo $_SESSION['prenom'];  ?> !<br />
et tu as : <?php echo $_POST['age'];?> 'ans';
</p>
<p>
 Bienvenue sur la page suivante<br /> 
 Ma couleur préférée est  <strong><?php echo $_GET['couleurfetiche'];?></strong> et ma boisson favorite le <?php echo "<strong>".$_GET['boisson']."</strong>";?> !
</p>
<p>
 Et voici la valeur retenue dans la premiere page grace au mécanisme de la session PHP :<br /> 
 <?php
 echo ''.$_SESSION['valpage1'].'<br />';?>
</p>
<p>
 Et voici la valeur retenue dans la deuxieme page grace au mécanisme de la session PHP :<br /> 
 <?php
 echo ''.$_SESSION['valpage2'].'<br />';?>
</p>
</body>
</html>
