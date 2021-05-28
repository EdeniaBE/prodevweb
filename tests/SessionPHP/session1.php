<?php session_start();?><!-- IMPERATIVEMENT AVANT TOUT CODE ()X)HTML !!! -->
 <!DOCTYPE html >
 <html >
 	<head >
 		<meta charset ="utf-8" />
        <title>Page session1</title>

    </head>
    <body>


<form action="cible_session1.php" method="post">

<p>
Veuillez entrer votre prénom :
<input type="text" name="prenom" />
</p>
<p>
Veuillez entrer votre age :
<input type="text" name="age" /> <input type="submit" value="Valider" />
</p>
</form>
<?php
$_SESSION['valpage1']='Turlututu est la premiere valeur retenue de page en page grace a la session PHP';?>

</body>
</html>