<?php session_start();?>
 <!DOCTYPE html >
 <html >
 	<head >
 		<meta charset ="utf-8" />
        <title>Bienvenue sur la page accueil</title>

    </head>
    <body>


<?php
if (empty($_POST['page'])) 
	{?>
    <p>Bievenue inconnu sur la page d'accueil<br/><br/> 

	<form method = "POST" action = "indexpage.php">
        <p>
            <label for = "page">Entrez la page : </label>
            <input type = "text" name = 'page' id = "page"/>
        </p>

        <p>
            <input type="submit" value="Envoyer"/>
        </p>
    </form>
	<?php
    }
    else
    if ($_POST['page'] = '1')
        {?>
        <p>Bievenue inconnu sur la page1 d'accueil<br/><br/> 

        <form method = "POST" action = "indexpage.php">
            <p>
                <label for = "page">Entrez la page : </label>
                <input type = "text" name = 'page' id = "page"/>
            </p>

            <p>
                <input type="submit" value="Envoyer"/>
            </p>
        </form>
        <?php
    if ($_POST['page'] = '2')
    {?>
    <p>Bievenue inconnu sur la page2 d'accueil<br/><br/> 

    <form method = "POST" action = "indexpage.php">
        <p>
            <label for = "page">Entrez la page : </label>
            <input type = "text" name = 'page' id = "page"/>
        </p>

        <p>
            <input type="submit" value="Envoyer"/>
        </p>
    </form>
    <?php
    }
?>  

</body>
</html>