<!DOCTYPE html>

<!--les variables $title et $content contiennent un contenu variable en fonction de la vue appelée
-->
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title> 
        <link href="style.css" rel="stylesheet" /> 
    </head>

    <body>
        <?= $content ?>
        <p>Login</p>
    </body>
</html>