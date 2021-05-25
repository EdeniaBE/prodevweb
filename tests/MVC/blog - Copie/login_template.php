<!DOCTYPE html>

<!--les variables $title et $content contiennent un contenu variable en fonction de la vue appelée
-->
<html>
    <head>
        <meta charset="iso-8859-1" />
        <title><?= $title ?></title> 
        <link href="style.css" rel="stylesheet" /> 
    </head>

    <body>
        <?= $content ?>
    </body>
</html>