<?php session_start();?>
 <!DOCTYPE html >
 <html >
 	<head >
 		<meta charset ="utf-8" />
        <title>Connexion a la BDD</title>

    </head>
    <body>


        <?php
            $serveur = "lovalhost";
            $login = "root";
            $pass = "root";
            $dbname = "projdevweb";

            try {
                $connexion = new PDO("mysql:host=$serveur;$dbname", $login, $pass);
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRORMODE_EXCEPTION);
                
                $requete - $connexion -> prepare (
                    "INSERT INTO "
                )
            }
            catch (PDOException, $e){
                echo 'Echec :' .$e->getMessage();
            }
        ?>
    </body>
</html>