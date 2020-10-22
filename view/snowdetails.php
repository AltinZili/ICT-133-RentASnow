<?php
    ob_start();
    $title = "Rent-a-Snow - Détails";
?>

<div class="row-fluid">
    <h1>Détails du Snowboard</h1>
        <div>
            <img src="view/images/<?= $snow['photo'] ?>" class="listimages" alt="">
            <h3>Marque: <?= $snow['brand'] ?></h3>
            <h3>Modèle: <?= $snow['model'] ?></h3>
        </div>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
