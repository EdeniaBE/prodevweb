
<?php $title = 'Les Profiles'; // contenu de la variable $title initialisé  ?> 


<?php ob_start(); /* fonction qui mémorise le contenu HTML qui suit jusqu'à appel de la fonction ob_get_clean() 
et qui stocke ce contenu dans la variable $content  voir ligne 55 */  ?>
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <style>
            body{font-family: 'Roboto', sans-serif;font-size:14px;background-color: #f3f3f3;}
            .face{background-color: #ffffff;border: 1px solid #CCCCCC;padding: 20px;text-shadow: 0 1px 1px #f3f3f3;width: 780px;text-align: left;box-shadow: 1px 3px 3px #8D8D8D;}
            .proximedia{background-color: #CCCCCC;border: 1px solid #CCCCCC;padding:10px;text-shadow: 0 1px 1px #f3f3f3;width: 800px;text-align: left;box-shadow: 1px 3px 3px #8D8D8D;text-align:right;font-weight:bold;}
            h3{text-decoration: underline;}
        </style>
        <center><div class="face">
        <center><h2>LES PROFILES DU SITE DE DZONE</h2></center>
        <h3>Les profiles :</h3>
<?php
while ($donnees = $requete->fetch())
{
?>
    <div class="profiles">
        <h3>
            <?=($donnees['nom']) ?>
            <em>le <?= $donnees['date_creation_fr'] ?></em>
        </h3>
    </div>
<?php
}

?>
<?php $content = ob_get_clean(); ?>

<?php require('views\login\login_template.php'); ?>