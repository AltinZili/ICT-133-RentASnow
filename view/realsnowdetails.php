<?php
    ob_start();
    $title = "Rent-a-Snow - Détails";
    require_once 'helpers.php';
?>

<div class="row-fluid text-center">
    <h1>Détails du Snowboard</h1>
        <div>
            <img src="view/images/<?= $snow['photo'] ?>" class="detailsimages" alt="">
            <h3>Marque: <?= $snow['brand'] ?></h3>
            <h3>Modèle: <?= $snow['model'] ?></h3>
        </div>
    <br>
        <table class="table">
            <tr>
                <th>code</th>
                <td><?= $snow['code'] ?></td>
            </tr>
            <tr>
                <th>length</th>
                <td><?= $snow['length'] ?></td>
            </tr>
            <tr>
                <th>state</th>
                <td><?= getTextState($snow['state']) ?></td>
            </tr>
            <tr>
                <th>available</th>
                <td><?= getTextAvailable($snow['available']) ?></td>
            </tr>
        </table>
    <a href="index.php?action=editSnowDetails&id=<?= $id ?>">Modifier</a>
    <?php if ($snow['available'] == 1) { ?>
        <a href="?action=putInCart&id=<?= $id ?>" class="btn btn-success">Mettre dans le panier</a>
    <?php } ?>
    <?php if(count($rents) > 0){ ?>
        <h4 class="mt-3">Historique des locations</h4>
        <table class="table table-striped">
            <tr>
                <th>Par</th>
                <th>Depuis le</th>
                <th>Jours</th>
                <th>Status</th>
            </tr>
            <?php foreach ($rents as $rent) { ?>
                <tr>
                    <td><?= $rent['firstname'] ?> <?= $rent['lastname'] ?></td>
                    <td><?= $rent['start_on'] ?></td>
                    <td><?= $rent['nbDays'] ?></td>
                    <td><?= $rent['status'] ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <h4 class="mt-3">Ce snow n'a jamais été loué</h4>
    <?php } ?>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
