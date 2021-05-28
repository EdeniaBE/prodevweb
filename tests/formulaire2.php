<?php session_start();?>
 <!DOCTYPE html >
 <html >
 	<head >
 		<meta charset ="utf-8" />
        <title>Formulaire membre</title>
    </head>
    <body>
        <?php
            $nom = $prenom = $adresse = $cpostal = $pass1 = $pass2 = "";
            function securisation($donnees){
                $donnees = trim($donnees);
                $donnees = stripslashes($donnees);
                $donnees = strip_tags($donnees);
                return $donnees;
            }
            $nom = securisation($_POST['nom']);
            $prenom = securisation($_POST['prenom']);
            $adresse = securisation($_POST['adresse']);
            $cpostal = securisation($_POST['cpostal']);
            $pass1 = securisation($_POST['pass1']);
            $pass2 = securisation($_POST['pass2']);

            echo 'Nom : ' .$nom. '<br/>';
            echo 'Prénom : ' .$prenom. '<br/>';
            echo 'Adresse : ' .$adresse. '<br/>';
            echo 'Cpostal : ' .$cpostal. '<br/>';
            echo 'pass1 : ' .$pass1. '<br/>';
            echo 'pass2 : ' .$pass2. '<br/>';
        ?>
        
        <p>
            clique <a href="formulaire.php">ici </a> pour retaper ton identifiant
        </p>
        
    </body>
</html>