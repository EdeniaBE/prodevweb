<?php session_start();?>
 <!DOCTYPE html >
 <html >
 	<head >
 		<meta charset ="utf-8" />
        <title>Formulaire membre</title>
    </head>
    <body>
        <form method = "POST" action = "formulaire2.php">
            <p>
                <label for = "nom">Entrez votre nom : </label>
                <input type = "text" name = 'nom' id = "nom"/>
            </p>
            <p>
                <label for = "prenom">Entrez votre prénom : </label>
                <input type = "text" name = 'prenom' id = "prenom"/>
            </p>
            <p>
                <label for = "adresse">Entrez votre adresse : </label>
                <input type = "text" name = 'adresse' id = "adresse"/>
            </p>
            <p>
                <label for = "cpostal">Entrez votre Code Postal : </label>
                <input type = "text" name = 'cpostal' id = "cpostal"/>
            </p>
            <p>
                <label for = "pass1">Entrez votre Mot de passe : </label>
                <input type = "password" name = 'pass1' id = "pass1"/>
            </p>
            <p>
                <label for = "pass2">Entrez votre Mot de passe : </label>
                <input type = "password" name = 'pass2' id = "pass2"/>
            </p>
            <p>
                <input type="submit" value="Envoyer"/>
            </p>
        </form>
    </body>
</html>