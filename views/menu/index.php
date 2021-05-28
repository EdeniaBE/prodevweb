<!DOCTYPE html>
<html><head>
  <title>Projet développement WEB Patrice VERSTICHEL</title>
</head>
    <body>
        <center>
        <a href="index.php?uc=accueil">Accueil   </a>
        <a href="index.php?uc=contenu">Shop   </a>
        <a href="index.php?uc=news">News   </a>
        <a href="index.php?uc=chat">Chat   </a>
        <?php
        if ((isset($_SESSION['usertype'])) AND ($_SESSION['usertype'] == 'admin')) {
          ?>
          <a href="index.php?uc=admin">Admin   </a>
          <?php
        }
        ?>
        </center>
    </body>
</html>