<?php
    ob_start();
    $title = "Rent-a-Snow - Détails";
    require_once 'helpers.php';
?>

<div class="row-fluid text-center">
    <h1>Détails du Snowboard</h1>
        <div>
            <img src="view/images/<?= $snowtype['photo'] ?>" class="detailsimages" alt="">
            <h3>Marque: <?= $snowtype['brand'] ?></h3>
            <h3>Modèle: <?= $snowtype['model'] ?></h3>
        </div>
    <br>
    <?php if(count($snows > 0)){ ?>
        <h4>il y a <?= count($snows) ?> snows disponible</h4>
        <table class="table">
            <tr>
                <th>code</th>
                <th>length</th>
                <th>state</th>
                <th>available</th>
            </tr>
            <?php foreach($snows as $snow){ ?>
                    <?php if(getTextState($snow['state']) != 'Mort'){ ?>
            <tr class="clickable" data-href="?action=realSnowDetails&id=<?= $snow['id'] ?>">
                <th><?= $snow['code'] ?></th>
                <th><?= $snow['length'] ?></th>
                <th><?= getTextState($snow['state']) ?></th>
                <th><?= getTextAvailable($snow['available']) ?></th>
            </tr>
            <?php } } ?>
            </table>
    <?php }else{ ?>
        <h4>il y n'a pas de snows de ce type</h4>
    <?php } ?>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
