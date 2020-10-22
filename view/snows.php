<?php
    ob_start();
    $title = 'Rent-a-snow - Snowboards';
?>

    <div class="row-fluid">
        <h1>Nos Snowboards:</h1>
            <?php foreach ($snows as $snow) { ?>
            <div>
                <img src="view/images/<?= $snow['photo'] ?>" class="listimages" alt="">
                <h3>Marque: <?= $snow['brand'] ?></h3>
                <h3>Modèle: <?= $snow['model'] ?></h3>
                <a href="index.php?action=snowDetails&id=<?= $snow['id'] ?>">Détails</a>
            </div>
            <br>
        <?php } ?>
    </div>


<?php
    $content = ob_get_clean();
    require 'gabarit.php';
?>
