<?php 
if(isset($factures)){
    while($facture = $factures->fetch()){
        ?>
        <p>
        <h3>num facture: <?= $facture['facture_id'] ?></h3>
        Date facture:  <?= $facture['horodatage'] ?>
        <br />
        Total: <?= $facture['prixtotal'] ?>€
        </p>
        <p>
        <form method="POST" action="index.php?uc=index">
            <input type="hidden" name="facture_id" value=<?= $facture['facture_id'] ?>>
            <input type="submit" value="Return startpage">
        </form>
        </p>
        <?php
    }
}